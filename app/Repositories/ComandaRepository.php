<?php

namespace App\Repositories;

use App\Models\Comanda;
use App\Repositories\BaseRepository;

/**
 * Class ComandaRepository
 * @package App\Repositories
 * @version September 4, 2019, 6:33 pm UTC
*/

class ComandaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'buffet',
        'buffet_total',
        'data',
        'descricao_embalagem',
        'device_id',
        'entrega',
        'fechado',
        'itens',
        'itens_total',
        'peso_total',
        'preco_kg',
        'subtotal',
        'total',
        'valor_embalagem'
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
        return Comanda::class;
    }
}
