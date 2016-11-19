@extends('modals.modalLayout', [
    'modalName' => 'edit-profile-modal',
    'modalTitle' => 'Изменение данных',
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
    </div>
    <div class="form-group" id="edit-email">
        <label class="control-label" for="email">Email</label>
        <input class="form-control" id="email" name="email" required="" title="Пожалуйста, введите свой email" type="email" value="{{ $user->email }}">
    </div>
    <div class="form-group" id="edit-phone_number">
        <label class="control-label" for="phone_number">Телефон</label>
        <input class="form-control" id="phone_number" name="phone_number" required="" title="Пожалуйста, введите свой номер телефона" type="text" value="{{ $user->phone_number }}">
    </div>
    <div class="form-group">
        <label for="avatar" class="control-label">Аватар</label>
        <div class="input-group">
            <label class="input-group-btn">
                <span class="btn btn-primary">
                    Browse&hellip; <input type="file" style="display: none;" multiple name="avatar">
                </span>
            </label>
            <input type="text" class="form-control" readonly>
        </div>
    </div>
@overwrite