@php
use App\Models\Setting;
$settings = Setting::first();
@endphp

@extends('admin.master')
@section('title','All Categories | '. $settings->store_name)
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">



        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">All Categories</h1>
        @if (session('msg'))
            <div class="alert alert-{{session('type')}}"><h5>{{session('msg')}}</h5></div>
        @endif

        <table class="table table-hover table-striped table-bordered">
            <tr class="table-dark">
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>

            {{-- {'name_'.app()->currentLocale()} => name_en , name_ar --}}

            @forelse ($categories as $category )
            @php
                $name = 'name_'.app()->currentLocale() ;
            @endphp
                <tr>
                    <td>{{$category->id}}</td>
                    {{-- <td>{{$category->{'name_'.app()->currentLocale()}}}</td> --}}
                    <td>{{$category->$name}}</td>
                    <td><img width="130px" src="{{asset('uploads/categories/'.$category->image)}}" alt=""></td>
                    <td>{{$category->created_at->format('d/m/Y')}}</td>
                    <td>{{$category->updated_at->diffForhumans()}}</td>
                    <td>
                        <a target="blank" href="{{route('site.category',$category->id)}}" class="btn btn-success btn-sm"> <i class="fas fa-eye"></i></a>
                        <a href="{{route('admin.categories.edit',$category->id)}}" class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{route('admin.categories.destroy' , $category->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center"><h5>No Data Found....</h5></td>
                </tr>
            @endforelse

        </table>

        {{$categories->links()}}

    </div>
    <!-- /.container-fluid -->

@stop
