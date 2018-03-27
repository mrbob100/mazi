@foreach($items as $item)
    <li {{(URL::current()==$item->title) ? "class=active" : ""}}>
        <a href="">{{$item->title}}</a>
        {!! Form::checkbox($item->title,1,false) !!}
        @if($item->hasChildren())
            <ul class="sub-menu nav">
                @include(env('THEME').'.admin.categories.customCategoryItems',['items'=>$item->children()])
            </ul>
        @endif
    </li>
@endforeach