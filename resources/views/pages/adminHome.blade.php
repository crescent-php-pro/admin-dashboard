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

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
            <h3 class="card-title">System Users</h3>
        </div>
        <div class="card-body table-responsive p-0" style="height: 550px;">
          <table class="table table-bordered table-hover text-nowrap table-head-fixed">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          {{__('#')}}
                      </th>
                      <th style="width: 30%">
                          {{__('Name')}}
                      </th>
                      <th style="width: 30%">
                          {{__('Email Address')}}
                      </th>
                      <th style="width: 20%">
                          {{__('Position')}}
                      </th>
                      <th style="width: 19%" class="text-center">
                          {{__('Action')}}
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($datas->sortBy('id') as $key => $data)
                  <tr>
                      <td>
                          {{ ++$key }}
                      </td>
                      <td>
                          <a>
                              {{$data->firstname}} {{$data->lastname}}
                          </a>
                          <br/>
                          <small>
                              Created {{$data->created_at->diffForHumans()}}
                          </small>
                      </td>
                      <td>
                        {{$data->email}}
                      </td>
                      <td>
                          {{$data->category}}
                        <br/>
                        <small>
                          @if ($data->is_admin == 1)
                              {{__('Admin')}}
                          @else
                            {{__('User')}}
                          @endif
                        </small>
                      </td>
                      <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" href="{{ 'view-profile/'.$data->id }}" data-toggle="lightbox" data-title="User Profile">
                              <i class="fas fa-eye">
                              </i>
                              {{__('View')}}
                            </a>
                            <!-- <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-danger">
                              <i class="fas fa-trash">
                              </i>
                              {{__('Delete')}}
                            </a> -->
                          <a class="btn btn-danger btn-sm" href="{{ 'delete-user/'.$data->id }}">
                              <i class="fas fa-trash">
                              </i>
                              {{__('Delete')}}
                          </a>
                          <!-- <div class="modal fade" id="modal-danger">
                          <div class="modal-dialog">
                            <div class="modal-content bg-default">
                              <div class="modal-header">
                                <h4 class="modal-title">Alert!</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <b>You Can't Reverse User Delete action&hellip;</b>
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-info" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-outline-danger" href="{{ 'delete-user/'.$data->id }}">
                                    {{__('Comfirm Delete')}}{{ 'delete-user/'.$data->id }}
                                </a>
                              </div>
                            </div>
                          </div>
                        </div> -->
                        <!-- /.modal -->
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->

  </div>
  <!-- Footer -->
    @include('includes.footer')
@endsection
