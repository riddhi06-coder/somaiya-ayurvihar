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
											<a href="{{ route('admin.footer-details.index') }}">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Footer Details</li>
									</ol>
								</nav>

								<a href="{{ route('admin.footer-details.create') }}" class="btn btn-primary px-5 radius-30">+ Add Footer Details</a>
							</div>


                    <div class="table-responsive custom-scrollbar">

<table class="table table-bordered" id="basic-1">
        <thead>
            <tr>
                <th>#</th>
                <th>Logo</th>
                <th>Address</th>
                <th>24x7 Enquiry</th>
                <th>Emergency Contact</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($footers as $key => $footer)
                <tr>
                    <td>{{ $key + 1 }}</td>
                   <td>
                        @if($footer->logo)
                            <img src="{{ asset('home/footer/' . $footer->logo) }}" alt="Logo" style="height:40px;">
                        @endif
                    </td>

                    <td>{{ Str::limit($footer->address, 50) }}</td>
                    <td>{{ $footer->enquiry_number }}</td>
                    <td>{{ $footer->emergency_contact }}</td>
                    <td>
                        <a href="{{ route('admin.footer-details.edit', $footer->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        
                        <form action="{{ route('admin.footer-details.destroy', $footer->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
            <!-- footer start-->
             @include('components.backend.footer')
      </div>
    </div>

        @include('components.backend.main-js')
<script>
    $(document).ready(function () {
        $('#basic-1').DataTable();
    });
</script>


</body>

</html>