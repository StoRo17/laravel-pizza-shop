@extends('layouts.app')

@section('title', 'Создание нового товара')

@section('content')
    <div class="col-md-12">
        <a href="/"><-На Главную</a>
        <h3 class="text-center">Создание товара</h3>
        @include('errors.errors')
        {!! Form::open(['files' => true, 'url' => 'create_product']) !!}
            <div class="form-group">
                    <div class="col-md-4">
                        {!! Form::label('name', 'Название товара:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        <hr>
                        {!! Form::label('category', 'Категория:') !!}
                        Пицца {!! Form::radio('category', 'pizza')  !!}
                        Суши {{ Form::radio('category', 'sushi') }}
                        Напитки {{ Form::radio('category', 'drinks') }}
                        Соусы {{ Form::radio('category', 'sausages') }}
                        <br>
                        <hr>
                        <br>
                        {!! Form::label('composition', 'Ингридиенты:') !!}
                        {!! Form::textarea('composition', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-4">
                        {!! Form::label('price', 'Цена товара:') !!}
                        {!! Form::text('price', null, ['class' => 'form-control']) !!}
                        <hr>
                        {!! Form::label('weight', 'Вес:') !!}
                        {!! Form::text('weight', null, ['class' => 'form-control']) !!}
                        <hr>
                        {!! Form::label('description', 'Описание товара:') !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-4">
                        {!! Form::label('diameter', 'Диаметр (если пицца):') !!}
                        {!! Form::text('diameter', null, ['class' => 'form-control']) !!}
                        <hr>
                        <h2>Изображение:</h2>
                        <div class="input-group">
                            <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    Browse&hellip; <input type="file" style="display: none;" multiple name="avatar">
                                </span>
                            </label>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <br><br><br>
                        {!! Form::submit('Добавить товар', ['class' => 'btn btn-success form-control']) !!}
                    </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection