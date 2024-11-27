<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo text-center">
     <a href="{{route('admin.home')}}">
     
      <h5 class="logo-text ">  {{$site_settings['site_name']}} </h5>
    </a>
    </div>
    <ul class="sidebar-menu do-nicescrol">
    
     <li>
       <a href="{{route('admin.home')}}" class="waves-effect">
         <i class="icon-home"></i> <span>Dashboard</span>
       </a>
     
     </li>


     <li>
      <a href="{{route('admin.page.index')}}" class="waves-effect">
        <i class="fa fa-image"></i> <span>Page</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="sidebar-submenu">
        <li><a href="{{route('admin.page.index')}}"><i class="fa fa-eye"></i>Manage page</a></li>
      </ul>
    </li>

     <li>
      <a href="{{route('admin.slider.index')}}" class="waves-effect">
        <i class="fa fa-image"></i> <span>Slider</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="sidebar-submenu">
        <li><a href="{{route('admin.slider.create')}}"><i class="fa fa-plus"></i>Add Slider</a></li>
        <li><a href="{{route('admin.slider.index')}}"><i class="fa fa-eye"></i>Manage Slider</a></li>
      </ul>
    </li>

     <li>
      <a href="{{route('admin.brand.index')}}" class="waves-effect">
        <i class="fa fa-tag"></i> <span>Brand</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="sidebar-submenu">
        <li><a href="{{route('admin.brand.create')}}"><i class="fa fa-plus"></i>Add Brand</a></li>
        <li><a href="{{route('admin.brand.index')}}"><i class="fa fa-eye"></i>Manage Brand</a></li>
      </ul>
    </li>

    <li>
      <a href="{{route('admin.size.index')}}" class="waves-effect">
        <i class="fa fa-tag"></i> <span>Size</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="sidebar-submenu">
        <li><a href="{{route('admin.size.create')}}"><i class="fa fa-plus"></i>Add Size</a></li>
        <li><a href="{{route('admin.size.index')}}"><i class="fa fa-eye"></i>Manage Size</a></li>
      </ul>
    </li>

    {{-- <li>
      <a href="{{route('admin.color.index')}}" class="waves-effect">
        <i class="fa fa-tag"></i> <span>Color</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="sidebar-submenu">
        <li><a href="{{route('admin.color.create')}}"><i class="fa fa-plus"></i>Add Color</a></li>
        <li><a href="{{route('admin.color.index')}}"><i class="fa fa-eye"></i>Manage Color</a></li>
      </ul>
    </li> --}}



    

    <li>
      <a href="{{route('admin.category.index')}}" class="waves-effect">
        <i class="fa fa-tags"></i> <span>Category</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="sidebar-submenu">
        <li><a href="{{route('admin.category.create')}}"><i class="fa fa-plus"></i>Create </a></li>
        <li><a href="{{route('admin.category.index')}}"><i class="fa fa-eye"></i>Manage </a></li>
       
      </ul>
    </li>

    
     <li>
      <a href="{{route('admin.product.index')}}" class="waves-effect">
        <i class="fa fa-product-hunt"></i> <span>Product</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="sidebar-submenu">
        <li><a href="{{route('admin.product.create')}}"><i class="fa fa-plus"></i>Add Product</a></li>
        <li><a href="{{route('admin.product.index')}}"><i class="fa fa-eye"></i>Manage Product</a></li>
        <li><a href="{{route('admin.product.all.offer')}}"><i class="fa fa-eye"></i>Manage Offer</a></li>
      </ul>
    </li>

    
    {{-- <li>
      <a href="{{route('admin.hot-sales.index')}}" class="waves-effect">
        <i class="fa fa-product-hunt"></i> <span>Hot Sales</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="sidebar-submenu">
        <li><a href="{{route('admin.hot-sales.create')}}"><i class="fa fa-plus"></i>Create Hot Sales</a></li>
        <li><a href="{{route('admin.hot-sales.index')}}"><i class="fa fa-eye"></i>Manage Hot Sales</a></li>
      </ul>
    </li> --}}


    <li>
      <a href="{{route('admin.view.orders')}}" class="waves-effect">
        <i class="fa fa-product-hunt"></i> <span>Order</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="sidebar-submenu">
        {{-- <li><a href="{{route('admin.product.create')}}"><i class="fa fa-plus"></i>Add Product</a></li> --}}
        <li><a href="{{route('admin.view.orders')}}"><i class="fa fa-eye"></i>Manage Product</a></li>
      </ul>
    </li>





    {{-- <li>
      <a href="{{route('admin.offer.index')}}" class="waves-effect">
        <i class="fa fa-image"></i> <span>Offer</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="sidebar-submenu">
        <li><a href="{{route('admin.offer.create')}}"><i class="fa fa-plus"></i>Add Offer</a></li>
        <li><a href="{{route('admin.offer.index')}}"><i class="fa fa-eye"></i>Manage Offer</a></li>
      </ul>
    </li> --}}
   

   
 
    {{-- <li>
      <a href="{{route('admin.customer.index')}}" class="waves-effect">
        <i class="fa fa-user-circle"></i> <span>Customer</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="sidebar-submenu">
        <li><a href="{{route('admin.customer.create')}}"><i class="fa fa-circle-o"></i>Add Customer</a></li>
        <li><a href="{{route('admin.customer.index')}}"><i class="fa fa-circle-o"></i>Manage Customer</a></li>
     
      </ul>

    </li>


    <li>
      <a href="{{route('admin.supplier.index')}}" class="waves-effect">
        <i class="fa fa-user-circle"></i> <span>Supplier</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="sidebar-submenu">
        <li><a href="{{route('admin.supplier.create')}}"><i class="fa fa-circle-o"></i>Add Supplier</a></li>
        <li><a href="{{route('admin.supplier.index')}}"><i class="fa fa-circle-o"></i>Manage Supplier</a></li>
     
      </ul>

    </li>


    <li>
      <a href="{{route('admin.payment-method.index')}}" class="waves-effect">
        <i class="fa fa-vcard-o"></i> <span>Payment Method</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="sidebar-submenu">
        <li><a href="{{route('admin.payment-method.create')}}"><i class="fa fa-circle-o"></i>Add </a></li>
        <li><a href="{{route('admin.payment-method.index')}}"><i class="fa fa-circle-o"></i>Manage </a></li>
     
      </ul>

    </li>


    
    <li>
      <a href="{{route('admin.invoice.index')}}" class="waves-effect">
        <i class="fa fa-cart-arrow-down"></i> <span>Invoice</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="sidebar-submenu">
        <li><a href="{{route('admin.invoice.create')}}"><i class="fa fa-circle-o"></i>Create Invoice</a></li>
        <li><a href="{{route('admin.invoice.index')}}"><i class="fa fa-circle-o"></i>Manage Invoice</a></li>
     
      </ul>

    </li> --}}


    
     {{-- <li><a href="{{route('admin.setting.index')}}" class="waves-effect"><i class="fa fa-cogs text-red"></i> <span>Settings</span></a></li> --}}
   </ul>
    
  </div>