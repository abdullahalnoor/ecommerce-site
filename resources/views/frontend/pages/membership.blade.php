@extends('layouts.app')




@section('title')
Membership Card
@endsection

@push('style')
  

@endpush


@section('content')
<main id="content" role="main">
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
      
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{route('frontend.home')}}">Home</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Membership Card </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="mb-5 text-center">
            <h1>Membership Card</h1>
           
        </div>
      
        <div class="col mb-10">
           
            <div class="row">
          
                <div class="position-relative bg-white text-center z-index-2">
                    <ul class="nav nav-classic nav-tab justify-content-center" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active " id="pills-one-example1-tab" data-toggle="pill" href="#pills-one-example1" role="tab" aria-controls="pills-one-example1" aria-selected="true">
                                <div class="d-md-flex justify-content-md-center align-items-md-center">
                                   English
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="pills-two-example1-tab" data-toggle="pill" href="#pills-two-example1" role="tab" aria-controls="pills-two-example1" aria-selected="false">
                                <div class="d-md-flex justify-content-md-center align-items-md-center">
                                    Bangla
                                </div>
                            </a>
                        </li>
                      
                    </ul>
                </div>
             
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade pt-2 show active" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab">
                        <div class="row">
                            {!! $page->en_description !!}
                        </div>
                    </div>
                    <div class="tab-pane fade pt-2" id="pills-two-example1" role="tabpanel" aria-labelledby="pills-two-example1-tab">
                       <div class="row">
                        {!! $page->bn_description !!}
                       </div>
                    </div>
                  
                </div>
             
            </div>
            
        </div>
        
    </div>
</main>




@endsection


@push('script')
    
@endpush