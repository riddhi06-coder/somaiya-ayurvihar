<!doctype html>
<html lang="en">
    
<head>
    @include('components.backend.head')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
                  <h4>Edit Health Packages Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-health-packages.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Health Packages</li>
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
                        <h4>Health Packages Form</h4>
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
                                        action="{{ route('admin.manage-health-packages.update', $health_packages->id) }}"
                                        method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <!-- Package Name -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="package_name">
                                                Package Name <span class="text-danger">*</span>
                                            </label>
                                            <input class="form-control"
                                                id="package_name"
                                                type="text"
                                                name="package_name"
                                                value="{{ old('package_name', $health_packages->package_name) }}"
                                                placeholder="Enter Package Name"
                                                required>
                                            <div class="invalid-feedback">Please enter a Package Name.</div>
                                        </div>

                                        <!-- Actual Price -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="actual_price">Actual Price</label>
                                            <input class="form-control"
                                                id="actual_price"
                                                type="number"
                                                name="actual_price"
                                                value="{{ old('actual_price', $health_packages->actual_price) }}"
                                                placeholder="Enter Actual Price"
                                                required>
                                            <div class="invalid-feedback">Please enter Actual Price.</div>
                                        </div>

                                        <!-- Discounted Price -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="discounted_price">Discounted Price</label>
                                            <input class="form-control"
                                                id="discounted_price"
                                                type="number"
                                                name="discounted_price"
                                                value="{{ old('discounted_price', $health_packages->discounted_price) }}"
                                                placeholder="Enter Discounted Price"
                                                required>
                                            <div class="invalid-feedback">Please enter Discounted Price.</div>
                                        </div>

                                        <!-- Age Range -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="age_range">
                                                Age Range <span class="text-danger">*</span>
                                            </label>
                                            <input class="form-control"
                                                id="age_range"
                                                type="text"
                                                name="age_range"
                                                value="{{ old('age_range', $health_packages->age_range) }}"
                                                placeholder="Enter Age Range"
                                                required>
                                            <div class="invalid-feedback">Please enter Age Range.</div>
                                        </div>

                                        <!-- Gender (Multi Select) -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="gender">
                                                Gender <span class="text-danger">*</span>
                                            </label>

                                            @php
                                                // If stored as JSON
                                                $selectedGenders = is_array($health_packages->gender)
                                                    ? $health_packages->gender
                                                    : json_decode($health_packages->gender, true);
                                            @endphp

                                            <select class="form-select select2"
                                                    id="gender"
                                                    name="gender[]"
                                                    multiple
                                                    required>

                                                <option value="Male"
                                                    {{ in_array('Male', old('gender', $selectedGenders ?? [])) ? 'selected' : '' }}>
                                                    Male
                                                </option>

                                                <option value="Female"
                                                    {{ in_array('Female', old('gender', $selectedGenders ?? [])) ? 'selected' : '' }}>
                                                    Female
                                                </option>

                                                <option value="Other"
                                                    {{ in_array('Other', old('gender', $selectedGenders ?? [])) ? 'selected' : '' }}>
                                                    Other
                                                </option>

                                            </select>

                                            @error('gender')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Form Actions -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('admin.manage-health-packages.index') }}"
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

       <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


       <script>
            $(document).ready(function() {
                $('.select2').select2({
                    placeholder: "Select Gender",
                    allowClear: true,
                    width: '100%'
                });
            });
        </script>

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