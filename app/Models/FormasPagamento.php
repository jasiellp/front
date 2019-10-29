<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class FormasPagamento
 * @package App\Models
 * @version September 4, 2019, 6:16 pm UTC
 *
 * @property string descricao
 * @property string icone
 * @property string observacao
 */
class FormasPagamento extends Model
{

    public $table = 'formas-pagamento';
    


    public $fillable = [
        'descricao',
        'icone',
        'observacao'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'descricao' => 'string',
        'icone' => 'string',
        'observacao' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
