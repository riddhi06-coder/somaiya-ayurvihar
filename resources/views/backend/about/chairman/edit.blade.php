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
                  <h4>Edit Chairman's Message Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-chairman-message.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Chairman's Message</li>
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
                        <h4>Chairman's Message Form</h4>
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
                                        action="{{ route('admin.manage-chairman-message.update', $about->id) }}"
                                        method="POST"
                                        enctype="multipart/form-data">

                                        @csrf
                                        @method('PUT')

                                        <!-- Chairman Name -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label">Chairman Name <span class="text-danger">*</span></label>

                                            <input class="form-control"
                                                type="text"
                                                name="chairman_name"
                                                value="{{ old('chairman_name', $about->chairman_name) }}"
                                                required>
                                        </div>

                                        <!-- Designation -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label">Designation <span class="text-danger">*</span></label>

                                            <input class="form-control"
                                                type="text"
                                                name="chairman_designation"
                                                value="{{ old('chairman_designation', $about->chairman_designation) }}"
                                                required>
                                        </div>

                                        <!-- Chairman Image -->
                                        <div class="col-md-6 mt-5">

                                            <label class="form-label">Chairman Image</label>

                                            <input class="form-control"
                                                type="file"
                                                name="image"
                                                accept=".jpg,.jpeg,.png,.webp,.svg"
                                                onchange="previewImages(event)">

                                                <small class="text-secondary"><b>Note: Each file should be less than 2MB.</b></small><br>
                                                <small class="text-secondary"><b>Allowed: jpg, jpeg, png, webp, svg</b></small>

                                            @if($about->image)
                                                <img src="{{ asset('uploads/chairman/'.$about->image) }}"
                                                    width="120"
                                                    class="mt-2 border">
                                            @endif

                                            <div id="imagePreviewContainer" class="d-flex flex-wrap mt-3"></div>

                                        </div>

                                        <!-- Chairman Description -->
                                        <div class="form-group mt-4">
                                            <label>Chairman Description <span class="text-danger">*</span></label>

                                            <textarea name="chairman_description"
                                                    id="editor"
                                                    class="form-control"
                                                    rows="5"
                                                    required>{{ old('chairman_description', $about->chairman_description) }}</textarea>
                                        </div>

                                        <hr class="mt-5">

                                        <!-- About Image -->
                                        <div class="col-md-6 mt-5">

                                            <label class="form-label">About Image</label>

                                            <input class="form-control"
                                                type="file"
                                                name="desc_image"
                                                accept=".jpg,.jpeg,.png,.webp,.svg"
                                                onchange="previewDescImages(event)">

                                            <small class="text-secondary d-block mt-1">
                                                <b>Note: Each file should be less than 2MB.</b>
                                            </small>

                                            <small class="text-secondary d-block">
                                                <b>Allowed: jpg, jpeg, png, webp, svg</b>
                                            </small>

                                            @if($about->desc_image)
                                                <img src="{{ asset('uploads/chairman/'.$about->desc_image) }}"
                                                    width="120"
                                                    class="mt-2 border">
                                            @endif

                                            <!-- Preview Area -->
                                            <div id="descimagePreviewContainer" class="d-flex flex-wrap mt-3"></div>

                                        </div>


                                        <!-- About Description -->
                                        <div class="form-group mt-4">
                                            <label>About Description <span class="text-danger">*</span></label>

                                            <textarea name="about_description"
                                                    id="about_description"
                                                    class="form-control"
                                                    rows="5"
                                                    required>{{ old('about_description', $about->about_description) }}</textarea>
                                        </div>

                                        <hr class="mt-5">

                                        <!-- Motto -->
                                        <div class="form-group">
                                            <label>Our Motto <span class="text-danger">*</span></label>

                                            <textarea name="motto"
                                                    id="motto"
                                                    class="form-control"
                                                    rows="5"
                                                    required>{{ old('motto', $about->motto) }}</textarea>
                                        </div>

                                        <!-- Message -->
                                        <div class="form-group">
                                            <label>Our Message <span class="text-danger">*</span></label>

                                            <textarea name="message"
                                                    id="message"
                                                    class="form-control"
                                                    rows="5"
                                                    required>{{ old('message', $about->message) }}</textarea>
                                        </div>

                                        <!-- Buttons -->
                                        <div class="col-12 text-end mt-4">

                                            <a href="{{ route('admin.manage-chairman-message.index') }}"
                                            class="btn btn-danger px-4">Cancel</a>

                                            <button class="btn btn-primary" type="submit">
                                                Update
                                            </button>

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


        <!-- Image Preview-->
        <script>
            function previewImages(event) {

                const container = document.getElementById('imagePreviewContainer');
                container.innerHTML = '';

                const file = event.target.files[0];

                if (file) {

                    const reader = new FileReader();

                    reader.onload = function(e) {

                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.width = '120px';
                        img.style.height = '120px';
                        img.style.objectFit = 'cover';
                        img.classList.add('me-2', 'mb-2', 'border');

                        container.appendChild(img);
                    };

                    reader.readAsDataURL(file);
                }
            }
        </script>
        
        <!-- Desc Image Preview-->
        <script>
            function previewDescImages(event) {

                const container = document.getElementById('descimagePreviewContainer');
                container.innerHTML = '';

                const file = event.target.files[0];

                if (file) {

                    const reader = new FileReader();

                    reader.onload = function(e) {

                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.width = '120px';
                        img.style.height = '120px';
                        img.style.objectFit = 'cover';
                        img.classList.add('me-2', 'mb-2', 'border');

                        container.appendChild(img);
                    };

                    reader.readAsDataURL(file);
                }
            }
        </script>

        <!----- About Description Editor----->
        <script>
            ClassicEditor.create(document.querySelector('#about_description'), {
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


        <!----- Motto Editor----->
        <script>
            ClassicEditor.create(document.querySelector('#motto'), {
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


        <!----- Message Editor----->
        <script>
            ClassicEditor.create(document.querySelector('#message'), {
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