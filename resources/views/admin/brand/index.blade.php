@extends('admin.master')



@push('style')




@endpush


@section('title', 'Brands')

@section('content')



<div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> List of Brand
<a class="btn btn-primary btn-round pull-right" href="{{route('admin.brand.create')}}"><i class="zmdi zmdi-plus-circle"></i><span>Add  Brand</span></a>

            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th> Name</th>
                        <th> Slug</th>
                        <th> Status</th>
                        <th> Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($brands as $key=>$brand)
                    <tr>
                        <td>{{$brand->name }}</td>
                        <td>{{ $brand->slug }}</td>
                        <td> {{$brand->status == 1 ? 'Active' : 'Inactive' }}</td>
                        <td> <img src="{{asset($brand->image)}}" alt="img" style="width: 80px; height:50px">  </td>
          
<td class="text-center">
 
<a href="{{route('admin.brand.edit', $brand->id)}}" class="btn btn-success wave-effect" >
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