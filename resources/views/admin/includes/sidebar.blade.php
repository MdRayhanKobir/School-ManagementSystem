@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="{{ route('dashboard') }}">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/logo-phakal.png') }}" alt="" style="border-radius:50px">
                        <h3><b>PHaKAL</b></h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ $route == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>
@if(Auth::user()->role=='Admin')
            <li class="treeview {{ $prefix == '/users' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Manage User</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('user.view') }}"><i class="ti-more"></i>View User</a></li>
                    <li><a href="{{ route('add.user') }}"><i class="ti-more"></i>Add User</a></li>
                </ul>
            </li>
            @endif

            <li class="treeview {{ $prefix == '/profile' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Manage Profile</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('profile.view') }}"><i class="ti-more"></i>Your Profle </a></li>
                    <li><a href="{{ route('change.password') }}"><i class="ti-more"></i>Change Password</a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ $prefix == '/setup' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Setup Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('student.class') }}"><i class="ti-more"></i>Student Class</a></li>
                    <li><a href="{{ route('studentyear.view') }}"><i class="ti-more"></i>Student Year</a></li>
                    <li><a href="{{ route('studentgroup.view') }}"><i class="ti-more"></i>Student Gourp</a></li>
                    <li><a href="{{ route('shift.view') }}"><i class="ti-more"></i>Student Shift</a></li>
                    <li><a href="{{ route('fee_category.view') }}"><i class="ti-more"></i>FeeCategory Name</a></li>
                    <li><a href="{{ route('feeamount.view') }}"><i class="ti-more"></i>Fee Amount</a></li>
                    <li><a href="{{ route('examtype.view') }}"><i class="ti-more"></i>Exam Type</a></li>
                    <li><a href="{{ route('s_subject.view') }}"><i class="ti-more"></i>School Subject</a></li>
                    <li><a href="{{ route('assign_subject.view') }}"><i class="ti-more"></i>Assign Subject</a></li>
                    <li><a href="{{ route('designation.view') }}"><i class="ti-more"></i>Designation</a></li>
                </ul>

            </li>

            <li class="treeview {{ $prefix == '/students' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Student Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('student.reg.view') }}"><i class="ti-more"></i>Student Registration</a></li>
                    <li><a href="{{ route('student.roll.generate.view') }}"><i class="ti-more"></i>Student Roll Generate</a></li>

                </ul>

            </li>
        </ul>
        </li>



        <li class="header nav-small-cap">User Interface</li>

        <li class="treeview">
            <a href="#">
                <i data-feather="grid"></i>
                <span>Components</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
                <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>

            </ul>
        </li>

        </ul>
    </section>
</aside>
