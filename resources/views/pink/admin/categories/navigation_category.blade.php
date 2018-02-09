@if($category)
    <div class="menu classic ">
        <ul id="nav" class="menu nav navbar-nav">
            @include(env('THEME').'.admin.categories.customCategoryItems',['items'=>$category->roots()])
        </ul>
    </div>
@endif