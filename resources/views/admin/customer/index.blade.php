@extends('admin.master')



@push('style')




@endpush


@section('title', 'Customers')

@section('content')



<div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> List of Customer
<a class="btn btn-primary btn-round pull-right" href="{{route('admin.customer.create')}}"><i class="zmdi zmdi-plus-circle"></i><span>Add Customer</span></a>

            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th> Name</th>
                        <th> Email</th>
                        <th> Phones</th>
                        <th> Address</th>
                        <th> Opening Balance</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($customers as $key=>$customer)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$customer['name']}}</td>
                        <td>{{ $customer['email'] }}</td>
                        <td>{{ $customer['phone'] }}</td>
                        <td>{{ $customer['address'] }}</td>
                        <td>{{ $customer['opening_balance'] }}</td>
          
<td class="text-center">

  <a href="{{route('admin.customer.edit', $customer['id'])}}" class="btn btn-success wave-effect" >
    <i aria-hcustomer_den="true" class="fa fa-edit"></i>
    </a>
<a href="{{route('admin.customer.delete', $customer['id'])}}" class="btn btn-danger wave-effect" >
<i aria-hidden="true" class="fa fa-times"></i>
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