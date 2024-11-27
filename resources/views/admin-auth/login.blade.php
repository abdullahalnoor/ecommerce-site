<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <link rel="icon" href="{{asset('admin/images/favicon.png')}}" type="image/png" sizes="16x16">

  <title> {{$site_settings['site_name']}}  - Admin Login</title>
 

  <link href="{{asset('admin/css/simplebar.css')}}" rel="stylesheet"/>

  <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet"/>

  <link href="{{asset('admin/css/animate.css')}}" rel="stylesheet" type="text/css"/>

  <link href="{{asset('admin/css/icons.css')}}" rel="stylesheet" type="text/css"/>

  <link href="{{asset('admin/css/sidebar-menu.css')}}" rel="stylesheet"/>

  <link href="{{asset('admin/css/app-style.css')}}" rel="stylesheet"/>


  
  
</head>

<body>
 <!-- Start wrapper-->
 <div id="wrapper">
	<div class="card border-primary border-top-sm border-bottom-sm card-authentication1 mx-auto my-5 animated bounceInDown">
		<div class="card-body">
		 <div class="card-content p-2">
		 	<div class="text-center">
				 {{-- <img src="{{asset('frontend/images/header-logo.png')}}" alt="logo"> --}}
				 {{$site_settings['site_name']}}
		 	</div>
		  <div class="card-title text-uppercase text-center py-3">Sign In</div>
            <form  method="POST" action="{{ route('admin.login') }}">
               {{csrf_field()}}
			  <div class="form-group">
			   <div class="position-relative has-icon-right">
				  <label for="exampleInputUsername" class="sr-only">Username</label>
				  <input type="text" name="email" class="form-control form-control-rounded" placeholder="Username">
				  <div class="form-control-position">
					  <i class="icon-user"></i>
				  </div>
               </div>
               
			  </div>
			  <div class="form-group">
			   <div class="position-relative has-icon-right">
				  <label for="exampleInputPassword" class="sr-only">Password</label>
				  <input type="password" name="password" class="form-control form-control-rounded" placeholder="Password">
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>
			<div class="form-row mr-0 ml-0">
			 <div class="form-group col-6">
			   <div class="icheck-primary">
                {{-- <input type="checkbox" id="user-checkbox" checked="" />
				<label for="user-checkbox">Remember me</label> --}}
				
			  </div>
			 </div>
			 <div class="form-group col-6 text-right">
			
			 </div>
			</div>
			 <button type="submit" class="btn btn-primary shadow-primary btn-round btn-block waves-effect waves-light">Sign In</button>
			  <div class="text-center pt-3">
			
							<hr>
			  </div>
			 </form>
		   </div>
		  </div>
	     </div>
    
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	</div><!--wrapper-->
	

</body>
</html>
