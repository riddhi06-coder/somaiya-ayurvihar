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
                  <h4>Add Health Packages Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-health-packages.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Add Health Packages</li>
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
                                    <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('admin.manage-health-packages.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <!-- Category -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="category_id">
                                                Category <span class="text-danger">*</span>
                                            </label>

                                            <select class="form-select" name="category_id" required>
                                                <option value="">Select Category</option>

                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->subcategory_name }}
                                                    </option>
                                                @endforeach

                                            </select>

                                            <div class="invalid-feedback">Please select a category.</div>
                                        </div>


                                        <!-- Package Name -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="package_name">Package Name <span class="text-danger">*</span> </label>
                                            <input class="form-control" id="package_name" type="text" name="package_name" placeholder="Enter Package Name" required>
                                            <div class="invalid-feedback">Please enter a Package Name.</div>
                                        </div>

                                        <!-- Actual Price -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="actual_price">Actual Price </label>
                                            <input class="form-control" id="actual_price" type="number" name="actual_price" placeholder="Enter Actual Price" required>
                                            <div class="invalid-feedback">Please enter a Actual Price.</div>
                                        </div>


                                        <!-- Discounted Price -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="discounted_price">Discounted Price </label>
                                            <input class="form-control" id="discounted_price" type="number" name="discounted_price" placeholder="Enter Discounted Price" required>
                                            <div class="invalid-feedback">Please enter a Discounted Price.</div>
                                        </div>


                                        <!-- Age Range -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="age_range">Age Range <span class="text-danger">*</span> </label>
                                            <input class="form-control" id="age_range" type="text" name="age_range" placeholder="Enter Age Range" required>
                                            <div class="invalid-feedback">Please enter a Age Range.</div>
                                        </div>


                                        <!-- Gender -->
                                        <!-- Gender (Select2 Multi Select) -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="gender">
                                                Gender <span class="text-danger">*</span>
                                            </label>

                                            <select class="form-select select2" id="gender" name="gender[]" multiple required>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>

                                            @error('gender')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <!-- Form Actions -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('admin.manage-health-packages.index') }}" class="btn btn-danger px-4">Cancel</a>
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