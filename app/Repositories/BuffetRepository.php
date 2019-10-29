<?php

namespace App\Repositories;

use App\Models\Buffet;
use App\Repositories\BaseRepository;

/**
 * Class BuffetRepository
 * @package App\Repositories
 * @version September 5, 2019, 8:25 pm UTC
*/

class BuffetRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'data',
        'pratos',
        'preco_kg'
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
        return Buffet::class;
    }
}
