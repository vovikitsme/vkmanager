@extends('main')

@section('title','| Register')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open ()!!}

            {{Form::label('name','Имя:')}}
            {{Form::text('name', null , ['class' => 'form-control'] )}}

            {{Form::label('email','Email:')}}
            {{ Form::email('email',null, ['class' => 'form-control']) }}

            {{Form::label('password','Пароль:')}}
            {{ Form::password('password', ['class' => 'form-control']) }}


            {{Form::label('password_confirmation','Подтвердить пароль:')}}
            {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
            <br>
            {{ Form::submit('Register', ['class' => 'btn btn-primary btn-block']) }}
<br>

            {!! Form::close() !!}
        </div>
    </div>

    @endsection