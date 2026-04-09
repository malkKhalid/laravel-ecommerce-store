@php
use App\Models\Setting;
$settings = Setting::first();
@endphp

@extends('admin.master')
@section('title','Add New Category | '. $settings->store_name)
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Add New Category</h1>

        <form action="{{route('admin.categories.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            @include('admin.categories.form')

            <button class="btn btn-success px-5">Add New</button>
        </form>

    </div>


@stop
