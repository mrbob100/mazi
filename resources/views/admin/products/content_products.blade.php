@extends('layouts.admin')
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

                    <td>{!! Html::image('public/images/'.$product->img,'',['class'=>'img-circle img-responsive', 'width'=>'50px',
                   'data-buttonName'=>'btn-primary','data-placeholder'=>$product->img]) !!}</td>

                    <td>{{-- $parent_name[$j] }}{{' '--}}{{ $product->getCategory->name  }}</td>

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
        {!! Html::link(route('productAdd'),'Новый продукт',['class'=>'btn btn-success']) !!}
        <br/>
        {!! $products->render()  !!}

    @endif


</div>

@endsection
