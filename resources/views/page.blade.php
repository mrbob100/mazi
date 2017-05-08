
@extends('layouts.layout')

@section('content')

    <!-- Main jumbotron for a primary marketing message or call to action -->


    <div class="container">
        <!-- Example row of columns -->
        <div class="row">


            @foreach($articles as $article)

                <div class="col-md-4">
                    <h2>{{ $article->category_id }}</h2>
                    <p>{!! $article->name !!}</p>
                    <p><a class="btn btn-default" href="{{ route('articleShow',['id'=>$article->id]) }}" role="button">Подробнее &raquo;</a></p>

                <form action="{{ route('articleDelete',['article' => $article->id]) }}" method="post">

                    <!-- <input type="hidden" name="_method" value="DELETE">-->

                    {{method_field('DELETE')}}

                    {{ csrf_field() }}

                    <button type="submit" class="btn btn-danger">
                        Delete
                    </button>

                </form>
                </div>
            @endforeach

        </div>
        {!! $articles->render()  !!}
        <hr>

        <footer>
            <p>&copy; 2016 Company, Inc.</p>
        </footer>
    </div> <!-- /container -->

@endsection