<!--script type='text/javascript' src='http://code.jquery.com/jquery-latest.min.js'></script-->


<!--div class="new-product"-->

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
      <div class="container">
          <div class="row">
              <div class="col-xs-4 col-sm-4 ">



                  <div > <a itemprop="image" href="{{ asset('public/'.env('THEME')) }}/images/{{ $product->img->path }}" id="zoom1" class="zoom" title="62" style="position:relative;" > <img class="" src="{!! asset('public/'.env('THEME')) !!}/images/{{$product->img->max}}"  alt="NICE PROMO DRESS" /> </a> </div>





              </div>



    <div class="col-xs-8 dress-info" >
        <div class="dress-name">
            <h3>{!! $product->name !!}</h3>
            @if($discount>0)
                <span style="color:#816263; font-weight: bold;"><s>{!! $product->price !!} гр.</s></span><span style="color:#816263; font-weight: bold;">{!! $newprice !!} гр.</span>
            @else
                <span style="color:#816263; font-weight: bold;">{!! $product->price !!} гр.</span>
            @endif
            <div class="clearfix"></div>
            <p style=" color: #816263;font-size: 1.0em;">{!! $product->description !!}</p>
            <p></p>
        </div>
        <div class="span span1">
            <p class="left">Тип товара</p>
            <p class="right" style=" color: #816263;font-size: 1.0em;">{!! $product->typeTools->name !!}</p>
            <div class="clearfix"></div>
        </div>
        <div class="span span2">
            <p class="left">MADE IN</p>
            <p class="right" style=" color: #816263;font-size: 1.0em;">{!! $product->country !!}</p>
            <div class="clearfix"></div>
        </div>
        <div class="span span3">
            <p class="left">Класс</p>
            <p class="right" style=" color: #816263;font-size: 1.0em;">{{$product->class}}</p>
            <div class="clearfix"></div>
        </div>

        <div class="purchase">
            <!--label for="qty" >количество:</label>
            <p><input  type="text" id="qty"  value="1"   class="btn btn-default"/> шт.</p>
            <br/-->
            <a href="{{ asset('#',['id'=>$product->id]) }}  " data-id="{{$product->id}}" class="btn btn-default add-to-cart" style="text-decoration: none;"><i class="fa fa-shopping-cart"></i>Купить</a>
        <!--a href="#"   data-id="{{--$product->id--}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Купить</a-->


        </div>



<div class="clearfix"></div>


<div class="reviews-tabs">
    <!-- Main component for a primary marketing message or call to action -->
    <ul class="nav nav-tabs responsive hidden-xs hidden-sm" id="myTab">
        <li class="test-class active"><a class="deco-none misc-class" href="#how-to"> More Information</a></li>

        <!--li class="test-class"><a class="deco-none" href="#source">Reviews (7)</a></li-->
    </ul>
    <div class="clearfix"></div>
    <div class="tab-content responsive hidden-xs hidden-sm">
@php
$j=0;
@endphp
        <div class="tab-pane active" name="how-to" id="how-to" >
            @foreach($product->exactlyType1 as $item)
              <p class="tab-text" style=" color: #816263;font-size: 1.0em;" > {!! $item !!}</p>
                @php
                    $j++;
                @endphp
            @endforeach
            <hr/>
        </div>
        <div class="tab-pane" name="features" id="features">

             <p class="tab-text"></p>


        </div>





        @endforeach
    </div>
</div>
    </div>
     </div>
 </div>

@endif

<!--/div-->
<div class="clearfix"></div>