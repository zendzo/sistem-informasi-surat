<ul class="sidebar-menu">
<li class="header">MAIN NAVIGATION</li>
      {{-- @foreach ($menuCategories as $category)
      <li class="treeview {{ active($category->active) }}">
            <a href="#">
            <i class="fa fa-dashboard"></i> <span>{{ ucfirst($category->name) }}</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
            </a>
            <ul class="treeview-menu">
                  @foreach ($category->menuItems as $menu)
                        <li class="{{ active($category->active) }}">
                              <a href="{{ route($menu->url) }}">
                                    <i class="fa {{ $menu->icon }}"></i> {{$menu->name}}
                              </a>
                        </li>    
                  @endforeach
            </ul>
      </li>
      @endforeach --}}
</ul>
