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

                                        
                                        <!-- Banner Title -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="banner_title">Banner Title <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="banner_title" type="text" name="banner_title" placeholder="Enter Banner Heading" value="{{ old('banner_title', $service_details->banner_title) }}" required>
                                            <div class="invalid-feedback">Please enter a Banner Heading.</div>
                                        </div>

                                        <hr class="mt-5">

                                        <h4># Page Headers</h4>


                                        <!-- Page Headers Table -->
                                        <div class="col-12">
                                            <table class="table table-bordered mt-5" id="pageHeadersTable">
                                                <thead>
                                                    <tr>
                                                        <th>Page Header <span class="txt-danger">*</span></th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($service_details->page_headers ?? [] as $index => $header)
                                                        <tr class="header-row">
                                                            <td>
                                                                <input type="text"
                                                                    name="page_headers[{{ $index }}][title]"
                                                                    class="form-control"
                                                                    value="{{ $header['title'] }}">
                                                            </td>
                                                            <td>
                                                                <button type="button"
                                                                        class="btn {{ $index == 0 ? 'btn-success add-header' : 'btn-danger remove-header' }}">
                                                                    {{ $index == 0 ? 'Add More' : 'Remove' }}
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr class="header-row">
                                                            <td>
                                                                <input type="text" name="page_headers[0][title]" class="form-control" placeholder="Enter Page Header">
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-success add-header">Add More</button>
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
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
                                                multiple
                                                name="section_image[]"
                                                onchange="previewSectionImage(event)"
                                                {{ empty($service_details->section_image) ? 'required' : '' }}
                                            >

                                            <div class="invalid-feedback">Please upload a Section image.</div>

                                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small><br>
                                            <small class="text-secondary">
                                                <b>Note: Only .jpg, .jpeg, .png, .webp, .svg format allowed.</b>
                                            </small>

                                            <input type="hidden" name="removed_section_images" id="removed_section_images">

                                            <!-- Image Preview -->
                                            <div class="mt-2" id="imagePreview">

                                                @if(!empty($service_details->section_image))
                                                    @foreach($service_details->section_image as $key => $img)

                                                    <div style="position:relative;display:inline-block;margin-right:10px">

                                                        <img src="{{ asset('uploads/service-details/'.$img) }}"
                                                            class="img-fluid rounded border"
                                                            style="max-height:150px;background:black;">

                                                        <span onclick="removeExistingImage('{{ $img }}', this)"
                                                            style="
                                                                position:absolute;
                                                                top:2px;
                                                                right:6px;
                                                                cursor:pointer;
                                                                background:red;
                                                                color:white;
                                                                border-radius:50%;
                                                                padding:0 6px;
                                                                font-size:18px;
                                                                line-height:18px;
                                                            ">
                                                            &times;
                                                        </span>

                                                    </div>

                                                    @endforeach
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

                                        <h4># Doctor Section</h4>

                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="doctor_heading">Doctor Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="doctor_heading" type="text" name="doctor_heading" placeholder="Enter Doctor Heading"  value="{{ old('doctor_heading', $service_details->doctor_heading) }}" required>
                                            <div class="invalid-feedback">Please enter a Doctor Heading.</div>
                                        </div>


                                        <!-- Short Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="about">Short Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="doctor_desc" name="doctor_desc" placeholder="Enter Short Description" required>{{ old('doctor_desc', $service_details->doctor_desc) }}</textarea>
                                            <div class="invalid-feedback">Please enter an Short Description.</div>
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
                                                                name="features[{{ $index }}][title]"
                                                                class="form-control"
                                                                value="{{ $feature['title'] ?? '' }}">
                                                        </td>

                                                        <td>
                                                            <textarea name="features[{{ $index }}][description]"
                                                                class="form-control editor"
                                                                placeholder="Enter Description">{{ $feature['description'] ?? '' }}</textarea>
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
                                                            <input type="text" name="features[0][title]" class="form-control">
                                                        </td>
                                                        <td>
                                                            <textarea name="features[0][description]" class="form-control editor"></textarea>
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

                                        <h4># Why Choose</h4>



                                        <!-- Special Heading -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="special_heading"> Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="special_heading" type="text" name="special_heading" placeholder="Enter Heading" value="{{ old('special_heading', $service_details->special_heading) }}" required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>


                                        <!-- Special Image -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="special_image">
                                                 Image
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

                                            <div class="invalid-feedback">Please upload a image.</div>

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
                                            <label class="form-label" for="special_desc"> Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="editor1" name="special_desc" placeholder="Enter Description" required>{{ old('special_desc', $service_details->special_desc) }}</textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
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
                                                                    class="form-control faq-editor"
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
                                        

                                        <hr class="mt-5">

                                        <h4># Booking Information</h4>


                             
                                        <!-- Booking Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="book_desc"> Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="book_desc" name="book_desc" placeholder="Enter Description" required>{{ old('book_desc', $service_details->book_desc) }}</textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>

                                        <!-- Booking Heading -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="book_heading">Booking Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="book_heading" type="text" name="book_heading" placeholder="Enter Booking Heading" value="{{ old('book_heading', $service_details->book_heading) }}" required>
                                            <div class="invalid-feedback">Please enter a Booking Heading.</div>
                                        </div>


                                        <!-- Booking Image -->
                                        <!-- <div class="col-md-6 mt-5">
                                            <label class="form-label" for="book_image"> Booking Image </label>
                                            <input class="form-control" id="book_image" type="file" name="book_image" onchange="previewbookimage(event)">
                                            <div class="invalid-feedback">Please upload a Booking image.</div>
                                                <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                                <br>
                                                <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                            
                                      
                                            <div class="mt-2">
                                                <img id="bookimagePreview" src="#" alt="Preview" class="img-fluid rounded border d-none" style="max-height: 150px; background:black;">
                                            </div>
                                        </div> -->


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



        {{-- Script to fetch multiples files forthe section --}}
        <script>
            let selectedFiles = [];
            let fileInput = null;

            function previewSectionImage(event)
            {
                fileInput = event.target;   // STORE INPUT
                selectedFiles = Array.from(fileInput.files);
                renderPreviews();
            }

            function renderPreviews()
            {
                let preview = document.getElementById('imagePreview');

                preview.innerHTML = '';   // CLEAR FIRST

                selectedFiles.forEach((file, index) => {

                    const reader = new FileReader();

                    reader.onload = function(e)
                    {
                        const wrapper = document.createElement('div');
                        wrapper.style.position = 'relative';
                        wrapper.style.display = 'inline-block';
                        wrapper.style.marginRight = '10px';

                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'img-fluid rounded border';
                        img.style.maxHeight = '150px';
                        img.style.background = 'black';

                        const close = document.createElement('span');
                        close.innerHTML = '&times;';
                        close.style.position = 'absolute';
                        close.style.top = '2px';
                        close.style.right = '6px';
                        close.style.cursor = 'pointer';
                        close.style.background = 'red';
                        close.style.color = 'white';
                        close.style.borderRadius = '50%';
                        close.style.padding = '0px 6px';
                        close.style.fontSize = '18px';
                        close.style.lineHeight = '18px';

                        close.onclick = function () {
                            removeImage(index);
                        };

                        wrapper.appendChild(img);
                        wrapper.appendChild(close);
                        preview.appendChild(wrapper);
                    };

                    reader.readAsDataURL(file);
                });

                updateInputFiles();
            }


            function removeImage(index)
            {
                selectedFiles.splice(index, 1);
                renderPreviews();
            }

            function updateInputFiles()
            {
                const dataTransfer = new DataTransfer();

                selectedFiles.forEach(file => {
                    dataTransfer.items.add(file);
                });

                fileInput.files = dataTransfer.files;
            }
        </script>

        {{-- Script to fetch multiples files forthe section --}}
        <script>
            let removedImages = [];

            function removeExistingImage(filename, el)
            {
                if(confirm('Remove this image?')){

                    removedImages.push(filename);

                    document.getElementById('removed_section_images').value =
                        JSON.stringify(removedImages);

                    el.parentElement.remove();
                }
            }
        </script>


        <script>
            function previewSectionImage(event) {
                const img = document.getElementById('imagePreview');
                img.src = URL.createObjectURL(event.target.files[0]);
                img.classList.remove('d-none');
            }

            function previewServiceImage(event) {
                const img = document.getElementById('serviceimagePreview');
                img.src = URL.createObjectURL(event.target.files[0]);
                img.classList.remove('d-none');
            }

            function previewFaqImage(event) {
                const img = document.getElementById('faqimagePreview');
                img.src = URL.createObjectURL(event.target.files[0]);
                img.classList.remove('d-none');
            }

            function previewSpecialImage(event) {
                const img = document.getElementById('specialimagePreview');
                img.src = URL.createObjectURL(event.target.files[0]);
                img.classList.remove('d-none');
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
                            <input type="text" name="features[${featureIndex}][title]" class="form-control" placeholder="Enter Service / Procedure">
                        </td>

                        <td>
                            <textarea name="features[${featureIndex}][description]" class="form-control editor" placeholder="Enter Description"></textarea>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger remove-feature">Remove</button>
                        </td>
                    </tr>`;
                    $('#featuresTable tbody').append(newRow);
                    featureIndex++;
                    initEditors();
                });

                // Remove feature row
                $('#featuresTable').on('click', '.remove-feature', function() {
                    $(this).closest('tr').remove();
                });
            });
        </script>


            <!-- JS for featured table editor -->
        <script>
            function initEditors() {

                document.querySelectorAll('.editor').forEach(textarea => {

                    if (textarea.classList.contains('ck-loaded')) return;

                    ClassicEditor.create(textarea, {

                        toolbar: [
                            'heading', '|',
                            'bold','italic','underline','strikethrough','subscript','superscript',
                            'link','blockQuote','codeBlock',
                            'bulletedList','numberedList','todoList',
                            '|',
                            'alignment','outdent','indent',
                            '|',
                            'fontColor','fontBackgroundColor','fontSize','fontFamily',
                            '|',
                            'undo','redo','removeFormat','highlight','specialCharacters'
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
                                'default',
                                'Arial, Helvetica, sans-serif',
                                'Courier New, Courier, monospace',
                                'Georgia, serif',
                                'Lucida Sans Unicode, Lucida Grande, sans-serif',
                                'Tahoma, Geneva, sans-serif',
                                'Times New Roman, Times, serif',
                                'Trebuchet MS, Helvetica, sans-serif',
                                'Verdana, Geneva, sans-serif'
                            ]
                        },

                        fontSize: {
                            options: [ 'tiny','small','default','big','huge' ]
                        },

                        alignment: {
                            options: [ 'left','center','right','justify' ]
                        }

                    }).then(editor => {
                        textarea.classList.add('ck-loaded');
                    })
                    .catch(error => console.error(error));
                });
            }

            // Initial load
            document.addEventListener('DOMContentLoaded', function () {
                initEditors();
            });
        </script>

        
        <!-- JS for dynamic faq table -->
         <!-- JS for dynamic faq table -->
        <script>
            let faqIndex = 1;

            // CKEditor config (reuse everywhere)
            const editorConfig = {
                toolbar: [
                    'heading','|',
                    'bold','italic','underline','strikethrough',
                    'link','bulletedList','numberedList',
                    '|','alignment',
                    '|','fontColor','fontBackgroundColor','fontSize','fontFamily',
                    '|','insertTable','horizontalLine',
                    '|','undo','redo'
                ]
            };

            $(document).ready(function() {

                // Initialize first editor safely
                document.querySelectorAll('.faq-editor').forEach(el => {
                    ClassicEditor.create(el, editorConfig);
                    el.classList.add('editor-loaded');
                });

                $('#faqTable').on('click', '.add-faq', function() {

                    const newRow = `
                    <tr class="faq-row">
                        <td>
                            <input type="text" name="faq[${faqIndex}][question]" class="form-control" placeholder="Enter Question">
                        </td>
                        <td>
                            <textarea name="faq[${faqIndex}][answer]"
                                class="form-control faq-editor"
                                placeholder="Enter Answer"
                                rows="3"></textarea>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger remove-faq">Remove</button>
                        </td>
                    </tr>`;

                    $('#faqTable tbody').append(newRow);

                    // Init CKEditor on newly added textarea
                    document.querySelectorAll('.faq-editor').forEach(el => {
                        if (!el.classList.contains('editor-loaded')) {
                            ClassicEditor.create(el, editorConfig);
                            el.classList.add('editor-loaded');
                        }
                    });

                    faqIndex++;
                });

                $('#faqTable').on('click', '.remove-faq', function() {
                    $(this).closest('tr').remove();
                });

            });
        </script>

        <!---- js for page headers table---->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                let headerIndex = {{ count($service_details->page_headers ?? []) }};

                // Add new header row
                document.querySelector('#pageHeadersTable').addEventListener('click', function(e){
                    if(e.target && e.target.classList.contains('add-header')){
                        const tbody = this.querySelector('tbody');
                        const newRow = document.createElement('tr');
                        newRow.classList.add('header-row');
                        newRow.innerHTML = `
                            <td>
                                <input type="text" name="page_headers[${headerIndex}][title]" class="form-control" placeholder="Enter Page Header">
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger remove-header">Remove</button>
                            </td>
                        `;
                        tbody.appendChild(newRow);
                        headerIndex++;
                    }
                });

                // Remove header row
                document.querySelector('#pageHeadersTable').addEventListener('click', function(e){
                    if(e.target && e.target.classList.contains('remove-header')){
                        e.target.closest('tr').remove();
                    }
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