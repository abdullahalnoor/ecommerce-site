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
                           
                            {{-- <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                <a href="../shop/track-your-order.html" class="u-header-topbar__nav-link"><i class="ec ec-transport mr-1"></i> Track Your Order</a>
                            </li> --}}
                          
                            @guest('web')
                            <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                <!-- Account Sidebar Toggle Button -->
                                


                               
                                <a id="sidebarNavToggler" href="{{route('login')}}" role="button" class="u-header-topbar__nav-link"
                                {{-- aria-controls="sidebarContent"
                                aria-haspopup="true"
                                aria-expanded="false"
                                data-unfold-event="click"
                                data-unfold-hide-on-scroll="false"
                                data-unfold-target="#sidebarContent"
                                data-unfold-type="css-animation"
                                data-unfold-animation-in="fadeInRight"
                                data-unfold-animation-out="fadeOutRight"
                                data-unfold-duration="500" --}}
                                >
                                <i class="ec ec-user mr-1"></i> Register <span class="text-gray-50">or</span> Sign in
                            </a>
                               
                                <!-- End Account Sidebar Toggle Button -->
                            </li>

                            @endguest
                            @auth('web')
                            <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                             
                               
                                    {{ auth()->user()->email }}
                              
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
        <div class="py-2 py-xl-1 bg-primary-down-lg">
            <div class="container my-0dot5 my-xl-0">
                <div class="row align-items-center">
                    <!-- Logo-offcanvas-menu -->
                    <div class="col-auto">
                        <!-- Nav -->
                        <nav class="navbar navbar-expand u-header__navbar py-0 justify-content-xl-between max-width-270 min-width-270">
                            <!-- Logo -->
                            <a class="order-1 order-xl-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-center" href="{{route('frontend.home')}}" aria-label="Electro">
                               <img src="{{asset('frontend/')}}/images/koolcont.png" alt="">
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
                                                    <img src="{{asset('frontend/')}}/images/koolcont.png" alt="">
                                                </a>
                                                <!-- End Logo -->

                                                <!-- List -->
                                                <ul id="headerSidebarList" class="u-header-collapse__nav">
                                                   
                                                  

                                                    <li class="nav-item u-header__nav-item">
                                                        <a class="nav-link u-header__nav-link" href="{{route('frontend.home')}}" aria-haspopup="true" aria-expanded="false" aria-labelledby="blogSubMenu">Home</a>
                                                    </li>

                                                    <!-- Shop Pages -->
                                                    @foreach ($shareable_data['categories'] as $key =>  $parentCategory)
                                                    <li class="u-has-submenu u-header-collapse__submenu">
                                                        <a class="u-header-collapse__nav-link
                                                        @if (count($parentCategory->childrens) > 0)
                                                         u-header-collapse__nav-pointer
                                                         @endif
                                                         " href="{{route('frontend.category',$parentCategory->id)}}" data-target="#headerSidebarPagesCollapse_{{$key}}" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="headerSidebarPagesCollapse">
                                                            {{$parentCategory->name}}
                                                        </a>
                                                        @if (count($parentCategory->childrens) > 0)

                                                        <div id="headerSidebarPagesCollapse_{{$key}}" class="collapse" data-parent="#headerSidebarContent">
                                                            <ul id="headerSidebarPagesMenu" class="u-header-collapse__nav-list">
                                                                @foreach ($parentCategory->childrens as $childCategory)
                                                    <li><a class="u-header-collapse__submenu-nav-link" href="{{route('frontend.category',$childCategory->id)}}">{{$childCategory->name}}</a></li>
                                                   
                                                    @endforeach
                                                               
                                                            </ul>
                                                        </div>
                                                        @endif
                                                    </li>

                                                   
                                                    @endforeach


                                                  

                                                    
                                               
                                                    <li class="u-has-submenu u-header-collapse__submenu">
                                                        <a class="u-header-collapse__nav-link " href="javascript:;" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="headerSidebarHomeCollapse" data-target="#headerSidebarHomeCollapse">
                                                            About
                                                        </a>
                                                    </li>
                                                    <li class="u-has-submenu u-header-collapse__submenu">
                                                        <a class="u-header-collapse__nav-link " href="javascript:;" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="headerSidebarHomeCollapse" data-target="#headerSidebarHomeCollapse">
                                                            Contact
                                                        </a>
                                                    </li>

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
                                            @foreach ($parentCategory->childrens as $childCategory)
                                            
                                            <option value="{{$childCategory->id}}">
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <b>&#8628;</b>
                                                {{$childCategory->name}}</option>
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
                                {{-- {{-- <li class="col d-none d-xl-block"><a href="../shop/compare.html" class="text-gray-90" data-toggle="tooltip" data-placement="top" title="Compare"><i class="font-size-22 ec ec-compare"></i></a></li> --}}
                                <li class="col d-none d-xl-block"><a href="tel:{{$site_settings['site_phone']}}" class="text-gray-90" data-toggle="tooltip" data-placement="top" title="Call Now.">
                                            <span class="text-primary">Call us 24/7</span>
                                    	{{$site_settings['site_phone']}} 
                                
                                </a></li> 
                                <li class="col d-xl-none px-2 px-sm-3"><a href="../shop/my-account.html" class="text-gray-90" data-toggle="tooltip" data-placement="top" title="My Account"><i class="font-size-22 ec ec-user"></i>
                                
                                </a></li>
                                <li class="col pr-xl-0 px-2 px-sm-3">
                                    <a href="{{route('frontend.cart')}}" class="text-primary-darken-5 position-relative d-flex " data-toggle="tooltip" data-placement="top" title="Cart">
                                        <i class="font-size-22 ec ec-shopping-bag"></i>

                                        
                                        <span class="bg-lg-down-black width-22 height-22 bg-primary position-absolute d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12 text-white noorCartTotalQuantity">{{ Cart::getTotalQuantity()}}</span>
                                        <span class="d-none d-xl-block font-weight-bold  font-size-16 text-gray-90 ml-3">Tk.<span class="noorCartTotal">{{Cart::getTotal() }}</span></span>
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
        <div class="d-none d-xl-block bg-primary">
            <div class="container">
                <div class="min-height-45">
                    <!-- Nav -->
                    <nav class="js-mega-menu navbar navbar-expand-md u-header__navbar u-header__navbar--wide u-header__navbar--no-space">
                        <!-- Navigation -->
                        <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
                            <ul class="navbar-nav u-header__navbar-nav">
                                <!-- Home -->
                                <li class="nav-item hs-has-mega-menu u-header__nav-item" >
                                    <a id="homeMegaMenu" class="nav-link u-header__nav-link " href="{{route('frontend.home')}}" >Home</a>
                                </li>
                              

                                



                                <li class="nav-item u-header__nav-item" >
                                    <a  class="nav-link u-header__nav-link " href="{{route('frontend.home')}}" >Gents</a>
                                </li>

                                <li class="nav-item u-header__nav-item" >
                                    <a  class="nav-link u-header__nav-link " href="{{route('frontend.home')}}" >Ladies</a>
                                </li>

                                <li class="nav-item u-header__nav-item" >
                                    <a  class="nav-link u-header__nav-link " href="{{route('frontend.home')}}" >Accessories</a>
                                </li>

                                <li class="nav-item u-header__nav-item" >
                                    <a  class="nav-link u-header__nav-link " href="{{route('frontend.home')}}" >Offer</a>
                                </li>

                                <li class="nav-item u-header__nav-item" >
                                    <a  class="nav-link u-header__nav-link " href="{{route('frontend.home')}}" >Membership</a>
                                </li>

                                <li class="nav-item u-header__nav-item" >
                                    <a  class="nav-link u-header__nav-link " href="{{route('frontend.home')}}" >Surprise Card</a>
                                </li>

                                <li class="nav-item u-header__nav-item" >
                                    <a  class="nav-link u-header__nav-link " href="{{route('frontend.home')}}" >Contact us</a>
                                </li>

                                
                            </ul>
                        </div>
                        <!-- End Navigation -->
                    </nav>
                    <!-- End Nav -->
                </div>
            </div>
        </div>
        <!-- End Primary-menu-wide -->
    </div>
</header>