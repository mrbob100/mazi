@extends(env('THEME').'.admin.layouts.admin')
@section('header')

    @include(env('THEME').'.admin.header')

@endsection
@section('content')
    @yield(env('THEME').'.admin.categories.content_categories')
@endsection





