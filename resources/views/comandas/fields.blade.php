<!-- Buffet Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('buffet', 'Buffet:') !!}
    {!! Form::textarea('buffet', null, ['class' => 'form-control']) !!}
</div>

<!-- Buffet Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('buffet_total', 'Buffet Total:') !!}
    {!! Form::text('buffet_total', null, ['class' => 'form-control']) !!}
</div>

<!-- Data Field -->
<div class="form-group col-sm-6">
    {!! Form::label('data', 'Data:') !!}
    {!! Form::text('data', null, ['class' => 'form-control','id'=>'data']) !!}
</div>

@section('scripts')
   <script type="text/javascript">
           $('#data').datetimepicker({
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

<!-- Descricao Embalagem Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descricao_embalagem', 'Descricao Embalagem:') !!}
    {!! Form::text('descricao_embalagem', null, ['class' => 'form-control']) !!}
</div>

<!-- Device Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('device_id', 'Device Id:') !!}
    {!! Form::text('device_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Entrega Field -->
<div class="form-group col-sm-6">
    {!! Form::label('entrega', 'Entrega:') !!}
    {!! Form::text('entrega', null, ['class' => 'form-control']) !!}
</div>

<!-- 'bootstrap / Toggle Switch Fechado Field' -->
<div class="d-flex align-items-center form-group col-sm-6">
 {!! Form::label('fechado', 'Fechado:') !!}
    <label class="switch switch-label switch-pill switch-primary  ml-2">
        {!! Form::hidden('fechado', 0) !!}
        {!! Form::checkbox('fechado', 1, null,  ['class' => 'switch-input']) !!}
        <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
    </label>
</div>


<!-- Itens Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('itens', 'Itens:') !!}
    {!! Form::textarea('itens', null, ['class' => 'form-control']) !!}
</div>

<!-- Itens Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('itens_total', 'Itens Total:') !!}
    {!! Form::text('itens_total', null, ['class' => 'form-control']) !!}
</div>

<!-- Peso Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('peso_total', 'Peso Total:') !!}
    {!! Form::text('peso_total', null, ['class' => 'form-control']) !!}
</div>

<!-- Preço Kg Field -->
<div class="form-group col-sm-6">
    {!! Form::label('preco_kg', 'Preço Kg:') !!}
    {!! Form::text('preco_kg', null, ['class' => 'form-control']) !!}
</div>

<!-- Subtotal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subtotal', 'Subtotal:') !!}
    {!! Form::text('subtotal', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::text('total', null, ['class' => 'form-control']) !!}
</div>

<!-- Valor Embalagem Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valor_embalagem', 'Valor Embalagem:') !!}
    {!! Form::text('valor_embalagem', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('comandas.index') !!}" class="btn btn-default">Cancel</a>
</div>
