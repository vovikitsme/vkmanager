@extends('main')  {{-- Это страница доступна по адресу /publications/3(id записи в Б.Д. ) --}}

@section('title', '| Action for Table')

@section('stylesheets')
    {!! Html::style('src/datetimepicker/css/bootstrap-datetimepicker.css') !!}
    {!! Html::style('src/css/select2.min.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Название сообщества:</h3>
                </div>
                <div class="panel-body">
                    {{$publication->groupName}}
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Ссылка на сообщество:</h3>
                </div>
                <div class="panel-body">
                    {{$publication->links}}
                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Краткое описание:</h3>
                </div>
                <div class="panel-body">
                    <a href="{{$publication->slug}}" >{{$publication->slug}}</a>
                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Категория:</h3>
                </div>
                <div class="panel-body">
                    {{$publication->category->name}}
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">теги на сайте:</h3>
                </div>
                <div class="panel-body">
                    @foreach($publication->tags as $tag)
                            <span class="label label-default">{{ $tag->name }}</span>
                        @endforeach
                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Подписчики:</h3>
                </div>
                <div class="panel-body">
                    {{$publication->subscribers}}
                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Охват:</h3>
                </div>
                <div class="panel-body">
                    {{$publication->reachingYourAudience}}
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Уник.пос.:</h3>
                </div>
                <div class="panel-body">
                    {{$publication->unicVisitors}}
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Цена конечная</h3>
                </div>
                <div class="panel-body">
                    {{$publication->priceWithDiscount}}
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Цена исходная:</h3>
                </div>
                <div class="panel-body">
                    {{$publication->price}}
                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Реквизиты:</h3>
                </div>
                <div class="panel-body">
                    {!! $publication->requisites !!}
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">День размещения:</h3>
                </div>
                <div class="panel-body">
                    <td>{{ Date::parse($publication->dateWhenPostWasPublishedTextFormat)->format('M j, Y H:i')}}</td>
                </div>
            </div>


        </div>


    <div class = "col-md-4 col-md-offset-2">
        <div class="well">

            <dl class="dl-horizontal">
                <dt>Url: </dt>
                <dd><a href="{{ route('blog.single',$publication->slug) }}">{{route('blog.single',$publication->slug)}}</a></dd>
            </dl>


            <dl class="dl-horizontal">
                <dt>Создана: </dt>
                <dd>{{ Date::parse($publication->created_at)->format('M j, Y H:i')}}</dd>
            </dl>

            <dl class="dl-horizontal">
                <dt>Было обновление: </dt>
                <dd>{{ Date::parse($publication->updated_at)->format('M j, Y H:i')}}</dd>
            </dl>

            <dl class="dl-horizontal">
                <dt>категория на сайте: </dt>
                <dd>{{$publication->category->name}}</dd>
            </dl>

            <hr>

            <div class="row">
                <div class="col-sm-6">
                    {!! Html::LinkRoute('publications.edit', 'Редактировать', array($publication->id),array('class'=>'btn btn-primary btn-block')) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::open(['route' =>['publications.destroy', $publication->id], 'method' => 'DELETE']) !!}


                    {!! Form::submit('Удалить', ['class' =>'btn btn-danger btn-block']) !!}

                    {!! Form::close()!!}
                </div>
            </div>

        </div>
    </div>

        <div class = "col-md-5 col-md-offset-1">
    <div id="backend-comments" style="margin-top: 50px;">
        <h3>Комментариев: <small>{{ $publication->commentsy()->count() }} всего</small> </h3>

        <table class="table">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Почта</th>
                <th>Комментарий</th>
                <th></th>
            </tr>
            </thead>

            <tbody>
            @foreach($publication->commentsy as $comment)
                <tr>
                    <td>{{ $comment->name }}</td>
                    <td>{{ $comment->email }}</td>
                    <td>{{ $comment->comment }}</td>
                    <td>
                        <a href="{{ route('comments.edit', $comment->id ) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span> </a>
                        <a href="{{ route('comments.delete', $comment->id ) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span> </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>



        </div>

    </div>
    @endsection


@section('scripts')

    {!! Html::script('src/datetimepicker/js/moment-with-locales.js') !!}
    {!! Html::script('src/datetimepicker/js/bootstrap-datetimepicker.js') !!}
    {!! Html::script('src/js/select2.min.js') !!}

    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                locale: 'ru',
                defaultDate: "{!! Date::parse($publication->dateWhenPostWasPublishedTextFormat)->format('Y-m-d H:i') !!}",
                format: "dd, DD-MMM-YYYY HH:mm"
            });
        });

    </script>

@endsection