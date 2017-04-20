
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <!--script type="text/javascript" src="http:://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" ></script-->
    <script type="text/javascript" src="{{asset('public/js/jquery-3.1.1.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('public/js/script.js') }}"></script>

    <title>Ajax загрузка файлов</title>
</head>

<body>
<form action="{{ route('storeCsv')}}" method="post" id="my_form" enctype="multipart/form-data" >

    <p>
        <label for="my_file">Файл:</label>
        <input type="file" name="my_file" id="my_file">
        <progress id="progressbar" value="{{old(0)}}" max="{{old(100)}}"></progress>
    </p>
    {{ csrf_field() }}

    <input type="submit" id="submit" value="Отправить">
</form>
</body>
</html>