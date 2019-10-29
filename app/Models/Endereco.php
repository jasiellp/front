<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Endereco
 * @package App\Models
 * @version September 4, 2019, 6:28 pm UTC
 *
 * @property string bairro
 * @property string cep
 * @property string cidade
 * @property string complemento
 * @property string endereco
 * @property string estado
 * @property string instrucoes
 * @property string latitude
 * @property string longitute
 * @property integer numero
 * @property string rotulo
 * @property string selecionado
 * @property string usuario
 */
class Endereco extends Model
{

    public $table = 'enderecos';
    


    public $fillable = [
        'bairro',
        'cep',
        'cidade',
        'complemento',
        'endereco',
        'estado',
        'instrucoes',
        'latitude',
        'longitute',
        'numero',
        'rotulo',
        'selecionado',
        'usuario'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'bairro' => 'string',
        'cep' => 'string',
        'cidade' => 'string',
        'complemento' => 'string',
        'endereco' => 'string',
        'estado' => 'string',
        'instrucoes' => 'string',
        'latitude' => 'string',
        'longitute' => 'string',
        'numero' => 'integer',
        'rotulo' => 'string',
        'selecionado' => 'datetime',
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
