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

<!-- Preco Kg Field -->
<div class="form-group col-sm-6">
    {!! Form::label('preco_kg', 'Preco Kg:') !!}
    {!! Form::text('preco_kg', null, ['class' => 'form-control']) !!}
</div>

<!-- Pratos Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('pratos', 'Pratos:') !!}
    {!! Form::text('pratos', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('buffets.index') !!}" class="btn btn-default">Cancel</a>
</div>
