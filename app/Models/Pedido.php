<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Pedido
 * @package App\Models
 * @version September 5, 2019, 6:26 pm UTC
 *
 * @property string comanda
 * @property string data_criado
 * @property string endereco_entrega
 * @property string status
 * @property string usuario
 */
class Pedido extends Model
{

    public $table = 'pedidos';
    


    public $fillable = [
        'comanda',
        'data_criado',
        'endereco_entrega',
        'status',
        'usuario'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'comanda' => 'string',
        'data_criado' => 'datetime',
        'endereco_entrega' => 'string',
        'status' => 'string',
        'usuario' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
