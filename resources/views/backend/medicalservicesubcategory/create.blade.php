<!doctype html>
<html lang="en">
<head>
    @include('components.backend.head')
</head>
<body>
    @include('components.backend.header')
    @include('components.backend.sidebar')

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h4>Add Medical Service Subcategory</h4>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.medicalservicesubcategory.index') }}">Subcategories</a></li>
                            <li class="breadcrumb-item active">Add New</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Subcategory Form</h4>
                            <p class="f-m-light mt-1">Select parent category and enter name.</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.medicalservicesubcategory.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row g-3">
                                    <div class="col-6">
                                        <label for="category_id" class="form-label">Parent Category <span class="text-danger">*</span></label>
                                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                                            <option value="">Select Parent Category</option>
                                            @foreach($categories as $id => $name)
                                                <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>
                                                    {{ $name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-6">
                                        <label for="subcategory_name" class="form-label">Subcategory Name <span class="text-danger">*</span></label>
                                        <input type="text" name="subcategory_name" id="subcategory_name" 
                                               class="form-control @error('subcategory_name') is-invalid @enderror" 
                                               value="{{ old('subcategory_name') }}" 
                                               placeholder="Enter Sub Category name" required>
                                        @error('subcategory_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Short Description-->
                                    <div class="col-md-6">
                                        <label class="form-label" for="about">Short Description </label>
                                        <textarea class="form-control" id="desc" name="desc" placeholder="Enter Description"></textarea>
                                        <div class="invalid-feedback">Please enter an Description.</div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label" for="home_image">Home Page Image</label>
                                        
                                        <input type="file" name="home_image" id="home_image"
                                            class="form-control @error('home_image') is-invalid @enderror"
                                            accept="image/*" onchange="previewImage(event)">

                                        @error('home_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                        <small class="text-muted">Optional. Upload image for homepage display.</small>

                                        <!-- Preview Image -->
                                        <div class="mt-3">
                                            <img id="imagePreview" src="" alt="Preview" 
                                                style="max-width: 150px; display: none; border-radius: 8px; border:1px solid #ddd; padding:5px;">
                                        </div>
                                    </div>

                                    <div class="col-12 text-end mt-4">
                                        <a href="{{ route('admin.medicalservicesubcategory.index') }}" class="btn btn-secondary me-2">
                                            Cancel
                                        </a>
                                        <button type="submit" class="btn btn-primary px-4">
                                            Save Subcategory
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.backend.footer')
    @include('components.backend.main-js')


    <script id="imgprevjs">
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('imagePreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        }
    </script>
    
</body>
</html>