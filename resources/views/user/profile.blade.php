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
                                <div class="panel-heading">
                                    <h2 class="panel-title">Ваши данные</h2>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-3" align="center">
                                            <img src="{{ asset('/images/uploads/avatars') }}/{{ $user->avatar }}" id="profile-avatar">
                                            <a href="" id="change-avatar-btn" class="btn btn-warning"><i class="fa fa-camera"></i>&nbsp;Изменить аватар</a>
                                        </div>
                                        <div class="col-md-9 ">
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <td>Ваше имя:</td>
                                                    <td>{{ $user->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Ваш телефон:</td>
                                                    <td>{{ $user->phone_number }}</td>
                                                </tr>
                                                <tr>
                                                    <td>E-mail:</td>
                                                    <td>{{ $user->email }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Пароль:</td>
                                                    <td><a href="" data-toggle="modal" data-target="#edit-password-modal">Изменить пароль</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Ваш адрес:</td>
                                                    <td>{{ $user->address }}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <form action="/user/profile/update_avatar" method="post" enctype="multipart/form-data" id="avatar-upload-form">
                                                <div class="input-group" id="avatar-upload">
                                                    <label class="input-group-btn">
                                                    <span class="btn btn-primary">
                                                        Browse&hellip; <input type="file" style="display: none;" multiple name="avatar">
                                                    </span>
                                                    </label>
                                                    <input type="text" class="form-control" id="image-name" readonly>
                                                </div>
                                                <button class="btn btn-login" id="form-upload-btn">Загрузить</button>
                                                {{ csrf_field() }}
                                            </form>
                                            <a href="" data-toggle="modal" data-target="#edit-profile-modal" class="btn btn-warning pull-right"><i class="fa fa-pencil"></i> Редактировать</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-dismissable alert-danger" id="error-label">
                                <p class="text-center" id="error-text"></p>
                            </div>
                            @if (Session::has('success_message'))
                                <div class="alert alert-dismissable alert-success">
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                    <p class="text-center">{{ Session::get('success_message') }}</p>
                                </div>
                            @endif
                        </div>
                        <div class="tab-pane fade in" id="tab-order-story">
                            <div class="panel panel-info">
                                <div class="panel-heading">История заказов</div>
                                <div class="panel-body">
                                    @if($user->orders)
                                        @foreach($orders as $order)
                                            <div class="panel panel-primary">
                                                <div class="panel-body">
                                                    <ul class="list-group">
                                                    @foreach($order->cart->items as $item)
                                                        <li class="list-group-item">
                                                            <span class="badge">{{ $item['price'] }} руб.</span>
                                                            {{ $item['item']['name'] }} || {{ $item['quantity'] }} шт.
                                                        </li>
                                                    @endforeach
                                                    </ul>
                                                </div>
                                                <div class="panel-footer">
                                                    <strong>Сумма: {{ $order->cart->totalPrice }} руб.</strong> ||
                                                    <strong>Адрес доставки: {{ $order->address }}</strong>
                                                    <strong class="pull-right">
                                                        Дата заказа: {{ $order->created_at }}
                                                    </strong>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <h2><span class="label label-primary center-block">ПОКА ПУСТО</span></h2>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modals.editProfileModal')
    @include('modals.editPasswordModal')
@endsection
