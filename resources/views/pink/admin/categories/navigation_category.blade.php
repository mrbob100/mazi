@if($menu)
    <div class="menu classic nav">
        <ul id="nav" class="menu nav">
            @include(env('THEME').'.admin.categories.customCategoryItems',['items'=>$menu->roots()])
        </ul>
    </div>
@endif