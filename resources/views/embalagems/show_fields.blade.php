<!-- Descricao Field -->
<div class="form-group">
    {!! Form::label('descricao', 'Descricao:') !!}
    <p>{!! $embalagem->descricao !!}</p>
</div>

<!-- Peso Maximo Field -->
<div class="form-group">
    {!! Form::label('peso_maximo', 'Peso Maximo:') !!}
    <p>{!! $embalagem->peso_maximo !!}</p>
</div>

<!-- Valor Field -->
<div class="form-group">
    {!! Form::label('valor', 'Valor:') !!}
    <p>{!! $embalagem->valor !!}</p>
</div>

