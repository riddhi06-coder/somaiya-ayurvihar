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
                                <a href="{{ route('admin.manage-media-coverages.index') }}">
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
                                        <li class="breadcrumb-item"><a href="{{ route('admin.manage-media-coverages.index') }}">Home</a></li>
                                        <li class="breadcrumb-item active">Media Coverages</li>
                                    </ol>
                                </nav>
                                <a href="{{ route('admin.manage-media-coverages.create') }}" class="btn btn-primary px-5 radius-30">
                                    + Add Media Coverages
                                </a>
                            </div>

                            <div class="table-responsive custom-scrollbar">
                                <table class="display" id="basic-1">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Heading</th>
                                            <th>Publication</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($mediaCoverages as $key => $media)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>

                                                <td>{{ $media->media_heading ?? '-'}}</td>

                                                <td>{{ $media->media_publication ?? '-'}}</td>

                                                <td>
                                                    @if($media->thumbnail_image)
                                                        <img src="{{ asset('uploads/media/' . $media->thumbnail_image) }}" 
                                                            width="100px" 
                                                            height="80px"
                                                            style="object-fit:cover;">
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>

                                                <td>
                                                    <a href="{{ route('admin.manage-media-coverages.edit', $media->id) }}" 
                                                    class="btn btn-sm btn-primary">Edit</a>

                                                    <form action="{{ route('admin.manage-media-coverages.destroy', $media->id) }}" 
                                                        method="POST" 
                                                        style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" 
                                                                class="btn btn-sm btn-danger"
                                                                onclick="return confirm('Are you sure you want to delete this record?')">
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