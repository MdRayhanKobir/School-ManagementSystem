@extends('admin.admin_master')
@section('title')
    Exam_type view page
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
                                <h3 class="box-title">Exam Type List<img src="{{ asset('backend/images/favcon.ico')}}" alt="" style="width:30px;height:30px;border-radius:50px; margin-left:5px;"></h3>
                                <a href="{{ route('examtype.add') }}" class="btn btn-rounded btn-success mb-5" style="float: right">Add Exam Type Name</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Exam Type Name</th>
                                                <th style="width:25%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($examtype as $key=>$examtype )
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $examtype->exam_type}}</td>
                                                <td class="d-flex m">
                                                    <a href="{{ route('examtype.edit',['id'=>$examtype->id]) }}"class="btn btn-info mr-3 ">Edit</a>
                                                    <a href="{{ route('examtype.delete',['id'=>$examtype->id]) }}"class="btn btn-danger" id="delete">Delete</a>
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
