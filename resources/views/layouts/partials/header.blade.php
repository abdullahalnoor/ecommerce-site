<header id="header" class="u-header u-header-left-aligned-nav">
    <div class="u-header__section">
        <!-- Topbar -->
        <div class="u-header-topbar py-2 d-none d-xl-block">
            <div class="container">
                <div class="d-flex align-items-center">
                    <div class="topbar-left">
                        <a href="{{route('frontend.home')}}" class="text-gray-110 font-size-13 u-header-topbar__nav-link">Welcome to {{$site_settings['site_name']}}</a>
                    </div>
                    <div class="topbar-right ml-auto">
                        <ul class="list-inline mb-0">
                            @guest('web')
                            <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                              
                                <a id="sidebarNavToggler" href="{{route('login')}}" role="button" class="u-header-topbar__nav-link"
                                
                                >
                                <i class="ec ec-user mr-1"></i> Register <span class="text-gray-50">or</span> Sign in
                            </a>
                               
                            </li>

                            @endguest
                            @auth('web')
                            <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">          
                               
                                 <a href="{{route('customer.home')}}">   {{ auth()->user()->email }}</a>
                              
                            </li>

                            <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                            
                                <a  href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
                         </a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @csrf
                         </form>
                            
                            
                            </li>


                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->

        <!-- Logo-Search-header-icons -->
        <div class="py-2  bg-primary-down-lg">
            <div class="container my-0dot5 my-xl-0">
                <div class="row align-items-center">
                    <!-- Logo-offcanvas-menu -->
                    <div class="col-auto">
                        <!-- Nav -->
                        <nav class="navbar navbar-expand u-header__navbar py-0 justify-content-xl-between max-width-270 min-width-270">
                            <!-- Logo -->
                            <a class="order-1 order-xl-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-center" href="{{route('frontend.home')}}" aria-label="Electro">
                                <img src="{{asset('frontend/images/logo.png')}}" alt="">
                            </a>
                            <!-- End Logo -->

                            <!-- Fullscreen Toggle Button -->
                            <button id="sidebarHeaderInvokerMenu" type="button" class="navbar-toggler d-block btn u-hamburger mr-3 mr-xl-0"
                                aria-controls="sidebarHeader"
                                aria-haspopup="true"
                                aria-expanded="false"
                                data-unfold-event="click"
                                data-unfold-hide-on-scroll="false"
                                data-unfold-target="#sidebarHeader1"
                                data-unfold-type="css-animation"
                                data-unfold-animation-in="fadeInLeft"
                                data-unfold-animation-out="fadeOutLeft"
                                data-unfold-duration="500">
                                <span id="hamburgerTriggerMenu" class="u-hamburger__box">
                                    <span class="u-hamburger__inner"></span>
                                </span>
                            </button>
                            <!-- End Fullscreen Toggle Button -->
                        </nav>
                        <!-- End Nav -->

                        <!-- ========== HEADER SIDEBAR ========== -->
                        <aside id="sidebarHeader1" class="u-sidebar u-sidebar--left" aria-labelledby="sidebarHeaderInvokerMenu">
                            <div class="u-sidebar__scroller">
                                <div class="u-sidebar__container">
                                    <div class="u-header-sidebar__footer-offset pb-0">
                                        <!-- Toggle Button -->
                                        <div class="position-absolute top-0 right-0 z-index-2 pt-4 pr-7">
                                            <button type="button" class="close ml-auto"
                                                aria-controls="sidebarHeader"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                                data-unfold-event="click"
                                                data-unfold-hide-on-scroll="false"
                                                data-unfold-target="#sidebarHeader1"
                                                data-unfold-type="css-animation"
                                                data-unfold-animation-in="fadeInLeft"
                                                data-unfold-animation-out="fadeOutLeft"
                                                data-unfold-duration="500">
                                                <span aria-hidden="true"><i class="ec ec-close-remove text-gray-90 font-size-20"></i></span>
                                            </button>
                                        </div>
                                        <!-- End Toggle Button -->

                                        <!-- Content -->
                                        <div class="js-scrollbar u-sidebar__body">
                                            <div id="headerSidebarContent" class="u-sidebar__content u-header-sidebar__content">
                                                <!-- Logo -->
                                                <a class="d-flex ml-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-vertical" href="{{route('frontend.home')}}" aria-label="Electro">
                                                    <img src="{{asset('frontend/images/logo.png')}}" alt="Logo">
                                                </a>
                                                <!-- End Logo -->

                                                <!-- List -->
                                                <ul id="headerSidebarList" class="nav-list">
                                                    <li class="">
                                                        <a class=" " href="{{route('frontend.home')}}" >Home</a>
                                                     </li>
                                                  
                                                    @foreach ($shareable_data['categories'] as $key =>  $parentCategory)
                                                 
                                                    <li >
                                                        <a class=" @if ($parentCategory->count() > 0)
                                                            u-header-collapse__nav-pointer
                                                        @endif " 
                                                        @if ($parentCategory->count() > 0)
                                                        href="javascript:;"  role="button"
                                                            @endif
                                                        href="javascript:;"  role="button" >
                                                           {{$parentCategory->name}}
                                                        </a>
                                                        <ul class="sub-menu">
                                                            @foreach ($parentCategory->activeChildrens as $key =>  $childCategory)
                                                            <li class="">
                                                                <a class=" @if ($childCategory->activeChildrens->count() > 0)
                                                                    u-header-collapse__nav-pointer
                                                                @endif"
                                                                @if ($childCategory->activeChildrens->count() > 0)
                                                                href="javascript:;"   role="button"
                                                                @else
                                                                href="{{route('frontend.category',$childCategory->id)}}" 
                                                                @endif
                                                                 >
                                                                   {{$childCategory->name}}
                                                                </a>

                                                                <ul class="sub-menu">
                                                                    @foreach ($childCategory->activeChildrens as $key =>  $subChildCategory)
                                                                    <li class="">
                                                                        <a 
                                                                        class="" href="{{route('frontend.category',$subChildCategory->id)}}" 
                                                                         >
                                                                           {{$subChildCategory->name}}
                                                                        </a>
                                                                    </li>    
                                                                    @endforeach
                                                                </ul>
                                                            </li>    
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                   
                                                    @endforeach

                                                    <li><a href="{{route('frontend.offer')}}">Offer</a></li>
                                                    <li><a href="{{route('frontend.membership')}}">Membership </a></li>
                                                    <li><a href="{{route('frontend.surprise-card')}}">Surprise card</a></li>
                                                    <li><a href="{{route('frontend.contact')}}">Contact</a></li>


                                                    @guest('web')
                                                    <li >
                                                       <a href="{{route('login')}}"  >
                                                         Register 
                                                    </a>
                                                       
                                                    </li>
                                                    <li >
                                                        <a href="{{route('login')}}"  >
                                                          Sing In 
                                                     </a>
                                                        
                                                     </li>
                                                    @endguest

                                                    @auth('web')
                                                    <li >          
                                                       
                                                         <a href="{{route('customer.home')}}">   {{ auth()->user()->email }}</a>
                                                      
                                                    </li>
                        
                                                    <li >
                                                    
                                                        <a  href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                  document.getElementById('logout-form').submit();">
                                                     {{ __('Logout') }}
                                                 </a>
                        
                                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                     @csrf
                                                 </form>
                                                    
                                                    
                                                    </li>
                        
                        
                                                    @endauth

                                                </ul>
                                                <!-- End List -->
                                            </div>
                                        </div>
                                        <!-- End Content -->
                                    </div>
                                </div>
                            </div>
                        </aside>
                        <!-- ========== END HEADER SIDEBAR ========== -->
                    </div>
                    <!-- End Logo-offcanvas-menu -->
                    <!-- Search Bar -->
                    {{-- <div class="col d-none d-xl-block">
                        <form class="js-focus-state">
                            <label class="sr-only" for="searchproduct">Search</label>
                            <div class="input-group">
                                <input type="email" class="form-control py-2 pl-5 font-size-15 border-right-0 height-40 border-width-2 rounded-left-pill border-primary" name="email" id="searchproduct-item" placeholder="Search for Products" aria-label="Search for Products" aria-describedby="searchProduct1" required>
                                <div class="input-group-append">
                                    <!-- Select -->
                                    <select class="js-select selectpicker dropdown-select custom-search-categories-select"
                                        data-style="btn height-40 text-gray-60 font-weight-normal border-top border-bottom border-left-0 rounded-0 border-primary border-width-2 pl-0 pr-5 py-2">
                                        <option value="one" selected>All Categories</option>
                                        <option value="two">Two</option>
                                        <option value="three">Three</option>
                                        <option value="four">Four</option>
                                    </select>
                                    <!-- End Select -->
                                    <button class="btn btn-primary height-40 py-2 px-3 rounded-right-pill" type="button" id="searchProduct1">
                                        <span class="ec ec-search font-size-24"></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div> --}}
                    <div class="col d-none d-xl-block">
                        <form class="js-focus-state"  method="POST" action="{{route('frontend.product.serach')}}">
                            @csrf
                            <label class="sr-only" for="searchproduct">Search</label>
                            <div class="input-group">
                                <input type="text" class="form-control py-2 pl-5 font-size-15 border-right-0 height-40 border-width-2 rounded-left-pill border-primary" name="serach_input" id="searchproduct-item" placeholder="Search for Products" aria-label="Search for Products" aria-describedby="searchProduct1" >
                                <div class="input-group-append">
                                    <!-- Select -->
                                    <select name="category_id" class="js-select selectpicker dropdown-select custom-search-categories-select"
                                        data-style="btn height-40 text-gray-60 font-weight-normal border-top border-bottom border-left-0 rounded-0 border-primary border-width-2 pl-0 pr-5 py-2">
                                        <option value="" selected>All Categories</option>
                                        @foreach ($shareable_data['categories'] as $parentCategory)
                                        <option value="{{$parentCategory->id}}">
                                            <b>&rarr; {{$parentCategory->name}}	</b>
                                            
                                        </option>
                                            @foreach ($parentCategory->activeChildrens as $childCategory)
                                            
                                            <option value="{{$childCategory->id}}">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                
                                                <b>&#8628;</b>
                                                {{$childCategory->name}}</option>

                                                @foreach ($childCategory->activeChildrens as $lastChildCategory)
                                            
                                                <option value="{{$lastChildCategory->id}}">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <b>&rarr;</b>
                                                    {{$lastChildCategory->name}}</option>
                                                @endforeach
                                            @endforeach
                                        
                                        @endforeach
                                    </select>
                                    <!-- End Select -->
                                    <button class="btn btn-primary height-40 py-2 px-3 rounded-right-pill" style="margin-left:-7px;" type="submit" id="searchProduct1">
                                        <span class="ec ec-search font-size-24"></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- End Search Bar -->
                    <!-- Header Icons -->
                    <div class="col col-xl-auto text-right text-xl-left pl-0 pl-xl-3 position-static">
                        <div class="d-inline-flex">
                            <ul class="d-flex list-unstyled mb-0 align-items-center">
                                <!-- Search -->
                                <li class="col d-xl-none px-2 px-sm-3 position-static">
                                    <a id="searchClassicInvoker" class="font-size-22 text-gray-90 text-lh-1 btn-text-secondary" href="javascript:;" role="button"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="Search"
                                        aria-controls="searchClassic"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                        data-unfold-target="#searchClassic"
                                        data-unfold-type="css-animation"
                                        data-unfold-duration="300"
                                        data-unfold-delay="300"
                                        data-unfold-hide-on-scroll="true"
                                        data-unfold-animation-in="slideInUp"
                                        data-unfold-animation-out="fadeOut">
                                        <span class="ec ec-search"></span>
                                    </a>

                                    <!-- Input -->
                                    <div id="searchClassic" class="dropdown-menu dropdown-unfold dropdown-menu-right left-0 mx-2" aria-labelledby="searchClassicInvoker">
                                        <form class="js-focus-state input-group px-3">
                                            <input class="form-control" type="search" placeholder="Search Product">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary px-3" type="button"><i class="font-size-18 ec ec-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- End Input -->
                                </li>
                                <!-- End Search -->
                                <li class="col pr-xl-0 px-2 px-sm-3">
                                    <a href="{{route('frontend.cart')}}" class="text-gray-90 position-relative d-flex " data-toggle="tooltip" data-placement="top" title="Cart">
                                        <i class="font-size-22 ec ec-shopping-bag"></i>
                                        <span class="bg-lg-down-black width-22 height-22 bg-primary position-absolute d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12 text-white noorCartTotalQuantity">{{ Cart::getTotalQuantity()}}</span>
                                        <span class="d-none d-xl-block font-weight-bold font-size-16 text-gray-90 ml-3" >Tk.<span class="noorCartTotal">{{ number_format(Cart::getTotal()) }}</span></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Header Icons -->
                </div>
            </div>
        </div>
        <!-- End Logo-Search-header-icons -->

        <!-- Primary-menu-wide -->
        <div class="d-none d-xl-block bg-primary" style="background-image: linear-gradient(to right, #86259C, #CE388B)">
            <div class="container">
                <div class="min-height-45">
                    <!-- Nav -->
                    <nav class="noor-nav_menu">
                        <ul class="noor-nav_list">
                          <li><a href="{{route('frontend.home')}}">Home</a></li>

                        
                          @foreach ($shareable_data['categories'] as $key =>  $parentCategory)
                          <li><a href="{{route('frontend.category',$parentCategory->id)}}">
                            {{$parentCategory->name}}  </a>
                          @if ($parentCategory->activeChildrens->count() > 0)
                          <ul class="noor-sub_menu">
                            @foreach ($parentCategory->activeChildrens as $childItem)
                            
                            <li><a href="{{route('frontend.category',$childItem->id)}}">
                                {{$childItem->name}}
                                </a>
                                @if ($childItem->activeChildrens->count() > 0)
                                <ul class="noor-sub_menu">
                                    @foreach ($childItem->activeChildrens as $subChildItem)
                                        <li><a href="{{route('frontend.category',$subChildItem->id)}}" >
                                            {{$subChildItem->name}}
                                        </a>
                                    </li>
                                        @endforeach
                                  </ul>
                                @endif
                              
                            </li>
                            @endforeach
                           
                          </ul>
                          @endif
                          
                          
                          </li>
                          @endforeach

                          <li><a href="{{route('frontend.offer')}}">Offer</a></li>
                           <li><a href="{{route('frontend.membership')}}">Membership </a></li>
                          <li><a href="{{route('frontend.surprise-card')}}">Surprise card</a></li>
                          <li><a href="{{route('frontend.contact')}}">Contact</a></li>
                         
                        </ul>
                      </nav>
                    <!-- End Nav -->
                </div>
            </div>
        </div>
        <!-- End Primary-menu-wide -->
    </div>
</header>