<!-- Buffet Field -->
<!-- <div class="form-group">
    {!! Form::label('buffet', 'Buffet:') !!}
    <p>{!! $comanda->buffet !!}</p>
</div> -->
<div class="row">
<!-- Buffet Total Field -->
<div class="form-group col-md-4 ">
    {!! Form::label('buffet_total', 'Buffet Total:') !!}
    <p>{!! $comanda->buffet_total !!}</p>
</div>

<!-- Data Field -->
<div class="form-group col-md-4 ">
    {!! Form::label('data', 'Data:') !!}
    <p>{!! $comanda->data !!}</p>
</div>

<!-- Descricao Embalagem Field -->
<div class="form-group col-md-4 ">
    {!! Form::label('descricao_embalagem', 'Descricao Embalagem:') !!}
    <p>{!! $comanda->descricao_embalagem !!}</p>
</div>

</div>
<div class="row">

    <!-- Device Id Field -->
    <div class="form-group col-md-4 ">
        {!! Form::label('device_id', 'Device Id:') !!}
        <p>{!! $comanda->device_id !!}</p>
    </div>

    <!-- Entrega Field -->
    <div class="form-group col-md-4 ">
        {!! Form::label('entrega', 'Entrega:') !!}
        <p>{!! $comanda->entrega !!}</p>
    </div>

    <!-- Fechado Field -->
    <div class="form-group col-md-4 ">
        {!! Form::label('fechado', 'Fechado:') !!}
        <p>{!! $comanda->fechado !!}</p>
    </div>

</div>

<div class="row">
    <!-- Itens Field -->
    <div class="form-group col-md-4 ">
        {!! Form::label('itens', 'Itens:') !!}
        <p>{!! $comanda->itens !!}</p>
    </div>

    <!-- Itens Total Field -->
    <div class="form-group col-md-4 ">
        {!! Form::label('itens_total', 'Itens Total:') !!}
        <p>{!! $comanda->itens_total !!}</p>
    </div>

    <!-- Peso Total Field -->
    <div class="form-group col-md-4 ">
        {!! Form::label('peso_total', 'Peso Total:') !!}
        <p>{!! $comanda->peso_total !!}</p>
    </div>
</div>
<div class="row">


<!-- Preço Kg Field -->
<div class="form-group col-md-4 ">
    {!! Form::label('preco_kg', 'Preço Kg:') !!}
    <p>{!! $comanda->preco_kg !!}</p>
</div>

<!-- Subtotal Field -->
<div class="form-group col-md-4 ">
    {!! Form::label('subtotal', 'Subtotal:') !!}
    <p>{!! $comanda->subtotal !!}</p>
</div>

<!-- Total Field -->
<div class="form-group col-md-4 ">
    {!! Form::label('total', 'Total:') !!}
    <p>{!! $comanda->total !!}</p>
</div>

</div>
<div class="row">
<!-- Valor Embalagem Field -->
<div class="form-group col-md-6 ">
    {!! Form::label('valor_embalagem', 'Valor Embalagem:') !!}
    <p>{!! $comanda->valor_embalagem !!}</p>
</div>
</div>

<!-- Options Field -->
@if(isset($pratos) && count($pratos))
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered text-center pratos">
            <thead>
            <tr style="background-color: #3c8cbc;color: white;">
            <th>
                    Imagem
                </th>
                <th>
                    Nome
                </th>
                <th>
                    Peso
                </th>
                <th>
                    Tipo
                </th>
                <th>
                    Peso Total
                </th>
                <th>
                    Quantidade
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($pratos as $prato)
                <tr id="{!! $prato->id !!}">
                    <td><img src="{!! file_storage_url($prato->imagem) !!}" style="height: 50px;" /></td>
                    <td>
                        <p>{!! $prato->nome !!}</p>
                    </td>
                    <td>
                        <p>{!! $prato->peso !!}</p>
                    </td>
                    <td>
                        <p>{!! $prato->tipo !!}</p>
                    </td>
                     <td class="peso_total">
                    </td>
                    <td class="quantidade">
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif


@section('scripts')
    <script>

    $(document).ready(function(){

        var pratos = {!! isset($comanda->buffet) ? $comanda->buffet : "{values: []}" !!};


        $('.pratos tbody tr').hide();

        $.each(pratos.values, function (index, value) {
            console.log(value.mapValue.fields);

            $('.pratos tbody tr#'+value.mapValue.fields.prato.stringValue).show();

            $('.pratos tbody tr#'+value.mapValue.fields.prato.stringValue+' .peso_total').html(value.mapValue.fields.peso_total.integerValue);

            $('.pratos tbody tr#'+value.mapValue.fields.prato.stringValue+' .quantidade').html(value.mapValue.fields.quantidade.integerValue);

        });
    });

    </script>
@endsection

