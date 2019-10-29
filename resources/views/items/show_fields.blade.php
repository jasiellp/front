<!-- Imagem Field -->
<div class="form-group">
    {!! Form::label('imagem', 'Imagem:') !!}
    <p><img src="{!! file_storage_url($item->imagem) !!}" style="height: 150px;" /></p>
</div>

<!-- Nome Field -->
<div class="form-group">
    {!! Form::label('nome', 'Nome:') !!}
    <p>{!! $item->nome !!}</p>
</div>

<!-- Preco Field -->
<div class="form-group">
    {!! Form::label('preco', 'Preco:') !!}
    <p>{!! $item->preco !!}</p>
</div>

