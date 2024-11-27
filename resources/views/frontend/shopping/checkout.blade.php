@extends('layouts.app')


@push('style')
    
@endpush

@section('title')
    Customer Login
@endsection


@section('content')

<main id="content" role="main">
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{route('frontend.home')}}">Home</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">My Account</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="mb-4">
            <h1 class="text-center">Place Order</h1>
        </div>
		<div class="row justify-content-center">
			<div  class="col-sm-12">
				
				<form action="{{route('frontend.cart.place-order')}}" method="post" enctype="multipart/form-data" class="form-horizontal account-register clearfix">
					@csrf
					 <fieldset id="account">
						 <legend class="section-title mb-0 pb-2 font-size-22 mb-2"> Personal Info</legend>
						 
						 
						 
						 <div class="form-group ">
							 <label class="col-sm-2 control-label" for="input-telephone"><b>Mobile  No</b></label>
							 <div class="col-sm-12">
								 <input type="tel" name="mobile"
							 @auth('web')
							 value="{{old('mobile',auth()->user()->customer->mobile )}}"
							 @endauth
							
								  placeholder="Mobile No" id="input-telephone1" class="form-control">
								 @error('mobile')
								 <span class="text-danger" role="alert">
									 <strong>{{ $message }}</strong>
								 </span>
							 @enderror
							 </div>
						 </div>
						 <div class="form-group ">
							 <label class="col-sm-2 control-label" for="input-telephone5"><b>Telephone</b></label>
							 <div class="col-sm-12">
								 <input type="tel" name="phone" 
								 @auth('web')
								 value="{{old('phone',auth()->user()->customer->phone)}}"
							 @endauth
						
								 
								 
								 placeholder="Telephone" id="input-telephone85" class="form-control">
								 @error('phone')
								 <span class="text-danger" role="alert">
									 <strong>{{ $message }}</strong>
								 </span>
							 @enderror
							 </div>
						 </div>
						 
					 </fieldset>
					 <fieldset id="address">
						 <legend class="section-title mb-0 pb-2 font-size-22 mb-2">Personal Address</legend>
						 
						 <div class="form-group required">
							 <label class="col-sm-2 control-label" for="input-address-1"><b>Address One</b></label>
							 <div class="col-sm-12">
								 <input type="text" name="address_one" 
								 @auth('web')
								 value="{{old('address_one',auth()->user()->customer->address_one )}}"
							 @endauth
							
								 
								 
								 placeholder="Address 1" id="input-address-18" class="form-control">
								 @error('address_one')
								 <span class="text-danger" role="alert">
									 <strong>{{ $message }}</strong>
								 </span>
							 @enderror
							 </div>
						 </div>
						 <div class="form-group">
							 <label class="col-sm-2 control-label" for="input-address-2"><b>Address Two</b></label>
							 <div class="col-sm-12">
								 <input type="text" name="address_two"
								
							 @auth('web')
							 value="{{old('address_two',auth()->user()->customer->address_two )}}"
							 @endauth
								 
								 placeholder="Address 2" id="input-address-2" class="form-control">
								 @error('address_two')
								 <span class="text-danger" role="alert">
									 <strong>{{ $message }}</strong>
								 </span>
							 @enderror
							 </div>
						 </div>
						
						 <div class="form-group required">
							 <label class="col-sm-2 control-label" for="input-city"><b>City</b></label>
							 <div class="col-sm-12">
								 <input type="text" name="city" 
								 @auth('web')
								 value="{{old('city',auth()->user()->customer->city)}}"
							 @endauth
						
								 
								 
								 placeholder="City" id="input-city" class="form-control">
								 @error('city')
								 <span class="text-danger" role="alert">
									 <strong>{{ $message }}</strong>
								 </span>
							 @enderror
							 </div>
						 </div>
						 <div class="form-group required">
							 <label class="col-sm-2 control-label" for="input-postcode"><b>Post Code</b></label>
							 <div class="col-sm-12">
								 <input type="text" name="post_code" 
								 @auth('web')
								 value="{{old('post_code',auth()->user()->customer->post_code)}}"
							 @endauth
							
								 
								 placeholder="Post Code" id="input-postcode" class="form-control">
								 @error('post_code')
								 <span class="text-danger" role="alert">
									 <strong>{{ $message }}</strong>
								 </span>
							 @enderror
							 </div>
						 </div>
						 
	 
						 <div class="form-group ">
							 <label class="col-sm-2 control-label" for="input-postcode"><b>Shipping Address </b></label>
							 <label class="control-label" for="shippingAddressCehckbox">
								 <input style="margin-left: 20px;"   type="checkbox" name="shipping_address_check"  class="validate required" id="shippingAddressCehckbox" onclick="shippingAddress()" >
								 <span> This is   <a class="agree" href="#"><b>Shipping Address</b></a></span> </label>
						 </div>
						
					 </fieldset>
	 
	 
	 
	 
	 
						 <div id="shippingAddress">
							 <fieldset id="">
								 <legend class="section-title mb-0 pb-2 font-size-22 mb-2">Shipping Address</legend>
								 
								 <div class="form-group required">
									 <label class="col-sm-2 control-label" for="input-firstname"><b>First Name</b></label>
									 <div class="col-sm-12">
									 <input type="text" name="shipping_first_name" value="{{old('shipping_first_name')}}" placeholder="First Name" id="input-firstname" class="form-control">
									 @error('shipping_first_name')
									 <span class="text-danger" role="alert">
										 <strong>{{ $message }}</strong>
									 </span>
								 @enderror
								 
								 </div>
								 </div>
								 <div class="form-group required">
									 <label class="col-sm-2 control-label" for="input-lastname"><b>Last Name</b></label>
									 <div class="col-sm-12">
										 <input type="text" name="shipping_last_name" value="{{old('shipping_last_name')}}" placeholder="Last Name" id="input-lastname" class="form-control">
										 @error('shipping_last_name')
										 <span class="text-danger" role="alert">
											 <strong>{{ $message }}</strong>
										 </span>
									 @enderror
									 </div>
								 </div>
								 
								 <div class="form-group ">
									 <label class="col-sm-2 control-label" for="input-telephone"><b>Mobile  No</b></label>
									 <div class="col-sm-12">
										 <input type="tel" name="shipping_mobile" value="{{old('shipping_mobile')}}" placeholder="Mobile No" id="input-telephone1" class="form-control">
										 @error('shipping_mobile')
										 <span class="text-danger" role="alert">
											 <strong>{{ $message }}</strong>
										 </span>
									 @enderror
									 </div>
								 </div>
								 <div class="form-group ">
									 <label class="col-sm-2 control-label" for="input-telephone"><b>Telephone</b></label>
									 <div class="col-sm-12">
										 <input type="tel" name="shipping_phone" value="{{old('shipping_phone')}}" placeholder="Telephone" id="input-telephone" class="form-control">
										 @error('shipping_phone')
										 <span class="text-danger" role="alert">
											 <strong>{{ $message }}</strong>
										 </span>
									 @enderror
									 </div>
								 </div>
	 
								 <div class="form-group ">
									 <label class="col-sm-2 control-label" for="input-telephone"><b>Email</b></label>
									 <div class="col-sm-12">
										 <input type="email" name="shipping_email" value="{{old('shipping_email')}}" placeholder="Telephone" id="input-telephone" class="form-control">
										 @error('shipping_email')
										 <span class="text-danger" role="alert">
											 <strong>{{ $message }}</strong>
										 </span>
									 @enderror
									 </div>
								 </div>
								 
								 <div class="form-group required">
									 <label class="col-sm-2 control-label" for="input-addreffss-1"><b>Address</b> </label>
									 <div class="col-sm-12">
										 <input type="text" name="shipping_address" value="{{old('shipping_address')}}"  value="" placeholder="Address " id="input-address-1" class="form-control">
										 @error('shipping_address')
										 <span class="text-danger" role="alert">
											 <strong>{{ $message }}</strong>
										 </span>
									 @enderror
									 </div>
								 </div>
								
							 
								 <div class="form-group required">
									 <label class="col-sm-2 control-label" for="input-city"><b>City</b></label>
									 <div class="col-sm-12">
										 <input type="text" name="shipping_city" value="{{old('shipping_city')}}" placeholder="City" id="input-city" class="form-control">
										 @error('shipping_city')
										 <span class="text-danger" role="alert">
											 <strong>{{ $message }}</strong>
										 </span>
									 @enderror
									 </div>
								 </div>
								 <div class="form-group required">
									 <label class="col-sm-2 control-label" for="input-postcode"><b>Post Code</b></label>
									 <div class="col-sm-12">
										 <input type="text" name="shipping_post_code" value="{{old('shipping_post_code')}}" placeholder="Post Code" id="input-postcode" class="form-control">
										 @error('s_post_code')
										 <span class="text-danger" role="alert">
											 <strong>{{ $message }}</strong>
										 </span>
									 @enderror
									 </div>
								 </div>
	 
	 
								 
								 
	 
								 
								
							 </fieldset>
						 </div>
	 
					 
						 <fieldset id="account11">
							 <legend>Payment Method</legend>
							 
							 
							  <div class="row">
								 <label class="col-sm-2 control-label" for="input-telephone5">
									 <b><i style="color:red">*</i> Select Payment</b>
									 
								 </label>
								 @foreach ($shareable_data['paymentsGatways'] as $paymentGatway)
								 <div class="col-xs-12 col-md-3">
									 <div class="radio">
										 <label>
										   <input type="radio" value="{{$paymentGatway->id}}"  name="payment_method">
										   {{$paymentGatway->name}}
										 </label>
									 </div>
								 </div>
								 @endforeach
							  </div>
								 
							  <div class="row">
								  <div class="col-md-2"></div>
								  <div class="col-xs-12 col-md-10">
									 @error('payment_method')
									 <span class="text-danger" role="alert">
										 <strong>{{ $message }}</strong>
									 </span>
								 @enderror
								  </div>
							  </div>
								 
						 
						 </fieldset>
							 
	 
	 
						 
					 
					 
				  <br>
				 
					 <div class="buttons">
						 <div class="pull-right">
							 <input type="submit" value="Place Order" class="btn btn-primary">
						 </div>
					 </div>
				 </form>
				<br><br><br>
			</div>
		</div>
    </div>
</main>
	
@endsection


@push('script')
    <script>


function shippingAddress() {
  var checkBox = document.getElementById("shippingAddressCehckbox");
//   var text = document.getElementById("text");
  if (checkBox.checked == true){
    document.querySelector('#shippingAddress').style.display = 'none' ;
  } else {
	document.querySelector('#shippingAddress').style.display = 'block' ;
  }
}
		


	</script>
@endpush