@extends('main')

@section('title', '| All Tags')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Теги</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{$tag->id}}</td>
                        <td><a href="{{ route('tags.show', $tag->id) }}">{{$tag->name}}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div> <!-- end of .col-md-8 -->

        <div class="col-md-3">
            <div class="well">
                {!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}

                <h2>Новый тег</h2>
                {{ Form::label('name', 'Название:') }}
                {{ Form::text('name',null, ['class' => 'form-control'] ) }}
                <br>
                {{ Form::submit('Создать Новый Тег', ['class'=> 'btn btn-primary btn-block']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection