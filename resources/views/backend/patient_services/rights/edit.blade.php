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
                  <h4>Edit Rights & Responsibilities Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-rights-responsibility.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Rights & Responsibilities</li>
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
                        <h4>Rights & Responsibilities Form</h4>
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
                                          action="{{ route('admin.manage-rights-responsibility.update', $patient_services->id) }}"
                                          method="POST"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <!-- Introduction-->
                                        
                                        <div class="col-md-12 mt-5">
                                            <label class="form-label" for="introduction">Introduction<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="editor" name="introduction" placeholder="Enter Introduction" required>{{ old('introduction', $patient_services->introduction) }}</textarea>
                                            <div class="invalid-feedback">Please enter an Introduction.</div>
                                        </div>



                                        <!-- Patient Description-->
                                        <div class="col-md-12 mt-5">
                                            <label class="form-label" for="about">Patient Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="patient_desc" name="patient_desc" placeholder="Enter Patient Description" required>{{ old('patient_desc', $patient_services->patient_desc) }}</textarea>
                                            <div class="invalid-feedback">Please enter an Patient Description.</div>
                                        </div>


                                         <!-- Patient Rights-->
                                        <div class="col-md-12 mt-5">
                                            <label class="form-label" for="patient_rights_desc">Patient Rights<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="patient_rights_desc" name="patient_rights_desc" placeholder="Enter Patient Rights" required>{{ old('patient_rights_desc', $patient_services->patient_rights_desc) }}</textarea>
                                            <div class="invalid-feedback">Please enter an Patient Rights.</div>
                                        </div>


                                        <hr class="mt-5">

                                        <h4># FAQ's</h4>



                                         <!-- FAQ Heading -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="faq_heading">FAQ Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="faq_heading" type="text" name="faq_heading" placeholder="Enter FAQ Heading" value="{{ old('faq_heading', $patient_services->faq_heading) }}" required>
                                            <div class="invalid-feedback">Please enter a FAQ Heading.</div>
                                        </div>


                                        <!-- FAQ Image -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="faq_image">
                                                FAQ Image
                                                @if(empty($patient_services->faq_image))
                                                    <span class="txt-danger">*</span>
                                                @endif
                                            </label>

                                            <input
                                                class="form-control"
                                                id="faq_image"
                                                type="file"
                                                name="faq_image"
                                                onchange="previewFaqImage(event)"
                                                {{ empty($patient_services->faq_image) ? 'required' : '' }}
                                            >

                                            <div class="invalid-feedback">Please upload a FAQ image.</div>

                                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small><br>
                                            <small class="text-secondary">
                                                <b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b>
                                            </small>

                                            <!-- Image Preview -->
                                            <div class="mt-2">
                                                @if(!empty($patient_services->faq_image))
                                                    <!-- EXISTING IMAGE -->
                                                    <img
                                                        id="faqimagePreview"
                                                        src="{{ asset('uploads/faq/'.$patient_services->faq_image) }}"
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
                                                    @forelse($patient_services->faq ?? [] as $index => $faq)
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



                                        <!-- Form Actions -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('admin.manage-rights-responsibility.index') }}" class="btn btn-danger px-4">Cancel</a>
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



        <!-- JS for editor -->
        <script>
            ClassicEditor.create(document.querySelector('#patient_desc'), {
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


        <!-- JS for editor -->
        <script>
            ClassicEditor.create(document.querySelector('#patient_rights_desc'), {
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


        <!-- JS for dynamic faq table -->
        <script>
            // CKEditor config
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
        
            // 🔥 Reindex function (MAIN FIX)
            function reindexFaq() {
                $('#faqTable tbody tr').each(function(index) {
                    $(this).find('input, textarea').each(function() {
                        let name = $(this).attr('name');
                        if (name) {
                            name = name.replace(/faq\[\d+\]/, 'faq[' + index + ']');
                            $(this).attr('name', name);
                        }
                    });
                });
            }
        
            $(document).ready(function() {
        
                // Init existing editors
                document.querySelectorAll('.faq-editor').forEach(el => {
                    if (!el.classList.contains('editor-loaded')) {
                        ClassicEditor.create(el, editorConfig);
                        el.classList.add('editor-loaded');
                    }
                });
        
                // ➕ Add FAQ
                $('#faqTable').on('click', '.add-faq', function() {
        
                    let index = $('#faqTable tbody tr').length;
        
                    const newRow = `
                    <tr class="faq-row">
                        <td>
                            <input type="text" name="faq[${index}][question]" class="form-control" placeholder="Enter Question">
                        </td>
                        <td>
                            <textarea name="faq[${index}][answer]" class="form-control faq-editor" rows="3"></textarea>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger remove-faq">Remove</button>
                        </td>
                    </tr>`;
        
                    $('#faqTable tbody').append(newRow);
        
                    // Init CKEditor for new textarea ONLY
                    let newTextarea = $('#faqTable tbody tr:last .faq-editor')[0];
                    ClassicEditor.create(newTextarea, editorConfig);
        
                    reindexFaq(); // 🔥 IMPORTANT
                });
        
                // ❌ Remove FAQ
                $('#faqTable').on('click', '.remove-faq', function() {
                    $(this).closest('tr').remove();
                    reindexFaq(); // 🔥 IMPORTANT
                });
        
                // 🔥 FINAL FIX: Before submit
                $('form').on('submit', function() {
                    reindexFaq();
                });
        
            });
        </script>



</body>

</html>