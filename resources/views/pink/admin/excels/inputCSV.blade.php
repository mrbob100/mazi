
<h3>  {!! $data['title'] !!}</h3>
<div class="container">

{!! Form::open(['url'=>route('exportIt'/*,['product'=>$data['id']]*/), 'class'=>'form-horizontal','style'=>'width:800px;',
            'method'=>'POST','enctype'=>'multipart/form-data' ]) !!}


<div class="form-group">
    {!! Form::label('code','Код',['class'=>'col-xs2 control-label']) !!}
    <div class="col-xs8">

        {!! Form::checkbox('code',old('code'), old('code')  ,['class'=>'form-control','placeholder'=>'Код']) !!}

    </div>
</div>
<div class="form-group">
    {!! Form::label('category_id','Категория',['class'=>'col-xs2 control-label']) !!}
    <div class="col-xs8">
        {!! Form::checkbox('category_id',old('category_id'),old('category_id'),['class'=>'form-control','placeholder'=>'Категория']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('name','Наименование',['class'=>'col-xs2 control-label']) !!}
    <div class="col-xs8">
        {!! Form::checkbox('name',old('name'),old('name'),['class'=>'form-control','placeholder'=>'Наименование']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('description','Краткое описание',['class'=>'col-xs2 control-label']) !!}
    <div class="col-xs8">

        {!! Form::checkbox('description',old('description'), old('description')  ,['class'=>'form-control','placeholder'=>'Краткое описание']) !!}

    </div>
</div>

<div class="form-group">
    {!! Form::label('text','Полное описание',['class'=>'col-xs2 control-label']) !!}
    <div class="col-xs8">

        {!! Form::checkbox('text',old('text'), old('text')  ,['class'=>'form-control','placeholder'=>'Полное описание']) !!}

    </div>
</div>
<div class="form-group">
    {!! Form::label('price','Цена',['class'=>'col-xs2 control-label']) !!}
    <div class="col-xs8">
        {!! Form::checkbox('price',old('price'),old('price'),['class'=>'form-control','placeholder'=>'Цена']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('img','Изображение',['class'=>'col-xs2 control-label']) !!}
    <div class="col-xs8">
        {!! Form::checkbox('img',old('img'),old('img'),['class'=>'form-control','placeholder'=>'Изображение']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('type','Тип продукции',['class'=>'col-xs2 control-label']) !!}
    <div class="col-xs8">

        {!! Form::checkbox('type',old('type'), old('type')  ,['class'=>'form-control','placeholder'=>'Тип продукции']) !!}

    </div>
</div>
<div class="form-group">
    {!! Form::label('country','Страна',['class'=>'col-xs2 control-label']) !!}
    <div class="col-xs8">
        {!! Form::checkbox('country',old('country'),old('country'),['class'=>'form-control','placeholder'=>'Страна']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('groupTools','Группа',['class'=>'col-xs2 control-label']) !!}
    <div class="col-xs8">
        {!! Form::checkbox('groupTools',old('groupTools'),old('groupTools'),['class'=>'form-control','placeholder'=>'Эксцентриковые, прямые, вибрационные']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('new','Новый',['class'=>'col-xs2 control-label']) !!}
    <div class="col-xs8">
        {!! Form::checkbox('new',old('new'),old('new'),['class'=>'form-control','placeholder'=>'Новый']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('hit','Хит продаж',['class'=>'col-xs2 control-label']) !!}
    <div class="col-xs8">

        {!! Form::checkbox('hit',old('hit'), old('hit')  ,['class'=>'form-control','placeholder'=>'Хит']) !!}

    </div>
</div>

<div class="form-group">
    {!! Form::label('sale','Распродажа',['class'=>'col-xs2 control-label']) !!}
    <div class="col-xs8">
        {!! Form::checkbox('sale',old('sale'),old('sale'),['class'=>'form-control','placeholder'=>'Распродажа']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('weightbrutto','Брутто вес',['class'=>'col-xs2 control-label']) !!}
    <div class="col-xs8">

        {!! Form::checkbox('weightbrutto',old('weightbrutto'), old('weightbrutto')  ,['class'=>'form-control','placeholder'=>'Брутто вес']) !!}

    </div>
</div>
<div class="form-group">
    {!! Form::label('weightnetto','Чистый вес',['class'=>'col-xs2 control-label']) !!}
    <div class="col-xs8">
        {!! Form::checkbox('weightnetto',old('weightnetto'),old('weightnetto'),['class'=>'form-control','placeholder'=>'Чистый вес']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('width','Ширина',['class'=>'col-xs2 control-label']) !!}
    <div class="col-xs8">
        {!! Form::checkbox('width',old('width'),old('width'),['class'=>'form-control','placeholder'=>'Ширина']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('length','Длина',['class'=>'col-xs2 control-label']) !!}
    <div class="col-xs8">

        {!! Form::checkbox('length',old('length'), old('length')  ,['class'=>'form-control','placeholder'=>'Длина']) !!}

    </div>
</div>

<div class="form-group">
    {!! Form::label('height','Высота',['class'=>'col-xs2 control-label']) !!}
    <div class="col-xs8">
        {!! Form::checkbox('height',old('height'),old('height'),['class'=>'form-control','placeholder'=>'Высота']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('termGuarantee','Срок гарантии',['class'=>'col-xs2 control-label']) !!}
    <div class="col-xs8">
        {!! Form::checkbox('termGuarantee',old('termGuarantee'),old('termGuarantee'),['class'=>'form-control','placeholder'=>'Срок гарантии']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('class','Класс инструмента',['class'=>'col-xs2 control-label']) !!}
    <div class="col-xs8">

        {!! Form::checkbox('class',old('class'), old('class')  ,['class'=>'form-control','placeholder'=>'Класс инструмента']) !!}

    </div>
</div>
<div class="form-group">
    {!! Form::label('packing','Упаковка',['class'=>'col-xs2 control-label']) !!}
    <div class="col-xs8">
        {!! Form::checkbox('packing',old('packing'),old('packing'),['class'=>'form-control','placeholder'=>'Упаковка']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('company','Производитель',['class'=>'col-xs2 control-label']) !!}
    <div class="col-xs8">
        {!! Form::checkbox('company',old('company'),old('company'),['class'=>'form-control','placeholder'=>'Компания роизводитель']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('exactlyType1','Характеристики',['class'=>'col-xs2 control-label']) !!}
    <div class="col-xs8">

        {!! Form::checkbox('exactlyType1',old('exactlyType1'), old('exactlyType1')  ,['class'=>'form-control','placeholder'=>'Дополнительные характеристики']) !!}

    </div>
</div>
<div class="form-group">
    {!! Form::label('sclad','На складе',['class'=>'col-xs2 control-label']) !!}
    <div class="col-xs8">
        {!! Form::checkbox('sclad',old('sclad'),old('sclad'),['class'=>'form-control','placeholder'=>'На складе']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('ukvd','Код УКВД',['class'=>'col-xs2 control-label']) !!}
    <div class="col-xs8">
        {!! Form::checkbox('ukvd',old('ukvd'),old('ukvd'),['class'=>'form-control','placeholder'=>'Код УКВД']) !!}
    </div>
</div>


<div class="form-group">
    <div class="col-xs10">
        {!! Form::button('Сохранить',['class'=>'btn btn-primary','type'=>'submit']) !!}
    </div>
</div>
{!! Form::close() !!}
</div>
