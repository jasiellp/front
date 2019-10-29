<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Embalagem
 * @package App\Models
 * @version September 4, 2019, 6:20 pm UTC
 *
 * @property string descricao
 * @property float peso_maximo
 * @property float valor
 */
class Embalagem extends Model
{

    public $table = 'embalagens';
    


    public $fillable = [
        'descricao',
        'peso_maximo',
        'valor'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'descricao' => 'string',
        'peso_maximo' => 'double',
        'valor' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
