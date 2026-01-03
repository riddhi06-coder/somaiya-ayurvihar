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
                        <h4>Add Facilities</h4>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.medicalservicecategory.index') }}">Facilities</a></li>
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
                            <h4> Facilities Form</h4>
                            <p class="f-m-light mt-1">Fill up the details and submit the form.</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.medicalserviceallcategories.update', $service->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="row g-3">

                                        {{-- Master Category --}}
                                        <div class="col-md-6">
                                            <label class="form-label">
                                                Master Category <span class="txt-danger">*</span>
                                            </label>
                                            <select name="category_id"
                                                    id="category_id"
                                                    class="form-control"
                                                    readonly
                                                    required>
                                                @foreach($masterCategories as $cat)
                                                    <option value="{{ $cat->id }}"
                                                        {{ $service->category_id == $cat->id ? 'selected' : '' }}>
                                                        {{ $cat->category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

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
                                                            {{ $service->subcategory_id == $subcat->id ? 'selected' : '' }}>
                                                        {{ $subcat->subcategory_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>



                                        {{-- Service Name --}}
                                        <div class="col-md-6">
                                            <label class="form-label">Facility Name <span class="txt-danger">*</span></label>
                                            <input
                                                type="text"
                                                name="service_name"
                                                class="form-control"
                                                value="{{ $service->service_name }}"
                                                required
                                            >
                                        </div>

                                        <div class="col-12 text-end mt-4">
                                            <a href="{{ route('admin.medicalserviceallcategories.index') }}"
                                            class="btn btn-secondary me-2">Cancel</a>

                                            <button type="submit" class="btn btn-primary px-4">
                                                Update Category
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


    

    {{-- Script to fetch subcategories based on master category --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const categorySelect = document.getElementById('category_id');
            const subcategorySelect = document.getElementById('subcategory_id');

            function filterSubcategories() {
                const selectedCategory = categorySelect.value;

                Array.from(subcategorySelect.options).forEach(option => {
                    if (!option.value) return; // skip placeholder

                    if (option.dataset.category === selectedCategory) {
                        option.style.display = 'block';
                    } else {
                        option.style.display = 'none';
                    }
                });
            }

            // Run on page load (IMPORTANT for edit)
            filterSubcategories();

            // If category ever changes (future-proof)
            categorySelect.addEventListener('change', filterSubcategories);
        });
    </script>



</body>
</html>