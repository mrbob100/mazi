@section('content')
    <div class="container">
        <div class="wrapper container-fluid">

            {!! Form::open(['url'=>route('orderEdit',['order'=>$data['id']] ), 'class'=>'form-horizontal',
            'method'=>'POST','enctype'=>'multipart/form-data' ]) !!}

            <div class="form-group">
                {!! Form::hidden('id',$data['id']) !!}
                {!! Form::label('order','№ заказа',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('order',$data['id'],['class'=>'form-control','placeholder'=>'№ заказа']) !!}
                </div>
            </div>
            <div class="form-group">

                {!! Form::label('name','Покупатель',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                  <!--  {--{$data['name']== $order->users->name  }--}-->
                    {!! Form::text('name',$data->users->name.' '.$data->users->secondname,['class'=>'form-control','placeholder'=>' Покупатель']) !!}
                </div>
            </div>


            <div class="form-group">
                {!! Form::label('qty','Количество',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('qty',$data['qty'],['id'=>'editor1','class'=>'form-control','placeholder'=>'Количество']) !!}
                </div>
            </div>


            <div class="form-group">
                {!! Form::label('sum','Сумма',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">
                    {!! Form::text('sum',$data['sum'],['class'=>'form-control','placeholder'=>'Сумма']) !!}
                </div>
            </div>



            <div class="form-group">
                {!! Form::label('status','Статус',['class'=>'col-xs2 control-label']) !!}
                <div class="col-xs8">

                    {!! Form::select('status',$status,['class'=>'form-control','placeholder'=>'Статус']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('created_at','Дата',['class'=>'col-xs2 control-label']) !!}
            <div class="col-xs8">
                {!! Form::text('created_at',$data['created_at'],['class'=>'form-control','placeholder'=>'Дата']) !!}
            </div>
        </div>
            {!! Form::label('updated_at','Дата',['class'=>'col-xs2 control-label']) !!}
            <div class="col-xs8">
                {!! Form::text('updated_at',$data['updated_at'],['class'=>'form-control','placeholder'=>'Дата изменения']) !!}
            </div>
        </div>

            <table class="table table-hover table-stripped">
                <thead>
                <tr>
                    <th>Наименование товара</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Сумма</th>

                </tr>
                </thead>
                <tbody>
                        @foreach($qww as $item)
                            <tr>
                                 <td>  {!! Form::text('name',$item->name,['class'=>'form-control','placeholder'=>'Наименование товара']) !!} </td>
                                 <td>  {!! Form::text('price',$item->price,['class'=>'form-control ','placeholder'=>'Цена']) !!} </td>
                                 <td>   {!! Form::text('qty_item',$item->qty_item,['class'=>'form-control ','width'=>'50px;','placeholder'=>'Количество']) !!}</td>
                                 <td>   {!! Form::text('sum_item',$item->sum_item.' '.'гр',['class'=>'form-control ','width'=>'50px;','placeholder'=>'Сумма']) !!}</td>

                            </tr>
                        @endforeach
                </tbody>
            </table>
            <div class="form-group">
                <div class="col-xs10">
                    {!! Form::button('Сохранить',['class'=>'btn btn-primary','type'=>'submit']) !!}
                </div>
            </div>
            {!! Form::close() !!}


        </div>
    </div>
@endsection