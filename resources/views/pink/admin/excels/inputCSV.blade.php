{!! Form::open(['url'=>route('productEdit',['product'=>$data['id']]), 'class'=>'form-horizontal','style'=>'width:800px;',
            'method'=>'POST','enctype'=>'multipart/form-data' ]) !!}


<div class="form-group">
    {!! Form::label('code','Код',['class'=>'col-xs2 control-label']) !!}
    <div class="col-xs8">

        {!! Form::checkbox('code',$data['code'], $data['code']  ,['class'=>'form-control','placeholder'=>'Код']) !!}

    </div>
</div>
<div class="form-group">
    {!! Form::label('category','Категория',['class'=>'col-xs2 control-label']) !!}
    <div class="col-xs8">
        {!! Form::checkbox('category',$data['category'],$data['category'],['class'=>'form-control','placeholder'=>'Категория']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('name','Наименование',['class'=>'col-xs2 control-label']) !!}
    <div class="col-xs8">
        {!! Form::checkbox('name',$data['name'],$data['name'],['class'=>'form-control','placeholder'=>'Наименование']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('description','Краткое описание',['class'=>'col-xs2 control-label']) !!}
    <div class="col-xs8">

        {!! Form::checkbox('description',$data['description'], $data['description']  ,['class'=>'form-control','placeholder'=>'Краткое описание']) !!}

    </div>
</div>
<div class="form-group">
    {!! Form::label('price','Цена',['class'=>'col-xs2 control-label']) !!}
    <div class="col-xs8">
        {!! Form::checkbox('price',$data['price'],$data['price'],['class'=>'form-control','placeholder'=>'Цена']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('img','Изображение',['class'=>'col-xs2 control-label']) !!}
    <div class="col-xs8">
        {!! Form::checkbox('img',$data['img'],$data['img'],['class'=>'form-control','placeholder'=>'Изображение']) !!}
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