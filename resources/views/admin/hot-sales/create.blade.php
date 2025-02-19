@extends('admin.master')



@push('style')




@endpush


@section('title', 'Create Hot Sales')

@section('content')


 <div class="row">
        <div class="col-lg-12">
          <div class="card">
             <div class="card-header text-uppercase">Create Hot Sales</div>
             <div class="card-body">
			<form action="{{route('admin.hot-sales.store')}}" method="POST" enctype="multipart/form-data">
				@csrf
				

				<div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label"> Select Product <i class="text-danger">*</i> </label>
					<div class="col-sm-10">
					  
						<select name="product_id" class="form-control">
							<option value="">Select One</option>
							@foreach ($products as $product)
							<option value="{{$product->id}}">{{$product->name}}</option>
							@endforeach
							
						</select>

					  @error('product_id')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
				  </div>
				  </div>
			 
			    <div class="form-group row">
				  <label for="basic-input" class="col-sm-2 col-form-label"> Price <i class="text-danger">*</i> </label>
				  <div class="col-sm-10">
					<input type="text" name="price" value="{{old('price')}}"  class="form-control slugFrom" placeholder="Enter Price..">
					@error('price')
					<span class="text-danger" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				</div>
				</div>

				<div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label"> Start Date  </label>
					<div class="col-sm-10">
					  <input type="date" name="start_date" value="{{old('start_date')}}"  class="form-control slugFrom" placeholder="Enter Start Date..">
					  @error('start_date')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
				  </div>
				  </div>


				  <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label"> End Date  </label>
					<div class="col-sm-10">
					  <input type="date" name="end_date" value="{{old('end_date')}}"  class="form-control slugFrom" placeholder="Enter End Date..">
					  @error('end_date')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
				  </div>
				  </div>


			




				  
				  <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label"> Status  </label>
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
				<a  class="btn btn-danger  waves-effect" href="{{ route('admin.hot-sales.index') }}">BACK</a>
				<button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
				
			  </div>
		</div>
	
          
			
			 </form>
			 
             </div>
          </div>
        </div>
      </div><!--End Row-->




@endsection


