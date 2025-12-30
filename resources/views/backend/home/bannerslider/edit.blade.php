<!doctype html>
<html lang="en">

<head>
    @include('components.backend.head')
</head>

<body>

@include('components.backend.header')
@include('components.backend.sidebar')

<div class="page-body">
    <div class="container-fluid">

        <!-- Page Title -->
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Edit Banner Details</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.banner-details.index') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Edit Banner</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Form Card -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <h4>Banner Details Form</h4>
                        <p class="f-m-light mt-1">Update banner details and submit.</p>
                    </div>

                    <div class="card-body">
                        <form class="row g-3 needs-validation custom-input"
                              action="{{ route('admin.banner-details.update', $slider->id) }}"
                              method="POST"
                              enctype="multipart/form-data"
                              novalidate>

                            @csrf
                            @method('PUT')

                            <!-- Banner Heading -->
                            <div class="col-md-6">
                                <label class="form-label">
                                    Banner Heading <span class="txt-danger">*</span>
                                </label>
                                <input type="text"
                                       name="banner_heading"
                                       class="form-control"
                                       value="{{ old('banner_heading', $slider->banner_heading) }}"
                                       required>
                                <div class="invalid-feedback">
                                    Please enter banner heading.
                                </div>
                            </div>

<!-- Upload New Media -->
<div class="col-md-6">
    <label class="form-label">
        Change Banner Image / Video
    </label>

    <input type="file"
           name="banner_media"
           id="banner_media"
           class="form-control"
           accept=".jpg,.jpeg,.png,.webp,.mp4,.webm"
           onchange="previewBannerMedia()">

    <small class="text-secondary d-block mt-1">
        Leave blank to keep existing media
    </small>

    <!-- New Preview (BELOW input) -->
    <div id="bannerPreviewContainer" class="mt-3" style="display:none;">
        <label class="form-label">New Preview</label><br>

        <img id="banner_image_preview"
             class="img-fluid"
             style="max-height:200px;display:none;border:1px solid #ddd;padding:5px;">

        <video id="banner_video_preview"
               controls
               style="max-height:200px;display:none;border:1px solid #ddd;padding:5px;">
        </video>
    </div>
</div>

<!-- Existing Media Preview -->
<div class="col-md-6">
    <label class="form-label">Current Banner</label><br>

    @if($slider->media_type === 'image')
        <img src="{{ asset('home/bannerimagevideo/'.$slider->banner_media) }}"
             class="img-fluid"
             style="max-height:200px;border:1px solid #ddd;padding:5px;">
    @else
        <video controls
               style="max-height:200px;border:1px solid #ddd;padding:5px;">
            <source src="{{ asset('home/bannerimagevideo/'.$slider->banner_media) }}">
        </video>
    @endif
</div>


                            <!-- Buttons -->
                            <div class="col-12 text-end">
                                <a href="{{ route('admin.banner-details.index') }}"
                                   class="btn btn-danger px-4">
                                    Cancel
                                </a>
                                <button class="btn btn-primary px-4" type="submit">
                                    Update
                                </button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

@include('components.backend.footer')
@include('components.backend.main-js')

<!-- Preview Script -->
<script>
function previewBannerMedia() {
    const fileInput = document.getElementById('banner_media');
    const file = fileInput.files[0];

    const previewContainer = document.getElementById('bannerPreviewContainer');
    const imagePreview = document.getElementById('banner_image_preview');
    const videoPreview = document.getElementById('banner_video_preview');

    imagePreview.style.display = 'none';
    videoPreview.style.display = 'none';

    if (!file) return;

    const imageTypes = ['image/jpeg', 'image/png', 'image/webp'];
    const videoTypes = ['video/mp4', 'video/webm'];

    const url = URL.createObjectURL(file);

    if (imageTypes.includes(file.type)) {
        imagePreview.src = url;
        imagePreview.style.display = 'block';
    } else if (videoTypes.includes(file.type)) {
        videoPreview.src = url;
        videoPreview.style.display = 'block';
    } else {
        alert('Invalid file type');
        fileInput.value = '';
        return;
    }

    previewContainer.style.display = 'block';
}
</script>

</body>
</html>
