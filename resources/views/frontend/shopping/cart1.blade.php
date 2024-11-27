@extends('layouts.app')


@push('style')
    
@endpush

@section('title')
Cart
@endsection


@section('content')

<div class="main-container container">
	<ul class="breadcrumb">
		<li><a href="{{route('frontend.home')}}"><i class="fa fa-home"></i></a></li>
		<li><a href="{{route('frontend.cart')}}">Shopping Cart</a></li>
	</ul>
	
	<div class="row">
		<!--Middle Part Start-->
	<div id="content" class="col-sm-12">
	  <h2 class="title">Shopping Cart</h2>
		<div class="table-responsive form-group">
		  <table class="table table-bordered">
			<thead>
			  <tr>
				<td class="text-center">Image</td>
				<td class="text-left">Product Name</td>
				
				<td class="text-left">Quantity</td>
				<td class="text-right">Unit Price</td>
				<td class="text-right">Total</td>
			  </tr>
			</thead>
			<tbody>
				@foreach (\Cart::getContent() as $cartItem)
			  <tr>
			  <td class="text-center"><a href="{{route('frontend.product.detail',$cartItem->id)}}"><img width="70px" src="{{asset($cartItem->attributes->image)}}" alt="Aspire Ultrabook Laptop" title="Aspire Ultrabook Laptop" class="img-thumbnail" /></a></td>
				<td class="text-left"><a href="{{route('frontend.product.detail',$cartItem->id)}}">{{$cartItem->name}}</a><br />
				 </td>
				 <form action="{{route('frontend.update.cart',$cartItem->id)}}" method="GET">
				<td class="text-left" width="200px"><div class="input-group btn-block quantity">
					
					<input type="text" name="quantity" value="{{$cartItem->quantity}}" size="1" class="form-control" />
					<span class="input-group-btn">
					<button type="submit" data-toggle="tooltip" title="Update" class="btn btn-primary"><i class="fa fa-clone"></i></button>
				 
					<a href="{{route('frontend.remove.cart',$cartItem->id)}}" data-toggle="tooltip" title="Remove" class="btn btn-danger" onClick=""><i class="fa fa-times-circle"></i></a>
					</span></div></td>
				</form>
				<td class="text-right">${{$cartItem->price}}</td>
				<td class="text-right">${{$cartItem->price * $cartItem->quantity}}</td>
			  </tr>

			  @endforeach
			
			</tbody>
		  </table>
		</div>

	<div class="row">
		<div class="col-sm-4 col-sm-offset-8">
			<table class="table table-bordered">
				<tbody>
					{{-- <tr>
						<td class="text-right">
							<strong>Sub-Total:</strong>
						</td>
						<td class="text-right">$168.71</td>
					</tr>
					<tr>
						<td class="text-right">
							<strong>Flat Shipping Rate:</strong>
						</td>
						<td class="text-right">$4.69</td>
					</tr>
					<tr>
						<td class="text-right">
							<strong>Eco Tax (-2.00):</strong>
						</td>
						<td class="text-right">$5.62</td>
					</tr>
					<tr>
						<td class="text-right">
							<strong>VAT (20%):</strong>
						</td>
						<td class="text-right">$34.68</td>
					</tr> --}}
					<tr>
						<td class="text-right">
							<strong>Total:</strong>
						</td>
					<td class="text-right">$ {{ Cart::getTotal() }} </td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	 <div class="buttons">
		<div class="pull-left"><a href="{{route('frontend.home')}}" class="btn btn-primary">Continue Shopping</a></div>
		<div class="pull-right"><a href="{{route('frontend.cart.checkout')}}" class="btn btn-primary">Checkout</a></div>
	  </div>
	</div>
	<!--Middle Part End -->
		
	</div>
</div>

	
@endsection


@push('script')
	
@endpush