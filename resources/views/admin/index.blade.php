@extends('layouts.admin')

@section('header')

    @include('admin.header')

@endsection

@section('content')
    @yield ('admin.content_categories')
@endsection