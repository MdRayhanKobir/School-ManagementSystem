@extends('admin.admin_master')
@section('title')
    Fee Assign_Subject details  page
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
                                <h3 class="box-title">Fee Assign Subject Details<img src="{{ asset('backend/images/favcon.ico')}}" alt="" style="width:30px;height:30px;border-radius:50px; margin-left:5px;"></h3>
                                <a href="{{ route('feeamount.add') }}" class="btn btn-rounded btn-success mb-5" style="float: right">Add Assign Subject</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <h4>Assign Subject <strong></strong></h4>
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Subject</th>
                                                <th style="width:25%">Full Mark</th>
                                                <th style="width:25%">Pass Mark</th>
                                                <th style="width:25%">Subjective Mark</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($assignsubject as $key=>$assignsubjectdetails )
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $assignsubjectdetails->studentSubject->school_subject}}</td>
                                                <td class="">{{ $assignsubjectdetails->full_mark }}</td>
                                                <td class="">{{ $assignsubjectdetails->pass_mark }}</td>
                                                <td class="">{{ $assignsubjectdetails->subjective_mark }}</td>
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
