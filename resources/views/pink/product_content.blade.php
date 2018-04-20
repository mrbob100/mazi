<!--script type='text/javascript' src='http://code.jquery.com/jquery-latest.min.js'></script-->


<!--div class="new-product"-->

    @if($products)



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

     <div class="wrap_02">
         <div class="right_side1">
             <div > <a itemprop="image" href="{{ asset('public/'.env('THEME')) }}/images/{{ $products[0]->img->path }}" id="zoom1" class="zoom" title="62" style="position:relative; " > <img class="slidek" src="{!! asset('public/'.env('THEME')) !!}/images/{{$products[0]->img->max}}"  alt="NICE PROMO DRESS" /> </a> </div>
         </div>
             <div class="right_side2" >
                 <div class="dress-name" >
                     <h5>{!! $row !!}</h5>
                     <span style="font-weight:900; font-size: 24px;"><h3>{!! $row1 !!}</h3></span>

                 </div>
                 <div class="right_side_inn" style="font-size: 12px;  ">
                     <div class="span__in0"></div>
                     <div class="span span1">
                         <p class="left">Тип товара - &nbsp;
                         @if($products[0]->typeTools )
                             {!! $products[0]->typeTools->name !!}</p>
                         @endif
                         <div class="clearfix"></div>
                     </div>
                     <div class="span span2">
                         <p class="left_01 tab_text_odd">made in - &nbsp;
                        {!! $products[0]->country !!}</p>
                         <div class="clearfix"></div>
                     </div>
                     <div class="span span3">
                         <p class="left">Класс - &nbsp;
                         @if($products[0]->class )
                             {{$products[0]->class}}
                         @endif
                         </p>
                         <div class="clearfix"></div>
                     </div>

                     <div class="tab-content responsive hidden-xs hidden-sm">
                         @php
                             $j=0;
                         @endphp
                             <div class="tab-pane active" name="how-to" id="how-to" >
                                 @if($products[0]->exactlyType1)
                                     @foreach($products[0]->exactlyType1 as $item)
                                         @if($loop->iteration%2!=0)
                                         <p class="tab_text_odd span" > {!! $item !!}</p>
                                          @else
                                             <p class="tab_text span" > {!! $item !!}</p>
                                         @endif
                                         @php
                                             $j++;
                                         @endphp
                                     @endforeach
                                 @endif
                                 <hr/>
                             </div>
                     </div>

                        <div class="vantage">
                            <span style="font-weight:900; font-size: 18px;">Функции:</span>
                        </div>
                     <div class="tab-pane" name="features" id="features">
                         <span style="font-weight:900; font-size: 18px;">Преимущества:</span>
                         <p >{!! $products[0]->description !!}</p>

                         <div class="vantage">
                             <span style="font-weight:900; font-size: 18px;">Комплект поставки:</span>
                         </div>

                     </div>






                 </div>
                 <div class="purchase" style="font-weight:900; font-size: 18px; padding-left: 120px;padding-top: 40px;">
                     <!--label for="qty" >количество:</label>
                     <p><input  type="text" id="qty"  value="1"   class="btn btn-default"/> шт.</p>
                     <br/-->
                     <!--a href="#"  onclick="getCart();"><img src="{--{ asset('public/'.env('THEME'))}--}/images/features/add.png" alt="вывод кнопки купить" /></a-->
                 <!--a href="#"   data-id="{{--$product->id--}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Купить</a-->
                     @if($discount>0)
                         <span ><s>{!! $products[0]->price !!} гр.</s></span><span style="color:#816263; font-weight: bold;">{!! $newprice !!} гр.</span>
                     @else
                         <span >Цена &nbsp;{!! $products[0]->price !!} гр.</span>
                     @endif
                     <div class="clearfix"></div>

                 </div>
             </div>
        <div class="right-side3">


        </div>



     </div>


<div class="clearfix"></div>


@endif

