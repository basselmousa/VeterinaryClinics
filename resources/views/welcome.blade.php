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
            <div class="carousel-item active" style="background-image: url('{{asset('home/assets/img/slide/slide-1.jpg')}}')">
                <div class="container">
                    <h2>Welcome to <span>Veterinary Clinics</span></h2>
                    <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel.</p>
                    <a href="#about" class="btn-get-started scrollto">Read More</a>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item" style="background-image: url('{{asset('home/assets/img/slide/slide-2.jpg')}}')">
                <div class="container">
                    <h2>Lorem Ipsum Dolor</h2>
                    <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel.</p>
                    <a href="#about" class="btn-get-started scrollto">Read More</a>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item" style="background-image: url('{{asset('home/assets/img/slide/slide-3.jpg')}}')">
                <div class="container">
                    <h2>Sequi ea ut et est quaerat</h2>
                    <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel.</p>
                    <a href="#about" class="btn-get-started scrollto">Read More</a>
                </div>
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

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="fas fa-heartbeat"></i></div>
                        <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                        <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="fas fa-pills"></i></div>
                        <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
                        <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon"><i class="fas fa-thermometer"></i></div>
                        <h4 class="title"><a href="">Magni Dolores</a></h4>
                        <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon"><i class="fas fa-dna"></i></div>
                        <h4 class="title"><a href="">Nemo Enim</a></h4>
                        <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Featured Services Section -->

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
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row">
                <div class="col-lg-6" data-aos="fade-right">
                    <img src="{{asset('home/assets/img/about.jpg')}}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
                    <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
                    <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua.
                    </p>
                    <ul>
                        <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                        <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                        <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                    </ul>
                    <p>
                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                        culpa qui officia deserunt mollit anim id est laborum
                    </p>
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
                        <span data-purecounter-start="0" data-purecounter-end="{{ count($doctors) }}" data-purecounter-duration="1" class="purecounter"></span>

                        <p><strong>Doctors</strong> consequuntur quae qui deca rode</p>
                        <a href="#">Find out more &raquo;</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <i class="far fa-hospital"></i>
                        <span data-purecounter-start="0" data-purecounter-end="26" data-purecounter-duration="1" class="purecounter"></span>
                        <p><strong>Departments</strong> adipisci atque cum quia aut numquam delectus</p>
                        <a href="#">Find out more &raquo;</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <i class="fas fa-flask"></i>
                        <span data-purecounter-start="0" data-purecounter-end="14" data-purecounter-duration="1" class="purecounter"></span>
                        <p><strong>Research Lab</strong> aut commodi quaerat. Aliquam ratione</p>
                        <a href="#">Find out more &raquo;</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <i class="fas fa-award"></i>
                        <span data-purecounter-start="0" data-purecounter-end="150" data-purecounter-duration="1" class="purecounter"></span>
                        <p><strong>Awards</strong> rerum asperiores dolor molestiae doloribu</p>
                        <a href="#">Find out more &raquo;</a>
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
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
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
                    <div class="swiper-slide"><a class="gallery-lightbox" href="{{asset('home/assets/img/gallery/gallery-1.jpg')}}"><img src="{{asset('home/assets/img/gallery/gallery-1.jpg')}}" class="img-fluid" alt=""></a></div>
                    <div class="swiper-slide"><a class="gallery-lightbox" href="{{asset('home/assets/img/gallery/gallery-2.jpg')}}"><img src="{{asset('home/assets/img/gallery/gallery-2.jpg')}}" class="img-fluid" alt=""></a></div>
                    <div class="swiper-slide"><a class="gallery-lightbox" href="{{asset('home/assets/img/gallery/gallery-3.jpg')}}"><img src="{{asset('home/assets/img/gallery/gallery-3.jpg')}}" class="img-fluid" alt=""></a></div>
                    <div class="swiper-slide"><a class="gallery-lightbox" href="{{asset('home/assets/img/gallery/gallery-4.jpg')}}"><img src="{{asset('home/assets/img/gallery/gallery-4.jpg')}}" class="img-fluid" alt=""></a></div>
                    <div class="swiper-slide"><a class="gallery-lightbox" href="{{asset('home/assets/img/gallery/gallery-5.jpg')}}"><img src="{{asset('home/assets/img/gallery/gallery-5.jpg')}}" class="img-fluid" alt=""></a></div>
                    <div class="swiper-slide"><a class="gallery-lightbox" href="{{asset('home/assets/img/gallery/gallery-6.jpg')}}"><img src="{{asset('home/assets/img/gallery/gallery-6.jpg')}}" class="img-fluid" alt=""></a></div>
                    <div class="swiper-slide"><a class="gallery-lightbox" href="{{asset('home/assets/img/gallery/gallery-7.jpg')}}"><img src="{{asset('home/assets/img/gallery/gallery-7.jpg')}}" class="img-fluid" alt=""></a></div>
                    <div class="swiper-slide"><a class="gallery-lightbox" href="{{asset('home/assets/img/gallery/gallery-8.jpg')}}"><img src="{{asset('home/assets/img/gallery/gallery-8.jpg')}}" class="img-fluid" alt=""></a></div>
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
