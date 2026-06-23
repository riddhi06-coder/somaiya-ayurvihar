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
              <h4>Health Package Enquiry Details</h4>
            </div>
            <div class="col-6">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.health-pkg-enquiries.index') }}">
                    <svg class="stroke-icon">
                      <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                    </svg></a></li>
                <li class="breadcrumb-item active">Enquiry Details</li>
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
                <h5 class="mb-0">{{ $enquiry->name }}</h5>
                <a href="{{ route('admin.health-pkg-enquiries.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <th style="width:30%;">Name</th>
                        <td>{{ $enquiry->name }}</td>
                      </tr>
                      <tr>
                        <th>Package</th>
                        <td>{{ $enquiry->package }}</td>
                      </tr>
                      <tr>
                        <th>Date of Birth</th>
                        <td>{{ \Carbon\Carbon::parse($enquiry->birth)->format('d M Y') }}</td>
                      </tr>
                      <tr>
                        <th>Appointment Date</th>
                        <td>{{ \Carbon\Carbon::parse($enquiry->appointment_date)->format('d M Y') }}</td>
                      </tr>
                      <tr>
                        <th>Email</th>
                        <td>{{ $enquiry->email }}</td>
                      </tr>
                      <tr>
                        <th>Mobile</th>
                        <td>{{ $enquiry->mobile }}</td>
                      </tr>
                      <tr>
                        <th>Submitted On</th>
                        <td>{{ $enquiry->created_at ? \Carbon\Carbon::parse($enquiry->created_at)->format('d M Y, h:i A') : '' }}</td>
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