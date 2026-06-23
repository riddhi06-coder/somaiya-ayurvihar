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
                  <h4>Edit Insurance & TPA Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-insurance.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Insurance & TPA</li>
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
                        <h4>Insurance & TPA Form</h4>
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
                                          action="{{ route('admin.manage-insurance.update', $insurance->id) }}" 
                                          method="POST" 
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')


                                        <h4># Insurance & TPA Services</h4>


                                        <!-- Insurance & TPA Services -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="insurance_heading"> Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="insurance_heading" type="text" name="insurance_heading" value="{{ $insurance->insurance_heading }}" placeholder="Enter Heading" required>
                                            <div class="invalid-feedback">Please enter a  Heading.</div>
                                        </div>
                                        
                                        
                                        
                                        <!-- Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="room_rent_desc"> Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="editor" name="room_rent_desc" placeholder="Enter Description" required>{{ $insurance->room_rent_desc }}</textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>
                                        
                                        
                                        
                                                 
                                        <hr class="mt-5">

                                        <h4># Essential Points </h4>
                                        
                                        
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="essential_heading"> Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="essential_heading" type="text" name="essential_heading"  value="{{ $insurance->essential_heading }}" placeholder="Enter Heading" required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>
                                        
                                        
                                       <!--  Image -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="essential_image">  Image <span class="txt-danger">*</span> </label>
                                            <input class="form-control" id="essential_image" type="file" name="essential_image" onchange="previewdocimage(event)">
                                            <div class="invalid-feedback">Please upload a image.</div>
                                                <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                                <br>
                                                <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                            
                                            <!-- Image Preview -->
                                            <div class="mt-2">
                                                <img id="docimagePreview" src="#" alt="Preview" class="img-fluid rounded border d-none" style="max-height: 150px; background:black;">
                                            </div>
                                            
                                            @if($insurance->essential_image)
                                                <img src="{{ asset('uploads/insurance/'.$insurance->essential_image) }}" 
                                                     style="height:100px;">
                                            @endif
                                        </div>


                                        <!-- Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="essential_desc"> Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="essential_desc" name="essential_desc" placeholder="Enter Description" required>{{ $insurance->essential_desc }}</textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>
                                        
                                        

                                        <hr class="mt-5">

                                        <h4># Cashless Process</h4>
                                        


                                        
                                        <!-- Cashless Heading -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="cashless_heading"> Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="cashless_heading" type="text" name="cashless_heading" value="{{ $insurance->cashless_heading }}" placeholder="Enter Heading" required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>
                                        
                                        
                                        <!-- Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="cash_desc"> Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="cash_desc" name="cash_desc" placeholder="Enter Description" required>{{ $insurance->cash_desc }}</textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>
                                        
                                        
                            
                                        <div class="col-12">
                                            <table class="table table-bordered mt-5" id="pageHeadersTable">
                                                <thead>
                                                    <tr>
                                                        <th>Heading <span class="txt-danger">*</span></th>
                                                        <th>Description <span class="txt-danger">*</span></th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                        
                                                <tbody>
                                                    @foreach($cashlessDetails as $key => $row)
                                                    <tr>
                                                        <td>
                                                            <input type="text" 
                                                                   name="cashless_details[{{ $key }}][heading]" 
                                                                   value="{{ $row['heading'] }}" 
                                                                   class="form-control">
                                                        </td>
                                                    
                                                        <td>
                                                            <textarea 
                                                                name="cashless_details[{{ $key }}][time]" 
                                                                class="form-control ckeditor">
                                                                {{ $row['time'] }}
                                                            </textarea>
                                                        </td>
                                                    
                                                        <td>
                                                            @if($loop->first)
                                                                <button type="button" class="btn btn-success add-header">Add</button>
                                                            @else
                                                                <button type="button" class="btn btn-danger remove-header">Remove</button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

  
                                        <!-- Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="short_cash_desc"> Short Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="short_cash_desc" name="short_cash_desc" placeholder="Enter Short Description" required>{{ $insurance->short_cash_desc }}</textarea>
                                            <div class="invalid-feedback">Please enter an Short Description.</div>
                                        </div>
                                        

                                        
                                         <hr class="mt-5">

                                        <h4># Identify Your TPA</h4>
                                        

                                        <!-- Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="tpa_desc"> Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="tpa_desc" name="tpa_desc" placeholder="Enter Description" required>{{ $insurance->tpa_desc }}</textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>
                                        



                                        <hr class="mt-5">

                                        <h4># Reimbursement Process</h4>
                                        
                                        
                                       <!--  Image -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="reimburse_image">  Image <span class="txt-danger">*</span> </label>
                                            <input class="form-control" id="reimburse_image" type="file" name="reimburse_image" onchange="previewreimberseimage(event)" required>
                                            <div class="invalid-feedback">Please upload a image.</div>
                                                <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                                <br>
                                                <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                            
                                            <!-- Image Preview -->
                                            <div class="mt-2">
                                                <img id="reimburseimagePreview" src="#" alt="Preview" class="img-fluid rounded border d-none" style="max-height: 150px; background:black;">
                                            </div>
                                            
                                            
                                            @if($insurance->reimburse_image)
                                                <img src="{{ asset('uploads/insurance/'.$insurance->reimburse_image) }}" 
                                                     style="height:100px;">
                                            @endif
                                        </div>


                                        <!-- Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="reimburse_desc"> Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="reimburse_desc" name="reimburse_desc" placeholder="Enter Description" required>{{ $insurance->reimburse_desc }}</textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>
                                        

                                     
                                        <hr class="mt-5">

                                        <h4># Disclaimer </h4>
                                        

                                         <!-- Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="disclaimer_desc"> Disclaimer<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="disclaimer_desc" name="disclaimer_desc" placeholder="Enter Disclaimer" required>{{ $insurance->disclaimer_desc }}</textarea>
                                            <div class="invalid-feedback">Please enter an Disclaimer.</div>
                                        </div>
                                        
                        
                        

                                        
                                        <hr class="mt-5">

                                        <h4># FAQ's</h4>



                                        <!-- FAQ Heading -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="faq_heading">FAQ Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="faq_heading" type="text" name="faq_heading"  value="{{ $insurance->faq_heading }}" placeholder="Enter FAQ Heading" required>
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
                                            
                                            @if($insurance->faq_image)
                                                <img src="{{ asset('uploads/insurance/'.$insurance->faq_image) }}" 
                                                     style="height:100px;">
                                            @endif
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
                                                    @forelse($faqs ?? [] as $key => $faq)
                                                    <tr class="faq-row">
                                                        
                                                        <!-- Question -->
                                                        <td>
                                                            <input type="text" 
                                                                   name="faq[{{ $key }}][question]" 
                                                                   value="{{ $faq['question'] ?? '' }}" 
                                                                   class="form-control">
                                                        </td>
                                        
                                                        <!-- Answer -->
                                                        <td>
                                                            <textarea name="faq[{{ $key }}][answer]" 
                                                                      class="form-control faq-editor"
                                                                      rows="3">{{ $faq['answer'] ?? '' }}</textarea>
                                                        </td>
                                        
                                                        <!-- Action -->
                                                        <td>
                                                            <button type="button"
                                                                class="btn {{ $key == 0 ? 'btn-success add-faq' : 'btn-danger remove-faq' }}">
                                                                {{ $key == 0 ? 'Add More' : 'Remove' }}
                                                            </button>
                                                        </td>
                                        
                                                    </tr>
                                        
                                                    @empty
                                                    <!-- Default Row -->
                                                    <tr class="faq-row">
                                                        <td>
                                                            <input type="text" name="faq[0][question]" class="form-control">
                                                        </td>
                                                        <td>
                                                            <textarea name="faq[0][answer]" class="form-control faq-editor" rows="3"></textarea>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-success add-faq">Add More</button>
                                                        </td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>

   


                                        <!-- Form Actions -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('admin.manage-insurance.index') }}" class="btn btn-danger px-4">Cancel</a>
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
            function previewdocimage(event) {
                const input = event.target;
                const preview = document.getElementById('docimagePreview');

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
            
            
            function previewreimberseimage(event) {
                const input = event.target;
                const preview = document.getElementById('reimburseimagePreview');

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
        </script>

        <!----- Js for Cashless Table-------->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
            
                let headerIndex = 1;
            
                // Add row
                document.querySelector('#pageHeadersTable').addEventListener('click', function(e){
                    if(e.target && e.target.classList.contains('add-header')){
                        const tbody = this.querySelector('tbody');
            
                        const newRow = document.createElement('tr');
                        newRow.innerHTML = `
                           
                            <td>
                                <input type="text" name="cashless_details[${headerIndex}][heading]" 
                                       class="form-control" placeholder="Enter Heading">
                            </td>
            
                            <td>
                                <textarea name="cashless_details[${headerIndex}][time]" 
                                          class="form-control" placeholder="Enter Description"></textarea>
                            </td>
            
                            <td>
                                <button type="button" class="btn btn-danger remove-header">Remove</button>
                            </td>
                        `;
            
                        tbody.appendChild(newRow);
                        headerIndex++;
                    }
                });
            
                // Remove row
                document.querySelector('#pageHeadersTable').addEventListener('click', function(e){
                    if(e.target && e.target.classList.contains('remove-header')){
                        e.target.closest('tr').remove();
                    }
                });
            
                // Image Preview
                document.querySelector('#pageHeadersTable').addEventListener('change', function(e){
                    if(e.target && e.target.classList.contains('header-image')){
                        const file = e.target.files[0];
                        const preview = e.target.closest('td').querySelector('.img-preview');
            
                        if(file){
                            const reader = new FileReader();
                            reader.onload = function(ev){
                                preview.src = ev.target.result;
                                preview.classList.remove('d-none');
                            }
                            reader.readAsDataURL(file);
                        }
                    }
                });
            
            });
        </script>


        <!-- JS for cashless editor -->
        <script>
            ClassicEditor.create(document.querySelector('#cash_desc'), {
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
        

        <!-- JS for Identify TPA editor -->
        <script>
            function initEditors() {

                document.querySelectorAll('#tpa_desc').forEach(textarea => {

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
        
        
        <!-- JS for Reimbursement editor -->
        <script>
            ClassicEditor.create(document.querySelector('#reimburse_desc'), {
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
        
        
        <!-- JS for Desclarartion editor -->
        <script>
            ClassicEditor.create(document.querySelector('#disclaimer_desc'), {
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


        <!-- JS for Essesntial editor -->
        <script>
            ClassicEditor.create(document.querySelector('#essential_desc'), {
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