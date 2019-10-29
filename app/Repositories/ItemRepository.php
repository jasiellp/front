<?php

namespace App\Repositories;

use App\Models\Item;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

/**
 * Class ItemRepository
 * @package App\Repositories
 * @version September 4, 2019, 6:21 pm UTC
*/

class ItemRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'imagem',
        'nome',
        'preco'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Item::class;
    }

    public function file(Request $request, $objeto, $old_file = null)
    {
        if ($request->hasFile('imagem')) {
            // Remove file if exists
            if ($old_file) {
                if (file_storage_exists($old_file)) {
                    file_storage_delete($old_file);
                }
            }

            $destinationPath = CodeRepository::saveFile($request->file('imagem'), 'item/' . $objeto->id);

            $objeto->imagem = $destinationPath;

            $this->update($objeto, $objeto->id);
        }
    }
}
