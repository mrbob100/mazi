@if($products)

    <header>
        <h1 class="head text-center">{!! $products[0]->categories->name !!}</h1>
    </header>


    <div class="wrapSubProd">
        @foreach($products as $prod)


            <div class="productsin">
                <span style=" color: #5A7793;font-size: 0.8em;font-weight: bold;">{{str_limit($prod->name,32)}}  </span>

                <a  id="moreInfo" href="{{route('product',['id'=>$prod->id])}}" data-href="{{URL::to('product')}}" data-id="{{$prod->id}}" data-sign="26"> <img src="{{ asset('public/'.env('THEME'))}}/images/{{ $prod->img->max }}"  alt="вывод изображения" /></a>

                @if($prod->new)
                    <div class="layer02">
                        <img src="{{ asset('public/'.env('THEME')) }}/images/features/new012.png" width="75px;" alt="" />
                    </div>
                @elseif($prod->sale)
                    <div class="layer02">
                        <img src="{{ asset('public/'.env('THEME')) }}/images/features/saleGreen.png" width="75px;" alt="" />
                    </div>
                @endif

                <div class="liked-product simpleCart_shelfItem">


                    <p><i><span class=" item_price" style=" color: #5A7793;font-size: 0.8em;font-weight: bold;">{!!$prod->price  !!} гр.</span></i>  </p>
                    <div class="mask" >
                        <a id="reactivebut" href="{{route('addcartios',['id'=>$prod->id])}}" data-href="{{URL::to('addcartios')}}" data-id="{{$prod->id}}" data-sign="25"> <img src="{{ asset('public/'.env('THEME'))}}/images/features/add.png" alt="вывод кнопки добавить" /></a>
                    </div>


                </div>


            </div>


        @endforeach
    </div>
@else
    {!! Lang::get('ru.articles_no') !!}
@endif