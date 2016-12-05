@extends('modals.modalLayout', [
    'modalName' => 'payment-modal',
    'modalTitle' => 'Подтверждение заказа',
    'formAction' => '/user/buy',
    'formID' => 'payment-form',
    'formName' => 'payment-form',
    'modalButtonTitle' => 'Купить'
])

@section('formContent')
    <div class="panel panel-default">
        <div class="panel-heading display-table" >
            <h3 class="panel-title" >Платёжные данные</h3>
        </div>
        <div class="panel-body">
            <div id="payment-errors" class="alert alert-danger hidden"></div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="cardNumber">НОМЕР КАРТЫ</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder="4242 4242 4242 4242"/>
                            <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="cardHolder">ИМЯ ДЕРЖАТЕЛЯ КАРТЫ</label>
                        <input type="text" class="form-control" id="cardHolder" name="cardHolder" placeholder="Имя Держателя Карты"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-7 col-md-7">
                    <div class="form-group">
                        <label for="cardExpiry">ДАТА ИСТЕЧЕНИЯ СРОКА</label>
                        <div class="col-xs-6 col-md-6">
                            <input type="text" class="form-control" id="cardExpMM" name="cardExpMM" placeholder="MM">
                        </div>
                        <div class="col-xs-6 col-md-6">
                            <input type="text" class="form-control" id="cardExpYY" name="cardExpYY" placeholder="YYYY">
                        </div>
                    </div>
                </div>
                <div class="col-xs-2 col-md-2">
                    <div class="form-group">
                        <label for="cardCVC">CVC КОД</label>
                        <input type="text" class="form-control" id="cardCVC" name="cardCVC" placeholder="CVC">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="address">АДРЕС</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Адрес доставки" value="{{ auth()->user()->address }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection