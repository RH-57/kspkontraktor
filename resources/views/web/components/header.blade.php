    <div class="container-fluid px-5 d-none d-lg-block">
        <div class="row gx-5">
            <div class="col-lg-4 text-center py-3">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-geo-alt fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase fw-bold">Our Office</h6>
                        <span>{{$contacts->address}}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center border-start border-end py-3">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-envelope-open fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase fw-bold">Email Us</h6>
                        <span>{{$contacts->email}}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center py-3">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase fw-bold">Call Us</h6>
                        <span>+{{$contacts->phone}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid sticky-top bg-dark bg-light-radial shadow-sm px-5 pe-lg-0">
        <nav class="navbar navbar-expand-lg bg-dark bg-light-radial navbar-dark py-3 py-lg-0">
            <a href="{{route('home')}}" class="navbar-brand">
                <h2 class="m-0 display-4 text-uppercase text-white"><i class="bi bi-building text-primary me-2"></i>KSP</h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{route('home')}}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                    <a href="{{route('services')}}" class="nav-item nav-link {{ request()->routeIs('services') ? 'active' : '' }}">Service</a>
                    <a href="{{route('projects')}}" class="nav-item nav-link {{ request()->routeIs('projects') ? 'active' : '' }}">Project</a>
                    <a href="{{route('articles')}}" class="nav-item nav-link {{ request()->routeIs('articles') ? 'active' : '' }}">Article</a>
                    <a href="{{route('contact')}}" class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                    <a
                        href="https://wa.me/{{$contacts->phone}}?text=Saya%20tertarik%20dengan%20layanan%20Anda.%20Bisa%20minta%20penawaran?"
                        class="nav-item nav-link bg-primary text-white px-5 ms-3 d-none d-lg-block"
                        target="_blank">
                        Get A Quote
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </nav>
    </div>
