<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Estabelecimento
 * @package App\Models
 * @version September 4, 2019, 6:18 pm UTC
 *
 * @property string endereco
 * @property string lat_lng
 * @property string nome
 * @property string numero
 * @property integer perimetro_entrega
 */
class Estabelecimento extends Model
{

    public $table = 'estabelecimento';
    


    public $fillable = [
        'endereco',
        'lat_lng',
        'nome',
        'numero',
        'perimetro_entrega'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'endereco' => 'string',
        'lat_lng' => 'string',
        'nome' => 'string',
        'numero' => 'string',
        'perimetro_entrega' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
