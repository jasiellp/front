<div class="table-responsive-sm">
    <table class="table table-striped" id="pratos-table">
        <thead>
            <th>Ativo</th>
        <th>Descricao</th>
        <th>Imagem</th>
        <th>Nome</th>
        <th>Peso</th>
            <th colspan="3">Action</th>
        </thead>
        <tbody>
        @foreach($pratos as $prato)
            <tr>
                <td>{!! $prato->ativo !!}</td>
            <td>{!! $prato->descricao !!}</td>
            <td><img src="{!! file_storage_url($prato->imagem) !!}" style="height: 50px;" /></td>
            <td>{!! $prato->nome !!}</td>
            <td>{!! $prato->peso !!}</td>
                <td>
                    {!! Form::open(['route' => ['pratos.destroy', $prato->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('pratos.show', [$prato->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('pratos.edit', [$prato->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>