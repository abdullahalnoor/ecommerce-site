<footer class="">
    <!-- Footer-top-widget -->
    
    <!-- End Footer-top-widget -->
    <!-- Footer-newsletter -->
    <div class="bg-primary py-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-md-3 mb-lg-0">
                    <div class="row align-items-center">
                        <div class="col-auto flex-horizontal-center">
                            <i class="ec ec-newsletter font-size-40 text-white"></i>
                            <h2 class="font-size-20 mb-0 ml-3 text-white">Sign up to Newsletter</h2>
                        </div>
                        <div class="col my-4 my-md-0">
                            {{-- <h5 class="font-size-15 ml-4 mb-0 text-white">...and receive <strong>$20 coupon for first shopping.</strong></h5> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <!-- Subscribe Form -->
                    <form class="js-validate js-form-message">
                        <label class="sr-only" for="subscribeSrEmail">Email address</label>
                        <div class="input-group input-group-pill">
                            <input type="email" class="form-control border-0 height-40" name="email" id="subscribeSrEmail" placeholder="Email address" aria-label="Email address" aria-describedby="subscribeButton" 
                           >
                           {{-- data-msg="Please enter a valid email address." --}}
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-dark btn-sm-wide height-40 py-2" id="">Subscribe </button>
                            </div>
                        </div>
                    </form>
                    <!-- End Subscribe Form -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer-newsletter -->
    <!-- Footer-bottom-widgets -->
    <div class="pt-8 pb-4 " style="background: #000;color:white">
        <div class="container mt-1">
            <div class="row">
                <div class="col-lg-3">
                    {{-- <div class="mb-6">
                        <a href="{{route('frontend.home')}}" class="d-inline-block">
                            <img style="" src="{{asset('frontend/')}}/images/koolcont.png" alt="">
                        </a>
                    </div> --}}
                    <div class="mb-4">
                        <div class="row no-gutters">
                            <div class="col-auto">
                                <i class="ec ec-support text-primary font-size-36"></i>
                            </div>
                            <div class="col pl-3">
                                <div class="font-size-13 font-weight-light"> Call us 10 am - 8 pm !</div>
                                <a href="tel:{{$site_settings['site_phone']}}" class="font-size-20 text-white">	{{$site_settings['site_phone']}} </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="my-4 my-md-4">
                        <ul class="list-inline mb-0 opacity-7">
                            <li class="list-inline-item mr-0">
                                <a class="btn font-size-20 btn-icon btn-soft-dark  rounded-circle text-white" target="_blank" href="https://www.facebook.com/bondbd.bond">
                                    <span class="fab fa-facebook-f btn-icon__inner"></span>
                                </a>
                            </li>
                            <li class="list-inline-item mr-0">
                                <a class="btn font-size-20 btn-icon btn-soft-dark  rounded-circle text-white" href="#">
                                    <span class="fab fa-google btn-icon__inner"></span>
                                </a>
                            </li>
                            {{-- <li class="list-inline-item mr-0">
                                <a class="btn font-size-20 btn-icon btn-soft-dark  rounded-circle text-white" href="#">
                                    <span class="fab fa-twitter btn-icon__inner"></span>
                                </a>
                            </li>
                            <li class="list-inline-item mr-0">
                                <a class="btn font-size-20 btn-icon btn-soft-dark  rounded-circle text-white" href="https://www.facebook.com/bondbd.bond/" target="_blank" >
                                    <span class="fab fa-instagram btn-icon__inner"></span>
                                </a>
                            </li> --}}
                            <li class="list-inline-item mr-0">
                                <a class="btn font-size-20 btn-icon btn-soft-dark  rounded-circle text-white" href="https://www.youtube.com/channel/UCuCzELTRJFgKy9YuJz72m7w" target="_blank" >
                                    <span class="fab fa-youtube btn-icon__inner"></span>
                                </a>
                            </li>
                            

                            

                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row ">
                       
                        <div class="col-12 col-md mb-4 mb-md-0">
                            <h6 class="mb-3 font-weight-bold">Information</h6>
                            <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent ">
                                <li><a class="list-group-item list-group-item-action" href="{{route('frontend.home')}}">Home</a></li>

                                <li><a class="list-group-item list-group-item-action" href="{{route('frontend.contact')}}">Contact</a></li>
                                <li><a class="list-group-item list-group-item-action" href="{{route('frontend.terms-conditions')}}">Terms & Condition</a></li>
                                <li><a class="list-group-item list-group-item-action" href="{{route('frontend.privacy-policy')}}">Privacy Policy</a></li>
                            </ul>
                            <!-- End List Group -->
                        </div>

                        <div class="col-12 col-md mb-4 mb-md-0">
                            <h6 class="mb-3 font-weight-bold">Account</h6>
                            <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent ">
                                <li><a class="list-group-item list-group-item-action" href="{{route('login')}}">Register</a></li>
                                <li><a class="list-group-item list-group-item-action" href="{{route('login')}}">Login</a></li>
                                <li><a class="list-group-item list-group-item-action" href="{{route('frontend.cart')}}">Cart</a></li>
                            </ul>
                            <!-- End List Group -->
                        </div>

                        <div class="col-12 col-md mb-4 mb-md-0 ">
                            <div class="mb-4">
                                <h6 class="mb-1 font-weight-bold ">Contact info</h6>
                                <address class="">
                                    {{$site_settings['site_address']}} 
                                </address>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer-bottom-widgets -->
    <!-- Footer-copy-right -->
    <div class="bg-gray-14 py-2">
        <div class="container">
            <div class="flex-center-between d-block d-md-flex">
                <div class="mb-3 mb-md-0"> Copyright © {{date('Y')}} <a href="{{route('frontend.home')}}" class="font-weight-bold text-gray-90"> {{$site_settings['site_name']}} </a> - All rights Reserved
                  
                </div>
                <div class="mb-3 mb-md-0"><a href="http://phoenixsoftbd.com/" target="_blank" class="font-weight-bold text-gray-90"> Developed and Maintain By Phoenix Software </a> 
                  
                </div>
                {{-- <div class="text-md-right">
                    <span class="d-inline-block bg-white border rounded p-1">
                        <img class="max-width-5" src="{{asset('frontend/')}}/img/100X60/img1.jpg" alt="Image Description">
                    </span>
                    <span class="d-inline-block bg-white border rounded p-1">
                        <img class="max-width-5" src="{{asset('frontend/')}}/img/100X60/img2.jpg" alt="Image Description">
                    </span>
                    <span class="d-inline-block bg-white border rounded p-1">
                        <img class="max-width-5" src="{{asset('frontend/')}}/img/100X60/img3.jpg" alt="Image Description">
                    </span>
                    <span class="d-inline-block bg-white border rounded p-1">
                        <img class="max-width-5" src="{{asset('frontend/')}}/img/100X60/img4.jpg" alt="Image Description">
                    </span>
                    <span class="d-inline-block bg-white border rounded p-1">
                        <img class="max-width-5" src="{{asset('frontend/')}}/img/100X60/img5.jpg" alt="Image Description">
                    </span>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- End Footer-copy-right -->
</footer>