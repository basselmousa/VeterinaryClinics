@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Book At {{ $doctor->full_name }}</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
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
                            <option value="{{ $animal->id }}" {{ old('animal')   == $animal->id ? 'selected' : '' }} > {{$animal->type}}</option>

                        @endforeach

                    </select>
                    @error('animal')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <select name="type" class="custom-select">
                        <option  selected disabled="">Select Appoint Type</option>

                        @foreach($types as $type)
                            <option value="{{ $type->type }}" {{ old('type')   == $type->type ? 'selected' : '' }} > {{$type->type}}</option>

                        @endforeach

                    </select>
                    @error('type')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Save</button>

            </form>

        </div>
    </section>
@endsection
