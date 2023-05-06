<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pet Grooming</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
    <!-- Favicons -->
    <link href="{{asset('home/assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('home/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->

    <!-- Vendor CSS Files -->
    <link href="{{asset('home/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('home/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('home/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('home/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('home/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('home/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('home/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('home/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('home/assets/css/style.css')}}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <style>
        .invalid-feedback{
            display: block;
        }
    </style>
    <!-- =======================================================
    * Template Name: Veterinary Clinics - v4.7.0
    * Template URL: https://bootstrapmade.com/Veterinary Clinics-free-bootstrap-theme/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>


<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <a href="{{ route('welcome') }}" class="logo me-auto"><img src="{{asset('admin/images/petLogo.jpeg')}}" alt="">
            Pet Grooming</a>
        <!-- Uncomment below if you prefer to use an image logo -->


        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                {{--                <li><a class="nav-link scrollto " href="#hero">Home</a></li>--}}
                <li><a class="nav-link scrollto" href="#doctors">Doctors</a></li>
                <li><a class="nav-link scrollto" href="{{ route('aboutUs') }}">About</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <a href="{{ route('login') }}" class="appointment-btn scrollto"><span class="d-none d-md-inline">Login or Sign up</span>
        </a>

    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

            <!-- Slide 1 -->
            <div class="carousel-item active" style="background-image: url('{{asset('images/carousel1.jpg')}}')">

            </div>

            <!-- Slide 2 -->
{{--            <div class="carousel-item" style="background-image: url('{{asset('images/carousel2.jpg')}}')">--}}

{{--            </div>--}}

{{--            <!-- Slide 3 -->--}}
{{--            <div class="carousel-item" style="background-image: url('{{asset('images/carousel4.jpg')}}');width: 100%">--}}

{{--            </div>--}}

        </div>

{{--        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">--}}
{{--            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>--}}
{{--        </a>--}}

{{--        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">--}}
{{--            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>--}}
{{--        </a>--}}

    </div>
</section><!-- End Hero -->

<main id="main">


    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container" data-aos="zoom-in">

            <div class="text-center">
                <h3>In an emergency? Need help now?</h3>
                <p>But the pain in the film is irure to condemn, in pleasure it wants to escape from the pain of being
                    cillum in pain, no result. They are the exceptions the blinds yearn for, they do not see, they are
                    the ones who abandon their responsibilities to the fault that is soothing the soul's hardships.</p>
{{--                <a class="cta-btn scrollto" href="{{ route('login') }}">You Want To Make an Make an Appointment ? Login--}}
{{--                    In Now </a>--}}
            </div>

                <form action="{{route("search")}}" method="post">
                    <div class="row">
                        @csrf
                        <div class="col-md-8 col-lg-8">
                            <input type="text" class="form-control" name="words" >
                            @error('words')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-md-4 col-lg-4"><button type="submit" class="btn btn-info" > Search</button></div>
                    </div>
                </form>

        </div>
    </section><!-- End Cta Section -->

    <!-- ======= About Us Section ======= -->


    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Doctors</h2>
                <p>It takes great pains to benefit.
                    His needs result from something that actually drives him away.
                    Let them be what they want. Anyone whom anyone desires.
                    And no one who hinders receives the others.
                    Because he should flee in this office of convenience,
                    which is here.
                    </p>
            </div>

            <div class="row">

                @foreach($doctors as $doctor)

                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                            <a href="{{route("user.doctors.showAppoint", $doctor->id)}}">
                            <div class="member" data-aos="fade-up" data-aos-delay="100">
                                <div class="member-img">
                                    <img src="{{asset('storage/'.$doctor->image)}}" class="img-fluid" alt="">

                                </div>
                                <div class="member-info">
                                    <h4>{{ $doctor->full_name }}</h4>
                                    <h4>{{ $doctor->full_name }} Clinic</h4>
                                    <span>{{ $doctor->phone_number }}</span>
                                    <span>{{ $doctor->country }}  - {{ $doctor->city }} -{{ $doctor->building_number }}  </span>
                                    @foreach($doctor->dates as $date)
                                        <span>{{ $date->type }} - {{ \Carbon\Carbon::make($date->day)->getTranslatedShortDayName() }} - ({{ $date->start_time }} - {{ $date->end_time }})</span>

                                    @endforeach
                                    @foreach($doctor->certifications as $certificate)
                                        <span>{{ $certificate->title }}</span>

                                    @endforeach
                                </div>
                            </div>
                            </a>
                        </div>

                @endforeach


            </div>

        </div>
    </section><!-- End Doctors Section -->

    <!-- ======= Gallery Section ======= -->
{{--    <section id="gallery" class="gallery">--}}
{{--        <div class="container" data-aos="fade-up">--}}

{{--            <div class="section-title">--}}
{{--                <h2>Gallery</h2>--}}
{{--                <p>He suffers great pains. The consequences of his avoidance had to do with some. May they be the main--}}
{{--                    game. No one had any desire. And no one who hinders receives them otherwise. It is because he shuns--}}
{{--                    the services which he's been in the advantage of.</p>--}}
{{--            </div>--}}

{{--            <div class="gallery-slider swiper">--}}
{{--                <div class="swiper-wrapper align-items-center">--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <a class="gallery-lightbox" href="{{asset('images/download.jfif')}}">--}}
{{--                            <img src="{{asset('images/download.jfif')}}" class="img-fluid" alt=""></a></div>--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <a class="gallery-lightbox" href="{{asset('images/download (1).jfif')}}">--}}
{{--                            <img src="{{asset('images/download (1).jfif')}}" class="img-fluid" alt=""></a></div>--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <a class="gallery-lightbox" href="{{asset('images/download (2).jfif')}}">--}}
{{--                            <img src="{{asset('images/download (2).jfif')}}" class="img-fluid" alt=""></a></div>--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <a class="gallery-lightbox" href="{{asset('images/download (3).jfif')}}">--}}
{{--                            <img src="{{asset('images/download (3).jfif')}}" class="img-fluid" alt=""></a></div>--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <a class="gallery-lightbox" href="{{asset('images/download (4).jfif')}}">--}}
{{--                            <img src="{{asset('images/download (4).jfif')}}" class="img-fluid" alt=""></a></div>--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <a class="gallery-lightbox" href="{{asset('images/download (5).jfif')}}">--}}
{{--                            <img src="{{asset('images/download (5).jfif')}}" class="img-fluid" alt=""></a></div>--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <a class="gallery-lightbox" href="{{asset('images/download (6).jfif')}}">--}}
{{--                            <img src="{{asset('images/download (6).jfif')}}" class="img-fluid" alt=""></a></div>--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <a class="gallery-lightbox" href="{{asset('images/download (7).jfif')}}">--}}
{{--                            <img src="{{asset('images/download (7).jfif')}}" class="img-fluid" alt=""></a></div>--}}
{{--                </div>--}}
{{--                <div class="swiper-pagination"></div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </section><!-- End Gallery Section -->--}}


</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-12 align-content-stretch">
                    <div class="footer-info">


                        <div class="social-links mt-3 align-content-stretch">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
<!-- Vendor JS Files -->
<script src="{{asset('home/assets/vendor/purecounter/purecounter.js')}}"></script>
<script src="{{asset('home/assets/vendor/aos/aos.js')}}"></script>
<script src="{{asset('home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('home/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('home/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('home/assets/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('home/assets/js/main.js')}}"></script>
{{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>--}}

</body>

</html>
