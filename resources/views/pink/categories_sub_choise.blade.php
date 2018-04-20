@if($categories)


    <div class="wrapCat">
        @foreach($categories as $prod)


            <div class="categoriesin">

                    <a class="like_name" href="{{route('categoryleft',['id'=>$prod->id])}}" data-href="{{URL::to('categoryleft')}}" data-id="{{$prod->id}}"  data-sign="22"> <img src="{{ asset('public/'.env('THEME'))}}/images/{{ $prod->img}}"  alt="вывод изображения" /></a>

                <div class="liked-product simpleCart_shelfItem">

                    <a class="like_name" href="{{route('categoryleft',['id'=>$prod->id])}}" style=" color:#5A7793;font-size: 0.8em;font-weight: bold;"  data-href="{{URL::to('categoryleft')}}" data-id="{{$prod->id}}"  data-sign="22">{{str_limit($prod->name,32)}}  </a>

                    {{ csrf_field() }}


                </div>


            </div>


        @endforeach
    </div>
@endif



