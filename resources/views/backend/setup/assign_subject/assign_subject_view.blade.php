@extends('admin.admin_master')
@section('title')
    Assign Subject view page
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
                                <h3 class="box-title">Assign Subject List<img src="{{ asset('backend/images/favcon.ico')}}" alt="" style="width:30px;height:30px;border-radius:50px; margin-left:5px;"></h3>
                                <a href="{{ route('assign_subject.add') }}" class="btn btn-rounded btn-success mb-5" style="float: right">Add Assign Subject</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Class Name</th>
                                                <th style="width:25%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($assignsubject as $key=>$assignsubjects )
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $assignsubjects->studentClass->class}}</td>
                                                <td class="d-flex m">
                                                    <a href="{{ route('assign_subject.edit',['class_id'=>$assignsubjects->class_id]) }}"class="btn btn-info mr-3 ">Edit</a>
                                                    <a href="{{ route('assign_subject.delete',['class_id'=>$assignsubjects->class_id]) }}"class="btn btn-danger mr-3" id="delete">Delete</a>
                                                    <a href="{{ route('assign_subject.details',['class_id'=>$assignsubjects->class_id]) }}"class="btn btn-info">Details</a>
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
