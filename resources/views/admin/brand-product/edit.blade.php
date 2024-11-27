@extends('admin.master')



@push('style')


<link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.css')}}">


@endpush


@section('title', 'Update Brand Product')

@section('content')


 <div class="row">
        <div class="col-lg-12">
          <div class="card">
             <div class="card-header text-uppercase">Update Brand Product  </div>
             <div class="card-body">
			<form action="{{route('admin.brand-product.update',$brandProduct->id)}}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT')

				<div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label"> Brand  </label>
					<div class="col-sm-10">
						<select name="brand_id" class="form-control single-select">
							<option value="">Select One</option>
							@foreach ($brands as $brand)
								<option value="{{$brand->id}}"
									{{$brandProduct->brand_id == $brand->id ? 'selected' : ''}}
									>{{$brand->name}}</option>
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
					<input type="text" name="title" value="{{$brandProduct->title}}"  class="form-control " >
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
					{!! $brandProduct->description !!}
				   </textarea>
				   @error('description')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
					</div>
				  </div>


				


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
							<option value="1" {{$brandProduct->status == 1 ? 'selected' : '' }}>Active</option>
							<option value="0" {{$brandProduct->status == 0 ? 'selected' : '' }}>Inactive</option>
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
				<a  class="btn btn-danger  waves-effect" href="{{ route('admin.brand.index') }}">BACK</a>
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