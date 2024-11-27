

<div class="product-item__outer h-100 w-100">
	<div class="product-item__inner px-wd-4 p-2 p-md-3">
		<div class="product-item__body pb-xl-2">
		
			<h5 class="mb-1 product-item__title"><a href="{{route('frontend.product.detail',$productItem->id)}}" class="text-blue font-weight-bold">{{ str_limit($productItem->name, $limit = 25, $end = '...') }}</a></h5>
			<div class="mb-2">
				<a href="{{route('frontend.product.detail',$productItem->id)}}" class="d-block ">
					<img class="img-fluid " style="margin-left: auto" width="100%" src="{{asset($productItem->thumbnail)}}" alt="Image Description">
				</a>
			</div>
			<div class="flex-center-between mb-1">
				<div class="prodcut-price">

					@if ($productItem->reduce_price > 0)
				   
					<div class="text-gray-100">Tk.{{number_format($productItem->reduce_price)}}</div>
					<div class="text-gray-50" style="text-decoration: line-through;font-size:12px">Tk.{{$productItem->sales_price}}</div>
					@else	
				  
					<div class="text-gray-100">Tk.{{number_format($productItem->sales_price)}}</div>
					@endif 
				   
				</div>
				<div class="d-none d-xl-block prodcut-add-cart">
					@if ($productItem->product_type == 1 )
				
					@if ($productItem->productStocks->count() == 0)
						
					<a href="{{route('frontend.product.detail',$productItem->id)}}"
					
						class="btn-add-cart btn-primary transition-3d-hover " title="Out of Stock">
						<i class="far fa-eye-slash"></i>
						</a>
					@elseif($productItem->productStocks[0]->purchase_qty < 1)
					<a href="{{route('frontend.product.detail',$productItem->id)}}"
					
						class="btn-add-cart btn-primary transition-3d-hover " title="Out of Stock">
						<i class="far fa-eye-slash"></i>
						</a>
					@else
					<a href="javascript:;"
						data-route="{{route('frontend.add.standard.cart',$productItem->id)}}"
						class="btn-add-cart btn-primary transition-3d-hover noorAddToCart" title="Add to Cart">
						<i class="ec ec-add-to-cart"></i>
					</a>
					@endif
					
					
					

					@elseif($productItem->product_type == 2)
					<a href="{{route('frontend.product.detail',$productItem->id)}}"
					
						class="btn-add-cart btn-primary transition-3d-hover " title="Select Option">
						<i class="far fa-hand-point-up"></i>
						</a>
	
					@endif
					
					
				</div>
			</div>
		</div>
	   
	</div>
</div>
