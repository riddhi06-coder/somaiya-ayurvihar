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
                  <h4>Add Career Listing Details Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-career.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Add Career Listing Details</li>
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
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                    <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('admin.manage-career.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <!-- Job Role -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="job_role"> Job Role <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="job_role" type="text" name="job_role" placeholder="Enter Job Role" required>
                                            <div class="invalid-feedback">Please enter a Job Role.</div>
                                        </div>
                                        
                                        
                                        
                                        <!-- Job Location-->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="job_location">Job Location <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="job_location" type="text" name="job_location" placeholder="Enter Job Location" required>
                                            <div class="invalid-feedback">Please enter a Job Location.</div>
                                        </div>



                                        <!-- Short Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="about">Short Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="editor" name="desc" placeholder="Enter Description" required></textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>


                                        <!-- Form Actions -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('admin.manage-career.index') }}" class="btn btn-danger px-4">Cancel</a>
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


</body>

</html>