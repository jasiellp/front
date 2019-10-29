<?php

namespace App\Repositories;

use App\Models\FormasPagamento;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

/**
 * Class FormasPagamentoRepository
 * @package App\Repositories
 * @version September 4, 2019, 6:16 pm UTC
*/

class FormasPagamentoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descricao',
        'icone',
        'observacao'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return FormasPagamento::class;
    }

    public function file(Request $request, $objeto, $old_file = null)
    {
        if ($request->hasFile('icone')) {
            // Remove file if exists
            if ($old_file) {
                if (file_storage_exists($old_file)) {
                    file_storage_delete($old_file);
                }
            }

            $destinationPath = CodeRepository::saveFile($request->file('icone'), 'formaspagamento/' . $objeto->id);

            $objeto->icone = $destinationPath;

            $this->update($objeto, $objeto->id);
        }
    }
}
