@extends(env('THEME').'.admin.layouts.admin')
<div class="container">
    @section('header')

        @include(env('THEME').'.admin.header')

    @endsection

    @section('content')
        @include (env('THEME').'.admin.products.content_products_add')
    @endsection
</div>