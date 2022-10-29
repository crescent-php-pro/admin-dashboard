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
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-comment"></i> Chats</h3>
                    </div>
                    <div class="card-body p-0">
                        <ul class="contacts-list nav nav-pills flex-column">
                            @foreach($data as $contact)
                            <li>
                                <a href="#">
                                    <img class="contacts-list-img" src="{{ asset('assets/dist/img/profile/'.$contact->user_profile) }}" alt="User Avatar">

                                <div class="contacts-list-info">
                                    <span class="contacts-list-name">
                                    {{$contact->firstname}} {{$contact->lastname}}
                                    </span>
                                    <span class="badge bg-primary float-right">12</span>
                                    <span class="contacts-list-msg">I will be waiting for...</span>
                                </div>
                                <!-- /.contacts-list-info -->
                                </a>
                            </li>
                            @endforeach
                            <!-- End Contact Item -->
                        </ul>
                        <!-- /.contacts-list -->
                    </div>
                    <!-- /.card-body -->
               </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
              <div class="col-md-8">
                <div class="card">
                  <div class="card-header p-2">
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                            <i class="fas fa-comments"></i>
                        </button>
                        <button type="button" class="btn btn-tool">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                    </div>
                  </div><!-- /.card-header -->
                  <div class="card-body">
                          <!-- DIRECT CHAT -->
                          <div class="direct-chat direct-chat-primary">
                              <!-- Conversations are loaded here -->
                              <div class="direct-chat-messages">
                                <!-- Message. Default to the left -->
                                <div class="direct-chat-msg">
                                  <!-- /.direct-chat-infos -->
                                  <img class="direct-chat-img" src="{{ asset('assets/dist/img/profile/'.Auth::user()->user_profile) }}" alt="message user image">
                                  <!-- /.direct-chat-img -->
                                  <div class="direct-chat-text">
                                    Is this template really for free? That's unbelievable!
                                  </div>
                                  <!-- /.direct-chat-text -->
                                  <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-timestamp float-right">{{now()->format('d M H:s')}}</span>
                                  </div>
                                  <!-- /.direct-chat-infos -->
                                </div>
                                <!-- /.direct-chat-msg -->

                                <!-- Message to the right -->
                                <div class="direct-chat-msg right">
                                  <img class="direct-chat-img" src="{{ asset('assets/dist/img/profile/'.Auth::user()->user_profile) }}" alt="message user image">
                                  <!-- /.direct-chat-img -->
                                  <div class="direct-chat-text">
                                    You better believe it!
                                  </div>
                                  <!-- /.direct-chat-text -->
                                  <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                                  </div>
                                  <!-- /.direct-chat-infos -->
                                </div>
                                <!-- /.direct-chat-msg -->
                              </div>
                              <!--/.direct-chat-messages-->
                            <div class="card-footer">
                              <form action="{{ 'send-messages' }}" method="post">
                                @csrf
                                <div class="input-group">
                                  <input type="text" name="content" value="{{ old('content') }}" placeholder="Type Message ..." class="form-control">
                                  <input type="hidden" name="sender_id" value="1">
                                  <input type="hidden" name="recipient_id" value="2">
                                  <span class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                  </span>
                                </div>
                              </form>
                            </div>
                            <!-- /.card-footer-->
                          </div>
                          <!--/.direct-chat -->
                  </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
          </div>
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
