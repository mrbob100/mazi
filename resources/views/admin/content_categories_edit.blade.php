@extends('layouts.admin')
@section('content')
    <div class="container">
<div class="wrapper container-fluid">

    {!! Form::open(['url'=>route('categoryEdit',['category'=>$data['id']] ), 'class'=>'form-horizontal',
    'method'=>'POST','enctype'=>'multipart/form-data' ]) !!}

    <div class="form-group">
        {!! Form::hidden('id',$data['id']) !!}
        {!! Form::label('name','Название',['class'=>'col-xs2 control-label']) !!}
        <div class="col-xs8">
            {!! Form::text('name',$data['name'],['class'=>'form-control','placeholder'=>' Название категории']) !!}
        </div>
    </div>
    <!--div class="form-group">
        {--!! Form::label('text','Текст',['class'=>'col-xs2 control-label']) !!--}
        <div class="col-xs8">
            {--!! Form::textarea('text',old('text'),['id'=>'editor','class'=>'form-control','placeholder'=>'Введите текст']) !!--}
        </div>
    </div-->
    <!--div class="form-group">
       {--!! Form::label('old_images','Изображение:',['class'=>'col-xs2 control-label']) !!--}
       <div class="col-xs-offset-2 col-xs10">
           {--!! Html::image('/asset/img/'.$data['images'],'',['class'=>'img-circle img-responsive', 'width'=>150px,
           'data-buttonName'=>'btn-primary','data-placeholder'=>$data['images']]) !!--}
       </div>
   </div-->
    <!--div class="form-group">
        {--!! Form::label('images','Изображение:',['class'=>'col-xs2 control-label']) !!--}
        <div class="col-xs8">
            {--!! Form::file('images',['class'=>'filestyle','data-buttonText'=>'Выберите изображение',
            'data-buttonName'=>'btn-primary','data-placeholder'=>'Файла нет']) !!--}
        </div>
    </div-->
    <div class="form-group">
        {!! Form::label('parent_id','ParentId',['class'=>'col-xs2 control-label']) !!}
        <div class="col-xs8">
            {!! Form::number('parent_id',$data['parent_id'],['class'=>'form-control','placeholder'=>'Родительская Id']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('keywords','Ключевые слова',['class'=>'col-xs2 control-label']) !!}
        <div class="col-xs8">
            {!! Form::text('keywords',$data['keywords'],['class'=>'form-control','placeholder'=>'Ключевые слова']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('description','Описание',['class'=>'col-xs2 control-label']) !!}
        <div class="col-xs8">
            {!! Form::text('description',$data['description'],['class'=>'form-control','placeholder'=>'Описание']) !!}
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