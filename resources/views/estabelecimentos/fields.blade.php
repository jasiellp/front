<!-- Endereco Field -->
<div class="form-group col-sm-6">
    {!! Form::label('endereco', 'Endereco:') !!}
    {!! Form::text('endereco', null, ['class' => 'form-control']) !!}
</div>

<!-- Lat Lng Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lat_lng', 'Lat Lng:') !!}
    {!! Form::text('lat_lng', null, ['class' => 'form-control']) !!}
</div>

<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Numero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero', 'Numero:') !!}
    {!! Form::text('numero', null, ['class' => 'form-control']) !!}
</div>

<!-- Perimetro Entrega Field -->
<div class="form-group col-sm-6">
    {!! Form::label('perimetro_entrega', 'Perimetro Entrega:') !!}
    {!! Form::number('perimetro_entrega', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('estabelecimentos.index') !!}" class="btn btn-default">Cancel</a>
</div>
