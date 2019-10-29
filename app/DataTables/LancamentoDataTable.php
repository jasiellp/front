<?php

namespace App\DataTables;

use App\Models\Lancamento;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Illuminate\Support\Facades\Auth;

class LancamentoDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'lancamentos.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Lancamento $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Lancamento $model)
    {
        $query = $model->newQuery();
        $query->select(\DB::raw('lancamentos.id, lancamentos.tipo, lancamentos.modelo, lancamentos.data_hora, lancamentos.local, lancamentos.descricao, escolas.codigo as escola, turmas.codigo as turma, alunos.nome as aluno'));
        $query->join('escolas', 'escolas.id', '=', 'lancamentos.escola');
        $query->leftJoin('turmas', 'turmas.id', '=', 'lancamentos.turma');
        $query->leftJoin('alunos', 'alunos.id', '=', 'lancamentos.aluno');
        if(Auth::user()->escola){
            return $query->where('lancamentos.escola', Auth::user()->escola);
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
            'modelo',
            'tipo',
            'data_hora',
            'local',
            'escola',
            'turma',
            'aluno',
            'descricao'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'lancamentosdatatable_' . time();
    }
}
