@extends('admin.master')



@push('style')



<style>
  .status-label {
 color:#fff;
 display:inline-bolck;
 padding:5px;
 text-align: center;
  line-height:25px;
 min-width: 50px;
 font-weight: 500;
}
.status-label-success{
    background:rgb(0, 46, 0);
}
.status-label-info{
    background:rgb(67, 1, 248);
}
.status-label-danger{
    background:rgb(155, 2, 2);
}
.status-label-warning{
    background:rgb(58, 54, 1);
}
</style>


@endpush


@section('title', 'Products')

@section('content')



<div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> List of Product
<a class="btn btn-primary btn-round pull-right" href="{{route('admin.product.create')}}"><i class="zmdi zmdi-plus-circle"></i><span>Add New Product</span></a>

            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th> Order No</th>
                        <th> Total </th>
                        <th> Date</th>
                        <th> Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($orders as $key=>$order)
                    <tr>
                       <td>
                        {{$order->order_no}}
                       </td>

                       <td>
                          {{$order->total}}
                        </td>
                        
                        
                       <td>
                        {{ $order->created_at->diffForHumans() }}
                      </td>

                      <td>
                        {!!  $order->orderStatus() !!}
                       
                      </td>
                    
          
<td class="text-center">
 
<a href="{{route('admin.view.order-detail', $order->id)}}" class="btn btn-success wave-effect" >
<i aria-hidden="true" class="fa fa-eye"></i>
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