@section('content')
    <div style="margin: 0px 50px 0px 50px;">
        @if($products)
            @php
                $j=0;
            @endphp
            <table class="table table-hover table-stripped">
                <thead>
                <tr>
                    <th>№ п/п</th>
                    <th>изображение</th>
                    <th>Категория</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Удалить</th>
                </tr>
                </thead>
                <tbody>

                @foreach($products as $k=>$product)
                    <tr>

                        <td>{{ $product->id }}</td>

                        <td>{!! Html::image('public/'.env('THEME').'./images/'.$product->img->mini,'',['class'=>'img-circle img-responsive', 'width'=>'50px',
                   'data-buttonName'=>'btn-primary','data-placeholder'=>$product->name]) !!}</td>

                        <td>{{-- $parent_name[$j] }}{{' '--}}{{ $product->categories->name  }}</td>

                        <td> {!! Html::link(route('productEdit',['product'=>$product->id]), $product->name,['alt'=>$product->name] ) !!}  </td>
                        <td> {{  $product->price }}</td>
                        <td> {!! Form::open(['url'=>route('productEdit',['product'=>$product->id] ), 'class'=>'form-horizontal', 'method'=>'POST' ]) !!}
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
            <br/> <br/>
            {!! Html::link(route('productAdd'),'Новый продукт',['class'=>'btn btn-success','style'=>'background-color:#806052;color:white; font-size:18px; ']) !!}
            <br/> <br/>


        @endif
        <br/> <br/>
        <div class="clear"></div>
        <!-- {--!! $products->render()  !!--} -->
    </div>

@endsection