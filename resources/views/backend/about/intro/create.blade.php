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
                  <h4>Add Introduction Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-about-intro.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Add Introduction</li>
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
                        <h4>Introduction Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                    <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('admin.manage-about-intro.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf


                                         <!-- Heading -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="heading">Heading </label>
                                            <input class="form-control" id="heading" type="text" name="heading" placeholder="Enter Heading">
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>


                                        <!-- Image -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label">Images <</label>

                                            <input class="form-control"
                                                id="image"
                                                type="file"
                                                name="image[]"
                                                multiple
                                                accept=".jpg,.jpeg,.png,.webp,.svg"
                                                onchange="previewImages(event)"
                                                >

                                            <div class="invalid-feedback">Please upload images.</div>

                                            <small class="text-secondary"><b>Note: Each file should be less than 2MB.</b></small><br>
                                            <small class="text-secondary"><b>Allowed: jpg, jpeg, png, webp, svg</b></small>

                                            <!-- Preview Area -->
                                            <div id="imagePreviewContainer" class="d-flex flex-wrap mt-3"></div>
                                        </div>


                                    

                                        <!-- Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="desc"> Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="editor" name="desc" placeholder="Enter Description" required></textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>


                                        <!--Note-->
                                        <div class="col-md-12 mt-5">
                                            <label class="form-label" for="note"> Note </label>
                                            <textarea class="form-control" id="note" name="note" placeholder="Enter Note"></textarea>
                                            <div class="invalid-feedback">Please enter an Note.</div>
                                        </div>


                                        <!-- Form Actions -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('admin.manage-about-intro.index') }}" class="btn btn-danger px-4">Cancel</a>
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
            let selectedFiles = [];

            function previewImages(event) {

                const files = Array.from(event.target.files);
                const container = document.getElementById('imagePreviewContainer');

                files.forEach(file => {

                    selectedFiles.push(file);

                    const reader = new FileReader();

                    reader.onload = function(e) {

                        const div = document.createElement('div');
                        div.className = 'preview-box';

                        div.innerHTML = `
                            <img src="${e.target.result}">
                            <span class="remove-btn">&times;</span>
                        `;

                        div.querySelector('.remove-btn').onclick = function () {
                            div.remove();
                            selectedFiles = selectedFiles.filter(f => f !== file);
                            updateInputFiles();
                        };

                        container.appendChild(div);
                    };

                    reader.readAsDataURL(file);
                });

                updateInputFiles();
            }

            function updateInputFiles() {
                const input = document.getElementById('image');
                const dataTransfer = new DataTransfer();

                selectedFiles.forEach(file => dataTransfer.items.add(file));

                input.files = dataTransfer.files;
            }
        </script>


        <!-- JS for editor -->
        <script>
            ClassicEditor.create(document.querySelector('#note'), {
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