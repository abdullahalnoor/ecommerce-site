@extends('admin.master')



@push('style')


@endpush


@section('title', 'Add To Stock')

@section('content')



<div class="row">
	<div class="col-md-6">
	 <img src="{{asset($product->thumbnail)}}" style="padding: 5px;" width="200" height="200" alt="">
	</div>
	<div class="col-md-6">
	 <p>
		{{$product->name}}
	 </p>

	
	</div>
  </div><!--End Row-->


 <div class="row mt-3">
        <div class="col-lg-12">
          <div class="card">
             <div class="card-header text-uppercase">Add to Stock </div>
             <div class="card-body">
			<form action="{{route('admin.product.save.stock')}}" method="POST" >
				@csrf
				<input type="hidden" name="product_id" value="{{$product->id}}" >

				@if ($product->product_type == 1)
				<select hidden name="size_id" >
					<option value="1">No Size</option>
					
				</select>

				@else
				<div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label"> Size <i class="text-danger">*</i>  </label>
					<div class="col-sm-10">
						<select name="size_id" class=" form-control single-select">
							<option value="">Select One</option>
							
							@foreach ($sizes as $size)
								<option value="{{$size->id}}">{{$size->name}}</option>
							@endforeach
						</select>
					  @error('size_id')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
				  </div>
				  </div>
				@endif
			

			    <div class="form-group row">
				  <label for="basic-input" class="col-sm-2 col-form-label"> Quantity <i class="text-danger">*</i> </label>
				  <div class="col-sm-10">
					<input type="number" name="quantity" value="{{old('quantity')}}"  class="form-control slugFrom" placeholder="Enter quantity..">
					@error('quantity')
					<span class="text-danger" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				</div>
				</div>


		
			


			




				  


				  


				  {{-- <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label"> Status <i class="text-danger">*</i> </label>
					<div class="col-sm-10">
					  
						<select name="status" class="form-control single-select">
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
				  </div> --}}



	


		<div class="form-group row mx-auto mt-5">
			<div class="form-group">
				<a  class="btn btn-danger  waves-effect" href="{{ route('admin.product.index') }}">BACK</a>
				<button type="submit" class="btn btn-primary m-t-15 waves-effect">Add to Stock</button>
				
			  </div>
		</div>
	
          
			
			 </form>
			 
             </div>
          </div>
        </div>
      </div><!--End Row-->



	  
<div class="row">
	<div class="col-lg-12">
	  <div class="card">
		<div class="card-header"><i class="fa fa-table"></i>  {{$product->name}}

		</div>
		<div class="card-body">
		  <div class="table-responsive">
		  <table id="example" class="table table-bordered">
			<thead>
				<tr>
					<th> Size </th>
					<th> Stock</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@forelse ($productStocks as $productStock)
				<tr>
					<td>{{$productStock->size->name}} </td>
					<td>{{$productStock->purchase_qty}} </td>
					<td>Action </td>
				</tr>
				@empty
					
				@endforelse
				
				
			</tbody>
		   
		</table>
		</div>
		</div>
	  </div>
	</div>
  </div>



@endsection

@push('script')


	
@endpush


