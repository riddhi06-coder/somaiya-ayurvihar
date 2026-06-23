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
                  <h4>Add Biomedical Waste Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('admin.manage-biomedical-waste.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Add Biomedical Waste</li>
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
                        <h4>Biomedical Waste Form</h4>
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
                                          novalidate
                                          action="{{ route('admin.manage-biomedical-waste.update', $biomedical_waste->id) }}"
                                          method="POST"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <!--  Title -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="title">Title <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="title" type="text" name="title"  value="{{ old('title', $biomedical_waste->title) }}" placeholder="Enter Title" required>
                                            <div class="invalid-feedback">Please enter a Title.</div>
                                        </div>
                                        
                                        
                                        <!--  Document Name -->
                                        <div class="col-md-6 mt-5">
                                            <label class="form-label" for="doc_name">Document Name <span class="txt-danger">*</span></label>
                                            <input class="form-control" id="doc_name" type="text" name="doc_name"  value="{{ old('doc_name', $biomedical_waste->doc_name) }}" placeholder="Enter Document Name" required>
                                            <div class="invalid-feedback">Please enter a Document Name.</div>
                                        </div>
                                        
                                        
                                       <div class="col-md-6 mt-5">
                                            <label class="form-label">Upload Document (PDF / Word)</label>
                                            <input type="file" name="document" accept=".pdf,.doc,.docx"
                                                   onchange="previewDoc(this)" class="form-control">
                                        
                                                <small class="text-secondary"><b>Note: The file size should be less than 5MB.</b></small>
                                                <br>
                                                <small class="text-secondary"><b>Note: Only files in .pdf,.doc,.docx format can be uploaded.</b></small>
                                        
                                            <!-- New Upload Preview -->
                                            <div id="docPreview" style="margin-top:15px;"></div>
                                        
                                            <!-- Existing File Preview -->
                                            @if(!empty($biomedical_waste->document))
                                                <div style="margin-top:15px;">
                                                    @php
                                                        $file = asset('uploads/biomedical/'.$biomedical_waste->document);
                                                        $ext = pathinfo($biomedical_waste->document, PATHINFO_EXTENSION);
                                                    @endphp
                                        
                                                    @if($ext == 'pdf')
                                                        <iframe src="{{ $file }}" width="100%" height="500px"></iframe>
                                                    @else
                                                        <div style="display:flex; align-items:center; gap:10px;">
                                                            <img src="https://cdn-icons-png.flaticon.com/512/281/281760.png" width="40">
                                                            <a href="{{ $file }}" target="_blank">{{ $biomedical_waste->document }}</a>
                                                        </div>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                        
                                        
                                        <!-- Form Actions -->
                                        <div class="col-12 text-end">
                                            <a href="{{ route('admin.manage-biomedical-waste.index') }}" class="btn btn-danger px-4">Cancel</a>
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
            function previewDoc(input) {
    const preview = document.getElementById('docPreview');
    preview.innerHTML = "";

    if (!input.files || !input.files[0]) return;

    const file = input.files[0];
    const fileType = file.type;
    const fileURL = URL.createObjectURL(file);

    // PDF Preview
    if (fileType === "application/pdf") {
        preview.innerHTML = `
            <iframe src="${fileURL}" width="100%" height="400px" style="border:1px solid #ddd;"></iframe>
        `;
    } 
    // Word File Preview (fallback)
    else if (
        fileType === "application/msword" || 
        fileType === "application/vnd.openxmlformats-officedocument.wordprocessingml.document"
    ) {
        preview.innerHTML = `
            <div style="display:flex; align-items:center; gap:10px; border:1px solid #ddd; padding:10px;">
                <img src="https://cdn-icons-png.flaticon.com/512/281/281760.png" width="40">
                <span>${file.name}</span>
            </div>
        `;
    } 
    else {
        preview.innerHTML = `<p style="color:red;">Unsupported file type</p>`;
    }
}
        </script>

</body>

</html>