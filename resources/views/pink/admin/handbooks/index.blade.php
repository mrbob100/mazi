@extends(env('THEME').'.admin.layouts.admin')
@section('headeradmin')
    @include(env('THEME').'.admin.headeradmin')
@endsection
@section('header')
    @include(env('THEME').'.admin.header')
@endsection
@section('content')
    {!! $content !!}
@endsection