<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">



    <ul class="navbar-nav ml-auto">

        @if(\Illuminate\Support\Facades\Route::is("user.doctors.*"))
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block" style="display: none;">
                    <form class="form-inline" method="post" action="{{ route("user.doctors.search") }}">
                        @csrf
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" name="search" placeholder="Search" aria-label="Search">

                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>

                            @error('search')

                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </form>
                </div>
            </li>
        @endif
    </ul>
</nav>

