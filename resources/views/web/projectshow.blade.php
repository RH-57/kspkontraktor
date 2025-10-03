<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $project->name }} - KSP Kontraktor</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="{{ $project->meta_keyword }}" name="keywords">
    <meta content="{{ $project->meta_description }}" name="description">

    <!-- Favicon -->
    <link href="{{ asset('assets/web/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/web/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/web/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div id="page-wrapper" style="height: 100vh; overflow: auto;">
    <!-- Header -->
    @include('web.components.header')

    <!-- Page Header -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">{{ $project->name }}</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a href="{{ route('home') }}">Home</a></h6>
            <h6 class="text-white m-0 px-3">/</h6>
            <h6 class="text-uppercase text-white m-0">Project Detail</h6>
        </div>
    </div>

    <!-- Project Detail -->
    <div class="container py-6">
        <div class="row g-5">
            <!-- Gambar Utama -->
            <div class="col-lg-7">
                 @if($project->images && $project->images->count() > 0)
                    <img src="{{ asset('storage/' . $project->images->first()->image) }}"
                        class="img-fluid rounded shadow-sm mb-4"
                        alt="{{ $project->name }}"
                        style="width: 100%; max-height: 400px; object-fit: cover;">
                @else
                    <img src="{{ asset('assets/web/img/default.jpg') }}"
                        class="img-fluid rounded shadow-sm mb-4"
                        alt="No Image"
                        style="width: 100%; max-height: 400px; object-fit: cover;">
                @endif

                <!-- Konten -->
                <div class="project-content">
                    {!! $project->description !!}
                </div>
                <!-- Tombol Share -->
                <div class="share-article mt-5">
                    <h6 class="mb-3">Bagikan proyek ini:</h6>
                    <div class="d-flex gap-2">
                        <!-- WhatsApp -->
                        <a href="https://api.whatsapp.com/send?text={{ urlencode($project->name . ' - ' . url()->current()) }}"
                        target="_blank"
                        class="btn btn-success btn-sm">
                            <i class="bi bi-whatsapp"></i> WhatsApp
                        </a>

                        <!-- Facebook -->
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                        target="_blank"
                        class="btn btn-primary btn-sm">
                            <i class="bi bi-facebook"></i> Facebook
                        </a>

                        <!-- Twitter / X -->
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($project->name) }}"
                        target="_blank"
                        class="btn btn-info btn-sm text-white">
                            <i class="bi bi-twitter-x"></i> Twitter
                        </a>

                        <!-- LinkedIn -->
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}"
                        target="_blank"
                        class="btn btn-primary btn-sm">
                            <i class="bi bi-linkedin"></i> LinkedIn
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sidebar Info -->
            <div class="col-lg-5">

                <!-- Informasi Proyek -->
                <div class="bg-white shadow-sm rounded p-4 mb-4">
                    <h4 class="text-uppercase mb-3">Informasi Proyek</h4>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <strong>Tahun:</strong> {{ $project->year }}
                        </li>
                        <li class="mb-2">
                            <strong>Lokasi:</strong> {{ $project->location ?? '-' }}
                        </li>
                    </ul>
                </div>

                <!-- Galeri -->
                @if($project->images && $project->images->count() > 0)
                    <div class="bg-white shadow-sm rounded p-4 mb-4">
                        <h4 class="text-uppercase mb-3">Galeri Proyek</h4>
                        <div class="row g-2">
                            @foreach($project->images as $img)
                                <div class="col-6">
                                    <a href="{{ asset('storage/' . $img->image) }}" data-lightbox="project-gallery">
                                        <img src="{{ asset('storage/' . $img->image) }}"
                                            class="img-fluid rounded shadow-sm"
                                            alt="Gallery {{ $project->name }}">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Proyek Lain -->
                @if(isset($otherProjects) && $otherProjects->count() > 0)
                    <div class="bg-white shadow-sm rounded p-4 mb-4">
                        <h4 class="text-uppercase mb-3">Proyek Lain</h4>
                        <div class="row g-3">
                            @foreach($otherProjects as $other)
                                <div class="col-12 col-md-6">
                                    <a href="{{ route('webprojects.show', $other->slug) }}" class="text-decoration-none">
                                        <div class="card border-0 shadow-sm h-100">
                                            <img src="{{ $other->images->first()
                                                        ? asset('storage/' . $other->images->first()->image)
                                                        : asset('assets/web/img/default.jpg') }}"
                                                class="card-img-top rounded-top"
                                                alt="{{ $other->name }}"
                                                style="height: 200px; object-fit: cover;">
                                            <div class="card-body p-2 text-center">
                                                <h6 class="mb-0 text-dark">{{ $other->name }}</h6>
                                                <h6 class="mb-0 text-dark">{{ $other->location }}</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>



            </div>
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
