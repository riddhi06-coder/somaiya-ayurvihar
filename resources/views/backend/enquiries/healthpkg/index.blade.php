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
          <div class="col-sm-12">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.health-pkg-enquiries.index') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Health Packages Enquiries</li>
                        </ol>
                    </nav>
                </div>

                <!-- Filter bar (client-side, no form / no URL params) -->
                <div class="row mb-4">
                    <div class="col-md-3 mb-2">
                        <label class="form-label">Package</label>
                        <select id="filterPackage" class="form-control">
                            <option value="">All Packages</option>
                            @foreach($packages as $pkg)
                                <option value="{{ $pkg }}">{{ $pkg }}</option>
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
                                <th>Name</th>
                                <th>Package</th>
                                <th>Date of Birth</th>
                                <th>Appointment Date</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Submitted On</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($enquiries as $key => $enquiry)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $enquiry->name ?? '-' }}</td>
                                    <td>{{ $enquiry->package ?? '-' }}</td>
                                    <td>{{ $enquiry->birth ? \Carbon\Carbon::parse($enquiry->birth)->format('d M Y') : '-' }}</td>
                                    <td>{{ $enquiry->appointment_date ? \Carbon\Carbon::parse($enquiry->appointment_date)->format('d M Y') : '-' }}</td>
                                    <td>{{ $enquiry->email ?? '-' }}</td>
                                    <td>{{ $enquiry->mobile ?? '-' }}</td>
                                    <td>{{ $enquiry->created_at ? \Carbon\Carbon::parse($enquiry->created_at)->format('d M Y, h:i A') : '-' }}</td>
                                    <td>
                                        {{-- View --}}
                                        <a href="{{ route('admin.health-pkg-enquiries.show', $enquiry->id) }}"
                                           target="_blank" class="btn btn-success btn-sm" style="margin-right:5px;">View</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">No enquiries found.</td>
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

    <!-- Client-side filtering -->
    <script>
        jQuery(function ($) {
            var table = $('#basic-1').DataTable();

            var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
            function isoToDisplay(iso) {
                if (!iso) return '';
                var p = iso.split('-');
                return p[2] + ' ' + months[parseInt(p[1], 10) - 1] + ' ' + p[0];
            }
            function esc(s) { return s.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'); }

            // Column indexes: 2 = Package, 4 = Appointment Date
            $('#filterPackage').on('change', function () {
                var v = this.value;
                table.column(2).search(v ? '^' + esc(v) + '$' : '', true, false).draw();
            });

            $('#filterDate').on('change', function () {
                var disp = isoToDisplay(this.value);
                table.column(4).search(disp ? '^' + esc(disp) + '$' : '', true, false).draw();
            });

            $('#resetFilters').on('click', function () {
                $('#filterPackage').val('');
                $('#filterDate').val('');
                table.columns().search('').draw();
            });
        });
    </script>
</body>
</html>