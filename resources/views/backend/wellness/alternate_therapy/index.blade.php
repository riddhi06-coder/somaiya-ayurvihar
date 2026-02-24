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
                                <a href="{{ route('admin.manage-alternative-therapy.index') }}">
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
                                        <li class="breadcrumb-item"><a href="{{ route('admin.manage-alternative-therapy.index') }}">Home</a></li>
                                        <li class="breadcrumb-item active">Alternate Therapy</li>
                                    </ol>
                                </nav>
                                <a href="{{ route('admin.manage-alternative-therapy.create') }}" class="btn btn-primary px-5 radius-30">
                                    + Add Alternate Therapy Details
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
                                        @forelse($therapies as $key => $therapy)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>

                                                <td>{{ $therapy->heading }}</td>

                                                <td>
                                                    @if($therapy->image)
                                                        <img src="{{ asset('uploads/alternative-therapy/'.$therapy->image) }}" 
                                                            width="100px" 
                                                            height="80px" 
                                                            style="object-fit:cover; border-radius:6px;">
                                                    @else
                                                        <span class="text-muted">No Image</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <a href="{{ route('admin.manage-alternative-therapy.edit', $therapy->id) }}" 
                                                    class="btn btn-sm btn-primary">
                                                    Edit
                                                    </a>

                                                    <form action="{{ route('admin.manage-alternative-therapy.destroy', $therapy->id) }}" 
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
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-muted">
                                                    No records found.
                                                </td>
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