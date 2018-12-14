<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Baca Surat: {{ $surat->subject }}</h3>
  
      <div class="box-tools pull-right">
        <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
        <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
      <div class="mailbox-read-info">
        <h3>{{ $surat->subject }}</h3>
      <h5>From: {{ $surat->sender->fullName }}
          <span class="mailbox-read-time pull-right">{{ $surat->created_at->toDayDateTimeString() }}</span></h5>
      <h5>To:
        @foreach ($surat->recipient as $recipient)
            <a href="#"><i class="fa fa-user"></i> {{ $recipient->fullName }}</a>
        @endforeach
      </h5>
      <h5>Jenis Surat: {{ $surat->type->name }}</h5>
      <h5>Tanggal Surat: {{ $surat->letter_date->format('d-m-Y') }}</h5>
      <h5>Tanggal Kirim: {{ $surat->send_date->format('d-m-Y') }}</h5>
      <h5>Tanggal Simpan: {{ $surat->created_at->format('d-m-Y') }}</h5>
      <h5>Nomor Surat : 00{{ $surat->id }}/{{ $surat->number }}</h5>
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
        {!! $surat->summary !!}
      </div>
      <!-- /.mailbox-read-message -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <ul class="mailbox-attachments clearfix">
            @foreach ($surat->getMedia('attachment') as $attachment)
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