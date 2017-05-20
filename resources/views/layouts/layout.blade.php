
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/animate.css') }}" rel="stylesheet">
    <script type="text/javascript" src=" {!! asset('public/js/jquery.js')   !!}  "  ></script>
    <script type="text/javascript" src=" {!! asset('public/js/bootstrap.min.js') !!} "  ></script>
	<link href="{{ asset('public/css/site.css') }}" rel="stylesheet">
	<link href="{{ asset('public/css/jumbotron.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/animate.css') }}" rel="stylesheet">

	<link href="{{ asset('public/css/component.css') }}" rel="stylesheet">
	<link href="{{ asset('public/css/flexslider.css') }}" rel="stylesheet">
	<link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('public/css/uroda.css') }}" rel="stylesheet">


<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

</head>
<body>
	<!-- header-section-starts -->

	@include('header1')
	<div class="container">
		<div class="row">
			<div class="col-xs-3 col-sm-3 col-lg-3 container-fluid ">
				<style>
					li {
						list-style-type: none; /* Убираем маркеры */
					}
				</style>

				<div class="logo" >
					<h1  ><a href="{{ route('index')  }} "><span>E</span> -Shop</a></h1>
				</div>
			</div>

			<div class="col-xs-7 col-sm-7 col-lg-7 col-xs-offset-2 col-sm-offset-2  col-lg-offset-2  ">
				<ul class="catalog multi-column-dropdown " >
					<div class="nav nav-pills  horizontal "> {!!  $akkordeon !!}    </div>


				</ul>

			</div>

		</div>
	</div>


<div class="banner">
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
									<h3>Smart But Casual</h3>
									<p>Start your shopping here...</p>
								</div>
							</li>
							<li>
								<div class="banner-info">
								   <h3>Shop Online</h3>
									<p>Start your shopping here...</p>
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
					<a href="{{asset('single.html') }}">SHOP COLLECTION NOW</a>
				</div>
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
						<h3>follow us : <a class="twitter" href="{{asset('#') }}"></a><a class="facebook" href="{{asset('#') }}"></a></h3>
					</div>
					<div class="col-md-4 shipping-grid">
						<div class="shipping">
							<img src="{{ asset('public/images/shipping.png') }}" alt="" />
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

	@yield('content')

	@include('slider')
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
		@include('footer')
</body>
<script type="text/javascript" src=" {!! asset('public/js/jquery.scrollUp.min.js') !!}  "  ></script>
<script type="text/javascript" src=" {!! asset('public/js/jquery.cookie.js') !!}  "  ></script>
<script type="text/javascript" src=" {!! asset('public/js/jquery.accordion.js') !!}  "  ></script>
<script type="text/javascript" src=" {!! asset('public/js/price-range.js') !!}  " charset="utf-8" ></script>

<script type="text/javascript" src=" {!! asset('public/js/script.js') !!}  " charset="utf-8" ></script>

<script type="text/javascript" src=" {!! asset('public/js/simpleCart.min.js') !!} "  ></script>
<script type="text/javascript" src=" {!! asset('public/js/responsiveslides.min.js') !!} "  ></script>
<script type="text/javascript" src=" {!! asset('public/js/jquery.flexisel.js') !!} "  ></script>
<script type="text/javascript" src=" {!! asset('public/js/main.js') !!} "  ></script>
</html>