@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('rate/star-rating.css')}}">
    <link rel="stylesheet" href="{{asset('rate/styles.min.css')}}">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/modern-normalize/1.0.0/modern-normalize.min.css" integrity="sha512-ISS7cAi1PEhQ8jnbJpJZMd29NlhNj4AWYyLOSp2CE/CsHxTCu+r+t0D2yoJudVrd0/8fTVPUVDzY5Tvli75u/g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.23.0/themes/prism.min.css" integrity="sha512-tN7Ec6zAFaVSG3TpNAKtk4DOHNpSwKHxxrsiw4GHKESGPs5njn/0sMCUMl2svV4wo4BK/rCP7juYz+zx+l6oeQ==" crossorigin="anonymous" />
    @endsection

@section('content')
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
                    <th>Appoint Date</th>
                    <th>Doctor Name</th>
                    <th>Animal Name</th>
                    <th>Appoint Time</th>
                    <th>Appoint Status</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($appoints as $appoint)
                    <tr>
                        <td>{{ $appoint->date }}</td>
                        <td>{{ $appoint->doctor->full_name }}</td>
                        <td>{{ $appoint->animal->name }}</td>
                        <td>{{ $appoint->time }}</td>
                        <td>{{ $appoint->status }}</td>
                        <td>{{ $appoint->type }}</td>
                        <td>
                            <button class="btn btn-danger rounded-circle" onclick="event.preventDefault();
                                document.getElementById('delete-appoint-form-{{$appoint->id}}').submit();
                                "><i class="fa fa-trash"></i></button>
                            <form id="delete-appoint-form-{{$appoint->id}}" method="post"
                                  action="{{ route('user.appointments.delete', $appoint->id) }}"
                                  class="d-none">
                                @method('DELETE')
                                @csrf
                            </form>
                            @if($appoint->status == 'Done')
                                <button data-toggle="modal" data-target="#add-certificate-modal-{{$appoint->id}}"
                                        class="btn btn-primary rounded-circle">
                                    <i class="fa fa-plus"></i>
                                </button>

                                <div class="modal fade" id="add-certificate-modal-{{$appoint->id}}" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Rate Doctor</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="add-certificate-form" action="{{ route('user.appointments.rate', $appoint->doctor_id) }}"
                                                      method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-field">
                    <span class="gl-star-rating">
                        <select id="glsr-prebuilt" name="rate" class="star-rating-prebuilt">
                            <option value="">Select a rating</option>
                            <option value="5">5 Stars</option>
                            <option value="4">4 Stars</option>
                            <option value="3">3 Stars</option>
                            <option value="2">2 Stars</option>
                            <option value="1">1 Star</option>
                        </select>
                        <span class="gl-star-rating--stars">
                            <span data-value="1" class=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="gl-emote" style="pointer-events: none;"><circle class="gl-emote-bg" fill="#FFA98D" cx="12" cy="12" r="10"></circle><path fill="#393939" d="M12 14.6c1.48 0 2.9.38 4.15 1.1a.8.8 0 01-.79 1.39 6.76 6.76 0 00-6.72 0 .8.8 0 11-.8-1.4A8.36 8.36 0 0112 14.6zm4.6-6.25a1.62 1.62 0 01.58 1.51 1.6 1.6 0 11-2.92-1.13c.2-.04.25-.05.45-.08.21-.04.76-.11 1.12-.18.37-.07.46-.08.77-.12zm-9.2 0c.31.04.4.05.77.12.36.07.9.14 1.12.18.2.03.24.04.45.08a1.6 1.6 0 11-2.34-.38z"></path></svg></span>
                            <span data-value="2" class=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="gl-emote" style="pointer-events: none;"><circle class="gl-emote-bg" fill="#FFC385" cx="12" cy="12" r="10"></circle><path fill="#393939" d="M12 14.8c1.48 0 3.08.28 3.97.75a.8.8 0 11-.74 1.41A8.28 8.28 0 0012 16.4a9.7 9.7 0 00-3.33.61.8.8 0 11-.54-1.5c1.35-.48 2.56-.71 3.87-.71zM15.7 8c.25.31.28.34.51.64.24.3.25.3.43.52.18.23.27.33.56.7A1.6 1.6 0 1115.7 8zM8.32 8a1.6 1.6 0 011.21 2.73 1.6 1.6 0 01-2.7-.87c.28-.37.37-.47.55-.7.18-.22.2-.23.43-.52.23-.3.26-.33.51-.64z"></path></svg></span>
                            <span data-value="3" class=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="gl-emote" style="pointer-events: none;"><circle class="gl-emote-bg" fill="#FFD885" cx="12" cy="12" r="10"></circle><path fill="#393939" d="M15.33 15.2a.8.8 0 01.7.66.85.85 0 01-.68.94h-6.2c-.24 0-.67-.26-.76-.7-.1-.38.17-.81.6-.9zm.35-7.2a1.6 1.6 0 011.5 1.86A1.6 1.6 0 1115.68 8zM8.32 8a1.6 1.6 0 011.21 2.73A1.6 1.6 0 118.33 8z"></path></svg></span>
                            <span data-value="4" class=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="gl-emote" style="pointer-events: none;"><circle class="gl-emote-bg" fill="#FFD885" cx="12" cy="12" r="10"></circle><path fill="#393939" d="M15.45 15.06a.8.8 0 11.8 1.38 8.36 8.36 0 01-8.5 0 .8.8 0 11.8-1.38 6.76 6.76 0 006.9 0zM15.68 8a1.6 1.6 0 011.5 1.86A1.6 1.6 0 1115.68 8zM8.32 8a1.6 1.6 0 011.21 2.73A1.6 1.6 0 118.33 8z"></path></svg></span>
                            <span data-value="5" class=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="gl-emote" style="pointer-events: none;"><circle class="gl-emote-bg" fill="#FFD885" cx="12" cy="12" r="10"></circle><path fill="#393939" d="M16.8 14.4c.32 0 .59.2.72.45.12.25.11.56-.08.82a6.78 6.78 0 01-10.88 0 .78.78 0 01-.05-.87c.14-.23.37-.4.7-.4zM15.67 8a1.6 1.6 0 011.5 1.86A1.6 1.6 0 1115.68 8zM8.32 8a1.6 1.6 0 011.21 2.73A1.6 1.6 0 118.33 8z"></path></svg></span>
                        </span>
                    </span>
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

                            @endif
                        </td>

                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
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

    script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.23.0/prism.min.js" integrity="sha512-YBk7HhgDZvBxmtOfUdvX0z8IH2d10Hp3aEygaMNhtF8fSOvBZ16D/1bXZTJV6ndk/L/DlXxYStP8jrF77v2MIg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.23.0/plugins/autoloader/prism-autoloader.min.js" integrity="sha512-zc7WDnCM3aom2EziyDIRAtQg1mVXLdILE09Bo+aE1xk0AM2c2cVLfSW9NrxE5tKTX44WBY0Z2HClZ05ur9vB6A==" crossorigin="anonymous"></script>
    <script src="{{asset('rate/star-rating.js?ver=4.2.3')}}"></script>
    <script>
        var destroyed = false;
        var starratingPrebuilt = new StarRating('.star-rating-prebuilt', {
            prebuilt: true,
            maxStars: 5,
        });
        var starrating = new StarRating('.star-rating', {
            stars: function (el, item, index) {
                el.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><rect class="gl-star-full" width="19" height="19" x="2.5" y="2.5"/><polygon fill="#FFF" points="12 5.375 13.646 10.417 19 10.417 14.665 13.556 16.313 18.625 11.995 15.476 7.688 18.583 9.333 13.542 5 10.417 10.354 10.417"/></svg>';
            },
        });
        var starratingOld = new StarRating('.star-rating-old');
        document.querySelector('.toggle-star-rating').addEventListener('click', function () {
            if (!destroyed) {
                starrating.destroy();
                starratingOld.destroy();
                starratingPrebuilt.destroy()
                destroyed = true;
            } else {
                starrating.rebuild();
                starratingOld.rebuild();
                starratingPrebuilt.rebuild()
                destroyed = false;
            }
        });
    </script>
@endsection
