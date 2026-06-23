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
                  <h4>Add Announcements Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-announcements.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Add Announcements</li>
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
                        <h4>Announcements Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                    <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('admin.manage-announcements.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <!-- Announcement Title -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="title">Title <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="title" type="text" name="title" placeholder="Enter Title" required>
                                            <div class="invalid-feedback">Please enter a Title.</div>
                                        </div>


                                        <!-- Date Selection -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="date">Date <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="date" type="date" name="date" required>
                                            <div class="invalid-feedback">Please select a date.</div>
                                        </div>
                                        

                                        <!-- Announcement Image -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="announce_image"> Announcement Image <span class="txt-danger">*</span> </label>
                                            <input class="form-control" id="announce_image" type="file" name="announce_image" onchange="previewimage(event)" required>
                                            <div class="invalid-feedback">Please upload a Announcement image.</div>
                                                <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                                <br>
                                                <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                            
                                            <!-- Image Preview -->
                                            <div class="mt-2">
                                                <img id="imagePreview" src="#" alt="Preview" class="img-fluid rounded border d-none" style="max-height: 150px; background:black;">
                                            </div>
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
                                            <a href="{{ route('admin.manage-announcements.index') }}" class="btn btn-danger px-4">Cancel</a>
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


</body>

</html>