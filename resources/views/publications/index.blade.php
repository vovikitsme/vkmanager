@extends('main')

@section('title', '| Table')

@section('stylesheets')
{!! Html::style('https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css') !!}
{!! Html::style('src/datetimepicker/css/bootstrap-datetimepicker.css') !!}
{!! Html::style('src/css/select2.min.css') !!}
@endsection

@section('navbar')

    <div class="navbar-header">
        <a class="navbar-brand" href="#">Добавить новую запись в таблицу:</a>
        <a href="{{ route('publications.create') }}"class="btn btn-default navbar-btn">Добавить</a>
    </div>
@endsection

@section('content')


        <h1>ТАБЛИЦА ВК</h1>

    <table class="table table-bordered table-hover table-responsive " id="myPagination">

        <thead>
        <tr>
            <th>
                Название<br> сообщества
            </th>
            <th>
                Ссылка на сообщество
            </th>
            <th>
                Категория
            </th>
            <th>
                Подписчики
            </th>
            <th>
                Охват
            </th>
            <th>
                Уник.пос.
            </th>
            <th>
                Цена<br> конечная
            </th>
            <th>
                Цена<br> исходная
            </th>
            <th>
                Реквизиты
            </th>
            <th>
                День размещения
            </th>
            <th>
                № поста (П№)
            </th>
            <th>
                Наличие скриншота
            </th>
            <th>
                Размещено в..(время)
            </th>
            <th>
                Публ. №
            </th>
            <th>
                Ком-<br>мент.?
            </th>
            <th>
                Ре-<br>посты
            </th>
            <th>
                Лай-<br>ки
            </th>
            <th style="width: 130px">
                Действия
            </th>
            <th>
                Название плана<br>месяца
            </th>
        </tr>
        </thead>

        @foreach($publications as $publication)

        <tr>
            <td>{{ trim($publication->groupName) }}</td>
            <td><a href="{{ trim($publication->links)}}" target="_blank">{{ trim(substr($publication->links,14,22))}}</a> </td>
            <td>{{ $publication->category->name }}</td>
            <td>{{ $publication->subscribers }}</td>
            <td>{{ $publication->reachingYourAudience }}</td>
            <td>{{ $publication->unicVisitors }}</td>
            <td>{{ $publication->priceWithDiscount }}</td>
            <td>{{ $publication->price }}</td>
            <td>{{ substr(strip_tags($publication->requisites),0,10) }}</td> {{--  функция "strip_tags" удаляет все теги, которые были получены после установки текст.редактора--}}
            <td>{{ Date::parse($publication->dateWhenPostWasPublishedTextFormat)->format('M j, Y')}}</td>
            <td>{{ $publication->numberNamePost }}</td>
            <td>{{ $publication->screenshot }}</td>
            <td>{{ Date::parse($publication->dateWhenPostWasPublishedTextFormat)->format('H:i')}}</td>
            <td>{{ $publication->numberOfPost }}</td>
            <td>{{ $publication->canWeComment }}</td>
            <td>{{ $publication->reposts }}</td>
            <td>{{ $publication->likes }}</td>
            <td><a href="{{route('publications.show', $publication->id)}}" class="btn btn-default btn-sm">Просмотр</a> <a href="{{route('publications.edit', $publication->id)}}" class="btn btn-default btn-sm">Редакт.</a></td>
            <td>{{ trim($publication->nameOfGoalForCurrentMonth)}}</td>
        </tr>

        @endforeach
        </table>


@endsection

@section('scripts')

    {!! Html::script('src/datatables-1.10.11/js/jquery.dataTables.min.js') !!}
    {!! Html::script('https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap4.min.js') !!}
    {!! Html::script('src/datetimepicker/js/moment-with-locales.js') !!}
    {!! Html::script('src/datetimepicker/js/bootstrap-datetimepicker.js') !!}

    <script>
        $(document).ready(function() {
            $('#myPagination').DataTable( {
                "scrollX": true,
                "pagingType": "full_numbers",
                stateSave: true
            } );
        } );

    </script>



    @endsection