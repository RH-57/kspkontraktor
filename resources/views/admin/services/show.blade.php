<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sevices - Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/admin/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/admin/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/admin/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/admin/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/admin/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('assets/admin/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('assets/admin/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/admin/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/admin/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

@include('admin.components.header')
<!-- End Header -->

<!-- ======= Sidebar ======= -->
@include('admin.components.sidebar')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Create Service</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Services</a></li>
          <li class="breadcrumb-item active">Create</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body pt-3">
                <!-- Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">

                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#service-info">Info</button>
                    </li>

                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#service-seo">SEO</button>
                    </li>

                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#service-media">Media</button>
                    </li>

                </ul><!-- End Tabs -->

                <div class="tab-content pt-2">

                    <!-- Info Tab -->
                    <div class="tab-pane fade show active" id="service-info">
                        <h5 class="card-title">Content</h5>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <strong>Title</strong>
                                <p>{{ $service->title }}</p>
                            </div>
                            <div class="col-md-4">
                                <strong>Slug</strong>
                                <p>{{ $service->slug }}</p>
                            </div>
                            <div class="col-md-4">
                                <strong>Status</strong>
                                <p>
                                @if($service->status == 1)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                                </p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <strong>Short Description</strong>
                                <p>{{ $service->short_description }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <strong>Description</strong>
                                <div class="border rounded p-2 bg-light">
                                {!! $service->description !!}
                                </div>
                            </div>
                        </div>
                    </div><!-- End Info Tab -->

                    <!-- SEO Tab -->
                    <div class="tab-pane fade" id="service-seo">
                        <h5 class="card-title">SEO Information</h5>
                        <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Meta Title</strong>
                            <p>{{ $service->meta_title }}</p>
                        </div>
                        <div class="col-md-4">
                            <strong>Meta Keyword</strong>
                            <p>{{ $service->meta_keyword }}</p>
                        </div>
                        <div class="col-md-4">
                            <strong>Meta Description</strong>
                            <p>{{ $service->meta_description }}</p>
                        </div>
                        </div>

                        <div class="row mb-3">
                        <div class="col-md-12">
                            <strong>Canonical URL</strong>
                            <p>
                            <a href="{{ $service->canonical_url }}" target="_blank">
                                {{ $service->canonical_url }}
                            </a>
                            </p>
                        </div>
                        </div>
                    </div><!-- End SEO Tab -->

                    <!-- Media Tab -->
                    <div class="tab-pane fade" id="service-media">
                        <h5 class="card-title">Media Files</h5>
                        <div class="row text-center">
                        <div class="col-md-4 mb-3">
                            <strong>Icon</strong>
                            <p><i class="{{ $service->icon }} fs-3"></i><br>{{ $service->icon }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <strong>Image</strong><br>
                            @if($service->image)
                            <img src="{{ asset('storage/' . $service->image) }}"
                                alt="{{ $service->title }}"
                                class="img-fluid rounded shadow-sm"
                                style="max-height:200px;">
                            @endif
                        </div>
                        <div class="col-md-4 mb-3">
                            <strong>Meta Image</strong><br>
                            @if($service->meta_image)
                            <img src="{{ asset('storage/' . $service->meta_image) }}"
                                alt="Meta {{ $service->title }}"
                                class="img-fluid rounded shadow-sm"
                                style="max-height:200px;">
                            @endif
                        </div>
                        </div>
                    </div><!-- End Media Tab -->

                </div><!-- End Tab Content -->

                <!-- Action Buttons -->
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('services.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Back
                    </a>
                    <a href="{{ route('services.edit', $service->slug) }}" class="btn btn-primary">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>
                </div>

            </div>
        </div>

    </section>

</main>

  <!-- ======= Footer ======= -->
  @include('admin.components.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/admin/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/admin/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('assets/admin/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assets/admin/vendor/quill/quill.js')}}"></script>
  <script src="{{asset('assets/admin/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('assets/admin/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/admin/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/admin/js/main.js')}}"></script>

</body>

</html>
