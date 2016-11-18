<div class="modal fade" hidden="true" id="register-modal" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="panel panel-filled">
                <div class="panel-body">
                    <form action="/register" id="registerForm" method="post" name="registerForm">
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
                        <div>
                            <button class="btn btn-login center-block">Register</button>
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="panel panel-filled">
                <div class="panel-body">
                    <form action="/login" method="POST" id="loginForm" novalidate>
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

                        <div>
                            <button class="btn btn-login center-block">Войти</button>
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>