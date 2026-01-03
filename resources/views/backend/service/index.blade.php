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
                                    <a href="{{ route('admin.manage-service-details.index') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Service Details</li>
                            </ol>
                        </nav>

                        <a href="{{ route('admin.manage-service-details.create') }}" class="btn btn-primary px-5 radius-30">+ Add Details</a>
                    </div>


                    <div class="table-responsive custom-scrollbar">
                        <table class="display table table-bordered" id="basic-1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Banner Heading</th>
                                    <th>Banner Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php $i = 1; @endphp

                                @foreach($services as $categoryName => $subcategories)

                                    <!-- CATEGORY ROW -->
                                    <tr class="table-primary fw-bold">
                                        <td colspan="4">Main Category: {{ $categoryName }}</td>
                                    </tr>

                                    @foreach($subcategories as $subcategoryName => $serviceGroups)

                                        <!-- SUBCATEGORY ROW -->
                                        <tr class="table-secondary fw-bold">
                                            <td colspan="4" class="ps-4"> Sub Category: {{ $subcategoryName }}</td>
                                        </tr>

                                        @foreach($serviceGroups as $serviceName => $items)

                                            @if(!empty($serviceName) && strtolower($serviceName) !== 'no service')
                                                <tr class="table-light fw-bold">
                                                    <td colspan="4" class="ps-5">Service: {{ $serviceName }}</td>
                                                </tr>
                                            @endif

                                            @foreach($items as $item)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $item->banner_heading }}</td>
                                                    <td>
                                                        @if($item->section_image)
                                                            <img src="{{ asset('uploads/service-details/'.$item->section_image) }}"
                                                                width="180px;"
                                                                class="img-thumbnail">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.manage-service-details.edit', $item->id) }}"
                                                        class="btn btn-sm btn-primary">Edit</a>

                                                        <form action="{{ route('admin.manage-service-details.destroy', $item->id) }}"
                                                            method="POST"
                                                            class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-sm btn-danger"
                                                                    onclick="return confirm('Delete this record?')">
                                                                Delete
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
            <!-- footer start-->
             @include('components.backend.footer')
      </div>
    </div>

        @include('components.backend.main-js')

</body>

</html>