@extends('admin.admin_master')
@section('title')
    School Subject view page
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
                                <h3 class="box-title">School Subject List<img src="{{ asset('backend/images/favcon.ico')}}" alt="" style="width:30px;height:30px;border-radius:50px; margin-left:5px;"></h3>
                                <a href="{{ route('s_subject.add') }}" class="btn btn-rounded btn-success mb-5" style="float: right">Add School Subject Name</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>School Subject Name</th>
                                                <th style="width:25%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($schoolsubject as $key=>$schoolsubject )
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $schoolsubject->school_subject}}</td>
                                                <td class="d-flex m">
                                                    <a href="{{ route('s_subject.edit',['id'=>$schoolsubject->id]) }}"class="btn btn-info mr-3 ">Edit</a>
                                                    <a href="{{ route('s_subject.delete',['id'=>$schoolsubject->id]) }}"class="btn btn-danger" id="delete">Delete</a>
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
