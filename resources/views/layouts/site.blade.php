<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/animate.css') }}" rel="stylesheet">
    <script type="text/javascript" src=" {!! asset('public/js/jquery.js')   !!}  "  ></script>
    <script type="text/javascript" src=" {!! asset('public/js/bootstrap.min.js') !!} "  ></script>

    <link href="{{ asset('public/css/jumbotron.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/site.css') }}" rel="stylesheet">

    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/flexslider.css') }}" rel="stylesheet">
    <title>Eshop a Flat E-Commerce Bootstrap Responsive Website Template | Home :: w3layouts</title>

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

</head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#"></a>
        </div>
        <ul id="navbar" class="menu">
                    <li><a href="https://laravel.com/docs">Documentation</a></li>
                    <li><a href="https://laracasts.com">Laracasts</a></li>
                    <li><a href="https://laravel-news.com">News</a></li>
                    <li><a href="https://forge.laravel.com">Forge</a></li>
                    <li><a href="https://github.com/laravel/laravel">GitHub</a></li>
        </ul><!--/.navbar-collapse -->
      </div>
    </nav>
    @if(count($errors)>0)
        <div class="alert alert-danger">

            <ul>

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>
     @endif

    @yield('content')


  </body>


<script type="text/javascript" src=" {!! asset('public/js/jquery.scrollUp.min.js') !!}  "  ></script>
<script type="text/javascript" src=" {!! asset('public/js/jquery.cookie.js') !!}  "  ></script>
<script type="text/javascript" src=" {!! asset('public/js/jquery.accordion.js') !!}  "  ></script>
<script type="text/javascript" src=" {!! asset('public/js/price-range.js') !!}  " charset="utf-8" ></script>
<script type="text/javascript" src=" {!! asset('public/js/main.js') !!} "  ></script>
<script type="text/javascript" src=" {!! asset('public/js/script.js') !!}  " charset="utf-8" ></script>

<script type="text/javascript" src=" {!! asset('public/js/simpleCart.min.js') !!} "  ></script>
<script type="text/javascript" src=" {!! asset('public/js/responsiveslides.min.js') !!} "  ></script>
<script type="text/javascript" src=" {!! asset('public/js/jquery.flexisel.js') !!} "  ></script>






</html>
