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
                    <h4>Add Community Outreach Form</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.manage-community-outreach.index') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Add Community Outreach</li>
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
                        <h4>Community Outreach Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">

                        <!--@if ($errors->any())-->
                        <!--    <div class="alert alert-danger">-->
                        <!--        <ul class="mb-0">-->
                        <!--            @foreach ($errors->all() as $error)-->
                        <!--                <li>{{ $error }}</li>-->
                        <!--            @endforeach-->
                        <!--        </ul>-->
                        <!--    </div>-->
                        <!--@endif-->

                        <form class="row g-3 custom-input" novalidate
                              action="{{ route('admin.manage-community-outreach.store') }}"
                              method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- ============================================= --}}
                            {{-- # Intro (Description only) --}}
                            {{-- ============================================= --}}
                            <div class="col-md-12">
                                <label class="form-label" for="intro_desc">Description <span class="txt-danger">*</span></label>
                                <textarea class="form-control ck-classic" id="intro_desc" name="intro_desc"
                                          placeholder="Enter Description">{{ old('intro_desc') }}</textarea>
                            </div>

                            <hr class="mt-5">

                            {{-- ============================================= --}}
                            {{-- # Urban Health Training Centre (UHTC) --}}
                            {{-- ============================================= --}}
                            <h4># Urban Health Training Centre (UHTC)</h4>

                            <div class="col-md-6 mt-4">
                                <label class="form-label" for="uhtc_image">Image <span class="txt-danger">*</span></label>
                                <input class="form-control image-input" id="uhtc_image" type="file" name="uhtc_image"
                                       data-preview="uhtcImagePreview" accept=".jpg,.jpeg,.png,.webp,.svg" required>
                                <div class="invalid-feedback">Please upload an image.</div>
                                <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small><br>
                                <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                <div class="mt-2">
                                    <img id="uhtcImagePreview" src="#" alt="Preview"
                                         class="img-fluid rounded border d-none" style="max-height: 150px; background:black;">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label" for="uhtc_desc">Description <span class="txt-danger">*</span></label>
                                <textarea class="form-control ck-classic" id="uhtc_desc" name="uhtc_desc"
                                          placeholder="Enter Description">{{ old('uhtc_desc') }}</textarea>
                            </div>

                            <hr class="mt-5">

                            {{-- ============================================= --}}
                            {{-- # Core services include --}}
                            {{-- ============================================= --}}
                            <h4># Core services include:</h4>

                            <div class="col-md-12">
                                <label class="form-label" for="core_services_desc">Description <span class="txt-danger">*</span></label>
                                <textarea class="form-control ck-classic" id="core_services_desc" name="core_services_desc"
                                          placeholder="Enter Description">{{ old('core_services_desc') }}</textarea>
                            </div>

                            <hr class="mt-5">

                            {{-- ============================================= --}}
                            {{-- # Public health & follow-up initiatives --}}
                            {{-- ============================================= --}}
                            <h4># Public health & follow-up initiatives:</h4>

                            <div class="col-md-12">
                                <label class="form-label" for="public_health_desc">Description <span class="txt-danger">*</span></label>
                                <textarea class="form-control ck-classic" id="public_health_desc" name="public_health_desc"
                                          placeholder="Enter Description">{{ old('public_health_desc') }}</textarea>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label" for="public_health_short_desc">Short Description <span class="txt-danger">*</span></label>
                                <textarea class="form-control ck-classic" id="public_health_short_desc" name="public_health_short_desc"
                                          placeholder="Enter Short Description">{{ old('public_health_short_desc') }}</textarea>
                            </div>

                            <hr class="mt-5">

                            {{-- ============================================= --}}
                            {{-- # Somaiya Action for HIV/AIDS Support (SAHAS) --}}
                            {{-- ============================================= --}}
                            <h4># Somaiya Action for HIV/AIDS Support (SAHAS)</h4>

                            <div class="col-md-6 mt-4">
                                <label class="form-label" for="sahas_image">Image <span class="txt-danger">*</span></label>
                                <input class="form-control image-input" id="sahas_image" type="file" name="sahas_image"
                                       data-preview="sahasImagePreview" accept=".jpg,.jpeg,.png,.webp,.svg" required>
                                <div class="invalid-feedback">Please upload an image.</div>
                                <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small><br>
                                <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                <div class="mt-2">
                                    <img id="sahasImagePreview" src="#" alt="Preview"
                                         class="img-fluid rounded border d-none" style="max-height: 150px; background:black;">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label" for="sahas_desc">Description <span class="txt-danger">*</span></label>
                                <textarea class="form-control ck-classic" id="sahas_desc" name="sahas_desc"
                                          placeholder="Enter Description">{{ old('sahas_desc') }}</textarea>
                            </div>

                            <hr class="mt-5">

                            {{-- ============================================= --}}
                            {{-- # Impact and scope --}}
                            {{-- ============================================= --}}
                            <h4># Impact and scope:</h4>

                            <div class="col-md-12">
                                <label class="form-label" for="impact_desc">Description <span class="txt-danger">*</span></label>
                                <textarea class="form-control ck-classic" id="impact_desc" name="impact_desc"
                                          placeholder="Enter Description">{{ old('impact_desc') }}</textarea>
                            </div>


                            <hr class="mt-5">

                            {{-- ============================================= --}}
                            {{-- # Key areas of support include: --}}
                            {{-- ============================================= --}}
                            <h4># Key areas of support include::</h4>

                            <div class="col-md-12">
                                <label class="form-label" for="keyarea_desc">Description <span class="txt-danger">*</span></label>
                                <textarea class="form-control ck-classic" id="keyarea_desc" name="keyarea_desc"
                                          placeholder="Enter Description">{{ old('keyarea_desc') }}</textarea>
                            </div>
                            <hr class="mt-5">

                            {{-- ============================================= --}}
                            {{-- # Rural Health Training Centre (RHTC), Lodhivali --}}
                            {{-- ============================================= --}}
                            <h4># Rural Health Training Centre (RHTC), Lodhivali</h4>

                            <div class="col-md-6 mt-4">
                                <label class="form-label" for="rhtc_image">Image <span class="txt-danger">*</span></label>
                                <input class="form-control image-input" id="rhtc_image" type="file" name="rhtc_image"
                                       data-preview="rhtcImagePreview" accept=".jpg,.jpeg,.png,.webp,.svg" required>
                                <div class="invalid-feedback">Please upload an image.</div>
                                <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small><br>
                                <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                <div class="mt-2">
                                    <img id="rhtcImagePreview" src="#" alt="Preview"
                                         class="img-fluid rounded border d-none" style="max-height: 150px; background:black;">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label" for="rhtc_desc">Description <span class="txt-danger">*</span></label>
                                <textarea class="form-control ck-classic" id="rhtc_desc" name="rhtc_desc"
                                          placeholder="Enter Description">{{ old('rhtc_desc') }}</textarea>
                            </div>

                            <hr class="mt-5">

                            {{-- ============================================= --}}
                            {{-- # Preventive & School-Based Outreach Programmes --}}
                            {{-- ============================================= --}}
                            <h4># Preventive & School-Based Outreach Programmes</h4>

                            <div class="col-md-12">
                                <label class="form-label" for="preventive_desc">Description <span class="txt-danger">*</span></label>
                                <textarea class="form-control ck-classic" id="preventive_desc" name="preventive_desc"
                                          placeholder="Enter Description">{{ old('preventive_desc') }}</textarea>
                            </div>

                            <div class="col-12 mt-3">
                                <table class="table table-bordered" id="programmesTable">
                                    <thead>
                                        <tr>
                                            <th style="width:25%">Image <span class="txt-danger">*</span></th>
                                            <th style="width:25%">Title <span class="txt-danger">*</span></th>
                                            <th>Description <span class="txt-danger">*</span></th>
                                            <th style="width:120px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="file" name="programmes[0][image]" class="form-control row-image-input"
                                                       accept=".jpg,.jpeg,.png,.webp,.svg">
                                                <img src="#" alt="Preview"
                                                     class="img-fluid rounded border d-none row-image-preview mt-2"
                                                     style="max-height: 100px; background:black;">
                                            </td>
                                            <td>
                                                <input type="text" name="programmes[0][title]" class="form-control"
                                                       placeholder="Enter Title">
                                            </td>
                                            <td>
                                                <textarea name="programmes[0][description]"
                                                          class="form-control repeater-editor"
                                                          placeholder="Enter Description" rows="3"></textarea>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button type="button" class="btn btn-success add-programme">Add More</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <hr class="mt-5">

                            {{-- ============================================= --}}
                            {{-- # A Commitment Beyond the Hospital --}}
                            {{-- ============================================= --}}
                            <h4># A Commitment Beyond the Hospital</h4>

                            <div class="col-md-12">
                                <label class="form-label" for="commitment_desc">Description <span class="txt-danger">*</span></label>
                                <textarea class="form-control ck-classic" id="commitment_desc" name="commitment_desc"
                                          placeholder="Enter Description">{{ old('commitment_desc') }}</textarea>
                            </div>

                            {{-- Form Actions --}}
                            <div class="col-12 text-end">
                                <a href="{{ route('admin.manage-community-outreach.index') }}" class="btn btn-danger px-4">Cancel</a>
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
        document.querySelectorAll('.ck-classic, .repeater-editor').forEach(el => {
            if (el.classList.contains('editor-loaded')) return;
            el.classList.add('editor-loaded');
            ClassicEditor.create(el, ckToolbar).catch(err => console.error(err));
        });
    }

    document.addEventListener('DOMContentLoaded', initEditors);

    $(document).ready(function () {

        /* ---------- Section image previews (by id) ---------- */
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

        /* ---------- Repeater row image previews (inside table) ---------- */
        $(document).on('change', '.row-image-input', function () {
            const preview = $(this).closest('td').find('.row-image-preview')[0];
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = e => {
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                };
                reader.readAsDataURL(this.files[0]);
            }
        });

        /* ---------- Programmes repeater (image + title + description) ---------- */
        let programmeIndex = 1;
        $('#programmesTable').on('click', '.add-programme', function () {
            $('#programmesTable tbody').append(`
                <tr>
                    <td>
                        <input type="file" name="programmes[${programmeIndex}][image]" class="form-control row-image-input"
                               accept=".jpg,.jpeg,.png,.webp,.svg">
                        <img src="#" alt="Preview"
                             class="img-fluid rounded border d-none row-image-preview mt-2"
                             style="max-height: 100px; background:black;">
                    </td>
                    <td>
                        <input type="text" name="programmes[${programmeIndex}][title]" class="form-control"
                               placeholder="Enter Title">
                    </td>
                    <td>
                        <textarea name="programmes[${programmeIndex}][description]"
                                  class="form-control repeater-editor"
                                  placeholder="Enter Description" rows="3"></textarea>
                    </td>
                    <td class="text-center align-middle">
                        <button type="button" class="btn btn-danger remove-row">Remove</button>
                    </td>
                </tr>`);
            programmeIndex++;
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