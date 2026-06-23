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
              <h4>Career Application Details</h4>
            </div>
            <div class="col-6">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.career-enquiries.index') }}">
                    <svg class="stroke-icon">
                      <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                    </svg></a></li>
                <li class="breadcrumb-item active">Application Details</li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ $application->name }}</h5>
                <a href="{{ route('admin.career-enquiries.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <th style="width:30%;">Name</th>
                        <td>{{ $application->name ?? '-' }}</td>
                      </tr>
                      <tr>
                        <th>Email</th>
                        <td>{{ $application->email ?? '-' }}</td>
                      </tr>
                      <tr>
                        <th>Job Title</th>
                        <td>{{ $application->job_title ?? '-' }}</td>
                      </tr>
                      <tr>
                        <th>Message</th>
                        <td>{{ $application->message ?: '-' }}</td>
                      </tr>
                      <tr>
                        <th>Resume</th>
                        <td>
                          @if($application->resume_path)
                            <a href="{{ asset($application->resume_path) }}" target="_blank"
                               download="{{ $application->resume_original_name }}"
                               class="btn btn-secondary btn-sm">
                                Download {{ $application->resume_original_name }}
                            </a>
                          @else
                            -
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th>Submitted On</th>
                        <td>{{ $application->created_at ? \Carbon\Carbon::parse($application->created_at)->format('d M Y, h:i A') : '-' }}</td>
                      </tr>
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
</body>
</html>