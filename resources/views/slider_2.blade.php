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