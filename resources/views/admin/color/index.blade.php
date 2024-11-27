@extends('admin.master')



@push('style')




@endpush


@section('title', 'Color')

@section('content')



<div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> List of Color
<a class="btn btn-primary btn-round pull-right" href="{{route('admin.color.create')}}"><i class="zmdi zmdi-plus-circle"></i><span>Add  Color</span></a>

            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th> Name</th>
                        <th> Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($colors as $key=>$color)
                    <tr>
                        <td>{{$color->name }}</td>
                        <td> {{$color->status == 1 ? 'Active' : 'Inactive' }}</td>
          
<td class="text-center">
 
<a href="{{route('admin.color.edit', $color->id)}}" class="btn btn-success wave-effect" >
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