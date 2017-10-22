@extends('layouts.admin')
<div class="container">
    @section('header')

        @include('admin.header')

    @endsection

    @section('content')
        @include ('admin.products.content_products_add')
    @endsection
</div>