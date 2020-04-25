@section('content')

    @if($informs)
        <div class="container backConnect">
            <table class="table table-hover table-stripped">
                <thead>
                <tr>

                    <th>Id</th>
                    <th>Имя</th>
                    <th>Телефон</th>
                    <th>URL</th>
                    <th>Дата</th>
                    <th>Удалить</th>
                </tr>

                </thead>

                <tbody>
@php
$j=0;
@endphp
                @foreach($informs as $k=>$inform)
                    <tr>
                        <td>{{ $inform->id }}</td>
                       <td> {!! Html::link(route('quickinfoEdit',['inform'=>$inform->id]),$inform->name,['alt'=>$inform->name, 'style'=>'background-image: url("/public/pink/images/admin/icn_edit.png")'] ) !!}</td>

                        <td>{{ $inform->phone }}</td>

                        <td><a id="quickInfo" href="#"  data-href="{{URL::to('product')}}" data-id="{{ $inform->url}}" >
                                {{$inform->url }}
                            </a></td>
                        <td>{{ $inform->created_at }}</td>
                        <td> {!! Form::open(['url'=>route('quickinfoEdit',['inform'=> $inform->id] ), 'class'=>'form-horizontal', 'method'=>'POST']) !!}

                            {{ method_field('DELETE') }}
                            {!! Form::button('удалить',['class'=>'btn btn-danger', 'type'=>'submit','']) !!}

                            {!! Form::close() !!}
                        </td>

                    </tr>
                    @php
                        $j++;
                    @endphp
                @endforeach
                </tbody>
            </table>

            {!!$informs->render()  !!}
            <br/> <br/>
        </div>
    @endif
@endsection