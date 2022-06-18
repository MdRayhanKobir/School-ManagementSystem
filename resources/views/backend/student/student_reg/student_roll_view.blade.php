@extends('admin.admin_master')
@section('title')
    Student Roll view page
@endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                    <div class="box box-solid " style="background: rgba(52, 172, 224,0.6)!important">
                        <div class="box-header">
                          <h4 class="box-title"><strong>Student Roll Generate</strong></h4>
                        </div>
                        <div class="box-body">
                            <form action="{{ route('student.roll.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-5">
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

                                    <div class="col-md-5">
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
                                    <div class="col-md-2">
                                       <div class="form-group" style="margin-top:25px">
                                        <a id="search" class="btn btn-rounded btn-outline-success mb-5"name="search">Search</a>
                                       </div>
                                    </div>
                                </div>


              {{-- ===========roll generate table========== --}}

              <div class="row d-none"id="roll-generate">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped"style="width:100%">
                        <thead>
                            <tr>
                                <th>ID No</th>
                                <th>Father Name</th>
                                <th>Mother Name</th>
                                <th>Gender</th>
                                <th>Roll</th>
                            </tr>
                        </thead>
                        <tbody id="roll-generate-tr">

                        </tbody>


                    </table>

                </div>

              </div>
              <input type="submit" class="btn btn-primary" name="" id=""value="Roll Generator">

                            </form>
                        </div>
                      </div>
                    </div>
                    {{-- end search card --}}
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>
    <!-- /.content-wrapper -->



    <script type="text/javascript">
        $(document).on('click','#search',function(){
          var year_id = $('#year_id').val();
          var class_id = $('#class_id').val();
           $.ajax({
            url: "{{ route('student.registration.getstudents')}}",
            type: "GET",
            data: {'year_id':year_id,'class_id':class_id},
            success: function (data) {
              $('#roll-generate').removeClass('d-none');
              var html = '';
              $.each( data, function(key, v){
                html +=
                '<tr>'+
                '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"></td>'+
                '<td>'+v.student.name+'</td>'+
                '<td>'+v.student.fname+'</td>'+
                '<td>'+v.student.gender+'</td>'+
                '<td><input type="text" class="form-control form-control-sm" name="roll[]" value="'+v.roll+'"></td>'+
                '</tr>';
              });
              html = $('#roll-generate-tr').html(html);
            }
          });
        });

      </script>
@endsection
