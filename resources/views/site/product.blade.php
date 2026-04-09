
@extends('site.master')

@section('content')

@php
    $name = 'name_'.app()->currentLocale() ;
    $content = 'content_'.app()->currentLocale() ;
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
								<input type="text" class="form-control my-2 my-lg-0" id="inputtext4" placeholder="What are you looking for">
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
								<input type="text" class="form-control my-2 my-lg-0" id="inputLocation4" placeholder="Location">
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
<!--===================================
=            Store Section            =
====================================-->
<section class="section bg-gray">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<!-- Left sidebar -->
			<div class="col-lg-8">
				<div class="product-details">
					<h1 class="product-title">{{$product->$name}}</h1>
					<div class="product-meta">
						<ul class="list-inline">
                            {{-- {{$product->user->name}} --}}
							<li class="list-inline-item"><i class="fa fa-user-o"></i> By <a href="user-profile.html">Jadallah</a></li>
							<li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Category<a href="category.html">{{$product->category->$name}}</a></li>

						</ul>
					</div>

                    <div>
                        <img  class="card-img-top img-fluid mt-5"  src="{{asset('uploads/products/'. $product->image )}}" alt="Card image cap">
                    </div>

					{{-- <!-- product slider -->
					<div class="product-slider">
						<div class="product-slider-item my-4" data-image="{{asset('siteassets/images/products/products-2.jpg')}}">
							<img class="img-fluid w-100" src="{{asset('siteassets/images/products/products-2.jpg')}}" alt="product-img">
						</div>
						<div class="product-slider-item my-4" data-image="{{asset('siteassets/images/products/products-2.jpg')}}">
							<img class="d-block img-fluid w-100" src="{{asset('siteassets/images/products/products-2.jpg')}}" alt="Second slide">
						</div>
						<div class="product-slider-item my-4" data-image="{{asset('siteassets/images/products/products-3.jpg')}}">
							<img class="d-block img-fluid w-100" src="{{asset('siteassets/images/products/products-3.jpg')}}" alt="Third slide">
						</div>
						<div class="product-slider-item my-4" data-image="{{asset('siteassets/images/products/products-4.jpg')}}">
							<img class="d-block img-fluid w-100" src="{{asset('siteassets/images/products/products-4.jpg')}}" alt="Third slide">
						</div>
						<div class="product-slider-item my-4" data-image="{{asset('siteassets/images/products/products-2.jpg')}}">
							<img class="d-block img-fluid w-100" src="{{asset('siteassets/images/products/products-2.jpg')}}" alt="Third slide">
						</div>
					</div>
					<!-- product slider --> --}}

					<div class="content mt-5 pt-5">
						<ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
								 aria-selected="true">Product Details</a>
							</li>

						</ul>
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<h3 class="tab-title">Product Description</h3>
								<p>{{$product->$content}}</p>



							</div>
							<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
								<h3 class="tab-title">Product Specifications</h3>
								<table class="table table-bordered product-table">
									<tbody>
										<tr>
											<td>Seller Price</td>
											<td>$450</td>
										</tr>
										<tr>
											<td>Added</td>
											<td>26th December</td>
										</tr>
										<tr>
											<td>State</td>
											<td>Dhaka</td>
										</tr>
										<tr>
											<td>Brand</td>
											<td>Apple</td>
										</tr>
										<tr>
											<td>Condition</td>
											<td>Used</td>
										</tr>
										<tr>
											<td>Model</td>
											<td>2017</td>
										</tr>
										<tr>
											<td>State</td>
											<td>Dhaka</td>
										</tr>
										<tr>
											<td>Battery Life</td>
											<td>23</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
								<h3 class="tab-title">Product Review</h3>
								<div class="product-review">
									<div class="media">
										<!-- Avater -->
										<img src="{{asset('siteassets/images/user/user-thumb.jpg')}}" alt="avater">
										<div class="media-body">
											<!-- Ratings -->
											<div class="ratings">
												<ul class="list-inline">
													<li class="list-inline-item">
														<i class="fa fa-star"></i>
													</li>
													<li class="list-inline-item">
														<i class="fa fa-star"></i>
													</li>
													<li class="list-inline-item">
														<i class="fa fa-star"></i>
													</li>
													<li class="list-inline-item">
														<i class="fa fa-star"></i>
													</li>
													<li class="list-inline-item">
														<i class="fa fa-star"></i>
													</li>
												</ul>
											</div>
											<div class="name">
												<h5>Jessica Brown</h5>
											</div>
											<div class="date">
												<p>Mar 20, 2018</p>
											</div>
											<div class="review-comment">
												<p>
													Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremqe laudant tota rem ape
													riamipsa eaque.
												</p>
											</div>
										</div>
									</div>
									<div class="review-submission">
										<h3 class="tab-title">Submit your review</h3>
										<!-- Rate -->
										<div class="rate">
											<div class="starrr"></div>
										</div>
										<div class="review-submit">
											<form action="#" method="POST" class="row">
												<div class="col-lg-6 mb-3">
													<input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
												</div>
												<div class="col-lg-6 mb-3">
													<input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
												</div>
												<div class="col-12 mb-3">
													<textarea name="review" id="review" rows="6" class="form-control" placeholder="Message" required></textarea>
												</div>
												<div class="col-12">
													<button type="submit" class="btn btn-main">Sumbit</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="sidebar">
					<div class="widget price text-center">
						<h4>Price</h4>
                        @if ($product->sale_price)
                            <small><del  style="display: inline-block"> <p>${{$product->price}}</p> </del></small> <p style="display: inline-block">${{$product->sale_price}}</p>
                        @else
                        <p>${{$product->price}}</p>
                        @endif

                        <form action="{{route('site.add_to_cart')}}" method="POST"> @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <input type="hidden" name="user_id" value="{{Auth::id()}}">
                            <div class="product-quantity">
                                <h4>Quantity</h4>
                                <div class="product-quantity-slider">
                                    <input id="product-quantity" type="text" value="1" name="product-quantity">
                                </div>
                            </div>
                            <button class="btn btn-main mt-20">Add To Cart</button>
                        </form>
					</div>

					{{-- <!-- Map Widget -->
					<div class="widget map">
						<div class="map">
							<div id="map" data-latitude="51.507351" data-longitude="-0.127758"></div>
						</div>
					</div> --}}
					<!-- Rate Widget -->
					<div class="widget rate">
						<!-- Heading -->
						<h5 class="widget-header text-center">What would you rate
							<br>
							this product</h5>
						<!-- Rate -->
						<div class="starrr"></div>
					</div>

					<!-- Coupon Widget -->
					<div class="widget coupon text-center">
						<!-- Coupon description -->
						<p>Have a great product to post ? Share it with
							your fellow users.
						</p>
						<!-- Submii button -->
						<a href="" class="btn btn-transparent-white">Submit Listing</a>
					</div>

				</div>
			</div>

		</div>
	</div>
	<!-- Container End -->
</section>

@endsection
