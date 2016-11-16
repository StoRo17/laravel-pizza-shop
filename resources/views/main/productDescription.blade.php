@extends('layouts.app')

@section('title', 'Описание товара - {{ $product->name }}')

@section('content')
    @include('layouts.menu')
    <div class="col-md-9">
        <div class="col-md-8">
            <h3 class="text-center">{{ $product->name }}</h3>
            <img src="{{ URL::asset("images/{$product->image}") }}" class="center-block" alt="{{ $product->name }}"
                 title="{{ $product->name }}" style="width: 620px; height: 340px;">
            @if($product->description != NULL)
                <div class="panel panel-default">
                    <div class="panel-heading">Описание:</div>
                    <div class="panel-body">
                        {{ $product->description }}
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">Ингридиенты:</div>
                <div class="panel-body">
                    {{ $product->composition }}
                </div>
            </div>
            @if ($product->diameter)
                <div class="panel panel-info">
                    <div class="panel-heading">Диаметр:</div>
                    <div class="panel-body">
                        {{ $product->diameter }} см
                    </div>
                </div>
            @endif
            <div class="panel panel-success">
                <div class="panel-heading">Стоимость:</div>
                <div class="panel-body">
                    {{ $product->price }} рублей
                </div>
            </div>
            <button type="button" class="btn btn-success btn-lg center-block"><i class="fa fa-shopping-cart "></i>&nbsp;В корзину</button>
        </div>
    </div>
@endsection