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



                    <form action="{{ route('admin.testimonial-details.update', $record->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                    <!-- ================== BASIC DETAILS ================== -->
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-white">
                            <strong>Testimonial Details</strong>
                        </div>

                        <div class="card-body row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Heading *</label>
                                <input type="text" name="heading"
                                    value="{{ $record->heading }}"
                                    class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Title *</label>
                                <input type="text" name="title"
                                    value="{{ $record->title }}"
                                    class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <!-- ================== VIDEO SECTION ================== -->
                    <div class="card mb-3">

                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                            <strong>Videos & Profile Images</strong>
                            <button type="button" id="addVideoRow" class="btn btn-success">+ Add</button>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered" id="videosTable">
                                <thead>
                                    <tr>
                                        <th>Video</th>
                                        <th>Title</th>
                                        <th>Profile Image</th>
                                        <th>Preview</th>
                                        <th width="80">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @php $i = 0; @endphp
                                @foreach(is_array($record->items) ? $record->items : [] as $item)
                                <tr class="video-row">

                                    <td>
                                        <input type="file" name="items[{{ $i }}][video]"
                                            class="form-control video-input" accept="video/*">
                                        <input type="hidden"
                                            name="items[{{ $i }}][old_video]"
                                            value="{{ $item['video'] ?? '' }}">
                                    </td>

                                    <td>
                                        <input type="text" name="items[{{ $i }}][title]"
                                            value="{{ $item['title'] ?? '' }}"
                                            class="form-control" required>
                                    </td>

                                    <td>
                                        <input type="file" name="items[{{ $i }}][image]"
                                            class="form-control image-input" accept="image/*">
                                        <input type="hidden"
                                            name="items[{{ $i }}][old_image]"
                                            value="{{ $item['image'] ?? '' }}">
                                    </td>

                                    <td>
                                        @if(!empty($item['video']))
                                            <video src="{{ asset('home/testimonials/'.$item['video']) }}"
                                                class="preview-video" width="120" height="80" controls></video>
                                        @else
                                            <video class="preview-video" width="120" height="80"
                                                style="display:none;" controls></video>
                                        @endif

                                        @if(!empty($item['image']))
                                            <img src="{{ asset('home/testimonials/'.$item['image']) }}"
                                                class="preview-img mt-2"
                                                width="70" height="70"
                                                style="object-fit:cover;border-radius:6px;">
                                        @else
                                            <img class="preview-img mt-2"
                                                width="70" height="70"
                                                style="display:none;object-fit:cover;border-radius:6px;">
                                        @endif
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm remove-row">−</button>
                                    </td>

                                </tr>
                                @php $i++; @endphp
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- ================== ACTION BUTTONS ================== -->
                    <div class="text-end">
                        <a href="{{ route('admin.testimonial-details.index') }}"
                        class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                    </form>








        </div>
    </div>

    @include('components.backend.footer')
    @include('components.backend.main-js')

<!-- ================== JS ================== -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    const addBtn = document.getElementById('addVideoRow');
    const tbody  = document.querySelector('#videosTable tbody');

    addBtn.addEventListener('click', function () {

        const index = tbody.querySelectorAll('.video-row').length;

        const row = `
        <tr class="video-row">
            <td>
                <input type="file" name="items[${index}][video]"
                       class="form-control video-input" accept="video/*">
            </td>

            <td>
                <input type="text" name="items[${index}][title]"
                       class="form-control" required>
            </td>

            <td>
                <input type="file" name="items[${index}][image]"
                       class="form-control image-input" accept="image/*">
            </td>

            <td>
                <video class="preview-video" width="120" height="80"
                       style="display:none;" controls></video>
                <img class="preview-img mt-2" width="70" height="70"
                     style="display:none;object-fit:cover;border-radius:6px;">
            </td>

            <td>
                <button type="button" class="btn btn-danger btn-sm remove-row">−</button>
            </td>
        </tr>`;

        tbody.insertAdjacentHTML('beforeend', row);
    });

    tbody.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-row')) {
            if (tbody.querySelectorAll('.video-row').length > 1) {
                e.target.closest('tr').remove();
            }
        }
    });

    tbody.addEventListener('change', function (e) {
        const row = e.target.closest('tr');

        if (e.target.classList.contains('video-input')) {
            const video = row.querySelector('.preview-video');
            video.src = URL.createObjectURL(e.target.files[0]);
            video.style.display = 'block';
        }

        if (e.target.classList.contains('image-input')) {
            const img = row.querySelector('.preview-img');
            img.src = URL.createObjectURL(e.target.files[0]);
            img.style.display = 'block';
        }
    });

});
</script>

</body>
</html>
