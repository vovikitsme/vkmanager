    @extends('main')
    @section('title', '| Редакт. коммент.')
    @section('content')

        <div class="row">

        <div class="col-md-8 col-md-offset-2"><h2>Редактировать Комментарий</h2>

            {!! Form::model($comment,['route' => ['comments.update',$comment->id], 'method' => 'PUT']) !!}

        {{ Form::label('name', 'Имя: ') }}
        {{ Form::text('name',null,['class'=>'form-control', 'disabled' => 'disabled']) }}


        {{ Form::label('email', 'Email: ') }}
        {{ Form::text('email',null,['class'=>'form-control', 'disabled' => '']) }} {{--  Значение в '', тоже самое что 'disabled' --}}

        {{ Form::label('comment', 'Комментарий: ') }}
        {{ Form::textarea('comment',null,['class'=>'form-control']) }}


        {{ Form::submit('Обновить комментарий', ['class' => 'btn btn-block btn-success', 'style' => 'margin: 15px 0 ;']) }}


            {!! Form::close() !!}

        </div>
       </div>
     @endsection