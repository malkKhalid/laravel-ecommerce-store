@extends('site.master')

@section('content')
    @php
        $name = 'name_' . app()->currentLocale();
        $content = 'content_' . app()->currentLocale();
    @endphp

    <section class="page-search">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Advance Search -->
                    <div class="advance-search nice-select-white">
                        <form>
                            <div class="form-row align-items-center">
                                <div class="form-group col-xl-4 col-lg-3 col-md-6">
                                    <input type="text" class="form-control my-2 my-lg-0" id="inputtext4"
                                        placeholder="What are you looking for">
                                </div>
                                <div class="form-group col-lg-3 col-md-6">
                                    <select class="w-100 form-control my-2 my-lg-0">
                                        <option>Category</option>
                                        <option value="1">Top rated</option>
                                        <option value="2">Lowest Price</option>
                                        <option value="4">Highest Price</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-3 col-md-6">
                                    <input type="text" class="form-control my-2 my-lg-0" id="inputLocation4"
                                        placeholder="Location">
                                </div>
                                <div class="form-group col-xl-2 col-lg-3 col-md-6">

                                    <button type="submit" class="btn btn-primary active w-100">Search Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="category-sidebar">
                        <div class="widget category-list">
                            <h4 class="widget-header">All Category</h4>
                            <ul class="category-list">
                                @foreach ($categories as $item)
                                    <li class="active">
                                        <a
                                            href="{{ route('site.category', $item->id) }}">{{ $item->$name }}
                                            <span>{{ $item->products->count() }}</span>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                        <div class="widget category-list">
                            <h4 class="widget-header">Nearby</h4>
                            <ul class="category-list">
                                <li><a href="category.html">New York <span>93</span></a></li>
                                <li><a href="category.html">New Jersy <span>233</span></a></li>
                                <li><a href="category.html">Florida <span>183</span></a></li>
                                <li><a href="category.html">California <span>120</span></a></li>
                                <li><a href="category.html">Texas <span>40</span></a></li>
                                <li><a href="category.html">Alaska <span>81</span></a></li>
                            </ul>
                        </div>

                        <div class="widget filter">
                            <h4 class="widget-header">Show Produts</h4>
                            <select>
                                <option>Popularity</option>
                                <option value="1">Top rated</option>
                                <option value="2">Lowest Price</option>
                                <option value="4">Highest Price</option>
                            </select>
                        </div>

                        <div class="widget price-range w-100">
                            <h4 class="widget-header">Price Range</h4>
                            <div class="block">
                                <input class="range-track w-100" type="text" data-slider-min="0" data-slider-max="5000"
                                    data-slider-step="5" data-slider-value="[0,5000]">
                                <div class="d-flex justify-content-between mt-2">
                                    <span class="value">$10 - $5000</span>
                                </div>
                            </div>
                        </div>

                        <div class="widget product-shorting">
                            <h4 class="widget-header">By Condition</h4>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="">
                                    Brand New
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="">
                                    Almost New
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="">
                                    Gently New
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="">
                                    Havely New
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="category-search-filter">
                        <div class="row">
                            <div class="col-md-6 text-center text-md-left">
                                <strong>Short</strong>
                                <select>
                                    <option>Most Recent</option>
                                    <option value="1">Most Popular</option>
                                    <option value="2">Lowest Price</option>
                                    <option value="4">Highest Price</option>
                                </select>
                            </div>
                            <div class="col-md-6 text-center text-md-right mt-2 mt-md-0">
                                {{-- <div class="view">
								<strong>Views</strong>
								<ul class="list-inline view-switcher">
									<li class="list-inline-item">
										<a href="category.html"><i class="fa fa-th-large"></i></a>
									</li>
									<li class="list-inline-item">
										<a href="category.html" class="text-info"><i class="fa fa-reorder"></i></a>
									</li>
								</ul>
							</div> --}}
                            </div>
                        </div>
                    </div>

                    @forelse ($category->products as $product)
                        <!-- ad listing list  -->
                        <div class="ad-listing-list mt-20">
                            <div class="row p-lg-3 p-sm-5 p-4">
                                <div class="col-lg-4 align-self-center">
                                    <a href="{{route('site.product',$product->id )}}">
                                        <img src="{{asset('uploads/products/' .$product->image )}}" class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-10">
                                            <div class="ad-listing-content">
                                                <div>
                                                    <a href="{{route('site.product',$product->id )}}" class="font-weight-bold">{{$product->$name}} </a>
                                                </div>
                                                <ul class="list-inline mt-2 mb-3">
                                                    <li class="list-inline-item"><a href="{{route('site.category',$product->category->id )}}"><i
                                                        class="fa fa-folder-open-o"></i>{{$product->category->$name}}</a></li>
                                                    <li class="list-inline-item"><a><i
                                                                class="fa fa-calendar"></i>{{$product->created_at->format('jS F')}}</a></li>
                                                </ul>
                                                <p class="pr-5">{{Str::words($product->$content, 10 ,'.....')}}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 align-self-center">
                                            <div class="product-ratings float-lg-right pb-3">
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
                        </div>
                    @empty
                        <div > <h3>There Is No Products For This Category Yet ......</h3> </div>
                    @endforelse



                    <!-- ad listing list  -->

                    <!-- pagination -->
                    <div class="pagination justify-content-center py-4">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="ad-list-view.html" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="ad-list-view.html">1</a></li>
                                <li class="page-item active"><a class="page-link" href="ad-list-view.html">2</a></li>
                                <li class="page-item"><a class="page-link" href="ad-list-view.html">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="ad-list-view.html" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- pagination -->
                </div>
            </div>
        </div>
    </section>
@endsection
