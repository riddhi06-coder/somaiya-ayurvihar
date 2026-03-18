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
                                <a href="{{ route('admin.manage-gallery.index') }}">
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
                                        <li class="breadcrumb-item"><a href="{{ route('admin.manage-gallery.index') }}">Home</a></li>
                                        <li class="breadcrumb-item active">Gallery</li>
                                    </ol>
                                </nav>
                                <a href="{{ route('admin.manage-gallery.create') }}" class="btn btn-primary px-5 radius-30">
                                    + Add Gallery
                                </a>
                            </div>

                            <div class="table-responsive custom-scrollbar">
                                <table class="display" id="basic-1">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Event Name</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($galleries as $key => $gallery)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>

                                                <td>{{ $gallery->event_name }}</td>

                                                <td>
                                                    @if($gallery->image)
                                                        <img src="{{ asset($gallery->image) }}" width="80" height="80" style="object-fit: cover;">
                                                    @else
                                                        <span>No Image</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <!-- Edit -->
                                                    <a href="{{ route('admin.manage-gallery.edit', $gallery->id) }}" class="btn btn-sm btn-primary">
                                                        Edit
                                                    </a>

                                                    <!-- Delete -->
                                                    <form action="{{ route('admin.manage-gallery.destroy', $gallery->id) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">No Data Found</td>
                                            </tr>
                                        @endforelse
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