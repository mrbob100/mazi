<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <header>
            <h3 class="head text-center">Latest Products</h3>
        </header>
 @if($products)
    @foreach($products as $prod)
            <div class="col-md-4 product simpleCart_shelfItem text-center">

                <img src="{{ asset('public/'.env('THEME'))}}/images/{{ $prod->img->path }} "  alt="вывод изображения" />
                <div class="mask">
                    <a href="{{route('product',['id'=>$prod->id]) }}">Quick View</a>
                </div>
                <div class="product liked-product simpleCart_shelfItem">
                    <a class="like_name" href="{{route('product',['id'=>$prod->id]) }}">{!! $prod->name !!}</a>
                    <p><a class="item_add" href="{{route('product',['id'=>$prod->id]) }}"><i></i> <span class=" item_price">{!!$prod->price  !!} гр.</span> </a></p>
                </div>


            <!--p><a class="btn btn-default" href="{{-- route('articleShow',['id'=>$article->id]) --}}" role="button">Подробнее &raquo;</a></p-->

            <!--form action="{{-- route('articleDelete',['article' => $article->id]) --}}" method="post"-->

                <!-- <input type="hidden" name="_method" value="DELETE">-->

            {{--method_field('DELETE')--}}

            {{-- csrf_field() --}}
            <!--button type="submit" class="btn btn-danger">
                        Delete
                    </button-->

                <!--/form-->
            </div>
     @endforeach
 @endif
    </div>

    <hr>
</div>