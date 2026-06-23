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
                  <h4>Edit Media Coverages Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-media-coverages.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Media Coverages</li>
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
                        <h4>Media Coverages Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                                <div class="tab-content" id="wizard-tabContent">
                                    <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                        <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('admin.manage-media-coverages.update', $media_coverages->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')


                                            <input type="hidden" name="remove_media_image" value="0">
                                            <input type="hidden" name="remove_media_video" value="0">

                                            
                                            <!---- Media Heading---->
                                            <div class="col-md-6 mt-5">
                                                <label class="form-label" for="media_heading"> Media Heading  </label>
                                                <input class="form-control" id="media_heading" type="text" name="media_heading" value="{{ old('media_heading', $media_coverages->media_heading) }}" placeholder="Enter Media Heading">
                                                <div class="invalid-feedback">Please enter a Media Heading.</div>
                                            </div>


                                            <!---- Media Publication---->
                                            <div class="col-md-6 mt-5">
                                                <label class="form-label" for="media_publication"> Media Publication </label>
                                                <input class="form-control" id="media_publication" type="text" name="media_publication" value="{{ old('media_publication', $media_coverages->media_publication) }}" placeholder="Enter Media Publication">
                                                <div class="invalid-feedback">Please enter a Media Publication.</div>
                                            </div>


                                            <!---- Media Type---->
                                            <div class="col-md-6 mt-5">
                                                <label class="form-label" for="media_type"> Media Type </label>
                                                <input class="form-control" id="media_type" type="text" name="media_type" value="{{ old('media_type', $media_coverages->media_type) }}" placeholder="Enter Media Type">
                                                <div class="invalid-feedback">Please enter a Media Type.</div>
                                            </div>


                                            <!---- Media Publication Date---->
                                            <div class="col-md-6 mt-5">
                                                <label class="form-label" for="media_publication_date"> Media Publication Date  </label>
                                                <input class="form-control" id="media_publication_date" type="date" name="media_publication_date" value="{{ old('media_publication_date', $media_coverages->media_publication_date) }}" placeholder="Enter Media Publication Date">
                                                <div class="invalid-feedback">Please enter a Media Publication Date.</div>
                                            </div>


                                            <!-- Image -->
                                            <div class="col-md-6 mt-5">
                                                <label class="form-label">Thumbnail Images <span class="text-danger">*</span></label>

                                                <input class="form-control"
                                                    id="image"
                                                    type="file"
                                                    name="image"
                                                    accept=".jpg,.jpeg,.png,.webp,.svg"
                                                    onchange="previewImages(event)"
                                                >

                                                <div class="invalid-feedback">Please upload Thumbnail images.</div>

                                                <small class="text-secondary"><b>Note: Each file should be less than 2MB.</b></small><br>
                                                <small class="text-secondary"><b>Allowed: jpg, jpeg, png, webp, svg</b></small>


                                                @if($media_coverages->thumbnail_image)
                                                    <div class="mt-2">
                                                        <img src="{{ asset('uploads/media/' . $media_coverages->thumbnail_image) }}"
                                                            width="120"
                                                            class="border rounded">
                                                    </div>
                                                @endif

                                                <!-- Preview Area -->
                                                <div id="imagePreviewContainer" class="d-flex flex-wrap mt-3"></div>
                                            </div>


                                            <!--  Description -->
                                            <div class="form-group">
                                                <label> Short Description </label>
                                                <textarea name="description" id="description" class="form-control" rows="5">{{ old('description', $media_coverages->description) }}</textarea>
                                            </div>



                                            <hr class="mt-5">

                                            <h3># Media Details</h3>

                                            <!-- Media Type Selector -->
                                            <div class="col-12 mt-4">
                                                <label class="form-label">Select Media Type</label>
                                                <select class="form-control"
                                                        id="mediaTypeSelect"
                                                        onchange="toggleMediaInput()"
                                                        required>
                                                    <option value="">-- Select Option --</option>
                                                    <option value="image"
                                                        {{ $media_coverages->media_image ? 'selected' : '' }}>
                                                        Upload Image
                                                    </option>

                                                    <option value="video"
                                                        {{ $media_coverages->media_video ? 'selected' : '' }}>
                                                        Upload Video
                                                    </option>
                                                </select>
                                            </div>

                                            <!-- Image Upload -->
                                            <div class="col-md-6 mt-4 d-none" id="imageUploadDiv">
                                                <label class="form-label">Upload Image</label>
                                                <input type="file"
                                                    name="media_image"
                                                    class="form-control"
                                                    accept=".jpg,.jpeg,.png,.webp,.svg"
                                                    onchange="previewFile(event, 'mediaPreview', 'image')">


                                                <div class="invalid-feedback">Please upload images.</div>

                                                <small class="text-secondary"><b>Note: Each file should be less than 2MB.</b></small><br>
                                                <small class="text-secondary"><b>Allowed: jpg, jpeg, png, webp, svg</b></small>
                                            </div>

                                            <!-- Video Upload -->
                                            <div class="col-md-6 mt-4 d-none" id="videoUploadDiv">
                                                <label class="form-label">Upload Video</label>
                                                <input type="file"
                                                    name="media_video"
                                                    class="form-control"
                                                    accept="video/mp4,video/webm,video/ogg"
                                                    onchange="previewFile(event, 'mediaPreview', 'video')">


                                                <div class="invalid-feedback">Please upload Video.</div>

                                                <small class="text-secondary"><b>Note: Each file should be less than 5MB.</b></small><br>
                                                <small class="text-secondary"><b>Allowed: mp4, webm, ogg</b></small>
                                            </div>
                                            </div>

                                            <!-- Preview Area -->
                                            <div class="col-md-6 mt-3">
                                                <div id="mediaPreview">

                                                    @if($media_coverages->media_image)
                                                        <div class="mb-2" id="existingImageBox">
                                                            <img src="{{ asset('uploads/media/' . $media_coverages->media_image) }}"
                                                                width="200"
                                                                class="border rounded">
                                                            <br>
                                                            <button type="button" class="btn btn-sm btn-danger mt-2"
                                                                onclick="removeExistingMedia('image')">
                                                                Remove Image
                                                            </button>
                                                        </div>
                                                    @endif

                                                    @if($media_coverages->media_video)
                                                        <div class="mb-2" id="existingVideoBox">
                                                            <video width="250" controls class="border rounded">
                                                                <source src="{{ asset('uploads/media/' . $media_coverages->media_video) }}">
                                                            </video>
                                                            <br>
                                                            <button type="button" class="btn btn-sm btn-danger mt-2"
                                                                onclick="removeExistingMedia('video')">
                                                                Remove Video
                                                            </button>
                                                        </div>
                                                    @endif

                                                </div>
                                            </div>

                                            <div class="col-12 mt-4">
                                                <label class="form-label">URL </label>
                                                <input type="url" name="url" value="{{ old('url', $media_coverages->url) }}" class="form-control" placeholder="https://example.com">
                                            </div>


                                            <!-- Form Actions -->
                                            <div class="col-12 text-end mt-5">
                                                <a href="{{ route('admin.manage-media-coverages.index') }}" class="btn btn-danger px-4">Cancel</a>
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
            document.addEventListener("DOMContentLoaded", function () {
                toggleMediaInput();
            });
        </script>


        <script>
            function removeExistingMedia(type) {

                if(type === 'image') {
                    document.getElementById('existingImageBox')?.remove();
                    document.querySelector('[name="remove_media_image"]').value = 1;
                }

                if(type === 'video') {
                    document.getElementById('existingVideoBox')?.remove();
                    document.querySelector('[name="remove_media_video"]').value = 1;
                }
            }
        </script>


        <script>
            function previewImages(event) {
                const previewContainer = document.getElementById('imagePreviewContainer');
                previewContainer.innerHTML = ''; // Clear previous preview

                const file = event.target.files[0];
                if (file) {
                    // Check file size (2MB max)
                    if(file.size > 2 * 1024 * 1024){
                        alert("File is too big! Maximum size allowed is 2MB.");
                        event.target.value = ""; // Clear the input
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.maxWidth = "150px";  // adjust size as needed
                        img.style.maxHeight = "150px";
                        img.classList.add('me-2', 'mb-2'); // Bootstrap spacing
                        previewContainer.appendChild(img);
                    }
                    reader.readAsDataURL(file);
                }
            }
        </script>


        <script>
            function toggleMediaInput() {
                const type = document.getElementById('mediaTypeSelect').value;
                const imageDiv = document.getElementById('imageUploadDiv');
                const videoDiv = document.getElementById('videoUploadDiv');

                imageDiv.classList.add('d-none');
                videoDiv.classList.add('d-none');

                if (type === 'image') {
                    imageDiv.classList.remove('d-none');
                    document.querySelector('[name="media_video"]').value = '';
                }

                if (type === 'video') {
                    videoDiv.classList.remove('d-none');
                    document.querySelector('[name="media_image"]').value = '';
                }
            }

            function previewFile(event, previewId, type) {
                const container = document.getElementById(previewId);
                container.innerHTML = '';

                const file = event.target.files[0];
                if (!file) return;

                const reader = new FileReader();

                reader.onload = function(e) {
                    if (type === 'image') {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.width = '200px';
                        img.style.marginTop = '10px';
                        container.appendChild(img);
                    }

                    if (type === 'video') {
                        const video = document.createElement('video');
                        video.src = e.target.result;
                        video.controls = true;
                        video.style.width = '250px';
                        video.style.marginTop = '10px';
                        container.appendChild(video);
                    }
                };

                reader.readAsDataURL(file);
            }
        </script>

</body>

</html>