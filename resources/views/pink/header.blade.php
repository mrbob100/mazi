<div class="header">
        <nav>
            <div class="line">

            </div>

            <div class="wrap">
                <div class="logo">
                    <div class="ltitle">

                        <img src="{{ asset('public/'.env('THEME')) }}/images/features/logo_bosch_165x54.png" alt="" />
                    </div>
                </div>
                <div class="lsub">
                    <menu>
                        <li><a href="#"><p>Телефон - (555)6755444</p></a></li>
                        <li><a href="#"><p>Заказ звонка</p></a></li>
                        <li><a href="{{route('clearance') }}" ><p>Очистить корзину</p></a></li>
                        <!--li><a href="#"><p>корзина</p></a></li-->
                        <li ><a href="#" onclick="getCart();" class="simpleCart_empty" ><p>  Корзина</p></a></li>

                    </menu>
                </div>


            </div>


        </nav>

        <nav>



            <div class="wrap1">

                <menu1>
                    <li> <ul class="bender">
                            <p>  {{ Widget::run('MainWidget') }}</p>
                        </ul></li>
                    <li><a href="#"><p>Оплата</p></a></li>
                    <li><a href="#"><p>Доставка</p></a></li>
                    <li><a href="#"><p>Гарантия</p></a></li>
                    <li> {!! Form::open(['url'=>route('productSearch' ), 'class'=>'form-horizontal', 'method'=>'GET' ]) !!}
                        {!! Form::text('q','',['class'=>'form-control','style'=>'margin:15px  ;height:20px; width:100px;','placeholder'=>' поиск']) !!}</p>
                        {!! Form::close() !!}
                    </li>
                    @if(!Auth::check())
                        <li><a href="{{asset('cabinet') }}"><span class="glyphicon glyphicon-user"> </span>Login</a></li>
                    @else
                        <li><a href="{{asset('cabinet') }}"><span class="glyphicon glyphicon-user"> </span>Кабинет</a></li>
                    @endif


                </menu1>
            </div>

        </nav>

</div>
