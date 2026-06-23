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
                  <h4>Add CSR & Sustainability Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-csr-sustainability.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Add CSR & Sustainability</li>
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
                        <h4>CSR & Sustainability Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                    <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('admin.manage-csr-sustainability.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                            
                                        <!-- Introduction -->
                                        <div class="col-md-12">
                                            <label class="form-label" for="about">Introduction<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="editor" name="desc" placeholder="Enter Introduction" required></textarea>
                                            <div class="invalid-feedback">Please enter an Introduction.</div>
                                        </div>
                                        
                                        
                                        <hr class="mt-5">

                                        <h4># UHTC Section</h4>
                                        
                                        
                                        <!-- Heading -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="uhtc_heading">Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="uhtc_heading" type="text" name="uhtc_heading" placeholder="Enter Heading" required>
                                            <div class="invalid-feedback">Please enter a  Heading.</div>
                                        </div>
                                        
                                        
                                        <!-- Special Image -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="uhtc_image"> Image  </label>
                                            <input class="form-control" id="uhtc_image" type="file" name="uhtc_image" onchange="previewspecialimage(event)">
                                            <div class="invalid-feedback">Please upload a image.</div>
                                                <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                                <br>
                                                <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                            
                                            <!-- Image Preview -->
                                            <div class="mt-2">
                                                <img id="specialimagePreview" src="#" alt="Preview" class="img-fluid rounded border d-none" style="max-height: 150px; background:black;">
                                            </div>
                                        </div>


                                        <!-- Introduction -->
                                        <div class="col-md-12">
                                            <label class="form-label" for="uhtc_desc">Description <span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="uhtc_desc" name="uhtc_desc" placeholder="Enter Description" required></textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>
                                      
                                      
                                      
                                        <hr class="mt-5">

                                        <h4># Support Programme Section</h4>
                                        
                                        
                                          <!-- Heading -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="support_heading">Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="support_heading" type="text" name="support_heading" placeholder="Enter Heading" required>
                                            <div class="invalid-feedback">Please enter a  Heading.</div>
                                        </div>
                                        
                                        
                                        <!-- Special Image -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="support_image"> Image  </label>
                                            <input class="form-control" id="support_image" type="file" name="support_image" onchange="previewsupportimage(event)">
                                            <div class="invalid-feedback">Please upload a image.</div>
                                                <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                                <br>
                                                <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                            
                                            <!-- Image Preview -->
                                            <div class="mt-2">
                                                <img id="supportimagePreview" src="#" alt="Preview" class="img-fluid rounded border d-none" style="max-height: 150px; background:black;">
                                            </div>
                                        </div>


                                        <!-- Introduction -->
                                        <div class="col-md-12">
                                            <label class="form-label" for="support_desc">Description <span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="support_desc" name="support_desc" placeholder="Enter Description" required></textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>
                                        
                                        
                                        
                                         <hr class="mt-5">

                                        <h4># Community Health Section</h4>
                                        
                                        
                                          <!-- Heading -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="community_heading">Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="community_heading" type="text" name="community_heading" placeholder="Enter Heading" required>
                                            <div class="invalid-feedback">Please enter a  Heading.</div>
                                        </div>
                                        
                                        
                                        <!-- Special Image -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="community_image"> Image  </label>
                                            <input class="form-control" id="community_image" type="file" name="community_image" onchange="previewcommunityimage(event)">
                                            <div class="invalid-feedback">Please upload a image.</div>
                                                <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                                <br>
                                                <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                            
                                            <!-- Image Preview -->
                                            <div class="mt-2">
                                                <img id="communityimagePreview" src="#" alt="Preview" class="img-fluid rounded border d-none" style="max-height: 150px; background:black;">
                                            </div>
                                        </div>


                                        <!-- Introduction -->
                                        <div class="col-md-12">
                                            <label class="form-label" for="community_desc">Description <span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="community_desc" name="community_desc" placeholder="Enter Description" required></textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>
                                        
                                        
                                        
                                        <hr class="mt-5">

                                        <h4># Information Section</h4>
                                        

                                        <!-- Introduction -->
                                        <div class="col-md-12">
                                            <label class="form-label" for="donation_desc"> Blood Donation Description <span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="donation_desc" name="donation_desc" placeholder="Enter Blood Donation Description" required></textarea>
                                            <div class="invalid-feedback">Please enter an Blood Donation Description.</div>
                                        </div>
                                        
                                        
                                         <!-- Inclusive Care -->
                                        <div class="col-md-12 mt-5">
                                            <label class="form-label" for="inclusive_desc"> Inclusive Care Description <span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="inclusive_desc" name="inclusive_desc" placeholder="Enter Inclusive Care Description" required></textarea>
                                            <div class="invalid-feedback">Please enter an Inclusive Care Description.</div>
                                        </div>
                                        
                                        
                                         
                                        <hr class="mt-5">

                                        <h4># Gallery Section</h4>
                                        
                                        
                                        <table class="table table-bordered mt-5" id="galleryTable">
                                            <thead>
                                                <tr>
                                                    <th>Upload Image <span class="txt-danger">*</span></th>
                                                    <th>Preview</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        
                                                <!-- First Row -->
                                                <tr>
                                                    <!-- Upload -->
                                                    <td>
                                                        <input type="file" name="gallery_images[]" class="form-control" 
                                                               accept="image/*" onchange="previewImage(this)">
                                                               <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                                                <br>
                                                                <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                            
                                                    </td>
                                        
                                                    <!-- Preview -->
                                                    <td>
                                                        <img src="" class="preview-img" 
                                                             style="width:80px; height:60px; display:none;">
                                                    </td>
                                        
                                                    <!-- Action -->
                                                    <td>
                                                        <button type="button" class="btn btn-success addRow">Add</button>
                                                    </td>
                                                </tr>
                                        
                                            </tbody>
                                        </table>
                                        
                                       
                                        <!-- Form Actions -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('admin.manage-csr-sustainability.index') }}" class="btn btn-danger px-4">Cancel</a>
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
            
            
            function previewsupportimage(event) {
                const input = event.target;
                const preview = document.getElementById('supportimagePreview');

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
            
            
            function previewcommunityimage(event) {
                const input = event.target;
                const preview = document.getElementById('communityimagePreview');

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
            
            
            function previewcommunityimage(event) {
                const input = event.target;
                const preview = document.getElementById('communityimagePreview');

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
       
       
        <!-- JS for UHTC  editor -->
        <script>
            ClassicEditor.create(document.querySelector('#uhtc_desc'), {
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
            

            ClassicEditor.create(document.querySelector('#support_desc'), {
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
            
            
            ClassicEditor.create(document.querySelector('#community_desc'), {
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
            
            
            ClassicEditor.create(document.querySelector('#donation_desc'), {
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
            

            ClassicEditor.create(document.querySelector('#inclusive_desc'), {
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
        
        
        <script>
            // Image Preview
            function previewImage(input) {
                let file = input.files[0];
                let preview = input.closest('tr').querySelector('.preview-img');
        
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    }
                    reader.readAsDataURL(file);
                }
            }
        
            // Add Row
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('addRow')) {
        
                    let tableBody = document.querySelector('#galleryTable tbody');
                    let newRow = document.createElement('tr');
        
                    newRow.innerHTML = `
                        <td>
                            <input type="file" name="gallery_images[]" class="form-control" 
                                   accept="image/*" onchange="previewImage(this)">
                                    <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                    <br>
                                    <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                            
                        </td>
                        <td>
                            <img src="" class="preview-img" 
                                 style="width:80px; height:60px; display:none;">
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger removeRow">Remove</button>
                        </td>
                    `;
        
                    tableBody.appendChild(newRow);
                }
            });
        
            // Remove Row
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('removeRow')) {
                    e.target.closest('tr').remove();
                }
            });
        </script>

</body>

</html>