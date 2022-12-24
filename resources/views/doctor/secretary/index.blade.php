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
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Doctor</th>

                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($secretaries as $secretary)
                    <tr>
                        <td>{{ $secretary->full_name }}</td>
                        <td>{{ $secretary->email }}</td>
                        <td>{{ $secretary->phone_number }}</td>
                        <td>{{ $secretary->doctor->full_name }}</td>

                        <td>
                            <button data-toggle="modal" data-target="#edit-secretary-modal-{{$secretary->id}}"
                                    class="btn btn-primary rounded-circle">
                                <i class="fa fa-edit"></i>
                            </button>
                            <div class="modal fade" id="edit-secretary-modal-{{$secretary->id}}" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Secretary</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="edit-secretary-form-{{$secretary->id}}" action="{{ route('dashboard.doctor.secretary.update', $secretary->id) }}" method="post"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                @method("PUT")
                                                <div class="form-group">
                                                    <label for="exampleInputUsername1">Full Name</label>
                                                    <input type="text" value="{{$secretary->full_name}}" name="full_name" class="form-control" id="exampleInputUsername1"
                                                           placeholder="Title">
                                                    @error('full_name')
                                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputUsername1">Email</label>
                                                    <input type="email" value="{{$secretary->email}}" name="email" class="form-control" id="exampleInputUsername1"
                                                           placeholder="Title">
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputUsername1">Password</label>
                                                    <input type="password" name="password" class="form-control" id="exampleInputUsername1"
                                                           placeholder="Title">
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputUsername1">Phone Number</label>
                                                    <input type="text" value="{{$secretary->phone_number}}" name="phone_number" class="form-control" id="exampleInputUsername1"
                                                           placeholder="Title">
                                                    @error('phone_number')
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
                            document.getElementById('edit-secretary-form-{{$secretary->id}}').submit();
                            "
                                            >Save changes
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <button class="btn btn-danger rounded-circle" onclick="event.preventDefault();
                                document.getElementById('delete-certificate-form-{{$secretary->id}}').submit();
                                "><i class="fa fa-trash"></i></button>
                            <form id="delete-certificate-form-{{$secretary->id}}" method="post"
                                  action="{{ route('dashboard.doctor.secretary.delete', $secretary->id) }}"
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
                    <h4 class="modal-title">Add Secretary</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add-secretary-form" action="{{ route('dashboard.doctor.secretary.add') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Full Name</label>
                            <input type="text" name="full_name" class="form-control" id="exampleInputUsername1"
                                   placeholder="Title">
                            @error('full_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputUsername1"
                                   placeholder="Title">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputUsername1"
                                   placeholder="Title">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" id="exampleInputUsername1"
                                   placeholder="Title">
                            @error('phone_number')
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
                            document.getElementById('add-secretary-form').submit();
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

