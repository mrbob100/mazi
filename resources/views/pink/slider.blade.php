
<header>
    <h1 class="like text-center">Лучшая коллекция</h1>
</header>

<div class="flexslider">


        <ul id="flexiselDemo3">

            @foreach( $sliders as $slide)
                <div class="sliderIn">
                    @if($slide->path)

                        <li><a href="{{route('product',['id'=>$slide->product_id]) }}"><img src="{!! asset($slide->path) !!}"   class="img-responsive" alt="вывод изображения" /></a>
                            <div class="product liked-product simpleCart_shelfItem">
                                <a class="like_name" href="{{route('product',['id'=>$slide->product_id]) }}" >{!!str_limit($slide->name,30)  !!}</a>
                                <p><a class="item_add" href="{{route('product',['id'=>$slide->product_id]) }}" ><i></i> <span class=" item_price">{!!$slide->products->price !!}&nbsp;гр.</span></a></p>


                            </div>
                        </li>
                    @endif
                </div>
            @endforeach
        </ul>

</div>
