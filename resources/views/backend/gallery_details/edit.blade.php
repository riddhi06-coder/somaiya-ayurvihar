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
                  <h4>Edit Gallery Details Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-details-gallery.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Gallery Details</li>
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
                        <h4>Gallery Details Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                    <form class="row g-3 needs-validation custom-input" novalidate 
                                        action="{{ route('admin.manage-details-gallery.update', $gallery->id) }}" 
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')


                                        <div class="col-md-6 mt-5">
                                            <label class="form-label">Select Event <span class="txt-danger">*</span></label>

                                            <select class="form-control" name="gallery_id" required>
                                                <option value="">Select Event</option>

                                                @foreach($galleries as $g)
                                                    <option value="{{ $g->id }}" 
                                                        {{ $gallery->gallery_id == $g->id ? 'selected' : '' }}>
                                                        {{ $g->event_name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <div class="invalid-feedback">Please select an event.</div>
                                        </div>


                                        <div class="col-md-12 mt-4">
                                            <label class="form-label">Description </label>

                                            <textarea class="form-control"
                                                    name="description"
                                                    id="editor"
                                                    rows="4"
                                                    placeholder="Enter description here..."
                                                    >{{ old('description', $gallery->description) }}</textarea>

                                            <div class="invalid-feedback">Please enter description.</div>
                                        </div>

                                        @php
                                            $images = json_decode($gallery->images, true);
                                        @endphp

                                        <div class="col-md-12 mt-4">
                                            <label class="form-label">Gallery Images <span class="txt-danger">*</span></label>

                                            {{-- ✅ ADD BUTTON ON TOP --}}
                                            <div class="mb-2 text-end">
                                                <button type="button" class="btn btn-success addRow">+ Add Image</button>
                                            </div>

                                            <table class="table table-bordered" id="imageTable">
                                                <thead>
                                                    <tr>
                                                        <th>Upload Image <span class="txt-danger">*</span></th>
                                                        <th>Preview</th>
                                                        <th width="120">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    {{-- ✅ EXISTING IMAGES --}}
                                                    @if(!empty($images))
                                                        @foreach($images as $img)
                                                            <tr>
                                                                <td>
                                                                    <input type="file" name="images[]" class="form-control imageInput">

                                                                    <small class="text-secondary d-block mt-1">
                                                                        <b>Note:</b> Max 2MB. Allowed: JPG, JPEG, PNG, WEBP.
                                                                    </small>

                                                                    {{-- keep old image --}}
                                                                    <input type="hidden" name="old_images[]" value="{{ $img }}">
                                                                </td>

                                                                <td>
                                                                    <img src="{{ asset('uploads/gallery_details/'.$img) }}" 
                                                                        class="img-preview" width="80">
                                                                </td>

                                                                <td>
                                                                    <button type="button" class="btn btn-danger removeRow">Remove</button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif

                                                    {{-- ✅ DEFAULT ROW ONLY IF NO IMAGES --}}
                                                    @if(empty($images))
                                                        <tr>
                                                            <td>
                                                                <input type="file" name="images[]" class="form-control imageInput" accept=".jpg,.jpeg,.png,.webp">

                                                                <small class="text-secondary d-block mt-1">
                                                                    <b>Note:</b> Max 2MB. Allowed: JPG, JPEG, PNG, WEBP.
                                                                </small>
                                                            </td>

                                                            <td>
                                                                <img src="" class="img-preview" width="80" style="display:none;">
                                                            </td>

                                                            <td>
                                                                <button type="button" class="btn btn-danger removeRow">Remove</button>
                                                            </td>
                                                        </tr>
                                                    @endif

                                                </tbody>
                                            </table>
                                        </div>




                                        <!-- Form Actions -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('admin.manage-details-gallery.index') }}" class="btn btn-danger px-4">Cancel</a>
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

                // ✅ IMAGE PREVIEW
                document.addEventListener("change", function(e) {
                    if (e.target.classList.contains('imageInput')) {

                        let reader = new FileReader();
                        let preview = e.target.closest('tr').querySelector('.img-preview');

                        reader.onload = function(e) {
                            preview.src = e.target.result;
                            preview.style.display = 'block';
                        }

                        if (e.target.files[0]) {
                            reader.readAsDataURL(e.target.files[0]);
                        }
                    }
                });

                // ✅ ADD NEW ROW
                document.querySelector('.addRow').addEventListener('click', function () {

                    let row = `
                        <tr>
                            <td>
                                <input type="file" name="images[]" class="form-control imageInput" accept=".jpg,.jpeg,.png,.webp">

                                <small class="text-secondary d-block mt-1">
                                    <b>Note:</b> Max 2MB. Allowed: JPG, JPEG, PNG, WEBP.
                                </small>
                            </td>

                            <td>
                                <img src="" class="img-preview" width="80" style="display:none;">
                            </td>

                            <td>
                                <button type="button" class="btn btn-danger removeRow">Remove</button>
                            </td>
                        </tr>
                    `;

                    document.querySelector("#imageTable tbody").insertAdjacentHTML('beforeend', row);
                });

                // ✅ REMOVE ROW (KEEP AT LEAST 1 ROW)
                document.addEventListener("click", function(e) {
                    if (e.target.classList.contains('removeRow')) {

                        let totalRows = document.querySelectorAll('#imageTable tbody tr').length;

                        if (totalRows > 1) {
                            e.target.closest('tr').remove();
                        } else {
                            alert('At least one row is required.');
                        }
                    }
                });

            });
        </script>


</body>

</html>