@extends('layouts.app')


@push('style')
    <style>
		.zoom {
			display:inline-block;
			position: relative;
		}
		
		/* magnifying glass icon */
		.zoom:after {
			content:'';
			display:block; 
			width:33px; 
			height:33px; 
			position:absolute; 
			top:0;
			right:0;
			background:url(icon.png);
		}

		.zoom img {
			display: block;
		}
	</style>
@endpush

@section('title')
{!! $productDetail->name !!}
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
						
						<li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">{!! $productDetail->name !!}</li>
					</ol>
				</nav>
			</div>
			<!-- End breadcrumb -->
		</div>
	</div>
	<!-- End breadcrumb -->

	<div class="container">
		<!-- Single Product Body -->
		<div class="mb-14">
			<div class="row">
				<div class="col-md-6 col-lg-4 col-xl-5 mb-4 mb-md-0">
					<div id="sliderSyncingNav" class="js-slick-carousel u-slick mb-2"
						data-infinite="true"
						data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
						data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
						data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4"
						data-nav-for="#sliderSyncingThumb">
						@foreach ($productDetail->productImages as $key =>  $productImage )
						<div class="js-slide zoom exZoom"  id='ex1'>
							<img class="img-fluid" src="{{asset($productImage->image)}}" alt="Image-{{$key}}">
						</div>
						@endforeach
					</div>

					<div id="sliderSyncingThumb" class="js-slick-carousel u-slick u-slick--slider-syncing u-slick--slider-syncing-size u-slick--gutters-1 u-slick--transform-off"
						data-infinite="true"
						data-slides-show="5"
						data-is-thumbs="true"
						data-nav-for="#sliderSyncingNav">
						@foreach ($productDetail->productImages as $key =>  $productImage )
						<div class="js-slide" style="cursor: pointer;">
							<img class="img-fluid" src="{{asset( $productImage->image)}}" alt="Image-{{$key}}">
						</div>
						@endforeach
						
					</div>
				</div>
				<div class="col-md-6 col-lg-4 col-xl-4 mb-md-6 mb-lg-0">
					<div class="mb-2">
						
						<h2 class="font-size-25 text-lh-1dot2">{{$productDetail->name}}</h2>
					<div class="mb-2">
							<ul class="font-size-14 pl-3 ml-1 text-gray-110">
								{!! $productDetail->product_specification !!}
							</ul>
						</div>
						
					</div>
				</div>
				<div class="mx-md-auto mx-lg-0 col-md-6 col-lg-4 col-xl-3">
					<div class="mb-2">
						<div class="card p-5 border-width-2 border-color-1 borders-radius-17">
							<div class="text-gray-9 font-size-14 pb-2 border-color-1 border-bottom mb-3">
								Availability:
								@if ($productDetail->productStocks->count() < 1 )
								
								<span class="text-red font-weight-bold " data-stock="1" > Not Available</span>
								
								@elseif($productDetail->productStocks[0]->purchase_qty <= 0 )
								<span class="text-red font-weight-bold " data-stock="1" >Not Available</span>
								
								@elseif($productDetail->productStocks[0]->purchase_qty >= 1 )
								<span class="text-green font-weight-bold productAvailability" id="defaultStock" data-stock="{{$productDetail->productStocks[0]->purchase_qty}}">{{$productDetail->productStocks[0]->purchase_qty}} in Stock</span>
								 @endif
							</div>
							<div class="mb-3">
							
								@if ($productDetail->hotSales  && $productDetail->hotSales->status == 1)
					
				
								<div class="text-gray-100">Tk. {{number_format($productDetail->hotSales->price)}}</div>
							   <div class="text-gray-50" style="text-decoration: line-through;font-size:12px">${{$productDetail->sales_price}}</div>
							@elseif ($productDetail->reduce_price > 0)
						   
							<div class="text-gray-100">Tk. {{number_format($productDetail->reduce_price)}}</div>
							<div class="text-gray-50" style="text-decoration: line-through;font-size:12px">Tk.{{$productDetail->sales_price}}</div>
							@else	
						  
							<div class="text-gray-100">Tk. {{number_format($productDetail->sales_price)}}</div>
							@endif 
							</div>

							<form action="" method="">
								@method('PUT')
								   @csrf
							<div class="mb-3">
								<h6 class="font-size-14">Quantity</h6>
								

								<div div class="border rounded-pill py-1 w-md-60 height-35 px-3 border-color-1">

								
								<div class="js-quantity row align-items-center">
									<div class="col">
										<input  class="js-result form-control h-auto border-0 rounded p-0 shadow-none "  type="text" name="quantity"
										@if ($currentCartItem)
										value="{{$currentCartItem->quantity}}"
										@else	
										value="1"
										@endif>
									</div>
									<div class="col-auto pr-1">
										<a data-price="{{$productDetail->price}}" data-route="{{route('frontend.decrement.cart',$productDetail->id)}}" class="noor-minus  btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" href="javascript:;">
											<small class="fas  fa-minus btn-icon__inner"></small>
										</a>
										<a data-price="{{$productDetail->price}}" data-route="{{route('frontend.increment.cart',$productDetail->id)}}" class=" noor-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" href="javascript:;">
											<small class="fas  fa-plus btn-icon__inner"></small>
										</a>
									</div>
								</div>
							</div>
							</div>
						
							
							<div class="mb-2 pb-0dot5">
								<button type="button" data-id="{{$productDetail->id}}"  
									@if ($productDetail->productStocks->count() == 0)
									 disabled 
									 class="  btn btn-block btn-primary-dark"
									 @elseif($productDetail->productStocks[0]->purchase_qty <= 0 )
									 disabled
									 class="  btn btn-block btn-primary-dark"
									 @elseif($productDetail->productStocks[0]->purchase_qty >= 1 )
									 class=" noorAddToCart btn btn-block btn-primary-dark"
								     data-route="{{route('frontend.add.standard.cart.form')}}"
								     data-productid="{{$productDetail->id}}"
									 @endif

									 ><i class="ec ec-add-to-cart mr-2 font-size-20"></i> Add to Cart</button>
							</div>
							</form>
							<div class="mb-3">
								<a href="{{route('frontend.cart.checkout')}}" class="btn btn-block btn-dark">Buy Now</a>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Single Product Body -->
	</div>
	<div class="bg-gray-7 pt-6 pb-3 mb-6">
		<div class="container">
			<div class="js-scroll-nav">
				
				{!! $productDetail->description !!}
				
			</div>
		</div>
	</div>
	<div class="container">
		<!-- Related products -->
		

		<div class="position-relative">
            <div class="border-bottom border-color-1 mb-2">
                <h3 class="section-title section-title__full d-inline-block mb-0 pb-2 font-size-22">Related Products</h3>
            </div>
            <div class="js-slick-carousel u-slick position-static overflow-hidden u-slick-overflow-visble pb-7 pt-2 px-1"
                data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-3 mt-md-0"
                data-slides-show="7"
                data-slides-scroll="1"
                data-arrows-classes="position-absolute top-0 font-size-17 u-slick__arrow-normal top-10"
                data-arrow-left-classes="fa fa-angle-left right-1"
                data-arrow-right-classes="fa fa-angle-right right-0"
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

                @foreach ($appData['relatedProducts'] as $productItem)
                <div class="js-slide products-group">
                    <div class="product-item">
                        @include('frontend.components.card-product')
                    </div>
                </div>
                @endforeach
               
            </div>
        </div>
		<!-- End Related products -->
	
	</div>

