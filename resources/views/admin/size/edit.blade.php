@extends('admin.master')



@push('style')




@endpush


@section('title', 'Update Size')

@section('content')


 <div class="row">
        <div class="col-lg-12">
          <div class="card">
             <div class="card-header text-uppercase">Update Size</div>
             <div class="card-body">
			<form action="{{route('admin.size.update',$size->id)}}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT')
			 
			    <div class="form-group row">
				  <label for="basic-input" class="col-sm-2 col-form-label"> Name <i class="text-danger">*</i> </label>
				  <div class="col-sm-10">
					<input type="text" name="name" value="{{$size->name}}"  class="form-control slugFrom" placeholder="Enter Name..">
					@error('name')
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
							<option value="1" {{$size->status == 1 ? 'selected' : '' }}>Active</option>
							<option value="0" {{$size->status == 0 ? 'selected' : '' }}>Inactive</option>
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
				<a  class="btn btn-danger  waves-effect" href="{{ route('admin.size.index') }}">BACK</a>
				<button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
				
			  </div>
		</div>
	
          
			
			 </form>
			 
             </div>
          </div>
        </div>
      </div><!--End Row-->




@endsection


