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


                                        <h4># Emergency Details</h4>


                                        <!-- Emergency Heading -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="emergency_heading">Emergency Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="emergency_heading" type="text" name="emergency_heading" placeholder="Enter Emergency Heading" required>
                                            <div class="invalid-feedback">Please enter a Emergency Heading.</div>
                                        </div>


                                        <div class="table-responsive mt-5">
                                            <table class="table table-bordered" id="emergencyTable">
                                                <thead>
                                                    <tr>
                                                        <th>Icon <span class="txt-danger">*</span></th>
                                                        <th>Emergency Center <span class="txt-danger">*</span></th>
                                                        <th>Contact <span class="txt-danger">*</span></th>
                                                        <th width="120">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tableBody">
                                                    <tr>
                                                        <td>
                                                            <input type="file" name="icon[]" class="form-control iconInput">
                                                            <small class="text-secondary"><b>Note: Max size 2MB, formats: jpg, jpeg, png, webp, svg</b></small>
                                                            <br>
                                                            <img src="" class="img-preview mt-2" style="max-width: 80px; display:none;">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="center_name[]" class="form-control" placeholder="Enter Center Name">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="contact[]" class="form-control" placeholder="Enter Contact">
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-success addRow">Add More</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>


                                        <!-- Hospital Name -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="hospital_name">Hospital Name <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="hospital_name" type="text" name="hospital_name" placeholder="Enter Hospital Name" required>
                                            <div class="invalid-feedback">Please enter a Hospital Name.</div>
                                        </div>



                                        <!-- Call Us -->
                                        <div class="col-md-6 mt-5">
                                            <label for="call_us" class="form-label"><b>Call Us <span class="txt-danger">*</span></b></label>
                                            <input type="text" name="call_us" id="call_us" class="form-control" 
                                                placeholder="+91 22 6112 4800, +91 22 5095 4700" 
                                                value="{{ old('call_us') }}" required>
                                            <small class="text-secondary">Enter multiple numbers separated by commas.</small>
                                        </div>

                                        <!-- Location -->
                                        <div class="col-md-6 mt-5">
                                            <label for="location" class="form-label"><b>Location <span class="txt-danger">*</span></b></label>
                                            <textarea name="location" id="location" class="form-control" rows="2"
                                                placeholder="Enter Location" required>{{ old('location') }}</textarea>
                                        </div>

                                        <!-- Location URL-->
                                        <div class="col-md-6 mt-5">
                                            <label for="location" class="form-label"><b>Location URL <span class="txt-danger">*</span></b></label>
                                            <input type="url" name="location_url" id="location_url" class="form-control" rows="2"
                                                placeholder="Enter URL" value="{{ old('location_url') }}" required>
                                        </div>

                                        <!-- Email -->
                                        <div class="col-md-6 mt-5">
                                            <label for="email" class="form-label"><b>Email <span class="txt-danger">*</span></b></label>
                                            <input type="email" name="email" id="email" class="form-control" 
                                                placeholder="admin.kjsh@somaiya.edu" 
                                                value="{{ old('email') }}" required>
                                        </div>


                                        <!-- Iframe URL -->
                                        <div class="col-md-12">
                                            <label for="iframe_url" class="form-label"><b>Iframe URL <span class="txt-danger">*</span></b></label>
                                            <input type="url" name="iframe_url" id="iframe_url" class="form-control" 
                                                placeholder="Enter URL" 
                                                value="{{ old('iframe_url') }}" required>
                                            <small class="text-secondary">Enter a valid iframe URL for Google Maps or other embeds.</small>
                                        </div>





                                        <!-- Social Media Links Table -->
                                        <div class="col-12 mt-5">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <label class="form-label" for="social_media_links"><strong>Social Media Links </strong></label>
                                                <button type="button" id="add-social-media-row" class="btn btn-success">Add Link</button>
                                            </div>
                                            <table class="table table-bordered p-3" id="dynamicTable" style="border: 2px solid #dee2e6;">
                                                <thead>
                                                    <tr>
                                                        <th>Social Media Platform <span class="txt-danger">*</span></th>
                                                        <th>Link <span class="txt-danger">*</span></th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="social-media-table-body">
                                                    <tr>
                                                        <td>
                                                            <select name="social_media[0][platform]" class="form-control" required>
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
                                                        <td><input type="url" name="social_media[0][link]" class="form-control" placeholder="Enter Social Media URL" required></td>
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


            // Event delegation to remove rows
            document.getElementById('social-media-table-body').addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('remove-social-media-row')) {
                    var row = e.target.closest('tr');
                    row.remove();
                }
            });
        </script>


        <script>
            $(document).ready(function(){

                // Function to generate a new row
                function getNewRow() {
                    return `
                        <tr>
                            <td>
                                <input type="file" name="icon[]" class="form-control iconInput">
                                <small class="text-secondary"><b>Note: Max size 2MB, formats: jpg, jpeg, png, webp, svg</b></small>
                                <br>
                                <img src="" class="img-preview mt-2" style="max-width: 80px; display:none;">
                            </td>
                            <td>
                                <input type="text" name="center_name[]" class="form-control" placeholder="Enter Center Name">
                            </td>
                            <td>
                                <input type="text" name="contact[]" class="form-control" placeholder="Enter Contact">
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger removeRow">Remove</button>
                            </td>
                        </tr>
                    `;
                }

                // Add Row
                $(document).on('click', '.addRow', function(){
                    $('#tableBody').append(getNewRow());
                });

                // Remove Row
                $(document).on('click', '.removeRow', function(){
                    $(this).closest('tr').remove();
                });

                // Image Preview
                $(document).on('change', '.iconInput', function(event){
                    let input = event.target;
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        $(input).siblings('.img-preview').attr('src', e.target.result).show();
                    }
                    if (input.files[0]) {
                        reader.readAsDataURL(input.files[0]);
                    }
                });

            });
        </script>




</body>

</html>