<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Usuario
 * @package App\Models
 * @version September 4, 2019, 6:23 pm UTC
 *
 * @property string cpf_cnpj
 * @property string data_acesso
 * @property string email
 * @property string nome
 * @property string senha
 */
class Usuario extends Model
{

    public $table = 'usuarios';
    


    public $fillable = [
        'cpf_cnpj',
        'data_acesso',
        'email',
        'nome',
        'senha'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'cpf_cnpj' => 'string',
        'data_acesso' => 'datetime',
        'email' => 'string',
        'nome' => 'string',
        'senha' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
