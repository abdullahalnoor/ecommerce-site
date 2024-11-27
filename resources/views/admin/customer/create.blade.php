@extends('admin.master')



@push('style')




@endpush


@section('title', 'Add Customer')

@section('content')


 <div class="row">
        <div class="col-lg-12">
          <div class="card">
             <div class="card-header text-uppercase">Add Customer</div>
             <div class="card-body">
			<form action="{{route('admin.customer.store')}}" method="POST" enctype="multipart/form-data">
        		@csrf
			 
			    <div class="form-group row">
				  <label for="basic-input" class="col-sm-2 col-form-label"> Name <i class="text-danger">*</i></label>
				  <div class="col-sm-10">
					<input type="text" name="name" value="{{old('name')}}" id="basic-input" class="form-control" placeholder="Enter Name..">
					@error('name')
					<span class="text-danger" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				</div>
				</div>
				

				<div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label"> Email</label>
					<div class="col-sm-10">
					  <input type="email" value="{{old('email')}}" name="email" id="basic-input" class="form-control" placeholder="Enter Email..">
					
					  @error('email')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
					</div>
				  </div>


				  <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label"> Phone (multiple)</label>
					<div class="col-sm-10">
					  <input type="text" value="{{old('phone')}}" name="phone" id="basic-input" class="form-control" placeholder="Enter Phone (multiple)..">
					
					  @error('phone')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
					</div>
				  </div>
				  
				  <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label">Address</label>
					<div class="col-sm-10">
				   <textarea  class="form-control"   name="address"></textarea>
				   @error('address')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
					</div>
				  </div>


				  <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label"> Opening Balance </label>
					<div class="col-sm-10">
					  <input type="number" type="any" name="opening_balance" value="{{old('opening_balance')}}" id="basic-input" class="form-control" placeholder="Enter  Opening Balance..">
					  @error('opening_balance')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
				  </div>
				  </div>

		<div class="form-group row mx-auto mt-5">
			<div class="form-group">
				<a  class="btn btn-danger  waves-effect" href="{{ route('admin.customer.index') }}">BACK</a>
				<button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
				
			  </div>
		</div>
	
          
			
			 </form>
			 
             </div>
          </div>
        </div>
      </div><!--End Row-->




@endsection


