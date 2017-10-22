@extends('layouts.admin')

    @section('header')

        @include('admin.header')

    @endsection

    @section('content')
        @include ('admin.categories.content_categories_edit')
    @endsection
