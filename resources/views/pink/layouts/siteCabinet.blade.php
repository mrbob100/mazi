<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="{{isset($meta_desc) ? $meta_desc : '' }}" />
    <meta name="keywords" content="{{isset($keywords) ? $keywords : ''}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$title or 'Bosch'}}</title>
    <link href="{{ asset('public/'.env('THEME')) }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('public/'.env('THEME')) }}/css/animate.css" rel="stylesheet">
    <script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!} /js/jquery.js "  ></script>
    <script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!} /js/bootstrap.min.js"  ></script>

    <link href="{{ asset('public/'.env('THEME')) }}/css/site.css" rel="stylesheet">
    <link href="{{ asset('public/'.env('THEME')) }}/css/jumbotron.css" rel="stylesheet">
    <link href="{{ asset('public/'.env('THEME')) }}/css/animate.css" rel="stylesheet">
    <meta name="csrf-token" content="{!! csrf_token() !!}" />

    <link rel='stylesheet' id='zoom-css'  href='{{ asset('public/'.env('THEME')) }}/css/zoom.css' type='text/css' media='all' />

    <!--script type="text/javascript" src=" {--!! asset('public/'.env('THEME')) !!--}/js/jquery-ui.widget.js" charset="utf-8" ></script>
    <script type="text/javascript" src=" {--!! asset('public/'.env('THEME')) !!--}/js/jquery-ui.mouse.js" charset="utf-8" ></script>
    <script type="text/javascript" src=" {--!! asset('public/'.env('THEME')) !!--}/js/jquery-ui.slider.js" charset="utf-8" ></script-->
    <link href="{{ asset('public/'.env('THEME')) }}/css/component.css" rel="stylesheet">
    <link href="{{ asset('public/'.env('THEME')) }}/css/flexslider.css" media="screen" rel="stylesheet">
    <link href="{{ asset('public/'.env('THEME')) }}/css/normalize.css" rel="stylesheet">
    <link href="{{ asset('public/'.env('THEME')) }}/css/pushy.css" rel="stylesheet">
    <link href="{{ asset('public/'.env('THEME')) }}/css/style.css" rel="stylesheet">
    <!--link href="{--{ asset('public/'.env('THEME')--) }}/css/uroda.css" rel="stylesheet"-->
    <link href="{{ asset('public/'.env('THEME')) }}/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('public/'.env('THEME')) }}/css/jquery-ui.theme.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('public/'.env('THEME')) }}/css/jquery-ui.structure.min.css" rel="stylesheet" type="text/css"/>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

</head>
<body>




<!-- header-section-starts -->

@yield('headers')

<div class="container">
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-lg-3 container-fluid ">




            <div class="logo" >
                <h1  ><a href="{{ route('index')  }} "><span>Bosch</span> </a></h1>

            </div>
            <br/><br/><br/>

            @if(session('status'))

                <div class="alert alert-success">
                    <h3>{!! session('status') !!}</h3>
                </div>
            @endif
            @if(session('Author'))
                <div class="alert alert-success">

                     <p>E-mail:&nbsp  {{ Session::get('Author.email')}}</p>

                    <p>Тел: &nbsp     {{ Session::get('Author.phone')}}</p>
                    <p>Адрес:  &nbsp  {{ Session::get('Author.address')}}</p>
                    <p>Оборот(месячный):  &nbsp  {!! session('Turnover') !!}.00 гр</p>
                    <h2>Скидка на товары :  &nbsp {{ Session::get('Author.status')}}%</h2>
                    <h3>Скидка зависит от объема закупок</h3>

                </div>
                <form>
                    <input type="button" class="alert alert-danger" value="Изменить параметры авторизации" onClick='location.href="{{ route('change') }}"'>
                </form>
            @endif


        </div>



    </div>
</div>




<!-- content-section-starts-here -->
<div class="container">
    <div class="main-content">
        <div class="online-strip">
            <div class="col-md-4 follow-us">
                <h3>follow us : @yield('js')</h3>
            </div>
            <div class="col-md-4 shipping-grid">
                <div class="shipping">
                    <img src="{{ asset('public/'.env('THEME')) }}/images/shipping.png" alt="" />
                </div>
                <div class="shipping-text">
                    <h3>Бесплатная доставка</h3>
                    <p>от 2000 гр.</p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-4 online-order">
                <p>Гарячая линия</p>
                <h3>Tel:999 4567 8902</h3>
            </div>
            <div class="clearfix"></div>
        </div>

    </div>

</div>



@if(Route::currentRouteName()=='cabinet'||Route::currentRouteName()=='cabinetItems')
    <div class="container">
        <div class="row">

            <div class="col-xs-3">
                @yield('leftBar')
            </div>
            <div class=" col-xs-9"   >
                <div id="mediumMine">@yield('content')</div>
            </div>
        </div>
    </div>
@else

    <!-- content-section-I am in col xs-12 -->

    <div >@yield('content')</div>


@endif







@yield('sliders')

<!-- content-section-ends-here -->


<div class="wrap_result">

</div>
@yield('footer')



</body>


<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/jquery.scrollUp.min.js "  ></script>
<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/jquery.cookie.js"  ></script>
<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/jquery.accordion.js"  ></script>
<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/price-range.js" charset="utf-8" ></script>

<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/script.js" charset="utf-8" ></script>

<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/simpleCart.min.js"  ></script>
<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/responsiveslides.min.js"  ></script>
<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/jquery.flexisel.js"  ></script>

<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/main.js"  ></script>
<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/pushy.js"  ></script>
<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/jquery-ui.js" charset="utf-8" ></script>
<!--script type="text/javascript" src=" {--!! asset('public/'.env('THEME')) !!--}/js/vue.min.js" charset="utf-8" ></script-->
<script type='text/javascript' src='{!! asset('public/'.env('THEME')) !!}/js/jquery.nicescroll.min.js'></script>
<script type='text/javascript' src='{!! asset('public/'.env('THEME')) !!}/js/jquery.slider.js'></script>
<script type='text/javascript' src='{!! asset('public/'.env('THEME')) !!}/js/jquery.mousewheel.js'></script>
<script type='text/javascript' src='{!! asset('public/'.env('THEME')) !!}/js/touch.js'></script>
<script type='text/javascript' src='{!! asset('public/'.env('THEME')) !!}/js/zoom.js'></script>

</html>