<div id="cart-footer">
	<p style="margin-bottom: 0;" class="text-center">Сумма заказа:</p>
	<h3 id="cart-sum"><span class="label label-primary center-block">{{ $totalPrice }} руб.</span></h3>
	@if (!auth()->guest())
		<a href="" class="btn btn-warning center-block" data-toggle="modal" data-target="#payment-modal"><h4>Оформить</h4></a>
	@else
		<a href="" class="btn btn-warning center-block" data-toggle="modal" data-target="#login-modal"><h4>Оформить</h4></a>
	@endif
	@include('modals.paymentInfoModal')
</div>