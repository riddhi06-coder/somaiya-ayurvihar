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
                        <h4>Edit Strengths</h4>
                    </div>
                    <div class="col-6 text-end">
                        <ol class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="{{ route('admin.strengths-details.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Edit Strengths</li>
                        </ol>
                    </div>
                </div>
            </div>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.strengths-details.update', $record->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Heading + Image -->
                        <div class="card mb-3">
                            <div class="card-header bg-primary text-white"><strong>Strengths Section</strong></div>
                            <div class="card-body row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Heading <span class="txt-danger">*</span></label>
                                    <input type="text" name="heading" class="form-control" placeholder="Enter Heading" value="{{ $record->heading }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Section Image</label>
                                    <input type="file" name="image" class="form-control" id="sectionImage" accept=".jpg,.jpeg,.png,.webp,.svg">
                                    <small class="text-secondary"><b>Note: The file size should be less than 2MB. Leave empty to keep the current image.</b></small>
                                    <br>
                                    <div class="mt-2">
                                        <span class="text-secondary d-block mb-1"><small>Current image preview:</small></span>
                                        <img id="sectionPreview"
                                            src="{{ $record->image ? asset('home/strengths/'.$record->image) : asset('frontend/assets/img/kj-somaiya-strength.webp') }}"
                                            style="width:160px;height:110px;object-fit:cover;margin-top:4px;border:1px solid #e5e5e5;border-radius:4px;">
                                        @unless($record->image)
                                            <span class="text-secondary d-block mt-1"><small>(Default image — no custom image uploaded yet)</small></span>
                                        @endunless
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Dynamic Features -->
                        <div class="card mb-3">
                            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                <strong>Strength Points</strong>
                                <button type="button" id="addRowBtn" class="btn btn-light btn-sm">+ Add More</button>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="itemsTable">
                                    <thead>
                                        <tr>
                                            <th style="width:40px;">#</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th style="width:90px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $counter = 0; @endphp
                                        @foreach($record->items ?? [] as $item)
                                            <tr class="item-row">
                                                <td><span class="row-number"></span></td>
                                                <td><input type="text" name="items[{{ $counter }}][title]" class="form-control" placeholder="Enter Title" value="{{ $item['title'] ?? '' }}" required></td>
                                                <td><textarea name="items[{{ $counter }}][description]" class="form-control" rows="2" placeholder="Enter Description">{{ $item['description'] ?? '' }}</textarea></td>
                                                <td><button type="button" class="btn btn-danger remove-row">-</button></td>
                                            </tr>
                                            @php $counter++; @endphp
                                        @endforeach

                                        @if($counter === 0)
                                            <tr class="item-row">
                                                <td><span class="row-number"></span></td>
                                                <td><input type="text" name="items[0][title]" class="form-control" placeholder="Enter Title" required></td>
                                                <td><textarea name="items[0][description]" class="form-control" rows="2" placeholder="Enter Description"></textarea></td>
                                                <td><button type="button" class="btn btn-danger remove-row">-</button></td>
                                            </tr>
                                            @php $counter = 1; @endphp
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="text-end">
                            <a href="{{ route('admin.strengths-details.index') }}" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
            </form>

        </div>
    </div>

    @include('components.backend.footer')
    @include('components.backend.main-js')

<script>
document.addEventListener('DOMContentLoaded', function() {
    let counter = {{ $counter ?? 0 }};

    function renumber() {
        document.querySelectorAll('#itemsTable tbody .item-row').forEach(function(row, idx) {
            const n = String(idx + 1).padStart(2, '0');
            const span = row.querySelector('.row-number');
            if (span) span.textContent = n;
        });
    }

    // Add row (single button at top)
    document.getElementById('addRowBtn').addEventListener('click', function() {
        let html = `
        <tr class="item-row">
            <td><span class="row-number"></span></td>
            <td><input type="text" name="items[${counter}][title]" class="form-control" placeholder="Enter Title" required></td>
            <td><textarea name="items[${counter}][description]" class="form-control" rows="2" placeholder="Enter Description"></textarea></td>
            <td><button type="button" class="btn btn-danger remove-row">-</button></td>
        </tr>`;
        document.querySelector('#itemsTable tbody').insertAdjacentHTML('beforeend', html);
        counter++;
        renumber();
    });

    // Remove row (keep at least one)
    document.querySelector('#itemsTable').addEventListener('click', function(e) {
        if(e.target.classList.contains('remove-row')) {
            if (document.querySelectorAll('#itemsTable tbody .item-row').length > 1) {
                e.target.closest('tr').remove();
                renumber();
            }
        }
    });

    // Section image preview
    const imgInput = document.getElementById('sectionImage');
    if (imgInput) {
        imgInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            const img = document.getElementById('sectionPreview');
            if(file) {
                const reader = new FileReader();
                reader.onload = function(ev) {
                    img.src = ev.target.result;
                    img.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });
    }

    renumber();
});
</script>

</body>
</html>
