 <div class="container">
        <div class="wrapper container-fluid">
              <h2> Товарооборот &nbsp;{!! $data['data']['turnOver'] !!}</h2>
            {!! Form::open(['url'=>route('showup'/*,['category'=>$category->id]*/ ), 'class'=>'form-horizontal',
            'method'=>'POST','enctype'=>'multipart/form-data' ]) !!}
            <div class="form-group">
                {!! Form::hidden('id',$users->id) !!}
                {!! Form::label('name','Имя',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs-8">
                    {!! Form::text('name',$data['name'],['class'=>'form-control','placeholder'=>'Имя пользователя']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('secondname','Фамилия',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs-8">
                    {!! Form::text('secondname',$data['secondname'],['class'=>'form-control','placeholder'=>'Имя пользователя']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('email','E-mail:',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs-8">
                    {!! Form::text('email',$data['email'],['class'=>'form-control','placeholder'=>'E-mail:']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('phone','Телефон',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs-8">
                    {!! Form::text('phone',$data['phone'],['class'=>'form-control','placeholder'=>'Телефон']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('status','Статус',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs-8">
                    {!! Form::text('status',$data['status'],['class'=>'form-control','placeholder'=>'Статус пользователя']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('discount','Скидка',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs-8">
                    {!! Form::text('discount',$data['discount'],['class'=>'form-control','placeholder'=>'Скидка пользователя']) !!}
                </div>
            </div>
            <div class="form-group">

                <div class="col-xs-10">
                    {!! Form::button('Сохранить',['class'=>'btn btn-primary','type'=>'submit']) !!}
                </div>
            </div>
            {!! Form::close() !!}

            @if($orders)
            <div class="form-group">
                <div class="col-xs-8">

                        <table class="table table-hover table-stripped">
                            <thead>
                            <tr>
                                <th>Id заказа</th>
                                <th>количество</th>
                                <th>сумма</th>
                                <th>менеджер</th>
                                <th>дата </th>
                            </tr>

                            </thead>

                 <tbody>
                    @foreach ($orders as $order)
           <tr>
              <!--a href="{--{route('orderEdit',['id'=>$order->id])}--}"> <td>{--!! $order->id !!--}</td></a-->
               <td> {!! Html::link(route('orderEdit',['id'=>$order->id]), $order->id,['alt'=>$order->id] ) !!} </td>
               <td>{!! $order->qty !!}</td>
               <td>{!! $order->sum !!}</td>
               <td>{!! $order->manager !!}</td>
               <td>{!! $order->created_at->Format('d-m-y') !!}</td>
           </tr>

                    @endforeach
                 </tbody>
                        </table>

            </div>
        </div>
    @endif
    </div>
 </div>