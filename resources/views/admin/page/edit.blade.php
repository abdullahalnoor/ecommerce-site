@extends('admin.master')



@push('style')

<link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.css')}}">



@endpush


@section('title', 'Update page')


@section('content')


      <div class="row">
        <div class="col-lg-12">
          <div class="card">
             <div class="card-header text-uppercase">Update page</div>
             <div class="card-body">
<form action="{{route('admin.page.update',$page->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
			 @method('PUT')
     

       
       {{-- <div class="form-group row">
        <label for="basic-input" class="col-sm-2 col-form-label"> Products <i class="text-danger">*</i> </label>
        <div class="col-sm-10">
          <select name="product_id" class="form-control single-select">
            <option value="">Select One</option>
            @foreach ($products as $product)
              <option value="{{$product->id}}"
                {{$page->product_id == $product->id ? 'selected' : '' }}
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
        <label for="basic-input" class="col-sm-2 col-form-label"> Page Name </label>
        <div class="col-sm-10">
        <input readonly type="text" name="name"  value="{{$page->name}}" class="form-control  @error('name') is-invalid @enderror">
        @error('name')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
      
      </div>
      </div>

     
      
      
   
      <div class="form-group row">
        <label for="basic-input" class="col-sm-2 col-form-label">En Description	</label>
        <div class="col-sm-10">
         <textarea  class="form-control summernoteEditor" id=""  name="en_description">{!! old('en_description',$page->en_description) !!}</textarea>
         @error('en_description')
          <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
        </div>
        </div>



        <div class="form-group row">
          <label for="basic-input" class="col-sm-2 col-form-label">Bn Description	</label>
          <div class="col-sm-10">
           <textarea  class="form-control summernoteEditor" id=""  name="bn_description">{!! old('bn_description',$page->bn_description) !!}</textarea>
           @error('bn_description')
            <span class="text-danger" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
          </div>
          </div>
  



      
      
      
      {{-- <div class="form-group row">
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
      </div> --}}

    
     

    



  

        <div class="form-group row">
          <label for="basic-input" class="col-sm-2 col-form-label"></label>
          <div class="col-sm-10">
<a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.page.index') }}">BACK</a>
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
<script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>

	$('.summernoteEditor').summernote({
				height: 400,
				tabsize: 2
			});

</script>
	
@endpush