<!-- Comanda Field -->
<div class="form-group col-sm-6">
    {!! Form::label('comanda', 'Comanda:') !!}
    {!! Form::text('comanda', null, ['class' => 'form-control']) !!}
</div>

<!-- Data Criado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('data_criado', 'Data Criado:') !!}
    {!! Form::text('data_criado', null, ['class' => 'form-control','id'=>'data_criado']) !!}
</div>

@section('scripts')
   <script type="text/javascript">
           $('#data_criado').datetimepicker({
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

<!-- Endereco Entrega Field -->
<div class="form-group col-sm-6">
    {!! Form::label('endereco_entrega', 'Endereco Entrega:') !!}
    {!! Form::text('endereco_entrega', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Usuario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usuario', 'Usuario:') !!}
    {!! Form::text('usuario', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pedidos.index') !!}" class="btn btn-default">Cancel</a>
</div>
