<div class="table-responsive-sm">
    <table class="table table-striped" id="items-table">
        <thead>
            <th>Imagem</th>
        <th>Nome</th>
        <th>Preco</th>
            <th colspan="3">Action</th>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td><img src="{!! file_storage_url($item->imagem) !!}" style="height: 50px;" /></td>
            <td>{!! $item->nome !!}</td>
            <td>{!! $item->preco !!}</td>
                <td>
                    {!! Form::open(['route' => ['items.destroy', $item->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('items.show', [$item->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('items.edit', [$item->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>