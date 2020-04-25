@extends(env('THEME').'.admin.layouts.patternAdmin')

@section('header')
    @include(env('THEME').'.admin.common.header')
@endsection
@section('lefsiteBar')
    @include(env('THEME').'.admin.common.leftsideBar')
@endsection

@section('content')
    {!! $content !!}
@endsection
