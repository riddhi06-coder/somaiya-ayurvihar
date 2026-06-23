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
                  <h4>Edit Announcements Details Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-announce-details.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Announcements Details</li>
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
                        <h4>Announcements Form</h4>
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
                                          action="{{ route('admin.manage-announce-details.update', $announcements_details->id) }}" 
                                          method="POST" 
                                          enctype="multipart/form-data">
                                        
                                        @csrf
                                        @method('PUT')
                                    
                                        <!-- Announcement -->
                                        <div class="form-group">
                                            <label>Select Announcement</label>
                                            <select name="announcement_id" class="form-control" required>
                                                <option value="">Select Announcement</option>
                                    
                                                @foreach($announcements as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('announcement_id', $announcements_details->announcement_id) == $item->id ? 'selected' : '' }}>
                                                        
                                                        {{ $item->title }} ({{ \Carbon\Carbon::parse($item->date)->format('d M Y') }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    
                                        <!-- Image -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label">Announcement Image</label>
                                        
                                            <input class="form-control mb-2" type="file" name="announce_image">
                                        
                                            <!-- Notes -->
                                            <small class="text-muted d-block">Note: File size should be less than 2MB.</small>
                                            <small class="text-muted d-block mb-2">Allowed: .jpg, .jpeg, .png, .webp, .svg</small>
                                        
                                            <!-- Image Preview -->
                                            @if($announcements_details->image)
                                                <div class="mt-2">
                                                    <img src="{{ asset('uploads/announcement-details/'.$announcements_details->image) }}" 
                                                         class="img-fluid rounded border"
                                                         style="max-height:150px; object-fit:cover;">
                                                </div>
                                            @endif
                                        </div>
                                    
                                        <!-- Description -->
                                        <div class="col-md-12 mt-3">
                                            <label>Description</label>
                                    
                                            <textarea class="form-control"
                                                      id="editor"
                                                      name="description"
                                                      rows="4"
                                                      required>{{ old('description', $announcements_details->description) }}</textarea>
                                        </div>
                                    
                                        <!-- Buttons -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('admin.manage-announce-details.index') }}" class="btn btn-danger">Cancel</a>
                                            <button class="btn btn-primary" type="submit">Update</button>
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