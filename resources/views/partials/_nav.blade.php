<!-- Default Bootstrap Navbar -->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->

        @yield('navbar')

        <ul class="nav navbar-nav navbar-right">
            @if (Auth::check())
            <li class="{{ Request::is('publications') ? "active": "" }}"><a href="/publications">Главная таблица</a></li>
                <li><a href="{{ route('categories.index') }}">Категории</a></li>
                <li><a href="{{ route('tags.index') }}">Теги</a></li>
                <li class="{{ Request::is('blog') ? "active" : "" }}"><a href="/blog">Блог</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Привет {{Auth::user()->name}} <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Профиль</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ route('logout') }}">Выход</a></li>
                </ul>
            </li>
                @else

            <a href="{{ route('login') }}" class="btn btn-default">Login</a>
                @endif
        </ul>
    </div><!-- /.container-fluid -->
</nav>

