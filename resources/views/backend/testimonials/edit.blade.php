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
                  <h4>Add Testimonials Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-testimonials.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Add Testimonials</li>
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
                        <h4>Testimonials Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                               <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                    <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('admin.manage-testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data" id="testimonialForm">
                                        @csrf
                                        @method('PUT')
                                
                                        <!-- Testimonial Type -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="type">Testimonial Type <span class="txt-danger">*</span></label>
                                            <select class="form-control" id="type" name="type" required>
                                                <option value="">-- Select Type --</option>
                                                <option value="text"  {{ $testimonial->type == 'text' ? 'selected' : '' }}>Text</option>
                                                <option value="video" {{ $testimonial->type == 'video' ? 'selected' : '' }}>Video</option>
                                            </select>
                                            <div class="invalid-feedback">Please select a testimonial type.</div>
                                        </div>
                                
                                        <!-- Title (video only) -->
                                        <div class="col-md-6 mt-5 video-fields d-none">
                                            <label class="form-label" for="title">Title <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="title" type="text" name="title" placeholder="Enter Title" value="{{ old('title', $testimonial->title) }}">
                                            <div class="invalid-feedback">Please enter a Title.</div>
                                        </div>
                                
                                        <!-- TEXT FIELDS -->
                                        <div class="col-md-12 mt-4 text-fields">
                                            <label class="form-label" for="testimonial">Testimonial <span class="txt-danger">*</span></label>
                                            <textarea class="form-control" id="editor" name="testimonial" rows="4" placeholder="Enter the testimonial">{{ old('testimonial', $testimonial->testimonial) }}</textarea>
                                            <div class="invalid-feedback">Please enter the testimonial.</div>
                                        </div>
                                
                                        <div class="col-md-4 mt-4 text-fields">
                                            <label class="form-label" for="rating">Rating (out of 5) <span class="txt-danger">*</span></label>
                                            <select class="form-control" id="rating" name="rating">
                                                <option value="">-- Select Rating --</option>
                                                @for($i = 1; $i <= 5; $i++)
                                                    <option value="{{ $i }}" {{ (string) old('rating', $testimonial->rating) === (string) $i ? 'selected' : '' }}>{{ $i }}</option>
                                                @endfor
                                            </select>
                                            <div class="invalid-feedback">Please select a rating.</div>
                                        </div>
                                
                                        <div class="col-md-4 mt-4 text-fields">
                                            <label class="form-label" for="person_name">Name of Person <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="person_name" type="text" name="person_name" placeholder="Enter Name" value="{{ old('person_name', $testimonial->person_name) }}">
                                            <div class="invalid-feedback">Please enter the person's name.</div>
                                        </div>
                                
                                        <div class="col-md-4 mt-4 text-fields">
                                            <label class="form-label" for="person_role">Role <span class="txt-danger">*</span></label>
                                            <select class="form-control" id="person_role" name="person_role">
                                                <option value="">-- Select Role --</option>
                                                @foreach(['Patient', 'Doctor', 'Admin'] as $role)
                                                    <option value="{{ $role }}" {{ old('person_role', $testimonial->person_role) == $role ? 'selected' : '' }}>{{ $role }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Please select a role.</div>
                                        </div>
                                
                                        <!-- THUMBNAIL (video only) -->
                                        <div class="col-md-6 mt-4 video-fields d-none">
                                            <label class="form-label" for="thumbnail">Thumbnail Image</label>
                                            <input class="form-control" id="thumbnail" type="file" name="thumbnail" accept="image/*" onchange="previewThumbnail(event)">
                                            <div class="invalid-feedback">Please upload a thumbnail image.</div>
                                            <small class="text-secondary"><b>Leave blank to keep the existing image. Only .jpg, .jpeg, .png, .webp, Max 2MB.</b></small>
                                
                                            <div class="mt-2">
                                                {{-- existing thumbnail --}}
                                                @if($testimonial->thumbnail)
                                                    <img id="thumbnailPreview" src="{{ asset('uploads/testimonials/thumbnails/' . $testimonial->thumbnail) }}" alt="Thumbnail Preview" class="img-fluid rounded border" style="max-height: 150px;">
                                                @else
                                                    <img id="thumbnailPreview" src="#" alt="Thumbnail Preview" class="img-fluid rounded border d-none" style="max-height: 150px;">
                                                @endif
                                            </div>
                                        </div>
                                
                                        <!-- VIDEO (video only) -->
                                        <div class="col-md-6 mt-4 video-fields d-none">
                                            <label class="form-label" for="video">Testimonial Video</label>
                                            <input class="form-control" id="video" type="file" name="video" accept="video/*" onchange="previewVideo(event)">
                                            <div class="invalid-feedback">Please upload a video.</div>
                                            <small class="text-secondary"><b>Leave blank to keep the existing video. Max 5MB.</b></small>
                                
                                            <div class="mt-2">
                                                @if($testimonial->video)
                                                    <video id="videoPreview" controls class="img-fluid rounded border" style="max-height: 200px;" src="{{ asset('uploads/testimonials/' . $testimonial->video) }}"></video>
                                                @else
                                                    <video id="videoPreview" controls class="img-fluid rounded border d-none" style="max-height: 200px;"></video>
                                                @endif
                                            </div>
                                        </div>
                                
                                        <!-- Actions -->
                                        <div class="col-12 text-end mt-4">
                                            <a href="{{ route('admin.manage-testimonials.index') }}" class="btn btn-danger px-4">Cancel</a>
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

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const typeEl      = document.getElementById('type');
                const textFields  = document.querySelectorAll('.text-fields');
                const videoFields = document.querySelectorAll('.video-fields');
            
                const textInputs = ['testimonial', 'rating', 'person_name', 'person_role'];
                const videoInputs = ['video', 'title', 'thumbnail'];
            
                function applyType() {
                    const type = typeEl.value;
            
                    if (type === 'video') {
                        videoFields.forEach(el => el.classList.remove('d-none'));
                        textFields.forEach(el => el.classList.add('d-none'));
            
                        videoInputs.forEach(id => document.getElementById(id).setAttribute('required', 'required'));
                        textInputs.forEach(id => document.getElementById(id).removeAttribute('required'));
            
                    } else if (type === 'text') {
                        textFields.forEach(el => el.classList.remove('d-none'));
                        videoFields.forEach(el => el.classList.add('d-none'));
            
                        textInputs.forEach(id => document.getElementById(id).setAttribute('required', 'required'));
                        videoInputs.forEach(id => document.getElementById(id).removeAttribute('required'));
            
                    } else {
                        textFields.forEach(el => el.classList.add('d-none'));
                        videoFields.forEach(el => el.classList.add('d-none'));
                        textInputs.forEach(id => document.getElementById(id).removeAttribute('required'));
                        videoInputs.forEach(id => document.getElementById(id).removeAttribute('required'));
                    }
                }
            
                typeEl.addEventListener('change', applyType);
                applyType();
            });
        </script>
        
</body>

</html>