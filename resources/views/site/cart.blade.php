@php
use App\Models\Category;
use App\Models\Setting;
$settings = Setting::first();
@endphp
@extends('site.master')

@section('title','Cart Page | '. $settings->store_name)
@section('content')

@php
    $name = 'name_'.app()->currentLocale() ;
@endphp

    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">Cart</h1>
                        <ol class="breadcrumb">
                            <li><a href="{{route('site.index')}}">Home</a></li>
                            <li class="active">cart</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <div class="page-wrapper">
    <div class="cart shopping">
        <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            <div class="block">
                <div class="product-list">
                <form method="post">
                    <table class="table">
                    <thead>
                        <tr>
                        <th class="">Item Name</th>
                        <th class="">Price</th>
                        <th class="">Quantity</th>
                        <th class="">Total Price</th>
                        <th class="">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                    @php
                    $total = 0 ;
                    @endphp
                    @auth
                        @foreach (Auth::user()->carts as $proCart )
                            <tr class="">
                                <td class="">
                                    <div class="product-info">
                                    <img width="100" src="{{asset('uploads/products/'.$proCart->product->image)}}" alt="" />
                                    <a href="{{route('site.product',$proCart->product_id)}}">{{$proCart->product->$name}}</a>
                                    </div>
                                </td>
                                <td class="">${{number_format($proCart->price,2)}}</td>
                                <td class="">{{$proCart->quantity}}</td>
                                <td class="">${{number_format($proCart->price * $proCart->quantity,2)}}</td>
                                <td class="">
                                    {{-- <form class="d-inline" action="{{route('site.cart.destroy' , $proCart->id)}}" method="POST">
                                        @csrf
                                        @method('delete')

                                        <button class="product-remove" onclick="return confirm('Are you sure?')">Remove</button>
                                    </form> --}}

                                    <a type="button" class="product-remove" href="{{route('site.remove_cart',$proCart->id)}}">Remove</a>

                                </td>
                            </tr>
                            @php
                                $total += $proCart->price * $proCart->quantity ;
                            @endphp
                        @endforeach
                    @endauth

                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3">Total</th>
                            <th colspan="2">{{ number_format($total, 2) }}</th>
                        </tr>
                    </tfoot>
                    </table>
                    <a href="{{route('site.checkout')}}" class="btn btn-main pull-right ">Checkout</a>
                </form>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>

@stop
