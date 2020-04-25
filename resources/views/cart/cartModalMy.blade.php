@if(session('cart'))
<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th>Фото</th>
            <th>Наименование</th>
            <th>Код товара</th>
            <th>Кол-во</th>
            <th>Цена</th>
            <th>Сумма</th>
            <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
        </tr>
        </thead>
        <tbody>


       @foreach(session('cart') as $item )
        {{-- @foreach($items as $item )--}}

           {{-- csrf_field() --}}




        <tr>
            <td > <img src="{{ asset('public/'.env('THEME')) }}/images/{{ $item['cart.img'] }}  " height="80" alt="картинка"/> </td>
            <td>{!! $item['cart.name'] !!}    </td>
            <td >{!! $item['cart.code'] !!} </td>
            <td> <input id="movieMaker" data-id="{{$item['cart.id']}}" type="number" value="{!! $item['cart.qty'] !!}"/> </td>
             <!--td>{--!! $item['cart.qty'] !!--}</td-->
            <td >{!! $item['cart.price'] !!} </td>
            <td>{!! $item['cart.qty']*$item['cart.price'] !!} </td>
            <td><span  data-id = "{!! $item['cart.id'] !!} "  class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
        </tr>
            @endforeach

     {{--   @endforeach --}}

       {{--  @endforeach--}}
        <tr>
            <td colspan="4">Итого: </td>
            <td>{!! session('cardCommon.qty') !!}  </td>
        </tr>
        <tr>
            <td colspan="4">На сумму: </td>

            <td>   {!!session('cardCommon.sum') !!} </td>
            <td>{!! session('cardCommon.sum') !!}  </td>
        </tr>
        </tbody>
    </table>
</div>
@else
<h3>Корзина пуста</h3>
<p><a href="{{route('index') }}" class="btn btn-primary">Продолжить</a>
@endif

