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
    <section class="content">
      <div class="row">
        @include('includes.news-sidebar')
        <div class="col-md-9">
          <div class="card card-info card-outline">
            <div class="card-header">
              <h3 class="card-title">News List</h3>
              @if(!empty($data))
              <div class="card-tools">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Search News">
                  <div class="input-group-append">
                    <div class="btn btn-info">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                </div>
              </div>
              @endif
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
            @if(!empty($data) && $data->count())
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover">
                  <tbody>
                    @foreach ($data->sortByDesc('id') as $key => $news)
                      <tr>
                        <td class="mailbox-name" style="width: 25%"><a href="{{'news-'.$news->id}}">{{$news->author}}</a></td>
                        <td class="mailbox-subject" style="width: 65%">
                          <span class="badge badge-info">{{ $news->category }}</span>
                          <b>{{ $news->heading }}</b>
                          <!-- - {!! \Illuminate\Support\Str::limit($news->body, 10, $end='...') !!} -->
                        </td>
                        <td class="mailbox-attachment" style="width: 5%">
                        @if($news->attachment != '')
                          <i class="fas fa-paperclip"></i>
                        @endif
                        </td>
                        <td class="mailbox-date text-sm" style="width: 5%">{{ $news->created_at->format('d/m/Y h:i A') }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
              @else
                {{'No News Published!'}}
              @endif
            </div>
            <!-- /.card-body -->
            @if(!empty($data) && $data->count())
            <div class="card-footer p-0">
              <div class="mailbox-controls">
                <div class="float-right">
                  1- @if( count($data) < 10) {{ count($data)}} @else 10 @endif/{{ $data->total() }}
                  <div class="btn-group btn-sm">
                    {!! $data->appends(['sort' => 'id'])->links() !!}
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
            </div>
            @endif
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      </section>
        <!-- /.content -->
    </div>
      <!-- Footer -->
        @include('includes.footer')

@endsection