</main>
	
@endsection





@push('script')

<script src="{{asset('frontend/js/jquery.zoom.min.js')}}"></script>


	<script>
$(document).ready(function(){
			$('.exZoom').each(function(){
				$(this).zoom();
			});
			// $('.exZoom').zoom();
			
		});

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
		
				

				$(".noorAddToCart").on("click",function(e){
					e.preventDefault();


					let orderQuantity = $('.js-result').val(); 
					let productid = $(this).data('productid');
					let route = $(this).data('route');
					let formData = {
						productid:productid,
						orderQuantity:orderQuantity,
					}
				
						    $.ajax({
								type:'POST',
								url:route,
								data:formData,
								cache:false
						    })
							.done(function(data){
								// console.log(data)
								if(data.stock_limit){
									var gTotal = parseFloat(data.getTotal).toFixed(2);
							  gTotal = new Intl.NumberFormat().format(gTotal)
								$(".noorCartTotal").text(gTotal); 
						        	$(".noorCartTotalQuantity").text(parseInt(data.totalQuantity));
									success('Cart Added');
								}else{
									error('Out of Stock..');
								}
								
								return false;
								 
							}).catch(function(err){
								console.log(err)
							})
					
				})

				


		
			
			

				$('.noor-minus').each(function(index) {
					$(this).on("click", function(e){
						e.preventDefault();
					var input = $(this).parent().prev().children();
				
					var decrement = parseInt(input.val());
					if( decrement == 0 || decrement < 0 || decrement == 1   ){
						return false;
					}
					decrement  = decrement - 1;
					input.val(decrement)

				
					
					});


				});

				$('.noor-plus').each(function(index) {
					$(this).on("click", function(e){
						e.preventDefault();

					var input = $(this).parent().prev().children();
					var incremtnt = parseInt(input.val());
					let stockQuantity = parseInt($("#defaultStock").data('stock'));
					incremtnt  = incremtnt + 1;
					
					if(stockQuantity == 0){
						stockQuantity = + stockQuantity;
					}

					if( incremtnt >= parseInt(stockQuantity) + 1 ){
						return false;
					}

					input.val(incremtnt)

					});
				});



	</script>
@endpush