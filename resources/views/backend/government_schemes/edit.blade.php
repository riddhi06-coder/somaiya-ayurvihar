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
                    <h4>Edit Government Schemes Form</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.manage-government-schemes.index') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Edit Government Schemes</li>
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
                        <h4>Government Schemes Form</h4>
                        <p class="f-m-light mt-1">Update the details and submit the form.</p>
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
                              action="{{ route('admin.manage-government-schemes.update', $government_scheme->id) }}"
                              method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            
                            <div class="col-md-12">
                                <label class="form-label" for="cghs_beneficiaries">CGHS Beneficiaries <span class="txt-danger">*</span></label>
                                <textarea class="form-control ck-classic" id="cghs_beneficiaries" name="cghs_beneficiaries"
                                          placeholder="Enter CGHS Beneficiaries">{{ old('cghs_beneficiaries', $government_scheme->cghs_beneficiaries) }}</textarea>
                            </div>

                            <hr class="mt-5">
                            
                            <div class="col-md-12">
                                <label class="form-label" for="assistance_cghs">Assistance for CGHS  <span class="txt-danger">*</span></label>
                                <textarea class="form-control ck-classic" id="assistance_cghs" name="assistance_cghs"
                                          placeholder="Enter Assistance for CGHS ">{{ old('intro_desc', $government_scheme->assistance_cghs) }}</textarea>
                            </div>

                            <hr class="mt-5">
                            

                            {{-- ============================================= --}}
                            {{-- # Intro (Description only) --}}
                            {{-- ============================================= --}}
                            <div class="col-md-12">
                                <label class="form-label" for="intro_desc">Description <span class="txt-danger">*</span></label>
                                <textarea class="form-control ck-classic" id="intro_desc" name="intro_desc"
                                          placeholder="Enter Description">{!! old('intro_desc', $government_scheme->intro_desc) !!}</textarea>
                            </div>

                            <hr class="mt-5">

                            {{-- ============================================= --}}
                            {{-- # Eligibility Criteria (description + multiple titles) --}}
                            {{-- ============================================= --}}
                            <h4># Eligibility Criteria</h4>

                            <div class="col-md-12">
                                <label class="form-label" for="eligibility_desc">Description <span class="txt-danger">*</span></label>
                                <textarea class="form-control ck-classic" id="eligibility_desc" name="eligibility_desc"
                                          placeholder="Enter Description">{!! old('eligibility_desc', $government_scheme->eligibility_desc) !!}</textarea>
                            </div>

                            <div class="col-12 mt-3">
                                <table class="table table-bordered" id="eligibilityTable">
                                    <thead>
                                        <tr>
                                            <th>Title <span class="txt-danger">*</span></th>
                                            <th style="width:120px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($eligibilityTitles as $title)
                                            <tr>
                                                <td>
                                                    <textarea name="eligibility_titles[]" class="form-control"
                                                              rows="2" placeholder="Enter Title">{{ $title }}</textarea>
                                                </td>
                                                <td class="text-center align-middle">
                                                    @if ($loop->first)
                                                        <button type="button" class="btn btn-success add-eligibility">Add More</button>
                                                    @else
                                                        <button type="button" class="btn btn-danger remove-row">Remove</button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td>
                                                    <textarea name="eligibility_titles[]" class="form-control"
                                                              rows="2" placeholder="Enter Title"></textarea>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button type="button" class="btn btn-success add-eligibility">Add More</button>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <hr class="mt-5">

                            {{-- ============================================= --}}
                            {{-- # Research Centre --}}
                            {{-- ============================================= --}}
                            <h4># Research Centre</h4>

                            <div class="col-md-12">
                                <label class="form-label" for="research_desc">Description <span class="txt-danger">*</span></label>
                                <textarea class="form-control ck-classic" id="research_desc" name="research_desc"
                                          placeholder="Enter Description">{!! old('research_desc', $government_scheme->research_desc) !!}</textarea>
                            </div>

                            <hr class="mt-5">

                            {{-- ============================================= --}}
                            {{-- # Medical Social Worker / Aarogyamitra Support --}}
                            {{-- ============================================= --}}
                            <h4># Medical Social Worker / Aarogyamitra Support</h4>

                            <div class="col-md-6 mt-4">
                                <label class="form-label" for="social_worker_image">Image</label>
                                <input class="form-control image-input" id="social_worker_image" type="file" name="social_worker_image"
                                       data-preview="socialWorkerImagePreview" accept=".jpg,.jpeg,.png,.webp,.svg">
                                <small class="text-secondary"><b>Note: Leave empty to keep the current image. The file size should be less than 2MB.</b></small><br>
                                <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                <div class="mt-2">
                                    <img id="socialWorkerImagePreview"
                                         src="{{ $government_scheme->social_worker_image ? asset('uploads/government_schemes/' . $government_scheme->social_worker_image) : '#' }}"
                                         alt="Preview"
                                         class="img-fluid rounded border {{ $government_scheme->social_worker_image ? '' : 'd-none' }}"
                                         style="max-height: 150px; background:black;">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label" for="social_worker_desc">Description <span class="txt-danger">*</span></label>
                                <textarea class="form-control ck-classic" id="social_worker_desc" name="social_worker_desc"
                                          placeholder="Enter Description">{!! old('social_worker_desc', $government_scheme->social_worker_desc) !!}</textarea>
                            </div>

                            <hr class="mt-5">

                            {{-- ============================================= --}}
                            {{-- # MJPJAY Process: Step-by-Step Guide (heading + repeater) --}}
                            {{-- ============================================= --}}
                            <h4># MJPJAY Process: Step-by-Step Guide</h4>

                            <div class="col-md-6 mt-4">
                                <label class="form-label" for="short_heading">Heading <span class="txt-danger">*</span></label>
                                <input class="form-control" id="short_heading" type="text" name="short_heading"
                                       placeholder="Enter Heading"
                                       value="{{ old('short_heading', $government_scheme->short_heading) }}" required>
                                <div class="invalid-feedback">Please enter a Heading.</div>
                            </div>

                            <div class="col-12 mt-3">
                                <table class="table table-bordered" id="mjpjayTable">
                                    <thead>
                                        <tr>
                                            <th style="width:30%">Title <span class="txt-danger">*</span></th>
                                            <th>Description <span class="txt-danger">*</span></th>
                                            <th style="width:120px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($mjpjaySteps as $index => $item)
                                            <tr>
                                                <td>
                                                    <input type="text" name="mjpjay[{{ $index }}][title]" class="form-control"
                                                           placeholder="Enter Title" value="{{ $item['title'] ?? '' }}">
                                                </td>
                                                <td>
                                                    <textarea name="mjpjay[{{ $index }}][description]"
                                                              class="form-control repeater-editor"
                                                              placeholder="Enter Description" rows="3">{!! $item['description'] ?? '' !!}</textarea>
                                                </td>
                                                <td class="text-center align-middle">
                                                    @if ($loop->first)
                                                        <button type="button" class="btn btn-success add-mjpjay">Add More</button>
                                                    @else
                                                        <button type="button" class="btn btn-danger remove-row">Remove</button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td>
                                                    <input type="text" name="mjpjay[0][title]" class="form-control"
                                                           placeholder="Enter Title">
                                                </td>
                                                <td>
                                                    <textarea name="mjpjay[0][description]"
                                                              class="form-control repeater-editor"
                                                              placeholder="Enter Description" rows="3"></textarea>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button type="button" class="btn btn-success add-mjpjay">Add More</button>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <hr class="mt-5">

                            {{-- ============================================= --}}
                            {{-- # Contact Information --}}
                            {{-- ============================================= --}}
                            <h4># Contact Information</h4>

                            <div class="col-md-6 mt-4">
                                <label class="form-label" for="contact_heading">Heading <span class="txt-danger">*</span></label>
                                <input class="form-control" id="contact_heading" type="text" name="contact_heading"
                                       placeholder="Enter Heading"
                                       value="{{ old('contact_heading', $government_scheme->contact_heading) }}" required>
                                <div class="invalid-feedback">Please enter a Heading.</div>
                            </div>

                            <div class="col-md-6 mt-4">
                                <label class="form-label" for="contact_title">Title <span class="txt-danger">*</span></label>
                                <input class="form-control" id="contact_title" type="text" name="contact_title"
                                       placeholder="Enter Title"
                                       value="{{ old('contact_title', $government_scheme->contact_title) }}" required>
                                <div class="invalid-feedback">Please enter a Title.</div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label" for="contact_desc">Description <span class="txt-danger">*</span></label>
                                <textarea class="form-control ck-classic" id="contact_desc" name="contact_desc"
                                          placeholder="Enter Description">{!! old('contact_desc', $government_scheme->contact_desc) !!}</textarea>
                            </div>

                            <hr class="mt-5">

                            {{-- ============================================= --}}
                            {{-- # FAQ's --}}
                            {{-- ============================================= --}}
                            <h4># FAQ's</h4>

                            <div class="col-md-6 mt-4">
                                <label class="form-label" for="faq_heading">FAQ Heading <span class="txt-danger">*</span></label>
                                <input class="form-control" id="faq_heading" type="text" name="faq_heading"
                                       placeholder="Enter FAQ Heading"
                                       value="{{ old('faq_heading', $government_scheme->faq_heading) }}" required>
                                <div class="invalid-feedback">Please enter a FAQ Heading.</div>
                            </div>

                            <div class="col-md-6 mt-4">
                                <label class="form-label" for="faq_image">FAQ Image</label>
                                <input class="form-control image-input" id="faq_image" type="file" name="faq_image"
                                       data-preview="faqImagePreview" accept=".jpg,.jpeg,.png,.webp,.svg">
                                <small class="text-secondary"><b>Note: Leave empty to keep the current image. The file size should be less than 2MB.</b></small><br>
                                <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                <div class="mt-2">
                                    <img id="faqImagePreview"
                                         src="{{ $government_scheme->faq_image ? asset('uploads/government_schemes/' . $government_scheme->faq_image) : '#' }}"
                                         alt="Preview"
                                         class="img-fluid rounded border {{ $government_scheme->faq_image ? '' : 'd-none' }}"
                                         style="max-height: 150px; background:black;">
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
                                        @forelse ($faqData as $index => $item)
                                            <tr class="faq-row">
                                                <td>
                                                    <input type="text" name="faq[{{ $index }}][question]" class="form-control"
                                                           placeholder="Enter Question" value="{{ $item['question'] ?? '' }}">
                                                </td>
                                                <td>
                                                    <textarea name="faq[{{ $index }}][answer]" class="form-control faq-editor"
                                                              placeholder="Enter Answer" rows="3">{!! $item['answer'] ?? '' !!}</textarea>
                                                </td>
                                                <td class="text-center align-middle">
                                                    @if ($loop->first)
                                                        <button type="button" class="btn btn-success add-faq">Add More</button>
                                                    @else
                                                        <button type="button" class="btn btn-danger remove-row">Remove</button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
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
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            {{-- Form Actions --}}
                            <div class="col-12 text-end">
                                <a href="{{ route('admin.manage-government-schemes.index') }}" class="btn btn-danger px-4">Cancel</a>
                                <button class="btn btn-primary" type="submit">Update</button>
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
            }
        });

        /* ---------- Eligibility titles repeater (textarea, title only) ---------- */
        $('#eligibilityTable').on('click', '.add-eligibility', function () {
            $('#eligibilityTable tbody').append(`
                <tr>
                    <td>
                        <textarea name="eligibility_titles[]" class="form-control"
                                  rows="2" placeholder="Enter Title"></textarea>
                    </td>
                    <td class="text-center align-middle">
                        <button type="button" class="btn btn-danger remove-row">Remove</button>
                    </td>
                </tr>`);
        });

        /* ---------- MJPJAY steps repeater ---------- */
        let mjpjayIndex = {{ max(count($mjpjaySteps), 1) }};
        $('#mjpjayTable').on('click', '.add-mjpjay', function () {
            $('#mjpjayTable tbody').append(`
                <tr>
                    <td>
                        <input type="text" name="mjpjay[${mjpjayIndex}][title]" class="form-control"
                               placeholder="Enter Title">
                    </td>
                    <td>
                        <textarea name="mjpjay[${mjpjayIndex}][description]"
                                  class="form-control repeater-editor"
                                  placeholder="Enter Description" rows="3"></textarea>
                    </td>
                    <td class="text-center align-middle">
                        <button type="button" class="btn btn-danger remove-row">Remove</button>
                    </td>
                </tr>`);
            mjpjayIndex++;
            initEditors();
        });

        /* ---------- FAQ repeater ---------- */
        let faqIndex = {{ max(count($faqData), 1) }};
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