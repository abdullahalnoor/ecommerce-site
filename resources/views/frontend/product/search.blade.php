@extends('layouts.app')


@push('style')
    
@endpush

@section('title')
    {{$pageTitle}}
@endsection


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
						<li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">{{$pageTitle}}</li>
					</ol>
				</nav>
			</div>
			<!-- End breadcrumb -->
		</div>
	</div>
	<!-- End breadcrumb -->

	<div class="container">
		<div class="row mb-8">
			
		

			<div class="col-xl-12 col-wd-9gdot5">
				<!-- Shop-control-bar Title -->
				<div class="d-block d-md-flex flex-center-between mb-3">
					<h3 class="font-size-25 mb-2 mb-md-0"> {{$pageTitle}}</h3>
					{{-- <p class="font-size-14 text-gray-90 mb-0">Showing 1–25 of 56 results</p> --}}
				</div>
				<!-- End shop-control-bar Title -->
				<!-- Shop-control-bar -->
		
				<!-- End Shop-control-bar -->
				<!-- Shop Body -->
				<!-- Tab Content -->
				<div class="tab-content" id="pills-tabContent">
					<div class="tab-pane fade pt-2 show active" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab" data-target-group="groups">
						<ul class="row list-unstyled products-group no-gutters">
							

							@forelse  ($appData['products'] as $productItem)
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
				<!-- End Shop Pagination -->
			</div>
		</div>
		<!-- Brand Carousel -->
		
		<!-- End Brand Carousel -->
	</div>
</main>
	
@endsection


@push('script')
    
@endpush