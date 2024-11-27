@extends('admin.master')



@push('style')




@endpush


@section('title', 'Update Brand')

@section('content')


 <div class="row">
        <div class="col-lg-12">
          <div class="card">
             <div class="card-header text-uppercase">Update Brand</div>
             <div class="card-body">
			<form action="{{route('admin.brand.update',$brand->id)}}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT')
			 
			    <div class="form-group row">
				  <label for="basic-input" class="col-sm-2 col-form-label"> Name <i class="text-danger">*</i> </label>
				  <div class="col-sm-10">
					<input type="text" name="name" value="{{$brand->name}}"  class="form-control slugFrom" placeholder="Enter Name..">
					@error('name')
					<span class="text-danger" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				</div>
				</div>


				<div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label"> Slug <i class="text-danger">*</i> </label>
					<div class="col-sm-10">
					  <input type="text"  name="slug" value="{{$brand->slug}}"  class="form-control slugTo" placeholder="Enter slug..">
					  @error('slug')
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
							<option value="1" {{$brand->status == 1 ? 'selected' : '' }}>Active</option>
							<option value="0" {{$brand->status == 0 ? 'selected' : '' }}>Inactive</option>
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


