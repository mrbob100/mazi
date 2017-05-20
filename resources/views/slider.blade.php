<div class="other-products">
    <div class="container">
        <h3 class="like text-center">Featured Collection</h3>
        <ul id="flexiselDemo3">
            @foreach($sells as $article)
                @if($article->sale)
                    <li><a href="{{route('product',['id'=>$article->id]) }}"><img src="{{ asset('public/images/'.$article->img) }}"  class="img-responsive" alt="вывод изображения" /></a>
                        <div class="product liked-product simpleCart_shelfItem">
                            <a class="like_name" href="{{route('product',['id'=>$article->id]) }}">{!! $article->label !!}</a>
                            <p><a class="item_add" href="{{route('product',['id'=>$article->id]) }}"><i></i> <span class=" item_price">${!!$article->price  !!}</span></a></p>
                        </div>
                    </li>
               @endif
            @endforeach
        </ul>
        <script type="text/javascript">
            $(window).load(function() {
                $("#flexiselDemo3").flexisel({
                    visibleItems: 4,
                    animationSpeed: 1000,
                    autoPlay: true,
                    autoPlaySpeed: 3000,
                    pauseOnHover: true,
                    enableResponsiveBreakpoints: true,
                    responsiveBreakpoints: {
                        portrait: {
                            changePoint:480,
                            visibleItems: 1
                        },
                        landscape: {
                            changePoint:640,
                            visibleItems: 2
                        },
                        tablet: {
                            changePoint:768,
                            visibleItems: 3
                        }
                    }
                });

            });
        </script>

    </div>
</div>