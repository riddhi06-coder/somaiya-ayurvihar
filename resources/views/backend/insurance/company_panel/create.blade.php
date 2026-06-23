<!doctype html>
<html lang="en">
    
<head>
    @include('components.backend.head')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">

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
                  <h4>Add Insurance Company Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-company-panel.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Add Insurance Company</li>
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
                        <h4>Insurance Company Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                    <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('admin.manage-company-panel.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf


                                        <!-- Insurance Type -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="insurance_type">Insurance Type<span class="txt-danger">*</span></label>
                                            <input class="form-control" id="insurance_type" type="text" name="insurance_type" placeholder="Enter Insurance Type" required>
                                            <div class="invalid-feedback">Please enter a Insurance Type.</div>
                                        </div>
                                        
                                        
                                        <div class="col-12 mt-4">
                                            <label class="form-label">Insurance Companies</label>
                                        
                                            <table class="table table-bordered" id="companyTable">
                                                <thead>
                                                    <tr>
                                                        <th>Company Name <span class="txt-danger">*</span></th>
                                                        <th>Logo <span class="txt-danger">*</span></th>
                                                        <th width="120">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="company_name[]" class="form-control" placeholder="Enter Company Name" required>
                                                        </td>
                                                        <td>
                                                            <input type="file" name="company_logo[]" class="form-control company-logo" accept="image/*" required>
                                                        
                                                            
                                                        
                                                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small><br>
                                                            <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                                            <br>
                                                            <img class="preview-img mt-2" width="150px;" style="display:none; border-radius:5px;" />
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-success add-row">Add</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>


                                        <!-- Form Actions -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('admin.manage-company-panel.index') }}" class="btn btn-danger px-4">Cancel</a>
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
       
       
        <script>
            $(document).on('change', '.company-logo', function () {

                let input = this;
                let file = input.files[0];
            
                if (file) {
                    let reader = new FileReader();
            
                    reader.onload = function (e) {
                        let preview = $(input).closest('td').find('.preview-img');
                        preview.attr('src', e.target.result);
                        preview.show();
                    }
            
                    reader.readAsDataURL(file);
                }
            });
        </script>
       
        <script>
            $(document).ready(function () {
        
                // Add Row
                $(document).on('click', '.add-row', function () {
                    let row = `
                        <tr>
                            <td>
                                <input type="text" name="company_name[]" class="form-control" placeholder="Enter Company Name" required>
                            </td>
                            <td>
                                <input type="file" name="company_logo[]" class="form-control company-logo" accept="image/*" required>
                        
                               
                        
                                <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                <br>
                                <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                <br>
                                 <img class="preview-img mt-2" width="150px;" style="display:none; border-radius:5px;" />
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger remove-row">Remove</button>
                            </td>
                        </tr>
                        `;
                    $('#companyTable tbody').append(row);
                });
        
                // Remove Row
                $(document).on('click', '.remove-row', function () {
                    $(this).closest('tr').remove();
                });
        
            });
        </script>


</body>

</html>