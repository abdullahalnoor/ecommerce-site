@extends('layouts.app')


@push('style')

<link rel="stylesheet" href="{{asset('frontend/ion/ion.rangeSlider.css')}}">
@endpush

@section('title')
    {{$pageTitle->name}}
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
						
						@foreach ($pageTitle->activeParents as $parentCat)
						<li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{route('frontend.category',$parentCat->id)}}">{{$parentCat->slug}}</a></li>
						@endforeach
						
						<li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">{{$pageTitle->name}}</li>
					</ol>
				</nav>
			</div>
			<!-- End breadcrumb -->
		</div>
	</div>
	<!-- End breadcrumb -->

	<div class="container">
		<div class="row mb-8">
			
			<div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
				@include('layouts.partials.product-sidebar-nav',['categoriesSidbar'=>$pageTitle])

				{{-- <div class="range-slider">
					<input type="text" class="js-range-slider" value="" />
				</div>
				<div class="extra-controls">
					<input type="text" class="js-input-from" value="0" />
					<input type="text" class="js-input-to" value="0" />
				</div> --}}

				<div class="range-slider">
					<h4 class="font-size-14 mb-3 font-weight-bold">Price</h4>
					<!-- Range Slider -->
					{{-- <span class="irs js-irs-0 u-range-slider u-range-slider-indicator u-range-slider-grid"><span class="irs"><span class="irs-line" tabindex="0"><span class="irs-line-left"></span><span class="irs-line-mid"></span><span class="irs-line-right"></span></span><span class="irs-min" style="display: none;">0</span><span class="irs-max" style="display: none;">1</span><span class="irs-from" style="display: none; left: 0%;">0</span><span class="irs-to" style="display: none; left: 0%;">0</span><span class="irs-single" style="display: none; left: 0%;">0</span></span><span class="irs-grid"></span><span class="irs-bar" style="left: 24.4399%; width: 48.1531%;"></span><span class="irs-shadow shadow-from" style="display: none;"></span><span class="irs-shadow shadow-to" style="display: none;"></span><span class="irs-slider from type_last" style="left: 21.477%;"></span><span class="irs-slider to" style="left: 69.6301%;"></span></span><input class="js-range-slider irs-hidden-input" type="text" data-extra-classes="u-range-slider u-range-slider-indicator u-range-slider-grid" data-type="double" data-grid="false" data-hide-from-to="true" data-prefix="$" data-min="0" data-max="3456" data-from="0" data-to="3456" data-result-min="#rangeSliderExample3MinResult" data-result-max="#rangeSliderExample3MaxResult" tabindex="-1" readonly=""> --}}
					
					<div class="range-slider">
						<input type="text" class="js-range-slider" value="" />
					</div>

					<div class="extra-controls">
						<input type="hidden" class="js-input-from" value="0" />
						<input type="hidden" class="js-input-to" value="0" />
					</div>

					<div class="price_label my-4" style="">
						Price: <span class="rang_from">Tk.&nbsp;&nbsp;0</span> — <span class="rang_to">Tk.&nbsp;&nbsp;50,000</span>
					</div>
					
					{{-- <button type="button" id="filterPrice" class=" filterPrice btn my-3 px-4 btn-primary-dark-w py-2 rounded-lg">Filter</button> --}}
				</div>


				@include('layouts.partials.product-sidebar-latest-product')
			
			</div>

			<div class="col-xl-9 col-wd-9gdot5">
			

				@include('frontend.product.load')
				
			</div>
		</div>
		
	</div>
</main>

<div id="categoryRoute" data-catid="{{$pageTitle->id}}" data-route="{{route('frontend.category',$pageTitle->id)}}">

</div>
	
@endsection


@push('script')


<script src="{{asset('frontend/ion/ion.rangeSlider.min.js')}}"></script>

<script>
var $range = $(".js-range-slider"),
    $inputFrom = $(".js-input-from"),
    $inputTo = $(".js-input-to"),
    instance,
    min = 0,
    max = 50000,
    from = 0,
    to = 0;


$range.ionRangeSlider({
	skin: "round",
    type: "double",
    min: min,
    max: max,
    from: 0,
    to: 50000,
	hide_min_max: true,   
    hide_from_to: true,
    onStart: updateInputs,
    onChange: updateInputs,
	onChange: function (data) {
            
			$('.rang_from').text(data.from);
			$('.rang_to').text(data.to);
			let priceVal = data.from+'-'+data.to;
			
			filterDataByPrice(priceVal);
        }
});
instance = $range.data("ionRangeSlider");

function updateInputs (data) {
	from = data.from;
	to = data.to;
	
    
    $inputFrom.prop("value", from);
    $inputTo.prop("value", to);	
}

$inputFrom.on("input", function () {
    var val = $(this).prop("value");
   
    // validate
    if (val < min) {
        val = min;
    } else if (val > to) {
        val = to;
    }
    
    instance.update({
        from: val
    });
});

$inputTo.on("input", function () {
    var val = $(this).prop("value");
    
    // validate
    if (val < from) {
        val = from;
    } else if (val > max) {
        val = max;
    }
    
    instance.update({
        to: val
    });
});

</script>




<script>


let catid = '';

	$(document).on("click",".filterPrice",function(e){

		e.preventDefault();


		let minPrice = $(".js-input-from");
		minPrice = parseFloat(minPrice.val());
		let maxPrice  = $(".js-input-to");
		maxPrice = parseFloat(maxPrice.val());

		let data = minPrice+'-'+maxPrice;

		filterDataByPrice(data);


		
	  });

	  function filterDataByPrice(data){
				

				if(catid){

				}else{
					catid = $("#categoryRoute").data('catid');
				}

				let url = "{{url('/category/product/')}}" + '/' + catid + '/' + data;

				  $.ajax({			
					  url:url
				  })
				  .done(function(data){
					  $(".load").html(data);	
				  });	
	  } 





 $(document).on("click",".sidebarCategroyRoute",function(e){
	e.preventDefault();
	var url  = $(this).data("route");
   catid = $(this).data('catid');

	$.ajax({		
		url:url
	})
	.done(function(data){
		$(".load").html(data);
	});
});


$(document).on("click",".pagination a",function(e){
	e.preventDefault();
	var url  = $(this).attr("href");
	$.ajax({		
		url:url
	})
	.done(function(data){
		$(".load").html(data);
	});
});


</script>
     
@endpush