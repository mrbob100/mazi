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
     <script type="text/javascript" src="{!! asset('public/'.env('THEME')) !!}/js/bootstrap-filestyle.min.js" ></script>
    <!--script type="text/javascript" src="{--!! asset('public/'.env('THEME')) !!--}/js/ckeditor/ckeditor.js "  ></script-->
    <script src="{{asset('public/ckeditor/ckeditor/ckeditor.js')}}"> </script>

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

    <link href="{{ asset('public/'.env('THEME')) }}/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('public/'.env('THEME')) }}/css/jquery-ui.theme.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('public/'.env('THEME')) }}/css/jquery-ui.structure.min.css" rel="stylesheet" type="text/css"/>

	
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

</head>
<body>
<div class="container">
  <div class="row">

   <header id="header_wrapper">

       <div class="col-xs-3">
           <!-- Верхняя полоска меню поиска -->
           @include('pink.admin.headeradmin')<br/>
           <br/>

           <!-- Боковая панель -->
            @yield('header')



      </div>
       <div class="col-xs-9">
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
       </div>


   </header>
      <div class="col-xs-9">
          <br/><br/> <br/><br/>

          @yield('content')
          @if(Route::currentRouteName()=='excelIt')
              <ul class="catlog">
                  {{ Widget::run('MainWidget') }}
              </ul>
          @endif
      </div>

</div>
</div>
</body>
<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/jquery.scrollUp.min.js "  ></script>
<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/jquery.cookie.js"  ></script>
<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/jquery.accordion.js"  ></script>
<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/price-range.js" charset="utf-8" ></script>

<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/script.js" charset="utf-8" ></script>
<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/main.js"  ></script>
<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/pushy.js"  ></script>
<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/jquery-ui.js" charset="utf-8" ></script>
<!--script type="text/javascript" src=" {--!! asset('public/'.env('THEME')) !!--}/js/vue.min.js" charset="utf-8" ></script-->
<script type='text/javascript' src='{!! asset('public/'.env('THEME')) !!}/js/jquery.nicescroll.min.js'></script>
<script type='text/javascript' src='{!! asset('public/'.env('THEME')) !!}/js/jquery.slider.js'></script>
<script type='text/javascript' src='{!! asset('public/'.env('THEME')) !!}/js/jquery.mousewheel.js'></script>
<script type='text/javascript' src='{!! asset('public/'.env('THEME')) !!}/js/touch.js'></script>
<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/vue.min.js" charset="utf-8" ></script>
<script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/someExample.js" charset="utf-8" ></script>
</html>


