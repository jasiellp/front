<!-- Cpf Cnpj Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cpf_cnpj', 'Cpf Cnpj:') !!}
    {!! Form::text('cpf_cnpj', null, ['class' => 'form-control']) !!}
</div>

<!-- Data Acesso Field -->
<div class="form-group col-sm-6">
    {!! Form::label('data_acesso', 'Data Acesso:') !!}
    {!! Form::text('data_acesso', null, ['class' => 'form-control','id'=>'data_acesso']) !!}
</div>

@section('scripts')
   <script type="text/javascript">
           $('#data_acesso').datetimepicker({
               format: 'YYYY-MM-DD HH:mm:ss',
               useCurrent: true,
               icons: {
                   up: "icon-arrow-up-circle icons font-2xl",
                   down: "icon-arrow-down-circle icons font-2xl"
               },
               sideBySide: true
           })
       </script>
@endsection

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Senha Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('senha', 'Senha:') !!}
    {!! Form::text('senha', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('usuarios.index') !!}" class="btn btn-default">Cancel</a>
</div>
