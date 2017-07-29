@extends('layouts.admin')
<div class="container">
@section('header')

    @include('admin.header')

@endsection

@section('content')
    @include ('admin.categories.content_categories_add')
@endsection
</div>