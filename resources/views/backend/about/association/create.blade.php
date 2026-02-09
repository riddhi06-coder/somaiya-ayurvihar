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
                  <h4>Add Chairman's Message Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-associations.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Add Chairman's Message</li>
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
                        <h4>Chairman's Message Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                    <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('admin.manage-associations.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf


                                        <!-- Association Name -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="asso_name">Association Name <span class="text-danger">*</span> </label>
                                            <input class="form-control" id="asso_name" type="text" name="asso_name" placeholder="Enter Association Name" required>
                                            <div class="invalid-feedback">Please enter a Association Name.</div>
                                        </div>


                                        <!-- Association Contact -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="assoc_contact"> Association Contact <span class="text-danger">*</span> </label>
                                            <input class="form-control" id="assoc_contact" type="text" name="assoc_contact" placeholder="Enter Association Contact" required>
                                            <div class="invalid-feedback">Please enter a Association Contact.</div>
                                        </div>


                                        <!-- Association Website URl -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="assoc_url"> Association Website URl <span class="text-danger">*</span> </label>
                                            <input class="form-control" id="assoc_url" type="text" name="assoc_url" placeholder="Enter Association Website URL" required>
                                            <div class="invalid-feedback">Please enter a Association Website URl.</div>
                                        </div>

                                        
                                        <!-- Association Description -->
                                        <div class="form-group">
                                            <label>Association Description <span class="text-danger">*</span> </label>
                                            <textarea name="assoc_desc" id="assoc_desc" class="form-control" rows="5" required></textarea>
                                        </div>

                                        
                                        <!-- Form Actions -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('admin.manage-associations.index') }}" class="btn btn-danger px-4">Cancel</a>
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


</body>

</html>