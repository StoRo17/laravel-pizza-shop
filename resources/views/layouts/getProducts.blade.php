<div class="col-md-9">
    @if (Session::has('success_message'))
        <div class="alert alert-success">
            <p class="text-center">{{ Session::get('success_message') }}</p>
        </div>
    @endif
    @foreach($products as $product)
        <div class="col-md-4">
            <div class="thumbnail">
                <a href="{{ url("/{$product->category}", $product->id) }}">
                    <img src="{{ URL::asset("{$product->pathToImage}") }}"
                         alt="{{ $product->name }}" title="{{ $product->name }}"
                         style="width: 288px; height: 161px;" class="img-responsive">
                </a>
                <div class="caption">
                    <h3 class="pull-right">{{ $product->price }} руб.</h3>
                    <h3 id="product_name">{{ $product->name }}</h3>
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