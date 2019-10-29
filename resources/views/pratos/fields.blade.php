<!-- 'bootstrap / Toggle Switch Ativo Field' -->
<div class="d-flex align-items-center form-group col-sm-6">
 {!! Form::label('ativo', 'Ativo:') !!}
    <label class="switch switch-label switch-pill switch-primary  ml-2">
        {!! Form::hidden('ativo', 0) !!}
        {!! Form::checkbox('ativo', 1, null,  ['class' => 'switch-input']) !!}
        <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
    </label>
</div>

<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Field -->
<div class="form-group  col-sm-6">
    {!! Form::label('tipo', 'Tipo:') !!}
    {!! Form::text('tipo', null, ['class' => 'form-control']) !!}
</div>


<!-- Descricao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descricao', 'Descricao:') !!}
    {!! Form::textarea('descricao', null, ['class' => 'form-control']) !!}
</div>

<!-- Imagem Field -->
<div class="form-group col-sm-6">
    {!! Form::label('imagem', 'Imagem:') !!}
    {!! Form::file('imagem', ['class' => 'form-control', 'accept' => 'images/*']) !!}

    @if(isset($prato) && file_storage_exists($prato->imagem))
        <a href="{!! file_storage_url($prato->imagem) !!}">Imagem</a>
    @endif
</div>
<div class="clearfix"></div>

<!-- Peso Field -->
<div class="form-group col-sm-6">
    {!! Form::label('peso', 'Peso:') !!}
    {!! Form::text('peso', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pratos.index') !!}" class="btn btn-default">Cancel</a>
</div>
