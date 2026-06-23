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
              <h4>Appointment Details</h4>
            </div>
            <div class="col-6">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.manage-appointment-enquiries.index') }}">
                    <svg class="stroke-icon">
                      <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                    </svg></a></li>
                <li class="breadcrumb-item active">Appointment Details</li>
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
                <h5 class="mb-0">{{ $appointment->patient_name }}</h5>
                <a href="{{ route('admin.manage-appointment-enquiries.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
              </div>

              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <th style="width:30%;">Patient Name</th>
                        <td>{{ $appointment->patient_name }}</td>
                      </tr>
                      <tr>
                        <th>Gender</th>
                        <td>{{ $appointment->gender }}</td>
                      </tr>
                      <tr>
                        <th>Mobile</th>
                        <td>{{ $appointment->mobile }}</td>
                      </tr>
                      <tr>
                        <th>Email</th>
                        <td>{{ $appointment->email }}</td>
                      </tr>
                      <tr>
                        <th>Pincode</th>
                        <td>{{ $appointment->pincode }}</td>
                      </tr>
                      <tr>
                        <th>City</th>
                        <td>{{ $appointment->city }}</td>
                      </tr>
                      <tr>
                        <th>State</th>
                        <td>{{ $appointment->state }}</td>
                      </tr>
                      <tr>
                        <th>Country</th>
                        <td>{{ $appointment->country }}</td>
                      </tr>
                      <tr>
                        <th>Speciality</th>
                        <td>{{ $appointment->speciality }}</td>
                      </tr>
                      <tr>
                        <th>Doctor</th>
                        <td>{{ $appointment->doctor_name }}</td>
                      </tr>
                      <tr>
                        <th>Appointment Date</th>
                        <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') }}</td>
                      </tr>
                      <tr>
                        <th>Slot</th>
                        <td>{{ $appointment->slot }}</td>
                      </tr>
                      <tr>
                        <th>Submitted On</th>
                        <td>{{ $appointment->created_at ? \Carbon\Carbon::parse($appointment->created_at)->format('d M Y, h:i A') : '' }}</td>
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