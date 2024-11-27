@extends('admin.master')



@push('style')




@endpush


@section('title', 'Update Slider')


@section('content')


      <div class="row">
        <div class="col-lg-12">
          <div class="card">
             <div class="card-header text-uppercase">Update Slider</div>
             <div class="card-body">
<form action="{{route('admin.slider.update',$slider->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
			 @method('PUT')
     

       
       {{-- <div class="form-group row">
        <label for="basic-input" class="col-sm-2 col-form-label"> Products <i class="text-danger">*</i> </label>
        <div class="col-sm-10">
          <select name="product_id" class="form-control single-select">
            <option value="">Select One</option>
            @foreach ($products as $product)
              <option value="{{$product->id}}"
                {{$slider->product_id == $product->id ? 'selected' : '' }}
                >{{$product->name}}</option>
            @endforeach
          </select>
          @error('product_id')
          <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
        </div>
        </div> --}}
        
      

     
      
      <div class="form-group row">
        <label for="basic-input" class="col-sm-2 col-form-label"> Title </label>
        <div class="col-sm-10">
        <input type="text" name="title"  value="{{$slider->title}}" class="form-control  @error('title') is-invalid @enderror">
        @error('title')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
      
      </div>
      </div>

     
      
      
   
    
      
      
      
      <div class="form-group row">
        <label for="placeholder-input" class="col-sm-2 col-form-label"> Image <i class="text-danger">*</i></label>
        <div class="col-sm-10">
<div class="input-group-prepend @error('image') is-invalid @enderror">
                <div class="custom-file">
                  <input type="file" name="image"   class="custom-file-input" id="inputGroupFile01">
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                 
                </div>
             
              
              </div>
              
        </div>
        @error('image')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
      </div>

    
     

      <div class="form-group row">
        <label for="placeholder-input" class="col-sm-2 col-form-label"> Status <i class="text-danger">*</i></label>
        <div class="col-sm-10">

                <select name="status"  class="form-control  @error('status') is-invalid @enderror">
                  <option value="">Select One</option>
                  <option value="1" {{$slider->status == 1 ? 'selected' : '' }} >Publised</option>
                  <option value="0" {{$slider->status == 0 ? 'selected' : '' }} >Unpublised</option>
                </select>
                @error('status')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>


      <div class="form-group row">
        <label for="placeholder-input" class="col-sm-2 col-form-label"> Feature Top </label>
        <div class="col-sm-10">

                <select name="feature"  class="form-control  @error('feature') is-invalid @enderror">
                  <option value="">Select One</option>
                  <option value="1" {{$slider->feature == 1 ? 'selected' : '' }} >Yes</option>
                  <option value="0" {{$slider->feature == 0 ? 'selected' : '' }} >No</option>
                </select>
                @error('feature')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>



  

        <div class="form-group row">
          <label for="basic-input" class="col-sm-2 col-form-label"></label>
          <div class="col-sm-10">
<a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.slider.index') }}">BACK</a>
<button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
          </div>
        </div>



			
			 </form>
			 
             </div>
          </div>
        </div>
      </div>


@endsection

@push('script')
<script src="{{asset('admin/tinymce/jquery.tinymce.min.js')}}" ></script>
<script src="{{asset('admin/tinymce/tinymce.min.js')}}" ></script>
  <script>
  tinymce.init({
    selector: '#mytextarea'
  });
  </script>


@endpush