@if($products)

    <div class="wrapProdT01">

            @for($i=0;$i<count($products);$i++)

                <div class="productsinT01" >

                <a  id="moreInfo" href="{{route('product',['id'=>$products[$i][0]['id']]) }}" data-href="{{URL::to('product')}}" data-id="{{$products[$i][0]['id']}}" data-sign="26"> <img src="{{ asset('public/'.env('THEME'))}}/images/{{ $products[$i][0]['img']->max }}"  alt="вывод изображения" /></a>
                <!--div class="layer001"><img src="{--{ asset('public/'.env('THEME'))}--}/images/features/tick.png" id="tick"></div-->

                    @if($products[$i][0]['new'])
                        <div class="layer02">
                            <img src="{{ asset('public/'.env('THEME')) }}/images/features/new01.jpg" alt="" />
                        </div>
                    @elseif($products[$i][0]['sale'])
                        <div class="layer03">
                            <img src="{{ asset('public/'.env('THEME')) }}/images/features/sale.png" alt="" />
                        </div>
                    @endif

                    <div class="liked-product simpleCart_shelfItem">

                        <a class="like_name" href="{{route('cartload',['id'=>$products[$i][0]['id']]) }}" data-href="{{URL::to('cartload')}}" data-id="{{$products[$i][0]['id']}}" data-sign="39" style=" color: #816263;font-size: 0.7em;" >{{str_limit($products[$i][0]['name'],32)}}  </a>
                        <p><a class="item_add" href="{{route('cartload',['id'=>$products[$i][0]['id']]) }}"  data-href="{{URL::to('cartload')}}" data-id="{{$products[$i][0]['id']}}" data-sign="39" style=" color: #816263;font-size: 1.0em; padding-left: 40px" ><i></i> <span class=" item_price">{!!$products[$i][0]['price']  !!} гр.</span> </a></p>
                        <div class="mask11">

                            <a href="{{route('cartload',['id'=>$products[$i][0]['id']]) }}" data-href="{{URL::to('cartload')}}" data-id="{{$products[$i][0]['id']}}" data-sign="39"><i class="material-icons" style="font-size: 40px; color:#1F9ED1;" >shopping_cart </i>В корзину</a>
                            <a href="{{route('differ',['id'=>$products[$i][0]['id']]) }}" data-href="{{URL::to('difference')}}" data-id="{{$products[$i][0]['id']}}" data-sign="40"><img src="{{ asset('public/'.env('THEME'))}}/images/features/scales-100.png " id="picture" ></a>
                        </div>
                        <div class="dopContent">
                            <div class="tab-pane active" name="how-to" id="how-to" >
                                @if($products[$i][0]['exactlyType1'])
                                    @foreach($products[$i][0]['exactlyType1'] as $item)
                                        <!--p class="tab-text" style=" color: #816263;font-size: 0.7em;" > {--!! $item !!--}</p-->
                                            <p class="tab-text" style=" color: #816263;font-size: 0.7em;" > {{str_limit($item,32)}}</p>

                                    @endforeach
                                 @endif

                            </div>
                        </div>

                    </div>



                </div>
            @endfor


    </div>







@else
    {!! Lang::get('ru.articles_no') !!}
@endif
