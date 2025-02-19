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
            <h1 class="text-center">My Account</h1>
        </div>
        <div class="my-4 my-xl-8">
            <div class="row">
                <div class="col-md-5 ml-xl-auto mr-md-auto mr-xl-0 mb-8 mb-md-0">
                    <!-- Title -->
                    <div class="border-bottom border-color-1 mb-6">
                        <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Login</h3>
                    </div>
                    <p class="text-gray-90 mb-4">Welcome back! Sign in to your account.</p>
                    <!-- End Title -->
                    <form action="{{route('login')}}" method="POST" class="js-validate" novalidate="novalidate">
                        @csrf
                        <div class="js-form-message form-group">
                            <label class="form-label" for="signinSrEmailExample3">Email address
                                <span class="text-danger">*</span>
                            </label>
                            <input type="email" class="form-control" name="email" id="signinSrEmailExample3" placeholder="Username or Email address" aria-label="Username or Email address" required
                            data-msg="Please enter a valid email address."
                            data-error-class="u-has-error"
                            data-success-class="u-has-success">
                            @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div class="js-form-message form-group">
                            <label class="form-label" for="">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password" id="" placeholder="Password" aria-label="Password" required
                            data-msg="Your password is invalid. Please try again."
                            data-error-class="u-has-error"
                            data-success-class="u-has-success">
                        </div>
                        <!-- End Form Group -->

                        <!-- Checkbox -->
                        <div class="js-form-message mb-3">
                            <div class="custom-control custom-checkbox d-flex align-items-center">
                                <input type="checkbox" class="custom-control-input" id="rememberCheckbox" name="rememberCheckbox" 
                                data-error-class="u-has-error"
                                data-success-class="u-has-success">
                                <label class="custom-control-label form-label" for="rememberCheckbox">
                                    Remember me
                                </label>
                            </div>
                        </div>
                        <!-- End Checkbox -->

                        <!-- Button -->
                        <div class="mb-1">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary-dark-w px-5 text-white">Login</button>
                            </div>
                            <div class="mb-2">
                                <a class="text-blue" href="{{route('customer.forget.password')}}">Lost your password?</a>
                            </div>
                        </div>
                        <!-- End Button -->
                    </form>
                </div>
                <div class="col-md-1 d-none d-md-block">
                    <div class="flex-content-center h-100">
                        <div class="width-1 bg-1 h-100"></div>
                        <div class="width-50 height-50 border border-color-1 rounded-circle flex-content-center font-italic bg-white position-absolute">or</div>
                    </div>
                </div>
                <div class="col-md-5 ml-md-auto ml-xl-0 mr-xl-auto">
                    <!-- Title -->
                    <div class="border-bottom border-color-1 mb-6">
                        <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26 ">Register</h3>
                    </div>
                    {{-- <p class="text-gray-90 mb-4">Create new account today to reap the benefits of a personalized shopping experience.</p> --}}
                    <!-- End Title -->
                    <!-- Form Group -->
                    <form action="{{route('register')}}" method="POST" class="js-validate" novalidate="novalidate">
                        @csrf
                        
                        <div class="js-form-message form-group mb-5">
                            <label class="form-label" for="RegisterSrEmailExample3">Email address
                                <span class="text-danger">*</span>
                            </label>
                            <input type="email" class="form-control" name="email" id="RegisterSrEmailExample3" placeholder="Email address" aria-label="Email address" required
                            data-msg="Please enter a valid email address."
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
                            <input type="password" class="form-control" name="password" id="" placeholder="Password" aria-label="Password" required
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
                                <button type="submit" class="btn btn-primary-dark-w px-5 text-white">Register</button>
                            </div>
                        </div>
                        <!-- End Button -->
                    </form>
                    {{-- <h3 class="font-size-18 mb-3">Sign up today and you will be able to :</h3>
                    <ul class="list-group list-group-borderless">
                        <li class="list-group-item px-0"><i class="fas fa-check mr-2 text-green font-size-16"></i> Speed your way through checkout</li>
                        <li class="list-group-item px-0"><i class="fas fa-check mr-2 text-green font-size-16"></i> Track your orders easily</li>
                        <li class="list-group-item px-0"><i class="fas fa-check mr-2 text-green font-size-16"></i> Keep a record of all your purchases</li>
                    </ul> --}}
                </div>
            </div>
        </div>
    </div>
</main>
	
@endsection


@push('script')
    
@endpush