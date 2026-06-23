<!doctype html>
<html lang="en">

<head>
    @include('components.backend.head')
</head>

@include('components.backend.header')

<!--start sidebar wrapper-->
@include('components.backend.sidebar')
<!--end sidebar wrapper-->

<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Inpatient Service</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.manage-inpatient-service.index') }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg') }}#stroke-home"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Inpatient Service</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">

                        <!--@if (session('message'))-->
                        <!--    <div class="alert alert-success alert-dismissible fade show" role="alert">-->
                        <!--        {{ session('message') }}-->
                        <!--        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>-->
                        <!--    </div>-->
                        <!--@endif-->

                        <!--@if (session('error'))-->
                        <!--    <div class="alert alert-danger alert-dismissible fade show" role="alert">-->
                        <!--        {{ session('error') }}-->
                        <!--        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>-->
                        <!--    </div>-->
                        <!--@endif-->

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('admin.manage-inpatient-service.index') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Inpatient Service</li>
                                </ol>
                            </nav>
                            <a href="{{ route('admin.manage-inpatient-service.create') }}"
                               class="btn btn-primary px-5 radius-30">+ Add Details</a>
                        </div>

                        <div class="table-responsive custom-scrollbar">
                            <table class="display table table-bordered" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Heading</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($inpatient_services as $key => $service)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $service->admission_heading }}</td>
                                            <td>{{ $service->created_at ? \Carbon\Carbon::parse($service->created_at)->format('d M Y') : '-' }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('admin.manage-inpatient-service.edit', $service->id) }}"
                                                       class="btn btn-sm btn-success">Edit</a>

                                                    <form action="{{ route('admin.manage-inpatient-service.destroy', $service->id) }}"
                                                          method="POST"
                                                          onsubmit="return confirm('Are you sure you want to delete this record?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No records found.</td>
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

<!-- footer start-->
@include('components.backend.footer')
</div>
</div>

@include('components.backend.main-js')

</body>
</html>