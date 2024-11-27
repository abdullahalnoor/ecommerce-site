@extends('admin.master')



@push('style')

<link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.css')}}">



@endpush


@section('title', 'Update Product')

@section('content')


 <div class="row">
        <div class="col-lg-12">
          <div class="card">
             <div class="card-header text-uppercase">Update Product</div>
             <div class="card-body">
			<form action="{{route('admin.product.save.offer')}}" method="POST" enctype="multipart/form-data">
			
				@csrf

				<input type="hidden" name="product_id" value="{{$product->id}}">
		

				<div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label"> Sales Price</label>
					<div class="col-sm-10">
					  <input readonly type="number" step="any" value="{{$product->sales_price}}" name="sales_price"  class="form-control" placeholder="Enter Sales Price..">
					
					  @error('sales_price')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
					</div>
				  </div>



				  <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label"> Offer Price</label>
					<div class="col-sm-10">
					  <input type="number" step="any"  value="{{$product->reduce_price}}" name="reduce_price"  class="form-control" placeholder="Enter Reduce Price..">
					
					  @error('reduce_price')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
					</div>
				  </div>

				 

				  <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label"> Status  </label>
					<div class="col-sm-10">
					  
						<select name="offer" class="form-control single-select">
							<option value=""  >Select One</option>
							<option value="1" {{ $product->offer == 1 ? 'selected' : '' }} >Active</option>
							<option value="2" {{ $product->offer == 2 ? 'selected' : '' }} >Inactive</option>
						</select>

					  @error('offer')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
				  </div>
				  </div>

				 

		<div class="form-group row mx-auto mt-5">
			<div class="form-group">
				<a  class="btn btn-danger  waves-effect" href="{{ route('admin.product.index') }}">BACK</a>
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


