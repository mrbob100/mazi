@extends('layouts.admin')

@section('header')

    @include('admin.header')

@endsection

@section('content')
    @include ('admin.products.content_products_edit')
@endsection