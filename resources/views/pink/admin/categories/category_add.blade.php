@extends(env('THEME').'.admin.layouts.admin')
<div class="container">
@section('header')

        @include(env('THEME').'.admin.header')

@endsection

@section('content')
    @include (env('THEME').'.admin.categories.content_categories_add')
@endsection
</div>