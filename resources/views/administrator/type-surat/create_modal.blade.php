<div class="modal-dialog">
<div class="modal-content">
   <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span></button>
      <h4 class="modal-title">{{ $page_title or config('app.name') }}</h4>
   </div>
   <div class="modal-body">
      <form class="form-horizontal"  action="{{ route('admin.type-surat.store') }}" method="POST">
          {{ csrf_field() }}

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-sm-2 control-label">Type Surat</label>
            <div class="col-sm-10">
              <input id="name" name="name" type="text" class="form-control" placeholder="Type Surat" value="{{ old('name') }}" required>
              @if ($errors->has('name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="form-group{{ $errors->has('kode') ? ' has-error' : '' }}">
            <label for="kode" class="col-sm-2 control-label">Kode Surat</label>
            <div class="col-sm-10">
              <input id="kode" name="kode" type="text" class="form-control" placeholder="Kode Surat" value="{{ old('kode') }}" required>
              @if ($errors->has('kode'))
                  <span class="help-block">
                      <strong>{{ $errors->first('kode') }}</strong>
                  </span>
              @endif
            </div>
          </div>
   </div>
   <div class="modal-footer">
      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">@lang('application.close')</button>
      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> @lang('application.save')</button>
   </div>
</div>
<!-- /.modal-content -->
</div>
</form>