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
    <section class="content row">
      <!-- Default box -->
      @include('includes.news-sidebar')
      <div class="col-md-9">
        <div class="card card-info card-outline">
          <form class="form-horizontal" action="{{ 'add-news-action'}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-header">
                <h3 class="card-title">Compose News</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="form-group col-lg-8">
                  <input type="hidden" name="user_id" value="{{auth::user()->id}}">
                  <input type="hidden" name="author" value="{{ Auth::user()->firstname}} {{ Auth::user()->lastname}}">
                  <input type="text" name="heading" value="{{ old('heading') }}" class="form-control" placeholder="Enter Title of News" required>
                </div>
                <div class="form-group col-lg-4">
                    <select class="form-control" value="{{ old('category')}}" name="category" required>
                      <option value="" hidden>Select Category</option>
                      <option>Important</option>
                      <option>Sports</option>
                    </select>
                </div>
              </div>
                <div class="form-group">
                  <textarea id="compose-textarea" placeholder="Click to type..." name="body" value="{{ old('body') }}" class="form-control" style="height: 550px" required></textarea>
                </div>
                <div class="form-group">
                  <div class="btn btn-default btn-file custom-ffile">
                    <i class="fas fa-paperclip"></i> Attachment
                    <input type="file" value="{{ old('attachment') }}" name="attachment" class="form-control @error('attachment') is-invalid @enderror" id="customdFile">
                  </div>
                    <p class="help-block text-sm">Max. 32MB</p>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                  <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Draft</button>
                  <button type="submit" class="btn btn-info"><i class="far fa-envelope"></i> Post</button>
                </div>
                  <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
              </div>
                  <!-- /.card-footer -->
          </form>
        </div>
            <!-- /.card -->
      </div>
      </section>
        <!-- /.content -->
    </div>
      <!-- Footer -->
        @include('includes.footer')

@endsection
