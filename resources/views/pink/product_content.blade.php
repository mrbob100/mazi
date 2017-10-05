<script type='text/javascript' src='http://code.jquery.com/jquery-latest.min.js'></script>
<link rel='stylesheet' id='zoom-css'  href='{{ asset('public/'.env('THEME')) }}/css/zoom.css' type='text/css' media='all' />
<script type='text/javascript' src='{!! asset('public/'.env('THEME')) !!}/js/jquery.nicescroll.min.js'></script>
<script type='text/javascript' src='{!! asset('public/'.env('THEME')) !!}/js/jquery.slider.js'></script>
<script type='text/javascript' src='{!! asset('public/'.env('THEME')) !!}/js/jquery.mousewheel.js'></script>
<script type='text/javascript' src='{!! asset('public/'.env('THEME')) !!}/js/touch.js'></script>
<script type='text/javascript' src='{!! asset('public/'.env('THEME')) !!}/js/zoom.js'></script>

<div class="new-product">
    @if($products)

  @foreach($products as $product)
        <script type="text/javascript">
            jQuery(document).ready(function(){
                jQuery('a#zoom1').swinxyzoom({mode:'dock', controls: false, size: '100%', dock: { position: 'right' } }); // dock window slippy lens

                jQuery('.views-gallery a').click(function(e) {
                    e.preventDefault();


                    var $this = jQuery(this),
                        largeImage  = $this.attr('href');
                    smallImage  = $this.data('easyzoom-source');

                    if (!$this.parent().hasClass('thumbnail-active')) {
                        jQuery('a#zoom1').swinxyzoom('load', smallImage,  largeImage);
                        jQuery('.lightbox-btn').attr('href', largeImage);

                        jQuery('.views-gallery .slide.thumbnail-active').removeClass('thumbnail-active');
                        $this.parent().toggleClass('thumbnail-active');
                    }

                });
            });
        </script>
        <div class="Zimage">

            <div > <a itemprop="image" href="{{ asset('public/'.env('THEME')) }}/images/{{ $product->img->max }}" id="zoom1" class="zoom" title="62" > <img class="" src="{!! asset('public/'.env('THEME')) !!}/images/{{$product->img->path}}"  alt="NICE PROMO DRESS" /> </a> </div>

            <div class="clear"></div>
        </div>
<div class="col-md-7 dress-info">
    <div class="dress-name">
        <h3>{!! $product->name !!}</h3>
        <span>{!! $product->price !!} гр.</span>
        <div class="clearfix"></div>
        <p>{!! $product->description !!}</p>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
    </div>
    <div class="span span1">
        <p class="left">Тип товара</p>
        <p class="right">{!! $product->type !!}</p>
        <div class="clearfix"></div>
    </div>
    <div class="span span2">
        <p class="left">MADE IN</p>
        <p class="right">{!! $product->country !!}</p>
        <div class="clearfix"></div>
    </div>
    <div class="span span3">
        <p class="left">Класс</p>
        <p class="right">{{$product->class}}</p>
        <div class="clearfix"></div>
    </div>

    <div class="purchase">
        <label for="qty" >количество:</label>
        <p><input  type="text" id="qty"  value="1"   class="btn btn-default"/> шт.</p>
        <br/>
        <a href="{{ asset('#',['id'=>$product->id]) }}  " data-id="{{$product->id}}" class="btn btn-default add-to-cart" style="text-decoration: none;"><i class="fa fa-shopping-cart"></i>Купить</a>
    <!--a href="#"   data-id="{{--$product->id--}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Купить</a-->
        {{ csrf_field() }}
        <div class="social-icons">
            <ul>
                <li><a class="facebook1" href="#"></a></li>
                <li><a class="twitter1" href="#"></a></li>
                <li><a class="googleplus1" href="#"></a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>

