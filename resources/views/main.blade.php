<!DOCTYPE html>
<html lang="ru">


<head>
@include('partials._head')
</head>


<body>
@include('partials._nav')

@include('partials._messages')

{{ Auth::check() ? "Logged In" : "Logged Out" }}

<div class="container-fluid">


    @yield('content')

</div>

@include('partials._javascript')

@yield('scripts')

</body>

@include('partials._footer')

</html>