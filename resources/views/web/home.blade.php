<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Home - PT. Karya Solusi Pembangunan</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
     <!-- Meta Deskripsi -->
    <meta name="description" content="PT. Karya Solusi Pembangunan adalah kontraktor profesional terpercaya yang menyediakan layanan konstruksi, renovasi, dan pembangunan dengan kualitas terbaik serta harga terjangkau.">

    <!-- Meta Keywords -->
    <meta name="keywords" content="kontraktor, jasa kontraktor, jasa bangun rumah, renovasi rumah, kontraktor profesional, pembangunan gedung, jasa konstruksi, PT. Karya Solusi Pembangunan">

    <!-- Author -->
    <meta name="author" content="PT. Karya Solusi Pembangunan">

     <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="PT. Karya Solusi Pembangunan | Kontraktor Profesional & Jasa Bangun">
    <meta property="og:description" content="Percayakan pembangunan rumah, gedung, dan proyek konstruksi Anda kepada kontraktor berpengalaman PT. Karya Solusi Pembangunan.">
    <meta property="og:image" content="{{ asset('assets/web/img/carousel-1.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="PT. Karya Solusi Pembangunan">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="PT. Karya Solusi Pembangunan | Kontraktor Profesional & Jasa Bangun">
    <meta name="twitter:description" content="Layanan konstruksi terpercaya dengan tenaga ahli, material berkualitas, dan garansi hasil.">
    <meta name="twitter:image" content="{{ asset('assets/web/img/carousel-2.jpg') }}">

    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Favicon -->
    <link href="{{asset('assets/web/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="{{asset('assets/web/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/web/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/web/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet
    <link href="{{asset('assets/web/css/bootstrap.min.css')}}" rel="stylesheet">-->
    <link href="{{asset('assets/web/css/custom.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('assets/web/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div id="page-wrapper" style="height: 100vh; overflow: auto;">
        @include('web.components.header')

        <!-- Navbar End -->


        <!-- Carousel Start -->
        <div class="container-fluid p-0">
            <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="w-100" src="{{asset('assets/web/img/carousel-1.jpg')}}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 900px;">
                                <i class="fa fa-home fa-4x text-primary mb-4 d-none d-sm-block"></i>
                                <h1 class="display-2 text-uppercase text-white mb-md-4">Bangun Impian Anda Bersama Kami</h1>
                                <a href="https://wa.me/{{$contacts->phone}}?text=Saya%20tertarik%20dengan%20layanan%20Anda.%20Bisa%20minta%20penawaran?" target="_blank" class="btn btn-primary py-md-3 px-md-5 mt-2">Minta Penawaran</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="{{asset('assets/web/img/carousel-2.jpg')}}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 900px;">
                                <i class="fa fa-tools fa-4x text-primary mb-4 d-none d-sm-block"></i>
                                <h1 class="display-2 text-uppercase text-white mb-md-4">Terpercaya untuk Setiap Proyek</h1>
                                <a href="https://wa.me/{{$contacts->phone}}?text=Saya%20ingin%20konsultasi%20dengan%20Anda%20tentang%20jasa%20kontraktor?" target="_blank" class="btn btn-primary py-md-3 px-md-5 mt-2">Konsultasi Gratis</a>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Carousel End -->


        <!-- About Start -->
        <div class="container-fluid py-6 px-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <h1 class="display-5 text-uppercase mb-4"><span class="text-primary">terdepan</span> dalam Industri Konstruksi</h1>
                    <h4 class="text-uppercase mb-3 text-body">Partner Terpercaya untuk Membangun Impian Anda</h4>
                    <p>
                        <strong>KSP Kontraktor</strong> memahami bahwa setiap proyek adalah investasi berharga. Dengan komitmen pada kualitas dan ketepatan waktu, kami siap mewujudkan visi konstruksi Anda menjadi kenyataan yang kokoh dan fungsional.
                    </p>
                    <p>Keunggulan Layanan Kami:</p>
                    <div class="row gx-5 py-2">
                        <div class="col-sm-6 mb-2">
                            <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>Perencanaan Detail</p>
                            <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>Tim Profesional</p>
                            <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>Proses Transparan</p>
                        </div>
                    </div>
                    <p class="mb-4">Percayakan pembangunan properti impian Anda kepada kami - dari konsep hingga penyelesaian akhir.</p>
                </div>
                <div class="col-lg-5 pb-5" style="min-height: 400px;">
                    <div class="position-relative bg-dark-radial h-100 ms-5">
                        <img class="position-absolute w-100 h-100 mt-5 ms-n5" src="{{asset('assets/web/img/about.jpg')}}" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Services Start -->
        <div class="container-fluid bg-light py-6 px-5">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                <h1 class="display-7 text-uppercase mb-4">Kami Menyediakan Layanan Konstruksi <span class="text-primary">TERBAIK</span></h1>
            </div>
            <div class="row g-5">
                @foreach($services as $service)
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-white d-flex flex-column align-items-center text-center h-100">
                        <img
                            class="img-fluid"
                            src="{{ asset('storage/public/' .$service->image) }}"
                            alt="{{ $service->title }}"
                            style="width: 100%; height: 250px; object-fit: cover; border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;"
                        />
                        <div class="service-icon bg-white">
                            <i class="fa fa-3x {{ $service->icon }} text-primary"></i>
                        </div>
                        <div class="px-4 pb-4 d-flex flex-column flex-grow-1">
                            <h4 class="text-uppercase mb-3">{{ $service->title }}</h4>
                            <p class="flex-grow-1">
                                {{ $service->short_description }}
                            </p>
                            <a class="btn text-primary mt-auto" href="{{route('webservice.show' , $service->slug)}}">
                                Read More <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <!-- Services End -->

        <div class="container-fluid bg-light py-6 px-5">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                <h1 class="display-7 text-uppercase mb-4">
                    Mengapa <span class="text-primary">Harus</span> Memilih Kami?
                </h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="p-4 shadow-sm rounded bg-white h-100">
                        <i class="fas fa-user-tie fa-3x text-primary mb-3"></i>
                        <h5 class="fw-bold">Tenaga Ahli</h5>
                        <p class="text-muted mb-0">Tim berpengalaman dan profesional di bidangnya.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="p-4 shadow-sm rounded bg-white h-100">
                        <i class="fas fa-money-bill-wave fa-3x text-primary mb-3"></i>
                        <h5 class="fw-bold">Harga Murah</h5>
                        <p class="text-muted mb-0">Solusi terbaik dengan biaya yang tetap terjangkau.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="p-4 shadow-sm rounded bg-white h-100">
                        <i class="fas fa-pencil-ruler fa-3x text-primary mb-3"></i>
                        <h5 class="fw-bold">Gratis Design</h5>
                        <p class="text-muted mb-0">Kami menyediakan design gratis sesuai kebutuhan Anda.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="p-4 shadow-sm rounded bg-white h-100">
                        <i class="fas fa-map fa-3x text-primary mb-3"></i>
                        <h5 class="fw-bold">Gratis Survey</h5>
                        <p class="text-muted mb-0">Survey lokasi tanpa biaya tambahan.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="p-4 shadow-sm rounded bg-white h-100">
                        <i class="fas fa-check fa-3x text-primary mb-3"></i>
                        <h5 class="fw-bold">Berkualitas</h5>
                        <p class="text-muted mb-0">Material terbaik dan standar pengerjaan tinggi.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="p-4 shadow-sm rounded bg-white h-100">
                        <i class="fas fa-award fa-3x text-primary mb-3"></i>
                        <h5 class="fw-bold">Bergaransi</h5>
                        <p class="text-muted mb-0">Kami memberikan garansi sebagai bentuk tanggung jawab.</p>
                    </div>
                </div>
            </div>
        </div>


        <!-- Portfolio Start -->
        <div class="container-fluid bg-light py-6 px-5">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                <h1 class="display-7 text-uppercase mb-4">Beberapa Proyek Impian <span class="text-primary">terpopuler</span> kami</h1>
            </div>

            <div class="row g-5">
                @foreach($projects as $project)
                <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item first">
                    <div class="position-relative portfolio-box">
                        <img class="img-fluid w-100" src="{{ $project->images->first() ? asset('storage/public/' . $project->images->first()->image) : asset('default.jpg') }}"
                        alt="{{ $project->name }}"
                        style="height: 250px; object-fit: cover; border-radius: 5px;" />
                        <a class="portfolio-title shadow-sm" href="">
                            <p class="h4 text-uppercase">{{$project->name}}</p>
                            <span class="text-body"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$project->location}}</span>
                        </a>
                        <a class="portfolio-btn" href="{{ $project->images->first() ? asset('storage/public/' . $project->images->first()->image) : asset('default.jpg') }}" data-lightbox="portfolio">
                            <i class="bi bi-plus text-white"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- Portfolio End -->

        <!-- Testimonial Start -->
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
                        <a href="{{ asset('storage/public/' .$testi->image) }}" class="glightbox" data-gallery="testimonials">
                            <img src="{{ asset('storage/public/' .$testi->image) }}"
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

        <!-- Testimonial End -->


        <!-- Blog Start -->
        <div class="container-fluid py-6 px-5">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                <h1 class="display-5 text-uppercase mb-4"><span class="text-primary">Artikel</span> Terbaru dari Blog Kami</h1>
            </div>
            <div class="row g-5">
                @foreach($posts as $post)
                <div class="col-lg-4 col-md-6">
                    <div class="bg-light">
                        <img class="img-fluid" src="{{ asset('storage/public/' . $post->featured_image) }}" alt="" style="height: 250px; object-fit: cover; border-radius: 5px;">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-4">
                                <div class="d-flex align-items-center">
                                    <span>{{$post->category->name}}</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="ms-3"><i class="far fa-calendar-alt text-primary me-2"></i>{{ $post->published_at_formatted }}</span>
                                </div>
                            </div>
                            <h4 class="text-uppercase mb-3">{{$post->title}}</h4>
                            <a class="text-uppercase fw-bold" href="{{ route('webarticles.show', $post->slug) }}">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Blog End -->


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
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
    <script>
        const lightbox = GLightbox({
            selector: '.glightbox',
            touchNavigation: true,
            loop: true,
            zoomable: true,
        });
    </script>

    <style>
        .hover-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }
    </style>
</body>

</html>
