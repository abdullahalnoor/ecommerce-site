

 
    <div class="mb-8">
        <div class="border-bottom border-color-1 mb-5">
            <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Latest Products</h3>
        </div>
        <ul class="list-unstyled">
            
            @foreach ($appData['latestProducts'] as $latestProduct)
            <li class="mb-4">
                <div class="row">
                    <div class="col-auto">
                        <a href="{{route('frontend.product.detail',$latestProduct->id)}}" class="d-block width-75">
                            <img class="img-fluid" src="{{asset($latestProduct->thumbnail)}}" alt="Image Description">
                        </a>
                    </div>
                    <div class="col">
                        <h3 class="text-lh-1dot2 font-size-14 mb-0"><a href="{{route('frontend.product.detail',$latestProduct->id)}}">{{ str_limit($latestProduct->name, $limit = 25, $end = '...') }}</a></h3>
             
                        <div class="font-weight-bold">
                            @if ($latestProduct->reduce_price > 0)
                            <del class="font-size-11 text-gray-9 d-block">Tk.{{$latestProduct->sales_price}}</del>
                            <ins class="font-size-15 text-red text-decoration-none d-block">Tk.{{$latestProduct->reduce_price}}</ins>
                        @else	
                        <ins class="font-size-15 text-red text-decoration-none d-block">Tk.{{$latestProduct->sales_price}}</ins>
      
                            @endif 
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
