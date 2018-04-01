@if($categories)


    <div class="wrapCat">
        @foreach($categories as $prod)


            <div class="categoriesin">

                    <a class="like_name" href="#" data-href="{{URL::to('categorysub')}}" data-id="{{$prod->id}}"> <img src="{{ asset('public/'.env('THEME'))}}/images/{{ $prod->img}}"  alt="вывод изображения" /></a>

                <div class="liked-product simpleCart_shelfItem">

                    <a class="like_name" href="#" style=" color: #816263;font-size: 0.7em;"  data-href="{{URL::to('categorysub')}}" data-id="{{$prod->id}}" >{{str_limit($prod->name,32)}}  </a>

                    {{ csrf_field() }}


                </div>


            </div>


        @endforeach
    </div>
@endif



