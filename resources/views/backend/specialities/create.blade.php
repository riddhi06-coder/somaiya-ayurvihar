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
                  <h4>Add Specialities Details Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-specialities.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Add Specialities Details</li>
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
                        <h4>Specialities Details Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                    <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('admin.manage-specialities.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        {{-- Subcategory --}}
                                        <div class="col-md-6">
                                            <label class="form-label">
                                                Sub Category <span class="txt-danger">*</span>
                                            </label>
                                            <select name="subcategory_id"
                                                    id="subcategory_id"
                                                    class="form-control"
                                                    required>
                                                <option value="">Select Sub Category</option>
                                                @foreach($subCategories as $subcat)
                                                    <option value="{{ $subcat->id }}"
                                                            data-category="{{ $subcat->category_id }}"
                                                            {{ isset($service) && $service->subcategory_id == $subcat->id ? 'selected' : '' }}>
                                                        {{ $subcat->subcategory_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                      
                                        <hr class="mt-5">

                                        <h4># Specialities Details</h4>


                                        <!-- Specialities Image -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="specialities_image"> Specialities Image <span class="txt-danger">*</span> </label>
                                            <input class="form-control" id="specialities_image" type="file" name="specialities_image" onchange="previewimage(event)" required>
                                            <div class="invalid-feedback">Please upload a Specialities image.</div>
                                                <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                                <br>
                                                <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                            
                                            <!-- Image Preview -->
                                            <div class="mt-2">
                                                <img id="imagePreview" src="#" alt="Preview" class="img-fluid rounded border d-none"  style="max-height: 150px; background: white; padding:10px;">
                                            </div>
                                        </div>


                                        <!-- Short Description-->
                                        <div class="col-md-12">
                                            <label class="form-label" for="desc">Short Description<span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="editor" name="desc" placeholder="Enter Short Description" required></textarea>
                                            <div class="invalid-feedback">Please enter an Short Description.</div>
                                        </div>


                                        <!-- Form Actions -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('admin.manage-specialities.index') }}" class="btn btn-danger px-4">Cancel</a>
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