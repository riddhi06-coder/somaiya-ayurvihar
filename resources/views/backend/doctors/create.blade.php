<!doctype html>
<html lang="en">
    
<head>
    @include('components.backend.head')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">

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
                  <h4>Add Doctor's Details Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-doctors.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Add Doctor's Details</li>
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
                        <h4>Doctor's Details Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                    <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('admin.manage-doctors.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf



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
                                                        {{ isset($service) && $service->category_id == $cat->id ? 'selected' : '' }}>
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
                                                            {{ isset($service) && $service->subcategory_id == $subcat->id ? 'selected' : '' }}>
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
                                                    {{ isset($service) && $service->service_id ? 'required' : '' }}>
                                                <option value="">Select Service</option>
                                                @foreach($facility as $f)
                                                    <option value="{{ $f->id }}"
                                                            data-subcategory="{{ $f->subcategory_id }}"
                                                            {{ isset($service) && $service->service_id == $f->id ? 'selected' : '' }}>
                                                        {{ $f->service_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <hr class="mt-5">

                                        <h4># Doctor's Details</h4>


                                        <!-- Doctor Name -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="doctor_name">Doctor Name <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="doctor_name" type="text" name="doctor_name" placeholder="Enter Doctor Name" required>
                                            <div class="invalid-feedback">Please enter a Doctor Name.</div>
                                        </div>


                                        <!-- Doctor Designation -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="doctor_designation">Doctor Designation </label>
                                            <input class="form-control" id="doctor_designation" type="text" name="doctor_designation" placeholder="Enter Doctor Designation">
                                            <div class="invalid-feedback">Please enter a Doctor Designation.</div>
                                        </div>


                                        <!-- Doctor Image -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="doctor_image"> Doctor Image <span class="txt-danger">*</span> </label>
                                            <input class="form-control" id="doctor_image" type="file" name="doctor_image" onchange="previewimage(event)" required>
                                            <div class="invalid-feedback">Please upload a Doctor image.</div>
                                                <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                                <br>
                                                <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                            
                                            <!-- Image Preview -->
                                            <div class="mt-2">
                                                <img id="imagePreview" src="#" alt="Preview" class="img-fluid rounded border d-none" style="max-height: 150px; background:black;">
                                            </div>
                                        </div>

                                        <!-- Doctor Time Slot -->
                                        <!--<div class="col-md-6 mt-5">-->
                                        <!--    <label class="form-label">-->
                                        <!--        Doctor Time Slot -->
                                        <!--    </label>-->

                                        <!--    <div class="row mt-3">-->
                                        <!--        <div class="col-md-6">-->
                                        <!--            <label class="form-label mb-1">From Time</label>-->
                                        <!--            <input-->
                                        <!--                type="time"-->
                                        <!--                class="form-control"-->
                                        <!--                name="time_slot[from][]"-->
                                                        
                                        <!--            >-->
                                        <!--        </div>-->

                                        <!--        <div class="col-md-6">-->
                                        <!--            <label class="form-label mb-1">To Time</label>-->
                                        <!--            <input-->
                                        <!--                type="time"-->
                                        <!--                class="form-control"-->
                                        <!--                name="time_slot[to][]"-->
                                                        
                                        <!--            >-->
                                        <!--        </div>-->
                                        <!--    </div>-->


                                        <!--    <div class="invalid-feedback">-->
                                        <!--        Please enter doctor availability time.-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        
                                        
                                        <!-- Doctor Schedule (Days + Timing grouped per shift) -->
                                        <div class="col-md-12 mt-5">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <label class="form-label mb-0">
                                                    Doctor Schedule <span class="txt-danger">*</span>
                                                    <small class="text-secondary d-block">Add a row for each shift. Select the days for that shift and its timing.</small>
                                                </label>
                                                <button type="button" id="add-schedule-row" class="btn btn-success btn-sm">Add Shift</button>
                                            </div>
                                        
                                            <table class="table table-bordered" id="scheduleTable" style="border: 2px solid #dee2e6;">
                                                <thead>
                                                    <tr>
                                                        <th style="width:45%">Days</th>
                                                        <th style="width:20%">From Time</th>
                                                        <th style="width:20%">To Time</th>
                                                        <th style="width:15%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="schedule-body">
                                                    <tr>
                                                        <td>
                                                            <select name="schedule[0][days][]" class="form-control schedule-days" multiple required>
                                                                <option value="Monday">Monday</option>
                                                                <option value="Tuesday">Tuesday</option>
                                                                <option value="Wednesday">Wednesday</option>
                                                                <option value="Thursday">Thursday</option>
                                                                <option value="Friday">Friday</option>
                                                                <option value="Saturday">Saturday</option>
                                                                <option value="Sunday">Sunday</option>
                                                            </select>
                                                        </td>
                                                        <td><input type="time" class="form-control" name="schedule[0][from]" required></td>
                                                        <td><input type="time" class="form-control" name="schedule[0][to]" required></td>
                                                        <td><button type="button" class="btn btn-danger btn-sm remove-schedule-row">Remove</button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>


                                        <!-- Qualification-->
                                        <div class="col-md-12 mt-5">
                                            <label class="form-label" for="qualification">Qualification<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="qualification" name="qualification" placeholder="Enter Qualification" required></textarea>
                                            <div class="invalid-feedback">Please enter an Qualification.</div>
                                        </div>


                                        <!-- Profile Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="profile_desc">Profile Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="editor" name="profile_desc" placeholder="Enter Profile Description" required></textarea>
                                            <div class="invalid-feedback">Please enter an Profile Description.</div>
                                        </div>



                                        <hr class="mt-5">

                                        

                                        <!-- Social Media Links Table -->
                                        <div class="col-12 mt-5">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <label class="form-label" for="social_media_links"><strong>Social Media Links </strong></label>
                                                <button type="button" id="add-social-media-row" class="btn btn-success">Add Link</button>
                                            </div>
                                            <table class="table table-bordered p-3" id="dynamicTable" style="border: 2px solid #dee2e6;">
                                                <thead>
                                                    <tr>
                                                        <th>Social Media Platform </th>
                                                        <th>Link </th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="social-media-table-body">
                                                    <tr>
                                                        <td>
                                                            <select name="social_media[0][platform]" class="form-control">
                                                                <option value="">Select Platform</option>
                                                                <option value="1">Facebook</option>
                                                                <option value="2">Twitter</option>
                                                                <option value="3">Instagram</option>
                                                                <option value="4">LinkedIn</option>
                                                                <option value="5">YouTube</option>
                                                                <option value="6">Pintrest</option>
                                                                <option value="7">Watsapp</option>
                                                            </select>
                                                        </td>
                                                        <td><input type="url" name="social_media[0][link]" class="form-control" placeholder="Enter Social Media URL"></td>
                                                        <td><button type="button" class="btn btn-danger remove-social-media-row">Remove</button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>



                                        <!-- Form Actions -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('admin.manage-doctors.index') }}" class="btn btn-danger px-4">Cancel</a>
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

        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



        <!-- Dynamic schedule rows (days + timing per shift) -->
        <script>
            let scheduleIndex = 1;
        
            function initScheduleSelect2(el) {
                $(el).select2({
                    placeholder: "Select days",
                    allowClear: true,
                    width: '100%'
                });
            }
        
            $(window).on('load', function () {
                $('.schedule-days').each(function () {
                    if ($(this).hasClass('select2-hidden-accessible')) {
                        $(this).select2('destroy');
                    }
                    initScheduleSelect2(this);
                });
            });
        
            document.getElementById('add-schedule-row').addEventListener('click', function () {
                var tbody = document.getElementById('schedule-body');
                var row = tbody.insertRow();
                var i = scheduleIndex;
        
                row.insertCell(0).innerHTML = `
                    <select name="schedule[${i}][days][]" class="form-control schedule-days" multiple required>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                        <option value="Sunday">Sunday</option>
                    </select>`;
                row.insertCell(1).innerHTML = `<input type="time" class="form-control" name="schedule[${i}][from]" required>`;
                row.insertCell(2).innerHTML = `<input type="time" class="form-control" name="schedule[${i}][to]" required>`;
                row.insertCell(3).innerHTML = `<button type="button" class="btn btn-danger btn-sm remove-schedule-row">Remove</button>`;
        
                // Init select2 on the new row's days dropdown
                initScheduleSelect2(row.querySelector('.schedule-days'));
                scheduleIndex++;
            });
        
            // Remove row (keep at least one)
            document.getElementById('schedule-body').addEventListener('click', function (e) {
                if (e.target && e.target.classList.contains('remove-schedule-row')) {
                    var rows = document.getElementById('schedule-body').rows;
                    if (rows.length > 1) {
                        $(e.target.closest('tr')).find('.schedule-days').select2('destroy');
                        e.target.closest('tr').remove();
                    } else {
                        alert('At least one shift is required.');
                    }
                }
            });
        </script>


        <script>
            $(document).ready(function () {
                $('#doctor_availability').select2({
                    placeholder: "Select available days",
                    allowClear: true,
                    width: '100%'
                });
            });
        </script>
        

        <script>
            $(document).ready(function () {
                $('.select2').select2({
                    placeholder: "Select options",
                    allowClear: true,
                    width: '100%'
                });
            });
        </script>



        <script>
            document.getElementById('add-social-media-row').addEventListener('click', function () {
                var tableBody = document.getElementById('social-media-table-body');
                var rowCount = tableBody.rows.length;
                var row = tableBody.insertRow();

                // Platform Dropdown
                var cell1 = row.insertCell(0);
                var platformSelect = document.createElement('select');
                platformSelect.name = `social_media[${rowCount}][platform]`;
                platformSelect.classList.add('form-control');
                platformSelect.required = true;

                // Add options to the dropdown with numerical values
                var platforms = [
                    { id: 1, name: 'Facebook' },
                    { id: 2, name: 'Twitter' },
                    { id: 3, name: 'Instagram' },
                    { id: 4, name: 'Linkedin' },
                    { id: 5, name: 'Youtube' },
                    { id: 6, name: 'Pintrest' },
                    { id: 7, name: 'Watsapp' }
                ];
                platformSelect.innerHTML = '<option value="">Select Platform</option>';
                platforms.forEach(function (platform) {
                    var option = document.createElement('option');
                    option.value = platform.id; // Numerical value
                    option.textContent = platform.name.charAt(0).toUpperCase() + platform.name.slice(1); // Capitalized name
                    platformSelect.appendChild(option);
                });

                cell1.appendChild(platformSelect);

                // URL Input
                var cell2 = row.insertCell(1);
                var urlInput = document.createElement('input');
                urlInput.type = 'url';
                urlInput.name = `social_media[${rowCount}][link]`;
                urlInput.classList.add('form-control');
                urlInput.placeholder = 'Enter Social Media URL';
                urlInput.required = true;
                cell2.appendChild(urlInput);

                // Remove Button
                var cell3 = row.insertCell(2);
                var removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.classList.add('btn', 'btn-danger', 'remove-social-media-row');
                removeBtn.textContent = 'Remove';
                removeBtn.addEventListener('click', function () {
                    tableBody.deleteRow(row.rowIndex);
                });
                cell3.appendChild(removeBtn);
            });


            // Event delegation to remove rowss
            document.getElementById('social-media-table-body').addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('remove-social-media-row')) {
                    var row = e.target.closest('tr');
                    row.remove();
                }
            });
        </script> 



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

</body>

</html>