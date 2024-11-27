@extends('layouts.app')




@section('title')
Privacy Policy
@endsection

@push('style')
  

@endpush


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
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Privacy Policy </li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="mb-12 text-center">
            <h1>Privacy Policy</h1>
            {{-- <p class="text-gray-44">This Agreement was last modified on 18th february 2019</p> --}}
        </div>
      
        {!! $page->en_description !!}
        
    </div>
</main>
@endsection


@push('script')
    
@endpush