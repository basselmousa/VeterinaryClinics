@extends('doctor.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <h3 class="card-title">Dates Table</h3>
                </div>
                <div class="col-md-2">
                    <button data-toggle="modal" data-target="#add-date-modal"
                            class="btn btn-primary rounded-circle">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Day</th>
                    <th>Type</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($dates as $date)
                    <tr>
                        <td>{{ $date->day }}</td>
                        <td>{{ $date->type }}</td>
                        <td>{{ $date->start_time }}</td>
                        <td>{{ $date->end_time }}</td>
                        <td>{{ $date->price }}</td>
                        <td>
                            <button class="btn btn-danger rounded-circle" onclick="event.preventDefault();
                                document.getElementById('delete-certificate-form-{{$date->id}}').submit();
                                "><i class="fa fa-trash"></i></button>
                            <form id="delete-certificate-form-{{$date->id}}" method="post"
                                  action="{{ route('dashboard.doctor.dates.delete', $date->id) }}"
                                  class="d-none">
                                @method('DELETE')
                                @csrf
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="add-date-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Date</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add-certificate-form" action="{{ route('dashboard.doctor.dates.add') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Type</label>
                            <select name="type" class="form-control">

                                @foreach(\App\Http\Configs::$types as $type)
                                    <option value="{{$type}}">{{ $type }}</option>
                                @endforeach

                            </select>
                            @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputUsername1">Day</label>

                            <select name="day[]" class="select2" multiple="multiple" data-placeholder="Select a State"
                                    style="width: 100%;">
                                @foreach(\App\Http\Configs::$days as $day)

                                    <option value="{{ $day }}">{{ $day }}</option>

                                @endforeach

                            </select>

                            @error('day')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Start time</label>
                            <div class="input-group date" id="timepicker" data-target-input="nearest">
                                <div class="input-group" data-target="#timepicker" data-toggle="datetimepicker">
                                    <input type="text" name="start_time" class="form-control datetimepicker-input"
                                           data-target="#timepicker">
                                    <div class="input-group-addon input-group-append"><i
                                            class="far fa-clock input-group-text"></i></div>
                                </div>
                            </div>
                            @error('start_time')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">End time</label>
                            <div class="input-group date" id="timepicker-1" data-target-input="nearest">
                                <div class="input-group" data-target="#timepicker-1" data-toggle="datetimepicker">
                                    <input type="text" name="end_time" class="form-control datetimepicker-input"
                                           data-target="#timepicker-1">
                                    <div class="input-group-addon input-group-append"><i
                                            class="far fa-clock input-group-text"></i></div>
                                </div>
                            </div>
                            @error('end_time')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Price</label>
                            <input type="number" name="price" class="form-control" id="exampleInputUsername1"
                                   placeholder="Title">
                            @error('price')
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
                            document.getElementById('add-certificate-form').submit();
                            "
                    >Save changes
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

@endsection


@section('js')
    <script src="{{asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>

    @foreach($errors->all() as $error)
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                text: '{{$error}}'
            });
        </script>
    @endforeach
@endsection
