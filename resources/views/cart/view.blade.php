@extends(env('THEME').'.layouts.site')
@section('content')

@if(session('cart'))
    <div class="container">

    <header id="header_wrapper">

        @if(count($errors)>0)
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('status'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                {{session('status')}}
            </div>
        @endif
     <h3> Ваш заказ</h3> <br/>
    </header>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Фото</th>
                <th>Код товара</th>
                <th>Наименование</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th>Сумма</th>
                <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
            </tr>
            </thead>
            <tbody>

            @foreach(session('cart') as $item )

                <tr class="tabOwl">
                    <td> <img src="{{ asset('public/'.env('THEME')) }}/images/{{ $item['cart.img'] }}  " height="50" alt="картинка"/> </td>
                    <td>{!! $item['cart.code'] !!}    </td>
                    <td>{!! $item['cart.name'] !!}    </td>
                    <td>{!! $item['cart.qty'] !!} </td>
                    <td>{!! $item['cart.price'] !!} </td>
                    <td>{!! $item['cart.qty']*$item['cart.price'] !!} </td>
                    <td><span  data-id = "{!! $item['cart.id'] !!} "  class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                </tr>
            @endforeach

            <tr>
                <td colspan="4">Итого: </td>
                <td>{!! session('cardCommon.qty') !!}  </td>
            </tr>
            <tr>
                <td colspan="4">На сумму: </td>

                <td>   {!!session('cardCommon.sum') !!} </td>
                <td>{!! session('cardCommon.sum') !!}  </td>
            </tr>
            </tbody>
        </table>
    </div>
<div class="wrapper container-fluid">
    @include('auth.social')
    {!! Form::open(['url'=>route('contract'),'class'=>'form-horizontal', 'method'=>'post']) !!}
    {{ csrf_field() }}

    @if(!Auth::check())

        <div class="form-group">
            {!! Form::label('name','Имя',['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::text('name',!isset($data['name']) ? old('name') : $data['name'] ,['class'=>'form-control','placeholder'=>'Ваше имя']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('secondname','Фамилия',['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::text('secondname',!isset($data['secondname']) ? old('secondname') : $data['secondname']  ,['class'=>'form-control','placeholder'=>'Ваша фамилия']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('email','E-mail',['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::text('email',!isset($data['email']) ? old('email') : $data['email'] ,['class'=>'form-control','placeholder'=>'Ваш E-mail']) !!}
            </div>
        </div>

            <div class="form-group">
                {!! Form::label('password','Пароль',['class'=>'col-xs-2 control-label']) !!}
                <div class="col-xs-8">
                    {!! Form::text('password',old('password'),['class'=>'form-control','placeholder'=>'Пароль']) !!}
                </div>
            </div>


        <div class="form-group">
            {!! Form::label('phone','Телефон',['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::text('phone',!isset($data['phone']) ? old('phone') : $data['phone'] ,['class'=>'form-control','placeholder'=>'Телефон']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('address','Адрес',['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::text('address',!isset($data['address']) ?old('address') : $data['address']  ,['class'=>'form-control','placeholder'=>'Ваш адрес']) !!}
            </div>
        </div>

    @endif
    <div class="form-group">
        <div class="col-xs-8">
            {!! Form::button('Заказать',['class'=>'btn btn-primary','type'=>'submit']) !!}
        </div>
    </div>
    {!! Form::close() !!}
</div>

@else
    <h3>Корзина пуста</h3>
 </div>
@endif
@endsection