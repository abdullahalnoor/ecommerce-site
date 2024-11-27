
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
                            "slidesToShow": 6
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
                        @foreach ($shareable_data['categories'] as $key =>  $parentCategories)

                        @foreach ($parentCategories->activeChildrens as $k =>  $parentCategory)
                        <div class="js-slide products-group">

                          
                            <div class="product-item">
                                <div class="product-item__outer h-100 w-100">
                                    <div class="product-item__inner px-wd-4 p-2 p-md-1">
                                        <div class="product-item__body pb-xl-1">
                                              <div class="mb-1">
                                                <a href="{{route('frontend.category',$parentCategory->id)}}" class="d-block text-center">
                                                  <img class="img-fluid" src="{{asset($parentCategory->image)}}" alt="Image Description">
                                                  
                                                </a>
                                            </div>
                                            <h5 class="mb-1 product-item__title" style="text-align: center"><a href="../shop/single-product-fullwidth.html" class="text-blue font-weight-bold">{{$parentCategory->name}}</a></h5>
                                           
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                      @endforeach
                      @if ($key == 1)
                            @php
                                break;
                            @endphp
                        @endif
                      @endforeach
                    </div>
                </div>
               