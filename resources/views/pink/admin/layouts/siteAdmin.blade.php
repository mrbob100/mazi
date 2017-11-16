<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8"/>
    <title>Dashboard I Admin Panel</title>

    <link rel="stylesheet" href="{{ asset('public/'.env('THEME')) }}/css/layout.css" type="text/css" media="screen" />
    <!--[if lt IE 9]>
    <link rel="stylesheet" href="{{ asset('public/'.env('THEME')) }}/css/ie.css" type="text/css" media="screen" />
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link href="{{ asset('public/'.env('THEME')) }}/css/bootstrap.min.css" rel="stylesheet">
    <![endif]-->
    <script src=" {!! asset('public/'.env('THEME')) !!}/js/jquery.js" type="text/javascript"></script>
    <script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!} /js/bootstrap.min.js"  ></script>
    <script src=" {!! asset('public/'.env('THEME')) !!}/js/hideshow.js" type="text/javascript"></script>
    <script src=" {!! asset('public/'.env('THEME')) !!}/js/jquery.tablesorter.min.js" type="text/javascript"></script>
    <script type="text/javascript" src=" {!! asset('public/'.env('THEME')) !!}/js/jquery.equalHeight.js"></script>
    <script type="text/javascript">
        $(document).ready(function()
            {
                $(".tablesorter").tablesorter();
            }
        );
        $(document).ready(function() {

            //When page loads...
            $(".tab_content").hide(); //Hide all content
            $("ul.tabs li:first").addClass("active").show(); //Activate first tab
            $(".tab_content:first").show(); //Show first tab content

            //On Click Event
            $("ul.tabs li").click(function() {

                $("ul.tabs li").removeClass("active"); //Remove any "active" class
                $(this).addClass("active"); //Add "active" class to selected tab
                $(".tab_content").hide(); //Hide all tab content

                var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
                $(activeTab).fadeIn(); //Fade in the active ID content
                return false;
            });

        });
    </script>
    <script type="text/javascript">
        $(function(){
            $('.column').equalHeight();
        });
    </script>

</head>


<body>
<div class="container">
<header id="header">
    <hgroup>
        <h1 class="site_title"><a href="index.html">Website Admin</a></h1>
        <h2 class="section_title">Dashboard</h2><div class="btn_view_site"><a href="http://www.medialoot.com">View Site</a></div>
    </hgroup>
</header> <!-- end of header bar -->

<section id="secondary_bar">
    <div class="user">
        <p>John Doe (<a href="#">3 Messages</a>)</p>
        <!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
    </div>
    <div class="breadcrumbs_container">
        <article class="breadcrumbs"><a href="index.html">Website Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Dashboard</a></article>
    </div>
</section><!-- end of secondary bar -->
</div>


<div class="container">
    <div class="row">
       <div class="col-xs-3 col-sm-3 col-lg-3  ">
                <aside id="sidebar" class="column">
                    <form class="quick_search">
                        <input type="text" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
                    </form>
                    <hr/>
                    <h3>Content</h3>
                    <ul class="toggle">
                        <li class="icn_new_article"><a href="{{route('categories')}}">Категории</a></li>
                        <li class="icn_edit_article"><a href="{{route('products')}}">Продукты</a></li>
                        <li class="icn_categories"><a href="{{route('orders')}}">Заказы</a></li>
                        <li class="icn_tags"><a href="{{route('ordertItems')}}">Структура заказа</a></li>
                    </ul>
                    <h3>Users</h3>
                    <ul class="toggle">
                        <li class="icn_add_user"><a href="#">Add New User</a></li>
                        <li class="icn_view_users"><a href="#">View Users</a></li>
                        <li class="icn_profile"><a href="#">Your Profile</a></li>
                    </ul>
                    <h3>Media</h3>
                    <ul class="toggle">
                        <li class="icn_folder"><a href="#">File Manager</a></li>
                        <li class="icn_photo"><a href="#">Gallery</a></li>
                        <li class="icn_audio"><a href="#">Audio</a></li>
                        <li class="icn_video"><a href="#">Video</a></li>
                    </ul>
                    <h3>Admin</h3>
                    <ul class="toggle">
                        <li class="icn_settings"><a href="#">Options</a></li>
                        <li class="icn_security"><a href="#">Security</a></li>
                        <li class="icn_jump_back"><a href="#">Logout</a></li>
                    </ul>

                    <footer>
                        <hr />
                        <p><strong>Copyright &copy; 2011 Website Admin</strong></p>
                        <p>Theme by <a href="http://www.medialoot.com">MediaLoot</a></p>
                    </footer>
                </aside><!-- end of sidebar -->

       </div>

    <div class="col-xs-9 col-sm-9 col-lg-9 ">
                    <section id="main" class="column1">

                        <h4 class="alert_info">Welcome to the free MediaLoot admin panel template, this could be an informative message.</h4>

                        <article class="module width_full">
                            <header><h3>Stats</h3></header>
                            <div class="module_content">
                                <article class="stats_graph">
                                    <img src="http://chart.apis.google.com/chart?chxr=0,0,3000&chxt=y&chs=520x140&cht=lc&chco=76A4FB,80C65A&chd=s:Tdjpsvyvttmiihgmnrst,OTbdcfhhggcTUTTUadfk&chls=2|2&chma=40,20,20,30" width="520" height="140" alt="" />
                                </article>

                                <article class="stats_overview">
                                    <div class="overview_today">
                                        <p class="overview_day">Today</p>
                                        <p class="overview_count">1,876</p>
                                        <p class="overview_type">Hits</p>
                                        <p class="overview_count">2,103</p>
                                        <p class="overview_type">Views</p>
                                    </div>
                                    <div class="overview_previous">
                                        <p class="overview_day">Yesterday</p>
                                        <p class="overview_count">1,646</p>
                                        <p class="overview_type">Hits</p>
                                        <p class="overview_count">2,054</p>
                                        <p class="overview_type">Views</p>
                                    </div>
                                </article>
                                <div class="clear"></div>
                            </div>
                        </article><!-- end of stats article -->
                    </section>



      </div>
    </div>
</div>

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
<ul class="tabs " >
    @yield('content')
</ul>


    <div class="clear"></div>



    <div class="spacer"></div>




</body>

</html>