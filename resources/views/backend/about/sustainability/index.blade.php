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
                                <a href="{{ route('admin.manage-associations.index') }}">
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
                                        <li class="breadcrumb-item"><a href="{{ route('admin.manage-csr-sustainability.index') }}">Home</a></li>
                                        <li class="breadcrumb-item active">CSR & Sustainability</li>
                                    </ol>
                                </nav>
                                <a href="{{ route('admin.manage-csr-sustainability.create') }}" class="btn btn-primary px-5 radius-30">
                                    + Add CSR & Sustainability
                                </a>
                            </div>

                            <div class="table-responsive custom-scrollbar">
                                <table class="display" id="basic-1">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Heading</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($csr as $key => $row)
                                            <tr>
                                                <!-- Sr No -->
                                                <td>{{ $key + 1 }}</td>
                                    
                                                <!-- Heading (use any main field, here using UHTC heading) -->
                                                <td>{{ $row->uhtc_heading ?? 'N/A' }}</td>
                                    
                                                <!-- Actions -->
                                                <td>
                                                    <a href="{{ route('admin.manage-csr-sustainability.edit', $row->id) }}" 
                                                       class="btn btn-sm btn-primary">Edit</a>
                                    
                                                    <form action="{{ route('admin.manage-csr-sustainability.destroy', $row->id) }}" 
                                                          method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                    
                                                        <button type="submit" 
                                                                class="btn btn-sm btn-danger"
                                                                onclick="return confirm('Are you sure you want to delete this?')">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center">No data found</td>
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