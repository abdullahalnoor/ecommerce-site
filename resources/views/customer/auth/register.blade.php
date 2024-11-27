@extends('layouts.app')


@push('style')
    
@endpush

@section('title')
    {{$pageTitle }}
@endsection


@section('content')

<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="{{route('frontend.home')}}"><i class="fa fa-home"></i></a></li>
        <li><a href="{{route('register')}}">Register</a></li>
    </ul>
    
    <div class="row">
        <div id="content" class="col-sm-12">
            <h2 class="title">Register Account</h2>
            <p>If you already have an account with us, please login at the <a href="{{route('login')}}">login </a>.</p>
            <form action="{{route('register')}}" method="post" enctype="multipart/form-data" class="form-horizontal account-register clearfix">
               @csrf
                <fieldset id="account">
                    <legend>Your Personal Details</legend>
                    
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-firstname"><b>First Name</b></label>
                        <div class="col-sm-10">
                        <input type="text" name="first_name" value="{{old('first_name')}}" placeholder="First Name" id="input-firstname" class="form-control">
                        @error('first_name')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                    </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-lastname"><b>Last Name</b></label>
                        <div class="col-sm-10">
                            <input type="text" name="last_name" value="{{old('last_name')}}" placeholder="Last Name" id="input-lastname" class="form-control">
                            @error('last_name')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    
                    <div class="form-group ">
                        <label class="col-sm-2 control-label" for="input-telephone"><b>Mobile  No</b></label>
                        <div class="col-sm-10">
                            <input type="tel" name="mobile" value="{{old('mobile')}}" placeholder="Mobile No" id="input-telephone1" class="form-control">
                            @error('mobile')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-sm-2 control-label" for="input-telephone"><b>Telephone</b></label>
                        <div class="col-sm-10">
                            <input type="tel" name="phone" value="{{old('phone')}}" placeholder="Telephone" id="input-telephone" class="form-control">
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
                            <input type="text" name="address_one" value="{{old('address_one')}}"  value="" placeholder="Address 1" id="input-address-1" class="form-control">
                            @error('address_one')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-address-2"><b>Address One</b></label>
                        <div class="col-sm-10">
                            <input type="text" name="address_two" value="{{old('address_two')}}" placeholder="Address 2" id="input-address-2" class="form-control">
                            @error('address_two')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-city"><b>Country</b></label>
                        <div class="col-sm-10">
                            <input type="text" name="country" value="{{old('country')}}" placeholder="country" id="input-country" class="form-control">
                            @error('country')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-city"><b>State</b></label>
                        <div class="col-sm-10">
                            <input type="text" name="state" value="{{old('state')}}" placeholder="state" id="input-state" class="form-control">
                            @error('state')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-city"><b>City</b></label>
                        <div class="col-sm-10">
                            <input type="text" name="city" value="{{old('city')}}" placeholder="City" id="input-city" class="form-control">
                            @error('city')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-postcode"><b>Post Code</b></label>
                        <div class="col-sm-10">
                            <input type="text" name="post_code" value="{{old('post_code')}}" placeholder="Post Code" id="input-postcode" class="form-control">
                            @error('post_code')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                   
                </fieldset>
                <fieldset>

                    <legend>Your Password</legend>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" value="{{old('email')}}" placeholder="E-Mail" id="input-email" class="form-control">
                       
                            @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-password">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control">
                            @error('password')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-confirm">Password Confirm</label>
                        <div class="col-sm-10">
                            <input type="password" name="password_confirmation" value="" placeholder="Password Confirm" id="input-confirm" class="form-control">
                            @error('password_confirmation')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                        </div>
                    </div>
                </fieldset>
                {{-- <fieldset>
                    <legend>Newsletter</legend>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Subscribe</label>
                        <div class="col-sm-10">
                            <label class="radio-inline">
                                <input type="radio" name="newsletter" value="1"> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="newsletter" value="0" checked="checked"> No
                            </label>
                        </div>
                    </div>
                </fieldset> --}}
                <div class="buttons">
                    <div class="pull-right">I have read and agree to the <a href="#" class="agree"><b>Terms & Privacey </b></a>
                        <input class="box-checkbox" type="checkbox" name="agree" value="1"> &nbsp;
                        <input type="submit" value="Register" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

	
@endsection


@push('script')
    
@endpush