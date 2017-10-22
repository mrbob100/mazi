@extends(env('THEME').'.layouts.site')

@section('headers')
    {!! $headers !!}
@endsection

@section('navigation')
    {!! $navigation !!}
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