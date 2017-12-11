@extends(env('THEME').'.layouts.siteCabinet')

@section('headers')
    {!! $headers !!}
@endsection

@section('leftBar')
    {!! $leftBar !!}
@endsection

@section('content')
    {!! $content !!}
@endsection

@section('footer')
    {!! $footer !!}
@endsection