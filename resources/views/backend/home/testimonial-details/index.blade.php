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
                            <a href="{{ route('admin.testimonial-details.index') }}">Home</a>
                          </li>
                          <li class="breadcrumb-item active" aria-current="page">Testimonial Details</li>
                        </ol>
                      </nav>

                      <a href="{{ route('admin.testimonial-details.create') }}" class="btn btn-primary px-5 radius-30">+ Add Testimonial Details</a>
                    </div>


                    <div class="table-responsive custom-scrollbar">
                      <table class="table table-bordered" id="basic-1">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Heading</th>
                                  <!-- <th>Title</th> -->
                                  <th>Items</th>
                                  <th>Action</th>
                              </tr>
                          </thead>

                          <tbody>
                              @foreach($records as $key => $record)
                                  <tr>
                                      <td>{{ $key + 1 }}</td>
                                      <td>{{ $record->heading }}</td>
                                      <!-- <td>{{ $record->title }}</td> -->

                                      <!-- ITEMS -->
                                      <td>
                                          @if(is_array($record->items) && count($record->items))
                                              @foreach($record->items as $item)
                                                  <div class="mb-2 p-2 border rounded">

                                                      <strong>{{ $item['title'] ?? '-' }}</strong><br>

                                                      @if(!empty($item['video']))
                                                          <video
                                                              src="{{ asset('home/testimonials/'.$item['video']) }}"
                                                              width="180"
                                                              height="100"
                                                              autoplay
                                                              controls
                                                              
                                                              class="mt-1 d-block">
                                                          </video>
                                                      @endif

                                                      @if(!empty($item['profile_image']))
                                                          <img
                                                              src="{{ asset('home/testimonials/'.$item['profile_image']) }}"
                                                              width="60"
                                                              height="60"
                                                              class="mt-1 rounded"
                                                              style="object-fit:cover;">
                                                      @endif

                                                  </div>
                                              @endforeach
                                          @else
                                              <span class="text-muted">No items</span>
                                          @endif
                                      </td>

                                      <!-- ACTION -->
                                      <td>
                                          <a href="{{ route('admin.testimonial-details.edit', $record->id) }}"
                                            class="btn btn-sm btn-primary mb-1">
                                              Edit
                                          </a>

                                          <form action="{{ route('admin.testimonial-details.destroy', $record->id) }}"
                                                method="POST"
                                                style="display:inline-block;"
                                                onsubmit="return confirm('Are you sure?')">
                                              @csrf
                                              @method('DELETE')
                                              <button class="btn btn-sm btn-danger">
                                                  Delete
                                              </button>
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