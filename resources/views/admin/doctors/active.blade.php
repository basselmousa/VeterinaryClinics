@extends('admin.layouts.app')
@section('content')

    @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Congratulation!</h5>
            {{ session('success') }}
        </div>

    @endif
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="card-title">Appointments Table</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Doctor Name</th>
                    <th>Doctor Email</th>
                    <th>Doctor Phone Number</th>
                    <th>Doctor Image</th>
                    <th>Doctor Gender</th>
                    <th>Doctor Country</th>
                    <th>Doctor City</th>
                    <th>Doctor Building Number</th>

                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($doctors as $doctor)
                    <tr>
                        <td>{{ $doctor->full_name }}</td>
                        <td>{{ $doctor->email }}</td>
                        <td>{{ $doctor->phone_number }}</td>
                        <td>
                            @if(isset($doctor->image))
                                <button data-toggle="modal" data-target="#view-certificate-modal-{{ $doctor->id }}"
                                        class="btn btn-primary rounded-circle"><i class="fa fa-eye"></i></button>
                                <div class="modal fade" id="view-certificate-modal-{{ $doctor->id }}"
                                     style="display: none;" aria-hidden="true">

                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">{{ $doctor->title }}</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img class="img-fluid pad" src="{{ asset('storage/'.$doctor->image) }}"
                                                     alt="Alt">
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    Close
                                                </button>

                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

                            @endif
                        </td>
                        <td>{{ $doctor->gender }}</td>
                        <td>{{ $doctor->country }}</td>
                        <td>{{ $doctor->city }}</td>
                        <td>{{ $doctor->building_number }}</td>
                        <td>
                            <button class="btn btn-info rounded-circle" onclick="event.preventDefault();
                                document.getElementById('deActivate-form-{{$doctor->id}}').submit();
                                "><i class="fa fa-xmark"></i>DeActivate</button>
                            <form id="deActivate-form-{{$doctor->id}}" method="post"
                                  action="{{ route('admins.deActivate', $doctor->id) }}"
                                  class="d-none">

                                @csrf
                            </form>
                            <button class="btn btn-danger rounded-circle" onclick="event.preventDefault();
                                document.getElementById('delete-certificate-form-{{$doctor->id}}').submit();
                                "><i class="fa fa-trash"></i></button>
                            <form id="delete-certificate-form-{{$doctor->id}}" method="post"
                                  action="{{ route('admins.deleteActive', $doctor->id) }}"
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
        <div class="card-footer clearfix">
            {{ $doctors->links() }}
        </div>
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
