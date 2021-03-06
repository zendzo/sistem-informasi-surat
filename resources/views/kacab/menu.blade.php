<li class="treeview {{ active(['admin.user.*','admin.type-surat.*','surat.*','disposisi.*']) }}">
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
      </ul>
  </li>
  </li>
    </ul>
  </li>