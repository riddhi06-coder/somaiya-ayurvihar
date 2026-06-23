<!doctype html>
<html lang="en">
<head>
    @include('components.backend.head')
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .switch .slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .3s;
            border-radius: 50%;
        }
        .switch input:checked + .slider:before {
            transform: translateX(27px);
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
                                <a href="{{ route('admin.manage-blogs.index') }}">
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
                                        <li class="breadcrumb-item"><a href="{{ route('admin.manage-blogs.index') }}">Home</a></li>
                                        <li class="breadcrumb-item active">Blogs</li>
                                    </ol>
                                </nav>
                                <a href="{{ route('admin.manage-blogs.create') }}" class="btn btn-primary px-5 radius-30">
                                    + Add Blogs
                                </a>


                            </div>


                            <div class="table-responsive custom-scrollbar">
                                <table class="display table table-bordered" id="basic-1">
                                    <thead>
                  
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Priority</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                    
                                    </thead>

                                   <tbody>
                                        @forelse($blogs as $key => $blog)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                    
                                                <!-- Title -->
                                                <td>{{ $blog->title }}</td>
                                    
                                                <!-- Image -->
                                                <td>
                                                    @if($blog->blog_image)
                                                        <img src="{{ asset('uploads/blogs/' . $blog->blog_image) }}"
                                                             width="100px;" height="80px;"
                                                             style="object-fit:cover; border-radius:5px;">
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                    
                                                
                                                <!-- Priority -->
                                                <td>
                                                    <input type="number"
                                                           class="form-control priority-input"
                                                           value="{{ $blog->priority }}"
                                                           data-id="{{ $blog->id }}"
                                                           style="width:140px;">
                                                </td>
                                                
                                                
                                                <!-- Status -->
                                                <td>
                                                    <label class="switch" style="position:relative; display:inline-block; width:55px; height:28px;">
                                                        <input type="checkbox"
                                                               class="status-toggle"
                                                               data-id="{{ $blog->id }}"
                                                               {{ $blog->is_active  ? 'checked' : '' }}
                                                               style="opacity:0; width:0; height:0;">
                                                        <span class="slider" style="position:absolute; cursor:pointer; top:0; left:0; right:0; bottom:0;
                                                              background-color: {{ $blog->is_active  ? '#4caf50' : '#ccc' }};
                                                              transition:.3s; border-radius:34px;"></span>
                                                    </label>
                                                </td>
                                    
                                                <!-- Actions -->
                                                <td>
                                                    <a href="{{ route('admin.manage-blogs.edit', $blog->id) }}"
                                                       class="btn btn-sm btn-primary">
                                                        Edit
                                                    </a>
                                                    <br><br>
                                    
                                                    <form action="{{ route('admin.manage-blogs.destroy', $blog->id) }}"
                                                          method="POST"
                                                          style="display:inline-block;">
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
                                                <td colspan="6" class="text-center">No Data Found</td>
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
        document.querySelectorAll('.status-toggle').forEach(function (toggle) {
            toggle.addEventListener('change', function () {
                let id = this.dataset.id;
                let slider = this.nextElementSibling;
                let checkbox = this;
        
                fetch(`/somaiya/admin/manage-blogs/${id}/toggle-status`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    slider.style.backgroundColor = data.status ? '#4caf50' : '#ccc';
        
                    // ✅ success alert
                    if (data.status) {
                        alert('Blog activated successfully!');
                    } else {
                        alert('Blog deactivated successfully!');
                    }
                })
                .catch(() => {
                    // revert the toggle if the request fails
                    checkbox.checked = !checkbox.checked;
                    alert('Something went wrong. Please try again.');
                });
            });
        });
    </script>

    
    <script>
        $(document).ready(function(){

            // ✅ Priority Update (on change)
            $('.priority-input').on('change', function(){
                let id = $(this).data('id');
                let value = $(this).val();
        
                $.ajax({
                    url: "{{ route('admin.blogs.update-priority') }}",
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