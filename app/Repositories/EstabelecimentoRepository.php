<?php

namespace App\Repositories;

use App\Models\Estabelecimento;
use App\Repositories\BaseRepository;

/**
 * Class EstabelecimentoRepository
 * @package App\Repositories
 * @version September 4, 2019, 6:18 pm UTC
*/

class EstabelecimentoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'endereco',
        'lat_lng',
        'nome',
        'numero',
        'perimetro_entrega'
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
        return Estabelecimento::class;
    }
}
