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
    $('#recived_date').datepicker();
    $('#letter_date').datepicker();
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
      <h3 class="box-title">Disposisi Surat</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <form action="{{ route('disposisi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
      <div class="form-group{{ $errors->has('letter_recipient') ? ' has-error' : '' }}"">
        <select class="form-control select2" name="letter_recipient[]" multiple="multiple" data-placeholder="Ditujukan Kepada" style="width: 100%; color: black;">
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
        <div class="form-group{{ $errors->has('surat') ? ' has-error' : '' }}">
            <select class="form-control select2" name="surat[]" multiple="multiple"  data-placeholder="Lampirankan Surat Masuk ({{ auth()->user()->incomingLetters->count() }})" style="width: 100%; color: black;">
              @foreach (auth()->user()->incomingLetters as $surat)
                  <option value="{{ $surat->id }}">{{ $surat->subject }}</option>
              @endforeach
              </select>
              @if ($errors->has('surat'))
                  <span class="help-block">
                      <strong>{{ $errors->first('surat') }}</strong>
                  </span>
                @endif
        </div> <!-- form-group -->
        <div class="form-group{{ $errors->has('original_sender_name') ? ' has-error' : '' }}">
          <input name="original_sender_name" id="original_sender_name" class="form-control" placeholder="Asal Surat">
            @if ($errors->has('original_sender_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('original_sender_name') }}</strong>
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
        <div class="form-group{{ $errors->has('agenda_number') ? ' has-error' : '' }}">
          <input name="agenda_number" id="agenda_number" class="form-control" placeholder="Nomor Agenda:" value="TPI/AGD/{{ date('Y') }}/{{ strtoupper(str_random(5)) }}">
          @if ($errors->has('agenda_number'))
            <span class="help-block">
                <strong>{{ $errors->first('agenda_number') }}</strong>
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
      <div class="form-group{{ $errors->has('recived_date') ? ' has-error' : '' }}">
          <input name="recived_date" id="recived_date" class="form-control" placeholder="Tanggal Terima:" autocomplete="off">
          @if ($errors->has('recived_date'))
            <span class="help-block">
                <strong>{{ $errors->first('recived_date') }}</strong>
            </span>
          @endif
        </div> <!-- form-group -->
        <div class="form-group{{ $errors->has('letter_date') ? ' has-error' : '' }}">
            <input name="letter_date" id="letter_date" class="form-control" placeholder="Tanggal Kirim:" autocomplete="off">
            @if ($errors->has('letter_date'))
              <span class="help-block">
                  <strong>{{ $errors->first('letter_date') }}</strong>
              </span>
            @endif
          </div> <!-- form-group -->
          <div class="form-group{{ $errors->has('letter_number') ? ' has-error' : '' }}">
            <input name="letter_number" id="letter_number" class="form-control" value="TPI/{{ date('Y') }}/{{ strtoupper(str_random(5)) }}">
              @if ($errors->has('letter_number'))
                <span class="help-block">
                    <strong>{{ $errors->first('letter_number') }}</strong>
                </span>
              @endif
            </div> <!-- form-group -->
            <div class="form-group{{ $errors->has('letter_instruction') ? ' has-error' : '' }}">
              <textarea name="letter_instruction" id="letter_instruction" class="form-control" style="height: 75px" placeholder="Insturksi Surat"></textarea>
                @if ($errors->has('letter_instruction'))
                  <span class="help-block">
                      <strong>{{ $errors->first('letter_instruction') }}</strong>
                  </span>
                @endif
              </div> <!-- form-group -->
      <div class="form-group">
            <textarea name="summary" id="compose-textarea" class="form-control" style="height: 300px">
              <h1><u>Heading Of Message</u></h1>
              <h4>Subheading</h4>
              <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain
                was born and I will give you a complete account of the system, and expound the actual teachings
                of the great explorer of the truth, the master-builder of human happiness. No one rejects,
                dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know
                how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again
                is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain,
                but because occasionally circumstances occur in which toil and pain can procure him some great
                pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise,
                except to obtain some advantage from it? But who has any right to find fault with a man who
                chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that
                produces no resultant pleasure? On the other hand, we denounce with righteous indignation and
                dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so
                blinded by desire, that they cannot foresee</p>
              <ul>
                <li>List item one</li>
                <li>List item two</li>
                <li>List item three</li>
                <li>List item four</li>
              </ul>
              <p>Thank you,</p>
              <p>John Doe</p>
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