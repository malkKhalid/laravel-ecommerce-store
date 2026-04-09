@php
use App\Models\Setting;
$settings = Setting::first();
@endphp

@extends('admin.master')
@section('title','Dashboard | '. $settings->store_name)
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>

    </div>
    <!-- /.container-fluid -->

@stop
