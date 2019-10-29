<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Item
 * @package App\Models
 * @version September 4, 2019, 6:21 pm UTC
 *
 * @property string imagem
 * @property string nome
 * @property float preco
 */
class Item extends Model
{

    public $table = 'itens';
    


    public $fillable = [
        'imagem',
        'nome',
        'preco'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'imagem' => 'string',
        'nome' => 'string',
        'preco' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
