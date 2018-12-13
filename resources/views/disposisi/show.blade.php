<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Baca Disposisi Surat: {{ $disposisi->subject }}</h3>
  
      <div class="box-tools pull-right">
        <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
        <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
      <div class="mailbox-read-info">
        <h3>{{ $disposisi->subject }}</h3>
      <h5>Dari: {{ $disposisi->sender->fullName }}
          <span class="mailbox-read-time pull-right">{{ $disposisi->created_at->toDayDateTimeString() }}</span></h5>
      <h5>Kepada:
        @foreach ($disposisi->recipient as $recipient)
            <a href="#"><i class="fa fa-user"></i> {{ $recipient->fullName }}</a>
        @endforeach
      </h5>
      <h5>Asal Surat: {{ $disposisi->original_sender_name }}</h5>
      <h5>Lampiran Surat:
        @if ($disposisi->suratAttachments)
          @foreach ($disposisi->suratAttachments as $surat)
            <a href="{{ route('surat.show', $surat->id) }}"><i class="fa fa-user"></i> {{ $surat->subject }}</a>
          @endforeach
        @else
        < Tidak Ada Lampiran >
        @endif
      </h5>
      <h5>Jenis Surat: {{ $disposisi->letterType->name }}</h5>
      <h5>Tanggal Surat: {{ $disposisi->letter_date }}</h5>
      <h5>Tanggal Diterima: {{ $disposisi->recived_date }}</h5>
      <h5>Instruksi Surat : {{ $disposisi->letter_instruction }}</h5>
      <h5>Nomor Surat : {{ $disposisi->letter_number }}</h5>
      <h5>Nomor Agenda : {{ $disposisi->agenda_number }}</h5>
      </div>
      <!-- /.mailbox-read-info -->
      <div class="mailbox-controls with-border text-center">
        <div class="btn-group">
          <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
            <i class="fa fa-trash-o"></i></button>
          <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
            <i class="fa fa-reply"></i></button>
          <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
            <i class="fa fa-share"></i></button>
        </div>
        <!-- /.btn-group -->
        <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
          <i class="fa fa-print"></i></button>
      </div>
      <!-- /.mailbox-controls -->
      <div class="mailbox-read-message">
        {!! $disposisi->summary !!}
      </div>
      <!-- /.mailbox-read-message -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <ul class="mailbox-attachments clearfix">
            @foreach ($disposisi->getMedia('attachment') as $attachment)
            <li>
                <span class="mailbox-attachment-icon"><i class="fa  fa-file-text"></i></span>
      
                <div class="mailbox-attachment-info">
                  <a href="{{ $attachment->getUrl() }}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{ $attachment->file_name }}</a>
                      <span class="mailbox-attachment-size">
                        {{ $attachment->size }}
                        <a href="{{ $attachment->getUrl() }}" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                      </span>
                </div>
              </li>
            @endforeach
        </ul>
      </div>
    <div class="box-footer">
      <div class="pull-right">
        <button type="button" class="btn btn-default"><i class="fa fa-reply"></i> Reply</button>
        <button type="button" class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
      </div>
      <button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
      <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
    </div>
    <!-- /.box-footer -->
  </div>
  <!-- /. box -->