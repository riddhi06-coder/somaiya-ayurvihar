<!doctype html>
<html lang="en">
<head>
    @include('components.backend.head')
    
    <style>
         /* Fix row alignment */
        #basic-1 td {
            vertical-align: middle;
        }
        
        /* Fix image */
        .doctor-img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 6px;
        }
        
        /* Group rows styling */
        .table-primary td {
            background: #dbeafe;
            font-weight: 600;
            padding: 8px;
        }
        
        .table-secondary td {
            background: #f1f5f9;
            font-weight: 500;
            padding: 6px 8px;
        }
        
        .table-light td {
            background: #f9fafb;
            padding: 5px 8px;
        }
        
        /* Buttons */
        #basic-1 .btn {
            padding: 4px 8px;
            font-size: 14px;
        }

    </style>
    
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
                                <a href="{{ route('admin.manage-company-panel.index') }}">
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
                                        <li class="breadcrumb-item"><a href="{{ route('admin.manage-company-panel.index') }}">Home</a></li>
                                        <li class="breadcrumb-item active">Insurance Company On Panel</li>
                                    </ol>
                                </nav>
                                <a href="{{ route('admin.manage-company-panel.create') }}" class="btn btn-primary px-5 radius-30">
                                    + Add Insurance Company
                                </a>


                            </div>

                            <div class="table-responsive custom-scrollbar">
                                <table class="display table table-bordered" id="basic-1">
                                    <thead>
                  
                                        <tr>
                                            <th>#</th>
                                            <th>Insurance Type</th>
                                            <th>Action</th>
                                        </tr>
                    
                                    </thead>

                                    <tbody>
                                        @forelse($companies as $key => $company)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $company->insurance_type }}</td>
                               
                                                <td>
                                                    <a href="{{ route('admin.manage-company-panel.edit', $company->id) }}"
                                                       class="btn btn-sm btn-primary">Edit</a>
                            
                                                    <form action="{{ route('admin.manage-company-panel.destroy', $company->id) }}"
                                                          method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger"
                                                                onclick="return confirm('Delete this record?')">
                                                            Delete
                                                        </button>
                                                    </form><br><br>
                            
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