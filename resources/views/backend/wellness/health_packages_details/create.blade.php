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
                  <h4>Add Health Packages Details Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-packages-details.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Add Health Packages Details</li>
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
                        <h4>Health Packages Details Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                    <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('admin.manage-packages-details.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <!-- Health Package -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label">
                                                Health Package <span class="text-danger">*</span>
                                            </label>

                                            <select class="form-select" name="package_id" id="package_id" required>
                                                <option value="">Select Health Package</option>

                                                @foreach($categories as $package)
                                                    <option value="{{ $package->id }}"
                                                        data-subcategory="{{ $package->subcategory->subcategory_name ?? '' }}"
                                                        data-subcategory-id="{{ $package->sub_category_id }}">
                                                        {{ $package->package_name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>


                                        <!-- Category -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label">
                                                Category 
                                            </label>

                                            <select class="form-select" id="subcategory_select" disabled>
                                                <option value="">Select Category</option>
                                            </select>

                                            <input type="hidden" name="sub_category_id" id="hidden_subcategory_id">
                                        </div>


                                        <!-- Location -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="location">Location <span class="text-danger">*</span> </label>
                                            <input class="form-control" id="location" type="text" name="location" placeholder="Enter Location" required>
                                            <div class="invalid-feedback">Please enter a Location.</div>
                                        </div>

                                        <!-- Location URL -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="location_url">Location URL <span class="text-danger">*</span></label>
                                            <input class="form-control" id="location_url" type="url" name="location_url" placeholder="Enter Location URL" required>
                                            <div class="invalid-feedback">Please enter a Location URL.</div>
                                        </div>


                                        <!-- Description  -->
                                        <div class="col-md-12 mt-4">
                                            <label class="form-label">Description <span class="text-danger">*</span></label>
                                            <textarea class="form-control"
                                                    name="description"
                                                    id="editor"
                                                    rows="4"
                                                    required
                                                    placeholder="Enter Description">{{ old('description') }}</textarea>
                                        </div>



                                        <!-- Form Actions -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('admin.manage-packages-details.index') }}" class="btn btn-danger px-4">Cancel</a>
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
            document.getElementById('package_id').addEventListener('change', function() {

                let selectedOption = this.options[this.selectedIndex];
                let subcategoryName = selectedOption.getAttribute('data-subcategory');
                let subcategoryId = selectedOption.getAttribute('data-subcategory-id');

                let subcategorySelect = document.getElementById('subcategory_select');
                let hiddenInput = document.getElementById('hidden_subcategory_id');

                subcategorySelect.innerHTML = '';

                if(subcategoryName) {
                    let option = document.createElement('option');
                    option.text = subcategoryName;
                    option.value = subcategoryId;
                    option.selected = true;

                    subcategorySelect.appendChild(option);
                    hiddenInput.value = subcategoryId;
                } else {
                    subcategorySelect.innerHTML = '<option value="">Select Category</option>';
                    hiddenInput.value = '';
                }

            });
        </script>

</body>

</html>