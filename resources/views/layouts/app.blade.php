<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>@yield('title')</title>
</head>
<body>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">МамПицца</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Поиск">
                    </div>
                    <button type="submit" class="btn btn-default"><i class="fa fa-search fa-md"></i>&nbsp;Искать</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    @if (auth()->guest())
                        <li><a href="#" data-toggle="modal" data-target="#login-modal"><i class="fa fa-user fa-btn"></i>&nbsp;Войти</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#register-modal"><i class="fa fa-sign-in fa-btn"></i>&nbsp;Регистрация</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" id="navbar-profile" data-toggle="dropdown" role="button" aria-expanded="false">
                                <img src="{{ asset('images/uploads/avatars') }}/{{ auth()->user()->avatar }}" id="navbar-profile-avatar" alt="Пользователь {{  auth()->user()->name }}">
                                &nbsp;{{  auth()->user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/user/profile"><i class="fa fa-user fa-btn"></i>&nbsp;Профиль</a></li>
                                <li><a href="/logout"><i class="fa fa-sign-out fa-btn"></i>&nbsp;Выйти</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    @include('modals.loginModal')
    @include('modals.registerModal')
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
