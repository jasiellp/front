{!! Form::open(['route' => ['boletims.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <!-- <a href="{{ route('boletims.show', $id) }}" class='btn btn-ghost-success'>
       <i class="fa fa-eye"></i>
    </a> -->
    <a href="{{ route('boletims.edit', $id) }}" class='btn btn-ghost-info'>
       <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-ghost-danger',
        'onclick' => "return confirm('Você tem certeza??')"
    ]) !!}
</div>
{!! Form::close() !!}
