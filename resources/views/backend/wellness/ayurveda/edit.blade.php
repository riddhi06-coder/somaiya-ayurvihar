<!doctype html>
<html lang="en">
    
<head>
    @include('components.backend.head')
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
                  <h4>Edit Ayurveda Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-ayurveda.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Ayurveda</li>
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
                        <h4>Ayurveda Form</h4>
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
                                        action="{{ route('admin.manage-ayurveda.update', $ayurveda->id) }}"
                                        method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <!-- Heading -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label">Heading <span class="text-danger">*</span></label>
                                            <input class="form-control"
                                                type="text"
                                                name="heading"
                                                value="{{ old('heading', $ayurveda->heading) }}"
                                                required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>

                                        <!-- Image -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label">Image</label>

                                            <input class="form-control"
                                                type="file"
                                                name="image"
                                                accept=".jpg,.jpeg,.png,.webp,.svg"
                                                onchange="previewImages(event)">

                                            <small class="text-secondary"><b>Note: Each file should be less than 2MB.</b></small><br>
                                            <small class="text-secondary"><b>Allowed: jpg, jpeg, png, webp, svg</b></small>

                                            <!-- Existing Image -->
                                            @if($ayurveda->image)
                                                <div class="mt-3">
                                                    <p class="mb-1"><strong>Current Image:</strong></p>
                                                    <img src="{{ asset('/uploads/ayurveda/'.$ayurveda->image) }}"
                                                        width="120"
                                                        style="object-fit:cover;">
                                                </div>
                                            @endif

                                            <!-- Preview Area -->
                                            <div id="imagePreviewContainer" class="d-flex flex-wrap mt-3"></div>
                                        </div>

                                        <!-- Description -->
                                        <div class="col-12 mt-4">
                                            <label>Description <span class="text-danger">*</span></label>
                                            <textarea name="description"
                                                    id="editor"
                                                    class="form-control"
                                                    rows="5"
                                                    required>{{ old('description', $ayurveda->description) }}</textarea>
                                        </div>

                                        <!-- Form Actions -->
                                        <div class="col-12 text-end mt-4">
                                            <a href="{{ route('admin.manage-ayurveda.index') }}"
                                            class="btn btn-danger px-4">Cancel</a>
                                            <button class="btn btn-primary" type="submit">Update</button>
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


        <!-- Image Preview-->
        <script>
            function previewImages(event) {

                const container = document.getElementById('imagePreviewContainer');
                container.innerHTML = '';

                const file = event.target.files[0];

                if (file) {

                    const reader = new FileReader();

                    reader.onload = function(e) {

                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.width = '120px';
                        img.style.height = '120px';
                        img.style.objectFit = 'cover';
                        img.classList.add('me-2', 'mb-2', 'border');

                        container.appendChild(img);
                    };

                    reader.readAsDataURL(file);
                }
            }
        </script>
        

</body>

</html>