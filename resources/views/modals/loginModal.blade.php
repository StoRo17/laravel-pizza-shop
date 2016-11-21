@extends('modals.modalLayout', [
    'modalName' => 'login-modal',
    'modalTitle' => 'Вход',
    'formAction' => '/login',
    'formID' => 'loginForm',
    'formName' => 'loginForm',
    'modalButtonTitle' => 'Войти'
])

@section('formContent')
    <div class="form-group" id="email-div">
        <label class="control-label" for="email">Email</label>
        <input id="email" type="email" placeholder="example@gmail.com" title="Пожалуйста, введите свой email" required value="" name="email" class="form-control">
        {{-- <div id="form-errors-email" class="has-error"></div> --}}
        <span class="help-block">
            <strong id="form-errors-email"></strong>
        </span>
        <span class="help-block small">Ваш email</span>
    </div>
    <div class="form-group" id="password-div">
        <label class="control-label" for="password">Пароль</label>
        <input type="password" title="Пожалуйста, введите ваш пароль" placeholder="********" required value="" name="password" id="password" class="form-control">
        <span class="help-block">
            <strong id="form-errors-password"></strong>
        </span>
        <span class="help-block small">Ваш пароль</span>
    </div>
    <div class="form-group" id="login-errors">
        <span class="help-block">
            <strong id="form-login-errors"></strong>
        </span>
    </div>
    <div class="form-group">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember"> Запомнить меня
            </label>
        </div>
    </div>
@overwrite


