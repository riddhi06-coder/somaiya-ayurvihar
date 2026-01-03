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
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                        <li class="breadcrumb-item active"> Facilities</li>
                                    </ol>
                                </nav>
                                <a href="{{ route('admin.medicalserviceallcategories.create') }}" class="btn btn-primary px-5 radius-30">
                                    + Add Facilities
                                </a>
                            </div>

                            <div class="table-responsive custom-scrollbar">
                                <table class="table table-bordered table-hover" id="basic-1">
                                    <thead>
                                        <tr>
                                            <th width="60">#</th>
                                            <th>All Categories</th>
                                            <th width="200">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php
                                            $sr = 1;
                                            $grouped = $services->groupBy('category_id');
                                        @endphp

                                        @foreach($grouped as $categoryId => $categoryServices)
                                            {{-- Main Category --}}
                                            <tr class="table-light">
                                                <td colspan="3">
                                                    <strong>
                                                        Main Category: {{ optional($categoryServices->first()->category)->category_name }}
                                                    </strong>
                                                </td>
                                            </tr>

                                            @php
                                                $subGrouped = $categoryServices->groupBy('subcategory_id');
                                            @endphp

                                            @foreach($subGrouped as $subCategoryId => $subServices)
                                                {{-- Subcategory --}}
                                                <tr class="table-secondary">
                                                    <td colspan="3" style="padding-left: 30px;">
                                                       Sub Category:  {{ optional($subServices->first()->subcategory)->subcategory_name }}
                                                    </td>
                                                </tr>

                                                {{-- Services --}}
                                                @foreach($subServices as $service)
                                                    <tr>
                                                        <td>{{ $sr++ }}</td>

                                                        <td style="padding-left: 60px;">
                                                            {{ $service->service_name }}
                                                        </td>

                                                        <td>
                                                            <a href="{{ route('admin.medicalserviceallcategories.edit', $service->id) }}"
                                                            class="btn btn-sm btn-primary">
                                                                Edit
                                                            </a>

                                                            <form action="{{ route('admin.medicalserviceallcategories.destroy', $service->id) }}"
                                                                method="POST"
                                                                style="display:inline-block;"
                                                                onsubmit="return confirm('Are you sure you want to delete this record?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger">
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
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
</body>
</html>