@if($sliders)
    <h3>  {!! $data['title'] !!}</h3>
    <div class="container">
        <table class="table table-hover table-stripped">
            <thead>
            <tr>
                <th>№ п\п</th>
                <th>Наименование продукта</th>
                <th>Путь к файлу</th>
                <th>код продукта</th>
                <th>Дата</th>
                <th>Удалить</th>
            </tr>

            </thead>

            <tbody>
            @php
                $j=0;
            @endphp
            @foreach($sliders as $k=>$slider)
                <tr>
                    <td>{{ $slider->id }}</td>

                    <td> {!! Html::link(route('sliderEdit',['slider'=>$slider->id]),$slider->name,['alt'=>$slider->name] ) !!}</td>
                    <td>{{$slider->path}}</td>
                    <td>{{$slider->user_id}}</td>
                    <td>{{$slider->created_at->Format('d-m-y')}}</td>
                    <td>  {!! Form::open(['url'=>route('sliderEdit',['slider'=>$slider->id] ), 'class'=>'form-horizontal', 'method'=>'POST']) !!}

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
        {!! Html::link(route('sliderAdd'),'Новая строка слайдера',['class'=>'btn btn-success']) !!}
        <br/> <br/>
    </div>
@endif