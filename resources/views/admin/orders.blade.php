@php
use App\Models\Setting;
$settings = Setting::first();
@endphp

@extends('admin.master')
@section('title','All Orders | '. $settings->store_name)
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>All Orders</h2>

        </div>


        <!-- Page Heading -->
        @if (session('msg'))
            <div class="alert alert-{{session('type')}} alert-dismissible fade show  d-flex justify-content-between align-items-center " role="alert">
                <h5>{{session('msg')}}</h5>
                <button type="button" data-bs-dismiss="alert" aria-label="Close"  class=" btn btn-close"></button>
            </div>
        @endif


        <table class="table">
            <tr >
                <th>ID</th>
                <th>User Name</th>
                <th>Total</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>


            @forelse ($orders as $order )
            @php
                $name = 'name_'.app()->currentLocale() ;
            @endphp
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->user->name}}</td>
                    <td>{{$order->total}}</td>
                    <td>{{$order->created_at->format('d/m/Y')}}</td>
                    <td>{{$order->updated_at->diffForhumans()}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center"><h5>No Data Found....</h5></td>
                </tr>
            @endforelse

        </table>

        {{$orders->appends($_GET)->links()}}

    </div>
    <!-- /.container-fluid -->

@stop
