@extends('admin.master')



@push('style')

 

@endpush



@section('title', 'Slider')


@section('content')



<div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> List of Sliders
<a class="btn btn-primary btn-round pull-right" href="{{route('admin.slider.create')}}"><i class="zmdi zmdi-plus-circle"></i><span>Add New Slider</span></a>

            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Image </th>
                        <th>Stauts </th>
                        <th>Feature </th>
                       
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($sliders as $key=>$slider)
                    <tr>
                      
                      
                  
                    <td>{!! $slider->title !!}</td>
                    <td style="text-align: center">
                    
                            <img src="{{asset($slider->image)}}" class="img-responsive"
                            width="100" height="80" alt="Slider"> 
                        
                        </td>
                        <td> {{$slider->status == 1 ? 'Active' : 'Inactive' }}</td>
                        <td> {{$slider->feature == 1 ? 'Yes' : 'No' }}</td>
                    </td>
<td class="text-center">
  
<a href="{{route('admin.slider.edit', $slider->id)}}" class="btn btn-success wave-effect" >
<i aria-hidden="true" class="fa fa-edit"></i>
</a>&nbsp;<br/><br/>
{{-- <button onclick="deleteslider({{$slider->id}})" class="btn btn-danger waves-effect" type="button">
<i aria-hidden="true" class="fa fa-trash"></i>
</button> --}}
{{-- <form id="delete-form-{{$slider->id}}" action="{{route('admin.slider.destroy', $slider->id)}}" method="post" style="display: none">
 @csrf
 @method('DELETE')
</form> --}}


</td>
</tr>
@endforeach
                    
                </tbody>
               
            </table>
            </div>
            </div>
          </div>
        </div>
      </div><!-- End Row-->



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

<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>

    <script type="text/javascript">
        function deleteslider(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>



@endpush