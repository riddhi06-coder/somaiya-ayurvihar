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
                                <a href="{{ route('admin.manage-vision-mission.index') }}">
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
                                        <li class="breadcrumb-item"><a href="{{ route('admin.manage-vision-mission.index') }}">Home</a></li>
                                        <li class="breadcrumb-item active">Vision & Mission</li>
                                    </ol>
                                </nav>
                                <a href="{{ route('admin.manage-vision-mission.create') }}" class="btn btn-primary px-5 radius-30">
                                    + Add Vision & Mission
                                </a>
                            </div>

                            <div class="table-responsive custom-scrollbar">
                                <table class="display" id="basic-1">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Heading</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($visions as $key => $vision)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $vision->banner_heading }}</td>
                                                <td>
                                                    @if($vision->image)
                                                        <img src="{{ asset('uploads/vision_mission/'.$vision->image) }}" 
                                                            alt="Banner Image" 
                                                            style="max-width: 120px; max-height: 100px;">
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.manage-vision-mission.edit', $vision->id) }}" 
                                                    class="btn btn-primary btn-sm">Edit</a>

                                                    <form action="{{ route('admin.manage-vision-mission.destroy', $vision->id) }}" 
                                                        method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm" 
                                                                onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
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