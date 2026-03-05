<!doctype html>
<html lang="en">
<head>
    @include('components.backend.head')
</head>
<body>
    @include('components.backend.header')
    @include('components.backend.sidebar')

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.manage-disclaimer.index') }}">
                                    <svg class="stroke-icon">
                                        <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                                    </svg>
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.manage-disclaimer.index') }}">Home</a></li>
                                        <li class="breadcrumb-item active">Disclaimer</li>
                                    </ol>
                                </nav>
                                <a href="{{ route('admin.manage-disclaimer.create') }}" class="btn btn-primary px-5 radius-30">
                                    + Add Disclaimer
                                </a>
                            </div>


                            <div class="table-responsive custom-scrollbar">
                                <table class="display table table-bordered" id="basic-1">
                                    <thead>
                  
                                        <tr>
                                            <th>#</th>
                                            <th>Disclaimer</th>
                                            <th>Action</th>
                                        </tr>
                    
                                    </thead>
                                    <tbody>
                                        @forelse($disclaimers as $key => $disclaimer)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>

                                                <td>
                                                    {!! Str::limit(strip_tags($disclaimer->disclaimer),100) !!}
                                                </td>

                                                <td>
                                                    <a href="{{ route('admin.manage-disclaimer.edit',$disclaimer->id) }}" 
                                                    class="btn btn-primary btn-sm">Edit</a>

                                                    <form action="{{ route('admin.manage-disclaimer.destroy',$disclaimer->id) }}" 
                                                        method="POST" 
                                                        style="display:inline-block;"
                                                        onsubmit="return confirm('Are you sure you want to delete this disclaimer?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center">No Disclaimer Found</td>
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

    @include('components.backend.footer')
    @include('components.backend.main-js')


</body>
</html>