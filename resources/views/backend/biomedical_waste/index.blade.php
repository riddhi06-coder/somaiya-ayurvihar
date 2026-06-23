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
                                <a href="{{ route('admin.manage-biomedical-waste.index') }}">
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
                                        <li class="breadcrumb-item"><a href="{{ route('admin.manage-biomedical-waste.index') }}">Home</a></li>
                                        <li class="breadcrumb-item active">Biomedical Waste</li>
                                    </ol>
                                </nav>
                                <a href="{{ route('admin.manage-biomedical-waste.create') }}" class="btn btn-primary px-5 radius-30">
                                    + Add Biomedical Waste
                                </a>


                            </div>


                            <div class="table-responsive custom-scrollbar">
                                <table class="display table table-bordered" id="basic-1">
                                    <thead>
                  
                                        <tr>
                                            <th>Heading</th>
                                            <th>Document Name</th>
                                            <th>Action</th>
                                        </tr>
                    
                                    </thead>

                                   <tbody>
                                        @forelse($data as $row)
                                            <tr>
                                                <td>{{ $row->title }}</td>
                                                <td>{{ $row->doc_name }}</td>
                                                <td>
                                                    <!-- Editt -->
                                                    <a href="{{ route('admin.manage-biomedical-waste.edit', $row->id) }}" 
                                                       class="btn btn-primary btn-sm">
                                                       Edit
                                                    </a>
                                    
                                                    <!-- Delete -->
                                                    <form action="{{ route('admin.manage-biomedical-waste.destroy', $row->id) }}" 
                                                          method="POST" 
                                                          style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                                class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Are you sure?')">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center">No records found</td>
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