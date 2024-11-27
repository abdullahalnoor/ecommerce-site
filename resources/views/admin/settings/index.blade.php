@extends('admin.master')



@push('style')




@endpush


@section('title', 'Site Setting')

@section('content')


 <div class="row">
        <div class="col-lg-12">
          <div class="card">
             <div class="card-header text-uppercase">Site Setting</div>
             <div class="card-body">
			<form action="{{route('admin.setting.index')}}" method="POST" enctype="multipart/form-data">
				@csrf
				


				<div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label">Site Copyright Ownership</label>
					<div class="col-sm-10">
					  <input type="text" name="site_copyright_ownership" value="{{$siteSetting->site_copyright_ownership}}" id="basic-input" class="form-control" placeholder="Enter Name..">
					  @error('site_copyright_ownership')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
				  </div>
				  </div>


				  <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label">Site Developed by </label>
					<div class="col-sm-10">
					  <input type="text" name="site_developed_by" value="{{$siteSetting->site_developed_by}}" id="basic-input" class="form-control" placeholder="Enter Name..">
					  @error('site_developed_by')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
				  </div>
				  </div>

				<div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label">Site Owner</label>
					<div class="col-sm-10">
					  <input type="text" name="site_owner" value="{{$siteSetting->site_owner}}" id="basic-input" class="form-control" placeholder="Enter Name..">
					  @error('site_owner')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
				  </div>
				  </div>


				  <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label">Site Maintenance by</label>
					<div class="col-sm-10">
					  <input type="text" name="site_maintenance_by" value="{{$siteSetting->site_maintenance_by}}" id="basic-input" class="form-control" placeholder="Enter Name..">
					  @error('site_maintenance_by')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
				  </div>
				  </div>

				
			 
			    <div class="form-group row">
				  <label for="basic-input" class="col-sm-2 col-form-label">Site Name</label>
				  <div class="col-sm-10">
					<input type="text" name="site_name" value="{{$siteSetting->site_name}}" id="basic-input" class="form-control" placeholder="Enter Name..">
					@error('site_name')
					<span class="text-danger" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				</div>
				</div>


				
			    <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label">Website URL</label>
					<div class="col-sm-10">
					  <input type="url" name="site_url" value="{{$siteSetting->site_url}}" id="basic-input" class="form-control" placeholder="Enter Name..">
					  @error('site_url')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
				  </div>
				  </div>
				

				

			

				  <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label"> Phone (multiple)</label>
					<div class="col-sm-10">
					  <input type="text" value="{{$siteSetting->site_phone}}" name="site_phone" id="basic-input" class="form-control" placeholder="Enter Price..">
					
					  @error('site_phone')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
					</div>
				  </div>

				  <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label">Email</label>
					<div class="col-sm-10">
				   <input  class="form-control"  value="{{$siteSetting->site_email}}"  name="site_email">
				   @error('site_email')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
					</div>
				  </div>
				  
				  <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label">Address</label>
					<div class="col-sm-10">
				   <textarea  class="form-control"   name="site_address" >{{$siteSetting->site_address}}</textarea>
				   @error('site_address')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
					</div>
				  </div>

		<div class="form-group row mx-auto mt-5">
			<div class="form-group">
				<button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
				
			  </div>
		</div>
	
          
			
			 </form>
			 
             </div>
          </div>
        </div>
      </div><!--End Row-->




@endsection


