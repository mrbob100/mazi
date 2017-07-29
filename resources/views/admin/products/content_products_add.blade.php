@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="wrapper container-fluid">
            {!! Form::open(['url'=>route('productAdd'/*,['category'=>$category->id]*/ ), 'class'=>'form-horizontal',
            'method'=>'POST','enctype'=>'multipart/form-data' ]) !!}
            <div class="form-group">
                {!! Form::label('name','Название',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Введите название продукции']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('category_id','Категория',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('category_id',old('category_id'),['class'=>'form-control','placeholder'=>'Введите название категории']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('content','Текст',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::textarea('content',old('content'),['id'=>'editor','class'=>'form-control','placeholder'=>'Введите текст']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('img','Изображение:',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::file('img',['class'=>'filestyle','data-buttonText'=>'Выберите изображение',
                    'data-buttonName'=>'btn-primary','data-placeholder'=>'Файла нет']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('mini','mini-изображение:',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::file('mini',['class'=>'filestyle','data-buttonText'=>'Выберите mini изображение',
                    'data-buttonName'=>'btn-primary','data-placeholder'=>'Файла нет']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('price','Цена',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::number('price',old('price'),['class'=>'form-control','placeholder'=>'Цена']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('keywords','Ключевые слова',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('keywords',old('keywords'),['class'=>'form-control','placeholder'=>'Ключевые слова']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('description','Описание',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('description',old('description'),['class'=>'form-control','placeholder'=>'Описание']) !!}
                </div>
            </div>


            <div class="form-group">
                {!! Form::label('label','Фасон',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('label',old('label'),['class'=>'form-control','placeholder'=>'Фасон']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('hit','Хит продаж',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('hit',old('hit'),['class'=>'form-control','placeholder'=>'Хит продаж']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('new','Новый',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('new',old('new'),['class'=>'form-control','placeholder'=>'Новый']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('sale','Распродажа',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('sale',old('sale'),['class'=>'form-control','placeholder'=>'Распродажа']) !!}
                </div>
            </div>


            <div class="form-group">
                <div class="col-xs10">
                    {!! Form::button('Сохранить',['class'=>'btn btn-primary','type'=>'submit']) !!}
                </div>
            </div>
            {!! Form::close() !!}
            <script>
                CKEDITOR.replace('editor');
            </script>
        </div>
    </div>
@endsection