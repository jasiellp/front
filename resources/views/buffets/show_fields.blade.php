
<div class="row">
    <!-- Data Field -->
    <div class="col-md-6 form-group">
        {!! Form::label('data', 'Data:') !!}
        <p>{!! $buffet->data !!}</p>
    </div>

        <!-- Preco Kg Field -->
    <div class="col-md-6 form-group">
        {!! Form::label('preco_kg', 'Preco Kg:') !!}
        <p>{!! $buffet->preco_kg !!}</p>
    </div>

</div>

<!-- Pratos Field -->
<!-- <div class="form-group">
    {!! Form::label('pratos', 'Pratos:') !!}
    <p>{<--!! $buffet->pratos !!}</p>
</div> -->

<!-- Options Field -->
@if(isset($pratos) && count($pratos))
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered text-center">
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
                    Descrição
                </th>
                <th>
                    Ação
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($pratos as $prato)
                <tr>
                    <td>
                        <img src="{{ str_replace('public', '/storage', $prato->imagem) }}" style="height: 30px;" />
                    </td>
                    <td>
                        <p>{!! $prato->nome !!}</p>
                    </td>
                    <td>
                        <p>{!! $prato->peso !!}</p>
                    </td>
                    <td>
                        <p>{!! $prato->descricao !!}</p>
                    </td>
                    <td>
                        <button id="{!! $prato->id !!}" class="botao" >Adicionar</button>
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

        var pratos = {!! isset($buffet->pratos) ? $buffet->pratos : "{values: []}" !!};

        $.each(pratos.values, function (index, value) {
            var aux = value.referenceValue.toString().split('/');

            $('#'+aux[6]).text('Remover').attr('style', 'border: none; color: red');

        });

        $('.botao').click(function(){

            var id = '{!! $buffet->id !!}';

            var idItem = $(this).attr('id');

            var item = {'referenceValue': 'projects/mgourmet-89170/databases/(default)/documents/pratos/' + idItem};

            if($(this).text() == 'Adicionar'){

                console.log(item);

                pratos['values'].push(item);

                console.log(pratos['values']);

                var object = '{"pratos":"'+JSON.stringify(pratos).toString().replace(/[\\"']/g, '\\$&').replace(/\u0000/g, '\\0')+'"}';

                console.log(object);

                $.ajax({
                    type: "PUT",
                    url: '/api/buffets/'+id,
                    data: object,
                    contentType: 'application/json',
                }).done(function (data) {
                    console.log(data);
                    if(data['success'] == true){
                        $('#'+idItem).text('Remover').attr('style', 'border: none; color: red');
                    }
                    
                    
                });

            } else {

                console.log(pratos['values']);

                $.each(pratos['values'], function (index, value) {

                    console.log(value);
                    console.log(item['referenceValue']);
                    

                    if(value != undefined && value['referenceValue'] == item['referenceValue']){
                        console.log(index);
                        pratos['values'].splice(index,1);
                    }

                    
                });

                var object = '{"pratos":"'+JSON.stringify(pratos).toString().replace(/[\\"']/g, '\\$&').replace(/\u0000/g, '\\0')+'"}';


                $.ajax({
                    type: "PUT",
                    url: '/api/buffets/'+id,
                    data: object,
                    contentType: 'application/json',
                }).done(function (data) {
                    console.log(data);
                    if(data['success'] == true){
                        $('#'+idItem).text('Adicionar').removeAttr('style');
                    }
                });
            }
        });


    });

    </script>
@endsection

