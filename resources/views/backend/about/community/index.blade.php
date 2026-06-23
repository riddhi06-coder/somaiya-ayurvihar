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
                    <h4>Community Outreach</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.manage-community-outreach.index') }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg') }}#stroke-home"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Community Outreach</li>
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
                                        <a href="{{ route('admin.manage-community-outreach.index') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Community Outreach</li>
                                </ol>
                            </nav>
                            <a href="{{ route('admin.manage-community-outreach.create') }}"
                               class="btn btn-primary px-5 radius-30">+ Add Community Outreach</a>
                        </div>

                        <div class="table-responsive custom-scrollbar">
                            <table class="display table table-bordered" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Description</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($community_outreaches as $key => $outreach)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit(strip_tags($outreach->intro_desc), 80) }}</td>
                                            <td>{{ $outreach->created_at ? \Carbon\Carbon::parse($outreach->created_at)->format('d M Y') : '-' }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('admin.manage-community-outreach.edit', $outreach->id) }}"
                                                       class="btn btn-sm btn-success">Edit</a>

                                                    <form action="{{ route('admin.manage-community-outreach.destroy', $outreach->id) }}"
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