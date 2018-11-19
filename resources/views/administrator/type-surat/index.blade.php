@extends('layouts.master')

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
               <h3 class="box-title">{{ $page_title or config('app.name') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="width: 10px;">#</th>
                  <th>Nama Tipe Surat</th>
                  <th>Kode Tipe Surat</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($suratTypes as $type)
                     <tr>
                        <td>{{ $type->id }}</td>
                        <td>{{ $type->name }}</td>
                        <td>{{ $type->kode }}</td>
                        <td width="20%">
                           <a class="btn btn-xs btn-info" href="{{ route('admin.type-surat.show',$type->id) }}">
                              <span class="fa fa-info fa-fw"></span>
                           </a>
                           <a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#roleModalEdit-{{ $type->id }}" href="#">
                              <span class="fa fa-pencil fa-fw"></span>
                           </a>
                           <!-- Modal Form Edit-->
                           <div class="modal fade" id="roleModalEdit-{{ $type->id }}" tabindex="-1" role="dialog" aria-labelledby="roleModalEdit-{{ $type->id }}">
                              @include('administrator.type-surat.edit_modal')
                           </div>
                              <form method="POST" action="{{ route('admin.type-surat.destroy',$type->id) }}" accept-charset="UTF-8" style="display:inline">
                              {{ method_field('DELETE') }}
                              {{ csrf_field() }}
                              <button type="submit" class="btn btn-xs btn-danger">
                                 <span class="fa fa-close fa-fw"></span>
                              </button>
                           </form>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->

            <!-- Modal Button -->
            <div class="box-footer clearfix">
              <a class="btn btn-success" data-toggle="modal" data-target="#roleModal" href="#"><span class="fa fa-plus fa-fw"></span>&nbsp;@lang('application.add new record')</a>   
            </div>

            <!-- Modal Form -->
            <div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModal">
               @include('administrator.type-surat.create_modal')
            </div>

          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection