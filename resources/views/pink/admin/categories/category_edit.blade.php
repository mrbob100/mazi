@extends(env('THEME').'.admin.layouts.patternAdmin')

@section('header')

    @include(env('THEME').'.admin.common.header')

@endsection

    @section('content')
        @include (env('THEME').'.admin.categories.content_categories_edit')
    @endsection



