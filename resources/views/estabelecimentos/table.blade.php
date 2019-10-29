<div class="table-responsive-sm">
    <table class="table table-striped" id="estabelecimentos-table">
        <thead>
            <th>Endereco</th>
        <th>Lat Lng</th>
        <th>Nome</th>
        <th>Numero</th>
        <th>Perimetro Entrega</th>
            <th colspan="3">Action</th>
        </thead>
        <tbody>
        @foreach($estabelecimentos as $estabelecimento)
            <tr>
                <td>{!! $estabelecimento->endereco !!}</td>
            <td>{!! $estabelecimento->lat_lng !!}</td>
            <td>{!! $estabelecimento->nome !!}</td>
            <td>{!! $estabelecimento->numero !!}</td>
            <td>{!! $estabelecimento->perimetro_entrega !!}</td>
                <td>
                    {!! Form::open(['route' => ['estabelecimentos.destroy', $estabelecimento->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('estabelecimentos.show', [$estabelecimento->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('estabelecimentos.edit', [$estabelecimento->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>