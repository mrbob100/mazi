
<div id="header" data-href="{{ URL::to('actionSell')}}"  data-sign="50" >
    <a href="#"  ><h1 class="like text-center">{!! $categoryName !!}</h1></a>
</div>

<div class="flexslider">

        <ul id="flexiselDemo3">

            @foreach( $products as $prod)
                @if($prod->hit)
                <div class="sliderIn">


                        <li>
                            <a class="pict" href="{{route('product',['id'=>$prod->id]) }}" data-href="{{URL::to('product')}}" data-id="{{$prod['id']}}" data-sign="26"><img src="{!! asset('public/'.env('THEME')) !!}/images/{{$prod->img->max}}"   class="img-responsive " alt="вывод изображения" />
                                <div class="layer02"  data-href="{{URL::to('product')}}" data-id="{{$prod['id']}}" data-sign="26">
                                    <img src="{{ asset('public/'.env('THEME')) }}/images/features/topBlue.png" alt="" />
                                </div>
                            </a>
                            <div class="product liked-product simpleCart_shelfItem">
                                <p class="like_name">{!!str_limit($prod->name,30)  !!}</p>
                                <p class="item_add"> <span class=" item_price">{!!$prod->price !!}&nbsp;гр.</span></p>
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
