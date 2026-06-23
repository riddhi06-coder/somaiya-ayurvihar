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
                                <a href="{{ route('admin.manage-b-details.index') }}">
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
                                        <li class="breadcrumb-item"><a href="{{ route('admin.manage-b-details.index') }}">Home</a></li>
                                        <li class="breadcrumb-item active">Blog Details</li>
                                    </ol>
                                </nav>
                                <a href="{{ route('admin.manage-b-details.create') }}" class="btn btn-primary px-5 radius-30">
                                    + Add Blog Details
                                </a>

                            </div>


                            <div class="table-responsive custom-scrollbar">
                                <table class="display table table-bordered" id="basic-1">
                                    <thead>
                  
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                    
                                    </thead>

                                    <tbody>
                                        @forelse($details as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                    
                                                <!-- Blog Name -->
                                                <td>
                                                    {{ $item->blog->title ?? 'N/A' }}
                                                </td>
                                    
                                                <!-- Image -->
                                                <td>
                                                    @if($item->announce_image)
                                                        <img src="{{ asset('uploads/blog-details/' . $item->announce_image) }}"
                                                             width="60"
                                                             height="60"
                                                             style="object-fit:cover; border-radius:5px;">
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                    
                                                <!-- Actions -->
                                                <td>
                                                    <!-- Edit -->
                                                    <a href="{{ route('admin.manage-b-details.edit', $item->id) }}"
                                                       class="btn btn-sm btn-primary">
                                                        Edit
                                                    </a>
                                    
                                                    <!-- Delete -->
                                                    <form action="{{ route('admin.manage-b-details.destroy', $item->id) }}"
                                                          method="POST"
                                                          style="display:inline-block;">
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