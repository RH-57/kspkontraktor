<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Projects - Admin</title>
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
      <h1>Project Detail</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Projects</a></li>
          <li class="breadcrumb-item active">Detail</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body pt-3">
                <!-- Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">

                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#project-info">Info</button>
                    </li>

                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#project-seo">SEO</button>
                    </li>

                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#project-media">Media</button>
                    </li>

                </ul><!-- End Tabs -->

                <div class="tab-content pt-2">

                    <!-- Info Tab -->
                    <div class="tab-pane fade show active" id="project-info">
                        <h5 class="card-title">Content</h5>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <strong>Name</strong>
                                <p>{{ $project->name }}</p>
                            </div>

                            <div class="col-md-4">
                                <strong>Location</strong>
                                <p>{{$project->location}}</p>
                            </div>

                            <div class="col-md-4">
                                <strong>Year</strong>
                                <p>{{$project->year}}</p>
                            </div>
                        </div>



                        <div class="row mb-3">
                            <div class="col">
                                <strong>Description</strong>
                                <div class="border rounded p-2 bg-light">
                                {!! $project->description !!}
                                </div>
                            </div>
                        </div>
                    </div><!-- End Info Tab -->

                    <!-- SEO Tab -->
                    <div class="tab-pane fade" id="project-seo">
                        <h5 class="card-title">SEO Information</h5>
                        <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Meta Title</strong>
                            <p>{{ $project->meta_title }}</p>
                        </div>
                        <div class="col-md-4">
                            <strong>Meta Keyword</strong>
                            <p>{{ $project->meta_keyword }}</p>
                        </div>
                        <div class="col-md-4">
                            <strong>Meta Description</strong>
                            <p>{{ $project->meta_description }}</p>
                        </div>
                        </div>

                        <div class="row mb-3">
                        <div class="col-md-12">
                            <strong>Canonical URL</strong>
                            <p>
                            <a href="{{ $project->canonical_url }}" target="_blank">
                                {{ $project->canonical_url }}
                            </a>
                            </p>
                        </div>
                        </div>
                    </div><!-- End SEO Tab -->

                    <!-- Media Tab -->
                    <div class="tab-pane fade" id="project-media">
                        <h5 class="card-title">Media Files</h5>
                        <div class="row">
                            @forelse($project->images as $img)
                                <div class="col-md-3 col-sm-6 mb-3">
                                    <div class="card h-100 shadow-sm">
                                        <img src="{{ asset('storage/public/' . $img->image) }}"
                                            alt="{{ $project->name }}"
                                            class="card-img-top rounded"
                                            style="height:200px; object-fit:cover;">
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <p class="text-muted">No images uploaded for this project.</p>
                                </div>
                            @endforelse
                            </div>
                    </div><!-- End Media Tab -->

                </div><!-- End Tab Content -->

                <!-- Action Buttons -->
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('projects.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Back
                    </a>
                    <a href="{{ route('projects.edit', $project->slug) }}" class="btn btn-primary">
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
