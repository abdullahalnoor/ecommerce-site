@extends('layouts.app')


@push('style')
<link rel="stylesheet" href="{{asset('frontend/summernote/summernote-bs3.css')}}">
 <style>
        textarea.summernoteEditor{
        border: none !important;
    }
 </style>
@endpush

@section('title')
    {{$pageTitle }}
@endsection


@section('content')

<div class="main-container container">
	<ul class="breadcrumb">
        <li><a href="{{route('frontend.home')}}"><i class="fa fa-home"></i></a></li>
        <li><a href="{{route('frontend.get.quote')}}">Quote</a></li>
    </ul>
    
    <div class="row">
        <div id="content" class="col-sm-12">
            <h2 class="title">Get a Quote  </h2>
            <form action="{{route('frontend.get.quote')}}" method="post" enctype="multipart/form-data" class="form-horizontal account-register clearfix">
               @csrf

               <fieldset id="account">
                <legend>Quote Info <span class="text-danger"> Red Mark Information Mandatory </span></legend>
                
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-telephone">
                        <b>Company Name </b>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" name="company_name" value="{{old('company_name')}}" placeholder="Company Name"  class="form-control">
                        @error('company_name')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>


                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-telephone">
                    <b>Select Quote</b>    
                    </label>
                    <div class="col-sm-10">

                        <div class="radio" style="display: inline-block;margin-left:10px;">
                            <label>
                              <input type="radio"  value="1" name="quote_type" onclick="checkQuoteType(1)" >
                                Product
                            </label>
                        </div>

                        <div class="radio" style="display: inline-block;margin-left:10px;">
                            <label>
                              <input type="radio" value="2" name="quote_type" onclick="checkQuoteType(2)" >
                                Service
                            </label>
                        </div>
                        <br>

                        @error('quote_type')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        

                    </div>
                </div>



                <div class="form-group required" id="quoteForProduct" style="display: none">
                    <label class="col-sm-2 control-label" for="input-telephone"><b>Category</b> </label>
                    <div class="col-sm-10">

                        <select class="form-control" name="category">
                            <option value="">All Categories</option>
        
                            @foreach ($shareable_data['categories'] as $parentCategory)
                                @foreach ($parentCategory->children as $childCategory)
                                <option value="{{$childCategory->id}}">{{$childCategory->name}}</option>
                                @endforeach
                            @endforeach
                        </select>
                       
                  
                        @error('category')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>


                <div class="form-group required" id="quoteForService" style="display: none">
                    <label class="col-sm-2 control-label" for="input-telephone"><b>Serivices</b> </label>
                    <div class="col-sm-10">

                        <select class="form-control" name="service">
                            <option value="">All Serivices</option>
        
                            @foreach ($shareable_data['services'] as $service)
                              
                                <option value="{{$service->id}}">{{$service->name}}</option>
                            @endforeach
                        </select>
                       
                  
                        @error('service')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                    </div>
                </div>


                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-telephone"><b>Quote Details</b></label>
                    <div class="col-sm-10">
                        <textarea name="description"   class="form-control summernoteEditor " style="border: none !important">
                        
                            {{old('description')}}
                        </textarea>
                            @error('description')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>

               
                


            
                
            </fieldset>





                <fieldset id="account">
                    <legend>Your Personal Details</legend>
                    
                    <div class="form-group ">
                        <label class="col-sm-2 control-label" for="input-telephone"><b>First Name</b> </label>
                        <div class="col-sm-10">
							<input type="text" name="first_name"
						@auth('web')
							value="{{ auth()->user()->customer->first_name }}"
						@endauth
						@guest('web')
						value="{{old('first_name')}}"
						@endguest
							 placeholder="first name " id="input-telephone1" class="form-control">
                            @error('first_name')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    


                    <div class="form-group ">
                        <label class="col-sm-2 control-label" for="input-telephone"><b>
                            Last Name</b> </label>
                        <div class="col-sm-10">
							<input type="text" name="last_name"
						@auth('web')
							value="{{ auth()->user()->customer->last_name }}"
						@endauth
						@guest('web')
						value="{{old('last_name')}}"
						@endguest
							 placeholder="last name " id="input-telephone1" class="form-control">
                            @error('last_name')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>


                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-telephone"><b>Email</b> </label>
                        <div class="col-sm-10">
							<input type="email" name="email"
						@auth('web')
							value="{{ auth()->user()->email }}"
						@endauth
						@guest('web')
						value="{{old('email')}}"
						@endguest
							 placeholder="email " id="input-telephone1" class="form-control">
                            @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-telephone"><b>Mobile  No</b></label>
                        <div class="col-sm-10">
							<input type="tel" name="mobile"
						@auth('web')
							value="{{ auth()->user()->customer->mobile }}"
						@endauth
						@guest('web')
						value="{{old('mobile')}}"
						@endguest
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
                        <div class="col-sm-10">
							<input type="tel" name="phone" 
							@auth('web')
							value="{{ auth()->user()->customer->phone }}"
						@endauth
						@guest('web')
						value="{{old('phone')}}"
						@endguest
							
							
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
                    <legend>Your Address</legend>
                    
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-address-1"><b>Address One</b></label>
                        <div class="col-sm-10">
							<input type="text" name="address_one" 
							@auth('web')
							value="{{ auth()->user()->customer->address_one }}"
						@endauth
						@guest('web')
						value="{{old('address_one')}}"
						@endguest
							
							
							placeholder="Address One" id="input-address-18" class="form-control">
                            @error('address_one')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-address-2"><b>Address Two</b></label>
                        <div class="col-sm-10">
							<input type="text" name="address_two"
							@auth('web')
							value="{{ auth()->user()->customer->address_two }}"
						@endauth
						@guest('web')
						value="{{old('address_two')}}"
						@endguest
							
							placeholder="Address Two" class="form-control">
                            @error('address_two')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-sm-2 control-label" for="input-city"><b>Country</b></label>
                        <div class="col-sm-10">
							<input type="text" name="country" 

							@auth('web')
							value="{{ auth()->user()->customer->country }}"
						@endauth
						@guest('web')
						value="{{old('country')}}"
						@endguest
							
							placeholder="country" id="input-countr5y" class="form-control">
                            @error('country')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-sm-2 control-label" for="input-city"><b>State</b></label>
                        <div class="col-sm-10">
							<input type="text" name="state" 
							@auth('web')
							value="{{ auth()->user()->customer->state }}"
						@endauth
						@guest('web')
						value="{{old('state')}}"
						@endguest
							
							placeholder="state" id="input-state" class="form-control">
                            @error('state')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-sm-2 control-label" for="input-city"><b>City</b></label>
                        <div class="col-sm-10">
							<input type="text" name="city" 
							@auth('web')
							value="{{ auth()->user()->customer->city }}"
						@endauth
						@guest('web')
						value="{{old('city')}}"
						@endguest
							
							
							placeholder="City" id="input-city" class="form-control">
                            @error('city')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-sm-2 control-label" for="input-postcode"><b>Post Code</b></label>
                        <div class="col-sm-10">
							<input type="text" name="post_code" 
							@auth('web')
							value="{{ auth()->user()->customer->post_code }}"
						@endauth
						@guest('web')
						value="{{old('post_code')}}"
						@endguest
							
							placeholder="Post Code" id="input-postcode" class="form-control">
                            @error('post_code')
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
                        <input type="submit" value="Get A Quote" class="btn btn-primary">
                    </div>
                </div>
			</form>
			<br><br><br>
        </div>
    </div>
</div>

	
@endsection


@push('script')
<script src="{{asset('frontend/summernote/summernote.min.js')}}"></script>


<script>

$('.summernoteEditor').summernote({
				height: 400,
				tabsize: 2
			});


            


function checkQuoteType(val){
    // quoteForProduct quoteForService
    if(val == 1){
        document.getElementById("quoteForProduct").style.display = 'flex';
        document.getElementById("quoteForService").style.display = 'none';
    }else if(val == 2){
        document.getElementById("quoteForProduct").style.display = 'none';
        document.getElementById("quoteForService").style.display = 'flex';
    }
}
</script>
  
@endpush