<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
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
                <a class="navbar-brand" href="/">Мама Пицца</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Поиск">
                    </div>
                    <button type="submit" class="btn btn-default"><i class="fa fa-search fa-md"></i>&nbsp;Искать</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="/login"><i class="fa fa-user fa-btn"></i>&nbsp;Войти</a></li>
                        <li><a href="/register"><i class="fa fa-sign-in fa-btn"></i>&nbsp;Регистрация</a></li>
                    @else
                        <li class="dropdown">
                            {{--TODO: write all styles at css file--}}
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position: relative; padding-left: 50px;">
                                <img src="{{ asset('images/uploads/avatars') }}/{{ Auth::user()->avatar }}" alt="Пользователь {{  Auth::user()->name }}"
                                style="width: 32px; height: 32px; position: absolute; top: 10px; left: 10px; border-radius: 50%;">
                                &nbsp;{{  Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu" style="width: 176px;">
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

    <!-- Scripts -->
    @extends('vendor.scripts')
</body>
</html>
