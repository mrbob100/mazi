
    <!-- Example row of columns -->

        <header>
            <h3 class="head text-center">{!! $category->name !!}</h3>
        </header>
    @if($productsItem)
            <div class="wrapProd">
                @foreach($productsItem as $prod)

                    <div class="productsin">
                        <a href="{{route('product',['id'=>$prod->id]) }}"> <img src="{{ asset('public/'.env('THEME'))}}/images/{{ $prod->img->max }}"  alt="вывод изображения" /></a>
                        @if($prod->new)
                            <div class="layer02">
                                <img src="{{ asset('public/'.env('THEME')) }}/images/features/new.png" alt="" />
                            </div>
                        @elseif($prod->sale)
                            <div class="layer03">
                                <img src="{{ asset('public/'.env('THEME')) }}/images/features/sale.png" alt="" />
                            </div>
                        @endif



                            <div class="product liked-product simpleCart_shelfItem">
                                <a class="like_name" href="{{route('product',['id'=>$prod->id]) }}" style=" color: #816263;font-size: 0.7em;">{!! $prod->name !!}</a>
                                <p><a class="item_add" href="{{route('product',['id'=>$prod->id]) }}" style=" color: #816263;font-size: 1.0em;"><i></i> <span class=" item_price">{!!$prod->price  !!} гр.</span> </a></p>
                                <div class="mask">
                                    <a href="{{route('product',['id'=>$prod->id]) }}" >Купить</a>
                                </div>
                                <div class="dopContent">
                                    <div class="tab-pane active" name="how-to" id="how-to" >
                                        @if($prod->exactlyType1)
                                            @foreach($prod->exactlyType1 as $item)
                                                <p class="tab-text" style=" color: #816263;font-size: 0.7em;" > {{str_limit($item,32)}}</p>

                                            @endforeach
                                        @endif
                                        <hr/>
                                    </div>
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



