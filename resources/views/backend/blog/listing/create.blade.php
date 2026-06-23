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
                  <h4>Add Blogs Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-blogs.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Add Blogs</li>
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
                        <h4>Blogs Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                    <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('admin.manage-blogs.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <!-- Blog Title -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="title">Title <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="title" type="text" name="title" placeholder="Enter Title" required>
                                            <div class="invalid-feedback">Please enter a Title.</div>
                                        </div>
                                        
                                        
                                        
                                                                       

                                        <!-- Blog Image -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="blog_image"> Blog Image <span class="txt-danger">*</span> </label>
                                            <input class="form-control" id="blog_image" type="file" name="blog_image" onchange="previewimage(event)" required>
                                            <div class="invalid-feedback">Please upload a Blog image.</div>
                                                <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                                <br>
                                                <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                            
                                            <!-- Image Preview -->
                                            <div class="mt-2">
                                                <img id="imagePreview" src="#" alt="Preview" class="img-fluid rounded border d-none" style="max-height: 150px; background:black;">
                                            </div>
                                        </div>


                                        
                                        
                                          <!-- Blog Author -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="author">Author <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="author" type="text" name="author" placeholder="Enter Author" required>
                                            <div class="invalid-feedback">Please enter a Author.</div>
                                        </div>


                                        <!-- Date Selection -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="date">Date <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="date" type="date" name="date" required>
                                            <div class="invalid-feedback">Please select a date.</div>
                                        </div>
         

                                        <div class="col-md-12 mt-5">
                                            <label class="form-label">Blog Short Description <span class="txt-danger">*</span></label>
                                            
                                            <textarea class="form-control"
                                                      id="editor"
                                                      name="blog_details"
                                                      rows="6"
                                                      placeholder="Enter Job Details"
                                                      required>{{ old('blog_details') }}</textarea>
                                        
                                            <div class="invalid-feedback">Please enter Job Details.</div>
                                        </div>


                                        <!-- Form Actions -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('admin.manage-blogs.index') }}" class="btn btn-danger px-4">Cancel</a>
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
            function previewimage(event) {
                const input = event.target;
                const preview = document.getElementById('imagePreview');

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
        
        

</body>

</html>