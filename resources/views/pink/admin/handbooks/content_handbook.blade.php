

    @if($books)
        <div class="container">
            <table class="table table-hover table-stripped">
                <thead>
                <tr>
                    <th>№ п/п</th>
                    <th>Короткое имя</th>
                    <th>Наименование</th>
                    <th>Удалить</th>
                </tr>

                </thead>

                <tbody>

                @foreach($books as $k=>$book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td> {!! Html::link(route('handbooksEdit',['book'=>$book->id]), $book->nick,['alt'=>$book->nick] ) !!}</td>
                        <td>{{$book->name}}</td>
                       <td>  {!! Form::open(['url'=>route('handbooksEdit',['book'=>$book->id] ), 'class'=>'form-horizontal', 'method'=>'POST']) !!}

                           {{ method_field('DELETE') }}
                          {!! Form::button('удалить',['class'=>'btn btn-danger', 'type'=>'submit','']) !!}

                        {!! Form::close() !!}
                        </td>

                    </tr>

                @endforeach
                </tbody>
            </table>
            <br/> <br/>
            {!! Html::link(route('handbooksAdd'),'Новая позиция',['class'=>'btn btn-success']) !!}
            <br/> <br/>

            <br/> <br/>
        </div>
    @endif




