@extends('admin.admin_master')
@section('title')
    Fee Amount details  page
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
                                <h3 class="box-title">Fee Amount Details<img src="{{ asset('backend/images/favcon.ico')}}" alt="" style="width:30px;height:30px;border-radius:50px; margin-left:5px;"></h3>
                                <a href="{{ route('feeamount.add') }}" class="btn btn-rounded btn-success mb-5" style="float: right">Add Fee Amount</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <h4>Fee category <strong>{{ $feeamountdetails['0']->feeCategory->feecategory }}</strong></h4>
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Class Name</th>
                                                <th style="width:25%">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($feeamountdetails as $key=>$amount )
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $amount->studentClass->class}}</td>
                                                <td class="d-flex m">{{ $amount->amount }}   </td>
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
