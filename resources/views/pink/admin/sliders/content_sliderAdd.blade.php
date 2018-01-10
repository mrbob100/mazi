
    <h3>  {!! $data['title'] !!}</h3>
<div class="container">
    <div class="wrapper container-fluid">

        {!! Form::open(['url'=>route('sliderAdd'/*,['slider'=>$sliders->id] */), 'class'=>'form-horizontal',
        'method'=>'POST','enctype'=>'multipart/form-data' ]) !!}

        <div class="form-group">
            <div class="col-xs-8">
                {!! Form::label('name','Имя',['class'=>'col-xs2 control-label']) !!}
                {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Имя продукта']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-8">
                {!! Form::label('path','Путь',['class'=>'col-xs2 control-label']) !!}
                {!! Form::text('path',old('path'),['id'=>'editor1','class'=>'form-control','placeholder'=>'Путь']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('img','Изображение:',['class'=>'col-xs2 control-label']) !!}
            <div class="col-xs8" style="width: 780px;">
                {!! Form::file('img',['class'=>'filestyle','data-buttonText'=>'Выберите изображение',
                    'data-buttonName'=>'btn-primary','data-placeholder'=>'Файла нет']) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-8">
                <p> Код продукта </p>

                <h1>{{old('product_id')}}</h1>

            </div>
        </div>

        <div class="form-group">

            <div class="col-xs-10">
                {!! Form::button('Сохранить',['class'=>'btn btn-primary','type'=>'submit']) !!}
            </div>
        </div>
        {!! Form::close() !!}


    </div>
</div>
