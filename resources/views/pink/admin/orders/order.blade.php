@extends(env('THEME').'.admin.layouts.admin')

@section('header')

    @include(env('THEME').'.admin.header')

@endsection

@section('content')
    @include (env('THEME').'.admin.orders.content_orders')
@endsection