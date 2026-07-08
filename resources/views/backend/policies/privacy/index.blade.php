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
                                <a href="{{ route('admin.manage-privacy-policy.index') }}">
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
                                        <li class="breadcrumb-item"><a href="{{ route('admin.manage-privacy-policy.index') }}">Home</a></li>
                                        <li class="breadcrumb-item active">Privacy Policy</li>
                                    </ol>
                                </nav>
                                <a href="{{ route('admin.manage-privacy-policy.create') }}" class="btn btn-primary px-5 radius-30">
                                    + Add Privacy Policy
                                </a>
                            </div>

                            <div class="table-responsive custom-scrollbar">
                                <table class="display table table-bordered" id="basic-1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Privacy Policy</th>
                                            <th>Questions</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($policies as $policy)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ \Illuminate\Support\Str::limit(strip_tags($policy->privacy_policy), 90) }}</td>
                                                <td>{{ count($policy->questions ?? []) }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.manage-privacy-policy.edit', $policy->id) }}"
                                                       class="btn btn-sm btn-primary">
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('admin.manage-privacy-policy.destroy', $policy->id) }}"
                                                          method="POST" class="d-inline"
                                                          onsubmit="return confirm('Are you sure you want to delete this?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">No records found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            @if ($policies instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                <div class="mt-3">
                                    {{ $policies->links() }}
                                </div>
                            @endif

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