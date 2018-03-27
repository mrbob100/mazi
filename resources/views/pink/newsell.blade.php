
<header>
    <h1 class="biglike text-center">Новинки</h1>
</header>
<br/>
@if($newProducts)

    <div class="slick-slider" data-slick='{"slidesToShow": 4, "slidesToScroll": 2}'>




        @foreach($newProducts as $prod)
            @php
                $j=0;
            @endphp

            <div class="productsLine">

                        <a href="{{route('product',['id'=>$prod->product_id]) }}"> <img src="{{  asset($prod->path) }}" style="height: 150px; width: 200px;" alt="вывод изображения" /></a>

                        <div class="layer02">
                            <img src="{{ asset('public/'.env('THEME')) }}/images/features/new012.png" alt="" />
                        </div>


                        <div class="liked-product simpleCart_shelfItem">

                            <a class="like_name" href="{{route('product',['id'=>$prod->product_id]) }}" style=" color: #816263;font-size: 0.7em;">{!! $prod->name !!}</a>
                            <p><a class="item_add" href="{{route('product',['id'=>$prod->product_id]) }}" style=" color: #816263;font-size: 1.0em;"><i></i> <span class=" item_price">{!!$prod->products->price  !!} гр.</span> </a></p>
                            <div class="mask">
                                <a href="{{route('product',['id'=>$prod->product_id]) }}" >Купить</a>
                            </div>
                            <div class="dopContent">
                                <div class="tab-pane active" name="how-to" id="how-to" >
                                    @if($prod->products->exactlyType1)
                                        @set($data, json_decode($prod->products->exactlyType1))
                                        @foreach($data as $k=>$item)

                                            {!! $item !!}

                                        @endforeach


                                    @endif

                                </div>
                            </div>

                        </div>



        </div>

        @endforeach

      </div>



@endif



