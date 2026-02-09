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
                                <a href="{{ route('admin.manage-associations.index') }}">
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
                                        <li class="breadcrumb-item"><a href="{{ route('admin.manage-associations.index') }}">Home</a></li>
                                        <li class="breadcrumb-item active">Association</li>
                                    </ol>
                                </nav>
                                <a href="{{ route('admin.manage-associations.create') }}" class="btn btn-primary px-5 radius-30">
                                    + Add Association
                                </a>
                            </div>

                            <div class="table-responsive custom-scrollbar">
                                <table class="display" id="basic-1">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Name</th>
                                            <th>URL</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($associations as $key => $association)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>

                                            <td>{{ $association->asso_name }}</td>
                                            <td>{{ $association->assoc_url }}</td>

                                            <td>
                                                <a href="{{ route('admin.manage-associations.edit', $association->id) }}" class="btn btn-sm btn-primary">
                                                    Edit
                                                </a>

                                                <form action="{{ route('admin.manage-associations.destroy', $association->id) }}"
                                                    method="POST" style="display:inline-block">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this record?')">
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

    @include('components.backend.footer')
    @include('components.backend.main-js')

</body>
</html>