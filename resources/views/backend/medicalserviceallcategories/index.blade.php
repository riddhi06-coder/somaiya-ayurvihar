<!doctype html>
<html lang="en">
<head>
    @include('components.backend.head')
    
    
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
        }
        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .4s;
        }
        input:checked + .slider {
            background-color: #11d624;
        }
        input:checked + .slider:before {
            transform: translateX(26px);
        }
        .slider.round {
            border-radius: 24px;
        }
        .slider.round:before {
            border-radius: 50%;
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
                                <a href="{{ route('admin.dashboard') }}">
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
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                        <li class="breadcrumb-item active"> Facilities</li>
                                    </ol>
                                </nav>
                                <a href="{{ route('admin.medicalserviceallcategories.create') }}" class="btn btn-primary px-5 radius-30">
                                    + Add Facilities
                                </a>
                            </div>

                            <div class="table-responsive custom-scrollbar">
                                <table class="table table-bordered table-hover" id="basic-1">
                                    <thead>
                                        <tr>
                                           <th>#</th>
                                            <th>Service Name</th>
                                            <th>Main Category</th>
                                            <th>Subcategory</th>
                                            <th>Priority</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php $sr = 1; @endphp
                                    
                                        @foreach($services as $service)
                                            <tr>
                                                <td>{{ $sr++ }}</td>

                                                <td>{{ $service->service_name }}</td>  <!-- FIRST -->
                                                
                                                <td>{{ optional($service->category)->category_name }}</td>
                                                
                                                <td>{{ optional($service->subcategory)->subcategory_name }}</td>
                                    
                                                <!-- PRIORITY -->
                                                <td>
                                                    <input type="number" 
                                                           value="{{ $service->priority ?? 0 }}" 
                                                           class="form-control priority-input" 
                                                           data-id="{{ $service->id }}" 
                                                           style="width:80px;">
                                                </td>
                                                
                                                
                                                <!-- STATUS -->
                                                <td>
                                                    <form method="POST" action="{{ route('admin.medicalserviceallcategories.toggleStatus') }}">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $service->id }}">
                                                
                                                        <label class="switch">
                                                            <input type="checkbox"
                                                                   name="is_active"
                                                                   value="1"
                                                                   onchange="return confirmStatusToggle(this)"
                                                                   {{ $service->is_active == 1 ? 'checked' : '' }}>
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </form>
                                                </td>
                                    
                                                <!-- ACTIONS -->
                                                <td>
                                                    <a href="{{ route('admin.medicalserviceallcategories.edit', $service->id) }}"
                                                       class="btn btn-sm btn-primary">
                                                        Edit
                                                    </a><br><br>
                                    
                                                    <form action="{{ route('admin.medicalserviceallcategories.destroy', $service->id) }}"
                                                          method="POST"
                                                          style="display:inline-block;"
                                                          onsubmit="return confirm('Are you sure you want to delete this record?')">
                                                        @csrf
                                                        @method('DELETE')
                                    
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
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
        function confirmStatusToggle(checkbox) {
    const action = checkbox.checked ? 'activate' : 'deactivate';
    if (confirm(`Are you sure you want to ${action} this service?`)) {
        checkbox.form.submit();
        return true;
    } else {
        checkbox.checked = !checkbox.checked;
        return false;
    }
}
    </script>

    <!--- Update Priority---->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.priority-input').forEach(input => {
                input.addEventListener('change', function () {
        
                    let id = this.dataset.id;
                    let priority = this.value;
        
                    fetch("{{ route('admin.manage-medicalservicecategory.updatePriority') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            id: id,
                            priority: priority
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.status) {
                        //   alert('Priority updated');
                        } else {
                            alert('Update failed');
                        }
                    });
        
                });
            });
        });
    </script>
    
</body>
</html>