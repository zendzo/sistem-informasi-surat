<ul class="sidebar-menu">
<li class="header">MAIN NAVIGATION</li>
@if (Auth::user()->role_id === 1)
      @include('administrator.menu')
@endif
@if (Auth::user()->role_id === 2)
      @include('kacab.menu')
@endif
@if (Auth::user()->role_id === 3)
      @include('instansi.menu')
@endif
</ul>
