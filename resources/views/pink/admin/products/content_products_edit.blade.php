@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="wrapper container-fluid">

            {!! Form::open(['url'=>route('productEdit',['product'=>$data['id']] ), 'class'=>'form-horizontal',
            'method'=>'POST','enctype'=>'multipart/form-data' ]) !!}

            <div class="form-group">
                {!! Form::hidden('id',$data['id']) !!}
                {!! Form::label('name','Название',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('name',$data['name'],['class'=>'form-control','placeholder'=>' Название продукта']) !!}
                </div>
            </div>


            <div class="form-group">
                {!! Form::label('category_id','Категория',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {{--$var=$data['parent_id']===0 ? 'самостоятельная категория' : $data->getCategory->name--}}

                    <div class="form-group field-product-category_id has-success">
                        <!--label class="control-label" for="category-parent_id">Родительская категория</label
                        Для вывода виджета использован параметр config['model'] - это объект категории для выборки select.php- выпадающий список
                        -->

                        <select id="product-category_id" class="form-control" name="Production[category_id]">
                            <option value="0">Самостоятельная категория</option>
                            {{ $var=Widget::run('MainWidget',['tpl'=>'select_product.php','model'=>$model]) }}
                            {!! Form::select('category_id', $var,['class'=>'form-control','placeholder'=>'Категория']) !!}
                        </select>
                    </div>


                </div>
            </div>

            <!--div class="form-group">
                {--!! Form::label('category_id','Категория',['class'=>'col-xs2 control-label']) !!--}
                <div class="col-xs8">
                    {--!! Form::text('category_id',$data['category_id'],['class'=>'form-control','placeholder'=>'Введите название категории']) !!--}
                </div>
            </div-->
            <div class="form-group">
                {!! Form::label('content','Текст',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::textarea('content',$data['content'],['id'=>'editor','class'=>'form-control','placeholder'=>'Введите текст']) !!}
                </div>
            </div>


            <div class="form-group">

               {!! Form::label('old_images','Изображение:',['class'=>'col-xs2 control-label']) !!}
               <div class="col-xs-offset-2 col-xs10">
                   {!! Html::image('public/images/'.$data['img'],'',['class'=>'img-circle img-responsive', 'width'=>'50px',
                   'data-buttonName'=>'btn-primary','data-placeholder'=>$data['img']]) !!}
                   {!! Form::hidden('old_images',$data['img']) !!}
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

                {!! Form::label('old_mini_side','Изображение:',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs-offset-2 col-xs10">
                    {!! Html::image('public/images/miniatures/'.$data['mini_side'],'',['class'=>'img-circle img-responsive', 'width'=>'50px',
                    'data-buttonName'=>'btn-primary','data-placeholder'=>$data['mini_side']]) !!}
                    {!! Form::hidden('old_mini_side',$data['mini_side']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('mini_side','Вид сбоку:',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::file('mini_side',['class'=>'filestyle','data-buttonText'=>'Выберите mini изображение',
                    'data-buttonName'=>'btn-primary','data-placeholder'=>'Файла нет']) !!}
                </div>
            </div>

            <div class="form-group">

                {!! Form::label('old_mini_back','Изображение:',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs-offset-2 col-xs10">
                    {!! Html::image('public/images/miniatures/'.$data['mini_back'],'',['class'=>'img-circle img-responsive', 'width'=>'50px',
                    'data-buttonName'=>'btn-primary','data-placeholder'=>$data['mini_back']]) !!}
                    {!! Form::hidden('old_mini_back',$data['mini_back']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('mini_back','Вид сзади:',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::file('mini_back',['class'=>'filestyle','data-buttonText'=>'Выберите mini изображение',
                    'data-buttonName'=>'btn-primary','data-placeholder'=>'Файла нет']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('price','Цена',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('price',$data['price'],['class'=>'form-control','placeholder'=>'Цена']) !!}
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
                {!! Form::label('label','Фасон',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('label',$data['label'],['class'=>'form-control','placeholder'=>'Фасон']) !!}
                </div>
            </div>




            <div class="form-group">
                {!! Form::label('hit','Хит продаж',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">

                    {!! Form::checkbox('hit',$data['hit'], $data['hit']  ,['class'=>'form-control','placeholder'=>'Хит']) !!}

                </div>
            </div>
            <div class="form-group">
                {!! Form::label('new','Новый',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::checkbox('new',$data['new'],$data['new'],['class'=>'form-control','placeholder'=>'Новый']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('sale','Распродажа',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::checkbox('sale',$data['sale'],$data['sale'],['class'=>'form-control','placeholder'=>'Распродажа']) !!}
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