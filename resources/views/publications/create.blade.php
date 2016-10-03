@extends('main')

@section('title', '| AddPublications')

@section('stylesheets')
    {!! Html::style('src/datetimepicker/css/bootstrap-datetimepicker.css') !!}
    {!! Html::style('src/css/select2.min.css') !!}
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector:'textarea',
            plugins: 'link code'
        });
    </script>

@endsection

@section('navbar')

    <div class="navbar-header">
        <a class="navbar-brand" href="#">Поиск страницы админа или группы ВК в базе:</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <form class="navbar-form navbar-left" role="search">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Поиск админа в базе...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Искать!</button>
      </span>
        </div><!-- /input-group -->
    </form>

    <p class="navbar-text">или</p>


    <form class="navbar-form navbar-left" role="search">

        <div class="input-group">

            <input type="text" class="form-control" placeholder="Поиск группы в базе...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Искать!</button>
      </span>
        </div><!-- /input-group -->
    </form>

@endsection




@section('content')
    <div class="row">
        <div class="col-md-4">
            <h4 class="text-justify">Добавление новой записи:</h4>

                <div class="form-group">
                    {!!Form::open(array('route' => 'publications.store', 'data-parsley-validate'=>'', 'files' => true)) !!}

                    {{Form::label('groupName','Название группы:')}}
                    {{Form::text('groupName',null, array('class'=>'form-control','placeholder'=>'Название группы'))}}

                </div>
                <div class="form-group">

                    {{Form::label('links','Полный адрес на страницу группы:')}}
                    {{Form::text('links',null, array('class'=>'form-control','placeholder'=>'Полный адрес на страницу группы'))}}

                </div>

            <div class="form-group">

                {{Form::label('category_id','Категория группы:')}}
                <select class="form-control data-live-search" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category ->id }}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">

                {{Form::label('tag','Теги на сайте:')}}
                <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">

                {{Form::label('slug','Краткое описание:')}}
                {{Form::text('slug',null, array('class'=>'form-control','required'=>'','minlength'=>'', 'maxlength'=>'255','placeholder'=>'Краткое описание'))}}

            </div>


                <div class="form-group">

                    {{Form::label('priceWithDiscount','Цена для оплаты:')}}
                    {{Form::text('priceWithDiscount',null, array('class'=>'form-control','placeholder'=>'Цена для оплаты'))}}

                </div>

                <div class="form-group">

                    {{Form::label('price','Цена за размещение в группу:')}}
                    {{Form::text('price',null, array('class'=>'form-control','placeholder'=>'Цена за размещение в группу(без скидок)'))}}

                </div>

            <div class="form-group">

                {{Form::label('numberNamePost','Название поста(или название поста с номером):')}}
                {{Form::text('numberNamePost',null, array('class'=>'form-control','placeholder'=>'Название поста(или название поста с номером):'))}}

                <p class="help-block">Пишем название поста согласно нашей группы в ВК. Например: П51, Конкурс или Пресс-релиз</p>
            </div>

                <div class="form-group">

                    {{--{{Form::label('requisitesPurse','Выбор методов оплаты:')}}
                    {{Form::select('requisitesPurse', array('биржа' => 'Биржа ВК', 'яд' => 'ЯД',
                    'wmr' => 'WMR', 'qiwi' => 'QIWI', 'сбер' => 'СБЕР','альфа' => 'Альфа-банк'),
                 null, ['class' => 'selectpicker','multiple title' => 'Выбор кошельков...'])}}--}}

                    {{Form::label('nameOfGoalForCurrentMonth','Название "плана" размещение постов за текущий месяц:')}}
                    {{Form::text('nameOfGoalForCurrentMonth',null, array('class'=>'form-control','placeholder'=>'Название плана'))}}

                </div>
                <div class="form-group">

                    {{Form::label('nameAndSurname','Имя и фамилия админа(или логин):')}}
                    {{Form::text('nameAndSurname',null, array('class'=>'form-control','placeholder'=>'Имя и фамилия админа(или логин):'))}}


                </div>



                <div class="form-group">


                    {{Form::label('adminContact','Полный адрес на страницу админа::')}}
                    {{Form::text('adminContact',null, array('class'=>'form-control','placeholder'=>'Полный адрес на страницу админа:'))}}


                </div>

            {{ Form::label('featured_image', 'Загрузка картинки') }}

            {{Form::file('featured_image')}}

            <div class="form-group">

                {{Form::label('requisites','Реквизиты:')}}
                {{Form::textarea('requisites',null, array('class'=>'form-control','placeholder'=>'Номера кошельков для оплаты','rows'=>"10"))}}

                <p class="help-block">Вводим кошельки через запятую</p>
            </div>

            <div class="form-group">
            {{Form::label('dateWhenPostWasPublishedTextFormat','Дата и время публикации:')}}
                    <div class='input-group date' id='datetimepicker1'>
                        {{Form::text('dateWhenPostWasPublishedTextFormat',null, array('class'=>'form-control'))}}
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>


                {{Form::submit('Добавить',array('class'=>'btn btn-default', 'style' => 'margin-bottom: 20px;'))}}

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
                locale: 'ru'
                //format: "dd, DD-MMM-YYYY HH:mm"
            });
        });

        $('.select2-multi').select2();
    </script>

@endsection



