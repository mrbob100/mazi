@if($menu)
    <div class="classic">
        <ul id="nav" class="menu nav ">
            @include(env('THEME').'.customMenuItems',['items'=>$menu->roots()])
        </ul>
    </div>
@endif
