<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Comanda
 * @package App\Models
 * @version September 4, 2019, 6:33 pm UTC
 *
 * @property string buffet
 * @property float buffet_total
 * @property string data
 * @property string descricao_embalagem
 * @property string device_id
 * @property float entrega
 * @property boolean fechado
 * @property string itens
 * @property float itens_total
 * @property float peso_total
 * @property float preco_kg
 * @property float subtotal
 * @property float total
 * @property float valor_embalagem
 */
class Comanda extends Model
{

    public $table = 'comanda';
    


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'buffet' => 'string',
        'buffet_total' => 'double',
        'data' => 'datetime',
        'descricao_embalagem' => 'string',
        'device_id' => 'string',
        'entrega' => 'double',
        'fechado' => 'boolean',
        'itens' => 'string',
        'itens_total' => 'double',
        'peso_total' => 'double',
        'preco_kg' => 'double',
        'subtotal' => 'double',
        'total' => 'double',
        'valor_embalagem' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