</div>
<div class="clearfix"></div>
<div class="reviews-tabs">
    <!-- Main component for a primary marketing message or call to action -->
    <ul class="nav nav-tabs responsive hidden-xs hidden-sm" id="myTab">
        <li class="test-class active"><a class="deco-none misc-class" href="#how-to"> More Information</a></li>
        <li class="test-class"><a href="#features">Specifications</a></li>
        <li class="test-class"><a class="deco-none" href="#source">Reviews (7)</a></li>
    </ul>

    <div class="tab-content responsive hidden-xs hidden-sm">
        <div class="tab-pane active" id="how-to">
            <p class="tab-text">Maecenas mauris velit, consequat sit amet feugiat rit, elit vitaeert scelerisque elementum, turpis nisl accumsan ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. and scrambled it to make a type specimen book. It has survived Auction your website on Flippa and you'll get the best price from serious buyers, dedicated support and a much better deal than you'll find with any website broker. Sell your site today I need a twitter bootstrap 3.0 theme for the full-calendar plugin. it would be great if the theme includes the add event; remove event, show event details. this must be RESPONSIVE and works on mobile devices. Also, I've seen so many bootstrap themes that comes up with the fullcalendar plugin. However these . </p>
        </div>
        <div class="tab-pane" id="features">
            <p class="tab-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravida mollis.This tab has icon in consectetur adipiscing eliconse consectetur adipiscing elit. Vestibulum nibh urna, ctetur adipiscing elit. Vestibulum nibh urna, t.consectetur adipiscing elit. Vestibulum nibh urna,  Vestibulum nibh urna,it.</p>
            <p class="tab-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="tab-pane" id="source">
            <div class="response">
                <div class="media response-info">
                    <div class="media-left response-text-left">
                        <a href="#">
                            <img class="media-object" src="images/icon1.png" alt="" />
                        </a>
                        <h5><a href="#">Username</a></h5>
                    </div>
                    <div class="media-body response-text-right">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <ul>
                            <li>MARCH 21, 2015</li>
                            <li><a href="single.html">Reply</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="media response-info">
                    <div class="media-left response-text-left">
                        <a href="#">
                            <img class="media-object" src="images/icon1.png" alt="" />
                        </a>
                        <h5><a href="#">Username</a></h5>
                    </div>
                    <div class="media-body response-text-right">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <ul>
                            <li>MARCH 26, 2054</li>
                            <li><a href="single.html">Reply</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="media response-info">
                    <div class="media-left response-text-left">
                        <a href="#">
                            <img class="media-object" src="images/icon1.png" alt="" />
                        </a>
                        <h5><a href="#">Username</a></h5>
                    </div>
                    <div class="media-body response-text-right">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <ul>
                            <li>MAY 25, 2015</li>
                            <li><a href="single.html">Reply</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="media response-info">
                    <div class="media-left response-text-left">
                        <a href="#">
                            <img class="media-object" src="images/icon1.png" alt="" />
                        </a>
                        <h5><a href="#">Username</a></h5>
                    </div>
                    <div class="media-body response-text-right">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <ul>
                            <li>FEB 13, 2015</li>
                            <li><a href="single.html">Reply</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="media response-info">
                    <div class="media-left response-text-left">
                        <a href="#">
                            <img class="media-object" src="images/icon1.png" alt="" />
                        </a>
                        <h5><a href="#">Username</a></h5>
                    </div>
                    <div class="media-body response-text-right">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <ul>
                            <li>JAN 28, 2015</li>
                            <li><a href="single.html">Reply</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="media response-info">
                    <div class="media-left response-text-left">
                        <a href="#">
                            <img class="media-object" src="images/icon1.png" alt="" />
                        </a>
                        <h5><a href="#">Username</a></h5>
                    </div>
                    <div class="media-body response-text-right">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <ul>
                            <li>APR 18, 2015</li>
                            <li><a href="single.html">Reply</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="media response-info">
                    <div class="media-left response-text-left">
                        <a href="#">
                            <img class="media-object" src="images/icon1.png" alt="" />
                        </a>
                        <h5><a href="#">Username</a></h5>
                    </div>
                    <div class="media-body response-text-right">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <ul>
                            <li>DEC 25, 2014</li>
                            <li><a href="single.html">Reply</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>
</div>
        @endforeach
@endif
</div>
<div class="clearfix"></div>