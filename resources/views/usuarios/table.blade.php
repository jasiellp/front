<div class="table-responsive-sm">
    <table class="table table-striped" id="usuarios-table">
        <thead>
            <th>Cpf Cnpj</th>
        <th>Data Acesso</th>
        <th>Email</th>
        <th>Nome</th>
        <!-- <th>Senha</th> -->
            <th colspan="3">Action</th>
        </thead>
        <tbody>
        @foreach($usuarios as $usuario)
            <tr>
                <td>{!! isset($usuario->cpf_cnpj) ? $usuario->cpf_cnpj : '' !!}</td>
            <td>{!! $usuario->data_acesso !!}</td>
            <td>{!! $usuario->email !!}</td>
            <td>{!! $usuario->nome !!}</td>
            <!-- <td>{<--!! $usuario->senha !!}</td> -->
                <td>
                    {!! Form::open(['route' => ['usuarios.destroy', $usuario->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('usuarios.show', [$usuario->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('usuarios.edit', [$usuario->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>