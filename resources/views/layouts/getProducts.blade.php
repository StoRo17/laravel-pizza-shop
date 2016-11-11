<div class="col-md-9">
    @foreach($products as $product)
        <div class="col-md-4">
            <div class="thumbnail">
                <a href="{{ url("/{$product->category}", $product->id) }}">
                    <img src="{{ URL::asset("{$product->pathToImage}") }}" alt="{{ $product->name }}" title="{{ $product->name }}">
                </a>
                <div class="caption">
                    <h3 class="pull-right">{{ $product->price }} руб.</h3>
                    <h3>{{ $product->name }}</h3>
                    <p id="product_composition">{{ $product->composition }}</p>
                    <a href="" class="btn btn-success"><i class="fa fa-shopping-cart "></i>&nbsp;В корзину</a>
                    <a href="{{ url("/{$product->category}", $product->id) }}" class="btn btn-primary pull-right">
                        Подробнее
                        <i class="fa fa-arrow-right"></i>
                    </a>

                </div>
            </div>
        </div>
    @endforeach
</div>