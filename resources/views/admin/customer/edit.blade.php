@extends('admin.master')



@push('style')




@endpush


@section('title', 'Update Customer')

@section('content')


 <div class="row">
        <div class="col-lg-12">
          <div class="card">
             <div class="card-header text-uppercase">Update Customer</div>
             <div class="card-body">
			<form action="{{route('admin.customer.update',$customer->id)}}" method="POST" enctype="multipart/form-data">
				@csrf
				
				@method('PUT')
			 
			    <div class="form-group row">
				  <label for="basic-input" class="col-sm-2 col-form-label"> Name</label>
				  <div class="col-sm-10">
					<input type="text" name="name" value="{{$customer->name}}"  class="form-control" >
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
					  <input type="email" value="{{$customer->email}}" name="email"  class="form-control" >
					
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
					  <input type="text" value="{{$customer->phone}}" name="phone"  class="form-control" >
					
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
				   <textarea  class="form-control"   name="address">{{$customer->address}}</textarea>
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
					  <input type="number" type="any" name="opening_balance" value="{{$customer->opening_balance}}"  class="form-control" >
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


