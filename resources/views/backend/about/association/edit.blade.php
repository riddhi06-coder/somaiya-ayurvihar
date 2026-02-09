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
                  <h4>Edit Chairman's Message Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-associations.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Chairman's Message</li>
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

                                    <form class="row g-3 needs-validation custom-input"
                                        novalidate
                                        action="{{ route('admin.manage-associations.update', $association->id) }}"
                                        method="POST"
                                        enctype="multipart/form-data">

                                        @csrf
                                        @method('PUT')

                                        <!-- Association Name -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label">Association Name <span class="text-danger">*</span></label>
                                            <input class="form-control"
                                                type="text"
                                                name="asso_name"
                                                value="{{ old('asso_name', $association->asso_name) }}"
                                                required>

                                            <div class="invalid-feedback">Please enter Association Name.</div>
                                        </div>

                                        <!-- Association Contact -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label">Association Contact <span class="text-danger">*</span></label>
                                            <input class="form-control"
                                                type="text"
                                                name="assoc_contact"
                                                value="{{ old('assoc_contact', $association->assoc_contact) }}"
                                                required>

                                            <div class="invalid-feedback">Please enter Association Contact.</div>
                                        </div>

                                        <!-- Association Website URL -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label">Association Website URL <span class="text-danger">*</span></label>
                                            <input class="form-control"
                                                type="text"
                                                name="assoc_url"
                                                value="{{ old('assoc_url', $association->assoc_url) }}"
                                                required>

                                            <div class="invalid-feedback">Please enter Association Website URL.</div>
                                        </div>

                                        <!-- Association Description -->
                                        <div class="col-md-12 mt-5">
                                            <label>Association Description <span class="text-danger">*</span></label>

                                            <textarea name="assoc_desc"
                                                    class="form-control"
                                                    rows="5"
                                                    required>{{ old('assoc_desc', $association->assoc_desc) }}</textarea>
                                        </div>

                                        <!-- Buttons -->
                                        <div class="col-12 text-end mt-4">
                                            <a href="{{ route('admin.manage-associations.index') }}" class="btn btn-danger px-4">Cancel</a>
                                            <button class="btn btn-primary">Update</button>
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