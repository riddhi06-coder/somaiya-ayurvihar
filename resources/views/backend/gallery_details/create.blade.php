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
                  <h4>Add Gallery Details Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-details-gallery.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Add Gallery Details</li>
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
                                    <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('admin.manage-details-gallery.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf


                                        <div class="col-md-6 mt-5">
                                            <label class="form-label">Select Event <span class="txt-danger">*</span></label>

                                            <select class="form-control" name="gallery_id" required>
                                                <option value="">Select Event</option>

                                                @foreach($galleries as $gallery)
                                                    <option value="{{ $gallery->id }}">
                                                        {{ $gallery->event_name }}
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
                                                    >{{ old('description') }}</textarea>

                                            <div class="invalid-feedback">Please enter description.</div>
                                        </div>


                                        <div class="col-md-12 mt-4">
                                            <label class="form-label">Gallery Images <span class="txt-danger">*</span></label>

                                            <table class="table table-bordered" id="imageTable">
                                                <thead>
                                                    <tr>
                                                        <th>Upload Image <span class="txt-danger">*</span></th>
                                                        <th>Preview</th>
                                                        <th width="120">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="file" name="images[]" class="form-control imageInput" accept=".jpg,.jpeg,.png,.webp">
                                                            
                                                            <!-- ✅ Tipni below input -->
                                                            <small class="text-secondary d-block mt-1">
                                                                <b>Note:</b> Max 2MB. Allowed: JPG, JPEG, PNG, WEBP.
                                                            </small>
                                                        </td>

                                                        <td>
                                                            <img src="" class="img-preview" width="80" style="display:none;">
                                                        </td>

                                                        <td>
                                                            <button type="button" class="btn btn-success addRow">+</button>
                                                        </td>
                                                    </tr>
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
            document.addEventListener('DOMContentLoaded', function () {

                // ✅ Add Row
                document.addEventListener('click', function(e) {
                    if (e.target.classList.contains('addRow')) {

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
                                    <button type="button" class="btn btn-danger removeRow">-</button>
                                </td>
                            </tr>
                        `;

                        document.querySelector('#imageTable tbody').insertAdjacentHTML('beforeend', row);
                    }
                });

                // ✅ Remove Row
                document.addEventListener('click', function(e) {
                    if (e.target.classList.contains('removeRow')) {
                        e.target.closest('tr').remove();
                    }
                });

                // ✅ FIXED Preview (important)
                document.addEventListener('change', function(e) {
                    if (e.target.classList.contains('imageInput')) {

                        let input = e.target;
                        let file = input.files[0];

                        if (file) {
                            let reader = new FileReader();

                            reader.onload = function(event) {
                                let preview = input.closest('tr').querySelector('.img-preview');

                                preview.src = event.target.result;
                                preview.style.display = 'block';
                            };

                            reader.readAsDataURL(file);
                        }
                    }
                });

            });
        </script>




</body>

</html>