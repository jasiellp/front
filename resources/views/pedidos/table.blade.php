<div class="table-responsive-sm">
    <table class="table table-striped" id="pedidos-table">
        <thead>
            <!-- <th>Comanda</th> -->
        <th>Data Criado</th>
        <th>Endereco Entrega</th>
        <th>Status</th>
        <th>Usuario</th>
            <th colspan="3">Action</th>
        </thead>
        <tbody>
        @foreach($pedidos as $pedido)
            <tr>
                <!-- <td>{!! $pedido->comanda !!}</td> -->
            <td>{!! $pedido->data_criado !!}</td>
            <td>{!! $pedido->endereco_entrega !!}</td>
            <td>{!! $pedido->status !!}</td>
            <td>{!! $pedido->usuario !!}</td>
                <td>
                    {!! Form::open(['route' => ['pedidos.destroy', $pedido->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('pedidos.show', [$pedido->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('pedidos.edit', [$pedido->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>