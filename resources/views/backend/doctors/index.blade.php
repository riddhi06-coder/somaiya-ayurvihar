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
                                <a href="{{ route('admin.manage-doctors.index') }}">
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
                                        <li class="breadcrumb-item"><a href="{{ route('admin.manage-doctors.index') }}">Home</a></li>
                                        <li class="breadcrumb-item active">Doctors</li>
                                    </ol>
                                </nav>
                                <a href="{{ route('admin.manage-doctors.create') }}" class="btn btn-primary px-5 radius-30">
                                    + Add Doctor
                                </a>
                            </div>


                            <div class="table-responsive custom-scrollbar">
                                <table class="display table table-bordered" id="basic-1">
                                    <thead>
                  
                                        <tr>
                                            <th>#</th>
                                            <th>Main Category</th>
                                            <th>Sub Category</th>
                                            <th>Service</th>
                                            <th>Doctor Name</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                    
                                    </thead>
                                    <tbody>
                                        @php $sr = 1; @endphp

                                        @foreach($doctors as $masterName => $subcategories)

                                            @foreach($subcategories as $subName => $services)

                                                @foreach($services as $serviceName => $doctorsList)

                                                    @php
                                                        if($serviceName === 'No Service') {
                                                            $serviceName = '';
                                                        }
                                                    @endphp

                                                    @foreach($doctorsList as $doctor)

                                                        <tr>
                                                            <td>{{ $sr++ }}</td>

                                                            {{-- Main Category --}}
                                                            <td>{{ $masterName }}</td>

                                                            {{-- Sub Category --}}
                                                            <td>{{ $subName }}</td>

                                                            {{-- Service --}}
                                                            <td>{{ $serviceName ?? '-'}}</td>

                                                            {{-- Doctor Name --}}
                                                            <td>{{ $doctor->doctor_name }}</td>

                                                            {{-- Image --}}
                                                            <td>
                                                                <img src="{{ asset('uploads/doctors/'.$doctor->doctor_image) }}"
                                                                    width="120">
                                                            </td>

                                                            {{-- Action --}}
                                                            <td>

                                                                <a href="{{ route('admin.manage-doctors.edit', $doctor->id) }}"
                                                                class="btn btn-sm btn-primary">
                                                                    Edit
                                                                </a>

                                                                <form action="{{ route('admin.manage-doctors.destroy', $doctor->id) }}"
                                                                    method="POST"
                                                                    class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')

                                                                    <button class="btn btn-sm btn-danger"
                                                                            onclick="return confirm('Delete this record?')">
                                                                        Delete
                                                                    </button>
                                                                </form><br><br>

                                                                <form action="{{ route('admin.manage-doctors.toggleStatus', $doctor->id) }}"
                                                                    method="POST"
                                                                    class="d-inline"
                                                                    onsubmit="return confirm('Change status?');">

                                                                    @csrf
                                                                    @method('PATCH')

                                                                    <button type="submit"
                                                                            class="btn btn-sm {{ $doctor->status ? 'btn-success' : 'btn-warning' }}">
                                                                        {{ $doctor->status ? 'Active' : 'Inactive' }}
                                                                    </button>
                                                                </form>

                                                            </td>
                                                        </tr>

                                                    @endforeach

                                                @endforeach

                                            @endforeach

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
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('doctorSearch');
            const table = document.querySelector('table tbody');

            searchInput.addEventListener('input', function () {
                const query = this.value.toLowerCase().trim();
                let anyVisible = false; // Track if any doctor is visible

                // First, hide all rows
                const rows = Array.from(table.querySelectorAll('tr'));
                rows.forEach(row => row.style.display = 'none');

                // Grouping logic based on data attributes
                // We assume headers have "category", "subcategory", "service" rows
                let currentMaster = null;
                let currentSub = null;
                let currentService = null;

                rows.forEach(row => {
                    const isDoctorRow = row.querySelector('td img') !== null;

                    if (row.classList.contains('table-light')) {
                        currentMaster = row;
                        currentMaster.style.display = 'none';
                    } else if (row.classList.contains('table-info')) {
                        currentSub = row;
                        currentSub.style.display = 'none';
                    } else if (row.classList.contains('table-warning') || row.classList.contains('table-info-service')) {
                        currentService = row;
                        currentService.style.display = 'none';
                    }

                    if (isDoctorRow) {
                        const text = row.innerText.toLowerCase();
                        if (text.includes(query) || query === '') {
                            row.style.display = '';
                            anyVisible = true;

                            // Show parent headers
                            if (currentMaster) currentMaster.style.display = '';
                            if (currentSub) currentSub.style.display = '';
                            if (currentService) currentService.style.display = '';
                        }
                    }
                });

                // Show "No data found" if nothing is visible
                let noDataRow = table.querySelector('.no-data-row');
                if (!anyVisible) {
                    if (!noDataRow) {
                        const tr = document.createElement('tr');
                        tr.classList.add('no-data-row');
                        tr.innerHTML = `<td colspan="4" class="text-center">No data found</td>`;
                        table.appendChild(tr);
                    } else {
                        noDataRow.style.display = '';
                    }
                } else if (noDataRow) {
                    noDataRow.style.display = 'none';
                }
            });
        });
    </script>


</body>
</html>