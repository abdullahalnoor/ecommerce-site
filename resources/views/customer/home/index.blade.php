@extends('layouts.app')




@section('title')
My Account
@endsection

@push('style')

<style>
  .status-label {
 color:#fff;
 display:inline-bolck;
 padding:5px;
 text-align: center;
  line-height:25px;
 min-width: 50px;
 font-weight: 500;
}
.status-label-success{
    background:rgb(0, 46, 0);
}
.status-label-info{
    background:rgb(67, 1, 248);
}
.status-label-danger{
    background:rgb(155, 2, 2);
}
.status-label-warning{
    background:rgb(58, 54, 1);
}
</style>
 

@endpush


@section('content')
<main id="content" role="main">
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
      
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{route('frontend.home')}}">Home</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">My Account </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="mb-5 text-center">
            <h1>My Account</h1>
           
        </div>

        @include('layouts.partials.flash-message')
      
        <div class="col mb-10">
           
            <div class="row">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="pills-account-tab" data-toggle="pill" href="#pills-account" role="tab" aria-controls="pills-account" aria-selected="true">Account</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="pills-order-tab" data-toggle="pill" href="#pills-order" role="tab" aria-controls="pills-order" aria-selected="false">My Orders</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="pills-tabContent" >
                    <div class="tab-pane fade show active" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab">
                        <div class="container" >
                          <form action="{{route('customer.change.password')}}" method="POST" class="js-validate" novalidate="novalidate">
                            @csrf
                            
                            <div class="js-form-message form-group mb-5">
                                <label class="form-label" for="RegisterSrEmailExample3">Current Password
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="password" name="current_password" class="form-control" name="email" id="RegisterSrEmailExample3" placeholder="Email Current Password" aria-label="Current Password" required
                                data-msg="Please enter a valid Current Password."
                                data-error-class="u-has-error"
                                data-success-class="u-has-success">
                                @error('email')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                           
                            </div>
                            <div class="js-form-message form-group">
                                <label class="form-label" for="">Password <span class="text-danger">*</span></label>
                                <input type="password"  class="form-control" name="password" id="" placeholder="Password" aria-label="Password" required
                                data-msg="Your password is invalid. Please try again."
                                data-error-class="u-has-error"
                                data-success-class="u-has-success">
                                @error('password')
                                <span class="text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                            </div>
    
                            <div class="js-form-message form-group">
                                <label class="form-label" for="">Re-Type Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password_confirmation" id="" placeholder="Password" aria-label="Password" required
                                data-msg="Your password is invalid. Please try again."
                                data-error-class="u-has-error"
                                data-success-class="u-has-success">
                            </div>
                            <!-- End Form Group -->
                            {{-- <p class="text-gray-90 mb-4">Your personal data will be used to support your experience throughout this website, to manage your account, and for other purposes described in our <a href="#" class="text-blue">privacy policy.</a></p> --}}
                            <!-- Button -->
                            <div class="mb-6">
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary-dark-w px-5 text-white">Update Password</button>
                                </div>
                            </div>
                            <!-- End Button -->
                        </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">


                      <div class="container" >
                        <form action="{{route('customer.update.profile')}}" method="POST" class="js-validate" novalidate="novalidate">
                          @csrf


                          <div class="form-group ">
                            <label class="col-sm-2 control-label" for="input-telephone"><b>First Name</b></label>
                            <div class="col-sm-12">
                              <input type="tel" name="first_name"
                            @auth('web')
                            value="{{old('first_name',auth()->user()->customer->first_name )}}"
                            @endauth
                           
                               placeholder="First Name " id="input-telephone1" class="form-control">
                              @error('first_name')
                              <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                            </div>
                          </div>
                         

                          <div class="form-group ">
                            <label class="col-sm-2 control-label" for="input-telephone"><b>Last Name</b></label>
                            <div class="col-sm-12">
                              <input type="tel" name="last_name"
                            @auth('web')
                            value="{{old('last_name',auth()->user()->customer->last_name )}}"
                            @endauth
                           
                               placeholder="Last Name " id="input-telephone1" class="form-control">
                              @error('last_name')
                              <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                            </div>
                          </div>
                            
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
                            
                  
                        
                  
                          <div class="mb-6">
                              <div class="mb-3">
                                  <button type="submit" class="btn btn-primary-dark-w px-5 text-white">Update </button>
                              </div>
                          </div>
                          <!-- End Button -->
                      </form>
                      </div>

                    </div>
                    <div class="tab-pane fade" id="pills-order" role="tabpanel" aria-labelledby="pills-order-tab">

                      <div class="container">
                        <table class="table" cellspacing="0">
                          <thead>
                              <tr>
                                  <th class="product-remove">Sl</th>
                                  <th class="product-remove">Order No</th>
                                  <th class="product-price">Date</th>
                                  <th class="product-price">Status</th>
                                  <th class="product-quantity w-lg-15">Total</th>
                                  <th class="product-subtotal">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                            @forelse ($orders as $key =>  $order)
                            <tr class="">
                              <td >
                                
                                    {{$key + 1}}
                              </td>

                              <td >
                                
                                <b>{!!  $order->order_no !!}</b>
                          </td>
                             

                              <td data-title="Product">
                                 {{$order->updated_at->diffForHumans()}}
                              </td>

                              <td data-title="Product">
                                {!!  $order->orderStatus() !!}
                             </td>

                              <td data-title="Price">
                                  <span class="">Tk.{{$order->total}}</span>
                              </td>

                             

                              <td data-title="Total" >
                                <a  href="{{route('customer.edit.order',$order->id)}}" class="btn-add-cart btn-primary transition-3d-hover"><i class="fa fa-eye text-danger"></i></a>
                              </td>
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
        
    </div>
</main>




@endsection


@push('script')
    
@endpush