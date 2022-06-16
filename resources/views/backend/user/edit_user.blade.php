@extends('admin.admin_master')
@section('title')
    Edit_User-view page
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">



            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Update User<img src="{{ asset('backend/images/favcon.ico') }}" alt=""
                                style="width:30px;height:30px;border-radius:50px; margin-left:5px;"></h4>
                        <h2 class="text-white d-flex"></h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('update.user',['id'=>$editUser->id]) }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <h5>User Role <span class="text-danger">*</span></h5>
                                                            <select name="role" id="role" class="form-control">
                                                                <option value="">Select Your City</option>
                                                                <option value="Admin" {{ $editUser->role=="Admin" ? 'selected':"" }}>Admin</option>
                                                                <option value="Operator"{{ $editUser->role=="Operator" ? 'selected':"" }}>Operator</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="name" class="form-control" value="{{ $editUser->name }}">
                                                            @error('name')
                                                                <div class="alert text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end row --}}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>E-mail<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="email" name="email" class="form-control" value="{{ $editUser->email }}">
                                                            @error('email')
                                                                <div class="alert text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
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
