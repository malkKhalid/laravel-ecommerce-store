@php
use App\Models\Setting;
$settings = Setting::first();
@endphp

@extends('admin.master')
@section('title','Edit Product | '.env('APP_NAME'))
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Product</h1>

        <form action="{{route('admin.products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            @include('admin.products.form')

            <button class="btn btn-success px-5">Edit</button>
        </form>

    </div>


@stop
