<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1">

    <link href="{{ asset('public/'.env('THEME')) }}/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/jquery.js "  ></script>
    <script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/bootstrap.min.js"  ></script>
    <script type="text/javascript" src="{!! asset('public/'.env('THEME')) !!}/js/bootstrap-filestyle.min.js" ></script>
    <script type="text/javascript" src="{!! asset('public/'.env('THEME')) !!}/js/ckeditor/ckeditor.js "  ></script>
    <link href="{{ asset('public/'.env('THEME')) }}/css/style.css" rel="stylesheet">
    <!--link href="{--{ asset('public/'.env('THEME')) }--}/css/uroda.css" rel="stylesheet"-->
    <script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/vue.min.js" charset="utf-8" ></script>
    <script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/someExample.js" charset="utf-8" ></script>

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


