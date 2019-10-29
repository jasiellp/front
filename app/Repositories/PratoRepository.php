<?php

namespace App\Repositories;

use App\Models\Prato;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

/**
 * Class PratoRepository
 * @package App\Repositories
 * @version September 4, 2019, 6:15 pm UTC
*/

class PratoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ativo',
        'descricao',
        'imagem',
        'nome',
        'peso'
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
        return Prato::class;
    }

    public function file(Request $request, $prato, $old_file = null)
    {
        if ($request->hasFile('imagem')) {
            // Remove file if exists
            if ($old_file) {
                if (file_storage_exists($old_file)) {
                    file_storage_delete($old_file);
                }
            }

            $destinationPath = CodeRepository::saveFile($request->file('imagem'), 'prato/' . $prato->id);

            $prato->imagem = $destinationPath;

            $this->update($prato, $prato->id);
        }
    }
}
