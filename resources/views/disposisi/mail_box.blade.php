@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-md-3">
      @if (auth()->user()->role_id === 1)
      <a href="{{ route('disposisi.create') }}" class="btn btn-primary btn-block margin-bottom">Buat disposisi</a>
      @endif

      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Folders</h3>

          <div class="box-tools">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="box-body no-padding">
          <ul class="nav nav-pills nav-stacked">
            <li class="{{ active(['disposisi.masuk','disposisi.masuk']) }}">
              <a href="{{ route('disposisi.masuk') }}"><i class="fa fa-inbox"></i> Masuk
              <span class="label label-primary pull-right">{{ auth()->user()->incomingDisposisis()->count() }}</span></a>
            </li>
            @if (auth()->user()->role_id === 1)
            <li class="{{ active(['disposisi.keluar']) }}">
              <a href="{{ route('disposisi.keluar') }}"><i class="fa fa-envelope-o"></i> Keluar
                <span class="label label-primary pull-right">{{ auth()->user()->sentDisposisis()->count() }}</span></a>
            </li>
            @endif
            {{-- <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>
            <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a>
            </li>
            <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li> --}}
          </ul>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /. box -->
  </div>
  <div class="col-md-9">
    @if (Request::segment(2) === 'masuk')
        @include('disposisi.inbox')
    @elseif(Request::segment(2) === 'keluar')
      @include('disposisi.sent')
    @elseif(Request::segment(2) === 'kirim')
      @include('disposisi.create')
    @elseif(Request::segment(2) === 'show')
      @include('disposisi.show')
    @endif
  </div>
</div>
@endsection