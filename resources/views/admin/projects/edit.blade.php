<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit Project - Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/admin/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/admin/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Nunito:300,400,600,700|Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/admin/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/admin/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/admin/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('assets/admin/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('assets/admin/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/admin/vendor/simple-datatables/style.css')}}" rel="stylesheet">
  <link href="{{asset('assets/admin/vendor/ckeditor/ckeditor5.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/admin/css/style.css')}}" rel="stylesheet">
</head>

<body>
  @include('admin.components.header')
  @include('admin.components.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Project</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Projects</a></li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">

              {{-- FORM UPDATE PROJECT --}}
              <form action="{{ route('projects.update', $project->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" name="name" class="form-control"
                         value="{{ old('name', $project->name) }}" required>
                </div>

                <div class="mb-3">
                  <label for="location" class="form-label">Location</label>
                  <input type="text" name="location" class="form-control"
                         value="{{ old('location', $project->location) }}" required>
                </div>

                <div class="mb-3">
                    <label for="year" class="form-label">Year</label>
                    <input type="number" name="year" class="form-control"
                            value="{{ old('year', $project->year) }}" required minlength="4" maxlength="4">
                </div>

                <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <textarea name="description" id="editor" class="form-control" rows="4" required>{{ old('description', $project->description) }}</textarea>
                </div>

                {{-- Upload gambar baru --}}
                <div class="mb-3">
                  <label for="images" class="form-label">Add New Images</label>
                  <input type="file" name="images[]" class="form-control" multiple>
                  <small class="text-muted">You can upload multiple images (jpg, png, max 10MB each).</small>
                </div>


                <h5 class="mt-4">SEO Meta</h5>
                <div class="mb-3">
                  <label for="meta_title" class="form-label">Meta Title</label>
                  <input type="text" name="meta_title" class="form-control"
                         value="{{ old('meta_title', $project->meta_title) }}">
                </div>

                <div class="mb-3">
                  <label for="meta_description" class="form-label">Meta Description</label>
                  <textarea name="meta_description" class="form-control" rows="2">{{ old('meta_description', $project->meta_description) }}</textarea>
                </div>

                <div class="mb-3">
                  <label for="meta_keyword" class="form-label">Meta Keyword</label>
                  <input type="text" name="meta_keyword" class="form-control"
                         value="{{ old('meta_keyword', $project->meta_keyword) }}">
                </div>

                <div class="mb-3">
                  <label for="canonical_url" class="form-label">Canonical URL</label>
                  <input type="url" name="canonical_url" class="form-control"
                         value="{{ old('canonical_url', $project->canonical_url) }}">
                </div>

                <div class="mt-4">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a href="{{ route('projects.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
              </form>

              {{-- LIST GAMBAR YANG SUDAH ADA --}}
              <hr>
              <h5 class="mt-4">Existing Images</h5>
              @if($project->images && $project->images->count() > 0)
                <div class="row mt-3">
                  @foreach($project->images as $img)
                    <div class="col-md-3 text-center mb-3">
                      <img src="{{ asset('storage/public/'.$img->image) }}" class="img-thumbnail mb-2" width="200">
                      <form action="{{ route('projects.images.delete', $img->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit"
                                  onclick="return confirm('Are you sure you want to delete this image?')"
                                  class="btn btn-sm btn-danger">
                              <i class="bi bi-trash"></i> Delete
                          </button>
                      </form>
                    </div>
                  @endforeach
                </div>
              @else
                <p class="text-muted">No images uploaded yet.</p>
              @endif

            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  @include('admin.components.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/admin/js/main.js')}}"></script>
   <script type="importmap">
    {
        "imports": {
            "ckeditor5": "/assets/admin/vendor/ckeditor/ckeditor5.js",
            "ckeditor5/": "/assets/admin/vendor/ckeditor/"
        }
    }
    </script>

    <script type="module">
        import {
            ClassicEditor,
            Essentials,
            Paragraph,
            Bold,
            Italic,
            Font
        } from 'ckeditor5';

        ClassicEditor
            .create( document.querySelector( '#editor' ), {
                licenseKey: 'GPL', // bebas, karena kamu pakai versi GPL
                plugins: [ Essentials, Paragraph, Bold, Italic, Font ],
                toolbar: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ]
            } )
            .then( editor => {
                window.editor = editor;
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>

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
