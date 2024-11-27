@extends('layouts.app')


@push('style')
    
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
						<div  class="js-slide zoom exZoom"  id='ex1'>
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
								Availability:@if ($productDetail->productStocks->count() < 1 )
								
								<span class="text-red font-weight-bold ">Not Available</span>
								
								@elseif($productDetail->productStocks->count() == 1)
								<span class="text-green font-weight-bold productAvailability" id="defaultStock" data-stock="0" >{{$productDetail->productStocks[0]->purchase_qty}} in Stock</span>
								@else
								 <span class="text-green font-weight-bold productAvailability" data-stock="0" >Select Size</span>
								 @endif
							</div>
							<div class="mb-3">
							
								@if ($productDetail->hotSales  && $productDetail->hotSales->status == 1)
					
				
								<div class="text-gray-100">Tk. {{number_format($productDetail->hotSales->price)}}</div>
							   <div class="text-gray-50" style="text-decoration: line-through;font-size:12px">Tk.{{$productDetail->sales_price}}</div>
							@elseif ($productDetail->reduce_price > 0)
						   
							<div class="text-gray-100">Tk. {{number_format($productDetail->reduce_price)}}</div>
							<div class="text-gray-50" style="text-decoration: line-through;font-size:12px">Tk.{{number_format($productDetail->sales_price)}}</div>
							@else	
						  
							<div class="text-gray-100">Tk. {{number_format($productDetail->sales_price)}}</div>
							@endif 
							</div>

							<form action="" method="">
								@method('PUT')
								   @csrf
							
						
							<div class="mb-3">
								<h6 class="font-size-14">Size</h6>
								<!-- Select -->
								<input type="hidden" id="sizeId">
								<select name="size_id" class="selectProductSize js-select selectpicker dropdown-select btn-block col-12 px-0"
									data-style="btn-sm bg-white font-weight-normal py-2 border">
									<option value="" selected>Select One</option>
									@foreach ($productDetail->productStocks as $productStock)
									<option value="{{$productStock->size->id}}" >{{$productStock->size->name}}</option>
									@endforeach
									
								</select>
								<!-- End Select -->
							</div>


							<div class="mb-3">
								<h6 class="font-size-14">Quantity</h6>
								

								<div div class="border rounded-pill py-1 w-md-60 height-35 px-3 border-color-1">

								
								<div class="js-quantity row align-items-center">
									<div class="col">
										<input  class="js-result form-control h-auto border-0 rounded p-0 shadow-none "  type="text" name="quantity"
										
										value="1"
										>
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
									@if ($productDetail->productStocks->count() < 1)
									 disabled 
									
									 @endif
									 class=" noorAddToCart btn btn-block btn-primary-dark" disabled><i class="ec ec-add-to-cart mr-2 font-size-20"></i> Add to Cart</button>
							</div>
							</form>
							<div class="mb-3">
								<a href="{{route('frontend.cart.checkout')}}" class="btn btn-block btn-dark">Buy Now</a>
							</div>
							{{-- <div class="flex-content-center flex-wrap">
								<a href="#" class="text-gray-6 font-size-13 mr-2"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
								<a href="#" class="text-gray-6 font-size-13 ml-2"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
							</div> --}}
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

				let stockQuantity = 0;

				$(".selectProductSize").on("change",function(e){
					e.preventDefault();
					 let sizeId =   $(this).val();
					   $('#sizeId').val(sizeId);
					
					let productId = "{{$productDetail->id}}";

					 let formData = {
						 product_id: productId,
						 size_id: sizeId,
					 }

					 $.ajax({
						url:"{{route('frontend.cehck.product.availability')}}",
						type:"POST",
						data:formData,
						cache:false,
					 }).done(function(data){
						if(data !=  '' || data != 0){
							stockQuantity = data;
							$('.noorAddToCart').prop('disabled', false);
							$(".productAvailability").text(data+ ' in stock') 
						}else{
							tockQuantity = 0;
							$('.noorAddToCart').prop('disabled', true); 
							$(".productAvailability").text('Not Availabe') 
						}

					 }).fail(function(err){
						
					 })
					 $('.js-result').val(1); 
					 return false;
				
					
				})

				$(".noorAddToCart").on("click",function(e){
					e.preventDefault();

					let sizeId =  $('#sizeId').val();
					let productId = "{{$productDetail->id}}";
					let quantity = $('.js-result').val(); 

					let formData = {
						product_id: productId,
						size_id: sizeId,
						quantity: quantity,
					}
					
					$.ajax({
						url:"{{route('frontend.add.variant.cart.form')}}",
						type:"POST",
						data:formData,
						cache:false,
					}).done(function(data){
						
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

					}).fail(function(err){
						// console.log(err)
					})
				
					return false;

					
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
					incremtnt  = incremtnt + 1;

					// let stockQuantity = +$("#defaultStock").attr('data-stock');
					console.log(stockQuantity)
					if(stockQuantity == 0){
						stockQuantity = stockQuantity;
					}

					if( incremtnt >= parseInt(stockQuantity) + 1 ){
						return false;
					}

					input.val(incremtnt)

					});
				});



	</script>
@endpush