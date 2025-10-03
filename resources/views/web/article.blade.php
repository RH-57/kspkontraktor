<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Articles - PT. Karya Solusi Pembangunan</title>
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
        <h1 class="display-3 text-uppercase text-white mb-3">Articles</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a href="{{route('home')}}">Home</a></h6>
            <h6 class="text-white m-0 px-3">/</h6>
            <h6 class="text-uppercase text-white m-0">Articles</h6>
        </div>
    </div>
    <!-- Page Header Start -->

     <!-- Services Start -->
    <div class="container-fluid bg-light py-6 px-5">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-7 text-uppercase mb-4">Artikel <span class="text-primary">terbaru</span> kami</h1>
        </div>
        <div class="row g-4">
        @foreach($posts as $article)
            <div class="col-lg-4 col-md-6">
                <div class="card article-card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
                    <!-- Gambar Artikel -->
                    <div class="position-relative">
                    <img src="{{ $article->featured_image ? asset('/' . $article->featured_image) : asset('default.jpg') }}"
                        class="card-img-top"
                        alt="{{ $article->title }}"
                        style="height: 230px; object-fit: cover;">
                    <span class="badge bg-primary position-absolute top-0 start-0 m-3 px-3 py-2">
                        {{ $article->category->name ?? 'Artikel' }}
                    </span>
                    </div>

                    <!-- Konten Artikel -->
                    <div class="card-body d-flex flex-column">
                    <small class="text-muted mb-2">
                        <i class="bi bi-calendar-event me-1"></i>
                        {{ $article->created_at->format('d M Y') }}
                    </small>
                    <h5 class="card-title fw-bold mb-3">
                        <a href="{{ route('webarticles.show', $article->slug) }}" class="text-dark text-decoration-none">
                        {{ $article->title }}
                        </a>
                    </h5>
                    <p class="card-text text-muted flex-grow-1">
                        {!! Str::limit(strip_tags($article->content), 100) !!}
                    </p>
                    <a href="{{ route('webarticles.show', $article->slug) }}" class="btn btn-outline-primary mt-3 align-self-start">
                        Baca Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-5">
            {{ $posts->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <!-- Services End -->



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
