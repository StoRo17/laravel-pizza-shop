@extends('modals.modalLayout', [
    'modalName' => 'edit-password-modal',
    'modalTitle' => 'Изменение пароля',
    'formAction' => '/user/profile/update_password',
    'formID' => 'editPasswordForm',
    'formName' => 'editPasswordForm',
    'modalButtonTitle' => 'Изменить пароль'
])

@section('formContent')
    {{ method_field('PATCH') }}
    <div class="form-group" id="edit-password">
        <label class="control-label" for="old_password">Текущий пароль</label>
        <input class="form-control" id="old_password" name="old_password" placeholder="********" required="" title="Пожалуйста, введите пароль" type="password" value="">
        <span class="help-block"><strong id="errors-old_password"></strong></span>
    </div>
    <div class="form-group" id="new-password">
        <label class="control-label" for="new_password">Новый пароль</label>
        <input class="form-control" id="new_password" name="new_password" required="" title="Пожалуйста, введите новый пароль" type="password" value="">
        <span class="help-block"><strong id="errors-new_password"></strong></span>
    </div>
    <div class="form-group" id="new-password_confirmation">
        <label class="control-label" for="new_password_confirmation">Подтверждение нового пароля</label>
        <input class="form-control" id="new_password_confirmation" name="new_password_confirmation" required="" title="Пожалуйста, введите подтверждение пароля" type="password" value="">
    </div>
@overwrite