@extends('admin.admin_master')
@section('title')
    Add Student Registration page
@endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Add Student Registration<img src="{{ asset('backend/images/favcon.ico') }}"
                                alt="" style="width:30px;height:30px;border-radius:50px; margin-left:5px;"></h4>
                        <h2 class="text-white d-flex"></h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('student.reg.store') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Student Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="name" class="form-control" required="">
                                                            @error('name')
                                                                <div class="alert text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Father's Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="fname" class="form-control" required="">
                                                            @error('fname')
                                                                <div class="alert text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Mother's Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="mname" class="form-control" required="">
                                                            @error('mname')
                                                                <div class="alert text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end row --}}

                                            {{-- start 2nd row --}}
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Mobile Number <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="mobile" class="form-control" required="">
                                                            @error('mobile')
                                                                <div class="alert text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Address <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="address" class="form-control" required="">
                                                            @error('address')
                                                                <div class="alert text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Gender<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="gender" id="gender" class="form-control">
                                                                <option value="">Select Student Gender</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- end 2nd row --}}

                                            {{-- start 3rd row --}}
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Religion<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="religion" id="religion" class="form-control">
                                                                <option value="">Select Student Religion</option>
                                                                <option value="Islam">Islam</option>
                                                                <option value="Hindu">Hindu</option>
                                                                <option value="Christan">Christan</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Birth of Date <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="date" name="date" class="form-control" required="">
                                                            @error('date')
                                                                <div class="alert text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Discount <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="discount" class="form-control" required="">
                                                            @error('discount')
                                                                <div class="alert text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end 3rd row --}}

                                            {{-- 4th row star --}}
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Year<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="year_id" id="year_id" class="form-control">
                                                                <option value="">Select Student Year</option>
                                                                @foreach ($yeardata as $years )
                                                                <option value="{{ $years->id }}">{{ $years->year }}</option>
                                                                @endforeach

                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Class<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="class_id" id="class_id" class="form-control">
                                                                <option value="">Select Student Class</option>
                                                                @foreach ($classdata as $classes )
                                                                <option value="{{ $classes->id }}">{{ $classes->class }}</option>
                                                                @endforeach

                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Group<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="group_id" id="group_id" class="form-control">
                                                                <option value="">Select Student Group</option>
                                                                @foreach ($groupdata as $groups )
                                                                <option value="{{ $groups->id }}">{{ $groups->student_group }}</option>
                                                                @endforeach

                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- 4th row end --}}

                                            {{-- 5th row star --}}
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Shift<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="shift_id" id="shift_id" class="form-control">
                                                                <option value="">Select Student Shift</option>
                                                                @foreach ($shiftdata as $shifts )
                                                                <option value="{{ $shifts->id }}">{{ $shifts->shift }}</option>
                                                                @endforeach

                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Image<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="file" name="image" id="image" class="form-control" >
                                                            @error('image')
                                                                <div class="alert text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <img  src="{{ url('upload/no-image.jpg') }}" class="rounded" id="showimage" alt="" style="width: 80px;height:80px;">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- 5th row end --}}
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



    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader=new FileReader();
                reader.onload=function(e){
                    $('#showimage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });

        </script>
@endsection
