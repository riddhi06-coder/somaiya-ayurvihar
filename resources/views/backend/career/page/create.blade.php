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
                  <h4>Add Career Page Details Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-career-page.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Add Career Page Details</li>
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
                        <h4>Career Page Details Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                    <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('admin.manage-career-page.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                        <!-- Heading -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="heading"> Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="heading" type="text" name="heading" placeholder="Enter Heading" required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>


                                        <!-- Banner Image -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="banner_image">
                                                Image <span class="txt-danger">*</span>
                                            </label>
                                        
                                            <input class="form-control" id="banner_image" type="file" name="banner_image"
                                                accept="image/*" onchange="previewBanner(event)" required>
                                        
                                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small><br>
                                            <small class="text-secondary"><b>Note: Only .jpg, .jpeg, .png, .webp, .svg allowed.</b></small>
                                        
                                            <div class="invalid-feedback">Please upload a banner image.</div>
                                        
                                            <!-- Preview BELOW input -->
                                            <div class="mt-3">
                                                <img id="bannerPreview" src="#" alt="Preview"
                                                    style="max-width: 100%; height: auto; display: none; border-radius: 8px; border: 1px solid #ddd;">
                                            </div>
                                        </div>
                                        
                                        
                                        <!-- Short Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="about">Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="editor" name="desc" placeholder="Enter Description" required></textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>


                                        <hr class="mt-5">

                                        <h4># Benefits</h4>


                                        <!-- Heading -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="benefits_heading"> Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="benefits_heading" type="text" name="benefits_heading" placeholder="Enter Heading" required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>


                                        <!-- benefits Table Header with Add Button -->
                                        <div class="col-12 mt-5">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <h5 class="mb-0">Benefits Table</h5>
                                                <button type="button" class="btn btn-success add-benefits">+ Add More</button>
                                            </div>
                                        
                                            <table class="table table-bordered" id="benefitsTable">
                                                <thead>
                                                    <tr>
                                                        <th>Heading <span class="txt-danger">*</span></th>
                                                        <th>Description <span class="txt-danger">*</span></th>
                                                        <th>Image</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="benefits-row">
                                                        <td>
                                                            <input type="text" name="benefits[0][question]" class="form-control" placeholder="Enter Question">
                                                        </td>
                                                        <td>
                                                            <textarea name="benefits[0][answer]"
                                                                class="form-control benefits-editor"
                                                                placeholder="Enter Answer"
                                                                rows="3"></textarea>
                                                        </td>
                                        
                                                        <td>
                                                            <input type="file" name="benefits[0][image]" class="form-control"
                                                                accept="image/*" onchange="previewbenefitsImage(event, 0)">
                                        
                                                            <img id="benefitsPreview_0"
                                                                style="margin-top:10px; max-width:100px; display:none; border:1px solid #ddd; border-radius:6px;">
                                                        </td>
                                        
                                                        <td>
                                                            <button type="button" class="btn btn-danger remove-benefits">Remove</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>


                                        <hr class="mt-5">

                                        <h4># Opening Information</h4>


                                        <!-- Job Opening Heading -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="job_heading">Job Opening Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="job_heading" type="text" name="job_heading" placeholder="Enter Job Opening Heading" required>
                                            <div class="invalid-feedback">Please enter a Job Opening Heading.</div>
                                        </div>



                                        <!-- Form Actions -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('admin.manage-career-page.index') }}" class="btn btn-danger px-4">Cancel</a>
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
        <!-- footer start11-->
        @include('components.backend.footer')
        </div>
        </div>
       
       @include('components.backend.main-js')

        
        <script>
            function previewBanner(event) {
                const input = event.target;
                const preview = document.getElementById('bannerPreview');
            
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
            
                    reader.onload = function (e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    };
            
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>


        <script>
            function previewbenefitsImage(event, index) {
                const input = event.target;
                const preview = document.getElementById('benefitsPreview_' + index);
            
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
            
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    };
            
                    reader.readAsDataURL(input.files[0]);
                } else {
                    preview.style.display = 'none';
                }
            }
        </script>
        
        
         <!-- JS for dynamic benefits table -->
        <script>
            let benefitsIndex = 1;

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
                document.querySelectorAll('.benefits-editor').forEach(el => {
                    ClassicEditor.create(el, editorConfig);
                    el.classList.add('editor-loaded');
                });

                $(document).on('click', '.add-benefits', function() {

                    const newRow = `
                        <tr class="benefits-row">
                            <td>
                                <input type="text" name="benefits[${benefitsIndex}][question]" class="form-control" placeholder="Enter Question">
                            </td>
                            <td>
                                <textarea name="benefits[${benefitsIndex}][answer]"
                                    class="form-control benefits-editor"
                                    placeholder="Enter Answer"
                                    rows="3"></textarea>
                            </td>
                        
                            <td>
                                <input type="file" name="benefits[${benefitsIndex}][image]" class="form-control"
                                    accept="image/*" onchange="previewbenefitsImage(event, ${benefitsIndex})">
                        
                                <img id="benefitsPreview_${benefitsIndex}"
                                    style="margin-top:10px; max-width:100px; display:none; border:1px solid #ddd; border-radius:6px;">
                            </td>
                        
                            <td>
                                <button type="button" class="btn btn-danger remove-benefits">Remove</button>
                            </td>
                        </tr>`;

                    $('#benefitsTable tbody').append(newRow);

                    // Init CKEditor on newly added textarea
                    document.querySelectorAll('.benefits-editor').forEach(el => {
                        if (!el.classList.contains('editor-loaded')) {
                            ClassicEditor.create(el, editorConfig);
                            el.classList.add('editor-loaded');
                        }
                    });

                    benefitsIndex++;
                });

                $('#benefitsTable').on('click', '.remove-benefits', function() {
                    $(this).closest('tr').remove();
                });

            });
        </script>




</body>

</html>