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
                                <a href="{{ route('admin.manage-testimonials.index') }}">
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
                                        <li class="breadcrumb-item"><a href="{{ route('admin.manage-testimonials.index') }}">Home</a></li>
                                        <li class="breadcrumb-item active">Testimonials</li>
                                    </ol>
                                </nav>
                                <a href="{{ route('admin.manage-testimonials.create') }}" class="btn btn-primary px-5 radius-30">
                                    + Add Testimonials
                                </a>


                            </div>


                            <div class="table-responsive custom-scrollbar">
                                <table class="display table table-bordered" id="basic-1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Type</th>
                                            <th>Preview</th>
                                            <th>Title / Testimonial</th>
                                            <th>Priority</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($testimonials as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                    
                                            <td>
                                                <span class="badge {{ $item->type === 'video' ? 'bg-info' : 'bg-secondary' }}">
                                                    {{ ucfirst($item->type) }}
                                                </span>
                                            </td>
                                    
                                            <td>
                                                @if($item->type === 'video' && $item->thumbnail)
                                                    <img src="{{ asset('uploads/testimonials/thumbnails/' . $item->thumbnail) }}"
                                                         style="max-height:50px;" class="rounded">
                                                @else
                                                    <span class="text-muted">—</span>
                                                @endif
                                            </td>
                                    
                                            <td>
                                                @if($item->type === 'video')
                                                    {{ $item->title }}
                                                @else
                                                    {{ \Illuminate\Support\Str::limit(strip_tags($item->testimonial), 60) }}
                                                @endif
                                            </td>

                                            <td>
                                                <input type="number" value="{{ $item->priority ?? 0 }}"
                                                       class="form-control priority-input" data-id="{{ $item->id }}" style="width:80px;">
                                            </td>
                                    
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input status-toggle" type="checkbox" role="switch"
                                                           data-id="{{ $item->id }}" {{ $item->is_active ? 'checked' : '' }}>
                                                </div>
                                            </td>
                                    
                                            <td>
                                                <a href="{{ route('admin.manage-testimonials.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a><br><br>
                                                <form action="{{ route('admin.manage-testimonials.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
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
            const csrf = '{{ csrf_token() }}';
        
            // ---- Priority auto-save (on change) ----
            document.querySelectorAll('.priority-input').forEach(function (input) {
                input.addEventListener('change', function () {
                    const id = this.dataset.id;
                    const priority = this.value;
        
                    fetch(`{{ url('admin/manage-testimonials/update-priority') }}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrf,
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({ id: id, priority: priority }),
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            alert('Priority updated successfully.');
                        } else {
                            alert('Could not update priority. Please try again.');
                        }
                    })
                    .catch(() => alert('Priority update failed. Please check your connection.'));
                });
            });
        
            // ---- Status toggle ----
            document.querySelectorAll('.status-toggle').forEach(function (toggle) {
                toggle.addEventListener('change', function () {
                    const id = this.dataset.id;
                    const checkbox = this;
        
                    fetch(`{{ url('admin/manage-testimonials') }}/${id}/toggle-status`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrf,
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                        },
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            alert(data.is_active ? 'Testimonial activated successfully.' : 'Testimonial deactivated successfully.');
                        } else {
                            checkbox.checked = !checkbox.checked; // revert on failure
                            alert('Could not update status. Please try again.');
                        }
                    })
                    .catch(() => {
                        checkbox.checked = !checkbox.checked; // revert on error
                        alert('Status update failed. Please check your connection.');
                    });
                });
            });
        });
    </script>



</body>
</html>