@extends('admin.master')



@push('style')


<style>
   table td p {word-wrap:break-word;}
</style>

@endpush


@section('title', 'Products')

@section('content')



<div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> List of Product
{{-- <a class="btn btn-primary btn-round pull-right" href="{{route('admin.product.create')}}"><i class="zmdi zmdi-plus-circle"></i><span>Add New Product</span></a> --}}

            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        
                        <th> Name</th>
                        <th> Type</th>
                        <th> Price</th>
                        <th> Offer Price</th>
                        <th> Offer</th>
                        <th> Thubmnail</th>
                        
                       
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($products as $key=>$product)
                    <tr>
                       
                        <td >{{$product->name}}</td>
                        <td >
                          @if ($product->product_type == 1)
                              Standard

                          @elseif ($product->product_type == 2)
                              Variant
                          @endif
                          
                        </td>
                        <td >{{$product->sales_price}}</td>
                        <td >{{$product->reduce_price}}</td>
                        <td >
                          @if ($product->offer == 1)
                              Active

                          @elseif ($product->offer == 2)
                              Inactive
                          @endif
                          
                        </td>
                     
                        <td>
                          @if ($product->thumbnail)
                          <img style="width:80px;height:60px" src="{{asset($product->thumbnail)}}" >
                              @else
                              --
                          @endif
                        </td>
                    
          
<td class="text-center">
 


<a title="Offer" href="{{route('admin.product.create.offer', $product['id'])}}" class="btn btn-danger wave-effect" >
  <i aria-hidden="true" class="fa fa-check"></i>
  </a>



</td>
</tr>
@endforeach
                    
                </tbody>
               
            </table>
            </div>
            </div>
          </div>
        </div>
      </div>



@endsection

@push('js')


  <script type="text/javascript">
     $(document).ready(function() {
      //Default data table
       $('#default-datatable').DataTable();


       var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
      } );
 
     table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
      
      } );

    </script>

   


@endpush