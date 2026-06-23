<!doctype html>
<html lang="en">
    
<head>
    @include('components.backend.head')
    
    <style>
        .preview-box {
            width: 100px;
            height: 100px;
            background: #000;
            border: 1px solid #444;
            border-radius: 5px;
            display: none; /* Hidden initially */
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        
        .img-preview {
            max-width: 90px;
            max-height: 90px;
            object-fit: contain;
        }
        
        .atm-preview-box {
            width: 100px;
            height: 100px;
            background: #000;
            border: 1px solid #444;
            border-radius: 5px;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        
        .atm-img-preview {
            max-width: 90px;
            max-height: 90px;
            object-fit: contain;
        }
        
        .pharmacy-preview-box {
            width: 100px;
            height: 100px;
            background: #000;
            border: 1px solid #444;
            border-radius: 5px;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        
        .pharmacy-img-preview {
            max-width: 90px;
            max-height: 90px;
            object-fit: contain;
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
                  <h4>Edit Convenience & Facilities Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-convenience-facilities.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Convenience & Facilities</li>
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
                        <h4>Convenience & Facilities Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                    <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('admin.manage-convenience-facilities.update',$convenience_facility->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                        <!-- Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="cafeteria_intro_desc"> Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="editor" name="cafeteria_intro_desc" placeholder="Enter Description" required>{{ $convenience_facility->cafeteria_intro_desc }}</textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>
                                        
                                                 
                                        <hr class="mt-5">

                                        <h4># Cafeteria Details </h4>
                                        
                                        
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="cafeteria_heading"> Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="cafeteria_heading" type="text" name="cafeteria_heading" value="{{ $convenience_facility->cafeteria_heading }}" placeholder="Enter Heading" required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>
                                        

                                        <!-- Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="cafeteria_desc"> Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="cafeteria_desc" name="cafeteria_desc" placeholder="Enter Description" required>{{ $convenience_facility->cafeteria_desc }}</textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>
                                        
                                        
                                        <div class="table-responsive mt-5">
                                            <table class="table table-bordered" id="cafeteriaTable">
                                                <thead>
                                                    <tr>
                                                        <th width="20%">Icon <span class="txt-danger">*</span></th>
                                                        <th width="20%">Title <span class="txt-danger">*</span></th>
                                                        <th width="40%">Details <span class="txt-danger">*</span></th>
                                                        <th width="20%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach($cafeteriaDetails as $key => $row)
                                                    
                                                    <tr>
                                                    
                                                        <td>
                                                    
                                                            <input type="file"
                                                                   name="icon[]"
                                                                   class="form-control icon-input"
                                                                   accept=".jpg,.jpeg,.png,.webp,.svg">
                                                    
                                                            <small class="text-secondary">
                                                                <b>Note: The file size should be less than 2MB.</b>
                                                            </small>
                                                            <br>
                                                    
                                                            <small class="text-secondary">
                                                                <b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b>
                                                            </small>
                                                    
                                                            @if(!empty($row['icon']))
                                                                <div class="mt-2 preview-box" style="display:flex;">
                                                                    <img src="{{ asset('uploads/convenience_facilities/'.$row['icon']) }}"
                                                                         class="img-preview"
                                                                         width="80">
                                                                </div>
                                                            @endif
                                                    
                                                            <input type="hidden"
                                                                   name="existing_icon[]"
                                                                   value="{{ $row['icon'] }}">
                                                        </td>
                                                    
                                                        <td>
                                                            <input type="text"
                                                                   name="title[]"
                                                                   class="form-control"
                                                                   value="{{ $row['title'] }}">
                                                        </td>
                                                    
                                                        <td>
                                                            <textarea name="details[]"
                                                                      class="form-control"
                                                                      rows="2">{{ $row['details'] }}</textarea>
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
                                        
                                        
                                        <hr class="mt-5">

                                        <h4># ATM Details</h4>
                                        
                                        
                                        <!-- ATM Heading -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="atm_heading"> Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="atm_heading" type="text" name="atm_heading" value="{{ $convenience_facility->atm_heading }}" placeholder="Enter Heading" required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>
                                        
                                        
                                        <!-- Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="atm_desc"> Description <span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="atm_desc" name="atm_desc" placeholder="Enter Description" required>{{ $convenience_facility->atm_desc }}</textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>
                                        
                                        
                            
                                       <div class="col-12">
                                            <div class="table-responsive mt-5">
                                                <table class="table table-bordered" id="atmTable">
                                                    <thead>
                                                        <tr>
                                                            <th width="20%">Icon <span class="txt-danger">*</span></th>
                                                            <th width="20%">Title <span class="txt-danger">*</span></th>
                                                            <th width="40%">Details <span class="txt-danger">*</span></th>
                                                            <th width="20%">Action <span class="txt-danger">*</span></th>
                                                        </tr>
                                                    </thead>
                                        
                                                    <tbody>

                                                        @foreach($atmDetails as $key => $row)
                                                        
                                                        <tr>
                                                        
                                                        <td>
                                                        
                                                        <input type="file"
                                                               name="atm_details[{{ $key }}][icon]"
                                                               class="form-control atm-icon-input">
                                                        
                                                                <small class="text-secondary">
                                                                    <b>Note: File size should be less than 2MB.</b>
                                                                </small>
                                                                <br>
                                                                <small class="text-secondary">
                                                                    <b>Allowed formats: .jpg, .jpeg, .png, .webp, .svg</b>
                                                                </small>
                                        
                                                        
                                                        @if(!empty($row['icon']))
                                                        <div class="mt-2 atm-preview-box" style="display:flex;">
                                                            <img src="{{ asset('uploads/convenience_facilities/'.$row['icon']) }}"
                                                                 class="atm-img-preview">
                                                        </div>
                                                        @endif
                                                        
                                                        <input type="hidden"
                                                               name="atm_details[{{ $key }}][existing_icon]"
                                                               value="{{ $row['icon'] }}">
                                                        
                                                        </td>
                                                        
                                                        <td>
                                                        <input type="text"
                                                               name="atm_details[{{ $key }}][title]"
                                                               class="form-control"
                                                               value="{{ $row['title'] }}">
                                                        </td>
                                                        
                                                        <td>
                                                        <textarea name="atm_details[{{ $key }}][details]"
                                                                  class="form-control">{{ $row['details'] }}</textarea>
                                                        </td>
                                                        
                                                        <td>
                                                        
                                                        @if($loop->first)
                                                        <button type="button" class="btn btn-success add-atm-row">
                                                            Add More
                                                        </button>
                                                        @else
                                                        <button type="button" class="btn btn-danger remove-atm-row">
                                                            Remove
                                                        </button>
                                                        @endif
                                                        
                                                        </td>
                                                        
                                                        </tr>
                                                        
                                                        @endforeach
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

  
                                        <!-- Description-->
                                        <div class="col-md-12 mt-5">
                                            <label class="form-label" for="short_atm_desc"> Short Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="short_atm_desc" name="short_atm_desc" placeholder="Enter Short Description" required>{{ $convenience_facility->short_atm_desc }}</textarea>
                                            <div class="invalid-feedback">Please enter an Short Description.</div>
                                        </div>
                                        

                                        
                                         <hr class="mt-5">

                                        <h4># Pharmacy Details</h4>
                                        
                                        
                                        <!-- Pharmacy Heading -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="pharmacy_heading"> Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="pharmacy_heading" type="text" name="pharmacy_heading" value="{{ $convenience_facility->pharmacy_heading }}" placeholder="Enter Heading" required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>

                                        <!-- Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="pharmacy_desc"> Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="pharmacy_desc" name="pharmacy_desc" placeholder="Enter Description" required>{{ $convenience_facility->pharmacy_desc }}</textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>
                                        
                                        
                                        <div class="col-12">
                                            <div class="table-responsive mt-5">
                                                <table class="table table-bordered" id="pharmacyTable">
                                                    <thead>
                                                        <tr>
                                                            <th width="20%">Icon <span class="txt-danger">*</span></th>
                                                            <th width="20%">Title <span class="txt-danger">*</span></th>
                                                            <th width="40%">Details <span class="txt-danger">*</span></th>
                                                            <th width="20%">Action <span class="txt-danger">*</span></th>
                                                        </tr>
                                                    </thead>
                                        
                                                    <tbody>

                                                        @foreach($pharmacyDetails as $key => $row)
                                                        
                                                        <tr>
                                                        
                                                        <td>
                                                        
                                                        <input type="file"
                                                               name="pharmacy_details[{{ $key }}][icon]"
                                                               class="form-control pharmacy-icon-input">
                                                               
                                                                <small class="text-secondary">
                                                                    <b>Note: File size should be less than 2MB.</b>
                                                                </small>
                                                                <br>
                                                                <small class="text-secondary">
                                                                    <b>Allowed formats: .jpg, .jpeg, .png, .webp, .svg</b>
                                                                </small>
                                        
                                                        
                                                        @if(!empty($row['icon']))
                                                        <div class="mt-2 pharmacy-preview-box" style="display:flex;">
                                                            <img src="{{ asset('uploads/convenience_facilities/'.$row['icon']) }}"
                                                                 class="pharmacy-img-preview">
                                                        </div>
                                                        @endif
                                                        
                                                        <input type="hidden"
                                                               name="pharmacy_details[{{ $key }}][existing_icon]"
                                                               value="{{ $row['icon'] }}">
                                                        
                                                        </td>
                                                        
                                                        <td>
                                                        <input type="text"
                                                               name="pharmacy_details[{{ $key }}][title]"
                                                               class="form-control"
                                                               value="{{ $row['title'] }}">
                                                        </td>
                                                        
                                                        <td>
                                                        <textarea name="pharmacy_details[{{ $key }}][details]"
                                                                  class="form-control">{{ $row['details'] }}</textarea>
                                                        </td>
                                                        
                                                        <td>
                                                        
                                                        @if($loop->first)
                                                        <button type="button" class="btn btn-success add-pharmacy-row">
                                                            Add More
                                                        </button>
                                                        @else
                                                        <button type="button" class="btn btn-danger remove-pharmacy-row">
                                                            Remove
                                                        </button>
                                                        @endif
                                                        
                                                        </td>
                                                        
                                                        </tr>
                                                        
                                                        @endforeach
                                                        
                                                    </tbody>
                                                    
                                                </table>
                                            </div>
                                        </div>
                                        



                                        <hr class="mt-5">

                                        <h4># Internet / Wi-Fi Process</h4>



                                        <!-- Internet / Wi-Fi Heading -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="internet_heading"> Heading <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="internet_heading" type="text" name="internet_heading" value="{{ $convenience_facility->internet_heading }}" placeholder="Enter Heading" required>
                                            <div class="invalid-feedback">Please enter a Heading.</div>
                                        </div>
                                        
                                        
                                        <!-- Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="internet_desc"> Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="internet_desc" name="internet_desc" placeholder="Enter Description" required>{{ $convenience_facility->internet_desc }}</textarea>
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
                                            <input class="form-control" id="faq_image" type="file" name="faq_image" onchange="previewfaqimage(event)" required>
                                            <div class="invalid-feedback">Please upload a FAQ image.</div>
                                                <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                                <br>
                                                <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                            
                                            
                                            @if($convenience_facility->faq_image)
                                                <div class="mt-2">
                                                    <img
                                                        src="{{ asset('uploads/convenience_facilities/'.$convenience_facility->faq_image) }}"
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
                                                    <input type="text"
                                                           name="faq[{{ $key }}][question]"
                                                           class="form-control"
                                                           value="{{ $faq['question'] }}">
                                                    </td>
                                                    
                                                    <td>
                                                    <textarea name="faq[{{ $key }}][answer]"
                                                              class="form-control faq-editor"
                                                              rows="3">{{ $faq['answer'] }}</textarea>
                                                    </td>
                                                    
                                                    <td>
                                                    
                                                    @if($loop->first)
                                                    <button type="button" class="btn btn-success add-faq">
                                                        Add More
                                                    </button>
                                                    @else
                                                    <button type="button" class="btn btn-danger remove-faq">
                                                        Remove
                                                    </button>
                                                    @endif
                                                    
                                                    </td>
                                                    
                                                    </tr>
                                                    
                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        

                                        <!-- Form Actions -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('admin.manage-convenience-facilities.index') }}" class="btn btn-danger px-4">Cancel</a>
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



        <!--cafeteria details---->
        <script>
        
            $(document).on('change', '.icon-input', function () {
    
                let input = this;
            
                if (input.files && input.files[0]) {
            
                    let reader = new FileReader();
            
                    reader.onload = function (e) {
            
                        let previewBox = $(input).closest('td').find('.preview-box');
                        let previewImg = previewBox.find('.img-preview');
            
                        previewImg.attr('src', e.target.result);
            
                        previewBox.css('display', 'flex'); // Show black box only after image upload
                    };
            
                    reader.readAsDataURL(input.files[0]);
                }
            });

            $(document).ready(function () {
        
            // Add New Row
            $(document).on('click', '.addRow', function () {
        
                let newRow = `
                <tr>
                    <td>
                        <input type="file" name="icon[]" class="form-control icon-input"
                            accept=".jpg,.jpeg,.png,.webp,.svg">
                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                            <br>
                            <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>

                        <input type="hidden" name="existing_icon[]" value="">

                        <div class="mt-2 preview-box" style="display:none;">
                            <img src="" class="img-preview" width="80">
                        </div>
                    </td>
        
                    <td>
                        <input type="text" name="title[]" class="form-control"
                            placeholder="Enter Title">
                    </td>
        
                    <td>
                        <textarea name="details[]" class="form-control"
                            rows="2" placeholder="Enter Details"></textarea>
                    </td>
        
                    <td class="text-center align-middle">
                        <button type="button" class="btn btn-danger removeRow">
                            Remove
                        </button>
                    </td>
                </tr>`;
        
                $('#cafeteriaTable tbody').append(newRow);
            });
        
            // Remove Row
            $(document).on('click', '.removeRow', function () {
                $(this).closest('tr').remove();
            });
        
            // Image Preview
            $(document).on('change', '.icon-input', function () {
        
                let input = this;
        
                if (input.files && input.files[0]) {
        
                    let reader = new FileReader();
        
                    reader.onload = function (e) {
                        $(input)
                            .closest('td')
                            .find('.img-preview')
                            .attr('src', e.target.result)
                            .show();
                    }
        
                    reader.readAsDataURL(input.files[0]);
                }
            });
        
        });
        </script>
        

        <script>
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


        <!----- Js for ATM Facility Table-------->
        <script>
            document.addEventListener('DOMContentLoaded', function () {

                // Start the counter AFTER all existing rows so new rows never overwrite them
                let atmIndex = {{ count($atmDetails) }};
            
                // Add Row
                document.querySelector('#atmTable').addEventListener('click', function(e){
            
                    if(e.target.classList.contains('add-atm-row')){
            
                        const tbody = this.querySelector('tbody');
            
                        const row = document.createElement('tr');
            
                        row.innerHTML = `
                            <td>
                                <input type="file"
                                       name="atm_details[${atmIndex}][icon]"
                                       class="form-control atm-icon-input"
                                       accept=".jpg,.jpeg,.png,.webp,.svg">

                                <input type="hidden"
                                       name="atm_details[${atmIndex}][existing_icon]"
                                       value="">
            
                                <small class="text-secondary">
                                    <b>Note: File size should be less than 2MB.</b>
                                </small>
                                <br>
                                <small class="text-secondary">
                                    <b>Allowed formats: .jpg, .jpeg, .png, .webp, .svg</b>
                                </small>
            
                                <div class="mt-2 atm-preview-box" style="display:none;">
                                    <img src="" class="atm-img-preview">
                                </div>
                            </td>
            
                            <td>
                                <input type="text"
                                       name="atm_details[${atmIndex}][title]"
                                       class="form-control"
                                       placeholder="Enter Title">
                            </td>
            
                            <td>
                                <textarea name="atm_details[${atmIndex}][details]"
                                          class="form-control"
                                          rows="3"
                                          placeholder="Enter Details"></textarea>
                            </td>
            
                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-danger remove-atm-row">
                                    Remove
                                </button>
                            </td>
                        `;
            
                        tbody.appendChild(row);
                        atmIndex++;
                    }
                });
            
                // Remove Row
                document.querySelector('#atmTable').addEventListener('click', function(e){
            
                    if(e.target.classList.contains('remove-atm-row')){
                        e.target.closest('tr').remove();
                    }
                });
            
                // Preview Image
                document.querySelector('#atmTable').addEventListener('change', function(e){
            
                    if(e.target.classList.contains('atm-icon-input')){
            
                        const file = e.target.files[0];
            
                        if(file){
            
                            const previewBox = e.target.closest('td').querySelector('.atm-preview-box');
                            const previewImg = previewBox.querySelector('.atm-img-preview');
            
                            const reader = new FileReader();
            
                            reader.onload = function(event){
                                previewImg.src = event.target.result;
                                previewBox.style.display = 'flex';
                            };
            
                            reader.readAsDataURL(file);
                        }
                    }
                });
            
            });
        </script>

        
        <!----- Js for Pharmacy Table-------->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
        
            // Start the counter AFTER all existing rows so new rows never overwrite them
            let pharmacyIndex = {{ count($pharmacyDetails) }};
        
            document.querySelector('#pharmacyTable').addEventListener('click', function(e){
        
                if(e.target.classList.contains('add-pharmacy-row')){
        
                    const tbody = this.querySelector('tbody');
        
                    const row = document.createElement('tr');
        
                    row.innerHTML = `
                        <td>
                            <input type="file"
                                   name="pharmacy_details[${pharmacyIndex}][icon]"
                                   class="form-control pharmacy-icon-input"
                                   accept=".jpg,.jpeg,.png,.webp,.svg">

                            <input type="hidden"
                                   name="pharmacy_details[${pharmacyIndex}][existing_icon]"
                                   value="">
        
                            <small class="text-secondary">
                                <b>Note: File size should be less than 2MB.</b>
                            </small>
                            <br>
                            <small class="text-secondary">
                                <b>Allowed formats: .jpg, .jpeg, .png, .webp, .svg</b>
                            </small>
        
                            <div class="mt-2 pharmacy-preview-box" style="display:none;">
                                <img src="" class="pharmacy-img-preview">
                            </div>
                        </td>
        
                        <td>
                            <input type="text"
                                   name="pharmacy_details[${pharmacyIndex}][title]"
                                   class="form-control"
                                   placeholder="Enter Title">
                        </td>
        
                        <td>
                            <textarea name="pharmacy_details[${pharmacyIndex}][details]"
                                      class="form-control"
                                      rows="3"
                                      placeholder="Enter Details"></textarea>
                        </td>
        
                        <td class="text-center align-middle">
                            <button type="button" class="btn btn-danger remove-pharmacy-row">
                                Remove
                            </button>
                        </td>
                    `;
        
                    tbody.appendChild(row);
                    pharmacyIndex++;
                }
        
                if(e.target.classList.contains('remove-pharmacy-row')){
                    e.target.closest('tr').remove();
                }
            });
        
            document.querySelector('#pharmacyTable').addEventListener('change', function(e){
        
                if(e.target.classList.contains('pharmacy-icon-input')){
        
                    const file = e.target.files[0];
        
                    if(file){
        
                        const previewBox = e.target.closest('td').querySelector('.pharmacy-preview-box');
                        const previewImg = previewBox.querySelector('.pharmacy-img-preview');
        
                        const reader = new FileReader();
        
                        reader.onload = function(event){
                            previewImg.src = event.target.result;
                            previewBox.style.display = 'flex';
                        };
        
                        reader.readAsDataURL(file);
                    }
                }
            });
        
        });
        </script>


        <!-- JS for cashless editor -->
        <script>
            ClassicEditor.create(document.querySelector('#atm_desc'), {
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

                document.querySelectorAll('#pharmacy_desc').forEach(textarea => {

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
            ClassicEditor.create(document.querySelector('#internet_desc'), {
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
            // Start the counter AFTER all existing rows so new rows never overwrite them
            let faqIndex = {{ count($faqData) }};

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


        <!-- JS for Cafeteria editor -->
        <script>
            ClassicEditor.create(document.querySelector('#cafeteria_desc'), {
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