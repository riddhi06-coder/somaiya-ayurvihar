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
                        <h4>Add Awards Details</h4>
                    </div>
                    <div class="col-6 text-end">
                        <ol class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="{{ route('admin.awards-details.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Add Awards Details</li>
                        </ol>
                    </div>
                </div>
            </div>

        <form action="{{ route('admin.awards-details.update', $record->id) }}"
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- SECTION 1: ACCREDITATIONS -->
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <strong>Section 1: Accreditations</strong>
                        </div>

                        <div class="card-body row g-4">
                            <div class="col-md-6">
                                <label class="form-label">Heading <span class="txt-danger">*</span></label>
                                <input type="text"
                                    name="accreditation_heading"
                                    class="form-control"
                                    value="{{ $record->accreditation_heading }}"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Add Images</label>
                                <input type="file"
                                    name="accreditation_images[]"
                                    class="form-control image-input"
                                    multiple accept="image/*">
                                <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                <br>
                                <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>

                                <!-- EXISTING IMAGES -->
                                <div class="mt-2 d-flex gap-2 flex-wrap">
                                    @foreach($record->accreditation_images ?? [] as $img)
                                        <div style="position:relative">
                                            <img src="{{ asset('home/awards/'.$img) }}"
                                                width="150" height="150"
                                                style="object-fit:cover;border-radius:6px;">
                                            <input type="hidden"
                                                name="old_accreditation_images[]"
                                                value="{{ $img }}">
                                            <span class="remove-old"
                                                style="position:absolute;top:-6px;right:-6px;
                                                        background:red;color:#fff;
                                                        border-radius:50%;
                                                        width:20px;height:20px;
                                                        text-align:center;cursor:pointer;">×</span>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <div class="preview-box mt-2 d-flex gap-2 flex-wrap"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- SECTION 2: AWARDS -->
                                <div class="card mb-4">
                                    <div class="card-header bg-primary text-white">
                                        <strong>Section 2: Awards & Accolades</strong>
                                    </div>

                                    <div class="card-body row g-4">
                                        <div class="col-md-6">
                                            <label class="form-label">Heading <span class="txt-danger">*</span></label>
                                            <input type="text"
                                                name="award_heading"
                                                class="form-control"
                                                value="{{ $record->award_heading }}"
                                                required>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Add Images</label>
                                            <input type="file"
                                                name="award_images[]"
                                                class="form-control image-input"
                                                multiple accept="image/*">
                                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                            <br>
                                            <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b></small>

                                            <!-- EXISTING IMAGES -->
                                            <div class="mt-2 d-flex gap-2 flex-wrap">
                                                @foreach($record->award_images ?? [] as $img)
                                                    <div style="position:relative">
                                                        <img src="{{ asset('home/awards/'.$img) }}"
                                                            width="120" height="120"
                                                            style="object-fit:cover;border-radius:6px;">
                                                        <input type="hidden"
                                                            name="old_award_images[]"
                                                            value="{{ $img }}">
                                                        <span class="remove-old"
                                                            style="position:absolute;top:-6px;right:-6px;
                                                                    background:red;color:#fff;
                                                                    border-radius:50%;
                                                                    width:20px;height:20px;
                                                                    text-align:center;cursor:pointer;">×</span>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <div class="preview-box mt-2 d-flex gap-2 flex-wrap"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- SUBMIT -->
                                <div class="text-end">
                                    <a href="{{ route('admin.awards-details.index') }}" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>


                        </div>
                    </div>

    @include('components.backend.footer')
    @include('components.backend.main-js')
<script>
document.addEventListener('click', function (e) {
    if (e.target.classList.contains('remove-old')) {
        e.target.parentElement.remove();
    }
});

document.addEventListener('change', function (e) {
    if (e.target.classList.contains('image-input')) {

        const previewBox = e.target.parentElement.querySelector('.preview-box');
        previewBox.innerHTML = '';

        Array.from(e.target.files).forEach(file => {
            if (!file.type.startsWith('image/')) return;

            const reader = new FileReader();
            reader.onload = ev => {
                previewBox.innerHTML += `
                    <img src="${ev.target.result}"
                         style="width:80px;height:80px;
                                object-fit:cover;border-radius:6px;">
                `;
            };
            reader.readAsDataURL(file);
        });
    }
});
</script>

    
</body>
</html>
