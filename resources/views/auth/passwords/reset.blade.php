@extends('main')

@section('title','| Forgot my Password')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">

                    {!! Form::open(['url' => 'password/reset', 'method' => "POST"]) !!}

                    {{ Form::hidden('token', $token) }}

                    {{ Form::label('email', 'Ваш email:') }}
                    {{ Form::email('email', $email, ['class' => 'form-control']) }}

                    {{ Form::label('password', 'Новый пароль:') }}
                    {{ Form::password('password', ['class' => 'form-control']) }}

                    {{ Form::label('password_confirmation', 'Подтвердите новый пароль:') }}
                    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                    <br>
                    {{ Form::submit('Сброс пароля', ['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection