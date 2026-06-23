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
                                <a href="{{ route('admin.ayurveda-enquiries.index') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Ayurveda Enquiries</li>
                        </ol>
                    </nav>
                </div>

              
               <div class="table-responsive custom-scrollbar">
                    <table class="display table table-bordered" id="basic-1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Message</th>
                                <th>Submitted On</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($enquiries as $key => $enquiry)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $enquiry->name }}</td>
                                    <td>{{ $enquiry->email }}</td>
                                    <td>{{ $enquiry->mobile_no }}</td>
                                    <td>{{ Str::limit($enquiry->user_message, 50) }}</td>
                                    <td>{{ $enquiry->created_at ? \Carbon\Carbon::parse($enquiry->created_at)->format('d M Y, h:i A') : '-' }}</td>
                                    <td>
                                        <a href="{{ route('admin.ayurveda-enquiries.show', $enquiry->id) }}"
                                           class="btn btn-sm btn-primary">View</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No enquiries found.</td>
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


</body>

</html>