@extends('layouts.app')


@push('style')
    
@endpush

@section('title')
Lost Password
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
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Lost Password</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="mb-4">
            <h1 class="text-center">Lost Password</h1>
        </div>
        <div class="my-4 my-xl-8">
            <div class="row justify-content-center">
                 
                <div class="col-md-6  mr-xl-0 mb-8 mb-md-0">
                    @include('layouts.partials.flash-message')
                    <div class="border-bottom border-color-1 mb-6">
                        <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Lost Password</h3>
                    </div>
                  
                    <!-- End Title -->
                    <form action="{{route('customer.forget.password')}}" method="POST" class="js-validate" novalidate="novalidate">
                        @csrf
                        <div class="js-form-message form-group">
                            <label class="form-label" for="signinSrEmailExample3">Email address
                                <span class="text-danger">*</span>
                            </label>
                            <input type="email" class="form-control" name="email" id="signinSrEmailExample3" placeholder=" Email address" aria-label=" Email address" required
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

                        

                        <!-- Button -->
                        <div class="mb-1">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary-dark-w px-5 text-white">Send Mail</button>
                            </div>
                            <div class="mb-2">
                                <a class="text-blue" href="{{route('login')}}">Go to Login </a>
                            </div>
                        </div>
                        <!-- End Button -->
                    </form>
                </div>
           
             
            </div>
        </div>
    </div>
</main>
	
@endsection


@push('script')
    
@endpush