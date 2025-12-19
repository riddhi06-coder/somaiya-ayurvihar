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
                                        <li class="breadcrumb-item active"> Service All Categories</li>
                                    </ol>
                                </nav>
                                <a href="{{ route('admin.medicalserviceallcategories.create') }}" class="btn btn-primary px-5 radius-30">
                                    + Add
                                </a>
                            </div>

                            <div class="table-responsive custom-scrollbar">
                               <table class="display" id="basic-1">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>All Categories</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($services as $key => $service)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>

                                                <td>
                                                    <strong>{{ $service->category->category_name ?? '-' }}</strong>
                                                    <br>
                                                    <small>
                                                        {{ $service->subcategory->subcategory_name ?? '-' }}
                                                        → {{ $service->service_name }}
                                                    </small>
                                                </td>

                                                <td>
                                                    {{-- Edit --}}
                                                    <a href="{{ route('admin.medicalserviceallcategories.edit', $service->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                        Edit
                                                    </a>

                                                    {{-- Delete --}}
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