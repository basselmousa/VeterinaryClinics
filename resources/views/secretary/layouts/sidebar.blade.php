<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#74bd6a ">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('admin/images/petLogo.jpeg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Pet Grooming</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                {{--                <img src="{{ asset('storage/'.auth('doctor')->user()->image) }}" class="img-circle elevation-2" alt="User Image">--}}
            </div>
            <div class="info">
                <div class="row">
                    <div class="col-md-10">
                        {{--                        {{ route('dashboard.doctor.profile.profile') }}--}}
                        <a href="#" class="d-block">{{ auth('secretary')->user()->full_name }} </a>
                    </div>
                    <div class="col-md-2">
                        <i class="fa fa-door-open right mr-3 " style="color:  white; cursor: pointer" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit()"></i>

                        <form id="logout-form" action="{{ route('doctors.logout') }}" method="post" class="d-none">
                            @csrf

                        </form>
                    </div>
                </div>

            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                {{--                <li class="nav-item">--}}
                {{--                    <a href="{{ route('dashboard.doctor.home') }}" class="nav-link">--}}
                {{--                        <i class="nav-icon fas fa-th"></i>--}}
                {{--                        <p>--}}
                {{--                            Dashboard--}}
                {{--                        </p>--}}
                {{--                    </a>--}}
                {{--                </li>--}}
                {{--                <li class="nav-item">--}}
                {{--                    <a href="{{ route('dashboard.doctor.reports') }}" class="nav-link">--}}
                {{--                        <i class="nav-icon fas fa-th"></i>--}}
                {{--                        <p>--}}
                {{--                            Reports--}}
                {{--                            <span class="right badge badge-danger">New</span>--}}
                {{--                        </p>--}}
                {{--                    </a>--}}
                {{--                </li>--}}

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Appointments
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('secretary.appointments.pending') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pending Appointments</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('secretary.appointments.doctor-clinic') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Clinic Appointments</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('secretary.appointments.doctor-home') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Home Appointments</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    {{--                    <a href="#" class="nav-link">--}}
                    {{--                        <i class="nav-icon fa fa-gears"></i>--}}
                    {{--                        <p>--}}
                    {{--                            Settings--}}
                    {{--                            <i class="fas fa-angle-left right"></i>--}}
                    {{--                        </p>--}}
                    {{--                    </a>--}}
                    {{--                    <ul class="nav nav-treeview">--}}
                    {{--                        <li class="nav-item">--}}
                    {{--                            <a href="{{ route('dashboard.doctor.dates.index') }}" class="nav-link">--}}
                    {{--                                <i class="far fa-circle nav-icon"></i>--}}
                    {{--                                <p>Dates</p>--}}
                    {{--                            </a>--}}
                    {{--                        </li>--}}
                    {{--                        <li class="nav-item">--}}
                    {{--                            <a href="{{ route('dashboard.doctor.certificates.index') }}" class="nav-link">--}}
                    {{--                                <i class="far fa-circle nav-icon"></i>--}}
                    {{--                                <p>Certificates</p>--}}
                    {{--                            </a>--}}
                    {{--                        </li>--}}
                    {{--                        <li class="nav-item">--}}
                    {{--                            <a href="{{ route('dashboard.doctor.secretary.index') }}" class="nav-link">--}}
                    {{--                                <i class="far fa-circle nav-icon"></i>--}}
                    {{--                                <p>Secretaries</p>--}}
                    {{--                            </a>--}}
                    {{--                        </li>--}}

                    {{--                    </ul>--}}
                </li>

            </ul>


        </nav>




        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
