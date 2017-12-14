<meta charset="utf-8">
<div class="container">

    <div class="row ">

<div class="optionStatus" style="margin: 0px 50px 0px 50px;">
        @if($orders)
            @php
                $j=0;
            $as="";
            @endphp
        <div class="col-xs-9  text-center PinkerMain" >
        <form  id="selectMyOptions" action="{{route('cabinet')}}" name="myform"  method="post">
        {{ csrf_field() }}
      <!--  {--!! Form::open(['url'=>route('cabinet' ), 'class'=>'form-horizontal', 'id'=>'zluka', 'method'=>'POST' ]) !!--} -->

            @foreach($orders as $order)



                    <table class="table table-hover table-stripped ">

                                <thead>
                                <tr>
                                    <th>№ заказа</th>
                             @if($priznak==1)
                                    <th>Имя</th>
                                    <th>Email</th>
                                    <th>Телефон</th>
                              @endif
                                    <th>Количество</th>
                                    <th>Сумма</th>
                                    <th>Статус</th>
                                @if($priznak==1)
                                        <th>выбор</th>
                                    @endif
                                    <!--th>Менеджер</th-->
                                    <th>дата заказа</th>


                                </tr>
                                </thead>

                               <tbody>


                <tr>

                        <td>{{ $order->id }}</td>
                        @if($priznak==1)
                            <td>{{  $order->users->name }}</td>
                            <td>{{  $order->users->email }}</td>
                            <td>{{  $order->users->phone }}</td>
                        @endif

                        <td> {{  $order->qty }}</td>
                        <td> {{  $order->sum }}</td>

                        @if($priznak!=1)
                            @if($order->status==2)
                                <td style="background: yellow;"> отправлен </td>
                             @endif
                            @if($order->status==3)
                                <td style="background:greenyellow;"> завершен </td>
                            @endif
                            @if($order->status==1)
                                <td style="background: coral;">в работе</td>
                            @endif
                            @if($order->status==0)
                                <td style="background: red;">Не выбран</td>
                            @endif
                       @else
                        @if($order->status==2)
                            <td style="background: yellow;"> отправлен </td>
                        @endif
                        @if($order->status==3)
                            <td style="background:greenyellow;"> завершен </td>
                        @endif
                        @if($order->status==1)
                            <td style="background: coral;">в работе</td>
                        @endif
                        @if($order->status==0)
                            <td style="background: red;">Не выбран</td>
                        @endif
                  <td>
                        <select name="optionTools" size="1"  style="width:90px;" data-id="{{ $order->id }}" class="selectStatus">

                                <option disabled selected>статус</option>
                            @foreach($optionTool as $profile)
                                <option value="{{$profile[0]}}">{!!$profile!!}</option>
                            @endforeach

                        </select>
                  </td>

                       @endif
                       <!--td>{--{$order->manager}--}</td-->



                        <!--td>    { !! Html::link(route('cabinet',['id'=>$order->id]),$order->created_at->toDateString() ,['alt'=>'номер заказа' ,'class'=>'azopa' ] ) !!}  </td-->
                    <td><a class="subboth" href="#">{{$order->created_at->toDateString()}}</a></td>

                    </tr>

                    @php
                        $j++;
                    @endphp







                            @foreach($order->order_items as $item)


                                    <tr class="asdast" name="{{ $order->id }}" val="{{ $order->id }}">

                                        <td>  {{$item->name}} </td>
                                        <td>  {!!$item->price !!} </td>
                                        <td>   {!! $item->qty_item !!}</td>
                                        <td>   {!! $item->sum_item !!}&nbsp; гр </td>

                                    </tr>


                            @endforeach







                </tbody>
            </table>

            @endforeach
      <!--  {--!! Form::button('Отправить',['class'=>'btn btn-danger', 'type'=>'submit']) !!--}
        {--!! Form::close() !!--} -->


<br/><br/><br/>
            @if($priznak==1)
                <input type="submit" id="button_left" class="btn btn-danger" value="отправить" />
            @endif
        </form>
</div>
  @endif
         </div>
    </div>
        <br/> <br/>
        <div class="clear"></div>
         {!!$orders->render()  !!}
 </div>

