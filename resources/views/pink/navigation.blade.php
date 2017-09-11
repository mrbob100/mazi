@if($menu)
    <div class="menu classic ">
        <ul id="nav" class="menu nav navbar-nav  horizontal">
            @include(env('THEME').'.customMenuItems',['items'=>$menu->roots()])
        </ul>
    </div>
@endif
