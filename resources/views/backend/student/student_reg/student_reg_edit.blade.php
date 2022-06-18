@extends('admin.admin_master')
@section('title')
    Update Student Registration page
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
                        <h4 class="box-title">Update Student Registration<img src="{{ asset('backend/images/favcon.ico') }}"
                                alt="" style="width:30px;height:30px;border-radius:50px; margin-left:5px;"></h4>
                        <h2 class="text-white d-flex"></h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('student.registration.update',['student_id'=>$assign_student->student_id]) }}" method="post"enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $assign_student->id }}">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Student Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="name" class="form-control" required=""value="{{ $assign_student->student->name }}">
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
                                                            <input type="text" name="fname" class="form-control" required=""value="{{ $assign_student->student->fname }}">
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
                                                            <input type="text" name="mname" class="form-control" required=""value="{{ $assign_student->student->mname }}">
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
                                                            <input type="text" name="mobile" class="form-control" required=""value="{{ $assign_student->student->mobile }}">
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
                                                            <input type="text" name="address" class="form-control" required=""value="{{ $assign_student->student->address }}">
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
                                                                <option value="Male"{{ ($assign_student->student->gender=='Male')? "selected":"" }}>Male</option>
                                                                <option value="Female"{{ ($assign_student->student->gender=='Female')? "selected":"" }}>Female</option>
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
                                                                <option value="Islam"{{ ($assign_student->student->religion=='Islam')? "selected":"" }}>Islam</option>
                                                                <option value="Hindu"{{ ($assign_student->student->religion=='Hindu')? "selected":"" }}>Hindu</option>
                                                                <option value="Christan"{{ ($assign_student->student->religion=='Christan')? "selected":"" }}>Christan</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Birth of Date <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="date" name="dob" class="form-control" required="" value="{{ $assign_student->student->dob }}">
                                                            @error('dob')
                                                                <div class="alert text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Discount <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="discount" class="form-control" required=""value="{{ $assign_student->discount->discount }}">
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
                                                                @foreach ($student_year as $years )
                                                                <option value="{{ $years->id }}"{{ ($assign_student->year_id==$years->id)? "selected":"" }}>{{ $years->year }}</option>
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
                                                                @foreach ($student_class as $classes )
                                                                <option value="{{ $classes->id }}"{{ ($assign_student->class_id==$classes->id)? "selected":"" }}>{{ $classes->class }}</option>
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
                                                                @foreach ($student_group as $groups )
                                                                <option value="{{ $groups->id }}"{{ ($assign_student->group_id==$groups->id)? "selected":"" }}>{{ $groups->student_group }}</option>
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
                                                                @foreach ($student_shift as $shifts )
                                                                <option value="{{ $shifts->id }}"{{ ($assign_student->shift_id==$shifts->id)? "selected":"" }}>{{ $shifts->shift }}</option>
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
                                                            <img  src="{{ (!empty($assign_student->student->image)) ?url('upload/student_images/'.$assign_student->student->image):url('upload/no-image.jpg') }}" class="rounded" id="showimage" alt="" style="width: 80px;height:80px;">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- 5th row end --}}
                                        </div>
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-info" value="Update">
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
