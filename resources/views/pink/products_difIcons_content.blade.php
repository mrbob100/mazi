@if($products)
    <div class="titleDif">
        <h5>Списки сравнений</h5>
    </div>
    @for($ik=0;$ik<count($categories);$ik++)

        <div class="wrapperCompareProducts">



                @for($i=0;$i<count($products);$i++)

                    @if( $products[$i][0]['category_id']==$categories[$ik] )


                        <div class="productsCompare" >
                            <div id="delButton" ><a href="{{route('differ',['id'=>$products[$i][0]->id])}} "  data-href="{{URL::to('difference')}}" data-id="{{$products[$i][0]->id}}" data-sign="43"><img src="{{ asset('public/'.env('THEME'))}}/images/features/cross.png"  alt="вывод изображения" /></a></div>
                            <div id="pictures"><img src="{{ asset('public/'.env('THEME'))}}/images/{{ $products[$i][0]['img']->max }}"  alt="вывод изображения" /></div>


                            <div class="nameSclad">
                                <div id="swq01" >  {{str_limit($products[$i][0]['name'],32)}}</div>
                                <div class="scladYes">
                                    @if($products[$i][0]['sclad']=='Y')
                                        <span>Есть в наличии</span>
                                    @else
                                        <span>Нет в наличии</span>
                                     @endif
                                </div>
                                 <span class=" item_price">{!!$products[$i][0]['price']  !!} гр.</span>
                            </div>



                        </div>
                    @endif
                @endfor



        </div>
     <div id="difbutton" href="{{route('differ')}} "  data-href="{{URL::to('difference')}}" data-id="{{$categories[$ik]}}" data-sign="57"><img src="{{ asset('public/'.env('THEME'))}}/images/features/difference.png"  alt="вывод изображения" /></div>
        <br/><br/><br/><br/><br/><br/>
    @endfor

@else
    {!! Lang::get('ru.articles_no') !!}
@endif