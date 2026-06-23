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
                  <h4>Add Billing Process Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-billing-process.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Add Billing Process</li>
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
                        <h4>Billing Process Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                    <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('admin.manage-billing-process.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf


                                        <h4># Visitors Policy</h4>


                                        <!-- Visitors Heading -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="visitor_heading">Visitors Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="visitor_heading" type="text" name="visitor_heading" placeholder="Enter Visitors Heading" required>
                                            <div class="invalid-feedback">Please enter a Visitors Heading.</div>
                                        </div>



                                        <!-- Visitors Table -->
                                        <div class="col-12">
                                            <table class="table table-bordered mt-5" id="pageHeadersTable">
                                                <thead>
                                                    <tr>
                                                        <th>Image <span class="txt-danger">*</span></th>
                                                        <th>Heading <span class="txt-danger">*</span></th>
                                                        <th>Time <span class="txt-danger">*</span></th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                        
                                                <tbody>
                                                    <tr>
                                                        <!-- Image -->
                                                        <td>
                                                            <input type="file" name="visitor_details[0][image]" 
                                                                   class="form-control header-image" accept="image/*">
                                                                    <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                                                    <br>
                                                                    <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                            
                                        
                                                            <img class="img-preview mt-2 d-none"
                                                                 style="max-height:80px; background:#fff; padding:5px; border:1px solid #ddd;" />
                                                        </td>
                                        
                                                        <!-- Heading -->
                                                        <td>
                                                            <input type="text" name="visitor_details[0][heading]" 
                                                                   class="form-control" placeholder="Enter Heading">
                                                        </td>
                                        
                                                        <!-- Time -->
                                                        <td>
                                                            <textarea name="visitor_details[0][time]" 
                                                                      class="form-control" placeholder="Enter Time"></textarea>
                                                        </td>
                                        
                                                        <!-- Action -->
                                                        <td>
                                                            <button type="button" class="btn btn-success add-header">Add</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>



                                        <hr class="mt-5">

                                        <h4># Room Types</h4>
                                        
                                        
                                        <!-- Room Heading -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="room_heading"> Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="room_heading" type="text" name="room_heading" placeholder="Enter Heading" required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>
                                        
                                        
                                        <div class="col-12">
                                            <table class="table table-bordered mt-5" id="roomTypeTable">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Heading</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                        
                                                <tbody>
                                                    <tr>
                                                        <!-- Image -->
                                                        <td>
                                                            <input type="file" name="room_types[0][image]" 
                                                                   class="form-control room-image" accept="image/*">
                                                                    <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                                                    <br>
                                                                    <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                            
                                        
                                                            <img class="room-preview mt-2 d-none"
                                                                 style="max-height:80px; background:#fff; padding:5px; border:1px solid #ddd;" />
                                                        </td>
                                        
                                                        <!-- Heading -->
                                                        <td>
                                                            <input type="text" name="room_types[0][heading]" 
                                                                   class="form-control" placeholder="Enter Room Type">
                                                        </td>
                                        
                                                        <!-- Action -->
                                                        <td>
                                                            <button type="button" class="btn btn-success add-room">Add</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>


                                        <hr class="mt-5">

                                        <h4># Room Rent Charging Policy</h4>


                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="room_rent_heading"> Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="room_rent_heading" type="text" name="room_rent_heading" placeholder="Enter Heading" required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>


                                        <!-- Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="room_rent_desc"> Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="editor" name="room_rent_desc" placeholder="Enter Description" required></textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>
                                        
                                        
                                        
                                        <hr class="mt-5">

                                        <h4># General Information </h4>


                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="general_info_heading"> Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="general_info_heading" type="text" name="general_info_heading" placeholder="Enter Heading" required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>


                                        <!-- Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="general_info_desc"> Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="general_info_desc" name="general_info_desc" placeholder="Enter Description" required></textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>
                                        
                                        

                                        <hr class="mt-5">

                                        <h4># Document Submission Timelines</h4>


                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="doc_sub_heading"> Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="doc_sub_heading" type="text" name="doc_sub_heading" placeholder="Enter Heading" required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>


                                        <div class="col-12">
                                            <h5 class="mt-4">Document Submission Timelines</h5>
                                        
                                            <table class="table table-bordered mt-3" id="documentTimelineTable">
                                                <thead>
                                                    <tr>
                                                        <th>Image <span class="txt-danger">*</span></th>
                                                        <th>Heading <span class="txt-danger">*</span></th>
                                                        <th>Time <span class="txt-danger">*</span></th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                        
                                                <tbody>
                                                    <tr>
                                                        <!-- Image -->
                                                        <td>
                                                            <input type="file" name="document_timelines[0][image]" 
                                                                   class="form-control doc-image" accept="image/*">
                                        
                                                            <small class="text-secondary"><b>Note: Max size 2MB.</b></small><br>
                                                            <small class="text-secondary"><b>Allowed: jpg, jpeg, png, webp, svg</b></small>
                                        
                                                            <img class="doc-preview mt-2 d-none"
                                                                 style="max-height:80px; background:#fff; padding:5px; border:1px solid #ddd;" />
                                                        </td>
                                        
                                                        <!-- Heading -->
                                                        <td>
                                                            <input type="text" name="document_timelines[0][heading]" 
                                                                   class="form-control" placeholder="Enter Heading">
                                                        </td>
                                        
                                                        <!-- Time -->
                                                        <td>
                                                            <textarea name="document_timelines[0][time]" 
                                                                      class="form-control" placeholder="Enter Time"></textarea>
                                                        </td>
                                        
                                                        <!-- Action -->
                                                        <td>
                                                            <button type="button" class="btn btn-success add-doc">Add</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        
                                        <hr class="mt-5">

                                        <h4># Documents to be Submitted </h4>
                                        
                                        
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="doc_submitted_heading"> Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="doc_submitted_heading" type="text" name="doc_submitted_heading" placeholder="Enter Heading" required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>
                                        
                                        
                                       <!--  Image -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="doc_image">  Image <span class="txt-danger">*</span> </label>
                                            <input class="form-control" id="doc_image" type="file" name="doc_image" onchange="previewdocimage(event)" required>
                                            <div class="invalid-feedback">Please upload a image.</div>
                                                <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                                <br>
                                                <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                            
                                            <!-- Image Preview -->
                                            <div class="mt-2">
                                                <img id="docimagePreview" src="#" alt="Preview" class="img-fluid rounded border d-none" style="max-height: 150px; background:black;">
                                            </div>
                                        </div>


                                        <!-- Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="doc_submitted_desc"> Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="doc_submitted_desc" name="doc_submitted_desc" placeholder="Enter Description" required></textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>
                                        
                                        
                                        <hr class="mt-5">

                                        <h4># Details </h4>
                                        
                                        
                                         <!-- Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="sd_desc"> Security Deposit Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="sd_desc" name="sd_desc" placeholder="Enter Description" required></textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>
                                        
                                        
                                         <!-- Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="declaration_desc"> Declarations Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="declaration_desc" name="declaration_desc" placeholder="Enter Description" required></textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>
                                        
                        


                                        <!-- Form Actions -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('admin.manage-billing-process.index') }}" class="btn btn-danger px-4">Cancel</a>
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
        </script>
        
        
        <!-- JS for dynamic Room Types and preview -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {

                let roomIndex = 1;
            
                // Add row
                document.querySelector('#roomTypeTable').addEventListener('click', function(e){
                    if(e.target && e.target.classList.contains('add-room')){
                        const tbody = this.querySelector('tbody');
            
                        const newRow = document.createElement('tr');
                        newRow.innerHTML = `
                            <td>
                                <input type="file" name="room_types[${roomIndex}][image]" 
                                       class="form-control room-image" accept="image/*">
                                        <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                        <br>
                                        <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                                        
            
                                <img class="room-preview mt-2 d-none"
                                     style="max-height:80px; background:#fff; padding:5px; border:1px solid #ddd;" />
                            </td>
            
                            <td>
                                <input type="text" name="room_types[${roomIndex}][heading]" 
                                       class="form-control" placeholder="Enter Room Type">
                            </td>
            
                            <td>
                                <button type="button" class="btn btn-danger remove-room">Remove</button>
                            </td>
                        `;
            
                        tbody.appendChild(newRow);
                        roomIndex++;
                    }
                });
            
                // Remove row
                document.querySelector('#roomTypeTable').addEventListener('click', function(e){
                    if(e.target && e.target.classList.contains('remove-room')){
                        e.target.closest('tr').remove();
                    }
                });
            
                // Image preview
                document.querySelector('#roomTypeTable').addEventListener('change', function(e){
                    if(e.target && e.target.classList.contains('room-image')){
                        const file = e.target.files[0];
                        const preview = e.target.closest('td').querySelector('.room-preview');
            
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


        <!----- Js for page headers-------->
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
                                <input type="file" name="visitor_details[${headerIndex}][image]" 
                                       class="form-control header-image" accept="image/*">
                                        <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                        <br>
                                        <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                            
            
                                <img class="img-preview mt-2 d-none"
                                     style="max-height:80px; background:#fff; padding:5px; border:1px solid #ddd;" />
                            </td>
            
                            <td>
                                <input type="text" name="visitor_details[${headerIndex}][heading]" 
                                       class="form-control" placeholder="Enter Heading">
                            </td>
            
                            <td>
                                <textarea name="visitor_details[${headerIndex}][time]" 
                                          class="form-control" placeholder="Enter Time"></textarea>
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


        <!-- JS for general info editor -->
        <script>
            ClassicEditor.create(document.querySelector('#general_info_desc'), {
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
        
        
        <!----- Js for Document Submission Timelines-------->
        <script>
            document.addEventListener('DOMContentLoaded', function () {

                let docIndex = 1;
            
                // Add row
                document.querySelector('#documentTimelineTable').addEventListener('click', function(e){
                    if(e.target && e.target.classList.contains('add-doc')){
                        const tbody = this.querySelector('tbody');
            
                        const newRow = document.createElement('tr');
                        newRow.innerHTML = `
                            <td>
                                <input type="file" name="document_timelines[${docIndex}][image]" 
                                       class="form-control doc-image" accept="image/*">
                                       <small class="text-secondary"><b>Note: Max size 2MB.</b></small><br>
                                       <small class="text-secondary"><b>Allowed: jpg, jpeg, png, webp, svg</b></small>
            
                                <img class="doc-preview mt-2 d-none"
                                     style="max-height:80px; background:#fff; padding:5px; border:1px solid #ddd;" />
                            </td>
            
                            <td>
                                <input type="text" name="document_timelines[${docIndex}][heading]" 
                                       class="form-control" placeholder="Enter Heading">
                            </td>
            
                            <td>
                                <textarea name="document_timelines[${docIndex}][time]" 
                                          class="form-control" placeholder="Enter Time"></textarea>
                            </td>
            
                            <td>
                                <button type="button" class="btn btn-danger remove-doc">Remove</button>
                            </td>
                        `;
            
                        tbody.appendChild(newRow);
                        docIndex++;
                    }
                });
            
                // Remove row
                document.querySelector('#documentTimelineTable').addEventListener('click', function(e){
                    if(e.target && e.target.classList.contains('remove-doc')){
                        e.target.closest('tr').remove();
                    }
                });
            
                // Image preview
                document.querySelector('#documentTimelineTable').addEventListener('change', function(e){
                    if(e.target && e.target.classList.contains('doc-image')){
                        const file = e.target.files[0];
                        const preview = e.target.closest('td').querySelector('.doc-preview');
            
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


        <!-- JS for Documents to be Submitted editor -->
        <script>
            function initEditors() {

                document.querySelectorAll('#doc_submitted_desc').forEach(textarea => {

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
        
        
        <!-- JS for Security Deposit editor -->
        <script>
            ClassicEditor.create(document.querySelector('#sd_desc'), {
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
        
        
        <!-- JS for general info editor -->
        <script>
            ClassicEditor.create(document.querySelector('#declaration_desc'), {
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