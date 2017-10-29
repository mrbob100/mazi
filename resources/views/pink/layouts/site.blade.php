
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
	<link href="{{ asset('public/'.env('THEME')) }}/css/uroda.css" rel="stylesheet">
    <link href="{{ asset('public/'.env('THEME')) }}/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('public/'.env('THEME')) }}/css/jquery-ui.theme.min.css" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('public/'.env('THEME')) }}/css/jquery-ui.structure.min.css" rel="stylesheet" type="text/css"/>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

</head>
<body>


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

	<!-- header-section-starts -->

	@yield('headers')

	<div class="container">
		<div class="row">
			<div class="col-xs-3 col-sm-3 col-lg-3 container-fluid ">




				<div class="logo" >
					<h1  ><a href="{{ route('index')  }} "><span>Bosch</span> </a></h1>
				</div>
			</div>

			<div class="col-xs-9 col-sm-9 col-lg-9 ">


	 <!-- Pushy Menu -->

				<section id="button" >
					<nav class="pushy pushy-left" >
						<div class="pushy-content">
							<ul class="menurastr catalog ">
								<!-- Submenu -->

								{{ Widget::run('MainWidget') }}

							</ul>
						</div>
					</nav>
					<!-- Site Overlay -->
					<div class="site-overlay"></div>

				</section>


				<div class="navbar"  >
					<!--ul class="nav nav-pills  horizontal"-->
					<ul class="nav navbar-nav  horizontal" >

						<!--li class="active"><a href="#"> Home </a></li-->
						<!--li><a href="#"> Sale </a></li>
                        <li><a href="#"> Copmming soon </a></li>
                        <li><a href="#"> Contact us</a> </li-->

						<!--  вывод меню навигаия - главная  О нас   Гарантии-->
						<li>  @yield('navigation')</li>
					</ul>
				</div>




			</div>

		</div>
	</div>


<div class="banner banner_vol">
	<div class="container">

		<div class="banner-bottom">
			<div class="banner-bottom-left">
				<h2>B<br>U<br>Y</h2>
			</div>

			<div class="row">
				<div class="col-xs-7 col-sm-7 col-lg-7 col-xs-offset-2 col-sm-offset-2  col-lg-offset-2  ">
					<ul class="rslides" id="slider4">
					        <li>
								<div class="banner-info">
									<h3>Лучшие цены !</h3>
									<p>Начни у нас...</p>
								</div>
							</li>

							<li>
								<div class="banner-info">
								  <h3>Pack your Bag</h3>
									<p>Start your shopping here...</p>
								</div>
							</li>
					</ul>
				</div>
			</div>
		</div>
					<!--banner-->
	  			<!--script src="js/responsiveslides.min.js"></script-->
			 <script>
			    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager:true,
			        nav:false,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });

			    });
			  </script>

			<div class="clearfix"> </div>
		<div class="row">
			<div class="col-xs-4 col-sm-4 col-lg-4 col-xs-offset-5 col-sm-offset-5  col-lg-offset-5  ">
				<div class="shop">
					<!--a href="{--{asset('single.html') }--}">SHOP COLLECTION NOW</a-->
					<button class="menu-btn" style="margin-top: 25px;color: #81626A;font-family: 'Lato-Regular';
  font-size: 20px;font-style: italic;"> НАЧНИ ВЫБОР ПРЯМО СЕЙЧАС !</button></li>



				</div>
			</div>
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
							<h3>Free Shipping</h3>
							<p>on orders over $ 199</p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-4 online-order">
						<p>Order online</p>
						<h3>Tel:999 4567 8902</h3>
					</div>
					<div class="clearfix"></div>
				</div>

			</div>

		</div>



	@if(Route::currentRouteName()!='product')
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
		<div class="news-letter">
			<div class="container">
				<div class="join">
					<h6>JOIN OUR MAILING LIST</h6>
					<div class="sub-left-right">
						<form>
							<input type="text" value="Enter Your Email Here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Your Email Here';}" />
							<input type="submit" value="SUBSCRIBE" />
						</form>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>

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