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
                        <h4>Add Testimonial Details</h4>
                    </div>
                    <div class="col-6 text-end">
                        <ol class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="{{ route('admin.testimonial-details.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Add Testimonial Details</li>
                        </ol>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.testimonial-details.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Heading + Title -->
                <div class="card mb-3">
                    <div class="card-header bg-primary text-white">
                        <strong>Testimonial Details</strong>
                    </div>
                    <div class="card-body row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Heading <span class="txt-danger">*</span></label>
                            <input type="text" name="heading" class="form-control" placeholder="Enter Heading" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Title <span class="txt-danger">*</span></label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Title" required>
                        </div>
                    </div>
                </div>

                <!-- Videos & Profile Images -->
                <div class="card mb-3">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <strong>Videos & Profile Images</strong>
                        <button type="button" id="showVideosTable" class="btn btn-success">
                            + Add
                        </button>
                    </div>

                    <!-- DEFAULT VISIBLE -->
                    <div class="card-body" id="videosSection">
                        <table class="table table-bordered" id="videosTable">
                            <thead>
                                <tr>
                                    <th>Video</th>
                                    <th>Profile Image</th>
                                    <th>Title</th>
                                    <th>Preview</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr class="video-row">
                                    <td>
                                        <input type="file" name="items[0][video]"
                                            class="form-control video-input" placeholder="Enter Video" accept="video/*">
                                            <small class="text-secondary"><b>Note: The file size should be less than 4MB.</b></small>
                                            <br>
                                            <small class="text-secondary"><b>Note: Only files in .mp4 format can be uploaded.</b></small>
                                            
                                    </td>

                                    <td>
                                        <input type="file" name="items[0][image]"
                                            class="form-control image-input" placeholder="Enter Profile Image" accept="image/*">
                                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                            <br>
                                            <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                            
                                    </td>

                                    <td>
                                        <input type="text" name="items[0][title]"
                                            class="form-control" placeholder="Enter Title">
                                    </td>

                                    <td>
                                        <video class="video-preview" width="120" height="80"
                                            style="display:none;" controls></video>
                                        <img class="image-preview mt-2" width="50" height="50"
                                            style="display:none;object-fit:cover;">
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-danger remove-row">-</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="text-end">
                    <a href="{{ route('admin.testimonial-details.index') }}" class="btn btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>




        </div>
    </div>

    @include('components.backend.footer')
    @include('components.backend.main-js')
  

<script>
document.addEventListener('DOMContentLoaded', function () {

    const addBtn = document.getElementById('showVideosTable');
    const tableBody = document.querySelector('#videosTable tbody');

    let index = 1;

    // ADD ROW (ONLY FROM HEADER BUTTON)
    addBtn.addEventListener('click', function () {
        const row = `
        <tr class="video-row">
            <td>
                <input type="file" name="items[${index}][video]"
                       class="form-control video-input" accept="video/*">
                       <small class="text-secondary"><b>Note: The file size should be less than 4MB.</b></small>
                        <br>
                        <small class="text-secondary"><b>Note: Only files in .mp4 format can be uploaded.</b></small>
                                            
            </td>

            <td>
                <input type="file" name="items[${index}][image]"
                       class="form-control image-input" accept="image/*">
                       <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                        <br>
                        <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>
                                            
            </td>

            <td>
                <input type="text" name="items[${index}][title]"
                       placeholder="Enter Title" class="form-control">
            </td>

            <td>
                <video class="video-preview" width="120" height="80"
                       style="display:none;" controls></video>
                <img class="image-preview mt-2" width="50" height="50"
                     style="display:none;object-fit:cover;">
            </td>

            <td>
                <button type="button" class="btn btn-danger remove-row">-</button>
            </td>
        </tr>`;
        tableBody.insertAdjacentHTML('beforeend', row);
        index++;
    });

    // REMOVE ROW (KEEP AT LEAST ONE)
    tableBody.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-row')) {
            if (tableBody.querySelectorAll('.video-row').length > 1) {
                e.target.closest('tr').remove();
            }
        }
    });

    // PREVIEW
    tableBody.addEventListener('change', function (e) {
        const row = e.target.closest('tr');

        if (e.target.classList.contains('video-input')) {
            const video = row.querySelector('.video-preview');
            const file = e.target.files[0];
            if (file) {
                video.src = URL.createObjectURL(file);
                video.style.display = 'block';
            }
        }

        if (e.target.classList.contains('image-input')) {
            const img = row.querySelector('.image-preview');
            const file = e.target.files[0];
            if (file) {
                img.src = URL.createObjectURL(file);
                img.style.display = 'block';
            }
        }
    });
});
</script>

</body>
</html>
