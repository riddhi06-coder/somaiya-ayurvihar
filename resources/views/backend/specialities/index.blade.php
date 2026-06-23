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
                                <a href="{{ route('admin.manage-specialities.index') }}">
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
                                        <li class="breadcrumb-item"><a href="{{ route('admin.manage-specialities.index') }}">Home</a></li>
                                        <li class="breadcrumb-item active">Specialities</li>
                                    </ol>
                                </nav>
                                <a href="{{ route('admin.manage-specialities.create') }}" class="btn btn-primary px-5 radius-30">
                                    + Add Specialities
                                </a>


                            </div>
                            


                            <div class="table-responsive custom-scrollbar">
                                <table class="display table table-bordered" id="basic-1">
                                    <thead>
                  
                                        <tr>
                                            <th>#</th>
                                            <th>Speciality</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                    
                                    </thead>

                                    <tbody>
                                        @forelse($specialities as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                    
                                                <!-- Subcategory Name -->
                                                <td>{{ $item->subcategory->subcategory_name ?? '-' }}</td>
                                    
                                                <!-- Image -->
                                                <td>
                                                    @if($item->specialities_image)
                                                        <img src="{{ asset('uploads/specialities/' . $item->specialities_image) }}"
                                                             alt="Image"
                                                             width="60"
                                                             height="60"
                                                             style="object-fit:cover; border-radius:5px;">
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                    
                                                <!-- Actions -->
                                                <td>
                                                    <a href="{{ route('admin.manage-specialities.edit', $item->id) }}"
                                                       class="btn btn-sm btn-primary">Edit</a>
                                                        
                                                        <form action="{{ route('admin.manage-specialities.destroy', $item->id) }}"
                                                              method="POST"
                                                              style="display:inline-block;"
                                                              onsubmit="return confirm('Are you sure you want to delete this?')">
                                                    
                                                            @csrf
                                                            @method('DELETE')
                                                    
                                                            <button type="submit" class="btn btn-sm btn-danger">
                                                                Delete
                                                            </button>
                                                        </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">No data found</td>
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