@extends('admin.admin_master')
@section('title')
    Profile-view page
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">

                        <div class="box box-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-black" style="background: url('../images/gallery/full/10.jpg') center center;">
                              <h3 class="widget-user-username">Name: {{ $userdata->name }}</h3>
                              <a href="{{ route('edit.profile') }}" class="btn btn-rounded btn-success mb-5" style="float: right">Update Profile</a>
                              <h6 class="widget-user-desc">Designation: {{ $userdata->user_type }}</h6>
                              <h6 class="widget-user-desc">E-mail: {{ $userdata->email }}</h6>
                            </div>
                            <div class="widget-user-image">
                              <img class="rounded-circle" src="{{ (!empty($userdata->image)) ? url('upload/user_images/'.$userdata->image):url('upload/no-image.jpg') }}" alt="User Avatar">
                            </div>
                            <div class="box-footer">
                              <div class="row">
                                <div class="col-sm-4">
                                  <div class="description-block">
                                    <h5 class="description-header">Mobile</h5>
                                    <span class="description-text">{{ $userdata->mobile }}</span>
                                  </div>
                                  <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 br-1 bl-1">
                                  <div class="description-block">
                                    <h5 class="description-header">Address</h5>
                                    <span class="description-text">{{ $userdata->address }}</span>
                                  </div>
                                  <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4">
                                  <div class="description-block">
                                    <h5 class="description-header">Gender</h5>
                                    <span class="description-text">{{ $userdata->gender }}</span>
                                  </div>
                                  <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                              </div>
                              <!-- /.row -->
                            </div>
                          </div>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection
