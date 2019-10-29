<?php

namespace App\Repositories;

use Illuminate\Container\Container as Application;
use Illuminate\Database\Eloquent\Model;
use MrShan0\PHPFirestore\FirestoreClient;
use MrShan0\PHPFirestore\FirestoreDocument;
use MrShan0\PHPFirestore\Fields\FirestoreArray;
use MrShan0\PHPFirestore\Fields\FirestoreReference;
use MrShan0\PHPFirestore\Fields\FirestoreTimestamp;


abstract class BaseRepository
{

    public $firestoreClient;
    /**
     * @var Model
     */
    protected $model;

    /**
     * @var Application
     */
    protected $app;

    /**
     * @param Application $app
     *
     * @throws \Exception
     */
    public function __construct(Application $app)
    {
        $this->firestoreClient = new FirestoreClient('mgourmet-89170', 'AIzaSyC15ZouxJ7yagdc0sMECnRLg7Snno_FEC4', [
            'database' => '(default)',
        ]);
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Get searchable fields array
     *
     * @return array
     */
    abstract public function getFieldsSearchable();

    /**
     * Configure the Model
     *
     * @return string
     */
    abstract public function model();

    /**
     * Make Model instance
     *
     * @throws \Exception
     *
     * @return Model
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model) {
            throw new \Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }

    /**
     * Paginate records for scaffold.
     *
     * @param int $perPage
     * @param array $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($perPage, $columns = ['*'])
    {
        $query = $this->allQuery();

        return $query;//->paginate($perPage, $columns);
    }

    /**
     * Build a query for retrieving all records.
     *
     * @param array $search
     * @param int|null $skip
     * @param int|null $limit
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function allQuery($search = [], $skip = null, $limit = null)
    {

        $collections = $this->firestoreClient->listDocuments($this->model->table);

        $result = [];

        $i = 0;
        foreach($collections['documents'] as $doc){
            $prepared = $this->prepare($doc);

            $result[$i] = $prepared;

            $i++;
        }


        return $result;

        // $query = $this->model->newQuery();

        // if (count($search)) {
        //     foreach($search as $key => $value) {
        //         if (in_array($key, $this->getFieldsSearchable())) {
        //             $query->where($key, $value);
        //         }
        //     }
        // }

        // if (!is_null($skip)) {
        //     $query->skip($skip);
        // }

        // if (!is_null($limit)) {
        //     $query->limit($limit);
        // }

        // return $query;
    }

    /**
     * Retrieve all records with given filter criteria
     *
     * @param array $search
     * @param int|null $skip
     * @param int|null $limit
     * @param array $columns
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all($search = [], $skip = null, $limit = null, $columns = ['*'])
    {
        $query = $this->allQuery($search, $skip, $limit);

        return $query;
    }

    /**
     * Create model record
     *
     * @param array $input
     *
     * @return Model
     */
    public function create($input)
    {
        $model = $this->model->newInstance($input);

        $document = $this->cast($model);

        $doc = $this->firestoreClient->addDocument($this->model->table, $document);

        $prepared = $this->prepare($doc);

        return $prepared;
    }

    public function prepare($doc){
        $arrDoc = (array)$doc;

        $register = array_shift($arrDoc);
        $aux = [];

        $documentName = array_shift($arrDoc);

        $aux['id'] = \Arr::last(explode('/', $documentName));

        foreach(array_keys($register) as $key){
            

            $a = \Arr::first($register[$key]);

            if(is_array($a)){
                $a = json_encode($a);
            }

            $aux[$key] = $a;
        }

        return (object)$aux;
    }

    public function cast($model){

        $document = new FirestoreDocument;

        foreach($model->fillable as $field){


            if(is_object(json_decode($model->$field))){

                $items = [];

                $arr = (array)json_decode($model->$field);

                if(isset($arr['values'])){

                    $values = $arr['values'];

                    foreach($values as $obj){

                        $value = (array)$obj;

                        if(isset($value['referenceValue'])){

                            $aux = explode('/', $value['referenceValue']);

                            $reference = '/'.$aux[5].'/'.$aux[6];

                            $items[] = new FirestoreReference($reference);
                        }

                    }

                }

                $document->setArray($field, new FirestoreArray($items));

            } else {

                switch(gettype($model->$field)){
                    case 'boolean':
                        $document->setBoolean($field, $model->$field);
                        break;
                    case 'string':
                        $document->setString($field, $model->$field);
                        break;
                    case 'double':
                        $document->setDouble($field, $model->$field);
                        break;
                    case 'integer':
                        $document->setInteger($field, $model->$field);
                        break;
                    case 'object':

                        $date = ((array)$model->$field)['date'];

                        $datetime = new \DateTime($date);
                        $document->setTimestamp($field, new FirestoreTimestamp($datetime));
                        break;
                }
            }
        }

        return $document;
    }

    /**
     * Find model record for given id
     *
     * @param int $id
     * @param array $columns
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */
    public function find($id, $columns = ['*'])
    {

        $doc = $this->firestoreClient->getDocument($this->model->table.'/'.$id);
        $prepared = $this->prepare($doc);

        return $prepared;

        // $query = $this->model->newQuery();

        // return $query->find($id, $columns);
    }

    /**
     * Update model record for given id
     *
     * @param array $input
     * @param int $id
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model
     */
    public function update($input, $id)
    {
        //$query = $this->model->newQuery();

        //$model = $this->find($id);

        $model = $this->model->newInstance($input);

        $document = $this->cast($model);




        $retorno = $this->firestoreClient->updateDocument($this->model->table.'/'.$id, $document);

        // $model->fill($input);

        // $model->save();

        return $this->prepare($retorno);
    }

    /**
     * @param int $id
     *
     * @throws \Exception
     *
     * @return bool|mixed|null
     */
    public function delete($id)
    {

        $collection = $this->model->table.'/'.$id;
        $this->firestoreClient->deleteDocument($collection, [$id]);

        return true;
        
        // $query = $this->model->newQuery();

        // $model = $query->find($id);

        // return $model->delete();
    }
}
