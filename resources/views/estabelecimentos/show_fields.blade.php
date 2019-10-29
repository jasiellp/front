<!-- Endereco Field -->
<div class="form-group">
    {!! Form::label('endereco', 'Endereco:') !!}
    <p>{!! $estabelecimento->endereco !!}</p>
</div>

<!-- Lat Lng Field -->
<div class="form-group">
    {!! Form::label('lat_lng', 'Lat Lng:') !!}
    <p>{!! $estabelecimento->lat_lng !!}</p>
</div>

<!-- Nome Field -->
<div class="form-group">
    {!! Form::label('nome', 'Nome:') !!}
    <p>{!! $estabelecimento->nome !!}</p>
</div>

<!-- Numero Field -->
<div class="form-group">
    {!! Form::label('numero', 'Numero:') !!}
    <p>{!! $estabelecimento->numero !!}</p>
</div>

<!-- Perimetro Entrega Field -->
<div class="form-group">
    {!! Form::label('perimetro_entrega', 'Perimetro Entrega:') !!}
    <p>{!! $estabelecimento->perimetro_entrega !!}</p>
</div>

