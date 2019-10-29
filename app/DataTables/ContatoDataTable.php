<?php

namespace App\DataTables;

use App\Models\Contato;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Illuminate\Support\Facades\Auth;

class ContatoDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'contatos.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Contato $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Contato $model)
    {
        $query = $model->newQuery();
        $query->select(\DB::raw('contatos.id, contatos.titulo, contatos.mensagem, contatos.anexo, contatos.resposta, escolas.codigo as escola, turmas.codigo as turma, alunos.nome as aluno'));
        $query->join('escolas', 'escolas.id', '=', 'contatos.escola');
        $query->join('turmas', 'turmas.id', '=', 'contatos.turma');
        $query->join('alunos', 'alunos.id', '=', 'contatos.aluno');
        if(Auth::user()->escola){
            return $query->where('contatos.escola', Auth::user()->escola);
        }



        return $query;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'escola',
            'turma',
            'aluno',
            'titulo',
            'mensagem',
            'resposta'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'contatosdatatable_' . time();
    }
}
