
    <nav>
        <div class="line">

        </div>

        <div class="wrap">
            <div class="logo">
                <div class="ltitle">

                    <a href="{{ route('index')  }} "> <img src="{{ asset('public/'.env('THEME')) }}/images/features/logo_bosch_165x54.png" alt="" /></a>
                </div>
            </div>
            <div class="menu-call">
                <p> Заказ обратного звонка</p>
                <div class="menu-wrap">
                    <div class="menu-search-window">
                        <p>{!! Form::open(['url'=>route('productSearch' ), 'class'=>'form-horizontal', 'method'=>'GET' ]) !!}
                            {!! Form::text('q','',['class'=>' search','placeholder'=>'поиск товара']) !!}
                            <span></span>
                        </p>

                        {!! Form::close() !!}</p>
                    </div>
                    <div class="menu-search-art">
                        <i class="material-icons">search</i>
                    </div>
                </div>
            </div>
            <div class="menu-tel">
                <p>Телефон - (555)6755444</p>
                <p>Телефон - (555)6755444</p>
                <p>Телефон - (555)6755444</p>
            </div>
            <div class="menu-cart">   <!-- корзина-->
                <a href="#" onclick="getCart();" class="simpleCart_empty" ><img src="{{ asset('public/'.env('THEME')) }}/images/features/150923s.jpg" alt="" /></a>
                <!--i class="material-icons blot">shopping_cart</i-->
            </div>

        </div>


    </nav>

    <nav>
        <!--  Синее меню - верхнее-->
        <div class="wrap1">

            <menu1>
                <li class="argo1">  <!-- Домик -->
                    <a href="{{ route('index')  }} "> <p style="padding: 2px 0 0 0;" >  <img src="{{ asset('public/'.env('THEME')) }}/images/features/694571.png" alt="" /> </p> </a>
                    <!--i class="material-icons"><p>home</p></i-->

                </li>
                <li class="pointer historyAPI" style="margin: 0 20px 0 -80px;" data-href="{{URL::to('categoryMain')}}"><a href="#" ><p >&nbsp;Каталог&nbsp;</p></a></li>

                <li class="pointer historyAPI"><a href="#"><p>&nbsp;Акция&nbsp;</p></a></li>
                <li class="pointer historyAPI"><a href="#"><p>&nbsp;Оплата&nbsp;</p></a></li>
                <li class="pointer  historyAPI" ><a href="#"><p>&nbsp;Доставка&nbsp;</p></a></li>
                <li class="pointer  historyAPI" ><a href="#"><p>&nbsp;Гарантия&nbsp;</p></a></li>

                @if(!Auth::check())
                    <li class="pointer1  sem">&nbsp;&nbsp;<a href="{{route('cabinet') }}"><span class="glyphicon glyphicon-user"> </span>&nbsp;Войти&nbsp;&nbsp;</a></li>
                @else
                    <li class="pointer1  sem">&nbsp;&nbsp;<a href="{{route('cabinet') }}"><span class="glyphicon glyphicon-user"> </span>&nbsp;Кабинет</a>&nbsp;&nbsp;</li>
                @endif


            </menu1>
        </div>

    </nav>


