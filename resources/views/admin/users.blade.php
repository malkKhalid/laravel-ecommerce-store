@php
use App\Models\Setting;
$settings = Setting::first();
@endphp

@extends('admin.master')
@section('title','All Users | '. $settings->store_name)
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>All Users</h2>

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
                <th>user ID</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>User Type</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>


            @forelse ($users as $user )
            @php
                $name = 'name_'.app()->currentLocale() ;
            @endphp
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->type}}</td>
                    <td>{{$user->created_at->format('d/m/Y')}}</td>
                    <td>{{$user->updated_at->diffForhumans()}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center"><h5>No Data Found....</h5></td>
                </tr>
            @endforelse

        </table>



    </div>
    <!-- /.container-fluid -->

@stop
