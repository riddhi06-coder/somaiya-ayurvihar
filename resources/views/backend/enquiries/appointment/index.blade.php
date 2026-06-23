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
            </div>
            <div class="col-6">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">
                    <svg class="stroke-icon">
                      <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                    </svg></a></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- Container-fluid starts-->
      <div class="container-fluid">
        <div class="row">
          <!-- Zero Configuration  Starts-->
          <div class="col-sm-12">
            <div class="card">
              <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.manage-appointment-enquiries.index') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Doctor Appointment Enquiries</li>
                        </ol>
                    </nav>
                </div>

                <!-- Filter bar (client-side, no form / no URL params) -->
                <div class="row mb-4">
                    <div class="col-md-3 mb-2">
                        <label class="form-label">Doctor</label>
                        <select id="filterDoctor" class="form-control">
                            <option value="">All Doctors</option>
                            @foreach($doctors as $doc)
                                <option value="{{ $doc }}">{{ $doc }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3 mb-2">
                        <label class="form-label">Speciality</label>
                        <select id="filterSpeciality" class="form-control">
                            <option value="">All Specialities</option>
                            @foreach($specialities as $sp)
                                <option value="{{ $sp }}">{{ $sp }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3 mb-2">
                        <label class="form-label">Appointment Date</label>
                        <input type="date" id="filterDate" class="form-control">
                    </div>

                    <div class="col-md-3 mb-2 d-flex align-items-end">
                        <button type="button" id="resetFilters" class="btn btn-secondary">Reset</button>
                    </div>
                </div>

                <div class="table-responsive custom-scrollbar">
                    <table class="display table table-bordered" id="basic-1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Patient Name</th>
                                <th>Speciality</th>
                                <th>Doctor</th>
                                <th>Mobile</th>
                                <th>Appointment Date</th>
                                <th>Slot</th>
                                <th>Submitted On</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($appointments as $key => $appointment)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $appointment->patient_name }}</td>
                                    <td>{{ $appointment->speciality }}</td>
                                    <td>{{ $appointment->doctor_name }}</td>
                                    <td>{{ $appointment->mobile }}</td>
                                    <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') }}</td>
                                    <td>{{ $appointment->slot }}</td>
                                    <td>{{ $appointment->created_at ? \Carbon\Carbon::parse($appointment->created_at)->format('d M Y, h:i A') : '' }}</td>
                                    <td>
                                        {{-- View (opens detail page in a new tab) --}}
                                        <a href="{{ route('admin.manage-appointment-enquiries.show', $appointment->id) }}"
                                           target="_blank" class="btn btn-success btn-sm" style="margin-right:5px;">View</a><br><br>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">No appointments found.</td>
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

    <!-- Client-side filtering for the appointments table -->
    <script>
        jQuery(function ($) {
            // Grab the DataTable instance already initialised by the template
            var table = $('#basic-1').DataTable();

            var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

            // Convert a date input value (YYYY-MM-DD) to the displayed format (DD Mon YYYY)
            function isoToDisplay(iso) {
                if (!iso) return '';
                var p = iso.split('-');
                return p[2] + ' ' + months[parseInt(p[1], 10) - 1] + ' ' + p[0];
            }

            // Escape regex special chars so exact-match search is safe
            function esc(s) { return s.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'); }

            // Column indexes: 2 = Speciality, 3 = Doctor, 5 = Appointment Date
            $('#filterDoctor').on('change', function () {
                var v = this.value;
                table.column(3).search(v ? '^' + esc(v) + '$' : '', true, false).draw();
            });

            $('#filterSpeciality').on('change', function () {
                var v = this.value;
                table.column(2).search(v ? '^' + esc(v) + '$' : '', true, false).draw();
            });

            $('#filterDate').on('change', function () {
                var disp = isoToDisplay(this.value);
                table.column(5).search(disp ? '^' + esc(disp) + '$' : '', true, false).draw();
            });

            $('#resetFilters').on('click', function () {
                $('#filterDoctor').val('');
                $('#filterSpeciality').val('');
                $('#filterDate').val('');
                table.columns().search('').draw(); // clear all column filters
            });
        });
    </script>

</body>

</html>