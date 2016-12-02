<div class="container-fluid">
    <div class="row">
        <div class="col-md-10">
            @if (Session::has('success_message'))
                <div class="alert alert-dismissable alert-success">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <p class="text-center">{{ Session::get('success_message') }}</p>
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-dismissable alert-danger">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <p class="text-center">{{ Session::get('error') }}</p>
                </div>
            @endif
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="{{ url("/{$product->category}", $product->id) }}">
                            <img src="{{ URL::asset("/images/{$product->image}") }}"
                                 alt="{{ $product->name }}" title="{{ $product->name }}"
                                 style="width: 288px; height: 161px;" class="img-responsive">
                        </a>
                        <div class="caption">
                            <h3 class="pull-right"><span class="label label-info">{{ $product->price }} руб.</span></h3>
                            <h3 id="product_name">{{ $product->name }}</h3>
                            <p id="product_composition">{{ $product->composition }}</p>
                            <a href="" product-id="{{ $product->id }}" class="btn btn-success add-to-cart"><i class="fa fa-shopping-cart"></i>&nbsp;В корзину</a>
                            <a href="{{ url("/{$product->category}", $product->id) }}" class="btn btn-primary pull-right">
                                Подробнее
                                <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-2 sidebar">
            @include('cart.cart')
        </div>  
    </div>
</div>