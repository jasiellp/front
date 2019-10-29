<div class="table-responsive-sm">
    <table class="table table-striped" id="comandas-table">
        <thead>
            <!-- <th>Buffet</th> -->
        <th>Buffet Total</th>
        <th>Data</th>
        <th>Embalagem</th>
        <!-- <th>Device Id</th> -->
        <th>Entrega</th>
        <th>Fechado</th>
        <th>Itens</th>
        <th>Itens Total</th>
        <th>Peso Total</th>
        <th>Preço Kg</th>
        <th>Subtotal</th>
        <th>Total</th>
        <th>Valor Embalagem</th>
            <th colspan="3">Action</th>
        </thead>
        <tbody>
        @foreach($comandas as $comanda)
            <tr>
                <!-- <td>{!! $comanda->buffet !!}</td> -->
            <td>{!! $comanda->buffet_total !!}</td>
            <td>{!! $comanda->data !!}</td>
            <td>{!! $comanda->descricao_embalagem !!}</td>
            <!-- <td>{!! $comanda->device_id !!}</td> -->
            <td>{!! $comanda->entrega !!}</td>
            <td>{!! $comanda->fechado !!}</td>
            <td>{!! $comanda->itens !!}</td>
            <td>{!! $comanda->itens_total !!}</td>
            <td>{!! $comanda->peso_total !!}</td>
            <td>{!! $comanda->preco_kg !!}</td>
            <td>{!! $comanda->subtotal !!}</td>
            <td>{!! $comanda->total !!}</td>
            <td>{!! $comanda->valor_embalagem !!}</td>
                <td>
                    {!! Form::open(['route' => ['comandas.destroy', $comanda->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('comandas.show', [$comanda->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('comandas.edit', [$comanda->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>