@php
use App\Models\Setting;
$settings = Setting::first();
@endphp
@extends('site.master')

@section('title','Payment Page | '. $settings->store_name)
@section('content')
<!-- Page Wrapper -->
<section class="page-wrapper fail-msg">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="block text-center">
              <i class="tf-ion-close"></i>
            <h2 class="text-center">Sorry ! Something is error</h2>
            <p>Please make sure that all the information you entered is correct..</p>
            <a href="{{route('site.checkout')}}" class="btn btn-main mt-20">Back to Checkout</a>
          </div>
        </div>
      </div>
    </div>
  </section><!-- /.page-warpper -->
@stop
