@extends('layouts.app')


@push('style')
    
@endpush

@section('title')
   404 
@endsection


@section('content')
<main id="content" role="main">
    
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{route('frontend.home')}}">Home</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Error 404</li>
                    </ol>
                </nav>
            </div>
           
        </div>
    </div>
   

    <div class="container">
        <div class="mb-5 text-center pb-3 border-bottom border-color-1">
            <h1 class="font-size-sl-72 font-weight-light mb-3">404!</h1>
            <p class="text-gray-90 font-size-20 mb-0 font-weight-light">Nothing was found at this location. </p>
        </div>
       
       
       
       @include('layouts.partials.brand')
     
    </div>
</main>


	
@endsection


