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
            height: 60px;        /* small + compact */
            width: 60px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #ddd;
        }

        /* RED cross on top-right of image */

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
                            <!-- Removed empty col div -->
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
        </div>
        </div>
       
        @include('components.backend.main-js')

        <script>
            function previewImages(event) {
                const previewContainer = document.getElementById('imagePreviewContainer');
                previewContainer.innerHTML = ''; // Clear previous preview

                const file = event.target.files[0];
                if (file) {
                    // Check file size (2MB max)
                    if(file.size > 2 * 1024 * 1024){
                        alert("File is too big! Maximum size allowed is 2MB.");
                        event.target.value = ""; // Clear the input
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.maxWidth = "150px";  // adjust size as needed
                        img.style.maxHeight = "150px";
                        img.classList.add('me-2', 'mb-2'); // Bootstrap spacing
                        previewContainer.appendChild(img);
                    }
                    reader.readAsDataURL(file);
                }
            }
        </script>



</body>

</html>