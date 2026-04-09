<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label>English Name</label>
            <input type="text" placeholder="English Name" name="name_en" class="form-control @error('name_en') is-invalid @enderror" value="{{old('name_en',$category->title_en)}}">
            @error('name_en')
                <small class="invalid-feedback">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label>Arabc Name</label>
            <input type="text" placeholder="Arabc Name" name="name_ar" class="form-control @error('name_ar') is-invalid @enderror" value="{{old('name_ar',$category->title_ar)}}">
            @error('name_ar')
                <small class="invalid-feedback">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col-md-12">
        <div class="mb-3">
            <label class=" d-block mb-2">Image</label>
            @if ($category->image)
            <img class="mb-2" width ='100' src="{{asset('uploads/categories/'.$category->image)}}"></img>
            @endif

            <input type="file"  name="image" class="form-control @error('image') is-invalid @enderror" value="{{old('image')}}">
            @error('image')
                <small class="invalid-feedback">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>
