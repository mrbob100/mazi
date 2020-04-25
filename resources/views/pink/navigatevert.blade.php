@if($menu)
<div class="menu classic ">
    <ul id="nav" class="panel-body">
        @include(env('THEME').'.customMenuItems',['items'=>$menu->roots()])
    </ul>
</div>
@endif