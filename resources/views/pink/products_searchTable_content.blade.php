@if($products)
    <div class="sortie">

        <div class="sortie2">
            <header>
                <h1 class="head text-center">{!! $q !!}</h1>
            </header>
        </div>
        <div class="sortieOption">
            <div class="sortie3" >
                <p>Сортировка</p>
                <select id="sortValue"  data-href="{{URL::to('search')}}" data-sign="horizontal" onchange="onSorties();">
                    <option value="0">не выбран</option>
                    <option value="1">по цене (возрастание)</option>
                    <option value="2">по цене (убывание)</option>
                    <option value="3">опция 3</option>
                </select>
            </div>

            <div class="sortie5" >
                <a id="cascad" href="{{route('productSearch') }}" data-href="{{URL::to('search')}}" data-id="10"><span class="glyphicon glyphicon-th"></span></a>
            </div>
            <div class="sortie5" >
                <a id="cascad" href="{{route('productSearch') }}" data-href="{{URL::to('search')}}" data-id="11" ><span class="glyphicon glyphicon-th-list"></span></a>
            </div>

            <div class="sortie4">

                <a id="caucaus" href="{{route('differ') }}"  data-id="12"><img src="{{ asset('public/'.env('THEME'))}}/images/features/scales-100.png " style="width: 40px; height:40px;"></a>
            </div>
            <div class="sortie1_4"></div>
        </div>
    </div>

    @foreach($products as $prod)

        <div class="wrapProdT02">
            <div class="productsinT02" >

                <a  id="moreInfo" href="{{route('product',['id'=>$prod->id]) }}" data-href="{{URL::to('product')}}" data-id="{{$prod['id']}}" data-sign="26"> <img src="{{ asset('public/'.env('THEME'))}}/images/{{ $prod->img->max }}"  alt="вывод изображения" />

                    @if($prod->new)
                        <div class="layer02">
                            <img src="{{ asset('public/'.env('THEME')) }}/images/features/new012.png"  alt="вывод иконки" />
                        </div>
                    @elseif($prod->sale)
                        <div class="layer02">
                            <img src="{{ asset('public/'.env('THEME')) }}/images/features/saleGreen.png" alt="вывод иконки" />
                        </div>
                    @endif
                </a>
            </div>
            <div class="liked-product simpleCart_shelfItem">

                <a class="like_name" href="{{route('cartload',['id'=>$prod->id]) }}" data-href="{{URL::to('cartload')}}" data-id="{{$prod['id']}}" data-sign="39" style=" color: #816263;font-size: 0.7em;" >{{str_limit($prod->name,32)}}  </a>
                <div class="dopContent01">
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
            <div class="productsinT03" >
                <p><a class="item_add" href="{{route('cartload',['id'=>$prod->id]) }}"  data-href="{{URL::to('cartload')}}" data-id="{{$prod['id']}}" data-sign="39" style=" color: #816263;font-size: 1.0em; padding-left: 40px" ><i></i> <span class=" item_price">{!!$prod->price  !!} гр.</span> </a></p>
                <div class="mask11">
                    <a href="{{route('cartload',['id'=>$prod->id]) }}" data-href="{{URL::to('cartload')}}" data-id="{{$prod['id']}}" data-sign="39"><i class="material-icons" style="font-size: 40px; color:#8ACC90;" >shopping_cart </i>В корзину</a>
                    <a href="{{route('differ',['id'=>$prod->id]) }}" data-href="{{URL::to('difference')}}" data-id="{{$prod['id']}}" data-sign="40"><img src="{{ asset('public/'.env('THEME'))}}/images/features/scales-100.png " style="width: 50px; height:50px;"></a>
                </div>

            </div>




        </div>

    @endforeach








@else
    {!! Lang::get('ru.articles_no') !!}
@endif