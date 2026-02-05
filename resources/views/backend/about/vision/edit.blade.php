<!doctype html>
<html lang="en">
    
<head>
    @include('components.backend.head')

    <style>
        .preview-box {
            position: relative;
            margin: 6px;
        }

        .preview-box img {
            height: 60px;        /* small + compact */
            width: 60px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #ddd;
        }

        /* RED cross on top-right of image */

        .remove-btn {
            position: absolute;
            top: -8px;
            right: -8px;
            background: red;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 14px;
            line-height: 20px;
            text-align: center;
            cursor: pointer;
            font-weight: bold;
        }
    </style>

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
                  <h4>Add Vision & Mission Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-vision-mission.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Add Vision & Mission</li>
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
                        <h4>Vision & Mission Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                    <form class="row g-3 needs-validation custom-input" novalidate 
                                        action="{{ route('admin.manage-vision-mission.update', $about->id) }}" 
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <!-- Banner Heading -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="banner_heading">Banner Heading <span class="text-danger">*</span></label>
                                            <input class="form-control" id="banner_heading" type="text" 
                                                name="banner_heading" 
                                                placeholder="Enter Banner Heading" 
                                                value="{{ old('banner_heading', $about->banner_heading) }}" required>
                                            <div class="invalid-feedback">Please enter a Banner Heading.</div>
                                        </div>

                                        <!-- Banner Image -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label">Images <span class="text-danger">*</span></label>
                                            <input class="form-control" id="image" type="file" name="image" 
                                                accept=".jpg,.jpeg,.png,.webp,.svg" onchange="previewImages(event)">
                                            <div class="invalid-feedback">Please upload images.</div>
                                            <small class="text-secondary"><b>Note:</b> Each file should be less than 2MB.</small><br>
                                            <small class="text-secondary"><b>Allowed:</b> jpg, jpeg, png, webp, svg</small>

                                            <!-- Preview Area -->
                                            <div id="imagePreviewContainer" class="d-flex flex-wrap mt-3">
                                                @if($about->image)
                                                    <img src="{{ asset('uploads/vision_mission/'.$about->image) }}" 
                                                        style="max-width:150px; max-height:80px;" alt="Banner Image">
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Vision & Mission Table -->
                                        <div class="col-12 mt-5">
                                            <h5> Vision & Mission Details </h5>
                                            <table class="table table-bordered mt-2" id="dynamicTable">
                                                <thead>
                                                    <tr>
                                                        <th>Heading <span class="text-danger">*</span></th>
                                                        <th>Description <span class="text-danger">*</span></th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $visionMissionDetails = json_decode($about->vision_mission_details, true) ?? [];
                                                    @endphp

                                                    @foreach($visionMissionDetails as $index => $detail)
                                                        <tr>
                                                            <td>
                                                                <input type="text" name="heading[]" class="form-control" 
                                                                    placeholder="Enter heading" 
                                                                    value="{{ $detail['heading'] }}">
                                                            </td>
                                                            <td>
                                                                <textarea name="description[]" class="form-control" 
                                                                        placeholder="Enter description">{{ $detail['description'] }}</textarea>
                                                            </td>
                                                            <td>
                                                                @if($index === 0)
                                                                    <button type="button" class="btn btn-success" onclick="addRow()">Add More</button>
                                                                @else
                                                                    <button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <hr class="mt-5">

                                        <!-- Our Values Section -->
                                        <h4># Our Values </h4>
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="section_heading"> Section Heading <span class="text-danger">*</span></label>
                                            <input class="form-control" id="section_heading" name="section_heading" 
                                                placeholder="Enter Section Heading" 
                                                value="{{ old('section_heading', $about->section_heading) }}" required>
                                            <div class="invalid-feedback">Please enter a Section Heading.</div>
                                        </div>

                                        <div class="col-12 mt-5">
                                            <table class="table table-bordered" id="iconTable">
                                                <thead>
                                                    <tr>
                                                        <th>Icon <span class="text-danger">*</span></th>
                                                        <th>Heading <span class="text-danger">*</span></th>
                                                        <th>Description <span class="text-danger">*</span></th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $values = json_decode($about->values, true) ?? [];
                                                    @endphp

                                                    @foreach($values as $index => $value)
                                                        <tr>
                                                            <td>
                                                                <div class="mb-2">
                                                                    <input type="file" name="icon[]" 
                                                                        accept=".jpg,.jpeg,.png,.webp,.svg" 
                                                                        onchange="previewIcon(this)" 
                                                                        class="form-control">
                                                                    <div class="invalid-feedback">Please upload an image.</div>
                                                                </div>

                                                                <div class="mb-1">
                                                                    <small class="text-secondary d-block"><b>Note:</b> Each file should be less than 2MB.</small>
                                                                    <small class="text-secondary d-block"><b>Allowed:</b> jpg, jpeg, png, webp, svg</small>
                                                                </div>

                                                                <div class="iconPreview mt-2" 
                                                                    style="background:#a38a8a; padding:5px; display:inline-block; border-radius:5px; 
                                                                            min-width:80px; min-height:80px; text-align:center;">
                                                                    @if(isset($value['icon']) && $value['icon'])
                                                                        <img src="{{ asset('uploads/vision_mission/'.$value['icon']) }}" 
                                                                            style="max-width:70px; max-height:70px; display:block; margin:auto;" 
                                                                            alt="Icon">
                                                                    @endif
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <input type="text" name="heading_icon[]" class="form-control" 
                                                                    placeholder="Enter heading" 
                                                                    value="{{ $value['heading'] }}">
                                                            </td>
                                                            <td>
                                                                <textarea name="description_icon[]" class="form-control" 
                                                                        placeholder="Enter description">{{ $value['description'] }}</textarea>
                                                            </td>
                                                            <td>
                                                                @if($index === 0)
                                                                    <button type="button" class="btn btn-success" onclick="addIconRow()">Add More</button>
                                                                @else
                                                                    <button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Form Actions -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('admin.manage-vision-mission.index') }}" class="btn btn-danger px-4">Cancel</a>
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


        <script>
            function previewImages(event) {
                const previewContainer = document.getElementById('imagePreviewContainer');
                previewContainer.innerHTML = ''; // Clear previous preview

                const file = event.target.files[0];
                if (file) {
                    // Check file size (2MB max)
                    if(file.size > 2 * 1024 * 1024){
                        alert("File is too big! Maximum size allowed is 2MB.");
                        event.target.value = ""; // Clear the input
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.maxWidth = "150px";  // adjust size as needed
                        img.style.maxHeight = "150px";
                        img.classList.add('me-2', 'mb-2'); // Bootstrap spacing
                        previewContainer.appendChild(img);
                    }
                    reader.readAsDataURL(file);
                }
            }
        </script>

        
        <!--- Vision Add Rows---->
        <script>
            function addRow() {
                const table = document.getElementById('dynamicTable').getElementsByTagName('tbody')[0];

                const newRow = document.createElement('tr');

                newRow.innerHTML = `
                    <td><input type="text" name="heading[]" class="form-control" placeholder="Enter heading"></td>
                    <td><textarea name="description[]" class="form-control" placeholder="Enter description"></textarea></td>
                    <td>
                        <button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button>
                    </td>
                `;

                table.appendChild(newRow);
            }

            function removeRow(button) {
                const row = button.closest('tr');
                row.remove();
            }
        </script>


        <!---- Our Vlaues Js--->
        <script>
            // Function to preview icon image
            function previewIcon(input) {
                const previewContainer = input.closest('td').querySelector('.iconPreview');
                previewContainer.innerHTML = ''; // Clear previous preview
                previewContainer.style.background = "#a38a8a"; // Light gray background
                previewContainer.style.padding = "5px";         // Some padding
                previewContainer.style.display = "inline-block"; 
                previewContainer.style.borderRadius = "5px";    // Rounded corners
                previewContainer.style.minWidth = "80px";       // Ensure container size
                previewContainer.style.minHeight = "80px";
                previewContainer.style.textAlign = "center";

                const file = input.files[0];
                if (file) {
                    if(file.size > 2 * 1024 * 1024){
                        alert("File is too big! Maximum size allowed is 2MB.");
                        input.value = "";
                        previewContainer.innerHTML = '';
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.maxWidth = "70px";
                        img.style.maxHeight = "70px";
                        img.style.display = "block";
                        img.style.margin = "auto";
                        previewContainer.appendChild(img);
                    }
                    reader.readAsDataURL(file);
                }
            }

            // Function to add new row
            function addIconRow() {
                const table = document.getElementById('iconTable').getElementsByTagName('tbody')[0];
                const newRow = document.createElement('tr');

                newRow.innerHTML = `
                    <td>
                        <!-- File Input with Validation -->
                        <div class="mb-2">
                            <input type="file" name="icon[]" 
                                accept=".jpg,.jpeg,.png,.webp,.svg" 
                                onchange="previewIcon(this)" 
                                class="form-control">
                            <div class="invalid-feedback">Please upload an image.</div>
                        </div>

                        <!-- Notes -->
                        <div class="mb-1">
                            <small class="text-secondary d-block"><b>Note:</b> Each file should be less than 2MB.</small>
                            <small class="text-secondary d-block"><b>Allowed:</b> jpg, jpeg, png, webp, svg</small>
                        </div>

                        <!-- Preview Area -->
                        <div class="iconPreview mt-2"></div>
                    </td>

                    <td><input type="text" name="heading_icon[]" class="form-control" placeholder="Enter heading"></td>
                    <td><textarea name="description_icon[]" class="form-control" placeholder="Enter description"></textarea></td>
                    <td>
                        <button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button>
                    </td>
                `;

                table.appendChild(newRow);
            }

            // Reuse removeRow function from previous example
            function removeRow(button) {
                const row = button.closest('tr');
                row.remove();
            }
        </script>

</body>

</html>