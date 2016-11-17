@extends('layouts.app')

@section('title', 'Профиль')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="tabs">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab-profile" data-toggle="tab"><i class="fa fa-user fa-btn"></i>&nbsp;Мой профиль</a></li>
                        <li><a href="#tab-order-story" data-toggle="tab"><i class="fa fa-cart-arrow-down fa-btn"></i>&nbsp;История заказов</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab-profile">
                            <div class="panel panel-info">
                                <div class="panel panel-heading">
                                    <h2 class="panel-title">Ваши данные</h2>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-3" align="center">
                                            <img src="{{ asset('/images/uploads/avatars') }}/{{ $user->avatar }}" style="width: 150px; height: 150px; border-radius: 50%;">
                                        </div>
                                        <div class="col-md-9 ">
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <td>Ваше имя:</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td><a href="#" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Редактировать</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Ваш телефон:</td>
                                                    <td>{{ $user->phone_number }}</td>
                                                    <td><a href="#" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Редактировать</a></td>
                                                </tr>
                                                <tr>
                                                    <td>E-mail:</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td><a href="#" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Редактировать</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Пароль:</td>
                                                    <td>***********</td>
                                                    <td><a href="#" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Редактировать</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Ваши адреса:</td>
                                                    <td>Всякие окна с адресами</td>
                                                    <td><a href="#" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Редактировать</a></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade in" id="tab-order-story">
                            <p>Тут должна быть история заказов пользователя</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
