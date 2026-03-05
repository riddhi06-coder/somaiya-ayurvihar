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
                                <a href="{{ route('admin.manage-contact-us.index') }}">
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
                                        <li class="breadcrumb-item"><a href="{{ route('admin.manage-contact-us.index') }}">Home</a></li>
                                        <li class="breadcrumb-item active">Contact Us</li>
                                    </ol>
                                </nav>
                                <a href="{{ route('admin.manage-contact-us.create') }}" class="btn btn-primary px-5 radius-30">
                                    + Add Contact Us
                                </a>
                            </div>


                            <div class="table-responsive custom-scrollbar">
                                <table class="display table table-bordered" id="basic-1">
                                    <thead>
                  
                                        <tr>
                                            <th>#</th>
                                            <th>Hospital Name</th>
                                            <th>Contact</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                    
                                    </thead>
                                    <tbody>
                                        @if($contacts->count() > 0)
                                            @foreach($contacts as $key => $contact)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $contact->hospital_name }}</td>
                                                    <td>{{ $contact->call_us }}</td>
                                                    <td>{{ $contact->email }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.manage-contact-us.edit',$contact->id) }}" class="btn btn-sm btn-primary">Edit</a><br><br>
                                                        <form action="{{ route('admin.manage-contact-us.destroy', $contact->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger"  onclick="return confirm('Are you sure you want to delete this contact?');">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5" class="text-center">No records found</td>
                                            </tr>
                                        @endif
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