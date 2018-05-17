@if($products)

    <header>
        <h1 class="head text-center">{!! $products[0]->categories->name !!}</h1>
    </header>


    <div class="wrapProdT01">
        @foreach($products as $prod)


            <div class="productsinT01">

                <a href="{{route('product',['id'=>$prod->id]) }}"> <img src="{{ asset('public/'.env('THEME'))}}/images/{{ $prod->img->max }}"  alt="вывод изображения" /></a>

                @if($prod->new)
                    <div class="layer02">
                        <img src="{{ asset('public/'.env('THEME')) }}/images/features/new01.jpg" alt="" />
                    </div>
                @elseif($prod->sale)
                    <div class="layer03">
                        <img src="{{ asset('public/'.env('THEME')) }}/images/features/sale.png" alt="" />
                    </div>
                @endif

                <div class="liked-product simpleCart_shelfItem">

                    <a class="like_name" href="{{route('product',['id'=>$prod->id]) }}" style=" color: #816263;font-size: 0.7em;">{{str_limit($prod->name,32)}}  </a>
                    <p><a class="item_add" href="{{route('product',['id'=>$prod->id]) }}" style=" color: #816263;font-size: 1.0em; padding-left: 40px"><i></i> <span class=" item_price">{!!$prod->price  !!} гр.</span> </a></p>
                    <div class="mask">
                        <a href="{{route('product',['id'=>$prod->id]) }}" ><i class="material-icons" style="font-size: 40px; color:#8ACC90;">shopping_cart </i>&nbsp;Купить</a>
                    </div>
                    <div class="dopContent">
                        <div class="tab-pane active" name="how-to" id="how-to" >
                        @if($prod->exactlyType1)
                            @foreach($prod->exactlyType1 as $item)
                                <!--p class="tab-text" style=" color: #816263;font-size: 0.7em;" > {--!! $item !!--}</p-->
                                    <p class="tab-text" style=" color: #816263;font-size: 0.7em;" > {{str_limit($item,32)}}</p>

                                @endforeach
                            @endif

                        </div>
                    </div>

                </div>


            </div>


        @endforeach
    </div>







@else
    {!! Lang::get('ru.articles_no') !!}
@endif



