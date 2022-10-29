@extends('layouts.app')

@section('content')
  <!-- Sidebar Tab -->
  @include('includes.sidebar')
  <!-- Navigation Bar -->
  @include('includes.navbar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Header -->
    @include('includes.header')

    <!-- Main content -->
    <section oncontextmenu="return false" class="content">
      <div class="container-fluid">
        <div class="row">
        @include('includes.news-sidebar')
        <div class="col-md-9">
          <div class="card card-info card-outline">
            <div class="card-body p-0">
              <div class="mailbox-read-info clearfix">
                <div class="row">
                  <h4 class="text-md col-md-10">{{('News Title:')}}<b> {{$data->heading}}</b></h4><span class="badge text-sm badge-primary float-right col-md-2">{{$data->category}}</span>
                </div>
                <div class="row">
                  <h6 class="text-sm col-md-10">{{('Posted By:')}}<b><em> {{$data->author}}</em></b></h6><span class="mailbox-read-time float-right">{{$data->created_at->format('d M. Y h:i A')}}</span>
                </div>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-read-message" id="print-box">
                    {!! $data->body !!}
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-body -->
            @if ($data->attachment != '')
            <div class="card-footer bg-white">
                <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                  <li>
                    <span class="mailbox-attachment-icon @if( pathinfo($data->attachment, PATHINFO_EXTENSION) == 'png' OR pathinfo($data->attachment, PATHINFO_EXTENSION) == 'jpg' OR pathinfo($data->attachment, PATHINFO_EXTENSION) == 'jpeg' OR pathinfo($data->attachment, PATHINFO_EXTENSION) == 'webp') has-img @endif">
                    @if( pathinfo($data->attachment, PATHINFO_EXTENSION) == 'png' OR pathinfo($data->attachment, PATHINFO_EXTENSION) == 'jpg' OR pathinfo($data->attachment, PATHINFO_EXTENSION) == 'jpeg' OR pathinfo($data->attachment, PATHINFO_EXTENSION) == 'webp')
                      <img src="{{ asset('assets/dist/img/news/attachments/'.$data->attachment) }}" alt="Attachment">
                    @endif
                    <i class="far @if( pathinfo($data->attachment, PATHINFO_EXTENSION) == 'pdf')fa-file-pdf @elseif( pathinfo($data->attachment, PATHINFO_EXTENSION) == 'docx')fa-file-word @elseif( pathinfo($data->attachment, PATHINFO_EXTENSION) == 'doc')fa-file-word  @elseif( pathinfo($data->attachment, PATHINFO_EXTENSION) == 'ppt')fa-file-powerpoint @elseif( pathinfo($data->attachment, PATHINFO_EXTENSION) == 'mp3')fa-file-audio @endif "></i></span>

                    <div class="mailbox-attachment-info">
                      <a href="{{'download/'.$data->id}}" class="mailbox-attachment-name"><i class="fas @if( pathinfo($data->attachment, PATHINFO_EXTENSION) == 'png' OR pathinfo($data->attachment, PATHINFO_EXTENSION) == 'jpg' OR pathinfo($data->attachment, PATHINFO_EXTENSION) == 'jpeg' OR pathinfo($data->attachment, PATHINFO_EXTENSION) == 'webp') fa-camera @elseif( pathinfo($data->attachment, PATHINFO_EXTENSION) == 'mp3')fa-file-audio @elseif( pathinfo($data->attachment, PATHINFO_EXTENSION) == 'pdf' OR pathinfo($data->attachment, PATHINFO_EXTENSION) == 'pptx' OR pathinfo($data->attachment, PATHINFO_EXTENSION) == 'ppt' OR pathinfo($data->attachment, PATHINFO_EXTENSION) == 'docx' OR pathinfo($data->attachment, PATHINFO_EXTENSION) == 'doc') fa-paperclip @endif"></i> {{$data->attachment}}</a>
                          <span class="mailbox-attachment-size clearfix mt-1">
                            <span>
                              @if (\File::size(public_path('assets/dist/img/news/attachments/'.$data->attachment)) / 1048576 > 1)
                                {{ number_format( \File::size(public_path('assets/dist/img/news/attachments/'.$data->attachment)) / 1048576,2) .' MB'}}
                              @else
                                {{ number_format( \File::size(public_path('assets/dist/img/news/attachments/'.$data->attachment)) / 1024,2) .' KB'}}
                              @endif
                            </span>
                            <a href="{{'download/'.$data->id}}" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                          </span>
                    </div>
                  </li>
                </ul>
            </div>
            @endif
              <!-- /.card-footer -->
            <div class="card-footer text-center">
              <div class="float-md-right">
                @if (Auth::user()->is_admin == 1)
                <a class="btn btn-danger btn-sm" href="{{ 'delete-news/'.$data->id }}">
                    <i class="fas fa-trash">
                    </i>
                    {{__('Delete')}}
                </a>
                @endif
                <a href="{{'email-me'}}" class="btn btn-primary btn-sm"><i class="far fa-paper-plane"></i> Email Me</a>
                <button id="print" class="btn btn-warning btn-sm"><i class="fas fa-print"></i> Print</button>
              </div>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<!-- Footer -->
  @include('includes.footer')

@endsection
