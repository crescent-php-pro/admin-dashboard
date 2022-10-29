@extends('layouts.auth')

@section('content')
    <!-- general form elements disabled -->
    <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">{{ __('Register to Continue..') }}</h3>
              </div>
              <!-- /.card-header -->

              <div class="card-body">
                <div class="bs-stepper">
                  <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#logins-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                        <span class="bs-stepper-circle"><i class="fa fa-user"></i> </span>
                        <span class="bs-stepper-label">{{ __('Credentials') }}</span>
                      </button>
                    </div>
                    <div class="line"></div>
                  </div>

                  <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                <form id="registerForm" class="form-horizontal" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="row">
                        <div class="col-lg-6">
                        <!-- text input -->
                        <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label for="firstname" class="control-label">{{ __('Firstname') }}</label>
                                    <input id="name" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" placeholder="Enter Firstname" required autocomplete="firstname" autofocus>

                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <!-- text input -->
                                <div class="col-lg-6 form-group">
                                        <label for="lastname" class="control-label">{{ __('Lastname') }}</label>

                                            <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" placeholder="Enter Lastname" required autocomplete="firstname" autofocus>

                                            @error('lastname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                </div>
                            </div>
                            <!-- Email Input -->
                            <div class="form-group">
                                <label for="email" class="control-label">{{ __('E-Mail Address') }}</label>

                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <!-- Mobile Phone input -->
                            <div class="form-group">
                                <label for="phone" class="control-label">Mobile Phone</label>

                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Enter Phone Number" data-inputmask='"mask": "+255 999-9999-99"' data-mask required autocomplete="phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                        <!-- select -->
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="category" class="control-label">{{ __('Category') }}</label>
                                <select name="category" value="{{ old('category') }}" class="form-control @error('category') is-invalid @enderror">
                                  <option hidden value="">{{ __('Select Category') }}</option>
                                  <option>{{ __('RECEPTION') }}</option>
                                  <option>{{ __('ACCOUNTANT') }}</option>
                                  <option>{{ __('MANAGER') }}</option>
                                </select>
                                <input type="hidden" name="user_type" value="0">

                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <label>{{ __('Upload Profile Picture') }}</label>
                                <div class="custom-file">
                                  <input type="file" capture="user" accept="image/*" name="profile" value="{{ old('profile') }}" class="custom-file-input form-control @error('customFile') is-invalid @enderror" id="customFile">
                                  <label class="custom-file-label form-control" for="customFile">{{ __('Choose file') }}</label>
                                </div>

                                @error('customFile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Password input -->
                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">{{ __('Password') }}</label>

                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" name="password" required autocomplete="password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">{{ __('Confirm Password') }}</label>

                                <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" autocomplete="password-comfirm">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <span class="text-danger font-weight-bold">*</span><em>{{ __(' All fields are required') }}</em><br>
                            <span class="text-danger font-weight-bold">*</span><em>{{ __(' Make sure you enter correct informations') }}</em>
                        </div>
                        <div class="form-group col-sm-4 text-center">
                              <a class="btn btn-link text-muted" href="{{ route('login') }}">
                                <i class="fa fa-btn fa-sign-in"></i>
                                  {{ __('Back to Login') }}
                              </a>
                        </div>
                        <div class="col-sm-4">
                            <input type="submit" class="btn btn-info float-right" value="Register">
                        </div>
                    </div>
                </form>
              </div>
            </div>
            </div>
          </div>
          </div>
        </div>
        <!-- /.card-body -->
@endsection
