@section('script')
<script src="{{ asset('AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('AdminLTE/plugins/select2/select2.full.min.js') }}"></script>

<script>
  $(function () {
    //bootstrap WYSIHTML5 - text editor
    $("#compose-textarea").wysihtml5();
    // daterange picker
    $('#letter_date').datepicker();
    $('#send_date').datepicker();
     //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datepicker/datepicker3.css') }}"/>
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/select2/select2.min.css') }}">
@endsection

<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Kirim Surat</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
      <div class="form-group{{ $errors->has('letter_recipient') ? ' has-error' : '' }}"">
        <select class="form-control select2" name="letter_recipient[]" multiple="multiple" data-placeholder="Surat Ditujukan Kepada" style="width: 100%; color: black;">
          @foreach ($users as $user)
              <option value="{{ $user->id }}">{{ $user->fullName }}</option>
          @endforeach
          </select>
          @if ($errors->has('letter_recipient'))
              <span class="help-block">
                  <strong>{{ $errors->first('letter_recipient') }}</strong>
              </span>
            @endif
        </div> <!-- form-group -->
        <div class="form-group{{ $errors->has('surat_type_id') ? ' has-error' : '' }}">
            <select class="form-control select2" name="surat_type_id"  data-placeholder="Pilih Kategori Surat" style="width: 100%; color: black;">
              @foreach ($suratTypes as $type)
                  <option value="{{ $type->id }}">{{ $type->name }}</option>
              @endforeach
              </select>
              @if ($errors->has('surat_type_id'))
                  <span class="help-block">
                      <strong>{{ $errors->first('surat_type_id') }}</strong>
                  </span>
                @endif
        </div> <!-- form-group -->
      <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
        <input name="subject" id="subject" class="form-control" placeholder="Subject:">
        @if ($errors->has('subject'))
          <span class="help-block">
              <strong>{{ $errors->first('subject') }}</strong>
          </span>
        @endif
      </div> <!-- form-group -->
      <div class="form-group{{ $errors->has('letter_date') ? ' has-error' : '' }}">
          <input name="letter_date" id="letter_date" class="form-control" placeholder="Tanggal Surat:">
          @if ($errors->has('letter_date'))
            <span class="help-block">
                <strong>{{ $errors->first('letter_date') }}</strong>
            </span>
          @endif
        </div> <!-- form-group -->
        <div class="form-group{{ $errors->has('send_date') ? ' has-error' : '' }}">
            <input name="send_date" id="send_date" class="form-control" placeholder="Tanggal Kirim:">
            @if ($errors->has('send_date'))
              <span class="help-block">
                  <strong>{{ $errors->first('send_date') }}</strong>
              </span>
            @endif
          </div> <!-- form-group -->
          <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
            <input name="number" id="number" class="form-control" value="TPI/{{ date('Y') }}/{{ strtoupper(str_random(5)) }}">
              @if ($errors->has('number'))
                <span class="help-block">
                    <strong>{{ $errors->first('number') }}</strong>
                </span>
              @endif
            </div> <!-- form-group -->
      <div class="form-group">
            <textarea name="summary" id="compose-textarea" class="form-control" style="height: 300px">
                <h5><u><b>SURAT PERMINTAAN DAN KEPUTUSAN CUTI MELAHIRKAN</b></u></h5>
                <h4>Yang bertanda tangan dibawah ini :<br></h4><p>Nama : [Nama] NIK : [Nik]<br>Jabatan : [Jabatan]<br>Unit Organisasi : [Organisasi]</p><p>Dengan ini mengajukan permintaan Cuti Melahirkan terhitung mulai tanggal <b>[tanggal]</b>&nbsp;s/d <b>[tanggal] </b>selama<b> [lama hari]</b> untuk hak Cuti melahirkan.</p><p><br></p>Mengetahui<br>Atasan Langsung<br><br><b>[nama]</b><br><b>[bagian]</b></body>
            </textarea>
      </div>
      <div class="form-group">
        <div class="btn btn-default btn-file">
          <i class="fa fa-paperclip"></i> Attachment
          <input type="file" name="attachment">
        </div>
        <p class="help-block">Max. 32MB</p>
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <div class="pull-right">
        <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
      </div>
      <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
    </div>
    <!-- /.box-footer -->
  </div>
  <!-- /. box -->
  </form>