<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1">
    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">

    <script type="text/javascript" src=" {!! asset('public/js/jquery.js')   !!}  "  ></script>
    <script type="text/javascript" src=" {!! asset('public/js/bootstrap.min.js') !!} "  ></script>
    <script type="text/javascript" src=" {!! asset('public/js/ckeditor/ckeditor.js')   !!}  "  ></script>
    <script type="text/javascript" src=" {!! asset('public/js/bootstrap-filestyle.min.js')   !!}  "  ></script>
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/uroda.css') }}" rel="stylesheet">

</head>
<body>
<header id="header_wrapper">
    @yield('header')
    @if(count($errors)>0)
        <div class="'alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
     @endif
    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif

</header>

@yield('content')
</body>
</html>