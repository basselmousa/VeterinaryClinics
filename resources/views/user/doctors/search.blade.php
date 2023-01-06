@extends('layouts.app')
@section('content')

    @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Congratulation!</h5>
            {{ session('success') }}
        </div>

    @endif
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Nearest Doctors</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row">
                  @foreach($nearestDoctors as $nearest)
                        @if(count($nearest->dates) > 0)
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                <div class="card bg-light d-flex flex-fill">

                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="lead"><b>{{ $nearest->full_name }}</b></h2>
                                                <p class="text-muted text-sm"><b>About: </b>
                                                    @foreach($nearest->certifications as $certificate)
                                                        {{  ! $loop->last ? $certificate->title . ' /' : $certificate->title }}
                                                    @endforeach
                                                </p>
                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: {{ $nearest->country }}, {{ $nearest->city }}, Building Number {{ $nearest->building_number }}</li>
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                                                </ul>
                                            </div>
                                            <div class="col-5 text-center">
                                                <img src="{{ asset('storage/'.$nearest->image) }}" alt="{{ $nearest->full_name . ' Avatar' }}" class="img-circle img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right">

                                            <a
{{--                                                data-toggle="modal" data-target="#take-appoint-nearest-modal-{{$nearest->id}}"--}}
                                                    href="{{ route('user.doctors.showAppoint', $nearest->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-user"></i> Take Appoint
                                            </a>

                                            <div class="modal fade" id="take-appoint-nearest-modal-{{$nearest->id}}" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Book at {{ $nearest->full_name }} </h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="take-appoint-nearest-form-{{$nearest->id}}" action="{{ route('user.doctors.appoint', $nearest->id) }}"
                                                                  method="post" >
                                                                @csrf
                                                                <div class="form-group">
                                                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                                        <input type="text" name="date" placeholder="Date"
                                                                               value="{{ old('date') }}"
                                                                               class="form-control datetimepicker-input"
                                                                               data-target="#reservationdate"/>
                                                                        <div class="input-group-append" data-target="#reservationdate"
                                                                             data-toggle="datetimepicker">
                                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                        </div>
                                                                    </div>

                                                                    @error('date')

                                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="bootstrap-timepicker">
                                                                    <div class="form-group">


                                                                        <div class="input-group date"  id="timepicker" data-target-input="nearest">
                                                                            <input type="text" name="time" value="{{ old('time') }}" class="form-control datetimepicker-input" data-target="#timepicker" placeholder="Appoint Time">
                                                                            <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                                                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                                            </div>
                                                                        </div>
                                                                        @error('time')
                                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                                    @enderror
                                                                    <!-- /.input group -->
                                                                    </div>
                                                                    <!-- /.form group -->
                                                                </div>
                                                                <div class="form-group">
                                                                    <select name="animal" class="custom-select">
                                                                        <option  selected disabled="">Select Animal</option>

                                                                        @foreach(auth()->user()->animals as $animal)
                                                                            <option value="{{ $animal->id }}" {{ old('animal')   == $animal->id ? 'selected' : '' }} > {{$animal->name}}</option>

                                                                        @endforeach

                                                                    </select>
                                                                    @error('animal')
                                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                                    @enderror
                                                                </div>


                                                            </form>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary"
                                                                    onclick="event.preventDefault();
                            document.getElementById('take-appoint-nearest-form-{{$nearest->id}}').submit();
                            "
                                                            >Save changes
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endif

                    @endforeach
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <nav aria-label="Contacts Page Navigation">
                    <ul class="pagination justify-content-center m-0">
                        {{ $nearestDoctors->links() }}
                    </ul>
                </nav>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

    </section>


    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Doctors</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row">
                    @foreach($doctors as $doctor)
                        @if(count($doctor->dates) > 0)
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                <div class="card bg-light d-flex flex-fill">

                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="lead"><b>{{ $doctor->full_name }}</b></h2>
                                                <p class="text-muted text-sm"><b>About: </b>
                                                    @foreach($doctor->certifications as $certificate)
                                                        {{  ! $loop->last ? $certificate->title . '/' : $certificate->title }}
                                                    @endforeach
                                                </p>
                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: {{ $doctor->country }}, {{ $doctor->city }}, Building Number {{ $doctor->building_number }}</li>
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                                                </ul>
                                            </div>
                                            <div class="col-5 text-center">
                                                <img src="{{ asset('storage/'.$doctor->image) }}" alt="{{ $doctor->full_name . ' Avatar' }}" class="img-circle img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right">


                                            <a
{{--                                                data-toggle="modal" data-target="#take-appoint-modal"--}}
                                                    href="{{ route('user.doctors.showAppoint', $doctor->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-user"></i> Take Appoint
                                            </a>

                                            <div class="modal fade" id="take-appoint-modal" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Book at {{ $doctor->full_name }}</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="take-appoint-form-{{$doctor->id}}" action="{{ route('user.doctors.appoint', $doctor->id) }}"
                                                                  method="post" >
                                                                @csrf
                                                                <div class="form-group">
                                                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                                        <input type="text" name="date" placeholder="Date"
                                                                               value="{{ old('date') }}"
                                                                               class="form-control datetimepicker-input"
                                                                               data-target="#reservationdate"/>
                                                                        <div class="input-group-append" data-target="#reservationdate"
                                                                             data-toggle="datetimepicker">
                                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                        </div>
                                                                    </div>
                                                                    @error('date')

                                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="bootstrap-timepicker">
                                                                    <div class="form-group">


                                                                        <div class="input-group date"  id="timepicker" data-target-input="nearest">
                                                                            <input type="text" name="time" value="{{ old('time') }}" class="form-control datetimepicker-input" data-target="#timepicker" placeholder="Appoint Time">
                                                                            <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                                                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                                            </div>
                                                                        </div>
                                                                        @error('time')
                                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                                    @enderror
                                                                    <!-- /.input group -->
                                                                    </div>
                                                                    <!-- /.form group -->
                                                                </div>
                                                                <div class="form-group">
                                                                    <select name="animal" class="custom-select">
                                                                        <option  selected disabled="">Select Animal</option>

                                                                        @foreach(auth()->user()->animals as $animal)
                                                                            <option value="{{ $animal->id }}" {{ old('animal')   == $animal->id ? 'selected' : '' }} > {{$animal->name}}</option>

                                                                        @endforeach

                                                                    </select>
                                                                    @error('animal')
                                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                                    @enderror
                                                                </div>


                                                            </form>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary"
                                                                    onclick="event.preventDefault();
                            document.getElementById('take-appoint-form-{{$doctor->id}}').submit();
                            "
                                                            >Save changes
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endif
                    @endforeach
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <nav aria-label="Contacts Page Navigation">
                    <ul class="pagination justify-content-center m-0">
                        {{ $doctors->links() }}
                    </ul>
                </nav>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

    </section>
@endsection
