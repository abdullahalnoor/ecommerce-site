<div class="product-item__outer h-100 w-100">
	<div class="product-item__inner px-wd-4 p-2 p-md-3">
		<div class="product-item__body pb-xl-2">
			<div class="mb-2"><a href="{{route('frontend.brand-product.category',$productItem->id)}}" class="font-size-12 text-gray-5">{{ $productItem->brand->name }}</a></div>
			<h5 class="mb-1 product-item__title"><a href="{{route('frontend.brand-product.category',$productItem->id)}}" class="text-blue font-weight-bold">{{ str_limit($productItem->title, $limit = 25, $end = '...') }}</a></h5>
			<div class="mb-2">
				<a href="{{route('frontend.brand-product.category',$productItem->id)}}" class="d-block text-center"><img class="img-fluid" src="{{asset($productItem->image)}}" alt="Image Description"></a>
			</div>
			<div class="flex-center-between mb-1">
				<div class="prodcut-price">

					
				   
				</div>
				
			</div>
		</div>
	   
	</div>
</div>