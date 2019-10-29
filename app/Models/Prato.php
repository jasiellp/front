<?php

namespace App\Models;


use Eloquent as Model;

/**
 * Class Prato
 * @package App\Models
 * @version September 4, 2019, 6:15 pm UTC
 *
 * @property boolean ativo
 * @property string descricao
 * @property string imagem
 * @property string nome
 * @property float peso
 */
class Prato extends Model
{

    public $table = 'pratos';
    


    public $fillable = [
        'ativo',
        'descricao',
        'imagem',
        'nome',
        'peso'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ativo' => 'boolean',
        'descricao' => 'string',
        'imagem' => 'string',
        'nome' => 'string',
        'peso' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
