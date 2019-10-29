<!-- Ativo Field -->
<div class="form-group">
    {!! Form::label('ativo', 'Ativo:') !!}
    <p>{!! $prato->ativo !!}</p>
</div>

<!-- Descricao Field -->
<div class="form-group">
    {!! Form::label('descricao', 'Descricao:') !!}
    <p>{!! $prato->descricao !!}</p>
</div>

<!-- Tipo Field -->
<div class="form-group">
    {!! Form::label('tipo', 'Tipo:') !!}
    <p>{!! $prato->tipo !!}</p>
</div>

<!-- Imagem Field -->
<div class="form-group">
    {!! Form::label('imagem', 'Imagem:') !!}
    <p><img src="{!! file_storage_url($prato->imagem) !!}" style="height: 150px;" /></p>
</div>

<!-- Nome Field -->
<div class="form-group">
    {!! Form::label('nome', 'Nome:') !!}
    <p>{!! $prato->nome !!}</p>
</div>

<!-- Peso Field -->
<div class="form-group">
    {!! Form::label('peso', 'Peso:') !!}
    <p>{!! $prato->peso !!}</p>
</div>

