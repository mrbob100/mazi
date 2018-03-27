@if($users)
   <h3>  {!! $data['title'] !!}</h3>
    <div class="container">
        <table class="table table-hover table-stripped">
            <thead>
            <tr>
                <th>Id </th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>E-mail</th>
                <th>Телефон</th>
                <th>Статус</th>
                <th>Оборот</th>
                <th>Дата создания</th>
                <th>Удалить</th>
            </tr>

            </thead>

            <tbody>
    @php
    $j=0;
    @endphp
            @foreach($users as $k=>$user)
                <tr>
                    <td>{{ $user->id }}</td>

                        <td> {!! Html::link(route('showup',['user'=>$user->id]),$user->name,['alt'=>$user->name] ) !!}</td>
                    <td>{{$user->secondname}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->status}}</td>
                    <td>{{$sumUser[$j]}}</td>
                    <td>{{$user->created_at->Format('d-m-y')}}</td>
                    <td>  {!! Form::open(['url'=>route('showup',['user'=>$user->id] ), 'class'=>'form-horizontal', 'method'=>'POST']) !!}

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
        <br/> <br/>


        <br/> <br/>

    </div>
@endif
