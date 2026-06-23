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
                  <h4>Add Awards & Accolades Details Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-quality-awards.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Add Awards & Accolades Details</li>
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
                        <h4>Awards & Accolades Details Form</h4>
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
                                          action="{{ route('admin.manage-quality-awards.update', $awards->id) }}"
                                          method="POST"
                                          enctype="multipart/form-data">
                                    
                                        @csrf
                                        @method('PUT')
                                        
                                        
                                        @if($awards->id == 1)

                                            <!-- Heading -->
                                            <div class="col-md-6">
                                                <label class="form-label" for="heading">Heading</label>
                                        
                                                <input class="form-control"
                                                       id="heading"
                                                       type="text"
                                                       name="heading"
                                                       value="{{ old('heading', $awards->heading) }}"
                                                       placeholder="Enter Heading">
                                        
                                                <div class="invalid-feedback">Please enter a Heading.</div>
                                            </div>
                                        
                                            <hr class="mt-5">
                                            <br><br><br>
                                        
                                        @endif
                                         <!-- Certification Name -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="certification_name"> Certification Name <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="certification_name" type="text" value="{{ old('certification_name', $awards->certification_name) }}" name="certification_name" placeholder="Enter Certification Name" required>
                                            <div class="invalid-feedback">Please enter a Certification Name.</div>
                                        </div>


                                        <!-- Banner Image -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="banner_image">
                                                Image <span class="txt-danger">*</span>
                                            </label>
                                        
                                            <input class="form-control" id="banner_image" type="file" name="banner_image"
                                                accept="image/*" onchange="previewBanner(event)">
                                        
                                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small><br>
                                            <small class="text-secondary"><b>Note: Only .jpg, .jpeg, .png, .webp, .svg allowed.</b></small>
                                        
                                            <div class="invalid-feedback">Please upload a banner image.</div>
                                        
                                            <!-- Preview BELOW input -->
                                            <div class="mt-3">
                                                <img id="bannerPreview" src="#" alt="Preview"
                                                    style="max-width: 100%; height: auto; display: none; border-radius: 8px; border: 1px solid #ddd;">
                                            </div>
                                            
                                            <div class="mt-3">
                                                <img src="{{ asset('uploads/awards/'.$awards->banner_image) }}"
                                                     style="max-width: 150px; border-radius: 8px; border: 1px solid #ddd;">
                                            </div>
    
                                        </div>
                                        
                                        
                                        <!-- Short Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="about">Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="editor" name="desc" placeholder="Enter Description" required>{{ old('desc', $awards->desc) }}</textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>


                                       
                                        <!-- Form Actions -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('admin.manage-quality-awards.index') }}" class="btn btn-danger px-4">Cancel</a>
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
        <!-- footer start11-->
        @include('components.backend.footer')
        </div>
        </div>
       
       @include('components.backend.main-js')

        
        <script>
            function previewBanner(event) {
                const input = event.target;
                const preview = document.getElementById('bannerPreview');
            
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
            
                    reader.onload = function (e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    };
            
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>

</body>

</html>