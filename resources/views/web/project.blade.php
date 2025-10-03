<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Our Projects - PT. Karya Solusi Pembangunan</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{asset('assets/web/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('assets/web/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/web/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/web/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <!-- Customized Bootstrap Stylesheet
    <link href="{{asset('assets/web/css/bootstrap.min.css')}}" rel="stylesheet">-->
    <link href="{{asset('assets/web/css/custom.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('assets/web/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <div id="page-wrapper" style="height: 100vh; overflow: auto;">
    <!-- Topbar Start -->
    @include('web.components.header')
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">Our Projects</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a href="">Home</a></h6>
            <h6 class="text-white m-0 px-3">/</h6>
            <h6 class="text-uppercase text-white m-0">Projects</h6>
        </div>
    </div>
    <!-- Page Header Start -->

     <!-- Services Start -->
    <div class="container-fluid bg-light py-6 px-5">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-7 text-uppercase mb-4">Beberapa Proyek Impian <span class="text-primary">terpopuler</span> kami</h1>
        </div>
        <div class="row g-5">
            @foreach($projects as $project)
            <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item first">
                <div class="position-relative portfolio-box">
                    <img class="img-fluid w-100" src="{{ $project->images->first() ? asset('storage/' . $project->images->first()->image) : asset('default.jpg') }}"
                    alt="{{ $project->name }}"
                    style="height: 250px; object-fit: cover; border-radius: 5px;" />
                    <a class="portfolio-title shadow-sm" href="{{ route('webprojects.show', $project->slug) }}">
                        <p class="h4 text-uppercase">{{$project->name}}</p>
                        <span class="text-body"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$project->location}}</span>
                    </a>
                    <a class="portfolio-btn" href="{{ $project->images->first() ? asset('storage/' . $project->images->first()->image) : asset('default.jpg') }}" data-lightbox="portfolio">
                        <i class="bi bi-plus text-white"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Services End -->

    <div class="container py-6 position-relative">
        <div class="text-center mx-auto mb-5" style="max-width: 650px;">
            <h1 class="display-6 fw-bold text-uppercase mb-3">
                Cerita <span class="text-primary">Bahagia</span> Klien Kami
            </h1>
        </div>

        <div class="owl-carousel testimonial-carousel px-2">
            @foreach($testimonials as $testi)
            <div class="card border-0 shadow-lg rounded-4 p-4 mx-3 h-100 position-relative hover-card"
                style="background: rgba(255,255,255,0.9); backdrop-filter: blur(12px); transition: all 0.3s ease;">

                <!-- Quote Icon -->
                <div class="text-primary fs-1 mb-3"><i class="fa fa-quote-left"></i></div>

                <!-- Testimonial Text -->
                <p class="fs-5 text-dark lh-lg mb-4">
                    {{$testi->description}}
                </p>

                <!-- Client Info -->
                <div class="d-flex align-items-center">
                    <!-- Klik gambar bisa diperbesar -->
                    <a href="{{ asset('storage/' .$testi->image) }}" class="glightbox" data-gallery="testimonials">
                        <img src="{{ asset('storage/' .$testi->image) }}"
                            class="rounded-circle me-3 shadow-sm img-thumbnail"
                            alt="Client Image"
                            style="width: 70px; height: 70px; object-fit: cover; border: 3px solid #0d6efd; cursor: zoom-in;">
                    </a>

                    <div>
                        <h5 class="mb-1 fw-bold">{{$testi->client_name}}</h5>
                        <small class="text-muted">{{$testi->project_name}}</small>

                        <!-- Rating -->
                        <div class="text-warning mt-1">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Footer Start -->
    <div class="footer container-fluid position-relative bg-dark bg-light-radial text-white-50 py-6 px-5">
        @include('web.components.footer')
    </div>
    <!-- Footer End -->
    </div>
    <a href="https://wa.me/{{ $contacts->phone }}?text=Halo%20saya%20tertarik%20dengan%20layanan%20Anda"
        class="whatsapp-float"
        target="_blank"
        aria-label="Chat WhatsApp">
            <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/web/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('assets/web/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/web/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/web/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('assets/web/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('assets/web/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script src="{{asset('assets/web/lib/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/web/lib/lightbox/js/lightbox.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('assets/web/js/main.js')}}"></script>
</body>

</html>
