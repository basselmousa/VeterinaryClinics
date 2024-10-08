@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="card-title">Animals Table</h3>
                </div>
                <div class="col-md-4">
                    <button data-toggle="modal" data-target="#add-certificate-modal"
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
                    <th>Owner Name</th>
                    <th>Birth Date</th>
                    <th>File Number</th>
                    <th>Animal ID</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($animals as $animal)
                    <tr>
                        <td>{{ $animal->name }}</td>
                        <td>{{ $animal->birth_date }}</td>
                        <td>{{ $animal->file_serial_number }}</td>
                        <td>{{ $animal->animal_id }}</td>
                        <td>{{ $animal->type }}</td>
                        <td>
                            <button data-toggle="modal" data-target="#view-certificate-modal-{{ $animal->id }}"
                                    class="btn btn-primary rounded-circle"><i class="fa fa-eye"></i></button>
                            <div class="modal fade" id="view-certificate-modal-{{ $animal->id }}" style="display: none;" aria-hidden="true">

                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">{{ $animal->name }}</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img class="img-fluid pad" src="{{ asset('storage/'.$animal->image) }}" alt="Alt">
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <button class="btn btn-danger rounded-circle" onclick="event.preventDefault();
                                document.getElementById('delete-certificate-form-{{$animal->id}}').submit();
                                "><i class="fa fa-trash"></i></button>
                            <form id="delete-certificate-form-{{$animal->id}}" method="post"
                                  action="{{ route('user.animals.delete', $animal->id) }}"
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

    <div class="modal fade" id="add-certificate-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Animal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add-certificate-form" action="{{ route('user.animals.add') }}"
                          method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                   placeholder="Owner name">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">

                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" name="birth_date" placeholder="Birth Date"
                                       class="form-control datetimepicker-input"
                                       data-target="#reservationdate"/>
                                <div class="input-group-append" data-target="#reservationdate"
                                     data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            @error('birth_date')

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
                        <div class="input-group mb-3">
                            <input type="text" name="animal_id" value="{{ old('animal_id') }}" class="form-control" placeholder="Animal ID">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-building"></span>
                                </div>
                            </div>
                            @error('animal_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" name="type" value="{{ old('type') }}" class="form-control" placeholder="Type">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-building"></span>
                                </div>
                            </div>
                            @error('type')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select name="gender" class="custom-select">
                                <option  selected disabled="">Select a gender</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
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
    <script>

    </script>
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
