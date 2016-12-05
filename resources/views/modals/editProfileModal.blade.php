@extends('modals.modalLayout', [
    'modalName' => 'edit-profile-modal',
    'modalTitle' => 'Изменение данных',
    'attr' => 'enctype=multipart/form-data',
    'formAction' => '/user/profile/update',
    'formID' => 'editProfileForm',
    'formName' => 'editProfileForm',
    'modalButtonTitle' => 'Изменить'
])

@section('formContent')
    {{ method_field('PATCH') }}
    <div class="form-group" id="edit-name">
        <label class="control-label" for="name">Имя</label>
        <input class="form-control" id="name" name="name" required="" title="Пожалуйста, введите своё имя" type="text" value="{{ $user->name }}">
        <span class="help-block"><strong id="edit-errors-name"></strong></span>
    </div>
    <div class="form-group" id="edit-phone_number">
        <label class="control-label" for="phone_number">Телефон</label>
        <input class="form-control" id="phone_number" name="phone_number" required="" title="Пожалуйста, введите свой номер телефона" type="text" value="{{ $user->phone_number }}">
        <span class="help-block"><strong id="edit-errors-phone_number"></strong></span>
    </div>
    <div class="form-group" id="edit-email">
        <label class="control-label" for="email">Email</label>
        <input class="form-control" id="email" name="email" required="" title="Пожалуйста, введите свой email" type="email" value="{{ $user->email }}">
        <span class="help-block"><strong id="edit-errors-email"></strong></span>
    </div>
    <div class="form-group" id="edit-address">
        <label class="control-label" for="address">Адрес</label>
        <input class="form-control" id="address" name="address" required="" title="Пожалуйста, введите свой адрес" type="address" value="{{ $user->address }}">
        <span class="help-block"><strong id="edit-errors-address"></strong></span>
    </div>
@overwrite