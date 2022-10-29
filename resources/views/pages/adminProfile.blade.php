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
              <div class="col-md-4">

                <!-- Profile Image -->
                <div class="card card-info card-outline">
                  <div class="card-body box-profile">
                    <div class="text-center profile-user-img-alt">
                        @if (Auth::user()->user_profile != '')
                        <img class="profile-user-img img-fluid img-circle"
                             src="{{ asset('assets/dist/img/profile/'.Auth::user()->user_profile) }}"
                             alt="User profile picture">
                        @else
                        <img class="profile-user-img img-fluid img-circle img-responsive"
                             src="{{ asset('assets/dist/img/avatar.png')}}"
                             alt="User profile picture">
                        @endif
                        <div class="profile-user-img-content">
                            <span class="profile-user-img-icon">
                              <i class="fas fa-camera"></i>
                            </span>
                            <form id="updatePicture" action="{{ 'update-profile-picture/'}}{{ Auth::user()->id }}" method="POST">
                              @csrf
                              @method('PUT')
                                <input type="file" accept="image/*" name="updatePicture" value="{{ old('updatePicture') }}" disabled>
                            </form>
                            <span class="profile-user-img-text">
                              {{__('Edit Profile')}}
                            </span>
                        </div>
                    </div>

                    <h3 class="profile-username text-center">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h3>

                    <p class="text-muted text-center">
                      @if (Auth::user()->is_admin == 1)
                        {{__('ADMIN')}}
                      @endif
                    </p>

                    <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <h6><i class="fas fa-briefcase"></i> Position: <strong>{{ Auth::user()->category }}</strong></h6>
                      </li>
                      <li class="list-group-item">
                        <h6><i class="fas fa-calendar"></i> Joined: <strong>{{ Auth::user()->created_at->format('F Y') }}</strong></h6>
                      </li>
                      <li class="list-group-item text-center">
                        <input id="updatePicture-btn" type="submit" class="btn btn-outline-info" onclick="document.getElementById('updatePicture').submit();document.getElementById('updatePicture-btn').value='Saving...'" value="Save Photo" disabled>
                        <input type="button" class="btn btn-outline-info" onclick="document.querySelectorAll('input').forEach(element => element.disabled = false);" value="Edit Profile">
                      </li>
                    </ul>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
              <div class="col-md-8">
                <div class="card">
                  <div class="card-header p-2">
                    <ul class="nav nav-pills">
                      <li class="nav-item"><a class="nav-link active" href="#personal" data-toggle="tab">Personal</a></li>
                      <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Security</a></li>
                    </ul>
                  </div><!-- /.card-header -->
                  <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="personal">
                          <form action="{{ 'update-profile/'}}{{ Auth::user()->id }}" method="POST" class="form-horizontal" id="quickForm">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                              <label for="inputName" class="col-sm-2 col-form-label">Firstname</label>
                              <div class="col-sm-10 js-error">
                                <input type="text" name="firstname" class="form-control" id="show-edit-items" value="{{ Auth::user()->firstname }}" placeholder="Firstame" required disabled>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputName" class="col-sm-2 col-form-label">Lastname</label>
                              <div class="col-sm-10 js-error">
                                <input type="text" name="lastname" class="form-control" id="show-edit-items" value="{{ Auth::user()->lastname }}" placeholder="Lastame" required disabled>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                              <div class="col-sm-10 js-error">
                                <input type="email" name="email" class="form-control" id="show-edit-items" value="{{ Auth::user()->email }}" placeholder="Enter email" required disabled>
                              </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                  <div class="col-sm-10 js-error">
                                    <input id="show-edit-items" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ Auth::user()->phone }}" placeholder="Enter Phone Number" data-inputmask='"mask": "+255 999-9999-99"' data-mask required autocomplete="phone" disabled>
                                  </div>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group row">
                              <div class="col-lg-6 row">
                                <label for="created_at" class="col-sm-4 col-form-label">Created at</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="created_at" value="{{ Auth::user()->created_at->format('M d, Y') }}" readonly>
                                </div>
                              </div>
                              <div class="col-md-6 row">
                                <label for="updated_at" class="col-sm-4 col-form-label">Updated at</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="updated_at" value="{{ Auth::user()->updated_at->format('M d, Y') }}" readonly>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="offset-sm-2 col-sm-10">
                                <input type="submit" class="btn btn-info" value="Update" id="update-btn" onclick="document.getElementById('update-btn').value='Updating..';" disabled>
                                <input type="reset" class="btn btn-default float-right" value="Cancel" disabled>
                              </div>
                            </div>
                          </form>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="settings">
                          <!-- form start -->
                          <form action="{{ 'change-password' }}" method="POST" class="form-horizontal" id="ChangePwdForm">
                            @csrf
                            @foreach ($errors->all() as $error)
                              <p class="text-danger">{{ $error }}</p>
                            @endforeach
                              <div class="form-group row">
                                  <label for="oldPwd" class="col-sm-3 col-form-label">Current Password</label>
                                  <input type="password" name="current_password" class="form-control col-sm-9" id="current_password" placeholder="" required disabled>
                              </div>
                              <div class="form-group row">
                                <label for="newPwd" class="col-sm-3 col-form-label">New Password</label>
                                <input type="password" name="new_password" class="form-control col-sm-9" id="new_password" placeholder="" required disabled>
                              </div>
                              <div class="form-group row">
                                <label for="comfirmNewPwd" class="col-sm-3 col-form-label">Comfirm Password</label>
                                <input type="password" name="new_confirm_password" class="form-control col-sm-9" id="new_confirm_password" placeholder="" disabled>
                              </div>
                              <!-- <div class="form-group row">
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                                  <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                                </div>
                              </div> -->
                            <!-- /.card-body -->
                            <div class="form-group row">
                              <div class="offset-sm-3 col-sm-9">
                                <input type="submit" class="btn btn-info" value="Update" disabled>
                              </div>
                            </div>
                          </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                  </div><!-- /.card-body -->
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
