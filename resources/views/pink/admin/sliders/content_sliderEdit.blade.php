<div class="container">
    <div class="wrapper container-fluid">

        {!! Form::open(['url'=>route('sliderEdit',['slider'=>$sliders->id] ), 'class'=>'form-horizontal',
        'method'=>'POST','enctype'=>'multipart/form-data' ]) !!}

        <div class="form-group">
            <div class="col-xs-8">
                {!! Form::hidden('id',$sliders->id) !!}
                {!! Form::label('name','Имя',['class'=>'col-xs2 control-label']) !!}
                {!! Form::text('name',$data['name'],['class'=>'form-control','placeholder'=>'Имя продукта']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-8">
                {!! Form::label('path','Путь',['class'=>'col-xs2 control-label']) !!}
                {!! Form::text('path',$data['path'],['id'=>'editor1','class'=>'form-control','placeholder'=>'Путь']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-8">
                {!! Html::image(asset('public/'.env('THEME')).'/images/'. $data['path'] ,'',['class'=>'img-circle img-responsive', 'width'=>'250px',
                'data-buttonName'=>'btn-primary','data-placeholder'=>$data['path']]) !!}
                {!! Form::hidden('old_images',$data['path']) !!}
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

                <h1>{{$data['product_id']}}</h1>

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