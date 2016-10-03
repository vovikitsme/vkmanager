@extends('main')

@section('title', '| БЛОГ')

@section('content')


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Р‘Р»РѕРі</h1>
        </div>
    </div>

    @foreach ($publications as $publication)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>{{ $publication->groupName }}</h2>
                <h5>Опубликован: {{ Date::parse($publication->created_at)->format('M j, Y H:i')}}</h5>
                <p>{{ substr($publication->links, 0, 250) }}{{ strlen($publication->links) > 250 ? '...' : "" }}</p>

                <a href="{{ route('blog.single', $publication->slug) }}" class="btn btn-primary">Read More</a>
                <hr>
            </div>
        </div>
    @endforeach

    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                {!! $publications->links() !!}
            </div>
        </div>
    </div>

@endsection
