<div class="load ">

    <div class="d-block d-md-flex flex-center-between mb-3 ">
        <h3 class="font-size-25 mb-2 mb-md-0 categoryPageTitle"> {{$pageTitle->name}} </h3>
        {{-- <p class="font-size-14 text-gray-90 mb-0">Showing 1–25 of 56 results</p> --}}
    </div>

    
    <div class="tab-content " id="pills-tabContent ">
        <div class="tab-pane fade pt-2 show active" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab" data-target-group="groups">
            <ul class="row list-unstyled products-group no-gutters ">
                
    
                @forelse ($appData['products'] as $productItem)
                <li class="col-6 col-md-3 col-wd-2gdot4 product-item">
                    @include('frontend.components.card-product')
                
                </li>
        
                @empty
                <div class="mb-12 text-danger">
                    <h1>No Products Found..</h1>
                </div>
                @endforelse
            
            </ul>
        </div>
        
    </div>
    <!-- End Tab Content -->
    <!-- End Shop Body -->
    <!-- Shop Pagination -->
    <nav class="d-md-flex justify-content-between align-items-center border-top pt-3" aria-label="Page navigation example">
        {{-- <div class="text-center text-md-left mb-3 mb-md-0">Showing 1–25 of 56 results</div> --}}
        {{ $appData['products']->links() }}
        
    </nav>
</div>