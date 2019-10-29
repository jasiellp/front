<div class="table-responsive-sm">
    <table class="table table-striped" id="formasPagamentos-table">
        <thead>
        <th>Icone</th>
            <th>Descricao</th>

        <th>Observacao</th>
            <th colspan="3">Action</th>
        </thead>
        <tbody>
        @foreach($formasPagamentos as $formasPagamento)
            <tr>
            <td><img src="{!! file_storage_url($formasPagamento->icone) !!}" style="height: 50px;" /></td>
                <td>{!! $formasPagamento->descricao !!}</td>

            <td>{!! $formasPagamento->observacao !!}</td>
                <td>
                    {!! Form::open(['route' => ['formasPagamentos.destroy', $formasPagamento->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('formasPagamentos.show', [$formasPagamento->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('formasPagamentos.edit', [$formasPagamento->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>