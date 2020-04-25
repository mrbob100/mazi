@extends(env('THEME').'.layouts.site')
<div class="header">
    <div class="header-top-strip">
        <div class="container">
            <div class="header-top-left">
                <ul>
                   <li> {!! Form::open(['url'=>route('productSearch' ), 'class'=>'form-horizontal', 'method'=>'GET' ]) !!}
                    {!! Form::text('q','',['class'=>'form-control','style'=>'height:20px; width:100px;','placeholder'=>' поиск']) !!}</p>
                    {!! Form::close() !!}
                   </li>
                    @if(!Auth::check())
                        <li><a href="{{asset('cabinet') }}"><span class="glyphicon glyphicon-user"> </span>Login</a></li>
                    @else
                        <li><a href="{{asset('cabinet') }}"><span class="glyphicon glyphicon-user"> </span>Кабинет</a></li>
                    @endif
                </ul>
            </div>
            <div class="header-right">
                <div class="cart box_1">

                        <!--a href="{--{asset('register.html') }--}"><span class="glyphicon glyphicon-lock"> </span>Create an Account</a-->





                    <a href="{{asset('checkout.html') }}">
                        <h3> <span class="simpleCart_total">0.00</span> (<span id="simpleCart_quantity" class="simpleCart_quantity"> 0 </span>)<img src="images/bag.png" alt=""></h3>
                    </a>
                    <p><a href="{{route('clearance') }}" class="simpleCart_empty">Очистить корзину</a></p>
                    <p style="color: #D8A7AE !important;"><a href="#" onclick="getCart();" class="simpleCart_empty" > Корзина</a></p>
                    <div class="clearfix"> </div>

                </div>

            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
