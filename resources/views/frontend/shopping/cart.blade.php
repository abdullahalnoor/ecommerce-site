@extends('layouts.app')


@push('style')
    
@endpush

@section('title')
Cart
@endsection


@section('content')
<main id="content" role="main" >
	<!-- breadcrumb -->
	<div class="bg-gray-13 bg-md-transparent">
		<div class="container">
			<!-- breadcrumb -->
			<div class="my-md-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
						<li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{route('frontend.home')}}">Home</a></li>
						<li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Cart</li>
					</ol>
				</nav>
			</div>
			<!-- End breadcrumb -->
		</div>
	</div>
	<!-- End breadcrumb -->

	<div class="container">
		<div class="mb-4">
			<h1 class="text-center">Cart</h1>
		</div>
		<div class=" cart-table" style="min-height: 500px;">
			<form class="mb-4" action="#" method="post">
				<table class="table" cellspacing="0">
					<thead>
						<tr>
							<th class="product-remove">&nbsp;</th>
							<th class="product-thumbnail">&nbsp;</th>
							<th class="product-name">Product</th>
							<th class="product-price">Price</th>
							<th class="product-quantity w-lg-15">Quantity</th>
							<th class="product-subtotal">Total</th>
						</tr>
					</thead>
					<tbody>

						@foreach ($cartContents as $cartItem)
						<tr class="">
							<td class="text-center">
								<a href="javascript:;"
									data-route="{{route('frontend.remove.cart',$cartItem->id)}}"
									class="text-gray-32 font-size-26 noorDeleteCart ">×</a>
							</td>
							<td class="d-none d-md-table-cell">
								<a href="{{route('frontend.product.detail',$cartItem->attributes->product_id)}}"><img class="img-fluid max-width-100 p-1 border border-color-1" src="{{asset($cartItem->attributes->image)}}" alt="Image Description"></a>
							</td>

							<td data-title="Product">
								<a href="{{route('frontend.product.detail',$cartItem->attributes->product_id)}}" class="text-gray-90">
									{{ str_limit($cartItem->name, $limit = 20, $end = '..') }} 
									{!! $cartItem->attributes->size ? '- '.$cartItem->attributes->size : '' !!}
									{{-- @php
										dd(\Cart::getContent())
									@endphp --}}
								</a>
							</td>

							<td data-title="Price">
								<span class="">Tk.{{number_format($cartItem->price)}}</span>
							</td>

							<td data-title="Quantity">
								<span class="sr-only">{{$cartItem->quantity}}</span>
								<!-- Quantity -->
								<div class="border rounded-pill py-1 width-122 w-xl-80 px-3 border-color-1">
									<div class="js-quantity row align-items-center">
										<div class="col">
											<input class="js-result form-control h-auto border-0 rounded p-0 shadow-none "  type="text" value="{{$cartItem->quantity}}">
										</div>
										<div class="col-auto pr-1">
											<a data-price="{{$cartItem->price}}" data-route="{{route('frontend.decrement.cart',$cartItem->id)}}" class="noor-minus  btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" href="javascript:;">
												<small class="fas  fa-minus btn-icon__inner"></small>
											</a>
											<a data-price="{{$cartItem->price}}" data-route="{{route('frontend.increment.cart',$cartItem->id)}}" class=" noor-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" href="javascript:;">
												<small class="fas  fa-plus btn-icon__inner"></small>
											</a>
										</div>
									</div>
								</div>
								<!-- End Quantity -->
							</td>

							<td data-title="Total">
								Tk.<span class="noorCalculateTotal">{{number_format($cartItem->price * $cartItem->quantity)}}</span>
							</td>
						</tr>
						@endforeach

						<tr class="order-total">
							<td colspan="4"></td>
							<td>Total : </td>
							<td data-title="Total"> <strong>Tk.<span class="amount noorCartTotal">{{ number_format(Cart::getTotal()) }}</span></strong></td>
						</tr>
						<tr>
							<td colspan="6" class="border-top space-top-2 justify-content-center">
								<div class="pt-md-3">
									<div class="d-block d-md-flex flex-center-between">
										<div class="mb-3 mb-md-0 w-xl-40">
											
										</div>
										<div class="d-md-flex">
											{{-- <button type="button" class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto">Update cart</button> --}}
											<a href="{{route('frontend.cart.checkout')}}" class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5 w-100 w-md-auto d-none d-md-inline-block text-white">Proceed to checkout</a>
										</div>
									</div>
								</div>
							</td>
						</tr>
						
					</tbody>
				</table>
			</form>
		</div>
		
	</div>
</main>

	
@endsection


@push('script')
	<script>

			$(document).ready(function(){
                    // console.log($(".noorCartTotal").text());
                    $(".noorDeleteCart").on("click",function(e){
                        e.preventDefault();
						let route = $(this).data('route');
						let element = $(this).parent().parent();
                        $.get(route,function(data){
                            // console.log(data);
							element.remove();

                            	var gTotal = parseFloat(data.getTotal).toFixed(2);
							  gTotal = new Intl.NumberFormat().format(gTotal)
								$(".noorCartTotal").text(gTotal); 
                            $(".noorCartTotalQuantity").text(data.totalQuantity); 
                            success('Item Remove ..');
                        })
                       
					})
				})
				
			

				$('.noor-minus').each(function(index) {
					$(this).on("click", function(e){
						e.preventDefault();
					var input = $(this).parent().prev().children();
					
					var decrement = parseInt(input.val());
					if(decrement == 1 ){
						return false;
					}
					decrement  = decrement - 1;
					input.val(decrement)

					// price

					let priceInput = $(this).parent().parent().parent().parent().next().children();

					let price = $(this).data('price');
					
					 price = parseInt(price);
					price = parseInt(decrement) * price;
					priceInput.text(price)
					noorCalculateTotal()

					// ajax request

					let route = $(this).data('route');
					
                        $.get(route,function(data){

							var gTotal = parseFloat(data.getTotal).toFixed(2);
                        gTotal = new Intl.NumberFormat().format(gTotal)
							$(".noorCartTotal").text(gTotal); 
						
							// $(".noorCartTotal").text(data.getTotal); 
                            $(".noorCartTotalQuantity").text(data.totalQuantity);
                            success('Cart Update ..');
                        })

							// ajax request
					
					});
				});

				$('.noor-plus').each(function(index) {
					$(this).on("click", function(e){
						e.preventDefault();
					var input = $(this).parent().prev().children();
					var incremtnt = parseInt(input.val());
					incremtnt  = incremtnt + 1;
					input.val(incremtnt)

					// price

					let priceInput = $(this).parent().parent().parent().parent().next().children();

					let singlePrice = $(this).data('price');
					
					 singlePrice = parseInt(singlePrice);
					let price = parseInt(incremtnt) * singlePrice;
					priceInput.text(price)
					
					
					noorCalculateTotal()

						// ajax request

						let route = $(this).data('route');
                        $.get(route,function(data){
							// console.log(data)
							// return false;
							if(data.stock_limit){
								var gTotal = parseFloat(data.getTotal).toFixed(2);
							  gTotal = new Intl.NumberFormat().format(gTotal)
								$(".noorCartTotal").text(gTotal); 
								$(".noorCartTotalQuantity").text(parseInt(data.totalQuantity));
								success('Cart Added');
							}else{
								error('Out of Stock..');
							}
                        })

							// ajax request


					});
				});


				function noorCalculateTotal(){
					let grandTotal = 0;
					$('.noorCalculateTotal').each(function(index){
						let noorCalculateTotal = $(this).text();
						grandTotal += parseInt(noorCalculateTotal);
						// console.log(grandTotal);
					})

					var gTotal = grandTotal.toFixed(2);
					gTotal = new Intl.NumberFormat().format(gTotal)

					$('.noorCartTotal').text(gTotal);
				
				}


				
			




				
				



	

	</script>
@endpush