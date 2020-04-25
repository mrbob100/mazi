@extends(env('THEME').'.layouts.siteCabinet')
@section('content')
<div class="container">

    <title>Ajax загрузка файлов</title>


<form action="{{ route('storeCsv')}}" method="post" id="my_form" enctype="multipart/form-data" >

    <p>
        <label for="my_file">Файл:</label>
        <input type="file" name="my_file" id="my_file">
        <progress id="progressbar" value="{{old(0)}}" max="{{old(100)}}"></progress>
    </p>
    {{ csrf_field() }}
    <p><input name="dzek" type="radio"  value="1" class="select21">Укороченный файл (код : цена)</p>
    <p><input name="dzek" type="radio"  value="2" class="select21" > Полный файл</p>
    <input type="submit" id="submit" value="Отправить">
</form>
</div>
@endsection