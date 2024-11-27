@extends('admin.master')



@push('style')



<link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.css')}}">

@endpush


@section('title', 'Create Brand Product')

@section('content')


 <div class="row">
        <div class="col-lg-12">
          <div class="card">
             <div class="card-header text-uppercase">Create Brand Product</div>
             <div class="card-body">
			<form action="{{route('admin.brand-product.store')}}" method="POST" enctype="multipart/form-data">
				@csrf
				
				<div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label"> Brand  </label>
					<div class="col-sm-10">
						<select name="brand_id" class="form-control single-select">
							<option value="">Select One</option>
							@foreach ($brands as $brand)
								<option value="{{$brand->id}}">{{$brand->name}}</option>
							@endforeach
						</select>
					  @error('brand_id')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
				  </div>
				  </div>
			 
			    <div class="form-group row">
				  <label for="basic-input" class="col-sm-2 col-form-label"> Title <i class="text-danger">*</i> </label>
				  <div class="col-sm-10">
					<input type="text" name="title" value="{{old('title')}}"  class="form-control slugFrom" placeholder="Enter title..">
					@error('title')
					<span class="text-danger" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				</div>
				</div>

				<div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label">Description</label>
					<div class="col-sm-10">
				   <textarea  class="form-control summernoteEditor" id=""  name="description">
					{!! old('description') !!}
				   </textarea>
				   @error('description')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
					</div>
				  </div>


				{{-- <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label"> Slug <i class="text-danger">*</i> </label>
					<div class="col-sm-10">
					  <input type="text"  name="slug" value="{{old('slug')}}"  class="form-control slugTo" placeholder="Enter slug..">
					  @error('slug')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
				  </div>
				  </div> --}}


				  <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label"> Image <i class="text-danger">*</i> </label>
					<div class="col-sm-10">
					  <input type="file" name="image" value="{{old('image')}}"  class="form-control" placeholder="Upload Image..">
					  @error('image')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
				  </div>
				  </div>


				  
				  <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label"> Status <i class="text-danger">*</i> </label>
					<div class="col-sm-10">
					  
						<select name="status" class="form-control">
							<option value="">Select One</option>
							<option value="1">Active</option>
							<option value="0">Inactive</option>
						</select>

					  @error('status')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
				  </div>
				  </div>
				

		<div class="form-group row mx-auto mt-5">
			<div class="form-group">
				<a  class="btn btn-danger  waves-effect" href="{{ route('admin.brand-product.index') }}">BACK</a>
				<button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
				
			  </div>
		</div>
	
          
			
			 </form>
			 
             </div>
          </div>
        </div>
      </div><!--End Row-->




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


