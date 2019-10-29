<div class="table-responsive-sm">
    <table class="table table-striped" id="buffets-table">
        <thead>
            <th>Data</th>
        <th>Preco Kg</th>
        <th>Pratos</th>
            <th colspan="3">Action</th>
        </thead>
        <tbody>
        @foreach($buffets as $buffet)
            <tr>
                <td>{!! $buffet->data !!}</td>
            <td>{!! $buffet->preco_kg !!}</td>
            <td>{!! isset($buffet->pratos) ? 'Ok' : 'Pendente' !!}</td>
                <td>
                    {!! Form::open(['route' => ['buffets.destroy', $buffet->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('buffets.show', [$buffet->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('buffets.edit', [$buffet->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>