<!doctype html>
<html lang="en">
<head>
    @include('components.backend.head')
</head>

<body>
    @include('components.backend.header')
    @include('components.backend.sidebar')

    <div class="page-body">
        <div class="container-fluid">

            <!-- Page Header -->
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h4>Add Awards Details</h4>
                    </div>
                    <div class="col-6 text-end">
                        <ol class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="{{ route('admin.awards-details.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Add Awards Details</li>
                        </ol>
                    </div>
                </div>
            </div>

           <form action="{{ route('admin.awards-details.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- SECTION 1: ACCREDITATIONS -->
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <strong>Section 1: Accreditations</strong>
                        </div>

                        <div class="card-body row g-4">
                            <div class="col-md-6">
                                <label class="form-label">Heading <span class="txt-danger">*</span></label>
                                <input type="text" name="accreditation_heading" class="form-control" placeholder="Enter Heading" required>
                            </div>

                            <!--<div class="col-md-6">-->
                            <!--    <label class="form-label">Images <span class="txt-danger">*</span></label>-->
                            <!--    <input type="file" name="accreditation_images[]" class="form-control image-input" multiple accept="image/*">-->
                            <!--     <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>-->
                            <!--    <br>-->
                            <!--    <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>-->
                                            
                            <!--    <div class="preview-box mt-2 d-flex gap-2 flex-wrap"></div>-->
                            <!--</div>-->
                            
                            
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <label class="form-label mb-0">Accreditations <span class="txt-danger">*</span></label>
                                    <button type="button" class="btn btn-sm btn-primary" id="add-accreditation-row">
                                        + Add More
                                    </button>
                                </div>
                            
                                <small class="text-secondary d-block mb-2">
                                    <b>Note: Image size should be less than 2MB. Allowed formats: .jpg, .jpeg, .png, .webp, .svg</b>
                                </small>
                            
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="accreditation-table">
                                        <thead>
                                            <tr>
                                                <th style="width:25%">Image</th>
                                                <th style="width:25%">Description</th>
                                                <th style="width:8%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- rows injected here -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        
                    </div>

                    <!-- SECTION 2: AWARDS -->
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <strong>Section 2: Awards & Accolades</strong>
                        </div>

                        <div class="card-body row g-4">
                            <div class="col-md-6">
                                <label class="form-label">Heading <span class="txt-danger">*</span></label>
                                <input type="text" name="award_heading" class="form-control" placeholder="Enter Heading" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Images <span class="txt-danger">*</span></label>
                                <input type="file" name="award_images[]" class="form-control image-input" multiple accept="image/*">
                                <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                <br>
                                <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                            
                                <div class="preview-box mt-2 d-flex gap-2 flex-wrap"></div>
                            </div>
                        </div>
                    </div>

                    <!-- SUBMIT -->
                    <div class="text-end">
                        <a href="{{ route('admin.awards-details.index') }}" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
           </form>

        </div>
    </div>

    @include('components.backend.footer')
    @include('components.backend.main-js')
    <script>
    document.addEventListener('change', function (e) {

        if (e.target.classList.contains('image-input')) {

            const previewBox = e.target.nextElementSibling;
            previewBox.innerHTML = '';

            Array.from(e.target.files).forEach((file) => {
                if (!file.type.startsWith('image/')) return;

                const reader = new FileReader();

                reader.onload = function (ev) {
                    const div = document.createElement('div');
                    div.style.position = 'relative';

                    div.innerHTML = `
                        <img src="${ev.target.result}"
                            style="width:90px;height:90px;object-fit:cover;border-radius:6px;">
                        <span class="remove-preview"
                            style="
                                position:absolute;
                                top:-6px;
                                right:-6px;
                                background:red;
                                color:white;
                                width:20px;
                                height:20px;
                                border-radius:50%;
                                font-size:14px;
                                cursor:pointer;
                                text-align:center;
                                line-height:20px;
                            ">×</span>
                    `;

                    previewBox.appendChild(div);
                };

                reader.readAsDataURL(file);
            });

            // Preview-only remove
            previewBox.addEventListener('click', function (ev) {
                if (ev.target.classList.contains('remove-preview')) {
                    ev.target.parentElement.remove();
                }
            });
        }
    });
    </script>
    
    
    <script>
        // ---- image preview for table rows ----
        $(document).on('change', '.image-input', function () {
            var input = this;
            var file  = input.files[0];
            var previewBox = $(input).closest('td').find('.preview-box');
            if (!previewBox.length) return;
        
            previewBox.html('');
            if (!file || !file.type.startsWith('image/')) return;
        
            var reader = new FileReader();
            reader.onload = function (ev) {
                previewBox.html(
                    '<img src="' + ev.target.result + '" style="width:100px;height:100px;object-fit:cover;border-radius:6px;">'
                );
            };
            reader.readAsDataURL(file);
        });
        
        // ---- accreditation repeater ----
        (function () {
            var rowIndex = 0;
        
            function rowTemplate(i) {
                return `
                <tr data-row="${i}">
                    <td>
                        <input type="file" name="rows[${i}][image]" class="form-control image-input" accept="image/*">
                        <div class="preview-box mt-2"></div>
                    </td>
                    <td>
                        <textarea name="rows[${i}][editor]" id="editor_${i}" class="form-control ck-editor-field"></textarea>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-danger remove-row">&times;</button>
                    </td>
                </tr>`;
            }
        
            function addRow() {
                var i = rowIndex++;
                $('#accreditation-table tbody').append(rowTemplate(i));
                initEditor('editor_' + i);
            }
        
            function initEditor(id) {
                if (window.CKEDITOR) { CKEDITOR.replace(id); return; }          // CKEditor 4
                if (window.ClassicEditor) {                                      // CKEditor 5
                    ClassicEditor.create(document.getElementById(id))
                        .then(function (editor) {
                            document.getElementById(id).ckeditorInstance = editor;
                        })
                        .catch(console.error);
                }
            }
        
            function destroyEditor(id) {
                if (window.CKEDITOR && CKEDITOR.instances[id]) {
                    CKEDITOR.instances[id].destroy(true);
                }
                var el = document.getElementById(id);
                if (el && el.ckeditorInstance) {
                    el.ckeditorInstance.destroy();
                }
            }
        
            $(document).on('click', '#add-accreditation-row', addRow);
        
            $(document).on('click', '.remove-row', function () {
                var row = $(this).closest('tr');
                var id = row.find('.ck-editor-field').attr('id');
                if (id) destroyEditor(id);
                row.remove();
            });
        
            // start with one row
            $(function () { addRow(); });
        })();
    </script>

    
</body>
</html>
