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
                  <h4>Edit Virtual Tour Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-virtual-tour.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Virtual Tour</li>
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
                        <h4>Virtual Tour Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                    <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('admin.manage-virtual-tour.update', $tour->id) }}" method="POST" enctype="multipart/form-data" id="testimonialForm">
                                        @csrf
                                        @method('PUT')
                                
                                        <!-- Title -->
                                        <div class="col-md-6 mt-5 video-fields">
                                            <label class="form-label" for="title">Title <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="title" type="text" name="title" placeholder="Enter Title" value="{{ old('title', $tour->title) }}">
                                            <div class="invalid-feedback">Please enter a Title.</div>
                                        </div>
                                
                                        <!-- Description -->
                                        <div class="col-md-12 mt-4 text-fields">
                                            <label class="form-label" for="testimonial">Testimonial <span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="editor" name="testimonial" rows="4" placeholder="Enter the testimonial">{{ old('testimonial', $tour->testimonial) }}</textarea>
                                            <div class="invalid-feedback">Please enter the testimonial.</div>
                                        </div>
                                
                                        <!-- Thumbnail -->
                                        <div class="col-md-6 mt-4 video-fields">
                                            <label class="form-label" for="thumbnail">Thumbnail Image</label>
                                            <input class="form-control" id="thumbnail" type="file" name="thumbnail" accept="image/*" onchange="previewThumbnail(event)">
                                            <div class="invalid-feedback">Please upload a thumbnail image.</div>
                                            <small class="text-secondary"><b>Leave blank to keep current image. Only .jpg, .jpeg, .png, .webp allowed. Max 2MB.</b></small>
                                
                                            <!-- Thumbnail Preview (shows existing on load) -->
                                            <div class="mt-2">
                                                @if($tour->thumbnail)
                                                    <img id="thumbnailPreview" src="{{ asset('uploads/virtual-tour/thumbnails/' . $tour->thumbnail) }}" alt="Thumbnail Preview" class="img-fluid rounded border" style="max-height: 150px;">
                                                @else
                                                    <img id="thumbnailPreview" src="#" alt="Thumbnail Preview" class="img-fluid rounded border d-none" style="max-height: 150px;">
                                                @endif
                                            </div>
                                        </div>
                                
                                        <!-- Video -->
                                        <div class="col-md-6 mt-4 video-fields">
                                            <label class="form-label" for="video">Virtual Tour Video</label>
                                            <input class="form-control" id="video" type="file" name="video" accept="video/*" onchange="previewVideo(event)">
                                            <div class="invalid-feedback">Please upload a video.</div>
                                            <small class="text-secondary"><b>Leave blank to keep current video. The file size should be less than 10MB.</b></small>
                                
                                            <!-- Video Preview (shows existing on load) -->
                                            <div class="mt-2">
                                                @if($tour->video)
                                                    <video id="videoPreview" controls class="img-fluid rounded border" style="max-height: 200px;" src="{{ asset('uploads/virtual-tour/' . $tour->video) }}"></video>
                                                @else
                                                    <video id="videoPreview" controls class="img-fluid rounded border d-none" style="max-height: 200px;"></video>
                                                @endif
                                            </div>
                                        </div>
                                
                                        <!-- Form Actions -->
                                        <div class="col-12 text-end mt-4">
                                            <a href="{{ route('admin.manage-virtual-tour.index') }}" class="btn btn-danger px-4">Cancel</a>
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
        <!-- footer start-->
        @include('components.backend.footer')
        </div>
        </div>
       
        @include('components.backend.main-js')
       
        <script>
            function previewThumbnail(event) {
                const input = event.target;
                const preview = document.getElementById('thumbnailPreview');
                const file = input.files[0];
            
                if (file) {
                    preview.src = URL.createObjectURL(file);
                    preview.classList.remove('d-none');
                } else {
                    preview.src = '#';
                    preview.classList.add('d-none');
                }
            }
            
            function previewVideo(event) {
                const input = event.target;
                const preview = document.getElementById('videoPreview');
                const file = input.files[0];
            
                if (file) {
                    preview.src = URL.createObjectURL(file);
                    preview.classList.remove('d-none');
                } else {
                    preview.removeAttribute('src');
                    preview.classList.add('d-none');
                }
            }
        </script>

</body>

</html>