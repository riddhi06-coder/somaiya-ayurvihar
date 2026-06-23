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
                                    <a href="{{ route('admin.manage-quality-awards.index') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Awards QUALITY Healthcare services</li>
                            </ol>
                        </nav>

                        <a href="{{ route('admin.manage-quality-awards.create') }}" class="btn btn-primary px-5 radius-30">+ Add Awards</a>
                    </div>


                    <div class="table-responsive custom-scrollbar">
                        <table class="display table table-bordered" id="basic-1">
                           <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Award Name</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($awards as $key => $award)
                            
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                            
                                        <td>
                                            {{ $award->certification_name }}
                                        </td>
                            
                                        <td>
                                            <img src="{{ asset('uploads/awards/'.$award->banner_image) }}"
                                                 alt="Award Image"
                                                 style="width: 80px; height: auto; border-radius: 5px;">
                                        </td>
                            
                                        <td>
                                            <a href="{{ route('admin.manage-quality-awards.edit', $award->id) }}"
                                               class="btn btn-sm btn-primary">
                                                Edit
                                            </a>
                            
                                            <form action="{{ route('admin.manage-quality-awards.destroy', $award->id) }}"
                                                  method="POST"
                                                  style="display:inline-block;"
                                                  onsubmit="return confirm('Are you sure you want to delete this?')">
                                            
                                                @csrf
                                                @method('DELETE')
                                            
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                            
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">
                                            No records found
                                        </td>
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