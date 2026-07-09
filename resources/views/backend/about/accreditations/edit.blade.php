<!doctype html>
<html lang="en">

<head>
    @include('components.backend.head')

    <style>
        .preview-box {
            position: relative;
            margin: 6px;
        }

        .preview-box img {
            height: 60px;
            width: 60px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #ddd;
        }

        .remove-btn {
            position: absolute;
            top: -8px;
            right: -8px;
            background: red;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 14px;
            line-height: 20px;
            text-align: center;
            cursor: pointer;
            font-weight: bold;
        }
    </style>

</head>

    @include('components.backend.header')

    <!--start sidebar wrapper-->
    @include('components.backend.sidebar')
    <!--end sidebar wrapper-->

    <div class="page-body">
      <div class="container-fluid">
        <div class="page-title">
          <div class="row">
            <div class="col-6">
              <h4>Edit Accreditations Form</h4>
            </div>
            <div class="col-6">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ route('admin.manage-accreditations.index') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Edit Accreditations</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- Container-fluid starts-->
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                    <h4>Accreditations Form</h4>
                    <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                </div>
                <div class="card-body">
                    <div class="vertical-main-wizard">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                    <form class="row g-3 needs-validation custom-input"
                                        novalidate
                                        action="{{ route('admin.manage-accreditations.update', $accreditations->id) }}"
                                        method="POST"
                                        enctype="multipart/form-data">

                                        @csrf
                                        @method('PUT')

                                        <!-- Image -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label">Image</label>

                                            <input class="form-control"
                                                id="image"
                                                type="file"
                                                name="image"
                                                accept=".jpg,.jpeg,.png,.webp,.svg"
                                                onchange="previewImages(event)">

                                            <small class="text-secondary">
                                                <b>Note: Each file should be less than 2MB.</b><br>
                                                <b>Allowed: jpg, jpeg, png, webp, svg</b>
                                            </small>

                                            <!-- Existing Image -->
                                            @if($accreditations->image)
                                                <div class="mt-3">
                                                    <img src="{{ asset('uploads/accreditations/'.$accreditations->image) }}"
                                                        width="200"
                                                        style="border-radius:6px;">
                                                </div>
                                            @endif

                                            <!-- Preview Area -->
                                            <div id="imagePreviewContainer" class="d-flex flex-wrap mt-3"></div>
                                        </div>

                                        <!-- Description -->
                                        <div class="col-12">
                                            <label class="form-label">Description <span class="text-danger">*</span></label>
                                            <textarea name="description" class="form-control editor" rows="5">{{ old('description', $accreditations->description) }}</textarea>
                                        </div>

                                        <!-- Actions -->
                                        <div class="col-12 text-end mt-4">
                                            <a href="{{ route('admin.manage-accreditations.index') }}"
                                            class="btn btn-danger px-4">
                                                Cancel
                                            </a>

                                            <button class="btn btn-primary" type="submit">
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
                </div>
            </div>
        </div>
      </div>
    </div>
    <!-- footer start-->
    @include('components.backend.footer')

    @include('components.backend.main-js')

    <!-- CKEditor 5 (skip this line if it's already loaded in main-js) -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script>
        // init all rich-text editors on the page
        document.querySelectorAll('textarea.editor').forEach(function (el) {
            ClassicEditor.create(el, {
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                        { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                        { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                        { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                    ]
                }
            }).catch(function (err) { console.error(err); });
        });

        function previewImages(event) {
            const previewContainer = document.getElementById('imagePreviewContainer');
            previewContainer.innerHTML = '';

            const file = event.target.files[0];
            if (file) {
                if (file.size > 2 * 1024 * 1024) {
                    alert("File is too big! Maximum size allowed is 2MB.");
                    event.target.value = "";
                    return;
                }

                const reader = new FileReader();
                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = "150px";
                    img.style.maxHeight = "150px";
                    img.classList.add('me-2', 'mb-2');
                    previewContainer.appendChild(img);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>

</body>
</html>