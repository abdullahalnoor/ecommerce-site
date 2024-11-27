@if (Session::has('error'))

<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert">×</button>
     <div class="alert-icon contrast-alert">
      <i class="icon-close"></i>
     </div>
     <div class="alert-message">
       <span><strong>Error !</strong> {{Session::get('error')}}</span>
     </div>
   </div>

@endif


@if (Session::has('success'))

<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <div class="alert-icon contrast-alert">
     <i class="icon-check"></i>
    </div>
    <div class="alert-message">
      <span><strong>Success!</strong> {{Session::get('success')}}</span>
    </div>
  </div>

@endif


