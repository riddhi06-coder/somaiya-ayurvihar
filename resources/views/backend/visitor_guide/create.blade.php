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
                  <h4>Add Visitor Guide Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-visitor-guide.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Add Visitor Guide</li>
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
                        <h4>Visitor Guide Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                    <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('admin.manage-visitor-guide.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
            
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="visitor_guide__heading"> Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="visitor_guide__heading" type="text" name="visitor_guide__heading" placeholder="Enter Heading" required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>

                                        <!-- Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="visitor_intro_desc"> Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="editor" name="visitor_intro_desc" placeholder="Enter Description" required></textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>
                                        
                                                 
                                        <hr class="mt-5">

                                        <h4># Visiting Hours Details </h4>
                                        
                                        
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="visiting_hour_heading"> Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="visiting_hour_heading" type="text" name="visiting_hour_heading" placeholder="Enter Heading" required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>
                                        

                                        <!-- Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="visiting_hour_desc"> Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="visiting_hour_desc" name="visiting_hour_desc" placeholder="Enter Description" required></textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>
                                        
                                        
                                        
                                        <div class="table-responsive mt-5">
                                            <table class="table table-bordered" id="cafeteriaTable">
                                                <thead>
                                                    <tr>
                                                        <th width="20%">Title <span class="txt-danger">*</span></th>
                                                        <th width="40%">Details <span class="txt-danger">*</span></th>
                                                        <th width="20%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="title[]" class="form-control"
                                                                placeholder="Enter Title">
                                                        </td>
                                        
                                                        <td>
                                                            <textarea name="details[]" class="form-control"
                                                                rows="2" placeholder="Enter Details"></textarea>
                                                        </td>
                                        
                                                        <td class="text-center align-middle">
                                                            <button type="button" class="btn btn-success addRow">
                                                                Add More
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        
                                         <!-- Description-->
                                        <div class="col-md-12 mt-5">
                                            <label class="form-label" for="visiting_desc"> Short Description <span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="visiting_desc" name="visiting_desc" placeholder="Enter Description" required></textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>

                                        <hr class="mt-5">

                                        <h4># Visitor & Attendant Pass Policy Details</h4>
                                        
                                        
                                        <!-- Visitor & Attendant Pass Policy Heading -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="visitor_pass_heading"> Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="visitor_pass_heading" type="text" name="visitor_pass_heading" placeholder="Enter Heading" required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>
                                        
                                        
                                        <!-- Visitor & Attendant Pass Policy Image -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="visitor_pass_image"> Image <span class="txt-danger">*</span> </label>
                                            <input class="form-control" id="visitor_pass_image" type="file" name="visitor_pass_image" onchange="previewvisitorpassimage(event)" required>
                                            <div class="invalid-feedback">Please upload a image.</div>
                                                <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                                <br>
                                                <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                            
                                            <!-- Image Preview -->
                                            <div class="mt-2">
                                                <img id="visitorpassimagePreview" src="#" alt="Preview" class="img-fluid rounded border d-none" style="max-height: 150px; background:black;">
                                            </div>
                                        </div>
                                        
                                        
                                        <!-- Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="visitor_pass_desc"> Description <span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="visitor_pass_desc" name="visitor_pass_desc" placeholder="Enter Description" required></textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>




                                        
                                         <hr class="mt-5">

                                        <h4># Guidelines for Visitors</h4>
                                        
                                        
                                        <!-- Guidelines for Visitors Heading -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="guideline_heading"> Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="guideline_heading" type="text" name="guideline_heading" placeholder="Enter Heading" required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>

                                        <!-- Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="guideline_desc"> Description 1<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="guideline_desc" name="guideline_desc" placeholder="Enter Description" required></textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>
                                        
                                        
                                        <!-- Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="guideline_description"> Description 2<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="guideline_description" name="guideline_description" placeholder="Enter Description" required></textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>
                                        
  

                                        <hr class="mt-5">

                                        <h4># FAQ's</h4>



                                        <!-- FAQ Heading -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="faq_heading">FAQ Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="faq_heading" type="text" name="faq_heading" placeholder="Enter FAQ Heading" required>
                                            <div class="invalid-feedback">Please enter a FAQ Heading.</div>
                                        </div>


                                        <!-- FAQ Image -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="faq_image"> FAQ Image <span class="txt-danger">*</span> </label>
                                            <input class="form-control" id="faq_image" type="file" name="faq_image" onchange="previewfaqimage(event)" required>
                                            <div class="invalid-feedback">Please upload a FAQ image.</div>
                                                <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                                <br>
                                                <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                            
                                            <!-- Image Preview -->
                                            <div class="mt-2">
                                                <img id="faqimagePreview" src="#" alt="Preview" class="img-fluid rounded border d-none" style="max-height: 150px; background:black;">
                                            </div>
                                        </div>


                
                                        <!-- FAQ Table -->
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
                                                    <tr class="faq-row">
                                                        <td>
                                                            <input type="text" name="faq[0][question]" class="form-control" placeholder="Enter Question">
                                                        </td>
                                                        <td>
                                                            <textarea name="faq[0][answer]"
                                                                class="form-control faq-editor"
                                                                placeholder="Enter Answer"
                                                                rows="3"></textarea>

                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-success add-faq">Add More</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

   


                                        <!-- Form Actions -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('admin.manage-visitor-guide.index') }}" class="btn btn-danger px-4">Cancel</a>
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


        <!--Visitor Policy details---->
        <script>
        
            $(document).on('change', '.icon-input', function () {
    
                let input = this;
            
                if (input.files && input.files[0]) {
            
                    let reader = new FileReader();
            
                    reader.onload = function (e) {
            
                        let previewBox = $(input).closest('td').find('.preview-box');
                        let previewImg = previewBox.find('.img-preview');
            
                        previewImg.attr('src', e.target.result);
            
                        previewBox.css('display', 'flex'); // Show black box only after image upload
                    };
            
                    reader.readAsDataURL(input.files[0]);
                }
            });

            $(document).ready(function () {
        
            // Add New Row
            $(document).on('click', '.addRow', function () {
        
                let newRow = `
                <tr>
                    <td>
                        <input type="text" name="title[]" class="form-control"
                            placeholder="Enter Title">
                    </td>
        
                    <td>
                        <textarea name="details[]" class="form-control"
                            rows="2" placeholder="Enter Details"></textarea>
                    </td>
        
                    <td class="text-center align-middle">
                        <button type="button" class="btn btn-danger removeRow">
                            Remove
                        </button>
                    </td>
                </tr>`;
        
                $('#cafeteriaTable tbody').append(newRow);
            });
        
            // Remove Row
            $(document).on('click', '.removeRow', function () {
                $(this).closest('tr').remove();
            });
        
            // Image Preview
            $(document).on('change', '.icon-input', function () {
        
                let input = this;
        
                if (input.files && input.files[0]) {
        
                    let reader = new FileReader();
        
                    reader.onload = function (e) {
                        $(input)
                            .closest('td')
                            .find('.img-preview')
                            .attr('src', e.target.result)
                            .show();
                    }
        
                    reader.readAsDataURL(input.files[0]);
                }
            });
        
        });
        </script>
        

        <script>
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
            
            function previewvisitorpassimage(event) {
                const input = event.target;
                const preview = document.getElementById('visitorpassimagePreview');

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


        <!-- JS for Guideline editor -->
        <script>
            function initEditors() {
            
                document.querySelectorAll('#guideline_desc, #guideline_description')
                    .forEach(textarea => {
            
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
                            }
            
                        })
                        .then(editor => {
                            textarea.classList.add('ck-loaded');
                        })
                        .catch(error => console.error(error));
            
                    });
            }
            
            document.addEventListener('DOMContentLoaded', function () {
                initEditors();
            });
        </script>
        


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
        
        
        <!-- JS for Reimbursement editor -->
        <script>
            ClassicEditor.create(document.querySelector('#visiting_hour_desc'), {
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
            ClassicEditor.create(document.querySelector('#visitor_pass_desc'), {
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