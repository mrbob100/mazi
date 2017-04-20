<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Jumbotron Template for Bootstrap</title>

    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/jumbotron.css') }}" rel="stylesheet">


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
  <script type="text/javascript" src =" {{asset('public/js/jquery-3.1.1.min.js') }}" ></script>
  <script type="text/javascript" src=" {{asset('public/js/bootstrap.js') }}"  ></script>
  <script type="text/javascript" src=" {{asset('public/js/script.js') }}"  ></script>
  <script type="text/javascript" src=" {{asset('public/js/jquery.accordion.js') }} "  ></script>


  <script type="text/javascript" src=" {{asset('public/js/main.js') }}"  charset="utf-8"></script>


</html>
