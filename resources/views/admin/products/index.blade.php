@php
use App\Models\Setting;
$settings = Setting::first();
@endphp

@extends('admin.master')
@section('title','All Products | '.env('APP_NAME'))
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">



        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">All Products</h1>

        @if (session('msg'))
            <div class="alert alert-{{session('type')}} alert-dismissible fade show  d-flex justify-content-between align-items-center " role="alert">
                <h5>{{session('msg')}}</h5>
                <button type="button" data-bs-dismiss="alert" aria-label="Close"  class=" btn btn-close"></button>
            </div>
        @endif

        <table class="table table-hover table-striped table-bordered">
            <tr class="table-dark">
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Sale Price</th>
                <th>Quantity</th>
                <th>Category</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>

            {{-- {'name_'.app()->currentLocale()} => name_en , name_ar --}}

            @forelse ($products as $product )
            @php
                $name = 'name_'.app()->currentLocale() ;
            @endphp
                <tr>
                    <td>{{$product->id}}</td>
                    {{-- <td>{{$product->{'name_'.app()->currentLocale()}}}</td> --}}
                    <td>{{$product->$name}}</td>
                    <td><img width="130px" src="{{asset('uploads/products/'.$product->image)}}" alt=""></td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->sale_price}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->category->name_en}}</td>
                    <td>{{$product->created_at->format('d/m/Y')}}</td>
                    <td>{{$product->updated_at->diffForhumans()}}</td>
                    <td>
                        <a target="blank" href="{{route('site.product',$product->id)}}" class="btn btn-success btn-sm"> <i class="fas fa-eye"></i></a>
                        <a href="{{route('admin.products.edit',$product->id)}}" class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{route('admin.products.destroy' , $product->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" style="text-align:center"><h5>No Data Found....</h5></td>
                </tr>
            @endforelse

        </table>

        {{$products->links()}}

    </div>
    <!-- /.container-fluid -->

@stop
