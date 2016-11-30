<div id="cart" class="panel panel-info">
	<div class="panel-heading">
		Ваш заказ <i class="fa fa-shopping-cart pull-right fa-lg"></i>
	</div>
	<div class="panel-body" id="cart-items">
		@if (Session::has('cart'))
			@foreach (Session::get('cart')->getItems() as $product)
				@include('cart.cartProductInfo', ['product' => $product])
				@if ($loop->last)
					@include('cart.cartFooter', ['totalPrice' => Session::get('cart')->getTotalPrice()])
				@endif
			@endforeach
		@else
			<h2><span class="label label-primary center-block">Пока пусто</span></h2>
		@endif	
	</div>
</div>