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
                  <h4>Add Career Details Details Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-details.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Add Career Details Details</li>
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
                        <h4>Career Details Details Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                    <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('admin.manage-details.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        
                                        
                                        
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label">Select Job Role <span class="txt-danger">*</span></label>
                                            
                                            <select class="form-control" name="job_id" required>
                                                <option value="">-- Select Job Role --</option>
                                        
                                                @foreach($jobs as $job)
                                                    <option value="{{ $job->id }}">
                                                        {{ $job->job_heading }}
                                                    </option>
                                                @endforeach
                                        
                                            </select>
                                        
                                            <div class="invalid-feedback">Please select a Job Role.</div>
                                        </div>
                                        

                                        <!-- Department -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="department"> Department <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="department" type="text" name="department" placeholder="Enter Department" required>
                                            <div class="invalid-feedback">Please enter a Department.</div>
                                        </div>
                                        
                                        
                                        
                                        <!-- Experience-->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="experience">Experience <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="experience" type="text" name="experience" placeholder="Enter Experience" required>
                                            <div class="invalid-feedback">Please enter a Experience.</div>
                                        </div>
                                        
                                        
                                        <!-- Job Type-->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="job_type">Job Type <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="job_type" type="text" name="job_type" placeholder="Enter Job Type" required>
                                            <div class="invalid-feedback">Please enter a Job Type.</div>
                                        </div>
                                        
                                        
                                        <!-- Job Details-->
                                        <div class="col-md-12 mt-5">
                                            <label class="form-label" for="about">Job Details<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="job_details" name="job_details" placeholder="Enter Details" required></textarea>
                                            <div class="invalid-feedback">Please enter an Details.</div>
                                        </div>


                                        <!-- Job Description-->
                                        <div class="col-md-12 mt-5">
                                            <label class="form-label" for="about">Job Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="editor" name="desc" placeholder="Enter Description" required></textarea>
                                            <div class="invalid-feedback">Please enter an Description.</div>
                                        </div>


                                        <!-- Form Actions -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('admin.manage-details.index') }}" class="btn btn-danger px-4">Cancel</a>
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