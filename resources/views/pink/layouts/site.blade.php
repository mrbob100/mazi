<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{isset($meta_desc) ? $meta_desc : '' }}" />
    <meta name="keywords" content="{{isset($keywords) ? $keywords : ''}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$title or 'Bosch'}}</title>

    <!--link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap-flex.min.css" rel="stylesheet"-->
    <link href="{{ asset('public/'.env('THEME')) }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('public/'.env('THEME')) }}/css/animate.css" rel="stylesheet">
    <link href="{{ asset('public/'.env('THEME')) }}/css/normalize.css" rel="stylesheet">
    <script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!} /js/jquery.js "  ></script>
    <script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!} /js/bootstrap.min.js"  ></script>

    <link href="{{ asset('public/'.env('THEME')) }}/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('public/'.env('THEME')) }}/css/jquery-ui.theme.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('public/'.env('THEME')) }}/css/jquery-ui.structure.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('public/'.env('THEME')) }}/css/lucky.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('public/'.env('THEME')) }}/css/smart.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('public/'.env('THEME')) }}/css/reset.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('public/'.env('THEME')) }}/css/slick.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('public/'.env('THEME')) }}/css/slick-theme.css" rel="stylesheet" type="text/css"/>

    <!--link href="{--{ asset('public/'.env('THEME')) }--}/css/flexslider.css" rel="stylesheet"  media="screen" type="text/css"/-->
    <script defer type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/jquery.flexisel.js" charset="utf-8" ></script>


    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Playfair+Display" rel="stylesheet">
</head>
<body>
   <main>
<div class="modal fade" id="cart" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg " role="document" style="margin: 30px auto; width: 1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Корзина</h4>
            </div>
            <div class="modal-body">
                <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
                <a href="{{ route('arrangeContract') }}" class="btn btn-success">Оформить заказ</a>
                <button type="button" class="btn btn-danger" onclick="clearCart();">Очистить корзину</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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
                    <li class="pointer " style="margin: 0 20px 0 -80px;"><a href="#" ><p >&nbsp;Каталог&nbsp;</p></a></li>
                    <li class="pointer"><a href="#"><p>&nbsp;Акция&nbsp;</p></a></li>
                    <li class="pointer"><a href="#"><p>&nbsp;Оплата&nbsp;</p></a></li>
                    <li class="pointer" ><a href="#"><p>&nbsp;Доставка&nbsp;</p></a></li>
                    <li class="pointer" ><a href="#"><p>&nbsp;Гарантия&nbsp;</p></a></li>

                    @if(!Auth::check())
                        <li class="pointer1 sem">&nbsp;&nbsp;<a href="{{asset('cabinet') }}"><span class="glyphicon glyphicon-user"> </span>&nbsp;Войти&nbsp;&nbsp;</a></li>
                    @else
                        <li class="pointer1 sem">&nbsp;&nbsp;<a href="{{asset('cabinet') }}"><span class="glyphicon glyphicon-user"> </span>&nbsp;Кабинет</a>&nbsp;&nbsp;</li>
                    @endif


                </menu1>
         </div>

</nav>



<!-- секция боковой каталог -->

<section class="profit">
    <div class="container-wrap">
        <div class="container-wrap-row">
                <div class=" catalog" >
                    <p>  {{ Widget::run('MainWidget') }}</p>
                    <!--p>  {--{ dd(Widget::run('MainWidget')) }--}</p-->
                </div>
            @if(Route::currentRouteName()!='index')
                <div class="item">

                    <div class="text">
                        @yield('leftBar')
                    </div>
                </div>
            @endif
        </div>
   @if(Route::currentRouteName()=='index')
        <div class="container-wrap-banner">    <!-- вывод баннера-->
        </div>
    @else
        <div class="item" id="mediumMine">
                @yield('content')
        </div>
        @endif

    </div>

</section>

<section class="slider">
    @yield('sliders')
</section>

<section class="profit1">

           <div class="wrap_01">
               @if(Route::currentRouteName()=='index')


                   @yield('newProducts')
               @endif
           </div>
</section>


<!-- Секция новых продуктов -->


 </main>


<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/jquery.scrollUp.min.js "  ></script>
<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/jquery.cookie.js"  ></script>
<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/jquery.accordion.js"  ></script>
<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/price-range.js" charset="utf-8" ></script>

<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/script.js" charset="utf-8" ></script>


<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/main.js"  ></script>

<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/jquery-ui.js" charset="utf-8" ></script>
<!--script type="text/javascript" src=" {--!! asset('public/'.env('THEME')) !!--}/js/vue.min.js" charset="utf-8" ></script-->
<script type='text/javascript' src='{!! asset('public/'.env('THEME')) !!}/js/jquery.nicescroll.min.js'></script>

<script type='text/javascript' src='{!! asset('public/'.env('THEME')) !!}/js/jquery.mousewheel.js'></script>
<script type='text/javascript' src='{!! asset('public/'.env('THEME')) !!}/js/touch.js'></script>
<script type='text/javascript' src='{!! asset('public/'.env('THEME')) !!}/js/imagesloaded.pkgd.min.js'></script>
<script type='text/javascript' src='{!! asset('public/'.env('THEME')) !!}/js/slick.js'></script>
   <script type='text/javascript' src='{!! asset('public/'.env('THEME')) !!}/js/jquery-migrate-1.2.1.min.js'></script>
</body>
</html>