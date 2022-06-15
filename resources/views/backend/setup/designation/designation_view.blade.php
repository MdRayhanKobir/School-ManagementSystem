@extends('admin.admin_master')
@section('title')
    Designation view page
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Designation List<img src="{{ asset('backend/images/favcon.ico')}}" alt="" style="width:30px;height:30px;border-radius:50px; margin-left:5px;"></h3>
                                <a href="{{ route('designation.add') }}" class="btn btn-rounded btn-success mb-5" style="float: right">Add Designation</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Designation</th>
                                                <th style="width:25%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($designation as $key=>$designations )
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $designations->designation}}</td>
                                                <td class="d-flex m">
                                                    <a href="{{ route('designation.edit',['id'=>$designations->id]) }}"class="btn btn-info mr-3 ">Edit</a>
                                                    <a href="{{ route('designation.delete',['id'=>$designations->id]) }}"class="btn btn-danger" id="delete">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
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
