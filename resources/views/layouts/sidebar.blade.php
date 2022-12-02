<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('admin/images/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Veterinary Clinics</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('storage/'.auth()->user()->image) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <div class="row">
                    <div class="col-md-10">
                        <a href="{{ route('user.profile.index') }}" class="d-block">{{ auth()->user()->full_name }} </a>
                    </div>
                    <div class="col-md-2">
                        <i class="fa fa-door-open right mr-3 " style="color:  white; cursor: pointer" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit()"></i>

                        <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
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
{{--                    <a href="{{ route('user.home') }}" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-th"></i>--}}
{{--                        <p>--}}
{{--                            Dashboard--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li class="nav-item">
                    <a href="{{ route('user.animals.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Animals

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.doctors.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Doctors

                        </p>
                    </a>
                </li>

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
                            <a href="{{ route('user.appointments.clinic') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Clinic Appointments</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.appointments.home') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Home Appointments</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.profile.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-gears"></i>
                        <p>
                            Profile
                        </p>
                    </a>

                </li>

            </ul>


        </nav>




        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
