<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Google Ads Settings - Admin</title>
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
</head>

<body>

  <!-- ======= Header ======= -->
  @include('admin.components.header')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('admin.components.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Google Ads Settings</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
          <li class="breadcrumb-item active">Google Ads</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Update <span>| Google Ads</span></h5>

              <form action="{{ route('ads.update') }}" method="POST">
                @csrf

                <div class="mb-3">
                  <label for="client_id" class="form-label">Google Ads Client ID</label>
                  <input type="text" class="form-control @error('client_id') is-invalid @enderror"
                         name="client_id"
                         value="{{ old('client_id', $setting->client_id ?? '') }}"
                         placeholder="ca-pub-1234567890123456">
                  @error('client_id')
                      <div class="alert alert-danger mt-2">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="slot_id" class="form-label">Ad Slot ID</label>
                  <input type="text" class="form-control @error('slot_id') is-invalid @enderror"
                         name="slot_id"
                         value="{{ old('slot_id', $setting->slot_id ?? '') }}"
                         placeholder="9876543210">
                  @error('slot_id')
                      <div class="alert alert-danger mt-2">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="ad_format" class="form-label">Ad Format</label>
                  <input type="text" class="form-control @error('ad_format') is-invalid @enderror"
                         name="ad_format"
                         value="{{ old('ad_format', $setting->ad_format ?? 'auto') }}"
                         placeholder="auto">
                  <small class="text-muted">Default: <code>auto</code></small>
                  @error('ad_format')
                      <div class="alert alert-danger mt-2">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" name="responsive" id="responsive"
                         value="1" {{ old('responsive', $setting->responsive ?? false) ? 'checked' : '' }}>
                  <label class="form-check-label" for="responsive">
                    Full Width Responsive
                  </label>
                </div>

                <div class="mb-3">
                  <label for="custom_style" class="form-label">Custom Style</label>
                  <textarea class="form-control @error('custom_style') is-invalid @enderror"
                            name="custom_style" rows="3"
                            placeholder="e.g. display:block; height:250px;">{{ old('custom_style', $setting->custom_style ?? '') }}</textarea>
                  <small class="text-muted">Gunakan CSS inline style jika perlu custom ukuran.</small>
                  @error('custom_style')
                      <div class="alert alert-danger mt-2">{{ $message }}</div>
                  @enderror
                </div>

                <div class="d-flex justify-content-end">
                  <button type="submit" class="btn btn-success">Update</button>
                </div>
              </form>

            </div>
          </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->

  @include('admin.components.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

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

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @if(session('success'))
  <script>
      Swal.fire({
          icon: 'success',
          title: 'Success!',
          text: "{{ session('success') }}",
          timer: 2000,
          showConfirmButton: false
      })
  </script>
  @endif

  @if(session('error'))
  <script>
      Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: "{{ session('error') }}",
          timer: 3000,
          showConfirmButton: true
      })
  </script>
  @endif

</body>

</html>
