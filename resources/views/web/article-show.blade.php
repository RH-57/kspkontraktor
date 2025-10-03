<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $post->title }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="{{ $post->meta_keyword ?? $post->title }}" name="keywords">
    <meta content="{{ $post->meta_description ?? Str::limit(strip_tags($post->content), 150) }}" name="description">

     <!-- Open Graph Meta -->
    <meta property="og:title" content="{{ $post->title }}" />
    <meta property="og:description" content="{{ $post->meta_description ?? Str::limit(strip_tags($post->content), 150) }}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ $post->featured_image ? asset('/' . $post->featured_image) : asset('assets/web/img/default.jpg') }}" />
    <meta property="og:site_name" content="KSP Kontraktor" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $post->title }}" />
    <meta name="twitter:description" content="{{ $post->meta_description ?? Str::limit(strip_tags($post->content), 150) }}" />
    <meta name="twitter:image" content="{{ $post->featured_image ? asset('/' . $post->featured_image) : asset('assets/web/img/default.jpg') }}" />

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
    <style>
    .article-content img {
        max-width: 100%;
        height: auto;
        border-radius: 5px;
        margin: 15px 0;
    }
    </style>


    <!-- Page Header -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3 text-center">{{ $post->title }}</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a href="{{ route('home') }}">Home</a></h6>
            <h6 class="text-white m-0 px-3">/</h6>
            <h6 class="text-uppercase m-0"><a href="{{ route('articles') }}" class="text-white">Articles</a></h6>
            <h6 class="text-white m-0 px-3">/</h6>
            <h6 class="text-uppercase text-white m-0">Detail</h6>
        </div>
    </div>

    <!-- Article Detail -->
    <div class="container py-6">
        <div class="row g-5">
            <!-- Artikel Utama -->
            <div class="col-lg-8">
                @if($post->featured_image)
                    <img src="{{ asset('/' . $post->featured_image) }}"
                        class="img-fluid rounded shadow-sm mb-4"
                        alt="{{ $post->title }}"
                        style="width: 100%; max-height: 400px; object-fit: cover;">
                @else
                    <img src="{{ asset('assets/web/img/default.jpg') }}"
                        class="img-fluid rounded shadow-sm mb-4"
                        alt="No Image"
                        style="width: 100%; max-height: 400px; object-fit: cover;">
                @endif

                 <div class="text-muted small mb-4">
                    <span class="badge bg-primary me-2">{{ $post->category->name ?? 'Uncategorized' }}</span><br />
                    <span><i>{{ $post->author ?? 'Admin' }} - {{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('d F Y') }}</i></span>
                </div>

                <!-- Konten Artikel -->
                <div class="article-content">
                    {!! $post->content !!}
                </div>

                <!-- Tombol Share -->
                <div class="share-article mt-5">
                    <h6 class="mb-3">Bagikan artikel ini:</h6>
                    <div class="d-flex gap-2">
                        <!-- WhatsApp -->
                        <a href="https://api.whatsapp.com/send?text={{ urlencode($post->title . ' - ' . url()->current()) }}"
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
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}"
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

            <!-- Sidebar -->
            <div class="col-lg-4">

                <!-- Artikel Terkait -->
                <!-- Artikel Terkait -->
                @if($relatedPosts->count() > 0)
                <div class="bg-white shadow-sm rounded p-4 mb-4">
                    <h4 class="text-uppercase mb-3">Artikel Terkait</h4>
                    <div class="list-group list-group-flush">
                        @foreach($relatedPosts as $related)
                        <a href="{{ route('webarticles.show', $related->slug) }}"
                        class="list-group-item list-group-item-action d-flex align-items-center border-0 px-0 py-2">

                            <!-- Thumbnail -->
                            <img src="{{ $related->featured_image
                                        ? asset('/' . $related->featured_image)
                                        : asset('assets/web/img/default.jpg') }}"
                                alt="{{ $related->title }}"
                                class="rounded me-3"
                                style="width: 110px; height: 80px; object-fit: cover;">

                            <!-- Judul & Tanggal -->
                            <div class="flex-grow-1">
                                <h6 class="mb-1 text-dark">{{ Str::limit($related->title, 60) }}</h6>
                                <small class="text-muted">{{ $related->created_at->format('d M Y') }}</small>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif


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
