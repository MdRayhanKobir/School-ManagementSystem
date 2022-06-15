@extends('admin.admin_master')
@section('title')
    Add_assign_ssubject-view page
@endsection

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">

            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Add Assign Subject<img src="{{ asset('backend/images/favcon.ico') }}" alt=""
                                style="width:30px;height:30px;border-radius:50px; margin-left:5px;"></h4>
                        <h2 class="text-white d-flex"></h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('assign_subject.store') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="add_item">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <h5>Student  Class<span class="text-danger">*</span></h5>
                                                            <select name="class_id" id="class_id"
                                                                class="form-control">
                                                                <option value="" selected="" disabled="">Select Your Class name
                                                                </option>
                                                                @foreach ($studentclass as $studentclass)
                                                                    <option value="{{ $studentclass->id }}">
                                                                        {{ $studentclass->class}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end row --}}
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <h5>Student Subject <span class="text-danger">*</span></h5>
                                                            <select name="subject_id[]" id="subject_id"
                                                                class="form-control">
                                                                <option value="" selected="" disabled="">Select Your Subject </option>
                                                                @foreach ($studentsubject as $studentsubject)
                                                                    <option value="{{ $studentsubject->id }}">{{ $studentsubject->school_subject }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <h5>Full Mark <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="full_mark[]" class="form-control">
                                                            @error('full_mark')
                                                                <div class="alert text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <h5>Pass Mark <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="pass_mark[]" class="form-control">
                                                            @error('pass_mark')
                                                                <div class="alert text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <h5>Subjective Mark <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="subjective_mark[]" class="form-control">
                                                            @error('subjective_mark')
                                                                <div class="alert text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2" style="padding:25px;">
                                                    <span class="btn btn-success addeventmore"><i
                                                            class="fa fa-plus-circle"></i></span>

                                                </div>
                                            </div>
                                            {{-- end row --}}
                                        </div>
                                        {{-- end add_item --}}
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

@php
    $studentsubject=DB::table('school_subjects')->get();
@endphp
    <div style="visibility:hidden">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                <div class="form-row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="controls">
                                <h5>Student Subject <span class="text-danger">*</span></h5>
                                <select name="subject_id[]" id="subject_id"
                                    class="form-control">
                                    <option value="" selected="" disabled="">Select Your Subject </option>
                                    @foreach ($studentsubject as $studentsubject)
                                        <option value="{{ $studentsubject->id }}">{{ $studentsubject->school_subject }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <h5>Full Mark <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="full_mark[]" class="form-control">
                                @error('full_mark')
                                    <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <h5>Pass Mark <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="pass_mark[]" class="form-control">
                                @error('pass_mark')
                                    <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <h5>Subjective Mark <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="subjective_mark[]" class="form-control">
                                @error('subjective_mark')
                                    <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2" style="padding:25px;">
                        <span class="btn btn-success addeventmore"><i
                                class="fa fa-plus-circle"></i></span>
                        <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i> </span>


                    </div>




                </div>
            </div>
        </div>
    </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){

            var counter = 0;
            $(document).on("click",".addeventmore",function(){
                var whole_extra_item_add = $('#whole_extra_item_add').html();
                $(this).closest(".add_item").append(whole_extra_item_add);
                counter++;
            });
            $(document).on("click",'.removeeventmore',function(event){
                $(this).closest(".delete_whole_extra_item_add").remove();
                counter -= 1
            });

        });
    </script>

@endsection
