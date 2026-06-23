<!doctype html>
<html lang="en">
<head>
    @include('components.backend.head')

    <style>
        /* ---- Column widths ---- */
        #basic-1 { table-layout: fixed; width: 100%; }
        #basic-1 col.col-sr      { width: 50px; }
        #basic-1 col.col-img     { width: 90px; }
        #basic-1 col.col-name    { width: 17%; }
        #basic-1 col.col-desig   { width: 110px; }
        #basic-1 col.col-qual    { width: 22%; }
        #basic-1 col.col-timing  { width: 25%; }
        #basic-1 col.col-status  { width: 90px; }
        #basic-1 col.col-action  { width: 110px; }

        #basic-1 td {
            vertical-align: middle;
            font-size: 14px;
            word-wrap: break-word;
        }

        /* Image */
        .doctor-img {
            width: 64px;
            height: 64px;
            object-fit: cover;
            border-radius: 6px;
        }

        /* ---- Subtle table head ---- */
        #basic-1 thead th {
            background: #f8fafc;
            color: #475569;
            font-weight: 600;
            font-size: 12px;
            letter-spacing: .02em;
            vertical-align: middle;
            border-bottom: 2px solid #e2e8f0;
        }
        #basic-1 tbody tr.doctor-row:hover td {
            background: #fafbfc;
        }

        /* ---- Doctor name: clearer, darker, slightly larger ---- */
        .doctor-name {
            font-size: 15px;
            font-weight: 600;
            color: #1e293b;
            line-height: 1.35;
        }

        /* ---- Subtle group rows ---- */
        .table-primary td {
            background: #f4f6f9;
            font-weight: 600;
            color: #1e293b;
            padding: 9px 10px;
            border-left: 3px solid #64748b;
        }
        .table-secondary td {
            background: #fafbfc;
            font-weight: 500;
            color: #475569;
            padding: 7px 10px 7px 18px;
            border-left: 3px solid #cbd5e1;
        }
        .table-light td {
            background: #fff;
            color: #64748b;
            font-size: 13px;
            padding: 6px 10px 6px 26px;
            border-left: 3px solid #e2e8f0;
        }

        /* Qualification readability */
        .qual-cell { white-space: normal; line-height: 1.4; }

        /* ---- Subtle timing pills ---- */
        .timing-pill {
            background: #f8fafc;
            border-left: 2px solid #cbd5e1;
            border-radius: 4px;
            padding: 4px 8px;
            margin-bottom: 5px;
            font-size: 12px;
            line-height: 1.35;
        }
        .timing-pill:last-child { margin-bottom: 0; }
        .timing-days  { display: block; font-weight: 600; color: #334155; }
        .timing-hours { display: block; color: #64748b; }

        /* Buttons compact */
        #basic-1 .btn { padding: 4px 10px; font-size: 13px; }

        /* ---- Orange Download CSV ---- */
        .btn-download-csv {
            background: #f97316;
            border-color: #f97316;
            color: #fff;
        }
        .btn-download-csv:hover {
            background: #ea580c;
            border-color: #ea580c;
            color: #fff;
        }

        /* Loader overlay */
        #pageLoader {
            position: fixed;
            inset: 0;
            background: rgba(255, 255, 255, 0.85);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: opacity 0.3s ease;
        }
        #pageLoader.hidden { opacity: 0; pointer-events: none; }
        .loader-spinner {
            width: 50px;
            height: 50px;
            border: 5px solid #e2e8f0;
            border-top-color: #64748b;
            border-radius: 50%;
            animation: loaderSpin 0.8s linear infinite;
        }
        @keyframes loaderSpin { to { transform: rotate(360deg); } }
    </style>

</head>
<body>

     <!-- Loader -->
    <div id="pageLoader">
        <div class="loader-spinner"></div>
    </div>

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
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.manage-doctors.template') }}"
                                       class="btn btn-download-csv radius-30">
                                        Download CSV
                                    </a>

                                    <button type="button" class="btn btn-success radius-30"
                                            data-bs-toggle="modal" data-bs-target="#bulkUploadModal">
                                        Bulk Upload
                                    </button>

                                    <button type="button" class="btn btn-info radius-30"
                                            data-bs-toggle="modal" data-bs-target="#imageUploadModal">
                                        Upload Doctor Photos
                                    </button>

                                    <a href="{{ route('admin.manage-doctors.create') }}" class="btn btn-primary px-5 radius-30">
                                        + Add Doctor
                                    </a>
                                </div>
                            </div>

                            {{-- Collect all unique subcategories across every category --}}
                            @php
                                $allSubcategories = [];
                                foreach ($doctors as $masterName => $subcategories) {
                                    foreach ($subcategories as $subName => $services) {
                                        $allSubcategories[$subName] = true;
                                    }
                                }
                                $allSubcategories = array_keys($allSubcategories);
                            @endphp

                            <!-- ✅ Filters: Category + Subcategory + Search (independent) -->
                            <div class="d-flex justify-content-end align-items-center gap-2 mb-3 flex-wrap">
                                <select id="categoryFilter" class="form-select w-auto">
                                    <option value="">All Categories</option>
                                    @foreach($doctors as $masterName => $subcategories)
                                        <option value="{{ $masterName }}">{{ $masterName }}</option>
                                    @endforeach
                                </select>

                                <select id="subcategoryFilter" class="form-select w-auto">
                                    <option value="">All Subcategories</option>
                                    @foreach($allSubcategories as $subName)
                                        <option value="{{ $subName }}">{{ $subName }}</option>
                                    @endforeach
                                </select>

                                <input type="text"
                                       id="doctorSearch"
                                       class="form-control w-auto"
                                       placeholder="Search Doctor / Category / Service...">
                            </div>

                            <div class="table-responsive custom-scrollbar">
                                <table class="display table table-bordered" id="basic-1">
                                    <colgroup>
                                        <col class="col-sr">
                                        <col class="col-img">
                                        <col class="col-name">
                                        <col class="col-desig">
                                        <col class="col-qual">
                                        <col class="col-timing">
                                        <col class="col-status">
                                        <col class="col-action">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Doctor Name</th>
                                            <th>Designation</th>
                                            <th>Qualification</th>
                                            <th>Timings</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php $sr = 1; @endphp

                                        @foreach($doctors as $masterName => $subcategories)

                                            {{-- Main Category --}}
                                            <tr class="table-primary">
                                                <td colspan="8"><strong>Main Category: {{ $masterName }}</strong></td>
                                            </tr>

                                            @foreach($subcategories as $subName => $services)

                                                {{-- Sub Category --}}
                                                <tr class="table-secondary">
                                                    <td colspan="8"><strong>Sub Category: {{ $subName }}</strong></td>
                                                </tr>

                                                @foreach($services as $serviceName => $doctorsList)

                                                    @php
                                                        if($serviceName === 'No Service') {
                                                            $serviceName = '';
                                                        }
                                                    @endphp

                                                    {{-- Service --}}
                                                    @if(!empty($serviceName))
                                                    <tr class="table-light">
                                                        <td colspan="8"><strong>Service: {{ $serviceName }}</strong></td>
                                                    </tr>
                                                    @endif

                                                    @foreach($doctorsList as $doctor)

                                                        <tr class="doctor-row" id="doctor-{{ $doctor->id }}">
                                                            <td>{{ $sr++ }}</td>

                                                            {{-- Image --}}
                                                            <td>
                                                                <img src="{{ asset('uploads/doctors/' . ($doctor->doctor_image ?: 'default-doctor.png')) }}"
                                                                 alt="{{ $doctor->doctor_name }}"
                                                                 class="doctor-img">
                                                            </td>

                                                            {{-- Doctor Name --}}
                                                            <td class="doctor-name">{{ $doctor->doctor_name }}</td>

                                                            {{-- Designation --}}
                                                            <td>{{ $doctor->designation ?: '-' }}</td>

                                                            {{-- Qualification --}}
                                                            <td class="qual-cell">{{ $doctor->qualification ?: '-' }}</td>

                                                            {{-- Timings --}}
                                                            <td>
                                                                @php
                                                                    $slots = $doctor->doctor_time_slot;
                                                                    if (is_string($slots)) $slots = json_decode($slots, true);
                                                                    $slots = is_array($slots) ? $slots : [];
                                                                @endphp

                                                                @if(count($slots))
                                                                    @foreach($slots as $slot)
                                                                        <div class="timing-pill">
                                                                            <span class="timing-days">
                                                                                {{ is_array($slot['days'] ?? null) ? implode(', ', $slot['days']) : ($slot['days'] ?? '') }}
                                                                            </span>
                                                                            <span class="timing-hours">{{ $slot['from'] ?? '' }} – {{ $slot['to'] ?? '' }}</span>
                                                                        </div>
                                                                    @endforeach
                                                                @else
                                                                    <span class="text-muted">-</span>
                                                                @endif
                                                            </td>

                                                            {{-- Status --}}
                                                            <td>
                                                                <form action="{{ route('admin.manage-doctors.toggleStatus', $doctor->id) }}"
                                                                      method="POST" onsubmit="return confirm('Change status?');">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <button type="submit"
                                                                        class="btn btn-sm remember-scroll {{ $doctor->status ? 'btn-success' : 'btn-warning' }}"
                                                                        data-doctor-id="{{ $doctor->id }}">
                                                                        {{ $doctor->status ? 'Active' : 'Inactive' }}
                                                                    </button>
                                                                </form>
                                                            </td>

                                                            {{-- Action --}}
                                                            <td>
                                                                <a href="{{ route('admin.manage-doctors.edit', $doctor->id) }}"
                                                                   class="btn btn-sm btn-primary mb-1 remember-scroll"
                                                                   data-doctor-id="{{ $doctor->id }}">Edit</a>

                                                                <form action="{{ route('admin.manage-doctors.destroy', $doctor->id) }}"
                                                                      method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn btn-sm btn-danger mb-1 remember-scroll"
                                                                            data-doctor-id="{{ $doctor->id }}"
                                                                            onclick="return confirm('Delete this record?')">Delete</button>
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


    <div class="modal fade" id="bulkUploadModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.manage-doctors.import') }}"
                  method="POST" enctype="multipart/form-data" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Bulk Upload Doctors</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <label class="form-label">Excel File <span class="txt-danger">*</span></label>
                    <input type="file" name="import_file" class="form-control"
                           accept=".xlsx,.xls,.csv" required>
                    <small class="text-secondary d-block mt-2">
                        <b>Note:</b> Use the provided template. Max file size 5MB.<br>
                        <b>Note:</b> Upload doctor photos to <code>uploads/doctors</code> first,
                        then mention the file names in the sheet.
                    </small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </form>
        </div>
    </div>


    <!--- Bulk Imgae upload modal--->
    <div class="modal fade" id="imageUploadModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.manage-doctors.upload-images') }}"
                  method="POST" enctype="multipart/form-data" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Upload Doctor Photos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <label class="form-label">Select Multiple Images</label>
                    <input type="file" name="images[]" class="form-control" multiple
                           accept=".jpg,.jpeg,.png,.webp,.svg">

                    <div class="text-center my-2 fw-bold">— OR —</div>

                    <label class="form-label">Upload a Zip of Images</label>
                    <input type="file" name="zip_file" class="form-control" accept=".zip">

                    <small class="text-secondary d-block mt-2">
                        <b>Note:</b> File names must exactly match the "Image Filename" column
                        in the Excel sheet (e.g. <code>dr-sadanand-shetty.jpg</code>).<br>
                        <b>Note:</b> Each image max 2MB. Zip max 50MB.
                    </small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>


    @include('components.backend.footer')
    @include('components.backend.main-js')


    <!--- Category / Subcategory / Search Filter (no pagination) ---->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const categorySelect = document.getElementById('categoryFilter');
        const subSelect      = document.getElementById('subcategoryFilter');
        const searchInput    = document.getElementById('doctorSearch');
        const table          = document.querySelector('#basic-1 tbody');

        // Tag each doctor row with its group headers
        const items = [];
        let curMaster = null, curSub = null, curService = null;

        Array.from(table.querySelectorAll('tr')).forEach(row => {
            if (row.classList.contains('table-primary'))        { curMaster = row; curSub = null; curService = null; }
            else if (row.classList.contains('table-secondary')) { curSub = row; curService = null; }
            else if (row.classList.contains('table-light'))     { curService = row; }
            else if (row.classList.contains('doctor-row')) {
                items.push({
                    row,
                    master: curMaster, sub: curSub, service: curService,
                    masterText: curMaster ? curMaster.innerText.toLowerCase() : '',
                    subText:    curSub    ? curSub.innerText.toLowerCase()    : '',
                    rowText:    row.innerText.toLowerCase()
                });
            }
        });

        function applyFilters() {
            const cat = categorySelect.value.toLowerCase().trim();
            const sub = subSelect.value.toLowerCase().trim();
            const q   = searchInput ? searchInput.value.toLowerCase().trim() : '';

            // hide everything first
            Array.from(table.querySelectorAll('tr')).forEach(r => r.style.display = 'none');
            const old = table.querySelector('.no-data-row');
            if (old) old.remove();

            let anyVisible = false;

            items.forEach(it => {
                const catOk = !cat || it.masterText.includes(cat);
                const subOk = !sub || it.subText.includes(sub);
                const qOk   = !q   || it.rowText.includes(q) || it.masterText.includes(q) || it.subText.includes(q);

                if (catOk && subOk && qOk) {
                    if (it.master)  it.master.style.display  = '';
                    if (it.sub)     it.sub.style.display     = '';
                    if (it.service) it.service.style.display = '';
                    it.row.style.display = '';
                    anyVisible = true;
                }
            });

            if (!anyVisible) {
                const tr = document.createElement('tr');
                tr.className = 'no-data-row';
                tr.innerHTML = '<td colspan="8" class="text-center py-4">No data found</td>';
                table.appendChild(tr);
            }
        }

        categorySelect.addEventListener('change', applyFilters);
        subSelect.addEventListener('change', applyFilters);
        if (searchInput) searchInput.addEventListener('input', applyFilters);

        applyFilters();

        const loader = document.getElementById('pageLoader');
        if (loader) loader.classList.add('hidden');
    });
    </script>


    <!--- Remember & restore scroll position across edit/delete/status reloads ---->
    <script>
        (function () {
        const STORAGE_KEY = 'doctorsScrollTarget';

        // 1) When user clicks Edit / Delete / Status, remember which doctor row they were on
        document.addEventListener('click', function (e) {
            const el = e.target.closest('.remember-scroll');
            if (!el) return;
            const id = el.dataset.doctorId;
            if (id) {
                sessionStorage.setItem(STORAGE_KEY, JSON.stringify({
                    id: id,
                    y: window.scrollY
                }));
            }
        });

        // 2) On page load, scroll back to that row (runs after the loader hides)
        window.addEventListener('load', function () {
            const raw = sessionStorage.getItem(STORAGE_KEY);
            if (!raw) return;

            let data;
            try { data = JSON.parse(raw); } catch (_) { sessionStorage.removeItem(STORAGE_KEY); return; }
            sessionStorage.removeItem(STORAGE_KEY);

            // small delay so the table/filters/loader settle first
            setTimeout(function () {
                const row = document.getElementById('doctor-' + data.id);
                if (row) {
                    row.scrollIntoView({ behavior: 'auto', block: 'center' });
                    // brief highlight so the user spots the record
                    row.style.transition = 'background 0.4s ease';
                    const tds = row.querySelectorAll('td');
                    tds.forEach(td => td.style.background = '#fff7ed');
                    setTimeout(() => tds.forEach(td => td.style.background = ''), 1600);
                } else if (typeof data.y === 'number') {
                    window.scrollTo(0, data.y);   // fallback: raw position (e.g. after delete)
                }
            }, 200);
        });
    })();
    </script>


</body>
</html>