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
                  <h4>Edit Career Details Details Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-details.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Career Details Details</li>
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
                              <div class="tab-pane fade show active" id="wizard-contact">

                                    <form class="row g-3 needs-validation custom-input"
                                          novalidate
                                          action="{{ route('admin.manage-details.update', $job_details->id) }}"
                                          method="POST"
                                          enctype="multipart/form-data">
                                    
                                        @csrf
                                        @method('PUT')
                                    
                                        <!-- Job Role Dropdown -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label">Select Job Role <span class="txt-danger">*</span></label>
                                            
                                            <select class="form-control" name="job_id" required>
                                                <option value="">-- Select Job Role --</option>
                                    
                                                @foreach($jobs as $job)
                                                    <option value="{{ $job->id }}"
                                                        {{ old('job_id', $job_details->job_id) == $job->id ? 'selected' : '' }}>
                                                        {{ $job->job_heading }}
                                                    </option>
                                                @endforeach
                                    
                                            </select>
                                        </div>
                                    
                                        <!-- Department -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label">Department <span class="txt-danger">*</span></label>
                                            <input class="form-control"
                                                   type="text"
                                                   name="department"
                                                   value="{{ old('department', $job_details->department) }}"
                                                   required>
                                        </div>
                                    
                                        <!-- Experience -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label">Experience <span class="txt-danger">*</span></label>
                                            <input class="form-control"
                                                   type="text"
                                                   name="experience"
                                                   value="{{ old('experience', $job_details->experience) }}"
                                                   required>
                                        </div>
                                    
                                        <!-- Job Type -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label">Job Type <span class="txt-danger">*</span></label>
                                            <input class="form-control"
                                                   type="text"
                                                   name="job_type"
                                                   value="{{ old('job_type', $job_details->job_type) }}"
                                                   required>
                                        </div>
                                    
                                        <!-- Job Details -->
                                        <div class="col-md-12 mt-5">
                                            <label class="form-label">Job Details <span class="txt-danger">*</span></label>
                                            <textarea class="form-control"
                                                      id="job_details"
                                                      name="job_details"
                                                      required>{{ old('job_details', $job_details->job_details) }}</textarea>
                                        </div>
                                    
                                        <!-- Job Description -->
                                        <div class="col-md-12 mt-5">
                                            <label class="form-label">Job Description <span class="txt-danger">*</span></label>
                                            <textarea class="form-control"
                                                      id="editor"
                                                      name="desc"
                                                      required>{{ old('desc', $job_details->desc) }}</textarea>
                                        </div>
                                    
                                        <!-- Actions -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('admin.manage-details.index') }}" class="btn btn-danger px-4">Cancel</a>
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