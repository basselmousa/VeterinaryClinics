<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4"  style="background-color:#74bd6a ">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('admin/images/petLogo.jpeg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Pet Grooming</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="background-color: #74bd6a">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="info">
                <div class="row">

                    <div class="col-md-2">
                        <i class="fa fa-door-open right mr-3 " style="color:  white; cursor: pointer" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit()"></i>

                        <form id="logout-form" action="{{ route('admins.logout') }}" method="post" class="d-none">
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
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('user.animals.index') }}" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-th"></i>--}}
{{--                        <p>--}}
{{--                            Animals--}}

{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li class="nav-item">
                    <a href="{{ route('admins.active') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Active Doctors

                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admins.pending') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Pending Doctors

                        </p>
                    </a>
                </li>

            </ul>


        </nav>




        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
