
        <div class="mb-6">
            <!-- Nav nav-pills -->
            <div class="position-relative text-center z-index-2">
                <div class="d-flex justify-content-between border-bottom border-color-1 flex-xl-nowrap flex-wrap border-md-down-top-0 border-lg-down-bottom-0 mb-3">
                    <h3 class="section-title mb-0 pb-2 font-size-22">Smartphones & Tablets</h3>

                    <ul class="w-100 w-xl-auto nav nav-pills nav-tab-pill mb-2 pt-3 pt-xl-0 mb-0 border-top border-color-1 border-xl-top-0 align-items-center font-size-15 font-size-15-lg flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble pr-0" id="pills-tab-8" role="tablist">
                       
                        @foreach ($categoryProducts as $key =>  $categoryProduct)
                        <li class="nav-item flex-shrink-0 flex-xl-shrink-1">
                            <a class="nav-link rounded-pill active" id="Kpills-one-{{$key}}-tab" data-toggle="pill" href="#Kpills-one-{{$key}}" role="tab" aria-controls="Kpills-one-{{$key}}" aria-selected="true">
                                {{$categoryProduct->name}}
                            </a>
                        </li>
                        @endforeach
                        {{-- <li class="nav-item flex-shrink-0 flex-xl-shrink-1">
                            <a class="nav-link rounded-pill" id="Kpills-two-example1-tab" data-toggle="pill" href="#Kpills-two-example1" role="tab" aria-controls="Kpills-two-example1" aria-selected="false">Accessories</a>
                        </li>
                        <li class="nav-item flex-shrink-0 flex-xl-shrink-1">
                            <a class="nav-link rounded-pill" id="Kpills-three-example1-tab" data-toggle="pill" href="#Kpills-three-example1" role="tab" aria-controls="Kpills-three-example1" aria-selected="false">All in One</a>
                        </li>
                        <li class="nav-item flex-shrink-0 flex-xl-shrink-1">
                            <a class="nav-link rounded-pill" id="Kpills-four-example1-tab" data-toggle="pill" href="#Kpills-four-example1" role="tab" aria-controls="Kpills-four-example1" aria-selected="false">Audio Speakers</a>
                        </li>
                        <li class="nav-item flex-shrink-0 flex-xl-shrink-1">
                            <a class="nav-link rounded-pill" id="Kpills-five-example1-tab" data-toggle="pill" href="#Kpills-five-example1" role="tab" aria-controls="Kpills-five-example1" aria-selected="false">Cameras</a>
                        </li> --}}
                    </ul>
                </div>
            </div>
            <!-- End Nav Pills -->
            <div class="row">
                <div class="col-auto">
                    <a href="../shop/shop.html" class="d-block"><img class="img-fluid" src="../../assets/img/200X276/img2.jpg" alt="Image Description"></a>
                </div>
                <div class="col pl-md-0">
                    <!-- Tab Content -->
                    <div class="tab-content pr-0dot5" id="Kpills-tabContent">
                        @foreach ($categoryProducts as $key =>  $categoryProduct)
                        <div class="tab-pane fade show active" id="Kpills-one-example1" role="tabpanel" aria-labelledby="Kpills-one-example1-tab">
                            <ul class="row list-unstyled products-group no-gutters">
                                @foreach ($categoryProduct->products as $key =>  $catProductItm)
                                <li class="col-6 col-md-4 col-xl product-item">
                                    <div class="product-item__outer h-100">
                                        <div class="product-item__inner px-xl-4 p-3">
                                            <div class="product-item__body pb-xl-2">
                                                <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                <h5 class="mb-1 product-item__title"><a href="../shop/single-product-fullwidth.html" class="text-blue font-weight-bold">Wireless Audio System Multiroom 360 degree Full base audio</a></h5>
                                                <div class="mb-2">
                                                    <a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img class="img-fluid" src="../../assets/img/212X200/img1.jpg" alt="Image Description"></a>
                                                </div>
                                                <div class="flex-center-between mb-1">
                                                    <div class="prodcut-price">
                                                        <div class="text-gray-100">$685,00</div>
                                                    </div>
                                                    <div class="d-none d-xl-block prodcut-add-cart">
                                                        <a href="../shop/single-product-fullwidth.html" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item__footer">
                                                <div class="border-top pt-2 flex-center-between flex-wrap">
                                                    <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                    <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                               @endforeach
                            </ul>
                        </div>
                        @endforeach
                       
                       
                    </div>
                </div>
            </div>
        </div>