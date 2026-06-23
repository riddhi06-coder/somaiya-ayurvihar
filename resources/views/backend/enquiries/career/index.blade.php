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
                                <a href="{{ route('admin.career-enquiries.index') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Career Enquiries</li>
                        </ol>
                    </nav>
                </div>

                <!-- Filter bar (client-side, no form / no URL params) -->
                <div class="row mb-4">
                    <div class="col-md-3 mb-2">
                        <label class="form-label">Job Title</label>
                        <select id="filterJob" class="form-control">
                            <option value="">All Jobs</option>
                            @foreach($jobTitles as $jt)
                                <option value="{{ $jt }}">{{ $jt }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label class="form-label">Submitted Date</label>
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
                                <th>Email</th>
                                <th>Job Title</th>
                                <th>Resume</th>
                                <th>Submitted On</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($applications as $key => $application)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $application->name ?? '-' }}</td>
                                    <td>{{ $application->email ?? '-' }}</td>
                                    <td>{{ $application->job_title ?? '-' }}</td>
                                    <td>
                                        @if($application->resume_path)
                                            <a href="{{ asset($application->resume_path) }}" target="_blank"
                                               download="{{ $application->resume_original_name }}"
                                               class="btn btn-secondary btn-sm" title="Download Resume">
                                                <i data-feather="download"></i>
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $application->created_at ? \Carbon\Carbon::parse($application->created_at)->format('d M Y, h:i A') : '-' }}</td>
                                    <td>
                                        {{-- View --}}
 
                                        <a href="{{ route('admin.career-enquiries.show', $application->id) }}"
                                           target="_blank" class="btn btn-success btn-sm" style="margin-right:5px;">View</a><br><br>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No applications found.</td>
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

            // Column indexes: 3 = Job Title, 6 = Submitted On
            $('#filterJob').on('change', function () {
                var v = this.value;
                table.column(3).search(v ? '^' + esc(v) + '$' : '', true, false).draw();
            });

            // Submitted On cell includes a time, so match the date as a substring (not exact)
            $('#filterDate').on('change', function () {
                var disp = isoToDisplay(this.value);
                table.column(6).search(disp ? esc(disp) : '', true, false).draw();
            });

            $('#resetFilters').on('click', function () {
                $('#filterJob').val('');
                $('#filterDate').val('');
                table.columns().search('').draw();
            });
        });
    </script>
</body>
</html>