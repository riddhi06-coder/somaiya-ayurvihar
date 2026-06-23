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
                  <h4>Edit Career Listing Details Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-career.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Career Listing Details</li>
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
                        <h4>Career Listing Details Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                               <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel">

                                    <form class="row g-3 needs-validation custom-input"
                                          novalidate
                                          action="{{ route('admin.manage-career.update', $career_listing->id) }}"
                                          method="POST"
                                          enctype="multipart/form-data">
                                
                                        @csrf
                                        @method('PUT')
                                
                                        <!-- Job Role -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label">Job Role <span class="txt-danger">*</span></label>
                                            <input class="form-control"
                                                   type="text"
                                                   name="job_role"
                                                   value="{{ old('job_role', $career_listing->job_heading) }}"
                                                   required>
                                        </div>
                                
                                        <!-- Job Location -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label">Job Location <span class="txt-danger">*</span></label>
                                            <input class="form-control"
                                                   type="text"
                                                   name="job_location"
                                                   value="{{ old('job_location', $career_listing->job_location) }}"
                                                   required>
                                        </div>
                                
                                        <!-- Description -->
                                        <div class="col-md-12">
                                            <label class="form-label">short Description <span class="txt-danger">*</span></label>
                                            <textarea class="form-control"
                                                      id="editor"
                                                      name="desc"
                                                      required>{{ old('desc', $career_listing->desc) }}</textarea>
                                        </div>
                                
                                        <!-- Actions -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('admin.manage-career.index') }}" class="btn btn-danger px-4">Cancel</a>
                                            <button class="btn btn-primary" type="submit">Update</button>
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


</body>

</html>