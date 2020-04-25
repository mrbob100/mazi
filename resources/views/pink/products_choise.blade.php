
    <!-- Example row of columns -->

        <header>
            <h1 class="head text-center">{!! $category->name !!}</h1>
        </header>
    @if($productsItem)
            <div class="wrapProd">
                @foreach($productsItem as $prod)

                    <div class="productsin">
                        <span style=" color: #5A7793;font-size: 0.8em;font-weight: bold;">{{str_limit($prod->name,32)}}  </span>

                        <a id="reactimage" class="like_img"  href="{{route('addcartios',['id'=>$prod->id])}}" data-href="{{URL::to('addcartios')}}" data-id="{{$prod->id}}" data-sign="25"> <img src="{{ asset('public/'.env('THEME'))}}/images/{{ $prod->img->max }}"  alt="вывод изображения" /></a>
                        @if($prod->new)
                            <div class="layer02">
                                <img src="{{ asset('public/'.env('THEME')) }}/images/features/new.png" alt="" />
                            </div>
                        @elseif($prod->sale)
                            <div class="layer03">
                                <img src="{{ asset('public/'.env('THEME')) }}/images/features/sale.png" alt="" />
                            </div>
                        @endif



                        <div class="liked-product simpleCart_shelfItem">


                            <p><i><span class="item_price" style=" color: #5A7793;font-size: 0.8em;font-weight: bold;">{!!$prod->price  !!} гр.</span></i>  </p>
                            <div class="mask" >
                                <a id="reactbutton" href="{{route('addcartios',['id'=>$prod->id])}}" data-href="{{URL::to('addcartios')}}" data-id="{{$prod->id}}" data-sign="25"> <img src="{{ asset('public/'.env('THEME'))}}/images/features/add.png" alt="вывод кнопки добавить" /></a>
                            </div>


                        </div>
                        {{ csrf_field() }}


                        <!--p><a class="btn btn-default" href="{{-- route('articleShow',['id'=>$article->id]) --}}" role="button">Подробнее &raquo;</a></p-->

                        <!--form action="{{-- route('articleDelete',['article' => $article->id]) --}}" method="post"-->

                            <!-- <input type="hidden" name="_method" value="DELETE">-->

                        {{--method_field('DELETE')--}}

                        {{-- csrf_field() --}}
                        <!--button type="submit" class="btn btn-danger">
                                Delete
                            </button-->

                            <!--/form-->
                    </div>
                @endforeach
            </div>
            @else
            <br/> <br/>
            <h3> По данному запросу ничего не найдено ! </h3>
        @endif
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>



