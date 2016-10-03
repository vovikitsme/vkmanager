@extends('main')

@section('title', "| Edit Tag")

@section('content')

{!! Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => "PUT"]) !!}

{{ Form::label('name', 'Наименование') }}

{{ Form::text('name', null, ['class' => 'form-control']) }}

{{Form::submit('Сохранить изменения', ['class' => 'btn btn-success', 'style' => 'margin-top:20px;'])}}


{!! Form::close() !!}

@endsection