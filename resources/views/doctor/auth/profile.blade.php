@extends('doctor.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="{{ asset('storage/'.$doctor->image) }}"
                                     alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{ $doctor->full_name }}</h3>

                            <ul class="list-group list-group-unbordered mb-3">

                                <li class="list-group-item">
                                    <b>Phone Number</b> <span class="float-right">{{ $doctor->phone_number }}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Building Number</b> <span class="float-right">{{ $doctor->building_number }}</span>
                                </li>
                            </ul>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link"  href="#activity" data-toggle="tab">Edit Profile</a></li>

                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <form action="{{ route('dashboard.doctor.profile.update') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="input-group mb-3">
                                            <input type="text" name="full_name" value="{{ old('full_name') ?? $doctor->full_name }}" class="form-control" placeholder="Full name">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>
                                            @error('full_name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="email" name="email" value="{{ old('email') ?? $doctor->email }}" class="form-control" placeholder="Email">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-envelope"></span>
                                                </div>
                                            </div>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="password" name="password" class="form-control" autocomplete="new-password" placeholder="Password">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <select name="country" readonly="" class="custom-select">
                                                <option value="Jordan" selected >Jordan</option>

                                            </select>
                                            @error('country')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <select name="city" class="custom-select">
                                                <option  selected disabled="">Select a city</option>

                                                @foreach(\App\Http\Configs::$cities as $city)
                                                    <option value="{{ $city }}" {{ (old('city')  ?? $doctor->city ) == $city ? 'selected' : '' }} > {{$city}}</option>

                                                @endforeach

                                            </select>
                                            @error('city')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <select name="gender" class="custom-select">
                                                <option  selected disabled="">Select a gender</option>
                                                <option value="male" {{ (old('gender') ?? $doctor->gender) == 'male' ? 'selected' : ''  }}>Male</option>
                                                <option value="female" {{ (old('gender') ?? $doctor->gender) == 'female' ? 'selected' : ''   }}>Female</option>
                                            </select>
                                            @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" name="building_number" value="{{ old('building_number') ?? $doctor->building_number }}" class="form-control" placeholder="Building Number">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-building"></span>
                                                </div>
                                            </div>
                                            @error('building_number')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" name="phone_number" value="{{ old('phone_number') ?? $doctor->phone_number }}" class="form-control" placeholder="Phone Number">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-phone"></span>
                                                </div>
                                            </div>
                                            @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Upload Personal Image</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="row">

                                            <!-- /.col -->
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary btn-block">Update</button>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                    </form>



                                </div>



                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
