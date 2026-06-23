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
                                <a href="{{ route('admin.manage-announcements.index') }}">
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
                                        <li class="breadcrumb-item"><a href="{{ route('admin.manage-announcements.index') }}">Home</a></li>
                                        <li class="breadcrumb-item active">Announcements</li>
                                    </ol>
                                </nav>
                                <a href="{{ route('admin.manage-announcements.create') }}" class="btn btn-primary px-5 radius-30">
                                    + Add Announcements
                                </a>


                            </div>


                            <div class="table-responsive custom-scrollbar">
                                <table class="display table table-bordered" id="basic-1">
                                    <thead>
                  
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Featured</th>
                                            <th>Priority</th>
                                            <th>Action</th>
                                        </tr>
                    
                                    </thead>

                                    <tbody>
                                        @forelse($announcements as $key => $announcement)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                    
                                                <td>{{ $announcement->title }}</td>
                                    
                                                <!-- Image -->
                                                <td>
                                                    @if($announcement->image)
                                                        <img src="{{ asset('public/uploads/announcements/'.$announcement->image) }}" 
                                                             width="60" height="60" style="object-fit:cover;">
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                    
                                                <!-- Featured -->
                                                <!-- Featured Toggle -->
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input toggle-featured"
                                                               type="checkbox"
                                                               data-id="{{ $announcement->id }}"
                                                               {{ $announcement->is_featured ? 'checked' : '' }}>
                                                    </div>
                                                </td>
                                                
                                                <!-- Priority Input -->
                                                <td>
                                                    <input type="number"
                                                           class="form-control priority-input"
                                                           value="{{ $announcement->priority }}"
                                                           data-id="{{ $announcement->id }}"
                                                           style="width:140px;">
                                                </td>
                                    
                                                <!-- Actions -->
                                                <td>
                                                    <a href="{{ route('admin.manage-announcements.edit', $announcement->id) }}" 
                                                       class="btn btn-sm btn-primary">Edit</a>
                                                    <br><br>
                                    
                                                    <form action="{{ route('admin.manage-announcements.destroy', $announcement->id) }}" 
                                                          method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                    
                                                        <button type="submit" 
                                                                class="btn btn-sm btn-danger"
                                                                onclick="return confirm('Are you sure?')">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No data found</td>
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
    
    
    
    <script>
        $(document).ready(function(){

            // ✅ Featured Toggle
            $('.toggle-featured').change(function(){
                let id = $(this).data('id');
                let value = $(this).is(':checked') ? 1 : 0;
        
                $.ajax({
                    url: "{{ route('admin.announcement.toggle-featured') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id,
                        is_featured: value
                    },
                    success: function(res){
                        alert(res.message);
                    }
                });
            });
        
            // ✅ Priority Update (on change)
            $('.priority-input').on('change', function(){
                let id = $(this).data('id');
                let value = $(this).val();
        
                $.ajax({
                    url: "{{ route('admin.announcement.update-priority') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id,
                        priority: value
                    },
                    success: function(res){
                        alert(res.message);
                    }
                });
            });
        
        });
    </script>


</body>
</html>