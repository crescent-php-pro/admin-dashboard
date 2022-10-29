@extends('layouts.app')

@section('content')
<div class="col-md-12">
  <!-- Widget: user widget style 1 -->
  <div class="card card-widget widget-user">
    <!-- Add the bg color to the header using any of the bg-* classes -->
    <div class="widget-user-header bg-info">
      <h3 class="widget-user-username">{{ $datas->firstname }} {{ $datas->lastname }}</h3>
      <h5 class="widget-user-desc">{{ $datas->category }}</h5>
    </div>
    <div class="widget-user-image">
      <img class="img-circle elevation-2" src="{{ asset('assets/dist/img/profile/'.$datas->user_profile)}}" alt="User Avatar">
    </div>
    <div class="card-footer">
      <div class="row">
        <div class="col-sm-6 border-right">
          <div class="description-block">
            <!-- <h5 class="description-header">Email</h5>
            <span class="description-text">SALES</span> -->
            <input class="btn btn-sm btn-outline-info btn-block" type="button" title="{{$datas->email}}" value="Email">
          </div>
          <!-- /.description-block -->
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <div class="description-block">
            <input class="btn btn-sm btn-outline-primary" type="button" title="{{$datas->phone}}" value="Call">
            <input class="btn btn-sm btn-outline-secondary" type="button" title="{{$datas->phone}}" value="Text">
          </div>
          <!-- /.description-block -->
        </div>
        <!-- /.col -->
      </div>

      <hr>

      <strong><i class="fas fa-book mr-1"></i> Education</strong>

      <p class="text-muted">
        B.S. in Computer Eng from the University of Mbeya
      </p>

      <hr>

      <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

      <p class="text-muted">Iyunga, Mbeya</p>

      <hr>

      <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

      <p class="text-muted">
        <span class="tag tag-danger">UI Design</span>
        <span class="tag tag-success">Coding</span>
        <span class="tag tag-info">Javascript</span>
        <span class="tag tag-warning">PHP</span>
        <span class="tag tag-primary">Node.js</span>
      </p>
      <!-- /.row -->
    </div>
  </div>
  <!-- /.widget-user -->
</div>
<!-- /.col -->
@endsection
