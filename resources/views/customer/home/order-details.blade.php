@extends('layouts.app')


@push('style')
    
@endpush

@section('title')
Order Details
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
			<h1 class="text-center">Order Details</h1>
		</div>
		<div class=" cart-table" style="min-height: 500px;">
			
				<table class="table" cellspacing="0">
					<thead>
						<tr>
							<th class="product-thumbnail">&nbsp;</th>
							<th class="product-name">Product</th>
							<th class="product-price">Price</th>
							<th class="product-quantity w-lg-15">Quantity</th>
							<th class="product-subtotal">Total</th>
						</tr>
					</thead>
					<tbody>
						@php
						$cartGrandTotal = 0;
					@endphp
						@foreach ($order->orderDetail as $cartItem)
						<tr class="">
							
							<td class="d-none d-md-table-cell">
								<a href="{{route('frontend.product.detail',$cartItem->product_id)}}"><img class="img-fluid max-width-100 p-1 border border-color-1" src="{{asset($cartItem->product->thumbnail)}}" alt="Image Description"></a>
							</td>

							<td data-title="Product">
								<a href="{{route('frontend.product.detail',$cartItem->product_id)}}" class="text-gray-90">
									{{ str_limit($cartItem->product->name, $limit = 20, $end = '..') }} 
									{!! $cartItem->size->id == 1 ? '': '- '.$cartItem->size->name  !!}
									{{-- @php
										dd(\Cart::getContent())
									@endphp --}}
								</a>
							</td>

							<td data-title="Price">
								<span class="">Tk.{{$cartItem->price}}</span>
							</td>

							<td data-title="Quantity">
								<span class="">{{$cartItem->quantity}}</span>
						
							</td>

							<td data-title="Total">
								Tk.<span class="noorCalculateTotal">{{ $grandTotal =  $cartItem->price * $cartItem->quantity}}</span>
							</td>
                        </tr>
                        @php
                            $cartGrandTotal += $grandTotal;
                        @endphp
						@endforeach

						<tr class="order-total">
							<td colspan="3"></td>
							<td>Total : </td>
							<td data-title="Total"> <strong>Tk.<span class="amount noorCartTotal">{{  $cartGrandTotal }}</span></strong></td>
						</tr>
						
						
					</tbody>
				</table>
		
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
                            $(".noorCartTotal").text(data.getTotal); 
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
						
							$(".noorCartTotal").text(data.getTotal); 
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
								$(".noorCartTotal").text(parseFloat(data.getTotal).toFixed(2)); 
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

					$('.noorCartTotal').text(grandTotal);
				
				}


				
			




				
				



	

	</script>
@endpush