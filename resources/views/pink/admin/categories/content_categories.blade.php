@section('content')

    @if($categories)
        <div class="container">
        <table class="table table-hover table-stripped">
            <thead>
                <tr>
                    <th>№ п/п</th>
                    <th>Родительская категория</th>
                    <th>Категория</th>
                    <th>Изображение</th>
                    <th>Корректир./Удалить</th>
                </tr>

            </thead>

            <tbody>

                @foreach($categories as $k=>$category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->parent_id==0 ?  'Самостоятельная категория' :   $category->getCategory->name  }}</td>
                        <td> {!!  $category->name  !!}
                       </td>
                        <td>{!! Html::image('public/'.env('THEME').'./images/'.$category->img,'',['class'=>'img-circle img-responsive', 'width'=>'50px',
                   'data-buttonName'=>'btn-primary','data-placeholder'=>$category->name]) !!}</td>
                   <td> {!! Form::open(['url'=>route('categoryEdit',['category'=>$category->id] ),  'class'=>'form-horizontal', 'method'=>'POST', 'id'=>'deleteAdmCat']) !!}
                       <a href="{{route('categoryEdit',['category'=>$category->id]) }}" ><img src="{{ asset('public/'.env('THEME'))}}/images/admin/icn_edit.png " style="width:40px; heigh:auto; margin-left: 30px;" id="picture" ></a>
                       {{ method_field('DELETE') }}

                       <button>
                       <img src="{{ asset('public/'.env('THEME'))}}/images/admin/icn_trash.png " style="width:30px; heigh:auto; " id="picture" ></a>
                       </button>
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
