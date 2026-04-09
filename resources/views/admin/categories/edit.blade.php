@php
use App\Models\Setting;
$settings = Setting::first();
@endphp

@extends('admin.master')
@section('title','Edit Category | '. $settings->store_name)
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Category</h1>

        <form action="{{route('admin.categories.update',$category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            @include('admin.categories.form')

            <button class="btn btn-success px-5">Edit</button>
        </form>

    </div>


@stop
