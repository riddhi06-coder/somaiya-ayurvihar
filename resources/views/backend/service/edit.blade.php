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
                  <h4>Edit Service Details Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-service-details.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Service Details</li>
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
                        <h4>Service Details Form</h4>
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
                                        action="{{ route('admin.manage-service-details.update', $service_details->id) }}"
                                        method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')



                                        {{-- Master Category --}}
                                        <div class="col-md-6">
                                            <label class="form-label">
                                                Master Category <span class="txt-danger">*</span>
                                            </label>
                                            <select name="category_id"
                                                    id="category_id"
                                                    class="form-control"
                                                    required>
                                                <option value="">Select Master Category</option>
                                                @foreach($masterCategories as $cat)
                                                   <option value="{{ $cat->id }}"
                                                        {{ $service_details->category_id == $cat->id ? 'selected' : '' }}>
                                                        {{ $cat->category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- Subcategory --}}
                                        <div class="col-md-6">
                                            <label class="form-label">
                                                Sub Category <span class="txt-danger">*</span>
                                            </label>
                                            <select name="subcategory_id"
                                                    id="subcategory_id"
                                                    class="form-control"
                                                    required>
                                                <option value="">Select Sub Category</option>
                                                @foreach($subCategories as $subcat)
                                                    <option value="{{ $subcat->id }}"
                                                        data-category="{{ $subcat->category_id }}"
                                                        {{ $service_details->subcategory_id == $subcat->id ? 'selected' : '' }}>
                                                        {{ $subcat->subcategory_name }}
                                                    </option>

                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- Service (Hidden Initially) --}}
                                        <div class="col-md-6 d-none" id="service-wrapper">
                                            <label class="form-label">
                                                Service <span class="txt-danger">*</span>
                                            </label>
                                            <select name="service_id"
                                                id="service_id"
                                                class="form-control"
                                                {{ $service_details->service_id ? 'required' : '' }}>
                                                <option value="">Select Service</option>
                                                @foreach($service as $f)
                                                    <option value="{{ $f->id }}"
                                                        data-subcategory="{{ $f->subcategory_id }}"
                                                        {{ $service_details->service_id == $f->id ? 'selected' : '' }}>
                                                        {{ $f->service_name }}
                                                    </option>

                                                @endforeach
                                            </select>
                                        </div>


                                        <!-- Section Title -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="banner_heading">Banner Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="banner_heading" type="text" name="banner_heading" placeholder="Enter Banner Heading"  value="{{ old('banner_heading', $service_details->banner_heading) }}" required>
                                            <div class="invalid-feedback">Please enter a Banner Heading.</div>
                                        </div>

                                        
                                        <!-- Banner Image -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="image">
                                                Banner Image <span class="txt-danger">*</span>
                                                @if(empty($service_details->image))
                                                    <span class="txt-danger">*</span>
                                                @endif
                                            </label>

                                            <input
                                                class="form-control"
                                                id="image"
                                                type="file"
                                                name="image"
                                                onchange="previewThumbnail(event)"
                                                {{ empty($service_details->image) ? 'required' : '' }}
                                            >

                                            <div class="invalid-feedback">Please upload a Banner image.</div>

                                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small><br>
                                            <small class="text-secondary">
                                                <b>Note: Only .jpg, .jpeg, .png, .webp, .svg files allowed.</b>
                                            </small>

                                            <!-- Image Preview -->
                                            <div class="mt-2">
                                                @if(!empty($service_details->banner_image))
                                                    <!-- EXISTING IMAGE -->
                                                    <img
                                                        id="thumbnailPreview"
                                                        src="{{ asset('uploads/service-details/'.$service_details->banner_image) }}"
                                                        alt="Banner Image"
                                                        class="img-fluid rounded border"
                                                        style="max-height: 150px; background:black;"
                                                    >
                                                @else
                                                    <!-- NEW IMAGE PREVIEW -->
                                                    <img
                                                        id="thumbnailPreview"
                                                        src="#"
                                                        alt="Preview"
                                                        class="img-fluid rounded border d-none"
                                                        style="max-height: 150px; background:black;"
                                                    >
                                                @endif
                                            </div>
                                        </div>



                                        <hr class="mt-5">

                                        <h4># Details</h4>


                                        <!-- Section Image -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="section_image">
                                                Section Image <span class="txt-danger">*</span>
                                                @if(empty($service_details->section_image))
                                                    <span class="txt-danger">*</span>
                                                @endif
                                            </label>

                                            <input
                                                class="form-control"
                                                id="section_image"
                                                type="file"
                                                name="section_image"
                                                onchange="previewSectionImage(event)"
                                                {{ empty($service_details->section_image) ? 'required' : '' }}
                                            >

                                            <div class="invalid-feedback">Please upload a Section image.</div>

                                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small><br>
                                            <small class="text-secondary">
                                                <b>Note: Only .jpg, .jpeg, .png, .webp, .svg format allowed.</b>
                                            </small>

                                            <!-- Image Preview -->
                                            <div class="mt-2">
                                                @if(!empty($service_details->section_image))
                                                    <!-- EXISTING IMAGE -->
                                                    <img
                                                        id="imagePreview"
                                                        src="{{ asset('uploads/service-details/'.$service_details->section_image) }}"
                                                        alt="Section Image"
                                                        class="img-fluid rounded border"
                                                        style="max-height: 150px; background:black;"
                                                    >
                                                @else
                                                    <!-- NEW IMAGE PREVIEW -->
                                                    <img
                                                        id="imagePreview"
                                                        src="#"
                                                        alt="Preview"
                                                        class="img-fluid rounded border d-none"
                                                        style="max-height: 150px; background:black;"
                                                    >
                                                @endif
                                            </div>
                                        </div>




                                         <!-- Short Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="about">Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="editor" name="desc" placeholder="Enter Description" required>{{ old('desc', $service_details->description) }}</textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>


                                        <hr class="mt-5">

                                        <h4># Services & Facilities</h4>

                                        
                                        <!-- Service Heading -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="service_heading">Service Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="service_heading" type="text" name="service_heading" placeholder="Enter Service Heading" value="{{ old('service_heading', $service_details->service_heading) }}" required>
                                            <div class="invalid-feedback">Please enter a Service Heading.</div>
                                        </div>


                                        <!-- Service Image -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="service_image">
                                                Service Image <span class="txt-danger">*</span>
                                                @if(empty($service_details->service_image))
                                                    <span class="txt-danger">*</span>
                                                @endif
                                            </label>

                                            <input
                                                class="form-control"
                                                id="service_image"
                                                type="file"
                                                name="service_image"
                                                onchange="previewServiceImage(event)"
                                                {{ empty($service_details->service_image) ? 'required' : '' }}
                                            >

                                            <div class="invalid-feedback">Please upload a Service image.</div>

                                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small><br>
                                            <small class="text-secondary">
                                                <b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b>
                                            </small>

                                            <!-- Image Preview -->
                                            <div class="mt-2">
                                                @if(!empty($service_details->service_image))
                                                    <!-- EXISTING IMAGE -->
                                                    <img
                                                        id="serviceimagePreview"
                                                        src="{{ asset('uploads/service-details/'.$service_details->service_image) }}"
                                                        alt="Service Image"
                                                        class="img-fluid rounded border"
                                                        style="max-height: 150px; background:black;"
                                                    >
                                                @else
                                                    <!-- NEW IMAGE PREVIEW -->
                                                    <img
                                                        id="serviceimagePreview"
                                                        src="#"
                                                        alt="Preview"
                                                        class="img-fluid rounded border d-none"
                                                        style="max-height: 150px; background:black;"
                                                    >
                                                @endif
                                            </div>
                                        </div>



                                         <!-- Service Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="service_desc">Service Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="service_desc" name="service_desc" placeholder="Enter Service Description" required>{{ old('service_desc', $service_details->service_desc) }}</textarea>
                                            <div class="invalid-feedback">Please enter an Service Description.</div>
                                        </div>

                                        <!-- Features Table -->
                                        <div class="col-12">
                                            <table class="table table-bordered mt-5" id="featuresTable">
                                                <thead>
                                                    <tr>
                                                        <th>Feature <span class="txt-danger">*</span></th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($service_details->features ?? [] as $index => $feature)
                                                    <tr class="feature-row">
                                                        <td>
                                                            <input type="text"
                                                                name="features[{{ $index }}][name]"
                                                                class="form-control"
                                                                value="{{ $feature['name'] }}">
                                                        </td>
                                                        <td>
                                                            <button type="button"
                                                                    class="btn {{ $index == 0 ? 'btn-success add-feature' : 'btn-danger remove-feature' }}">
                                                                {{ $index == 0 ? 'Add More' : 'Remove' }}
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                    <tr class="feature-row">
                                                        <td>
                                                            <input type="text" name="features[0][name]" class="form-control">
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-success add-feature">Add More</button>
                                                        </td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>


                                        <hr class="mt-5">

                                        <h4># What's Special</h4>



                                        <!-- Special Heading -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="special_heading">Special Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="special_heading" type="text" name="special_heading" placeholder="Enter Special Heading" value="{{ old('special_heading', $service_details->special_heading) }}" required>
                                            <div class="invalid-feedback">Please enter a Special Heading.</div>
                                        </div>


                                        <!-- Special Image -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="special_image">
                                                Special Image
                                                @if(empty($service_details->special_image))
                                                    <span class="txt-danger">*</span>
                                                @endif
                                            </label>

                                            <input
                                                class="form-control"
                                                id="special_image"
                                                type="file"
                                                name="special_image"
                                                onchange="previewSpecialImage(event)"
                                                {{ empty($service_details->special_image) ? 'required' : '' }}
                                            >

                                            <div class="invalid-feedback">Please upload a Special image.</div>

                                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small><br>
                                            <small class="text-secondary">
                                                <b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b>
                                            </small>

                                            <!-- Image Preview -->
                                            <div class="mt-2">
                                                @if(!empty($service_details->special_image))
                                                    <!-- EXISTING IMAGE -->
                                                    <img
                                                        id="specialimagePreview"
                                                        src="{{ asset('uploads/service-details/'.$service_details->special_image) }}"
                                                        alt="Special Image"
                                                        class="img-fluid rounded border"
                                                        style="max-height: 150px; background:black;"
                                                    >
                                                @else
                                                    <!-- NEW IMAGE PREVIEW -->
                                                    <img
                                                        id="specialimagePreview"
                                                        src="#"
                                                        alt="Preview"
                                                        class="img-fluid rounded border d-none"
                                                        style="max-height: 150px; background:black;"
                                                    >
                                                @endif
                                            </div>
                                        </div>


                                        <!-- Special Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="special_desc">Special Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="editor1" name="special_desc" placeholder="Enter Special Description" required>{{ old('special_desc', $service_details->special_desc) }}</textarea>
                                            <div class="invalid-feedback">Please enter an Special Description.</div>
                                        </div>



                                        <hr class="mt-5">

                                        <h4># FAQ's</h4>



                                         <!-- FAQ Heading -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="faq_heading">FAQ Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="faq_heading" type="text" name="faq_heading" placeholder="Enter FAQ Heading" value="{{ old('faq_heading', $service_details->faq_heading) }}" required>
                                            <div class="invalid-feedback">Please enter a FAQ Heading.</div>
                                        </div>


                                        <!-- FAQ Image -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="faq_image">
                                                FAQ Image
                                                @if(empty($service_details->faq_image))
                                                    <span class="txt-danger">*</span>
                                                @endif
                                            </label>

                                            <input
                                                class="form-control"
                                                id="faq_image"
                                                type="file"
                                                name="faq_image"
                                                onchange="previewFaqImage(event)"
                                                {{ empty($service_details->faq_image) ? 'required' : '' }}
                                            >

                                            <div class="invalid-feedback">Please upload a FAQ image.</div>

                                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small><br>
                                            <small class="text-secondary">
                                                <b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b>
                                            </small>

                                            <!-- Image Preview -->
                                            <div class="mt-2">
                                                @if(!empty($service_details->faq_image))
                                                    <!-- EXISTING IMAGE -->
                                                    <img
                                                        id="faqimagePreview"
                                                        src="{{ asset('uploads/service-details/'.$service_details->faq_image) }}"
                                                        alt="FAQ Image"
                                                        class="img-fluid rounded border"
                                                        style="max-height: 150px; background:black;"
                                                    >
                                                @else
                                                    <!-- NEW IMAGE PREVIEW -->
                                                    <img
                                                        id="faqimagePreview"
                                                        src="#"
                                                        alt="Preview"
                                                        class="img-fluid rounded border d-none"
                                                        style="max-height: 150px; background:black;"
                                                    >
                                                @endif
                                            </div>
                                        </div>


                                        <!-- FAQ Table -->
                                        <div class="col-12 mt-5">
                                            <table class="table table-bordered mt-5" id="faqTable">
                                                <thead>
                                                    <tr>
                                                        <th>Question <span class="txt-danger">*</span></th>
                                                        <th>Answer <span class="txt-danger">*</span></th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($service_details->faq ?? [] as $index => $faq)
                                                    <tr class="faq-row">
                                                        <td>
                                                            <input type="text"
                                                                name="faq[{{ $index }}][question]"
                                                                class="form-control"
                                                                value="{{ $faq['question'] }}">
                                                        </td>
                                                        <td>
                                                            <textarea name="faq[{{ $index }}][answer]"
                                                                    class="form-control"
                                                                    rows="3">{{ $faq['answer'] }}</textarea>
                                                        </td>
                                                        <td>
                                                            <button type="button"
                                                                    class="btn {{ $index == 0 ? 'btn-success add-faq' : 'btn-danger remove-faq' }}">
                                                                {{ $index == 0 ? 'Add More' : 'Remove' }}
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                    <tr class="faq-row">
                                                        <td><input type="text" name="faq[0][question]" class="form-control"></td>
                                                        <td><textarea name="faq[0][answer]" class="form-control"></textarea></td>
                                                        <td><button class="btn btn-success add-faq">Add More</button></td>
                                                    </tr>
                                                    @endforelse
                                                    </tbody>

                                            </table>
                                        </div>

                                        <!-- Form Actions -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('admin.manage-service-details.index') }}" class="btn btn-danger px-4">Cancel</a>
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



        {{-- Script to fetch subcategories based on master category --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const categorySelect = document.getElementById('category_id');
                const subcategorySelect = document.getElementById('subcategory_id');
                const serviceSelect = document.getElementById('service_id');
                const serviceWrapper = document.getElementById('service-wrapper');

                const SPECIALITY_NAME = 'specialities'; // lowercase

                // Show/hide service wrapper based on category + subcategory
                function updateServiceVisibility() {
                    const selectedCategoryText =
                        categorySelect.options[categorySelect.selectedIndex]?.text.toLowerCase().trim();

                    const subcategorySelected = subcategorySelect.value;

                    // Only show service if category is not "specialities"
                    if (selectedCategoryText !== SPECIALITY_NAME) {
                        serviceWrapper.classList.remove('d-none');
                        serviceSelect.setAttribute('required', 'required');
                    } else {
                        serviceWrapper.classList.add('d-none');
                        serviceSelect.value = '';
                        serviceSelect.removeAttribute('required');
                    }

                    filterServices();
                }

                // Filter services based on subcategory
                function filterServices() {
                    const selectedSubcategory = subcategorySelect.value;

                    Array.from(serviceSelect.options).forEach(option => {
                        if (!option.value) return; // skip placeholder
                        if (option.dataset.subcategory === selectedSubcategory) {
                            option.style.display = 'block';
                        } else {
                            option.style.display = 'none';
                            option.selected = false;
                        }
                    });

                    // If no subcategory is selected, hide all options (optional)
                    if (!selectedSubcategory) {
                        Array.from(serviceSelect.options).forEach(option => {
                            if (!option.value) return;
                            option.style.display = 'none';
                        });
                        serviceSelect.value = '';
                    }
                }

                // Filter subcategories based on category
                function filterSubcategories() {
                    const selectedCategory = categorySelect.value;
                    Array.from(subcategorySelect.options).forEach(option => {
                        if (!option.value) return;
                        if (option.dataset.category === selectedCategory) {
                            option.style.display = 'block';
                        } else {
                            option.style.display = 'none';
                            option.selected = false;
                        }
                    });
                }

                // Event listeners
                categorySelect.addEventListener('change', function () {
                    filterSubcategories();
                    updateServiceVisibility();
                });

                subcategorySelect.addEventListener('change', filterServices);

                // Initial load (for edit mode)
                filterSubcategories();
                updateServiceVisibility();
            });
        </script>


        <script>
            function previewThumbnail(event) {
                const input = event.target;
                const preview = document.getElementById('thumbnailPreview');

                if (input.files && input.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.classList.remove('d-none'); // show preview
                    }

                    reader.readAsDataURL(input.files[0]);
                } else {
                    preview.src = "#";
                    preview.classList.add('d-none'); // hide if no file
                }
            }

            function previewimage(event) {
                const input = event.target;
                const preview = document.getElementById('imagePreview');

                if (input.files && input.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.classList.remove('d-none'); // show preview
                    }

                    reader.readAsDataURL(input.files[0]);
                } else {
                    preview.src = "#";
                    preview.classList.add('d-none'); // hide if no file
                }
            }

            function previewserviceimage(event) {
                const input = event.target;
                const preview = document.getElementById('serviceimagePreview');

                if (input.files && input.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.classList.remove('d-none'); // show preview
                    }

                    reader.readAsDataURL(input.files[0]);
                } else {
                    preview.src = "#";
                    preview.classList.add('d-none'); // hide if no file
                }
            }

            function previewfaqimage(event) {
                const input = event.target;
                const preview = document.getElementById('faqimagePreview');

                if (input.files && input.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.classList.remove('d-none'); // show preview
                    }

                    reader.readAsDataURL(input.files[0]);
                } else {
                    preview.src = "#";
                    preview.classList.add('d-none'); // hide if no file
                }
            }

            function previewspecialimage(event) {
                const input = event.target;
                const preview = document.getElementById('specialimagePreview');

                if (input.files && input.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.classList.remove('d-none'); // show preview
                    }

                    reader.readAsDataURL(input.files[0]);
                } else {
                    preview.src = "#";
                    preview.classList.add('d-none'); // hide if no file
                }
            }
        </script>


        <!-- JS for dynamic features and preview -->
        <script>
            let featureIndex = 1;

            $(document).ready(function() {
                // Add new feature row
                $('#featuresTable').on('click', '.add-feature', function() {
                    const newRow = `<tr class="feature-row">
                        <td>
                            <input type="text" name="features[${featureIndex}][name]" class="form-control" placeholder="Enter Features">
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger remove-feature">Remove</button>
                        </td>
                    </tr>`;
                    $('#featuresTable tbody').append(newRow);
                    featureIndex++;
                });

                // Remove feature row
                $('#featuresTable').on('click', '.remove-feature', function() {
                    $(this).closest('tr').remove();
                });
            });
        </script>

        
        <!-- JS for dynamic faq table -->
        <script>
            let faqIndex = 1;

            $(document).ready(function() {
                // Add new faq row
                $('#faqTable').on('click', '.add-faq', function() {
                    const newRow = `<tr class="faq-row">
                        <td>
                            <input type="text" name="faq[${faqIndex}][question]" class="form-control" placeholder="Enter Question">
                        </td>
                        <td>
                            <textarea name="faq[${faqIndex}][answer]"
                            class="form-control"
                            placeholder="Enter Answer"
                            rows="3"></textarea>

                        </td>
                        <td>
                            <button type="button" class="btn btn-danger remove-faq">Remove</button>
                        </td>
                    </tr>`;
                    $('#faqTable tbody').append(newRow);
                    faqIndex++;
                });

                // Remove faq row
                $('#faqTable').on('click', '.remove-faq', function() {
                    $(this).closest('tr').remove();
                });
            });
        </script>


        <!-- JS for editor -->
        <script>
            ClassicEditor.create(document.querySelector('#editor1'), {
                toolbar: [
                    'heading', 
                    '|',
                    'bold', 'italic', 'underline', 'strikethrough', 'subscript', 'superscript',
                    'link', 'blockQuote', 'codeBlock',
                    'bulletedList', 'numberedList', 'todoList',
                    '|',
                    'alignment', 'outdent', 'indent',
                    '|',
                    'fontColor', 'fontBackgroundColor', 'fontSize', 'fontFamily',
                    '|',
                    'insertTable', 'imageUpload', 'mediaEmbed', 'horizontalLine', 'pageBreak',
                    '|',
                    'undo', 'redo', 'removeFormat', 'highlight', 'specialCharacters'
                ],
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
                },
                fontFamily: {
                    options: [
                        'default', 'Arial, Helvetica, sans-serif', 'Courier New, Courier, monospace',
                        'Georgia, serif', 'Lucida Sans Unicode, Lucida Grande, sans-serif',
                        'Tahoma, Geneva, sans-serif', 'Times New Roman, Times, serif',
                        'Trebuchet MS, Helvetica, sans-serif', 'Verdana, Geneva, sans-serif'
                    ]
                },
                fontSize: {
                    options: [ 'tiny', 'small', 'default', 'big', 'huge' ]
                },
                alignment: {
                    options: [ 'left', 'center', 'right', 'justify' ]
                }
            })
            .catch(error => { console.error(error); });
        </script>

</body>

</html>