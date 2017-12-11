@extends('layouts.admin')
@section('content')
<div class="container">
<div class="wrapper container-fluid">
    {!! Form::open(['url'=>route('categoryAdd'/*,['category'=>$category->id]*/ ), 'class'=>'form-horizontal',
    'method'=>'POST','enctype'=>'multipart/form-data' ]) !!}
   <div class="form-group">
      {!! Form::label('name','Название',['class'=>'col-xs2 control-label']) !!}
       <div class="col-xs-8">
            {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Введите название категории']) !!}
       </div>
  </div>
    <!--div class="form-group">
        {--!! Form::label('text','Текст',['class'=>'col-xs2 control-label']) !!--}
        <div class="col-xs8">
            {--!! Form::textarea('text',old('text'),['id'=>'editor','class'=>'form-control','placeholder'=>'Введите текст']) !!--}
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
        <div class="col-xs-8">
            {!! Form::number('parent_id',old('parent_id'),['class'=>'form-control','placeholder'=>'Родительская Id']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('keywords','Ключевые слова',['class'=>'col-xs2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('keywords',old('keywords'),['class'=>'form-control','placeholder'=>'Ключевые слова']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('description','Описание',['class'=>'col-xs2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('description',old('description'),['class'=>'form-control','placeholder'=>'Описание']) !!}
        </div>
    </div>
    <div class="form-group">

        <div class="col-xs-10">
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