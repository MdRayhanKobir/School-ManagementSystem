@extends('admin.admin_master')
@section('title')
    Update Designation page
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">



            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Update Designation<img src="{{ asset('backend/images/favcon.ico') }}" alt=""
                                style="width:30px;height:30px;border-radius:50px; margin-left:5px;"></h4>
                        <h2 class="text-white d-flex"></h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('designation.update',['id'=>$designationdata->id]) }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Desigantion<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="designation" class="form-control" value="{{ $designationdata->designation }}">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end row --}}
                                        </div>
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-info" value="Update">
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </section>

        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection
