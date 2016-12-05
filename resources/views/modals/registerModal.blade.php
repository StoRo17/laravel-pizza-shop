@extends('modals.modalLayout', [
    'modalName' => 'register-modal',
    'modalTitle' => 'Регистрация',
    'formAction' => '/register',
    'formID' => 'registerForm',
    'formName' => 'registerForm',
    'modalButtonTitle' => 'Зарегистрироваться'
])
@section('formContent')
    <div class="form-group" id="register-name">
        <label class="control-label" for="name">Имя</label>
        <input class="form-control" id="name" name="name" placeholder="Иван Иванов" required="" title="Пожалуйста, введите своё имя" type="text">
        <span class="help-block"><strong id="register-errors-name"></strong></span> <span class="help-block small">Ваше имя</span>
    </div>
    <div class="form-group" id="register-email">
        <label class="control-label" for="email">Email</label>
        <input class="form-control" id="email" name="email" placeholder="example@mail.com" required="" title="Пожалуйста, введите свой email" type="email" value="">
        <span class="help-block"><strong id="register-errors-email"></strong></span> <span class="help-block small">Ваш email</span>
    </div>
    <div class="form-group" id="register-phone_number">
        <label class="control-label" for="phone_number">Телефон</label>
        <input class="form-control" id="phone_number" name="phone_number" placeholder="+79999999999" required="" title="Пожалуйста, введите свой номер телефона" type="text" value="">
        <span class="help-block"><strong id="register-errors-phone_number"></strong></span> <span class="help-block small">Ваш номер телефона</span>
    </div>
    <div class="form-group" id="register-address">
        <label class="control-label" for="address">Адрес</label>
        <input class="form-control" id="address" name="address" placeholder="ул.Пушкина, д.2, к.1, кв.17" title="Пожалуйста, введите свой адрес" type="address" value="">
        <span class="help-block"><strong id="register-errors-address"></strong></span> <span class="help-block small">Можно ввести его позже</span>
    </div>
    <div class="form-group" id="register-password">
        <label class="control-label" for="password">Пароль</label>
        <input class="form-control" id="password" name="password" placeholder="********" required="" title="Пожалуйста, введите пароль" type="password" value="">
        <span class="help-block"><strong id="register-errors-password"></strong></span>
    </div>
    <div class="form-group">
        <label class="control-label" for="password-confirm">Подтвердите пароль</label>
        <input class="form-control" id="password-confirm" name="password_confirmation" placeholder="********" type="password">
        <span class="help-block"><strong id="form-errors-password-confirm"></strong></span>
    </div>
@overwrite