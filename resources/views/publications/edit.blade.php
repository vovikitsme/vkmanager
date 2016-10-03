@extends('main')

@section('title', '| EditPublications')

@section('stylesheets')
    {!! Html::style('src/datetimepicker/css/bootstrap-datetimepicker.css') !!}
    {!! Html::style('src/css/select2.min.css') !!}
@endsection

@section('content')

    <div class="row">

        {!! Form::model($publication,['route' => ['publications.update', $publication->id], 'method' => 'PUT', 'files' => true]) !!}

        <div class="col-md-6">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Название сообщества:</h3>
                </div>
                <div class="panel-body">
                    {{Form::text('groupName',null, array('class'=>'form-control'))}}
                </div>
            </div>





            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Ссылка на сообщество:</h3>
                </div>
                <div class="panel-body">

                    {{Form::text('links',null, array('class'=>'form-control'))}}

                </div>
            </div>



            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Кракая ссылка:</h3>
                </div>
                <div class="panel-body">

                    {{Form::text('slug',null, array('class'=>'form-control'))}}

                </div>
            </div>




            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Категория:</h3>
                </div>
                <div class="panel-body">

                    {{Form::select('category_id', $categories, null, array('class'=>'form-control'))}}

                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">теги на сайте:</h3>
                </div>
                <div class="panel-body">

                    {{Form::select('tags[]', $tags, null, ['class'=>'form-control select2-multi', 'multiple' =>'multiple'])}}

                </div>
            </div>



            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Подписчики:</h3>
                </div>
                <div class="panel-body">

                    {{Form::text('subscribers',null, array('class'=>'form-control'))}}

                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Охват:</h3>
                </div>
                <div class="panel-body">

                    {{Form::text('reachingYourAudience',null, array('class'=>'form-control'))}}

                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Уник.пос.:</h3>
                </div>
                <div class="panel-body">

                    {{Form::text('unicVisitors',null, array('class'=>'form-control'))}}

                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Цена конечная</h3>
                </div>
                <div class="panel-body">

                    {{Form::text('priceWithDiscount',null, array('class'=>'form-control'))}}

                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Цена исходная:</h3>
                </div>
                <div class="panel-body">

                    {{Form::text('price',null, array('class'=>'form-control'))}}

                </div>
            </div>


            {{ Form::label('featured_image', 'Обновить картинку:', ['class' => 'form-spasing-top']) }}
            {{Form::file('featured_image')}}

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Реквизиты:</h3>
                </div>
                <div class="panel-body">

                    {{Form::textarea('requisites',null, array('class'=>'form-control'))}}

                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Дата и время публикации:</h3>
                </div>
                <div class="panel-body">
                    <div class='input-group date' id='datetimepicker1'>
                        <input class="form-control" name="dateWhenPostWasPublishedTextFormat" type="text">
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>
            </div>
        </div>


        <div class = "col-md-4 col-md-offset-2">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Создана: </dt>
                    <dd>{{ Date::parse($publication->created_at)->format('M j, Y H:i')}}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Было обновление: </dt>
                    <dd>{{ Date::parse($publication->updated_at)->format('M j, Y H:i')}}</dd>
                </dl>

                <hr>

                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::LinkRoute('publications.show', 'Отмена', array($publication->id),array('class'=>'btn btn-danger btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {{Form::submit('Обновить', ['class'=>'btn btn-success btn-block'])}}
                    </div>
                </div>

        </div>

        {!! Form::close() !!}
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
                        defaultDate: "{!! Date::parse($publication->dateWhenPostWasPublishedTextFormat)->format('Y-m-d H:i') !!}"
                    });
                });

     $('.select2-multi').select2();
     $('.select2-multi').select2().val({!! json_encode($publication->tags()->getRelatedIds()) !!}).trigger('change');

    </script>

@endsection

