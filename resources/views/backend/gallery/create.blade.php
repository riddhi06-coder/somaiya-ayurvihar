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
                  <h4>Add Gallery Listing Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-gallery.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Add Gallery Listing</li>
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
                        <h4>Gallery Listing Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                    <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('admin.manage-gallery.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf


                                         <!-- Event Name -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="event_name">Event Name <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="event_name" type="text" name="event_name" placeholder="Enter Event Name" required>
                                            <div class="invalid-feedback">Please enter a Event Name.</div>
                                        </div>


                                        <!-- Image -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label">Thumbnail Image <span class="txt-danger">*</span></label>

                                            <input class="form-control"
                                                id="image"
                                                type="file"
                                                name="image"
                                                
                                                accept=".jpg,.jpeg,.png,.webp,.svg"
                                                onchange="previewImages(event)"
                                                required >

                                            <div class="invalid-feedback">Please upload images.</div>

                                            <small class="text-secondary"><b>Note: Each file should be less than 2MB.</b></small><br>
                                            <small class="text-secondary"><b>Allowed: jpg, jpeg, png, webp</b></small>

                                            <!-- Preview Area -->
                                            <div id="imagePreviewContainer" class="d-flex flex-wrap mt-3"></div>
                                        </div>



                                       <!-- Date -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="note"> Date </label>
                                            <input type="date" class="form-control" id="date" name="date">
                                            <div class="invalid-feedback">Please select a date.</div>
                                        </div>


                                        <!-- Form Actions -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('admin.manage-gallery.index') }}" class="btn btn-danger px-4">Cancel</a>
                                            <button class="btn btn-primary" type="submit">Submit</button>
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
                previewContainer.innerHTML = ''; // clear old previews

                const files = event.target.files;

                if (files.length === 0) return;

                Array.from(files).forEach(file => {

                    // Validate file size (2MB)
                    if (file.size > 2 * 1024 * 1024) {
                        alert(file.name + " is larger than 2MB");
                        return;
                    }

                    // Validate type
                    if (!file.type.startsWith('image/')) {
                        alert(file.name + " is not an image");
                        return;
                    }

                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;

                        img.style.width = '120px';
                        img.style.height = '120px';
                        img.style.objectFit = 'cover';
                        img.style.margin = '5px';
                        img.style.border = '1px solid #ddd';
                        img.style.borderRadius = '5px';

                        previewContainer.appendChild(img);
                    }

                    reader.readAsDataURL(file);
                });
            }
        </script>

</body>

</html>