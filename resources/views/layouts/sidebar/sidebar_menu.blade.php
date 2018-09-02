<ul class="sidebar-menu">
   @foreach ($menuCategories as $category)

   <li class="header">{{ strtoupper($category->name) }}</li>

      @foreach ($category->menuItems as $menuItems)

            <li class="treeview {{ active($menuItems->active) }}">
               <a href="{{ route($menuItems->url) }}">
                  <i class="fa fa-dashboard"></i> <span>{{ $menuItems->name }}</span>
                  <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                  </span>
               </a>
               <ul class="treeview-menu {{ active('$menuItems->active') }}">
                  @foreach ($menuItems->subMenuItems as $subMenuItem)
                     <li class="{{ active($subMenuItem->active) }}">
                        <a href="{{ route($subMenuItem->url) }}"><i class="fa fa-circle-o"></i> {{ $subMenuItem->name }}
                     </a>
                     {{-- <ul class="treeview-menu">
                        @foreach ($subMenuItem->childSubMenuItems as $childSubMenu)
                           <li><a href="#"><i class="fa fa-circle-o"></i> {{$childSubMenu->name}}</a></li>
                        @endforeach
                     </ul> --}}
                     </li>
                  @endforeach
               </ul>
            </li>
      @endforeach
   @endforeach
</ul>