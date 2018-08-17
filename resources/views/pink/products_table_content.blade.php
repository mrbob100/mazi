@if($products)
    <div class="sortie">

        <div class="sortie2">
            <header>
                <h1 class="head text-center">{!! $products[0]->categories->name !!}</h1>
            </header>
        </div>
        <div class="sortieOption">
            <div class="sortie3" >
                <p>Сортировка</p>
                <select id="sortValue"  data-href="{{URL::to('category')}}" data-sign="horizontal" onchange="onSorties();">
                    <option value="0">не выбран</option>
                    <option value="1">по цене (возрастание)</option>
                    <option value="2">по цене (убывание)</option>
                    <option value="3">опция 3</option>
                </select>
            </div>

            <div class="sortie5" >
                <a id="cascad" href="{{route('category') }}" data-href="{{URL::to('category')}}" data-id="10"><span class="glyphicon glyphicon-th"></span></a>
            </div>
            <div class="sortie5" >
                <a id="cascad" href="{{route('category') }}" data-href="{{URL::to('category')}}" data-id="11" ><span class="glyphicon glyphicon-th-list"></span></a>
            </div>

            <div class="sortie4">

                <a id="caucaus" href="{{route('differ') }}"  data-id="12" data-href="{{URL::to('difference')}} " data-sign="41"><img src="{{ asset('public/'.env('THEME'))}}/images/features/scales-100.png " style="width: 40px; height:40px;"></a>
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

                    <p   style=" color: #816263;font-size: 0.9em; font-weight: 600" >{{str_limit($prod->name,32)}}  </p>
                     <div class="dopContent">
                         <div class="tab-pane active" name="how-to" id="how-to" >
                             @if($prod->exactlyType1)
                                 {!! $prod->exactlyType1 !!}
                             @endif

                         </div>
                     </div>
                 </div>
                <div class="productsinT03" >
                            <p><a class="item_add" href="{{route('cartload',['id'=>$prod->id]) }}"  data-href="{{URL::to('cartload')}}" data-id="{{$prod['id']}}" data-sign="39" style=" color: #816263;font-size: 1.0em;" ><i></i> <span class=" item_price">{!!$prod->price  !!} гр.</span> </a></p>
                    <div class="mask11">
                        <div class="mask110">

                            <a href="{{route('cartload',['id'=>$prod->id]) }}" data-href="{{URL::to('cartload')}}" data-id="{{$prod['id']}}" data-sign="39"><i class="material-icons" style="font-size: 40px; color:#006DC9;" >shopping_cart </i></a>
                            <img src="{{ asset('public/'.env('THEME')) }}/images/features/incart.png" data-href="{{URL::to('cartload')}}" data-id="{{$prod['id']}}" data-sign="39" alt="" />
                        </div>
                        <div class="mask111">
                            <a href="{{route('differ',['id'=>$prod->id]) }}"  ><img src="{{ asset('public/'.env('THEME'))}}/images/features/scales-100.png " id="picture" data-href="{{URL::to('difference')}}" data-id="{{$prod['id']}}" data-sign="40"></a>
                        </div>
                    </div>

                </div>




            </div>

        @endforeach








@else
    {!! Lang::get('ru.articles_no') !!}
@endif