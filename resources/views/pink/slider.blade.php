<div class="other-products">
    <div class="container">
        <h3 class="like text-center">Featured Collection</h3>
        <ul id="flexiselDemo3">
            @foreach( $sliders as $slide)
                @if($slide->path)
                    <li><a href="{{route('product',['id'=>$slide->product_id]) }}"><img src="{!! asset($slide->path) !!}"  style="height: 250px;" class="img-responsive" alt="вывод изображения" /></a>
                        <div class="product liked-product simpleCart_shelfItem">
                            <a class="like_name" href="{{route('product',['id'=>$slide->product_id]) }}" style=" color: #816263;font-size: 0.7em;">{!!str_limit($slide->title,30)  !!}</a>
                            <p><a class="item_add" href="{{route('product',['id'=>$slide->product_id]) }}" style=" color: #816263;font-size: 1.0em;" ><i></i> <span class=" item_price">${!!$slide->products->price   !!}</span></a></p>


                        </div>
                    </li>
               @endif
            @endforeach
        </ul>

    </div>
</div>