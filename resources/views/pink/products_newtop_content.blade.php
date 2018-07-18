@if($products)

    <div class="wrapProdT01">

        @foreach($products as $prod)

            <div class="productsinT01" >

                <a  id="moreInfo" href="{{route('product',['id'=>$prod->id]) }}" data-href="{{URL::to('product')}}" data-id="{{$prod->id}}" data-sign="26"> <img src="{{ asset('public/'.env('THEME'))}}/images/{{ $prod->img->max }}"  alt="вывод изображения" /></a>
                <!--div class="layer001"><img src="{--{ asset('public/'.env('THEME'))}--}/images/features/tick.png" id="tick"></div-->

                @if($pr==51)
                    <div class="layer03">
                        <img src="{{ asset('public/'.env('THEME')) }}/images/features/new012.png" alt="" />
                    </div>
                @elseif($pr==50)
                    <div class="layer03">
                        <img src="{{ asset('public/'.env('THEME')) }}/images/features/topBlue.png" alt="" />
                    </div>
                @endif

                <div class="liked-product simpleCart_shelfItem">

                    <a class="like_name" href="{{route('cartload',['id'=>$prod->id]) }}" data-href="{{URL::to('cartload')}}" data-id="{{$prod->id}}" data-sign="39" style=" color: #816263;font-size: 0.7em;" >{{str_limit($prod->name,32)}}  </a>
                    <p><a class="item_add" href="{{route('cartload',['id'=>$prod->id]) }}"  data-href="{{URL::to('cartload')}}" data-id="{{$prod->id}}" data-sign="39" style=" color: #816263;font-size: 1.0em; padding-left: 40px" ><i></i> <span class=" item_price">{!!$prod->price  !!} гр.</span> </a></p>
                    <div class="mask11">

                        <a href="{{route('cartload',['id'=>$prod->id]) }}" data-href="{{URL::to('cartload')}}" data-id="{{$prod->id}}" data-sign="39"><i class="material-icons" style="font-size: 40px; color:#1F9ED1;" >shopping_cart </i>В корзину</a>
                        <a href="{{route('differ',['id'=>$prod->id]) }}" data-href="{{URL::to('difference')}}" data-id="{{$prod->id}}" data-sign="40"><img src="{{ asset('public/'.env('THEME'))}}/images/features/scales-100.png " id="picture" ></a>
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
