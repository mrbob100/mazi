
<div id="header"  data-href="{{ URL::to('actionSell')}}"  data-sign="51">
   <a href="#" ><h1 class="biglike text-center" style="text-decoration: none;">&nbsp;Новинки&nbsp;</h1></a>
</div>

@if($newProducts)

    <div id="flexslider">

        <ul id="slick-slider">


            @foreach($newProducts as $prod)
                @if($prod->new)

                <div class="productsLine">

                   <li>
                        <a class="pict" href="{{route('product',['id'=>$prod->id]) }}" data-href="{{URL::to('product')}}" data-id="{{$prod['id']}}" data-sign="26">
                            <img src="{!! asset('public/'.env('THEME')) !!}/images/{{$prod->img->max}}" alt="вывод изображения" />
                            <div class="layer02"  data-href="{{URL::to('product')}}" data-id="{{$prod['id']}}" data-sign="26">
                                <img src="{{ asset('public/'.env('THEME')) }}/images/features/new012.png" alt="" />
                            </div>
                        </a>

                            <div class="liked-product simpleCart_shelfItem">

                                <p class="like_name" style=" color: #816263;font-size: 0.7em;" >{!!str_limit($prod->name,30)  !!}</p>
                                <p  class="item_add"  style=" color: #816263;font-size: 1.0em;">{!!$prod->price  !!} гр.</span> </p>
                                <div class="mask">
                                    <a href="{{route('cartload',['id'=>$prod->id]) }}" data-href="{{URL::to('cartload')}}" data-id="{{$prod['id']}}" data-sign="39" >Купить</a>
                                </div>
                                <div class="dopContent">
                                    <div class="tab-pane active" name="how-to" id="how-to" >
                                        @if($prod->exactlyType1)
                                            @set($data, $prod->exactlyType1)
                                            @foreach($data as $k=>$item)

                                                {!! $item !!} <br/>

                                            @endforeach


                                        @endif

                                    </div>
                                </div>

                            </div>

                   </li>

            </div>
                @endif

            @endforeach

       </ul>

    </div>

@endif



