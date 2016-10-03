    @extends('main')
    @section('title', '| Удалить коммент.?')
    @section('content')

        <div class="row">
        <div class="col-md-8 col-md-offset-2"><h2>Удалить этот коммент.</h2>
        <p>
            <strong>Имя: </strong> {{ $comment->name }}<br>
            <strong>Email: </strong> {{ $comment->email }}<br>
            <strong>Комментарий: </strong> {{ $comment->comment }}

        </p>

            {{ Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) }}
                 {{ Form::submit('Да, удалить этот комментарий', ['class' => 'btn btn-lg btn-block btn-danger', 'style' => 'margin: 15px 0 ;']) }}
            {{ Form::close() }}

        </div>
        </div>
    @endsection