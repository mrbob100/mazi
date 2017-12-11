@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="wrapper container-fluid">
{!! Form::open(['url'=>route('orderItems' ), 'class'=>'form-horizontal','style'=>'width:800px;',
           'method'=>'POST','enctype'=>'multipart/form-data' ]) !!}
            <div class="form-group">
                {!! Form::label('img','Изображение:',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::file('img',['class'=>'filestyle','data-buttonText'=>'Выберите изображение',
                    'data-buttonName'=>'btn-primary','data-placeholder'=>'Файла нет']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('mini_side','Корректирующее изображение:',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::file('mini_side',['class'=>'filestyle','data-buttonText'=>'Выберите наложение',
                    'data-buttonName'=>'btn-primary','data-placeholder'=>'Файла нет']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs10">
                    {!! Form::button('Сохранить',['class'=>'btn btn-primary','type'=>'submit']) !!}
                </div>
            </div>
            {!! Form::close() !!}


        </div>
    </div>
@endsection