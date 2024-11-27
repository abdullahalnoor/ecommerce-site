@extends('admin.master')

@section('title', 'Dashboard')
@section('content')
<div class="container-fluid">

    <!--Start Dashboard Content-->
    
    <div class="row mt-3">
      <div class="col-12 col-lg-6 col-xl-3">
        <div class="card bg-pattern-primary">
          <div class="card-body">
            <div class="media">
            <div class="media-body text-left">
              <h4 class="text-white">{{$totalOrders}}</h4>
              <span class="text-white">Total Orders</span>
            </div>
            <div class="align-self-center w-circle-icon rounded-circle bg-contrast">
              <i class="icon-basket-loaded text-white"></i></div>
           </div>
          </div>
        </div>
      </div>
    
      <div class="col-12 col-lg-6 col-xl-3">
        <div class="card bg-pattern-success">
          <div class="card-body">
            <div class="media">
            <div class="media-body text-left">
              <h4 class="text-white">{{$totalProducts}}</h4>
              <span class="text-white">Total Products</span>
            </div>
            <div class="align-self-center w-circle-icon rounded-circle bg-contrast">
              {{-- <i class="icon-pie-chart text-white"></i> --}}
              <i class="fa fa-product-hunt text-white"></i>
            </div>
          </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6 col-xl-3">
        <div class="card bg-pattern-warning">
          <div class="card-body">
            <div class="media">
            <div class="media-body text-left">
              <h4 class="text-white">{{$totalCustomer}}</h4>
              <span class="text-white">Total Customers</span>
            </div>
            <div class="align-self-center w-circle-icon rounded-circle bg-contrast">
              <i class="icon-user text-white"></i></div>
          </div>
          </div>
        </div>
      </div>
    </div><!--End Row-->
        
        


  
    
     <!--End Dashboard Content-->

  </div>
@endsection