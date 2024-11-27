@extends('layouts.app')


@push('style')
    
@endpush

@section('title')
    Reset Password
@endsection


@section('content')

<main id="content" role="main">
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{route('frontend.home')}}">Home</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page"> Reset Password</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="mb-4">
            <h1 class="text-center"> Reset Password</h1>
        </div>
        <div class="my-4 my-xl-8">
            <div class="row justify-content-center">
                 
                <div class="col-md-6  mr-xl-0 mb-8 mb-md-0">
                     @include('layouts.partials.flash-message')
                    <div class="border-bottom border-color-1 mb-6">
                        <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26"> Reset Password</h3>
                    </div>
                    <form action="{{route('customer.update.reset.password')}}"  method="POST" class="js-validate" novalidate="novalidate">
                        @csrf

                        <input type="hidden" value="{{$reset_key}}" name="reset_key">
                       
                        <div class="js-form-message form-group">
                            <label class="form-label" for="">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password" id="" placeholder="Password" aria-label="Password" required
                            data-msg="Your password is invalid. Please try again."
                            data-error-class="u-has-error"
                            data-success-class="u-has-success">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="js-form-message form-group">
                            <label class="form-label" for="">Re-Type Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password_confirmation" id="" placeholder="Re-Type Password" aria-label="Password" required
                            data-msg="Your password is invalid. Please try again."
                            data-error-class="u-has-error"
                            data-success-class="u-has-success">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                     
                       
                        <div class="mb-1">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary-dark-w px-5 text-white">Reset Password</button>
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