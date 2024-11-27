@extends('admin.master')



@push('style')




@endpush


@section('title', 'Update  Category')

@section('content')


 <div class="row">
        <div class="col-lg-12">
          <div class="card">
             <div class="card-header text-uppercase">Update  Category</div>
             <div class="card-body">
			<form action="{{route('admin.category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT')
			 
			    <div class="form-group row">
				  <label for="basic-input" class="col-sm-2 col-form-label"> Name <i class="text-danger">*</i> </label>
				  <div class="col-sm-10">
					<input type="text" name="name" value="{{$category->name}}"  class="form-control slugFrom" placeholder="Enter Name..">
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
					  <input type="text"  name="slug" value="{{$category->slug}}"  class="form-control slugTo" placeholder="Enter slug..">
					  @error('slug')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
				  </div>
				  </div>


				  <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label"> Order No <i class="text-danger">*</i> </label>
					<div class="col-sm-10">
					  <input required type="number" name="order_no" value="{{old('order_no',$category->order_no)}}"   class="form-control " placeholder="Enter  Order No..">
					  @error('order_no')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
				  </div>
				  </div>


				  <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label">Image </label>
					<div class="col-sm-10">
					  <input type="file"  value="{{old('image')}}" name="image"  class="form-control" placeholder="Enter Sales Price..">
					
					  @error('image')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
					</div>
				  </div>

				  <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label">icon </label>
					<div class="col-sm-10">
					  <input type="file"  value="{{old('icon')}}" name="icon"  class="form-control" placeholder="Enter Sales Price..">
					
					  @error('icon')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
					</div>
				  </div>


				  <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label"> Status <i class="text-danger">*</i> </label>
					<div class="col-sm-10">
					  
						<select name="status" class="form-control single-select">
							<option value="">Select One</option>
							<option value="1" {{ $category->status == 1 ? 'selected' : '' }} >Active</option>
							<option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Inactive</option>
						</select>

					  @error('status')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
				  </div>
				  </div>

				  <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label"> Categroy <i class="text-danger">*</i> </label>
					<div class="col-sm-10">

						
					  
						<select name="parent_id[]" multiple class="form-control multiple-select">
							@php 
								$ids = (isset($category->parents) && $category->parents->count() > 0 ) ? array_pluck($category->parents, 'id') : null
							@endphp
							
							@forelse ($categories as $category)
							<option value="{{ $category->id}}"
								@if(!is_null($ids) && in_array($category->id, $ids)) {{'selected'}} @endif
								>{{ $category->slug}}</option>
							@empty
								
							@endforelse
						</select>

					  @error('parent_id')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
				  </div>
				  </div>


		<div class="form-group row mx-auto mt-5">
			<div class="form-group">
				<a  class="btn btn-danger  waves-effect" href="{{ route('admin.category.index') }}">BACK</a>
				<button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
				
			  </div>
		</div>
	
          
			
			 </form>
			 
             </div>
          </div>
        </div>
      </div><!--End Row-->




@endsection


