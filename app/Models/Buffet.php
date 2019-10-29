<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Buffet
 * @package App\Models
 * @version September 5, 2019, 8:25 pm UTC
 *
 * @property string data
 * @property string pratos
 * @property float preco_kg
 */
class Buffet extends Model
{

    public $table = 'buffets';
    


    public $fillable = [
        'data',
        'pratos',
        'preco_kg'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'datetime',
        'pratos' => 'string',
        'preco_kg' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
