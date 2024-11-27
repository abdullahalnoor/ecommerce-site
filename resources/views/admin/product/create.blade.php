@extends('admin.master')



@push('style')

<link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.css')}}">



@endpush


@section('title', 'Create Product')

@section('content')


 <div class="row">
        <div class="col-lg-12">
          <div class="card">
             <div class="card-header text-uppercase">Create Product</div>
             <div class="card-body">
			<form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
				@csrf
				
				

				<div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label"> Category  </label>
					<div class="col-sm-10">
						<select name="category_id[]" multiple class="parentCategory form-control multiple-select">
							<option value="">Select One</option>
							@foreach ($categories as $category)
								<option value="{{$category->id}}">{{$category->slug}}</option>
							@endforeach
						</select>
					  @error('category_id')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
				  </div>
				  </div>



				  <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label"> Product Type <i class="text-danger">*</i> </label>
					<div class="col-sm-10">
					  
						<select name="product_type" class="form-control single-select">
							<option value="">Select One</option>
							<option value="1">Standard</option>
							<option value="2">Variant</option>
						</select>

					  @error('product_type')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
				  </div>
				  </div>




{{-- 


				  <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label"> Brand  </label>
					<div class="col-sm-10">
						<select name="brand_id" class="form-control brandProduct single-select">
							<option value="">Select One</option>
							@foreach ($brands as $brand)
								<option value="{{$brand->id}}">{{$brand->name}}</option>
							@endforeach
						</select>
					  @error('brand_id')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
				  </div>
				  </div>

 --}}

			 
			    <div class="form-group row">
				  <label for="basic-input" class="col-sm-2 col-form-label"> Name <i class="text-danger">*</i> </label>
				  <div class="col-sm-10">
					<input type="text" name="name" value="{{old('name')}}"  class="form-control slugFrom" placeholder="Enter Name..">
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
					  <input type="text"  name="slug" value="{{old('slug')}}"  class=" slugTo form-control" placeholder="Enter slug..">
					  @error('slug')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
				  </div>
				  </div>

			


			
				

				

				  <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label"> Purchase Price</label>
					<div class="col-sm-10">
					  <input type="number" step="any" value="{{old('purchase_price')}}" name="purchase_price"  class="form-control" placeholder="Enter Purchase Price..">
					
					  @error('purchase_price')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
					</div>
				  </div>


				  <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label"> Sales Price <i class="text-danger">*</i>  </label>
					<div class="col-sm-10">
					  <input type="number" step="any" value="{{old('sales_price')}}" name="sales_price"  class="form-control" placeholder="Enter Sales Price..">
					
					  @error('sales_price')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
					</div>
				  </div>


				  {{-- <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label"> Reduce Price</label>
					<div class="col-sm-10">
					  <input type="number" step="any" value="{{old('reduce_price')}}" name="reduce_price"  class="form-control" placeholder="Enter Reduce Price..">
					
					  @error('reduce_price')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
					</div>
				  </div> --}}

				  
				  <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label">Product Specification</label>
					<div class="col-sm-10">
				   <textarea  class="form-control summernoteEditor" id=""  name="product_specification">
					{!! old('product_specification') !!}
				   </textarea>
				   @error('product_specification')
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
					{!! old('description') !!}
				   </textarea>
				   @error('description')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
					</div>
				  </div>

				  <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label">Thumbnail</label>
					<div class="col-sm-10">
					  <input type="file"  value="{{old('thumbnail')}}" name="thumbnail"  class="form-control" placeholder="Enter Sales Price..">
					
					  @error('thumbnail')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
					</div>
				  </div>

				  <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label">Pdf File</label>
					<div class="col-sm-10">
					  <input type="file"  value="{{old('pdf_file')}}" name="pdf_file"  class="form-control" placeholder="Enter Sales Price..">
					
					  @error('pdf_file')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
					</div>
				  </div>


				  


				  <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label"> Trend  </label>
					<div class="col-sm-10">
					  
						<select name="featured" class="form-control single-select">
							<option value="">Select One</option>
							<option value="1">Active</option>
							<option value="0">Inactive</option>
						</select>

					  @error('featured')
					  <span class="text-danger" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
				  @enderror
				  </div>
				  </div>

				  <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label"> new  </label>
					<div class="col-sm-10">
					  
						<select name="new" class="form-control single-select">
							<option value="">Select One</option>
							<option value="1">Active</option>
							<option value="0">Inactive</option>
						</select>

					  @error('new')
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



				  <div class="form-group row">
					<label for="basic-input" class="col-sm-2 col-form-label">Slide Images</label>
					<div class="col-sm-10">
					  <input type="file" multiple  value="{{old('images')}}" name="images[]"   class="form-control" placeholder="Enter Sales Price..">
					
					  @error('images')
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


