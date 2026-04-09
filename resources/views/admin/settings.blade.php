@php
use App\Models\Setting;
$settings = Setting::first();
@endphp


@extends('admin.master')

@section('title','Settings | '. $settings->store_name)


@section('content')

<div class="container">
    <h2>Store Settings</h2>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label class="mt-3">Store Name:</label>
        <input type="text" name="store_name" value="{{ $settings->store_name ?? '' }}" class="form-control">


        <label class="mt-3">Language:</label>
        <select name="language" class="form-control">

            <option value="en" {{ $settings->language == 'en' ? 'selected' : '' }}>English</option>
            <option value="ar" {{ $settings->language == 'ar' ? 'selected' : '' }}>Arabic</option>
        </select>

        <div class="form-group">
            <label class="mt-3" for="background_image">Store background image :</label>
            @if($settings && $settings->background_image)
            <div class="mt-1">
                <img class="mb-3" src="{{asset('siteassets/images/home/'. $settings->background_image) }}" width="200">
            </div>
            @endif
            <input type="file" name="background_image" class="form-control @error('background_image') is-invalid @enderror" value="{{old('background_image')}}">
            @error('background_image')
                <small class="invalid-feedback">{{$message}}</small>
            @enderror
        </div>



        <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
    </form>
</div>
@endsection

