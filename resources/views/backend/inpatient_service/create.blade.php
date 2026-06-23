<!doctype html>
<html lang="en">

<head>
    @include('components.backend.head')
    
    <style>
    
        .image-preview {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-top: 8px;
            align-content: flex-start;
        }
        .preview-thumb {
            position: relative;
            width: 56px;
            height: 56px;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            overflow: hidden;
            background: #f8f9fa;
            flex: 0 0 auto;
        }
        .preview-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
        .preview-thumb .remove-image {
            position: absolute;
            top: 1px;
            right: 1px;
            width: 16px;
            height: 16px;
            line-height: 14px;
            text-align: center;
            font-size: 12px;
            font-weight: 700;
            color: #fff;
            background: rgba(220, 53, 69, 0.9);
            border-radius: 50%;
            cursor: pointer;
            user-select: none;
        }
        .preview-thumb .remove-image:hover { background: #dc3545; }

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
                    <h4>Add Inpatient Service Form</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.manage-inpatient-service.index') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Add Inpatient Service</li>
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
                        <h4>Inpatient Service Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="row g-3 custom-input" novalidate
                              action="{{ route('admin.manage-inpatient-service.store') }}"
                              method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- ============================================= --}}
                            {{-- # Intro (Image + Description) --}}
                            {{-- ============================================= --}}
                            <div class="col-md-6 mt-4">
                                <label class="form-label" for="intro_image">Image <span class="txt-danger">*</span></label>
                                <input class="form-control image-input" id="intro_image" type="file" name="intro_image"
                                       data-preview="introImagePreview" accept=".jpg,.jpeg,.png,.webp,.svg" required>
                                <div class="invalid-feedback">Please upload an image.</div>
                                <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small><br>
                                <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                <div class="mt-2">
                                    <img id="introImagePreview" src="#" alt="Preview"
                                         class="img-fluid rounded border d-none" style="max-height: 150px; background:black;">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label" for="intro_desc">Description <span class="txt-danger">*</span></label>
                                <textarea class="form-control ck-classic" id="intro_desc" name="intro_desc"
                                          placeholder="Enter Description">{{ old('intro_desc') }}</textarea>
                            </div>

                            <hr class="mt-5">

                            {{-- ============================================= --}}
                            {{-- # Admission Process --}}
                            {{-- ============================================= --}}
                            <h4># Admission Process</h4>

                            <div class="col-md-6 mt-4">
                                <label class="form-label" for="admission_heading">Heading <span class="txt-danger">*</span></label>
                                <input class="form-control" id="admission_heading" type="text" name="admission_heading"
                                       placeholder="Enter Heading" value="{{ old('admission_heading') }}" required>
                                <div class="invalid-feedback">Please enter a Heading.</div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label" for="admission_desc">Description <span class="txt-danger">*</span></label>
                                <textarea class="form-control ck-classic" id="admission_desc" name="admission_desc"
                                          placeholder="Enter Description">{{ old('admission_desc') }}</textarea>
                            </div>

                            <hr class="mt-5">

                            {{-- ============================================= --}}
                            {{-- # Documents Required for Admission --}}
                            {{-- ============================================= --}}
                            <h4># Documents Required for Admission</h4>

                            <div class="col-md-6 mt-4">
                                <label class="form-label" for="documents_heading">Heading <span class="txt-danger">*</span></label>
                                <input class="form-control" id="documents_heading" type="text" name="documents_heading"
                                       placeholder="Enter Heading" value="{{ old('documents_heading') }}" required>
                                <div class="invalid-feedback">Please enter a Heading.</div>
                            </div>

                            <div class="col-md-6 mt-4">
                                <label class="form-label" for="documents_image">Image <span class="txt-danger">*</span></label>
                                <input class="form-control image-input" id="documents_image" type="file" name="documents_image"
                                       data-preview="documentsImagePreview" accept=".jpg,.jpeg,.png,.webp,.svg" required>
                                <div class="invalid-feedback">Please upload an image.</div>
                                <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small><br>
                                <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                <div class="mt-2">
                                    <img id="documentsImagePreview" src="#" alt="Preview"
                                         class="img-fluid rounded border d-none" style="max-height: 150px; background:black;">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label" for="documents_desc">Description <span class="txt-danger">*</span></label>
                                <textarea class="form-control ck-classic" id="documents_desc" name="documents_desc"
                                          placeholder="Enter Description">{{ old('documents_desc') }}</textarea>
                            </div>

                            <hr class="mt-5">

                            {{-- ============================================= --}}
                            {{-- # Discharge Process --}}
                            {{-- ============================================= --}}
                            <h4># Discharge Process</h4>

                            <div class="col-md-6 mt-4">
                                <label class="form-label" for="discharge_heading">Heading <span class="txt-danger">*</span></label>
                                <input class="form-control" id="discharge_heading" type="text" name="discharge_heading"
                                       placeholder="Enter Heading" value="{{ old('discharge_heading') }}" required>
                                <div class="invalid-feedback">Please enter a Heading.</div>
                            </div>

                            <div class="col-md-6 mt-4">
                                <label class="form-label" for="discharge_image">Image <span class="txt-danger">*</span></label>
                                <input class="form-control image-input" id="discharge_image" type="file" name="discharge_image"
                                       data-preview="dischargeImagePreview" accept=".jpg,.jpeg,.png,.webp,.svg" required>
                                <div class="invalid-feedback">Please upload an image.</div>
                                <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small><br>
                                <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                <div class="mt-2">
                                    <img id="dischargeImagePreview" src="#" alt="Preview"
                                         class="img-fluid rounded border d-none" style="max-height: 150px; background:black;">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label" for="discharge_desc">Description <span class="txt-danger">*</span></label>
                                <textarea class="form-control ck-classic" id="discharge_desc" name="discharge_desc"
                                          placeholder="Enter Description">{{ old('discharge_desc') }}</textarea>
                            </div>

                            <hr class="mt-5">

                            {{-- ============================================= --}}
                            {{-- # Rooms & Tariff Plan Details (heading + title + repeater) --}}
                            {{-- ============================================= --}}
                            <h4># Rooms & Tariff Plan Details</h4>

                            <div class="col-md-6 mt-4">
                                <label class="form-label" for="room_tariff_heading">Heading <span class="txt-danger">*</span></label>
                                <input class="form-control" id="room_tariff_heading" type="text" name="room_tariff_heading"
                                       placeholder="Enter Heading" value="{{ old('room_tariff_heading') }}" required>
                                <div class="invalid-feedback">Please enter a Heading.</div>
                            </div>

                            <div class="col-md-6 mt-4">
                                <label class="form-label" for="room_tariff_title">Title <span class="txt-danger">*</span></label>
                                <input class="form-control" id="room_tariff_title" type="text" name="room_tariff_title"
                                       placeholder="Enter Title" value="{{ old('room_tariff_title') }}" required>
                                <div class="invalid-feedback">Please enter a Title.</div>
                            </div>

                            <div class="col-12 mt-3">
                                <table class="table table-bordered" id="roomTariffTable">
                                    <thead>
                                        <tr>
                                            <th style="width:30%">Title <span class="txt-danger">*</span></th>
                                            <th>Description <span class="txt-danger">*</span></th>
                                            <th style="width:120px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="text" name="room_tariff[0][title]" class="form-control"
                                                       placeholder="Enter Title">
                                            </td>
                                            <td>
                                                <textarea name="room_tariff[0][description]"
                                                          class="form-control repeater-editor"
                                                          placeholder="Enter Description" rows="3"></textarea>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button type="button" class="btn btn-success add-room-tariff">Add More</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <hr class="mt-5">

                            {{-- ============================================= --}}
                            {{-- # Intensive Care Unit (ICU) --}}
                            {{-- ============================================= --}}
                            <h4># Intensive Care Unit (ICU)</h4>

                            <div class="col-md-6 mt-4">
                                <label class="form-label" for="icu_heading">Heading <span class="txt-danger">*</span></label>
                                <input class="form-control" id="icu_heading" type="text" name="icu_heading"
                                       placeholder="Enter Heading" value="{{ old('icu_heading') }}" required>
                                <div class="invalid-feedback">Please enter a Heading.</div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label" for="icu_desc">Description <span class="txt-danger">*</span></label>
                                <textarea class="form-control ck-classic" id="icu_desc" name="icu_desc"
                                          placeholder="Enter Description">{{ old('icu_desc') }}</textarea>
                            </div>

                            <hr class="mt-5">

                            {{-- ============================================= --}}
                            {{-- # Tariff Notes --}}
                            {{-- ============================================= --}}
                            <h4># Tariff Notes</h4>

                            <div class="col-md-6 mt-4">
                                <label class="form-label" for="tariff_notes_heading">Heading <span class="txt-danger">*</span></label>
                                <input class="form-control" id="tariff_notes_heading" type="text" name="tariff_notes_heading"
                                       placeholder="Enter Heading" value="{{ old('tariff_notes_heading') }}" required>
                                <div class="invalid-feedback">Please enter a Heading.</div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label" for="tariff_notes_desc">Description <span class="txt-danger">*</span></label>
                                <textarea class="form-control ck-classic" id="tariff_notes_desc" name="tariff_notes_desc"
                                          placeholder="Enter Description">{{ old('tariff_notes_desc') }}</textarea>
                            </div>

                            <hr class="mt-5">

                            {{-- ============================================= --}}
                            {{-- # Super-Specialty Hospital (repeater) --}}
                            {{-- ============================================= --}}
                            <h4># Super-Specialty Hospital</h4>

                            <div class="col-md-6 mt-4">
                                <label class="form-label" for="super_specialty_heading">Heading <span class="txt-danger">*</span></label>
                                <input class="form-control" id="super_specialty_heading" type="text" name="super_specialty_heading"
                                       placeholder="Enter Heading" value="{{ old('super_specialty_heading') }}" required>
                                <div class="invalid-feedback">Please enter a Heading.</div>
                            </div>

                            <!--<div class="col-12 mt-3">-->
                            <!--    <table class="table table-bordered" id="superSpecialtyTable">-->
                            <!--        <thead>-->
                            <!--            <tr>-->
                            <!--                <th style="width:30%">Title <span class="txt-danger">*</span></th>-->
                            <!--                <th>Description <span class="txt-danger">*</span></th>-->
                            <!--                <th style="width:120px">Action</th>-->
                            <!--            </tr>-->
                            <!--        </thead>-->
                            <!--        <tbody>-->
                            <!--            <tr>-->
                            <!--                <td>-->
                            <!--                    <input type="text" name="super_specialty[0][title]" class="form-control"-->
                            <!--                           placeholder="Enter Title">-->
                            <!--                </td>-->
                            <!--                <td>-->
                            <!--                    <textarea name="super_specialty[0][description]"-->
                            <!--                              class="form-control repeater-editor"-->
                            <!--                              placeholder="Enter Description" rows="3"></textarea>-->
                            <!--                </td>-->
                            <!--                <td class="text-center align-middle">-->
                            <!--                    <button type="button" class="btn btn-success add-super-specialty">Add More</button>-->
                            <!--                </td>-->
                            <!--            </tr>-->
                            <!--        </tbody>-->
                            <!--    </table>-->
                            <!--</div>-->


                            <div class="col-12 mt-3">
                                <table class="table table-bordered" id="superSpecialtyTable">
                                    <thead>
                                        <tr>
                                            <th style="width:25%">Title <span class="txt-danger">*</span></th>
                                            <th>Description <span class="txt-danger">*</span></th>
                                            <th style="min-width:220px">Images <small class="text-muted">(optional)</small></th>

                                            <th style="width:120px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="text" name="super_specialty[0][title]" class="form-control"
                                                       placeholder="Enter Title">
                                            </td>
                                            <td>
                                                <textarea name="super_specialty[0][description]"
                                                          class="form-control repeater-editor"
                                                          placeholder="Enter Description" rows="3"></textarea>
                                            </td>
                                            <td>
                                                <input type="file" name="super_specialty[0][images][]"
                                                       class="form-control image-input" accept="image/*" multiple>
                                                <div class="image-preview"></div>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button type="button" class="btn btn-success add-super-specialty">Add More</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <hr class="mt-5">

                            {{-- ============================================= --}}
                            {{-- # Day Care Facility --}}
                            {{-- ============================================= --}}
                            <h4># Day Care Facility</h4>

                            <div class="col-md-6 mt-4">
                                <label class="form-label" for="day_care_heading">Heading <span class="txt-danger">*</span></label>
                                <input class="form-control" id="day_care_heading" type="text" name="day_care_heading"
                                       placeholder="Enter Heading" value="{{ old('day_care_heading') }}" required>
                                <div class="invalid-feedback">Please enter a Heading.</div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label" for="day_care_desc">Description <span class="txt-danger">*</span></label>
                                <textarea class="form-control ck-classic" id="day_care_desc" name="day_care_desc"
                                          placeholder="Enter Description">{{ old('day_care_desc') }}</textarea>
                            </div>

                            <hr class="mt-5">

                            {{-- ============================================= --}}
                            {{-- # FAQ's --}}
                            {{-- ============================================= --}}
                            <h4># FAQ's</h4>

                            <div class="col-md-6 mt-4">
                                <label class="form-label" for="faq_heading">FAQ Heading <span class="txt-danger">*</span></label>
                                <input class="form-control" id="faq_heading" type="text" name="faq_heading"
                                       placeholder="Enter FAQ Heading" value="{{ old('faq_heading') }}" required>
                                <div class="invalid-feedback">Please enter a FAQ Heading.</div>
                            </div>

                            <div class="col-md-6 mt-4">
                                <label class="form-label" for="faq_image">FAQ Image <span class="txt-danger">*</span></label>
                                <input class="form-control image-input" id="faq_image" type="file" name="faq_image"
                                       data-preview="faqImagePreview" accept=".jpg,.jpeg,.png,.webp,.svg" required>
                                <div class="invalid-feedback">Please upload a FAQ image.</div>
                                <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small><br>
                                <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                <div class="mt-2">
                                    <img id="faqImagePreview" src="#" alt="Preview"
                                         class="img-fluid rounded border d-none" style="max-height: 150px; background:black;">
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <table class="table table-bordered" id="faqTable">
                                    <thead>
                                        <tr>
                                            <th style="width:30%">Question <span class="txt-danger">*</span></th>
                                            <th>Answer <span class="txt-danger">*</span></th>
                                            <th style="width:120px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="faq-row">
                                            <td>
                                                <input type="text" name="faq[0][question]" class="form-control"
                                                       placeholder="Enter Question">
                                            </td>
                                            <td>
                                                <textarea name="faq[0][answer]" class="form-control faq-editor"
                                                          placeholder="Enter Answer" rows="3"></textarea>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button type="button" class="btn btn-success add-faq">Add More</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            {{-- Form Actions --}}
                            <div class="col-12 text-end">
                                <a href="{{ route('admin.manage-inpatient-service.index') }}" class="btn btn-danger px-4">Cancel</a>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>

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

{{-- ===================================================== --}}
{{-- CKEditor + dynamic rows + image previews --}}
{{-- ===================================================== --}}
<script>
    const ckToolbar = {
        toolbar: [
            'heading', '|',
            'bold', 'italic', 'underline', 'strikethrough',
            'link', 'blockQuote',
            'bulletedList', 'numberedList',
            '|', 'alignment', 'outdent', 'indent',
            '|', 'fontColor', 'fontBackgroundColor', 'fontSize', 'fontFamily',
            '|', 'insertTable', 'horizontalLine',
            '|', 'undo', 'redo', 'removeFormat'
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
    };

    // Initialise CKEditor on every textarea that is not yet loaded
    function initEditors() {
        document.querySelectorAll('.ck-classic, .repeater-editor, .faq-editor').forEach(el => {
            if (el.classList.contains('editor-loaded')) return;
            el.classList.add('editor-loaded');
            ClassicEditor.create(el, ckToolbar).catch(err => console.error(err));
        });
    }

    document.addEventListener('DOMContentLoaded', initEditors);

    $(document).ready(function () {

        /* ---------- Image previews (shared) ---------- */
        $(document).on('change', '.image-input', function () {
            const preview = document.getElementById($(this).data('preview'));
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = e => {
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                };
                reader.readAsDataURL(this.files[0]);
            } else {
                preview.src = '#';
                preview.classList.add('d-none');
            }
        });

        /* ---------- Rooms & Tariff repeater ---------- */
        let roomTariffIndex = 1;
        $('#roomTariffTable').on('click', '.add-room-tariff', function () {
            $('#roomTariffTable tbody').append(`
                <tr>
                    <td>
                        <input type="text" name="room_tariff[${roomTariffIndex}][title]" class="form-control"
                               placeholder="Enter Title">
                    </td>
                    <td>
                        <textarea name="room_tariff[${roomTariffIndex}][description]"
                                  class="form-control repeater-editor"
                                  placeholder="Enter Description" rows="3"></textarea>
                    </td>
                    <td class="text-center align-middle">
                        <button type="button" class="btn btn-danger remove-row">Remove</button>
                    </td>
                </tr>`);
            roomTariffIndex++;
            initEditors();
        });

        /* ---------- Super-Specialty repeater ---------- */
        // let superSpecialtyIndex = 1;
        // $('#superSpecialtyTable').on('click', '.add-super-specialty', function () {
        //     $('#superSpecialtyTable tbody').append(`
        //         <tr>
        //             <td>
        //                 <input type="text" name="super_specialty[${superSpecialtyIndex}][title]" class="form-control"
        //                       placeholder="Enter Title">
        //             </td>
        //             <td>
        //                 <textarea name="super_specialty[${superSpecialtyIndex}][description]"
        //                           class="form-control repeater-editor"
        //                           placeholder="Enter Description" rows="3"></textarea>
        //             </td>
        //             <td class="text-center align-middle">
        //                 <button type="button" class="btn btn-danger remove-row">Remove</button>
        //             </td>
        //         </tr>`);
        //     superSpecialtyIndex++;
        //     initEditors();
        // });
        
        
        let superSpecialtyIndex = 1;

        // Each file input keeps its own DataTransfer so individual images can be removed.
        const fileStore = new WeakMap();
        
        function getStore(input) {
            let dt = fileStore.get(input);
            if (!dt) { dt = new DataTransfer(); fileStore.set(input, dt); }
            return dt;
        }
        
        function renderPreviews(input) {
            const dt = getStore(input);
            const container = input.closest('td').querySelector('.image-preview');
            container.querySelectorAll('img').forEach(img => URL.revokeObjectURL(img.src));
            container.innerHTML = '';
            Array.from(dt.files).forEach((file, i) => {
                const url = URL.createObjectURL(file);
                const wrap = document.createElement('div');
                wrap.className = 'preview-thumb';
                wrap.innerHTML =
                    '<img src="' + url + '" alt="' + file.name + '">' +
                    '<span class="remove-image" data-index="' + i + '" title="Remove">&times;</span>';
                container.appendChild(wrap);
            });
        }
        
        // Add new row
        $('#superSpecialtyTable').on('click', '.add-super-specialty', function () {
            $('#superSpecialtyTable tbody').append(`
                <tr>
                    <td>
                        <input type="text" name="super_specialty[${superSpecialtyIndex}][title]" class="form-control"
                               placeholder="Enter Title">
                    </td>
                    <td>
                        <textarea name="super_specialty[${superSpecialtyIndex}][description]"
                                  class="form-control repeater-editor"
                                  placeholder="Enter Description" rows="3"></textarea>
                    </td>
                    <td>
                        <input type="file" name="super_specialty[${superSpecialtyIndex}][images][]"
                               class="form-control image-input" accept="image/*" multiple>
                        <div class="image-preview"></div>
                    </td>
                    <td class="text-center align-middle">
                        <button type="button" class="btn btn-danger remove-row">Remove</button>
                    </td>
                </tr>`);
            superSpecialtyIndex++;
            initEditors();
        });
        
        // Remove whole row
        $('#superSpecialtyTable').on('click', '.remove-row', function () {
            $(this).closest('tr').remove();
        });
        
        // Files chosen (accumulates across picks, dedupes)
        $('#superSpecialtyTable').on('change', '.image-input', function () {
            const input = this;
            const dt = getStore(input);
            const seen = new Set(Array.from(dt.files).map(f => f.name + '|' + f.size + '|' + f.lastModified));
            Array.from(input.files).forEach(file => {
                if (!file.type.startsWith('image/')) return;
                const key = file.name + '|' + file.size + '|' + file.lastModified;
                if (!seen.has(key)) { dt.items.add(file); seen.add(key); }
            });
            input.files = dt.files;
            renderPreviews(input);
        });
        
        // Remove a single image via the corner cross
        $('#superSpecialtyTable').on('click', '.remove-image', function () {
            const idx = parseInt($(this).data('index'), 10);
            const input = $(this).closest('td').find('.image-input')[0];
            const dt = getStore(input);
            const newDt = new DataTransfer();
            Array.from(dt.files).forEach((f, i) => { if (i !== idx) newDt.items.add(f); });
            fileStore.set(input, newDt);
            input.files = newDt.files;
            renderPreviews(input);
        });


        /* ---------- FAQ repeater ---------- */
        let faqIndex = 1;
        $('#faqTable').on('click', '.add-faq', function () {
            $('#faqTable tbody').append(`
                <tr class="faq-row">
                    <td>
                        <input type="text" name="faq[${faqIndex}][question]" class="form-control"
                               placeholder="Enter Question">
                    </td>
                    <td>
                        <textarea name="faq[${faqIndex}][answer]" class="form-control faq-editor"
                                  placeholder="Enter Answer" rows="3"></textarea>
                    </td>
                    <td class="text-center align-middle">
                        <button type="button" class="btn btn-danger remove-row">Remove</button>
                    </td>
                </tr>`);
            faqIndex++;
            initEditors();
        });

        /* ---------- Remove row (shared) ---------- */
        $(document).on('click', '.remove-row', function () {
            $(this).closest('tr').remove();
        });
    });
</script>

</body>
</html>