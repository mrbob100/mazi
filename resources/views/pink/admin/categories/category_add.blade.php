@extends(env('THEME').'.admin.layouts.patternAdmin')
<div class="container">

@section('header')
        @include(env('THEME').'.admin.common.header')
@endsection

    @section('lefsiteBar')
        @include(env('THEME').'.admin.common.leftsideBar')
    @endsection

@section('content')
    @include (env('THEME').'.admin.categories.content_categories_add')
@endsection
</div>