@extends('layouts.app')




@section('title')
    Contact
@endsection

@push('style')
    <style>iframe {min-width:100%;min-height:400px;}</style>

@endpush


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
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->


    <div class="container">
        <div class="mb-5">
            <h1 class="text-center">Contact Us</h1>
        </div>
        <div class="row mb-10">
            <div class="col-lg-7 col-xl-6 mb-8 mb-lg-0">
                <div class="mr-xl-6">
                    <div class="border-bottom border-color-1 mb-5">
                        <h3 class="section-title mb-0 pb-2 font-size-25">Our Address</h3>
                    </div>
                    <address class="mb-6 text-lh-23">
                        {{$site_settings['site_address']}} 
                        <div class="">Call us 10 am - 8 pm : {{$site_settings['site_phone']}}</div>
                        {{-- <div class="">Email: <a class="text-blue text-decoration-on" href="mailto:contact@yourstore.com">info@electro.com</a></div> --}}
                    </address>
                    {{-- <h5 class="font-size-14 font-weight-bold mb-3">Opening Hours</h5>
                    <div class="">Saturday to Thursday: 10am-8pm</div>
                    --}}
                   
                </div>
            </div>
            <div class="col-lg-5 col-xl-6">
                <div class="mb-6">
                    <div class="mapouter" ><div   class="gmap_canvas"><iframe 
                         id="gmap_canvas"
                         src="https://maps.google.com/maps?q=BOND%20Clothing%20House%2092%20New%20Elephant%20Rd%2C%20Dhaka%201205&t=&z=13&ie=UTF8&iwloc=&output=embed" 

                          frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div><style>.mapouter{position:relative;text-align:right;}.gmap_canvas {overflow:hidden;background:none!important;}</style></div>
              </div>
             </div>
        </div>
      
    </div>
</main>
@endsection


@push('script')
    
@endpush