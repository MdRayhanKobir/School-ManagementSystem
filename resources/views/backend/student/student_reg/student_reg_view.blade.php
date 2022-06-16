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
                    <div class="col-md-12">
                    <div class="box box-solid " style="background: rgba(52, 172, 224,0.6)!important">
                        <div class="box-header">
                          <h4 class="box-title"><strong>Search</strong></h4>
                        </div>
                        <div class="box-body">
                            <form action="">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Year<span class="text-danger"></span></h5>
                                            <div class="controls">
                                                <select name="year_id" id="year_id" class="form-control">
                                                    <option value="">Select Student Year</option>
                                                    @foreach ($yeardata as $years )
                                                    <option value="{{ $years->id }}"{{ (@$year_id==$years->id)? "selected":"" }}>{{ $years->year }}</option>
                                                    @endforeach

                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Class<span class="text-danger"></span></h5>
                                            <div class="controls">
                                                <select name="class_id" id="class_id" class="form-control">
                                                    <option value="">Select Student Class</option>
                                                    @foreach ($classdata as $classes )
                                                    <option value="{{ $classes->id }}"{{ (@$class_id==$classes->id)? "selected":"" }}>{{ $classes->class }}</option>
                                                    @endforeach

                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group" style="margin-top:25px">
                                        <input type="submit" class="btn btn-rounded btn-outline-success mb-5"name="search" value="Search">
                                       </div>
                                    </div>
                                </div>
                            </form>
                         
                        </div>
                      </div>
                    </div>
                    {{-- end search card --}}
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
                                                <th>Roll</th>
                                                <th>Class</th>
                                                <th>Year</th>
                                                <th>Image</th>
                                                @if (Auth::user()->role=="Admin")
                                                <th>Code</th>
                                                @endif
                                                <th style="width:25%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($assignStudent as $key=>$value )
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $value->student->name}}</td>
                                                <td>{{ $value->roll }}</td>
                                                <td>{{ $value->student_class->class}}</td>
                                                <td>{{ $value->student_year->year}}</td>
                                                <td><img src="{{ (!empty($value->student->image)) ?url('upload/student_images/'.$value->student->image):url('upload/no-image.jpg') }}" class="rounded" id="showimage" alt="" style="width: 50px;height:50px;"></td>
                                                <td>{{ $value->student->code}}</td>
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
