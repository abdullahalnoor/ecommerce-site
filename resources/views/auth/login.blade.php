@extends('layouts.app')


@push('style')

@endpush

@section('title')
Cart
@endsection


@section('content')

<!--checkout-area start-->
<div class="checkout-area mt-15">
    <div class="container">
        <div class="row">
            {{-- <div class="col-lg-12">
				<p>Returning customer? <a href="#">Click here</a> to login</p>
			</div> --}}
        </div>
        <div class="row mt-10">
            <div class="col-lg-8 offset-md-2">
                <div class="billing-form">
                    <h4>
                        @if (Session::get('language') == 'bn')
                        প্রবেশ করুন
                        @else
                        Sign In
                        @endif


                    </h4>
                    <form action="{{route('login')}}" method="POST">

                        {{ csrf_field() }}

                      

                        <div class="row">
                            <div class="col-lg-3">
                                <label>EMAIL *</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="email" name="email" />
                            </div>
                        </div>

                      


                        <div class="row">
                            <div class="col-lg-3">
                                <label>PASSWORD *</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="password" name="password" required autocomplete="new-password">
                            </div>
                        </div>

                      


                       <div class="row">
                    
                        <div class="col-lg-9 offset-lg-3">
                            <button type="submit" class="btn-common width-180">Sign In</button>
                        </div>
                    </div>


                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!--checkout-area end-->


@endsection


@push('script')

@endpush