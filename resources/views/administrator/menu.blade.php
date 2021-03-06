<li class="treeview {{ active(['admin.user.*','admin.type-surat.*','surat.*','disposisi.*','admin.surat.*','admin.disposisi.*']) }}">
  <a href="#">
    <i class="fa fa-list-alt"></i><span>Menu Utama</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li class="{{ active('surat.*') }}"> <!-- active -->
      <a href="#"><i class="fa fa-envelope"></i> Data Surat
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
          <li class="{{ active('surat.masuk') }}"> <!-- active -->
            <a href="{{ route('surat.masuk') }}"><i class="fa fa-arrow-circle-right"></i> Surat Masuk</a>
          </li>
          <li class="{{ active('surat.keluar') }}"> <!-- active -->
            <a href="{{ route('surat.keluar') }}"><i class="fa fa-arrow-circle-left"></i> Suat Keluar</a>
          </li>
      </ul>
  </li>
  <li class="{{ active('disposisi.*') }}"> <!-- active -->
      <a href="#"><i class="fa fa-exchange"></i> Data Disposisi
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
          <li class="{{ active('disposisi.masuk') }}"> <!-- active -->
            <a href="{{ route('disposisi.masuk') }}"><i class="fa fa-long-arrow-right"></i> Masuk</a>
          </li>
          <li class="{{ active('disposisi.keluar') }}"> <!-- active -->
            <a href="{{ route('disposisi.keluar') }}"><i class="fa fa-long-arrow-left"></i> Keluar</a>
          </li>
      </ul>
  </li>
  <li class="{{ active(['admin.type-surat.*','admin.surat.*','admin.disposisi.*']) }}"> <!-- active -->
      <a href="#"><i class="fa fa-database"></i> Data System
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
          <li class="{{ active('admin.user.index') }}"> <!-- active -->
            <a href="{{ route('admin.user.index') }}">
              <i class="fa fa-user"></i> User</a>
          </li>
          <li class="{{ active('admin.surat.index') }}"> <!-- active -->
            <a href="{{ route('admin.surat.index') }}">
              <i class="fa fa-envelope"></i> Surat</a>
          </li>
          <li class="{{ active('admin.disposisi.index') }}"> <!-- active -->
            <a href="{{ route('admin.disposisi.index') }}">
              <i class="fa fa-exchange"></i> Semua Disposisi</a>
          </li>
          <li class="{{ active('admin.disposisi.approved') }}"> <!-- active -->
            <a href="{{ route('admin.disposisi.approved') }}">
              <i class="fa fa-exchange text-green"></i> Disposisi Disetujui</a>
          </li>
          <li class="{{ active('admin.disposisi.rejected') }}"> <!-- active -->
            <a href="{{ route('admin.disposisi.rejected') }}">
              <i class="fa fa-exchange text-red"></i> Disposisi Ditolak</a>
          </li>
          <li class="{{ active('admin.type-surat.index') }}"> <!-- active -->
            <a href="{{ route('admin.type-surat.index') }}">
              <i class="fa fa-tags"></i> Type Surat
            </a>
          </li>
      </ul>
  </li>
</li>
  </ul>
</li>