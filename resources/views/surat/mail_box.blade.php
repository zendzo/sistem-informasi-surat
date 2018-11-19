@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-md-3">
      <a href="{{ route('surat.create') }}" class="btn btn-primary btn-block margin-bottom">Buat Surat</a>

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
            <li class="{{ active(['surat.masuk','surat.masuk']) }}">
              <a href="{{ route('surat.masuk') }}"><i class="fa fa-inbox"></i> Masuk
              <span class="label label-primary pull-right">{{ auth()->user()->incomingLetters()->count() }}</span></a></li>
            <li class="{{ active(['surat.keluar']) }}">
              <a href="{{ route('surat.keluar') }}"><i class="fa fa-envelope-o"></i> Keluar
                <span class="label label-primary pull-right">{{ auth()->user()->sentLetters()->count() }}</span></a></li>
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
        @include('surat.inbox')
    @elseif(Request::segment(2) === 'keluar')
      @include('surat.sent')
    @elseif(Request::segment(2) === 'kirim')
      @include('surat.create')
    @elseif(Request::segment(2) === 'show')
      @include('surat.show')
    @endif
  </div>
</div>
@endsection