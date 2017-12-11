@section('content')
    <div style="margin: 0px 50px 0px 50px;">
        @if($orders)
            @php
                $j=0;
            @endphp
            <table class="table table-hover table-stripped">
                <thead>
                <tr>
                    <th>№ заказа</th>
                    <th>покупатель</th>
                    <th>№ телефона</th>
                    <th>Количество</th>
                    <th>Сумма</th>
                    <th>Статус</th>
                    <th>дата заказа</th>
                    <th>Удалить</th>
                </tr>
                </thead>
                <tbody>

                @foreach($orders as $k=>$order)
                    <tr>

                        <td>{{ $order->id }}</td>
                        <td>{{-- $parent_name[$j] }}{{' '--}}{{ $order->users->name  }}&nbsp{{ $order->users->secondname}}</td>

                        <td> {!! Html::link(route('orderEdit',['order'=>$order->id]), $order->users->phone,['alt'=>'телефон'] ) !!}  </td>
                        <td> {{  $order->qty }}</td>
                        <td>{{$order->sum}}&nbsp гр.</td>
                        <td>{{$order->status ? 'обработан' : 'в работе'}}</td>
                        <td>{{$order->created_at }}</td>
                        <td> {!! Form::open(['url'=>route('orderEdit',['order'=>$order->id] ), 'class'=>'form-horizontal', 'method'=>'POST' ]) !!}
                            {{ method_field('DELETE') }}
                            {!! Form::button('Удалить',['class'=>'btn btn-danger', 'type'=>'submit']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @php
                        $j++;
                    @endphp

                @endforeach
                </tbody>
            </table>


            {!! $orders->render()  !!}

        @endif
        <br/> <br/>
        <div class="clear"></div>
        <!-- {--!! $products->render()  !!--} -->
    </div>

@endsection