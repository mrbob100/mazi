@if(session('cart'))
    <div class="table-responsive pq17">
        <table class="table table-hover table-striped">

            <thead>
            <!--tr>
                <th></th>
                <th></th>
                <th></th>
                <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
            </tr-->
            </thead>


            <tbody>



            @foreach(session('cart') as $item )
                {{-- @foreach($items as $item )--}}

                {{-- csrf_field() --}}




                <tr >
                    <td > <img src="{{ asset('public/'.env('THEME')) }}/images/{{ $item['cart.img'] }}  " height="80" alt="картинка"/> </td>
                    <td width="250px;" style=" color:#000000;font-size: 0.8em;font-weight: bold;">{!! $item['cart.name'] !!}
                        <br/>
                   {!! $item['cart.code'] !!}
                        <br/>
                    <a id="moreInfo" href="{{route('product')}}" data-href="{{URL::to('product')}}" data-id="{{$item['cart.id']}}" data-sign="26" style=" color: #5A7793;font-size: 1.1em;font-weight: bold;" >Подробнее </a>
                        <!--a href="#" id="{--{$item['cart.id']}--}"  onclick="openWin();" style=" color: #5A7793;font-size: 1.1em;font-weight: bold;" > Подробнее </a-->
                    </td>
                    <!--td> <input id="movieMaker" data-id="{--{$item['cart.id']}--}" type="number" value="{--!! $item['cart.qty'] !!--}"/> </td-->
                    <!--td>{--!! $item['cart.qty'] !!--}</td-->
                    <td class="numberModal"  >
                        <span class="minus">-</span>
                        <input id="unique" data-id="{{$item['cart.id']}}" type="text" value="{!! $item['cart.qty'] !!}" size="3"/>
                        <span class="plus">+</span>
                    </td>
                    @if($item['cart.qty']>1)
                        <td id="speedIns" style=" color: #000000;font-size: 0.8em;font-weight: bold;">{!!$item['cart.qty'].'*'.$item['cart.price'] !!} &nbsp;гр.</td>
                       @else
                    <td style=" color: #000000;font-size: 0.8em;font-weight: bold;">{!! $item['cart.price'] !!} &nbsp;гр.</td>
                    @endif
                <!--td style=" color: #5A7793;font-size: 0.8em;font-weight: bold;">{--!! $item['cart.qty']*$item['cart.price'] !!--} </td-->

                    <td></td>
                    <td><span  data-id = "{!! $item['cart.id'] !!} "  class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                </tr>
            @endforeach

            {{--   @endforeach --}}

            {{--  @endforeach--}}
            <!--tr>
                <td colspan="4">Итого: </td>
                <td>{--!! session('cardCommon.qty') !!--}  </td>
            </tr-->

            <!--tr>
                <td colspan="4"> </td>
                <td id="speedTotal" style=" color:#000000;font-size: 1.0em;font-weight: bold;">Итого:&nbsp;&nbsp;{--!! session('cardCommon.sum') !!--} .00&nbsp;гр. </td>
            </tr-->

            </tbody>

        </table>

    </div>
    <div id="speedTotal" style=" color:#000000;font-size: 1.0em;font-weight: bold; margin-left:600px; ">Итого:&nbsp;&nbsp;{!! session('cardCommon.sum') !!} .00&nbsp;гр. </div>
@else
    <h3>Корзина пуста</h3>
    <p><a href="{{route('index') }}" class="btn btn-primary">Продолжить</a></p>
@endif

