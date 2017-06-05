
@extends('layouts.layout')

@section('content')

    <!-- Main jumbotron for a primary marketing message or call to action -->


    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <header>
                <h3 class="head text-center">Latest Products</h3>
            </header>

            @foreach($articles as $article)

                <div class="col-md-4 product simpleCart_shelfItem text-center">

                    <img src="{{ asset('public/images/'.$article->img) }}" width="350" alt="вывод изображения" />
                    <div class="mask">
                        <a href="{{route('product',['id'=>$article->id]) }}">Quick View</a>
                    </div>
                    <div class="product liked-product simpleCart_shelfItem">
                        <a class="like_name" href="{{route('product',['id'=>$article->id]) }}">{!! $article->label !!}</a>
                        <p><a class="item_add" href="{{route('product',['id'=>$article->id]) }}"><i></i> <span class=" item_price">${!!$article->price  !!}</span></a></p>
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

        </div>
        {!! $articles->render()  !!}
        <hr>


    </div> <!-- /container -->

@endsection