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

            <!-- Page Header -->
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h4>Add Compassion Details</h4>
                    </div>
                    <div class="col-6 text-end">
                        <ol class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="{{ route('admin.compassion-details.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Add Compassion Details</li>
                        </ol>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.compassion-details.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Heading + Description -->
                        <div class="card mb-3">
                            <div class="card-header bg-primary text-white"><strong>Compassion Details</strong></div>
                            <div class="card-body row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Heading *</label>
                                    <input type="text" name="heading" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Description</label>
                                    <input type="text" name="description" class="form-control">
                                </div>
                            </div>
                        </div>

                        <!-- Dynamic Table/Grid -->
                        <div class="card mb-3">
                            <div class="card-header bg-primary text-white"><strong>Items</strong></div>
                            <div class="card-body">
                                <table class="table table-bordered" id="itemsTable">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Value</th>
                                            <th>Icon/Image</th>
                                            <th>Preview</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="item-row">
                                            <td><input type="text" name="items[0][title]" class="form-control" required></td>
                                            <td><input type="text" name="items[0][value]" class="form-control" required></td>
                                            <td>
                                                <input type="file" name="items[0][icon]" class="form-control icon-input" accept=".jpg,.jpeg,.png,.svg">
                                            </td>
                                            <td><img class="preview" style="width:50px;height:50px;object-fit:cover;display:none;"></td>
                                            <td><button type="button" class="btn btn-success add-row">+</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="text-end">
                            <a href="{{ route('admin.compassion-details.index') }}" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
            </form>



        </div>
    </div>

    @include('components.backend.footer')
    @include('components.backend.main-js')
  
<!-- JS for dynamic rows & image preview -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    let counter = 1;

    // Add new row
    document.querySelector('#itemsTable').addEventListener('click', function(e) {
        if(e.target.classList.contains('add-row')) {
            let html = `
            <tr class="item-row">
                <td><input type="text" name="items[${counter}][title]" class="form-control" required></td>
                <td><input type="text" name="items[${counter}][value]" class="form-control" required></td>
                <td>
                    <input type="file" name="items[${counter}][icon]" class="form-control icon-input" accept=".jpg,.jpeg,.png,.svg">
                </td>
                <td><img class="preview" style="width:50px;height:50px;object-fit:cover;display:none;"></td>
                <td><button type="button" class="btn btn-danger remove-row">-</button></td>
            </tr>`;
            this.querySelector('tbody').insertAdjacentHTML('beforeend', html);
            counter++;
        }

        if(e.target.classList.contains('remove-row')) {
            e.target.closest('tr').remove();
        }
    });

    // Image preview
    document.querySelector('#itemsTable').addEventListener('change', function(e) {
        if(e.target.classList.contains('icon-input')) {
            let file = e.target.files[0];
            let img = e.target.closest('tr').querySelector('.preview');
            if(file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    img.src = e.target.result;
                    img.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                img.src = '';
                img.style.display = 'none';
            }
        }
    });
});
</script>
    
</body>
</html>
