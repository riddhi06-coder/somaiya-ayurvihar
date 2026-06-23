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
                  <h4>Edit Visitor Guide Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-visitor-guide.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Visitor Guide</li>
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
                                @php
                                    // Visiting Hours details table (title[] / details[]). Decoded here so the
                                    // controller does not need changing. Adjust the column name if yours differs.
                                    $visitingHourDetails = json_decode($convenience_facility->visiting_hour_details ?? '', true) ?: [];
                                    if (empty($visitingHourDetails)) {
                                        $visitingHourDetails = [['title' => '', 'details' => '']];
                                    }
                                 
                                    // Ensure at least one FAQ row renders
                                    if (empty($faqData)) {
                                        $faqData = [['question' => '', 'answer' => '']];
                                    }
                                @endphp
                                 
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                    <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('admin.manage-visitor-guide.update', $convenience_facility->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
           
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="visitor_guide__heading"> Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="visitor_guide__heading" type="text" name="visitor_guide__heading" value="{{ $convenience_facility->visitor_guide_heading }}" placeholder="Enter Heading" required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>
 
                                        <!-- Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="visitor_intro_desc"> Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="visitor_intro_desc" name="visitor_intro_desc" placeholder="Enter Description" required>{{ $convenience_facility->visitor_intro_desc }}</textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>
                                        
                                                 
                                        <hr class="mt-5">
 
                                        <h4># Visiting Hours Details </h4>
                                        
                                        
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="visiting_hour_heading"> Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="visiting_hour_heading" type="text" name="visiting_hour_heading" value="{{ $convenience_facility->visiting_hour_heading }}" placeholder="Enter Heading" required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>
                                        
 
                                        <!-- Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="visiting_hour_desc"> Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="visiting_hour_desc" name="visiting_hour_desc" placeholder="Enter Description" required>{{ $convenience_facility->visiting_hour_desc }}</textarea>
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
 
                                                    @foreach($visitingHourDetails as $key => $row)
 
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="title[]" class="form-control"
                                                                value="{{ $row['title'] ?? '' }}" placeholder="Enter Title">
                                                        </td>
                                        
                                                        <td>
                                                            <textarea name="details[]" class="form-control"
                                                                rows="2" placeholder="Enter Details">{{ $row['details'] ?? '' }}</textarea>
                                                        </td>
                                        
                                                        <td class="text-center align-middle">
                                                            @if($loop->first)
                                                            <button type="button" class="btn btn-success addRow">
                                                                Add More
                                                            </button>
                                                            @else
                                                            <button type="button" class="btn btn-danger removeRow">
                                                                Remove
                                                            </button>
                                                            @endif
                                                        </td>
                                                    </tr>
 
                                                    @endforeach
 
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        
                                         <!-- Description-->
                                        <div class="col-md-12 mt-5">
                                            <label class="form-label" for="visiting_desc"> Short Description <span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="visiting_desc" name="visiting_desc" placeholder="Enter Description" required>{{ $convenience_facility->visiting_desc }}</textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>
 
                                        <hr class="mt-5">
 
                                        <h4># Visitor & Attendant Pass Policy Details</h4>
                                        
                                        
                                        <!-- Visitor & Attendant Pass Policy Heading -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="visitor_pass_heading"> Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="visitor_pass_heading" type="text" name="visitor_pass_heading" value="{{ $convenience_facility->visitor_pass_heading }}" placeholder="Enter Heading" required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>
                                        
                                        
                                        <!-- Visitor & Attendant Pass Policy Image -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="visitor_pass_image"> Image <span class="txt-danger">*</span> </label>
                                            <input class="form-control" id="visitor_pass_image" type="file" name="visitor_pass_image" onchange="previewvisitorpassimage(event)">
                                            <div class="invalid-feedback">Please upload a image.</div>
                                                <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                                <br>
                                                <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
 
                                            @if($convenience_facility->visitor_pass_image)
                                                <div class="mt-2">
                                                    <img
                                                        src="{{ asset('uploads/visitor_guide/'.$convenience_facility->visitor_pass_image) }}"
                                                        class="img-fluid rounded border"
                                                        style="max-height:150px;background:black;">
                                                </div>
                                            @endif
 
                                            <!-- Image Preview -->
                                            <div class="mt-2">
                                                <img id="visitorpassimagePreview" src="#" alt="Preview" class="img-fluid rounded border d-none" style="max-height: 150px; background:black;">
                                            </div>
                                        </div>
                                        
                                        
                                        <!-- Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="visitor_pass_desc"> Description <span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="visitor_pass_desc" name="visitor_pass_desc" placeholder="Enter Description" required>{{ $convenience_facility->visitor_pass_desc }}</textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>
 
 
 
 
                                        
                                         <hr class="mt-5">
 
                                        <h4># Guidelines for Visitors</h4>
                                        
                                        
                                        <!-- Guidelines for Visitors Heading -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="guideline_heading"> Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="guideline_heading" type="text" name="guideline_heading" value="{{ $convenience_facility->guideline_heading }}" placeholder="Enter Heading" required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>
 
                                        <!-- Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="guideline_desc"> Description 1<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="guideline_desc" name="guideline_desc" placeholder="Enter Description" required>{{ $convenience_facility->guideline_desc }}</textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>
                                        
                                        
                                        <!-- Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="guideline_description"> Description 2<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="guideline_description" name="guideline_description" placeholder="Enter Description" required>{{ $convenience_facility->guideline_description }}</textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>
                                        
  
 
                                        <hr class="mt-5">
 
                                        <h4># FAQ's</h4>
 
 
 
                                        <!-- FAQ Heading -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="faq_heading">FAQ Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="faq_heading" type="text" name="faq_heading" value="{{ $convenience_facility->faq_heading }}" placeholder="Enter FAQ Heading" required>
                                            <div class="invalid-feedback">Please enter a FAQ Heading.</div>
                                        </div>
 
 
                                        <!-- FAQ Image -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="faq_image"> FAQ Image <span class="txt-danger">*</span> </label>
                                            <input class="form-control" id="faq_image" type="file" name="faq_image" onchange="previewfaqimage(event)">
                                            <div class="invalid-feedback">Please upload a FAQ image.</div>
                                                <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                                <br>
                                                <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
 
                                            @if($convenience_facility->faq_image)
                                                <div class="mt-2">
                                                    <img
                                                        src="{{ asset('uploads/visitor_guide/'.$convenience_facility->faq_image) }}"
                                                        class="img-fluid rounded border"
                                                        style="max-height:150px;background:black;">
                                                </div>
                                            @endif
 
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
 
                                                    @foreach($faqData as $key => $faq)
 
                                                    <tr class="faq-row">
                                                        <td>
                                                            <input type="text" name="faq[{{ $key }}][question]" class="form-control" value="{{ $faq['question'] ?? '' }}" placeholder="Enter Question">
                                                        </td>
                                                        <td>
                                                            <textarea name="faq[{{ $key }}][answer]"
                                                                class="form-control faq-editor"
                                                                placeholder="Enter Answer"
                                                                rows="3">{{ $faq['answer'] ?? '' }}</textarea>
 
                                                        </td>
                                                        <td>
                                                            @if($loop->first)
                                                            <button type="button" class="btn btn-success add-faq">Add More</button>
                                                            @else
                                                            <button type="button" class="btn btn-danger remove-faq">Remove</button>
                                                            @endif
                                                        </td>
                                                    </tr>
 
                                                    @endforeach
 
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

<!-- ============================ SCRIPTS ============================ -->
 
<!-- Visiting Hours dynamic table (title[] / details[]) -->
<script>
    $(document).ready(function () {
 
        // Add New Row
        $(document).on('click', '.addRow', function () {
 
            let newRow = `
            <tr>
                <td>
                    <input type="text" name="title[]" class="form-control" placeholder="Enter Title">
                </td>
                <td>
                    <textarea name="details[]" class="form-control" rows="2" placeholder="Enter Details"></textarea>
                </td>
                <td class="text-center align-middle">
                    <button type="button" class="btn btn-danger removeRow">Remove</button>
                </td>
            </tr>`;
 
            $('#cafeteriaTable tbody').append(newRow);
        });
 
        // Remove Row
        $(document).on('click', '.removeRow', function () {
            $(this).closest('tr').remove();
        });
 
    });
</script>
 
 
<!-- Image previews -->
<script>
    function previewvisitorpassimage(event) {
        const input = event.target;
        const preview = document.getElementById('visitorpassimagePreview');
 
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('d-none');
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = "#";
            preview.classList.add('d-none');
        }
    }
 
    function previewfaqimage(event) {
        const input = event.target;
        const preview = document.getElementById('faqimagePreview');
 
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('d-none');
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = "#";
            preview.classList.add('d-none');
        }
    }
</script>
 
 
<!-- FAQ dynamic table with CKEditor -->
<script>
    // Start the counter AFTER all existing rows so new rows never overwrite them
    let faqIndex = {{ count($faqData) }};
 
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
 
        // Initialize existing FAQ editors
        document.querySelectorAll('.faq-editor').forEach(el => {
            if (!el.classList.contains('editor-loaded')) {
                ClassicEditor.create(el, editorConfig);
                el.classList.add('editor-loaded');
            }
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
 
            // Init CKEditor on the newly added textarea only
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
 
 
<!-- CKEditor for the rich-text description fields -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
 
        const richTextIds = [
            'visitor_intro_desc',                 // visitor_intro_desc
            'visiting_hour_desc',
            'visiting_desc',
            'visitor_pass_desc',
            'guideline_desc',
            'guideline_description'
        ];
 
        richTextIds.forEach(id => {
            const el = document.querySelector('#' + id);
            if (el && !el.classList.contains('ck-loaded')) {
                ClassicEditor.create(el)
                    .then(() => el.classList.add('ck-loaded'))
                    .catch(error => console.error(error));
            }
        });
 
    });
</script>



</body>

</html>