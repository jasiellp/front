
<div class="row">

    <!-- Data Criado Field -->
    <div class="form-group col-md-4">
        {!! Form::label('data_criado', 'Data Criado:') !!}
        <p>{!! $pedido->data_criado !!}</p>
    </div>

    <!-- Status Field -->
    <div class="form-group col-md-4">
        {!! Form::label('status', 'Status:') !!}
        <p id="status"></p>
    </div>

<!-- Usuario Field -->
<div class="form-group col-md-4">
    {!! Form::label('usuario', 'Usuario:') !!}
    <p>{!! $pedido->usuario !!}</p>
</div>


</div>


<div class="row">

    <!-- Endereco Entrega Field -->
    <div class="form-group col-md-6">
        {!! Form::label('endereco_entrega', 'Endereco Entrega:') !!}
        <br/>
        Rótulo <p id="rotulo"></p>
        <br/>
        Endereço <p id="endereco"></p>
        <br/>
        Número <p id="numero"></p>
        <br/>
        Complemento <p id="complemento"></p>
        <br/>
        Bairro <p id="bairro"></p>
        <br/>
        CEP <p id="cep"></p>
        <br/>
        Estado <p id="estado"></p>
        <br/>
        Instruções <p id="instrucoes"></p>
        <br/>
        Latitude <p id="latitude"></p>
        <br/>
        Longitude <p id="longitude"></p>
    </div>

    <!-- Comanda Field -->
    <div class="form-group col-md-6">
        {!! Form::label('comanda', 'Comanda:') !!}
        <br/>
        Buffet Total <p id="buffet_total"></p>
        <br/>
        Device Id <p id="device_id"></p>
        <br/>
        Forma Pagamento <p id="forma_pagamento"></p>
        <br/>
        Peso Total <p id="peso_total"></p>
        <br/>
        Preço KG <p id="preco_kg"></p>
        <br/>
        Subtotal <p id="subtotal"></p>
        <br/>
        Valor Embalagem <p id="valor_embalagem"></p>
        <br/>
        Entrega <p id="entrega"></p>
        <br/>
        Total <p id="total"></p>
        <br/>
        Rótulo <p id="rotulo"></p>
        <br/>
        Rótulo <p id="rotulo"></p>
        <br/>
        Rótulo <p id="rotulo"></p>
        <br/>
        Rótulo <p id="rotulo"></p>
    </div>


</div>



@section('scripts')
    <script>

    $(document).ready(function(){

        var status = {!! isset($pedido->status) ? $pedido->status : "{values: []}" !!};

        $('#status').html(status.fields.status.stringValue);

        var endereco = {!! isset($pedido->endereco_entrega) ? $pedido->endereco_entrega : "{values: []}" !!};



        $('#rotulo').html(endereco.fields.rotulo.stringValue);
        $('#endereco').html(endereco.fields.endereco.stringValue);
        $('#numero').html(endereco.fields.numero.stringValue);
        $('#complemento').html(endereco.fields.complemento.stringValue);
        $('#bairro').html(endereco.fields.bairro.stringValue);
        $('#cep').html(endereco.fields.cep.stringValue);
        $('#estado').html(endereco.fields.estado.stringValue);
        $('#instrucoes').html(endereco.fields.instrucoes.stringValue);
        $('#latitude').html(endereco.fields.latitude.doubleValue.toString());
        $('#longitude').html(endereco.fields.longitute.doubleValue.toString());

        var comanda = {!! isset($pedido->comanda) ? $pedido->comanda : "{values: []}" !!};

        console.log(comanda);

        $('#buffet_total').html(comanda.fields.buffet_total.doubleValue);
        $('#device_id').html(comanda.fields.device_id.stringValue);
        $('#entrega').html(comanda.fields.entrega.integerValue);
        $('#forma_pagamento').html(comanda.fields.forma_pagamento.mapValue.fields.descricao.stringValue);
        $('#peso_total').html(comanda.fields.peso_total.integerValue);
        $('#preco_kg').html(comanda.fields.preco_kg.integerValue);
        $('#subtotal').html(comanda.fields.subtotal.doubleValue);
        $('#total').html(comanda.fields.total.doubleValue);
        $('#valor_embalagem').html(comanda.fields.valor_embalagem.integerValue);


    });

    </script>
@endsection

