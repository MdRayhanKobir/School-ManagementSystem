@extends('admin.admin_master')
@section('title')
    Add_Fee-Amount-view page
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">

            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Add Fee Amount<img src="{{ asset('backend/images/favcon.ico') }}" alt=""
                                style="width:30px;height:30px;border-radius:50px; margin-left:5px;"></h4>
                        <h2 class="text-white d-flex"></h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form action="" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <h5>Fee category <span class="text-danger">*</span></h5>
                                                            <select name="fee_category_id[]" id="fee_category" class="form-control">
                                                                <option value="" disabled>Select Your fee category </option>
                                                                @foreach ( $feecategory as $feecategory )
                                                                <option value="{{ $feecategory->id }}">{{ $feecategory->feecategory }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end row --}}
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <h5>Student Class <span class="text-danger">*</span></h5>
                                                            <select name="class_id[]" id="fee_category" class="form-control">
                                                                <option value="" disabled>Select Your class </option>
                                                                @foreach ( $studentclass as $studentclass )
                                                                <option value="{{ $studentclass->id }}">{{ $studentclass->class }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <h5>Fee Amount <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="amount[]" class="form-control">
                                                            @error('amount')
                                                                <div class="alert text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2" style="padding-top:25px;">
                                                    <span class="btn btn-success adeventmore"><i class="fa fa-plus-circle"></i></span>

                                                </div>
                                            </div>
                                            {{-- end row --}}
                                        </div>
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-info" value="Submit">
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
