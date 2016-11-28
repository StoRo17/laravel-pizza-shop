<div class="panel panel-primary cart-item-{{ $product['item']['id'] }} item">
	<div class="panel-body">
		<div class="col-md-6">
			<div class="row">
				<p><strong>{{ $product['item']['name'] }}</strong></p>
				<span class="help-block">25 см (400г.)</span>
				<h4><span class="label label-primary">{{ $product['price'] }} руб.</span></h4>
			</div>
		</div>
		<div class="col-md-6" id="cart-count">
			<p class="text-right">Кол.</p>
			<p class="text-right"><span class="label label-default">{{ $product['quantity'] }}</span></p>
			<a href="" product-id="{{ $product['item']['id'] }}" class="btn btn-primary btn-xs delete-from-cart">Удалить</a>
		</div>
	</div>
</div>