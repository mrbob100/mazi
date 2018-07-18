@section('content')
    <div class="container">
        <div class="wrapper container-fluid">

            {!! Form::open(['url'=>route('quickinfoEdit',['info'=>$data['id']] ), 'class'=>'form-horizontal',
            'method'=>'POST','enctype'=>'multipart/form-data' ]) !!}

            <div class="form-group">
                {!! Form::hidden('id',$data['id']) !!}
                {!! Form::label('name','Имя',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">

                    {!! Form::text('name',$data['name'],['class'=>'form-control','placeholder'=>'Имя заказчика разговора']) !!}
                </div>
            </div>






            <div class="form-group">
                {!! Form::label('phone','Телефон',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('phone',$data['phone'],['id'=>'editor1','class'=>'form-control','placeholder'=>'телефон']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('url','Ссылка на изображение',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('url',$data['url'],['class'=>'form-control','placeholder'=>'Ключевые слова']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('date','Дата',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('date',$data['created_at'],['class'=>'form-control', 'placeholder'=>'Описание']) !!}
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