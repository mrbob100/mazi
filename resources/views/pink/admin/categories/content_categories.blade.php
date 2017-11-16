@section('content')

    @if($categories)
        <div class="container">
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
                        <td> {!! Html::link(route('categoryEdit',['category'=>$category->id]), $category->name,['alt'=>$category->name, 'style'=>'background-image: url("/public/pink/images/admin/icn_edit.png")'] ) !!}</td>
                   <td> {!! Form::open(['url'=>route('categoryEdit',['category'=>$category->id] ), 'class'=>'form-horizontal', 'method'=>'POST']) !!}

                       {{ method_field('DELETE') }}
                        {!! Form::button('удалить',['class'=>'btn btn-danger', 'type'=>'submit','']) !!}

                        {!! Form::close() !!}
                   </td>

                    </tr>

                 @endforeach
            </tbody>
        </table>
        <br/> <br/>
        {!! Html::link(route('categoryAdd'),'Новая категория',['class'=>'btn btn-success']) !!}
        <br/> <br/>
        {!! $categories->render()  !!}
        <br/> <br/>
        </div>
    @endif




 @endsection
