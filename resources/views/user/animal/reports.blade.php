@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="card-title">Reports Table</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>AnimalType</th>
                    <th>Recommendation</th>
                    <th>Prescription</th>
                    <th>Doctor Name</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>

                @foreach($reports as $report)
                    <tr>
                        <td>{{ $report->animal->type }}</td>
                        <td>{{ $report->recommendation }}</td>
                        <td>{{ $report->prescription }}</td>
                        <td>{{ $report->doctor->full_name  }}</td>
                        <td>{{ \Carbon\Carbon::make($report->created_at)->toDateTimeString() }}</td>

                    </tr>
                @endforeach
            </table>
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
