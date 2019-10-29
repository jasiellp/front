<?php

namespace App\Repositories;

use App\Models\Endereco;
use App\Repositories\BaseRepository;

/**
 * Class EnderecoRepository
 * @package App\Repositories
 * @version September 4, 2019, 6:28 pm UTC
*/

class EnderecoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'bairro',
        'cep',
        'cidade',
        'complemento',
        'endereco',
        'estado',
        'instrucoes',
        'latitude',
        'longitute',
        'numero',
        'rotulo',
        'selecionado',
        'usuario'
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
        return Endereco::class;
    }
}
