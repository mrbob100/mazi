
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



<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

</head>
<body>
	<!-- header-section-starts -->

	@include('pink.header1')
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

			<div class="col-xs-6 col-sm-6 col-lg-6 col-xs-offset-3 col-sm-offset-3  col-lg-offset-3  ">
				<ul class="catalog multi-column-dropdown " >
					<div class="nav nav-pills  horizontal "> {!!  $akkordeon !!}    </div>


				</ul>

			</div>
			<div class="clearfix"></div>
		</div>
	</div>


<div class="banner">
	<div class="container">

		<div class="banner-bottom">
			<div class="banner-bottom-left">
				<h2>B<br>U<br>Y</h2>
			</div>



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

			<div class="shop">
				<a href="{{asset('single.html') }}">SHOP COLLECTION NOW</a>
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
				<div class="products-grid">
				<header>
					<h3 class="head text-center">Latest Products</h3>
				</header>
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="{{asset('single.html') }}"><img src="{{ asset('public/images/p1.jpg') }}" alt="" /></a>
						<div class="mask">
							<a href="{{asset('single.html') }}">Quick View</a>
						</div>
						<a class="product_name" href="{{asset('single.html') }}">Sed ut perspiciatis</a>
						<p><a class="item_add" href="{{asset('#') }}"><i></i> <span class="item_price">$329</span></a></p>
					</div>
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="{{asset('single.html') }}"><img src="{{ asset('public/images/p2.jpg') }}" alt="" /></a>
						<div class="mask">
							<a href="{{asset('single.html') }}">Quick View</a>
						</div>
						<a class="product_name" href="{{asset('single.html') }}">great explorer</a>
						<p><a class="item_add" href="{{asset('#') }}"><i></i> <span class="item_price">$599.8</span></a></p>
					</div>
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="{{asset('') }}single.html"><img src="{{ asset('public/images/p3.jpg') }}" alt="" /></a>
						<div class="mask">
							<a href="{{asset('single.html') }}">Quick View</a>
						</div>
						<a class="product_name" href="{{asset('single.html') }}">similique sunt</a>
						<p><a class="item_add" href="{{asset('#') }}"><i></i> <span class="item_price">$359.6</span></a></p>
					</div>
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="{{asset('single.html') }}"><img src="{{ asset('public/images/p4.jpg') }}" alt="" /></a>
						<div class="mask">
							<a href="{{asset('single.html') }}">Quick View</a>
						</div>
						<a class="product_name" href="{{asset('single.html') }}">shrinking </a>
						<p><a class="item_add" href="{{asset('') }}#"><i></i> <span class="item_price">$649.99</span></a></p>
					</div>
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="{{asset('single.html') }}"><img src="{{ asset('public/images/p5.jpg') }}" alt="" /></a>
						<div class="mask">
							<a href="{{asset('single.html') }}">Quick View</a>
						</div>
						<a class="product_name" href="{{asset('single.html') }}">perfectly simple</a>
						<p><a class="item_add" href="{{asset('#') }}"><i></i> <span class="item_price">$750</span></a></p>
					</div>
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="{{asset('single.html') }}"><img src="{{ asset('public/images/p6.jpg') }}" alt="" /></a>
						<div class="mask">
							<a href="{{asset('single.html') }}">Quick View</a>
						</div>
						<a class="product_name" href="{{asset('single.html') }}">equal blame</a>
						<p><a class="item_add" href="{{asset('#') }}"><i></i> <span class="item_price">$295.59</span></a></p>
					</div>
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="{{asset('single.html') }}"><img src="{{ asset('public/images/p7.jpg') }}" alt="" /></a>
						<div class="mask">
							<a href="{{asset('single.html') }}">Quick View</a>
						</div>
						<a class="product_name" href="{{asset('single.html') }}">Neque porro</a>
						<p><a class="item_add" href="{{asset('#') }}"><i></i> <span class="item_price">$380</span></a></p>
					</div>
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="{{asset('single.html') }}"><img src="{{ asset('public/images/p8.jpg') }}" alt="" /></a>
						<div class="mask">
							<a href="{{asset('single.html') }}">Quick View</a>
						</div>
						<a class="product_name" href="{{asset('single.html') }}">perfectly simple</a>
						<p><a class="item_add" href="{{asset('#') }}"><i></i> <span class="item_price">$540.6</span></a></p>
					</div>
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="{{asset('single.html') }}"><img src="{{ asset('public/images/p9.jpg') }}" alt="" /></a>
						<div class="mask">
							<a href="{{asset('single.html') }}">Quick View</a>
						</div>
						<a class="product_name" href="{{asset('single.html') }}">praising pain</a>
						<p><a class="item_add" href="{{asset('#') }}"><i></i> <span class="item_price">$229.5</span></a></p>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>

		</div>

	@yield('content')

		<div class="other-products">
		<div class="container">
			<h3 class="like text-center">Featured Collection</h3>
				     <ul id="flexiselDemo3">
						<li><a href="{{asset('single.html') }}"><img src="{{ asset('public/images/l1.jpg') }}" class="img-responsive" alt="" /></a>
							<div class="product liked-product simpleCart_shelfItem">
							<a class="like_name" href="{{asset('single.html') }}">perfectly simple</a>
							<p><a class="item_add" href="{{asset('#') }}"><i></i> <span class=" item_price">$759</span></a></p>
							</div>
						</li>
						<li><a href="{{asset('single.html') }}"><img src="{{ asset('public/images/l2.jpg') }}" class="img-responsive" alt="" /></a>
							<div class="product liked-product simpleCart_shelfItem">
							<a class="like_name" href="{{asset('single.html') }}">praising pain</a>
							<p><a class="item_add" href="{{asset('#') }}"><i></i> <span class=" item_price">$699</span></a></p>
							</div>
						</li>
						<li><a href="{{asset('single.html') }}"><img src="{{ asset('public/images/') }}images/l3.jpg" class="img-responsive" alt="" /></a>
							<div class="product liked-product simpleCart_shelfItem">
							<a class="like_name" href="{{asset('single.html') }}">Neque porro</a>
							<p><a class="item_add" href="{{asset('#') }}"><i></i> <span class=" item_price">$329</span></a></p>
							</div>
						</li>
						<li><a href="{{asset('single.html') }}"><img src="{{ asset('public/images/l4.jpg') }}" class="img-responsive" alt="" /></a>
							<div class="product liked-product simpleCart_shelfItem">
							<a class="like_name" href="{{asset('single.html') }}">equal blame</a>
							<p><a class="item_add" href="{{asset('#') }}"><i></i> <span class=" item_price">$499</span></a></p>
							</div>
						</li>
						<li><a href="{{asset('single.html') }}"><img src="{{ asset('public/images/l5.jpg') }}" class="img-responsive" alt="" /></a>
							<div class="product liked-product simpleCart_shelfItem">
							<a class="like_name" href="{{asset('single.html') }}">perfectly simple</a>
							<p><a class="item_add" href="{{asset('#') }}"><i></i> <span class=" item_price">$649</span></a></p>
							</div>
						</li>
				     </ul>
				    <script type="text/javascript">
					 $(window).load(function() {
						$("#flexiselDemo3").flexisel({
							visibleItems: 4,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
					    	responsiveBreakpoints: {
					    		portrait: {
					    			changePoint:480,
					    			visibleItems: 1
					    		},
					    		landscape: {
					    			changePoint:640,
					    			visibleItems: 2
					    		},
					    		tablet: {
					    			changePoint:768,
					    			visibleItems: 3
					    		}
					    	}
					    });

					});
				   </script>
				   <!--script type="text/javascript" src="js/jquery.flexisel.js"></script-->
				   </div>
				   </div>
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
		@include('pink.footer')
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