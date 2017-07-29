@extends('layouts.admin')

@section('header')

    @include('admin.header')

@endsection

@section('content')
    @yield ('admin.categories.content_categories')
@endsection