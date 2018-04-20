@if($products)
   
        <header>
            <h1 class="head text-center">{!! $products[0]->categories->name !!}</h1>
        </header>


             <div class="wrapSubInv">
                    @foreach($products as $prod)


                             <div class="productsin">
                                 <span style=" color: #5A7793;font-size: 0.8em;font-weight: bold;">{{str_limit($prod->name,32)}}  </span>

                                 <a  id="reactimage" class="like_img" href="{{route('addcartios',['id'=>$prod->id])}}" data-href="{{URL::to('addcartios')}}" data-id="{{$prod->id}}" data-sign="23"> <img src="{{ asset('public/'.env('THEME'))}}/images/{{ $prod->img->max }}"  alt="вывод изображения" /></a>

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


                                    <p><i><span class="item_price" style=" color: #5A7793;font-size: 0.8em;font-weight: bold;">{!!$prod->price  !!} гр.</span></i>  </p>
                                    <div class="mask" >
                                        <a id="reactbutton" href="{{route('addcartios',['id'=>$prod->id])}}" data-href="{{URL::to('addcartios')}}" data-id="{{$prod->id}}" data-sign="23"> <img src="{{ asset('public/'.env('THEME'))}}/images/features/add.png" alt="вывод кнопки добавить" /></a>
                                    </div>


                                </div>


                             </div>


                    @endforeach
             </div>


        @if($adopt)
            <div class="coral">
                <p > {!! $products->render() !!}</p>
            </div>
        @endif




          @else
           {!! Lang::get('ru.articles_no') !!}
          @endif



