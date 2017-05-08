<div class="banner-top">
    <div class="container">
<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <div class="logo">
            <h1><a href="{{route('index') }}"><span>E</span> -Shop</a></h1>
        </div>
    </div>
    <!--/.navbar-header-->

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li><a href="{{route('index') }}">Home</a></li>
            <li class="dropdown">
                <a href="{{asset('#') }}" class="dropdown-toggle" data-toggle="dropdown">Men <b class="caret"></b></a>
                <ul class="dropdown-menu multi-column columns-3">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-lg-6 col-xs-offset-3 col-sm-offset-3  col-lg-offset-3 ">
                            <ul class="multi-column-dropdown">
                                {!!  $akkordeon !!}
                            </ul>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </ul>
            </li>

        </ul>
    </div>
    <!--/.navbar-collapse-->
</nav>
    </div>
</div>