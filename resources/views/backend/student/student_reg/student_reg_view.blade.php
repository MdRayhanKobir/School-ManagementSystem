@extends('admin.admin_master')
@section('title')
    Student Registration view page
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
                                <h3 class="box-title">Student Registration List<img src="{{ asset('backend/images/favcon.ico')}}" alt="" style="width:30px;height:30px;border-radius:50px; margin-left:5px;"></h3>
                                <a href="{{ route('student.reg.add') }}" class="btn btn-rounded btn-success mb-5" style="float: right">Add Registration</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Id No</th>
                                                <th style="width:25%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($assignStudent as $key=>$value )
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $value->class_id}}</td>
                                                <td>{{ $value->year_id}}</td>
                                                <td class="d-flex m">
                                                    <a href=""class="btn btn-info mr-3 ">Edit</a>
                                                    <a href=""class="btn btn-danger" id="delete">Delete</a>
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
