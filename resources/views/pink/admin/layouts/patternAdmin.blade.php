<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{isset($meta_desc) ? $meta_desc : '' }}" />
    <meta name="keywords" content="{{isset($keywords) ? $keywords : ''}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$title or 'Bosch'}}</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/'.env('THEME')) }}/admin/plugins/images/favicon.png">


    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('public/'.env('THEME')) }}/admin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!} /js/jquery.js "  ></script>
    <script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!} /js/bootstrap.min.js"  ></script>
    <script type="text/javascript" src="{!! asset('public/'.env('THEME')) !!}/js/bootstrap-filestyle.min.js" ></script>
    <script type="text/javascript" src="{{asset('public/ckeditor/ckeditor/ckeditor.js')}}"> </script>
    <!-- animation CSS -->
    <link href="{{ asset('public/'.env('THEME')) }}/admin/css/animate.css" rel="stylesheet">


    <!-- Menu CSS -->
    <link href="{{ asset('public/'.env('THEME')) }}/admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="{{ asset('public/'.env('THEME')) }}/admin/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="{{ asset('public/'.env('THEME')) }}/admin/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="{{ asset('public/'.env('THEME')) }}/admin/plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="{{ asset('public/'.env('THEME')) }}/admin/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- Calendar CSS -->
    <link href="{{ asset('public/'.env('THEME')) }}/admin/plugins/bower_components/calendar/dist/fullcalendar.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="{{ asset('public/'.env('THEME')) }}/admin/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{ asset('public/'.env('THEME')) }}/admin/css/colors/blue-dark.css" id="theme" rel="stylesheet">

    <link href="{{ asset('public/'.env('THEME')) }}/css/site.css" rel="stylesheet">
    <link href="{{ asset('public/'.env('THEME')) }}/css/jumbotron.css" rel="stylesheet">
    <link rel='stylesheet' id='zoom-css'  href='{{ asset('public/'.env('THEME')) }}/css/zoom.css' type='text/css' media='all' />

    <link href="{{ asset('public/'.env('THEME')) }}/css/component.css" rel="stylesheet">
    <link href="{{ asset('public/'.env('THEME')) }}/css/flexslider.css" media="screen" rel="stylesheet">

    <link href="{{ asset('public/'.env('THEME')) }}/css/pushy.css" rel="stylesheet">
    <link href="{{ asset('public/'.env('THEME')) }}/css/style.css" rel="stylesheet">

    <link href="{{ asset('public/'.env('THEME')) }}/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('public/'.env('THEME')) }}/css/jquery-ui.theme.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('public/'.env('THEME')) }}/css/jquery-ui.structure.min.css" rel="stylesheet" type="text/css"/>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="fix-header">
<!-- ============================================================== -->
<!-- Preloader -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- Wrapper -->
<!-- ============================================================== -->
<div id="wrapper">

       @yield('header')
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->

    <!-- End Top Navigation -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
       @yield('lefsiteBar')
    <!-- ============================================================== -->
    <!-- End Left Sidebar -->
    <!-- ============================================================== -->
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
                   <div class="alert alert-success" style="padding-left: 250px; font-weight: 600;">
                       {{session('status')}}
                   </div>
               @endif
           </div>
    <!-- ============================================================== -->
    <!-- Page Content -->
    <!-- ============================================================== -->
       @if(Route::currentRouteName()=='')
           @yield('main')



       @endif
<div id="belle" style="background-color: white; margin-left:100px; padding-top: 25px;">
       @yield('content')
</div>
    <!-- ============================================================== -->
    <!-- End Page Content -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->

</body>

<!-- Menu Plugin JavaScript -->
<script src="{{ asset('public/'.env('THEME')) }}/admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<!--slimscroll JavaScript -->
<script src="{{ asset('public/'.env('THEME')) }}/admin/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="{{ asset('public/'.env('THEME')) }}/admin/js/waves.js"></script>
<!--Counter js -->
<script src="{{ asset('public/'.env('THEME')) }}/admin/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
<script src="{{ asset('public/'.env('THEME')) }}/admin/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
<!--Morris JavaScript -->
<script src="{{ asset('public/'.env('THEME')) }}/admin/plugins/bower_components/raphael/raphael-min.js"></script>
<script src="{{ asset('public/'.env('THEME')) }}/admin/plugins/bower_components/morrisjs/morris.js"></script>
<!-- chartist chart -->
<script src="{{ asset('public/'.env('THEME')) }}/admin/plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
<script src="{{ asset('public/'.env('THEME')) }}/admin/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
<!-- Calendar JavaScript -->
<script src="{{ asset('public/'.env('THEME')) }}/admin/plugins/bower_components/moment/moment.js"></script>
<script src='{{ asset('public/'.env('THEME')) }}/admin/plugins/bower_components/calendar/dist/fullcalendar.min.js'></script>
<script src="{{ asset('public/'.env('THEME')) }}/admin/plugins/bower_components/calendar/dist/cal-init.js"></script>
<!-- Custom Theme JavaScript -->
<script src="{{ asset('public/'.env('THEME')) }}/admin/js/custom.min.js"></script>
<script src="{{ asset('public/'.env('THEME')) }}/admin/js/dashboard1.js"></script>
<!-- Custom tab JavaScript -->
<script src="{{ asset('public/'.env('THEME')) }}/admin/js/cbpFWTabs.js"></script>


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




<script type="text/javascript">
    (function() {
        [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
            new CBPFWTabs(el);
        });
    })();
</script>
<script src="{{ asset('public/'.env('THEME')) }}/admin/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
<!--Style Switcher -->
<script src="{{ asset('public/'.env('THEME')) }}/admin/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>

</html>
