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
                  <h4>Edit Blog Details Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-b-details.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Add Edit Blog Details</li>
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
                        <h4>Blog Form</h4>
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
                                              action="{{ route('admin.manage-b-details.update', $blog_details->id) }}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                        
                                            @csrf
                                            @method('PUT')
                                        
                                            <!-- Blog Dropdown -->
                                            <div class="form-group">
                                                <label>Select Blog <span class="txt-danger">*</span></label>
                                        
                                                <select name="blog_id" class="form-control" required>
                                                    <option value="">Select Blog</option>
                                        
                                                    @foreach($blog as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $item->id == $blog_details->blog_id ? 'selected' : '' }}>
                                                            
                                                            {{ $item->title }} ({{ \Carbon\Carbon::parse($item->date)->format('d M Y') }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        
                                            <!-- Image -->
                                            <div class="col-md-6 mt-5">
                                                <label>Blog Image <span class="txt-danger">*</span></label>
                                        
                                                <input type="file"
                                                       name="announce_image"
                                                       class="form-control"
                                                       onchange="previewimage(event)">
                                                <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                                <br>
                                                <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                        
                                                <!-- OLD IMAGE -->
                                                <div class="mt-2">
                                                    @if($blog_details->announce_image)
                                                        <img id="imagePreview"
                                                             src="{{ asset('uploads/blog-details/' . $blog_details->announce_image) }}"
                                                             class="img-fluid rounded border"
                                                             style="max-height:150px;">
                                                    @else
                                                        <img id="imagePreview"
                                                             class="img-fluid rounded border d-none"
                                                             style="max-height:150px;">
                                                    @endif
                                                </div>
                                            </div>
                                        
                                            <!-- Description -->
                                            <div class="col-md-12 mt-3">
                                                <label>Description <span class="txt-danger">*</span></label>
                                        
                                                <textarea class="form-control"
                                                          id="editor"
                                                          name="description"
                                                          required>{{ old('description', $blog_details->description) }}</textarea>
                                            </div>
                                        
                                            <!-- Tags -->
                                            <div class="col-md-12 mt-5">
                                                <label>Tags </label>
                                        
                                                <input type="text"
                                                       class="form-control"
                                                       name="tags"
                                                       value="{{ old('tags', implode(',', json_decode($blog_details->tags, true) ?? [])) }}">
                                            </div>
                                        
                                            <!-- Actions -->
                                            <div class="col-12 text-end">
                                                <a href="{{ route('admin.manage-b-details.index') }}" class="btn btn-danger px-4">Cancel</a>
                                                <button class="btn btn-primary">Update</button>
                                            </div>
                                        
                                        </form>                                </div>
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