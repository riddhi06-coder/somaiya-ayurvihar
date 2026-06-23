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
                                        <li class="breadcrumb-item active"> Service Master Categories</li>
                                    </ol>
                                </nav>
                                <a href="{{ route('admin.medicalservicecategory.create') }}" class="btn btn-primary px-5 radius-30">
                                    + Add Category
                                </a>
                            </div>

                            <div class="table-responsive custom-scrollbar">
                                <table class="display" id="basic-1">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Master Category Name</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $key => $category)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input status-toggle" type="checkbox"
                                                           role="switch"
                                                           data-id="{{ $category->id }}"
                                                           {{ $category->is_active ? 'checked' : '' }}>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.medicalservicecategory.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <form action="{{ route('admin.medicalservicecategory.destroy', $category->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
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
    
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.status-toggle').forEach(function (toggle) {
        toggle.addEventListener('change', function () {
            const id = this.dataset.id;
            const checkbox = this;
            const newState = checkbox.checked;

            // Confirm before applying
            if (!confirm(`Are you sure you want to ${newState ? 'activate' : 'deactivate'} this category?`)) {
                checkbox.checked = !newState; // revert the visual toggle
                return;
            }

            fetch(`/somaiya/admin/medicalservicecategory/${id}/toggle-status`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    alert(data.is_active ? 'Category activated successfully.' : 'Category deactivated successfully.');
                } else {
                    checkbox.checked = !newState; // revert on failure
                    alert('Something went wrong. Please try again.');
                }
            })
            .catch(() => {
                checkbox.checked = !newState; // revert on error
                alert('Request failed. Please check your connection and try again.');
            });
        });
    });
});
    </script>

</body>
</html>