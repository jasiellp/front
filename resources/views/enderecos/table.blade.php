<div class="table-responsive-sm">
    <table class="table table-striped" id="enderecos-table">
        <thead>
        <th>Rotulo</th>
        <th>Bairro</th>
        <th>Cep</th>
        <th>Cidade</th>
        <th>Complemento</th>
        <th>Endereco</th>
        <th>Estado</th>
        <th>Instrucoes</th>
        <!-- <th>Latitude</th>
        <th>Longitute</th> -->
        <th>Numero</th>

        <!-- <th>Selecionado</th> -->
        <!-- <th>Usuario</th> -->
            <th colspan="3">Action</th>
        </thead>
        <tbody>
        @foreach($enderecos as $endereco)
            <tr>
            <td>{!! $endereco->rotulo !!}</td>
            <td>{!! $endereco->bairro !!}</td>
            <td>{!! $endereco->cep !!}</td>
            <td>{!! $endereco->cidade !!}</td>
            <td>{!! $endereco->complemento !!}</td>
            <td>{!! $endereco->endereco !!}</td>
            <td>{!! $endereco->estado !!}</td>
            <td>{!! $endereco->instrucoes !!}</td>
            <!-- <td>{!! $endereco->latitude !!}</td>
            <td>{!! $endereco->longitute !!}</td> -->
            <td>{!! $endereco->numero !!}</td>

            <!-- <td>{!! $endereco->selecionado !!}</td> -->
            <!-- <td>{!! $endereco->usuario !!}</td> -->
                <td>
                    {!! Form::open(['route' => ['enderecos.destroy', $endereco->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('enderecos.show', [$endereco->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('enderecos.edit', [$endereco->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>