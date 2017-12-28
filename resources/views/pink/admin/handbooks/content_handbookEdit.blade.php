<div class="container">
    <div class="wrapper container-fluid">

        {!! Form::open(['url'=>route('handbooksEdit',['book'=>$data['id']] ), 'class'=>'form-horizontal','style'=>'width:700px;',
        'method'=>'POST','enctype'=>'multipart/form-data' ]) !!}

        <div class="form-group">
            {!! Form::hidden('id',$data['id']) !!}
            {!! Form::label('nick','короткое имя',['class'=>'col-xs2 control-label']) !!}
            <div class="col-xs8">
                {!! Form::text('nick',$data['nick'],['id'=>'editor','class'=>'form-control','placeholder'=>'Введите короткое имя']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('name','Название',['class'=>'col-xs2 control-label']) !!}
            <div class="col-xs8">
                {!! Form::text('name',$data['name'],['class'=>'form-control','placeholder'=>'изменяемая строка']) !!}
            </div>

        </div>
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

            <div class="col-xs10">
                {!! Form::button('Сохранить',['class'=>'btn btn-primary','type'=>'submit']) !!}
            </div>
        </div>
        {!! Form::close() !!}

    </div>
</div>