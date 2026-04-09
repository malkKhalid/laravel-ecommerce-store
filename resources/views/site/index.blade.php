@php
use App\Models\Setting;
$settings = Setting::first();
@endphp

@extends('site.master')

@section('content')
@section('title','Home | '. $settings->store_name)


@php
    $name = 'name_'.app()->currentLocale() ;
    $content = 'content_'.app()->currentLocale() ;
@endphp
   <!--===============================
=            Hero Area            =
================================-->

<section class="hero-area text-center overly" style="
    background: url({{asset('siteassets/images/home/'.$settings->background_image)}});
    background-size: cover;
    background-repeat: no-repeat;">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Header Contetnt -->
                <div class="content-block">
                    <h1>Buy & Sell Near You </h1>
                    <p>Join the millions who buy and sell from each other <br> everyday in local communities around
                        the world</p>
                    <div class="short-popular-category-list text-center">
                        <h2>Popular Category</h2>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href=""><i class="fa fa-bed"></i>  {{__('site.hotel')}} </a>
                            </li>
                            <li class="list-inline-item">
                                <a href=""><i class="fa fa-grav"></i> {{__('site.fitness')}}</a>
                            </li>
                            <li class="list-inline-item">
                                <a href=""><i class="fa fa-car"></i> {{__('site.cars')}}</a>
                            </li>
                            <li class="list-inline-item">
                                <a href=""><i class="fa fa-cutlery"></i> {{__('site.restaurants')}}</a>
                            </li>
                            <li class="list-inline-item">
                                <a href=""><i class="fa fa-coffee"></i> {{__('site.cafe')}}</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <!-- Advance Search -->
                <div class="advance-search">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12 align-content-center">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-xl-4 col-lg-3 col-md-6">
                                            <input type="text" class="form-control my-2 my-lg-1"
                                                id="inputtext4" placeholder="What are you looking for">
                                        </div>
                                        <div class="form-group col-lg-3 col-md-6">
                                            <select class="w-100 form-control mt-lg-1 mt-md-2">
                                                <option>Category</option>
                                                <option value="1">Top rated</option>
                                                <option value="2">Lowest Price</option>
                                                <option value="4">Highest Price</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-3 col-md-6">
                                            <input type="text" class="form-control my-2 my-lg-1"
                                                id="inputLocation4" placeholder="Location">
                                        </div>
                                        <div class="form-group col-xl-2 col-lg-3 col-md-6 align-self-center">
                                            <button type="submit" class="btn btn-primary active w-100">Search
                                                Now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container End -->
</section>


<!--===========================================
=            Popular deals section            =
============================================-->

<section class="popular-deals section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Trending Adds</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, magnam.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- offer 01 -->
            <div class="col-lg-12">
                <div class="trending-ads-slide">


                    @foreach ($products as $product)
                            <div class="col-sm-12 col-lg-4">
                                <!-- product card -->
                                <div class="product-item bg-light">
                                    <div class="card">
                                        <div class="thumb-content">
                                            <!-- <div class="price">$200</div> -->
                                            <a href="{{route('site.product',$product->id )}}">
                                                <img style="width: 100% ; height: 300px ; object-fit:cover " class="card-img-top img-fluid" src="{{asset('uploads/products/'. $product->image )}}"
                                                    alt="Card image cap">
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title"><a href="{{route('site.product',$product->id )}}">{{$product->$name}}</a></h4>
                                            <ul class="list-inline product-meta">
                                                <li class="list-inline-item">
                                                    <a href="{{route('site.category',$product->category->id )}}"><i
                                                            class="fa fa-folder-open-o"></i>{{$product->category->$name}}</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a ><i class="fa fa-calendar"></i>{{$product->created_at->format('D F')}}</a>
                                                </li>
                                            </ul>
                                            <p class="card-text">{{Str::words($product->$content, 10 ,'.....')}}</p>
                                            <div class="product-ratings">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</section>



<!--==========================================
=            All Category Section            =
===========================================-->




<!--====================================
=            Call to Action            =
=====================================-->

<section class="call-to-action overly bg-3 section-sm">
    <!-- Container Start -->
    <div class="container">
        <div class="row justify-content-md-center text-center">
            <div class="col-md-8">
                <div class="content-holder">
                    <h2>Start today to get more exposure and
                        grow your business</h2>
                    <ul class="list-inline mt-30">
                        <li class="list-inline-item"><a class="btn btn-main" href="ad-listing.html">Add
                                Listing</a></li>
                        <li class="list-inline-item"><a class="btn btn-secondary" href="category.html">Browser
                                Listing</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Container End -->
</section>


@endsection
