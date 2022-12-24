<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Veterinary Clinics</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('home/assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('home/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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

        <a href="{{ route('welcome') }}" class="logo me-auto"><img src="{{asset('home/assets/img/logo.png')}}" alt=""></a>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <h1 class="logo me-auto"><a href="index.html">Veterinary Clinics</a></h1> -->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto " href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="#doctors">Doctors</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <a href="{{ route('login') }}" class="appointment-btn scrollto"><span class="d-none d-md-inline">Login or Sign up</span> </a>

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
            <div class="carousel-item" style="background-image: url('{{asset('images/carousel2.jpg')}}')">

            </div>

            <!-- Slide 3 -->
            <div class="carousel-item" style="background-image: url('{{asset('images/carousel4.jpg')}}');width: 100%">

            </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

    </div>
</section><!-- End Hero -->

<main id="main">


    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container" data-aos="zoom-in">

            <div class="text-center">
                <h3>In an emergency? Need help now?</h3>
                <p>But the pain in the film is irure to condemn, in pleasure it wants to escape from the pain of being cillum in pain, no result. They are the exceptions the blinds yearn for, they do not see, they are the ones who abandon their responsibilities to the fault that is soothing the soul's hardships.</p>
                <a class="cta-btn scrollto" href="{{ route('login') }}">You Want To Make an Make an Appointment ? Login In Now </a>
            </div>

        </div>
    </section><!-- End Cta Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>About Us</h2>
                <p>The Pet Clinic is a web application that includes all pet doctors in the Hashemite Kingdom of Jordan and allows the
                    user to follow treatment and book appointments for the specialist doctor for his pet within the area in which he is
                    located. Pet, if available, and see your vet's reports on each pet.
                    As for doctors, the application allows them to expand their work by making the clinic’s location available to
                    residents of the area near the clinic, or by providing a home examination service.</p>
            </div>

            <div class="row">
                <div class="col-lg-6" data-aos="fade-right">
                    <img src="{{asset('images/image.jpg')}}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
                    <h3>Medical equipment specialized for dealing with animals of all kinds</h3>
                    <p class="fst-italic">Doctors who specialize in dealing with animals of all kinds and using the latest medical methods
                    </p>
                    <ul>
                        <li><i class="bi bi-check-circle"></i> Modern medical methods to ensure comprehensive medical care for your animal
                        </li>
                        <li><i class="bi bi-check-circle"></i> Comprehensive medical control to avoid the largest proportion of errors
                            .</li>
                            </ul>

                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container" data-aos="fade-up">

            <div class="row no-gutters">

                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <i class="fas fa-user-md"></i>
                        <span data-purecounter-start="0" data-purecounter-end="{{ $all_doctors }}" data-purecounter-duration="1" class="purecounter"></span>

                        <p><strong>Doctors</strong> </p>

                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <i class="fa fa-dog"></i>
                        <span data-purecounter-start="0" data-purecounter-end="{{ $all_animals }}" data-purecounter-duration="1" class="purecounter"></span>
                        <p><strong>Total animals treated medically</strong></p>

                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <i class="fas fa-tasks"></i>
                        <span data-purecounter-start="0" data-purecounter-end="{{ $all_appointments }}" data-purecounter-duration="1" class="purecounter"></span>
                        <p><strong>Appointments</strong> </p>

                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <i class="fas fa-user-md" style="color: #0b2e13 "></i>
                        <span data-purecounter-start="0" data-purecounter-end="{{ count($doctors) }}" data-purecounter-duration="1" class="purecounter"></span>
                        <p><strong>Top Doctors</strong> </p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Counts Section -->



    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Doctors</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row">

               @foreach($doctors as $doctor)
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img src="{{asset('storage/'.$doctor->image)}}" class="img-fluid" alt="">

                            </div>
                            <div class="member-info">
                                <h4>{{ $doctor->full_name }}</h4>
                                @foreach($doctor->certifications as $certificate)
                                    <span>{{ $certificate->title }}</span>

                                @endforeach
                            </div>
                        </div>
                    </div>
               @endforeach


            </div>

        </div>
    </section><!-- End Doctors Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Gallery</h2>
                <p>He suffers great pains. The consequences of his avoidance had to do with some. May they be the main game. No one had any desire. And no one who hinders receives them otherwise. It is because he shuns the services which he's been in the advantage of.</p>
            </div>

            <div class="gallery-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide">
                        <a class="gallery-lightbox" href="{{asset('images/download.jfif')}}">
                            <img src="{{asset('images/download.jfif')}}" class="img-fluid" alt=""></a></div>
                    <div class="swiper-slide">
                        <a class="gallery-lightbox" href="{{asset('images/download (1).jfif')}}">
                            <img src="{{asset('images/download (1).jfif')}}" class="img-fluid" alt=""></a></div>
                    <div class="swiper-slide">
                        <a class="gallery-lightbox" href="{{asset('images/download (2).jfif')}}">
                            <img src="{{asset('images/download (2).jfif')}}" class="img-fluid" alt=""></a></div>
                    <div class="swiper-slide">
                        <a class="gallery-lightbox" href="{{asset('images/download (3).jfif')}}">
                            <img src="{{asset('images/download (3).jfif')}}" class="img-fluid" alt=""></a></div>
                    <div class="swiper-slide">
                        <a class="gallery-lightbox" href="{{asset('images/download (4).jfif')}}">
                            <img src="{{asset('images/download (4).jfif')}}" class="img-fluid" alt=""></a></div>
                    <div class="swiper-slide">
                        <a class="gallery-lightbox" href="{{asset('images/download (5).jfif')}}">
                            <img src="{{asset('images/download (5).jfif')}}" class="img-fluid" alt=""></a></div>
                    <div class="swiper-slide">
                        <a class="gallery-lightbox" href="{{asset('images/download (6).jfif')}}">
                            <img src="{{asset('images/download (6).jfif')}}" class="img-fluid" alt=""></a></div>
                    <div class="swiper-slide">
                        <a class="gallery-lightbox" href="{{asset('images/download (7).jfif')}}">
                            <img src="{{asset('images/download (7).jfif')}}" class="img-fluid" alt=""></a></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Gallery Section -->


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
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('home/assets/vendor/purecounter/purecounter.js')}}"></script>
<script src="{{asset('home/assets/vendor/aos/aos.js')}}"></script>
<script src="{{asset('home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('home/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('home/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('home/assets/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('home/assets/js/main.js')}}"></script>

</body>

</html>
