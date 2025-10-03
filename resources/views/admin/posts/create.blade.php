<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Create Post - Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/admin/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/admin/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Nunito:300,400,600,700|Poppins:300,400,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/admin/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/admin/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
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
      <h1>Create Post</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Posts</a></li>
          <li class="breadcrumb-item active">Create</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add New Post</h5>

              <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Title -->
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text" name="title" value="{{ old('title') }}" class="form-control" required>
                    @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                  </div>
                </div>

                <!-- Category -->
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Category</label>
                  <div class="col-sm-10">
                    <select name="post_category_id" class="form-select" required>
                        <option value="">-- Select Category --</option>
                        @foreach($categories as $cat)
                          <option value="{{ $cat->id }}" {{ old('post_category_id') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                          </option>
                        @endforeach
                    </select>
                    @error('post_category_id') <small class="text-danger">{{ $message }}</small> @enderror
                  </div>
                </div>

                <!-- Featured Image -->
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Featured Image</label>
                  <div class="col-sm-10">
                    <input type="file" name="featured_image" class="form-control" accept="image/*">
                    @error('featured_image') <small class="text-danger">{{ $message }}</small> @enderror
                  </div>
                </div>

                <!-- Content -->
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Content</label>
                  <div class="col-sm-10">
                    <textarea name="content" id="editor" class="form-control" rows="10">{{ old('content') }}</textarea>
                    @error('content') <small class="text-danger">{{ $message }}</small> @enderror
                  </div>
                </div>

                <!-- Status -->
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                    <select name="status" class="form-select">
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                  </div>
                </div>

                <!-- SEO -->
                <h5 class="card-title">SEO Meta</h5>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Meta Title</label>
                  <div class="col-sm-10">
                    <input type="text" name="meta_title" value="{{ old('meta_title') }}" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Meta Description</label>
                  <div class="col-sm-10">
                    <textarea name="meta_description" class="form-control" rows="2">{{ old('meta_description') }}</textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Meta Keyword</label>
                  <div class="col-sm-10">
                    <input type="text" name="meta_keyword" value="{{ old('meta_keyword') }}" class="form-control">
                  </div>
                </div>

                <!-- Buttons -->
                <div class="text-end">
                  <button type="submit" class="btn btn-primary">Save</button>
                  <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
              </form>

            </div>
          </div>

        </div>
      </div>
    </section>

</main>

@include('admin.components.footer')

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/admin/vendor/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('assets/admin/js/main.js')}}"></script>

<!-- CKEditor 5 -->
<!-- CKEditor 5 Self-hosted -->
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
        Font,
        Image,
        ImageToolbar,
        ImageUpload,
        ImageInsert,
        CKFinderUploadAdapter,
        List,
        Link,
        ImageStyle
    } from 'ckeditor5';

    ClassicEditor
        .create(document.querySelector('#editor'), {
            licenseKey: 'GPL',
            plugins: [
                Essentials, Paragraph, Bold, Italic, Font,
                Image, ImageToolbar, ImageUpload, ImageInsert, CKFinderUploadAdapter,
                List, Link, ImageStyle
            ],
            toolbar: [
                'undo', 'redo', '|',
                'bold', 'italic', '|',
                'link', '|',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
                'bulletedList', 'numberedList', '|',
                'uploadImage', 'insertImage'
            ],
            ckfinder: {
                uploadUrl: "{{ route('posts.uploadImage') }}?_token={{ csrf_token() }}"
            },
            image: {
                toolbar: [
                    'imageStyle:inline',
                    'imageStyle:block',
                    'imageStyle:side',
                    '|',
                    'imageStyle:alignLeft',
                    'imageStyle:alignCenter',
                    'imageStyle:alignRight',
                    '|',
                    'toggleImageCaption',
                    'imageTextAlternative'
                ]
            }
        })
        .then(editor => {
            window.editor = editor;
        })
        .catch(error => {
            console.error(error);
        });
</script>




<!-- SweetAlert -->
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
