@extends('admin.master')



@push('style')




@endpush


@section('title', 'Brand Products')

@section('content')



<div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> List of Brand Products
<a class="btn btn-primary btn-round pull-right" href="{{route('admin.brand-product.create')}}"><i class="zmdi zmdi-plus-circle"></i><span>Add  Brand Product</span></a>

            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th> Title</th>
                        <th> Brand Name</th>
                        <th> Status</th>
                        <th> Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($brandProducts as $key=>$brandProduct)
                    <tr>
                        <td>{{$brandProduct->title }}</td>
                        <td>{{ $brandProduct->brand->name }}</td>
                        <td> {{$brandProduct->status == 1 ? 'Active' : 'Inactive' }}</td>
                        <td> <img src="{{asset($brandProduct->image)}}" alt="img" style="width: 80px; height:50px">  </td>
          
<td class="text-center">
 
<a href="{{route('admin.brand-product.edit', $brandProduct->id)}}" class="btn btn-success wave-effect" >
<i aria-hidden="true" class="fa fa-edit"></i>
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