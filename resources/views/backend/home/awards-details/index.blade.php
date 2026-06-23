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
											<a href="{{ route('admin.awards-details.index') }}">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Awards Details</li>
									</ol>
								</nav>

								<a href="{{ route('admin.awards-details.create') }}" class="btn btn-primary px-5 radius-30">+ Add Awards Details</a>
							</div>


                    <div class="table-responsive custom-scrollbar">
                  <table class="display" id="basic-1">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Accreditation Heading</th>
                              <!--<th>Accreditation Images</th>-->
                              <th>Award Heading</th>
                              <!-- <th>Award Images</th> -->
                              <th>Action</th>
                          </tr>
                      </thead>

                  <tbody>
                      @forelse ($records as $index => $record)
                          <tr>
                              <td>{{ $index + 1 }}</td>

                              <td>{{ $record->accreditation_heading ?? '—' }}</td>

                       

                              <td>{{ $record->award_heading ?? '—' }}</td>

                              {{-- Award Images --}}
                              <!-- <td>
                                  @php
                                      $awardImages = is_array($record->award_images)
                                          ? $record->award_images
                                          : json_decode($record->award_images, true);
                                  @endphp

                                  @if(!empty($awardImages))
                                      @foreach($awardImages as $img)
                                          <img src="{{ asset('home/awards/'.$img) }}"
                                              width="50" height="50"
                                              style="object-fit:cover;border-radius:4px;margin-right:4px;">
                                      @endforeach
                                  @else
                                      —
                                  @endif
                              </td> -->

                              {{-- Actions --}}
                              <td>
                                  <a href="{{ route('admin.awards-details.edit', $record->id) }}"
                                    class="btn btn-sm btn-primary">
                                      Edit
                                  </a>

                                  <form action="{{ route('admin.awards-details.destroy', $record->id) }}"
                                        method="POST"
                                        style="display:inline-block"
                                        onsubmit="return confirm('Are you sure?')">
                                      @csrf
                                      @method('DELETE')
                                      <button class="btn btn-sm btn-danger">
                                          Delete
                                      </button>
                                  </form>
                              </td>
                          </tr>
                      @empty
                          <tr>
                              <td colspan="6" class="text-center">No records found</td>
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
<script>
    $(document).ready(function () {
        $('#basic-1').DataTable();
    });
</script>


</body>

</html>