@if($products)
    <div id="delDiff11">
        <div class="sravn">
           <h1 >Сравнение &nbsp;{!! $category_id !!}</h1>
        </div>
        <div class="clearance">
        <a id="clearMain" href="{{route('differ')}}" data-href="{{URL::to('difference')}}" data-id="0" data-sign="58"> <button  type="button" class="btn btn-secondary btn-sm">Очистить все</button></a>
        </div>
    </div>


        <div class="wrapperProducts">


                 @for($i=0;$i<count($products);$i++)
                    @php $j=0; @endphp
                        <div class="productsinT021" >
                            <div class="orwrap">
                                @if($i==0)
                                     <div class="diffName ">
                                         <p>{!! $diffprod[$j]->name !!}</p>
                                         @php $j++; @endphp

                                    </div>
                                @endif
                                     <div id="swq" style="color:#941B1E; font-weight: 600;">
                                         {{str_limit($products[$i][0]['name'],32)}}
                                     </div>
                            </div>


                                        <div class="orwrap">
                                            @if($i==0)
                                                <div class="diffName" >
                                                    <p>{!! $diffprod[$j]->name !!}</p>
                                                    @php $j++; @endphp

                                                </div>
                                            @endif
                                            <div class="sw">
                                                <div id="swq01" class="picta" ><img src="{{ asset('public/'.env('THEME'))}}/images/{{ $products[$i][0]['img']->max }}"  alt="вывод изображения" /></div>

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
                                        </div>







                                       <div class="orwrap">
                                           @if($i==0)
                                               <div class="diffName">
                                                   <p>{!! $diffprod[$j]->name !!}</p>
                                                   @php $j++; @endphp

                                               </div>
                                           @endif
                                               <div id="swq" > <span class=" item_price">{!!$products[$i][0]['price']  !!} гр.</span> </div>
                                       </div>



                                       <div class="orwrap">
                                           @if($i==0)
                                               <div class="diffName">
                                                   <p>{!! $diffprod[$j]->name !!}</p>
                                                   @php $j++; @endphp

                                               </div>
                                           @endif
                                               <div id="swq" >{!! $products[$i][0]['company'] !!}</div>
                                       </div>



                                       <div class="orwrap">
                                           @if($i==0)
                                               <div class="diffName">
                                                   <p>{!! $diffprod[$j]->name !!}</p>
                                                   @php $j++; @endphp

                                               </div>
                                           @endif
                                               <div id="swq">{!! $products[$i][0]['weightbrutto'] !!}</div>
                                       </div>


                                       <div class="orwrap">
                                           @if($i==0)
                                               <div class="diffName">
                                                   <p>{!! $diffprod[$j]->name !!}</p>
                                                   @php $j++; @endphp

                                               </div>
                                           @endif
                                               <div id="swq">{!! $products[$i][0]['length'] !!}x{!! $products[$i][0]['width'] !!}x{!! $products[$i][0]['height'] !!}</div>
                                       </div>


                                       <div class="orwrap">
                                           @if($i==0)
                                               <div class="diffName">
                                                   <p>{!! $diffprod[$j]->name !!}</p>
                                                   @php $j++; @endphp

                                               </div>
                                           @endif
                                               <div id="swq2">{!! $products[$i][0]['country'] !!}</div>
                                       </div>


                                       <div class="orwrap">
                                           @if($i==0)
                                               <div class="diffName">
                                                   <p>{!! $diffprod[$j]->name !!}</p>
                                                   @php $j++; @endphp

                                               </div>
                                           @endif
                                           @if($i>0)
                                                   <div id="swq" style="margin-top: 12px;">{!! $products[$i][0]['termGuarantee'] !!}</div>
                                            @else
                                               <div id="swq2">{!! $products[$i][0]['termGuarantee'] !!}</div>
                                           @endif
                                       </div>


                                       <div class="orwrap">
                                           @if($i==0)
                                               <div class="diffName">
                                                   <p>{!! $diffprod[$j]->name !!}</p>
                                                   @php $j++; @endphp

                                               </div>
                                           @endif
                                               <div id="swq">{!! $products[$i][0]['packing'] !!}</div>
                                       </div>





                                   @for($k=0; $k<count($data['vivod']); $k++)
                                    <div class="orwrap">
                                        @if($i==0)
                                            <div class="diffName">

                                                <p>{!! trans('ru.'.$data['vivod'][$k]) !!}</p>


                                            </div>
                                        @endif
                                            <div id="swq">{!!$data['jump'][$k][$i] !!}</div>
                                    </div>



                                    @endfor


                           <div class="result">


                                    @if($i==0)
                                        <div class="mask" style="margin-left: 176px;">

                                    <a id="reactivebut" href="{{route('cartload',['id'=>$products[$i][0]->id])}}" data-href="{{URL::to('cartload')}}" data-id="{{$products[$i][0]->id}}" data-sign="39" onclick="zaraza(this);" > <img src="{{ asset('public/'.env('THEME'))}}/images/features/add.png"  alt="вывод кнопки добавить" /></a>

                                        </div>
                                   @else
                                   <div class="mask" >

                                       <a id="reactivebut" href="{{route('cartload',['id'=>$products[$i][0]->id])}}" data-href="{{URL::to('cartload')}}" data-id="{{$products[$i][0]->id}}" data-sign="39" onclick="zaraza(this);" > <img src="{{ asset('public/'.env('THEME'))}}/images/features/add.png"  alt="вывод кнопки добавить" /></a>

                                   </div>
                                   @endif
                           </div>
                        </div>



                 @endfor



            </div>
        </div>


@else
    {!! Lang::get('ru.articles_no') !!}

@endif
