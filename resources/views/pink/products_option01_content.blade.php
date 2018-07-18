@if($products)

    <div class="wrapperProducts">

        <div class="inwrapName">
              @foreach($diffprod as $item)
                 <ul class="inwrapItem">
                   <li>    {!! $item->name !!}</li>
                 </ul>
               @endforeach
         </div>
        <div class="inwrapInvent">
                @for($i=0;$i<count($products);$i++)

                    <div class="productsinT021" >
                      <div id="swq01" style="color:#941B1E; font-weight: 600;">  {{str_limit($products[$i][0]['name'],32)}}</div>
                        <div class="sw">
                                        <div id="swq01"><img src="{{ asset('public/'.env('THEME'))}}/images/{{ $products[$i][0]['img']->max }}"  alt="вывод изображения" /></div>
                                    @if($products[$i][0]['new'])
                                            <div class="layer02">
                                                <img src="{{ asset('public/'.env('THEME')) }}/images/features/new012.png" alt="" />
                                            </div>
                                        @elseif($products[$i][0]['sale'])
                                            <div class="layer02">
                                                <img src="{{ asset('public/'.env('THEME')) }}/images/features/saleGreen.png" alt="" />
                                            </div>
                                        @elseif($products[$i][0]['hit'])
                                            <div class="layer02">
                                                <img src="{{ asset('public/'.env('THEME')) }}/images/features/topBlue.png" alt="" />
                                            </div>
                                        @endif
                        </div>
                        <div class="liked-product simpleCart_shelfItem">
                               <div class="iwrapprod">
                                    <div id="swq" > <span class=" item_price">{!!$products[$i][0]['price']  !!} гр.</span> </div>
                                    <div id="swq">{!! $products[$i][0]['code'] !!}</div>
                                    <div id="swq" >{!! $products[$i][0]['company'] !!}</div>
                                    <div id="swq">{!! $products[$i][0]['sclad'] !!}</div>
                                    <div id="swq">Рейтинг</div>
                                    <div id="swq1">{!! $products[$i][0]['description'] !!}</div>
                                    <div id="swq2">{!! $products[$i][0]['weightbrutto'] !!}</div>
                                    <div id="swq2">{!! $products[$i][0]['length'] !!}x{!! $products[$i][0]['width'] !!}x{!! $products[$i][0]['height'] !!}</div>
                                    <div id="swq2">{!! $products[$i][0]['country'] !!}</div>
                                    <div id="swq2">{!! $products[$i][0]['termGuarantee'] !!}</div>
                                   <div id="swq2">{!! $products[$i][0]['packing'] !!}</div>
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

                        <div class="mask" >
                            <a id="reactivebut" href="{{route('cartload',['id'=>$products[$i][0]->id])}}" data-href="{{URL::to('cartload')}}" data-id="{{$products[$i][0]->id}}" data-sign="39"> <img src="{{ asset('public/'.env('THEME'))}}/images/features/add.png"  alt="вывод кнопки добавить" /></a>

                        </div>

                    </div>
                @endfor
        </div>

    </div>







@else
    {!! Lang::get('ru.articles_no') !!}
@endif
