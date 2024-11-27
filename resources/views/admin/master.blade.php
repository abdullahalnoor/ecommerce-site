<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

	<link rel="icon" href="{{asset('admin/images/favicon.png')}}" type="image/png" sizes="16x16">

  <title>  @yield('title') | {{$site_settings['site_name']}} </title>
  <!--favicon-->
  <link rel="icon" href="/images/favicon.ico" type="image/x-icon"/>
  <!-- Vector CSS -->
  <link href="{{asset('admin/css/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
  <!-- simplebar CSS-->
  <link href="{{asset('admin/css/simplebar.css')}}" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet"/>

  <link href="{{asset('admin/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
  <link href="{{asset('admin/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="{{asset('admin/css/animate.css')}}" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="{{asset('admin/css/icons.css')}}" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="{{asset('admin/css/sidebar-menu.css')}}" rel="stylesheet"/>
  <link href="{{asset('admin/css/select2.min.css')}}" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="{{asset('admin/css/app-style.css')}}" rel="stylesheet"/>

  @stack('style')

  <style>
         .select2-selection--multiple{
    overflow: hidden !important;
    height: auto !important;
}
  </style>
  
</head>

<body>

<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
    @include('admin.includes.sidebar')
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
@include('admin.includes.header')

<!--End topbar header-->

<div class="clearfix"></div>
	
  <div class="content-wrapper">
   
    @include('admin.includes.flash-message')

@yield('content')

    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->
@include('admin.includes.footer')
	
	<!--End footer-->
   
  </div><!--End wrapper-->

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('admin/js/jquery.min.js')}}"></script>
  <script src="{{asset('admin/js/popper.min.js')}}"></script>
  <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
	
 
  
  <!-- Vector map JavaScript -->
  {{-- <script src="{{asset('admin/js/jquery-jvectormap-2.0.2.min.js')}}"></script>
  <script src="{{asset('admin/js/jquery-jvectormap-world-mill-en.js')}}"></script> --}}
  <!-- Chart js -->
  {{-- <script src="{{asset('admin/')}}/plugins/Chart.js/Chart.min.js"></script> --}}
  <!-- Index js -->
  {{-- <script src="{{asset('admin/js/index.js')}}"></script> --}}


  <script src="{{asset('admin/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('admin/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('admin/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('admin/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{asset('admin/js/jszip.min.js')}}"></script>
  <script src="{{asset('admin/js/pdfmake.min.js')}}"></script>
  <script src="{{asset('admin/js/vfs_fonts.js')}}"></script>
  <script src="{{asset('admin/js/buttons.html5.min.js')}}"></script>
  <script src="{{asset('admin/js/buttons.print.min.js')}}"></script>
  <script src="{{asset('admin/js/buttons.colVis.min.js')}}"></script>
  <script src="{{asset('admin/js/select2.min.js')}}"></script>
  <script src="{{asset('admin/js/jquery.validate.min.js')}}"></script>


   <!-- simplebar js -->
   <script src="{{asset('admin/js/simplebar.js')}}"></script>
   <!-- waves effect js -->
   <script src="{{asset('admin/js/waves.js')}}"></script>
   <!-- sidebar-menu js -->
   <script src="{{asset('admin/js/sidebar-menu.js')}}"></script>
   <!-- Custom scripts -->
   <script src="{{asset('admin/js/app-script.js')}}"></script>
   
  <script>
    $(document).ready(function() {
     //Default data table
      $('#default-datatable').DataTable();

            $('.single-select').select2();
      
            $('.multiple-select').select2();

       

      var table = $('#example').DataTable( {
       lengthChange: false,
       buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
     } );

    table.buttons().container()
       .appendTo( '#example_wrapper .col-md-6:eq(0)' );
     
     } );


     
     

   </script>

  @stack('script')
  
</body>
</html>
