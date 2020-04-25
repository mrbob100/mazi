<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="{{isset($meta_desc) ? $meta_desc : '' }}" />
    <meta name="keywords" content="{{isset($keywords) ? $keywords : ''}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$title or 'Bosch'}}</title>
    <link href="{{ asset('public/'.env('THEME')) }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('public/'.env('THEME')) }}/css/animate.css" rel="stylesheet">
    <script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!} /js/jquery.js "  ></script>
    <script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!} /js/bootstrap.min.js"  ></script>

    <link href="{{ asset('public/'.env('THEME')) }}/css/site.css" rel="stylesheet">
    <link href="{{ asset('public/'.env('THEME')) }}/css/jumbotron.css" rel="stylesheet">
    <link href="{{ asset('public/'.env('THEME')) }}/css/animate.css" rel="stylesheet">


    <link rel='stylesheet' id='zoom-css'  href='{{ asset('public/'.env('THEME')) }}/css/zoom.css' type='text/css' media='all' />

    <!--script type="text/javascript" src=" {--!! asset('public/'.env('THEME')) !!--}/js/jquery-ui.widget.js" charset="utf-8" ></script>
    <script type="text/javascript" src=" {--!! asset('public/'.env('THEME')) !!--}/js/jquery-ui.mouse.js" charset="utf-8" ></script>
    <script type="text/javascript" src=" {--!! asset('public/'.env('THEME')) !!--}/js/jquery-ui.slider.js" charset="utf-8" ></script-->
    <link href="{{ asset('public/'.env('THEME')) }}/css/component.css" rel="stylesheet">
    <link href="{{ asset('public/'.env('THEME')) }}/css/flexslider.css" media="screen" rel="stylesheet">
    <link href="{{ asset('public/'.env('THEME')) }}/css/normalize.css" rel="stylesheet">
    <link href="{{ asset('public/'.env('THEME')) }}/css/pushy.css" rel="stylesheet">
    <link href="{{ asset('public/'.env('THEME')) }}/css/style.css" rel="stylesheet">
    <link href="{{ asset('public/'.env('THEME')) }}/css/uroda.css" rel="stylesheet">
    <link href="{{ asset('public/'.env('THEME')) }}/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('public/'.env('THEME')) }}/css/jquery-ui.theme.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('public/'.env('THEME')) }}/css/jquery-ui.structure.min.css" rel="stylesheet" type="text/css"/>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

</head>
<body>
@yield('headers')

<div class="container">
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-lg-3 container-fluid ">
            <div class="logo" >
                <h1  ><a href="{{ route('index')  }} "><span>Bosch</span> </a></h1>
            </div>
        </div>
    </div>
</div>
</body>
</html>