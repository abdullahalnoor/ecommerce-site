<header class="topbar-nav">
    <nav class="navbar navbar-expand fixed-top gradient-scooter">
     <ul class="navbar-nav mr-auto align-items-center">
       <li class="nav-item">
         <a class="nav-link toggle-menu" href="javascript:void();">
          <i class="icon-menu menu-icon"></i>
        </a>
       </li>
    
     </ul>
        
     <ul class="navbar-nav align-items-center right-nav-link">
   
  
     
       <li class="nav-item">
         <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
           <span class="user-profile"><img src="https://via.placeholder.com/110x110" class="img-circle" alt="user avatar"></span>
         </a>
         <ul class="dropdown-menu dropdown-menu-right">
          <li class="dropdown-item user-details">
           <a href="javaScript:void();">
              <div class="media">
                <div class="avatar"><img class="align-self-start mr-3" src="https://via.placeholder.com/110x110" alt="user avatar"></div>
               <div class="media-body">
                 @auth
                 <h6 class="mt-2 user-title">
                  {{auth()->user()->name}}
                  
                 </h6>
                 <p class="user-subtitle">{{auth()->user()->email}}</p>
                 @endauth
               
               </div>
              </div>
             </a>
           </li>
           <li class="dropdown-divider"></li>
         
           {{-- <li class="dropdown-item"><i class="icon-settings mr-2"></i> Setting</li> --}}
           <li class="dropdown-divider"></li>
           <li class="dropdown-item"><i class="icon-power mr-2"></i> 
          
            <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
          
          
          </li>

         

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
         </ul>
       </li>
     </ul>
   </nav>
   </header>