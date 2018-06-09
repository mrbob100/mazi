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
    <div class="modal-dialog modal-lg " role="document" style="margin: 30px auto; width: 860px; height: 530px; ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h1 class="modal-title" >Мой набор инструментов</h1>
            </div>
            <div class="modal-body">
                <p>One fine body&hellip;</p>
            </div>
            <div class="modal-end"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
                <a  href="{{route('arrangeContract')}}" data-href="{{URL::to('arrange')}}" data-sign="27" class="btn btn-success">Оформить заказ</a>
                <button type="button" class="btn btn-danger" onclick="clearCart();">Очистить корзину</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


       <div class="modalMain">
           <h1>Заказать звонок</h1>
           <form>
               <input type="text" placeholder="Ваше имя"><br>
               <input type="text" placeholder="Ваш телефон"><br>
               <input type="submit" value="Отправить">
           </form>
       </div>

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
            <a href="{{ route('index')  }}" >  <p> Заказ обратного звонка</p> </a>
               <div class="menu-wrap">
                 <div class="menu-search-window">
                    <p>{!! Form::open(['url'=>route('productSearch' ), 'class'=>'form-horizontal', 'method'=>'GET' ]) !!}
                        {!! Form::text('q','',['class'=>' search','placeholder'=>'Поиск товара']) !!}
                        <span></span>
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
     <li class="pointer historyAPI" style="margin: 0 20px 0 -80px;" ><a href="#" data-href="{{URL::to('categoryMain')}}" data-sign="0" ><p>&nbspСобрать набор&nbsp;</p></a></li>

     <li class="pointer historyAPI" ><a href="#" data-href="{{ URL::to('cabinet')}}"  data-sign="30" ><p>&nbsp;Акция&nbsp;</p></a></li>
     <li class="pointer historyAPI" ><a href="#"  data-href="{{ URL::to('cabinet')}}"  data-sign="31"><p>&nbsp;Оплата&nbsp;</p></a></li>
     <li class="pointer  historyAPI" ><a href="#" data-href="{{ URL::to('cabinet')}}"  data-sign="32"><p>&nbsp;Доставка&nbsp;</p></a></li>
     <li class="pointer  historyAPI" ><a href="#" data-href="{{ URL::to('cabinet')}}"  data-sign="33"><p>&nbsp;Гарантия&nbsp;</p></a></li>

     @if(!Auth::check())
         <li class="pointer1  sem" >&nbsp;&nbsp;<a href="#" data-href="{{ URL::to('cabinet')}}"  data-sign="34"><span class="glyphicon glyphicon-user"> </span>&nbsp;Войти&nbsp;&nbsp;</a></li>
     @else
         <li class="pointer1  sem" >&nbsp;&nbsp;<a href="#" data-href="{{ URL::to('cabinet')}}"  data-sign="35"><span class="glyphicon glyphicon-user"> </span>&nbsp;Кабинет</a>&nbsp;&nbsp;</li>
     @endif


 </menu1>
</div>

</nav>

<ul id="crumbs">

</ul>
       <div id="cabinet">

       </div>
               <div class="secondwrap-02">
                   <div class="rockwel-01"> </div>
                       <div id="mediumMine"></div>

               </div>











<!-- секция боковой каталог -->
<div id="central">
<section class="profit">
<div class="container-wrap"><!-- flex: row-->

 <div class="container-wrap-row">
         <div class=" catalog" >
             <p>  {{ Widget::run('MainWidget') }}</p>
         </div>

         <!--div class=" text" --> <!-- второй левый боковой -->
             <!--ul>
                 <li><a href="#"><p>Статьи </p></a></li>
                 <li><a href="#"><p>Обзоры</p></a></li>
             </ul>
         </div-->

         <div class="item">

             <div class="text" id="insertOption">

             </div>
         </div>

 </div>
     <!-- конец боковых меню-->
 <div class="container-right-wpap">
    @if(Route::currentRouteName()=='index')
         <div class="container-wrap-banner">    <!-- вывод баннера-->
             <img src="{{ asset('public/'.env('THEME')) }}/images/features/banner_001.jpg" alt="banner" />
         </div>
         <div class="slider">
             @yield('sliders')
         </div>
         <div class="profit1">
             <div class="wrap_01">
                @yield('newProducts')
             </div>
         </div>

     @endif

        <div class="piza"  style="background-color: white;"  id="contentHolder">
            <!--вставка html кода из синего меню IP history -->
            @yield('content1')
        </div>
        <div class="pizaText"  style="background-color: white;"  id="contentText">
            <!--вставка html кода из синего меню IP history -->
        </div>
 </div>
<!-- Начало третьей колонки    -->
  <div id="wrap-last">

         <div class="container-right-edge"></div>
             <!--h>Я здесь</h-->

         <div class="container-right-edgest" ></div>

         <div class="container-end"></div>
   </div>

 <div id="uri_last"></div>
</div>
   <div id="footerMy">
       @yield('foorter')
   </div>
</section>



<div class="bg_popUp"></div>
<div class="popUp_fast"> </div>

</div>


<!-- Секция новых продуктов -->


</main>
</body>

<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/jquery.scrollUp.min.js "  ></script>
<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/jquery.cookie.js"  ></script>
<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/jquery.accordion.js"  ></script>
<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/price-range.js" charset="utf-8" ></script>

<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/script.js" charset="utf-8" ></script>




<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/jquery-ui.js" charset="utf-8" ></script>
<!--script type="text/javascript" src=" {--!! asset('public/'.env('THEME')) !!--}/js/vue.min.js" charset="utf-8" ></script-->
<script type='text/javascript' src='{!! asset('public/'.env('THEME')) !!}/js/jquery.nicescroll.min.js'></script>

<script type='text/javascript' src='{!! asset('public/'.env('THEME')) !!}/js/jquery.mousewheel.js'></script>
<script type='text/javascript' src='{!! asset('public/'.env('THEME')) !!}/js/touch.js'></script>
<script type='text/javascript' src='{!! asset('public/'.env('THEME')) !!}/js/imagesloaded.pkgd.min.js'></script>
<script type='text/javascript' src='{!! asset('public/'.env('THEME')) !!}/js/slick.js'></script>
<script type='text/javascript' src='{!! asset('public/'.env('THEME')) !!}/js/jquery.history.js'></script>
<script type='text/javascript' src='{!! asset('public/'.env('THEME')) !!}/js/history.js'></script>
<script type='text/javascript' src='{!! asset('public/'.env('THEME')) !!}/js/jquery-migrate-1.2.1.min.js'></script>
<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/jquery.listen.js"  ></script>
<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/main.js"  ></script>
</html>