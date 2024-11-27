



                <div class="position-relative">
                    {{-- <div class="border-bottom border-color-1 mb-2">
                        <h3 class="section-title section-title__full d-inline-block mb-0 pb-2 font-size-22">Recommendation for you</h3>
                    </div> --}}
                    <div class="js-slick-carousel u-slick position-static overflow-hidden u-slick-overflow-visble pb-7 pt-2 px-1"
                        data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-3 mt-md-0"
                        data-slides-show="7"
                        data-slides-scroll="1"
                        data-arrows-classes="position-absolute top-0 font-size-17 u-slick__arrow-normal top-10"
                        {{-- data-arrow-left-classes="fa fa-angle-left right-1"
                        data-arrow-right-classes="fa fa-angle-right right-0" --}}
                        data-responsive='[{
                          "breakpoint": 1400,
                          "settings": {
                            "slidesToShow": 4
                          }
                        }, {
                            "breakpoint": 1200,
                            "settings": {
                              "slidesToShow": 3
                            }
                        }, {
                          "breakpoint": 992,
                          "settings": {
                            "slidesToShow": 3
                          }
                        }, {
                          "breakpoint": 768,
                          "settings": {
                            "slidesToShow": 2
                          }
                        }, {
                          "breakpoint": 554,
                          "settings": {
                            "slidesToShow": 2
                          }
                        }]'>
                 
                        @foreach ($categoryParts as $key =>  $parentCategory)
                        <div class="js-slide products-group">

                        
                          <div class="product-item p-4">
                            <a href="{{route('frontend.category',$parentCategory->id)}}" class="min-height-146 py-1 py-xl-2 py-wd-1 banner-bg d-flex align-items-center text-gray-90">
                                <div class="col-6 col-xl-7 col-wd-6 pr-0">
                                    <img class="img-fluid" src="{{asset($parentCategory->image)}}" alt="Image Description">
                                </div>
                                <div class="col-6 col-xl-5 col-wd-6 pr-xl-4 pr-wd-3">
                                    <div class="mb-2 pb-1 font-size-18 font-weight-light text-ls-n1 text-lh-23">
                                         <strong>{{$parentCategory->name}}</strong>
                                    </div>
                                    <div class="link text-gray-90 font-weight-bold font-size-15" href="#">
                                        {{-- Shop now --}}
                                        <span class="link__icon ml-1">
                                            <span class="link__icon-inner"><i class="ec ec-arrow-right-categproes"></i></span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                          
                        </div>
                      @endforeach
                     
                    </div>
                </div>
