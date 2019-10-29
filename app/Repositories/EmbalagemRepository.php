<?php

namespace App\Repositories;

use App\Models\Embalagem;
use App\Repositories\BaseRepository;

/**
 * Class EmbalagemRepository
 * @package App\Repositories
 * @version September 4, 2019, 6:20 pm UTC
*/

class EmbalagemRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descricao',
        'peso_maximo',
        'valor'
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
        return Embalagem::class;
    }
}
