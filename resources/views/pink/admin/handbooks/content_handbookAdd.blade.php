
    <div class="container">
        <div class="wrapper container-fluid">
            {!! Form::open(['url'=>route('handbooksAdd'/*,['category'=>$category->id]*/ ), 'class'=>'form-horizontal',
            'method'=>'POST','enctype'=>'multipart/form-data' ]) !!}
            <div class="form-group">
                {!! Form::label('nick','Прозвище',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs-8">
                    {!! Form::text('nick',old('nick'),['class'=>'form-control','placeholder'=>'Введите nickname']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('name','Название',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs-8">
                    {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Введите название позиции']) !!}
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
