@extends('layouts.admin')
@section('content')
<div style="margin: 0px 50px 0px 50px;">
    @if($categories)
        <table class="table table-hover table-stripped">
            <thead>
                <tr>
                    <th>№ п/п</th>
                    <th>Родительская категория</th>
                    <th>Категория</th>
                    <th>Удалить</th>
                </tr>
            </thead>
            <tbody>

                @foreach($categories as $k=>$category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->parent_id==0 ?  'Самостоятельная категория' :   $category->getCategory->name  }}</td>
                        <td> {!! Html::link(route('categoryEdit',['category'=>$category->id]), $category->name,['alt'=>$category->name] ) !!}  </td>
                   <td> {!! Form::open(['url'=>route('categoryEdit',['category'=>$category->id] ), 'class'=>'form-horizontal', 'method'=>'POST' ]) !!}
                       {{ method_field('DELETE') }}
                        {!! Form::button('Удалить',['class'=>'btn btn-danger', 'type'=>'submit']) !!}
                        {!! Form::close() !!}
                   </td>
                    </tr>
                 @endforeach
            </tbody>
        </table>
        {!! Html::link(route('categoryAdd'),'Новая категория',['class'=>'btn btn-success']) !!}
        <br/>
        {!! $categories->render()  !!}

    @endif


</div>

 @endsection
