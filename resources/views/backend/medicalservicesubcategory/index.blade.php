<!doctype html>
<html lang="en">
<head>
    @include('components.backend.head')

    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 46px;
            height: 24px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 24px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #28a745;
        }

        input:checked + .slider:before {
            transform: translateX(22px);
        }
    </style>

</head>
<body>
    @include('components.backend.header')
    @include('components.backend.sidebar')

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">
                                    <svg class="stroke-icon">
                                        <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                                    </svg>
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-4">

                                {{-- Breadcrumb (Left) --}}
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('admin.dashboard') }}">Home</a>
                                        </li>
                                        <li class="breadcrumb-item active">Medical Service Subcategories</li>
                                    </ol>
                                </nav>

                                {{-- Right Side: Button + Search --}}
                                <div class="text-end" style="min-width: 260px;">
                                    <a href="{{ route('admin.medicalservicesubcategory.create') }}"
                                    class="btn btn-primary px-5 radius-30 mb-2 w-100">
                                        + Add Sub Category
                                    </a>

                                    <input type="text"
                                        id="subcategorySearch"
                                        class="form-control"
                                        style="margin-top:20px;"
                                        placeholder="Search...">
                                </div>

                            </div>

                            <div class="table-responsive custom-scrollbar">
                                <table class="table table-bordered table-hover" id="basic-1">
                                    <thead>
                                        <tr>
                                            <th width="60">#</th>
                                            <th>Subcategory Name</th>
                                            <th width="120">Highlight</th>
                                            <th width="200">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php
                                            $groupedSubcategories = $subcategories->groupBy('category_id');
                                            $srNo = 1;
                                        @endphp

                                        @foreach($groupedSubcategories as $items)

                                            {{-- Parent Category Row --}}
                                            <tr class="table-light">
                                                <td colspan="3">
                                                    <strong>
                                                        Main Catgeory: {{ $items->first()->category->category_name ?? 'Uncategorized' }}
                                                    </strong>
                                                </td>
                                            </tr>

                                            {{-- Subcategories --}}
                                            @foreach($items as $subcategory)
                                                <tr>
                                                    <td>{{ $srNo++ }}</td>
                                                    <td>{{ $subcategory->subcategory_name }}</td>

                                                    <td>
                                                        <form method="POST" action="{{ route('admin.medicalsubcategory.toggle.highlight') }}">
                                                            @csrf

                                                            <input type="hidden" name="id" value="{{ $subcategory->id }}">

                                                            <label class="switch">
                                                                <input type="checkbox"
                                                                    name="status"
                                                                    value="1"
                                                                    onchange="return confirmToggle(this)"
                                                                    {{ $subcategory->status == 1 ? 'checked' : '' }}>

                                                                <span class="slider round"></span>
                                                            </label>
                                                        </form>
                                                    </td>


                                                    <td>
                                                        <a href="{{ route('admin.medicalservicesubcategory.edit', $subcategory) }}"
                                                        class="btn btn-sm btn-primary">Edit</a>

                                                        <form action="{{ route('admin.medicalservicesubcategory.destroy', $subcategory) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    class="btn btn-sm btn-danger"
                                                                    onclick="return confirm('Are you sure?')">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                    

                                                </tr>
                                            @endforeach

                                           
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.backend.footer')
    @include('components.backend.main-js')

    <script>
        function confirmToggle(el)
        {
            if(confirm('Are you sure you want to change highlight status?')) {
                el.form.submit();
            } else {
                el.checked = !el.checked; // revert toggle
            }
        }
    </script>

    
    <!----------- for search functionality--------->
    <script>
        document.getElementById('subcategorySearch').addEventListener('keyup', function () {
            let searchValue = this.value.toLowerCase();
            let rows = document.querySelectorAll('#basic-1 tbody tr');

            let currentCategoryRow = null;
            let categoryMatched = false;

            rows.forEach(row => {

                // Category row
                if (row.classList.contains('table-light')) {
                    currentCategoryRow = row;
                    categoryMatched = row.textContent.toLowerCase().includes(searchValue);

                    // Hide initially
                    row.style.display = 'none';
                    return;
                }

                // Subcategory row
                let subMatch = row.textContent.toLowerCase().includes(searchValue);

                if (subMatch || categoryMatched || searchValue === '') {
                    row.style.display = '';

                    if (currentCategoryRow) {
                        currentCategoryRow.style.display = '';
                    }
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>


</body>
</html>