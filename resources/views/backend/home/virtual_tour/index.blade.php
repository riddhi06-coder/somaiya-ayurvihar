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
                                <a href="{{ route('admin.manage-virtual-tour.index') }}">
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
                                        <li class="breadcrumb-item"><a href="{{ route('admin.manage-virtual-tour.index') }}">Home</a></li>
                                        <li class="breadcrumb-item active">Virtual Tour</li>
                                    </ol>
                                </nav>
                                <a href="{{ route('admin.manage-virtual-tour.create') }}" class="btn btn-primary px-5 radius-30">
                                    + Add Virtual Tour
                                </a>


                            </div>


                            <div class="table-responsive custom-scrollbar">
                                <table class="display table table-bordered" id="basic-1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Thumbnail</th>
                                            <th>Video</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse($tours as $key => $tour)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                    
                                            <td>{{ $tour->title }}</td>
                                    
                                            <td>
                                                @if($tour->thumbnail)
                                                    <img src="{{ asset('uploads/virtual-tour/thumbnails/' . $tour->thumbnail) }}"
                                                         style="max-height:150px;" class="rounded border">
                                                @else
                                                    <span class="text-muted">—</span>
                                                @endif
                                            </td>
                                    
                                            <td>
                                                @if($tour->video)
                                                    <video src="{{ asset('uploads/virtual-tour/' . $tour->video) }}"
                                                           style="max-height:150px;" class="rounded border" muted></video>
                                                    <br>
                                                    <a href="{{ asset('uploads/virtual-tour/' . $tour->video) }}" target="_blank" class="small">View</a>
                                                @else
                                                    <span class="text-muted">—</span>
                                                @endif
                                            </td>
                                    
                                            <td>
                                                <a href="{{ route('admin.manage-virtual-tour.edit', $tour->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                <form action="{{ route('admin.manage-virtual-tour.destroy', $tour->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted">No virtual tours added yet.</td>
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