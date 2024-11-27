
    <div class="mb-8 border border-width-1  ">
        <!-- List -->
        <ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar">
            {{-- <div class="dropdown-title">Browse Categories</div> --}}
            @if ($categoriesSidbar->activeChildrens->count() > 0)
                
                @php
                    $categoriesSidbarMenus = $categoriesSidbar->activeChildrens;
                @endphp
            @else    
            @php
                    $categoriesSidbarMenus = $categoriesSidbar->activeParents;
                @endphp
            @endif
            
            @foreach ($categoriesSidbarMenus as $key =>  $parentCategory)

            <li>
                <a class="
                @if (count($parentCategory->activeChildrens) > 0)
                dropdown-toggle 
                @else
                sidebarCategroyRoute 
                @endif
                dropdown-toggle-collapse dropdown-title" 
                
                @if (count($parentCategory->activeChildrens) <= 0)
              
                data-route="{{route('frontend.category',$parentCategory->id)}}"
                data-catid="{{$parentCategory->id}}"
                @endif
                @if (count($parentCategory->activeChildrens) > 0)
                role="button"
                data-toggle="collapse" aria-expanded="false" aria-controls="sidebarNav1Collapse_{{$key}}" data-target="#sidebarNav1Collapse_{{$key}}"
                @endif
                 >
                    {{$parentCategory->name}}
                </a>

                @if (count($parentCategory->activeChildrens) > 0)

                <div id="sidebarNav1Collapse_{{$key}}" class="collapse" data-parent="#sidebarNav">
                    <ul id="sidebarNav1" class="list-unstyled dropdown-list">
                        
                            @foreach ($parentCategory->activeChildrens as $childCategory)
                        <li><button class="dropdown-item sidebarCategroyRoute"
                             data-route="{{route('frontend.category',$childCategory->id)}}"
                             data-catid="{{$parentCategory->id}}"
                             >{{$childCategory->name}}</button></li>
                            
                            
                            @endforeach
                        
                    </ul>
                </div>
                @endif
            </li>
            @endforeach
            
            {{-- <li>
                <a class="dropdown-current active" href="#">Smart Phones & Tablets </a>
            </li> --}}
        </ul>
        <!-- End List -->

        
    </div>
  