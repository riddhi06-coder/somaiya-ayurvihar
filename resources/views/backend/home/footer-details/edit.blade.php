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
                        <h4>Add Footer Details</h4>
                    </div>
                    <div class="col-6 text-end">
                        <ol class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="{{ route('admin.footer-details.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Add Footer Details</li>
                        </ol>
                    </div>
                </div>
            </div>

              <form action="{{ route('admin.footer-details.update', $footer->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- General Info -->
    <div class="card mb-3">
        <div class="card-header bg-primary text-white"><strong>Footer Details</strong></div>
        <div class="card-body row g-3">

            <div class="col-md-6">
                <label class="form-label">Footer Logo</label>
                <input type="file" name="logo" class="form-control" accept="image/*">
                @if($footer->logo)
                    <img src="{{ asset('home/footer/' . $footer->logo) }}" alt="Logo" style="height:50px; margin-top:5px;">
                @endif

            </div>

            <div class="col-md-6">
                <label class="form-label">Address</label>
                <textarea name="address" class="form-control" rows="3">{{ old('address', $footer->address) }}</textarea>
            </div>

            <div class="col-md-12">
                <label class="form-label">Google Map Iframe</label>
                <textarea name="map_iframe" class="form-control" rows="3">{{ old('map_iframe', $footer->map_iframe) }}</textarea>
            </div>

            <div class="col-md-6">
                <label class="form-label">24x7 Enquiry Number</label>
                <input type="text" name="enquiry_number" class="form-control" value="{{ old('enquiry_number', $footer->enquiry_number) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label">Emergency Contact</label>
                <input type="text" name="emergency_contact" class="form-control" value="{{ old('emergency_contact', $footer->emergency_contact) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label">Book OPD Appointment</label>
                <input type="text" name="opd_appointment" class="form-control" value="{{ old('opd_appointment', $footer->opd_appointment) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label">Wellness Appointment</label>
                <input type="text" name="wellness_appointment" class="form-control" value="{{ old('wellness_appointment', $footer->wellness_appointment) }}">
            </div>

        </div>
    </div>

    <!-- Social Icons Dynamic Table -->
    <div class="card mb-3">
        <div class="card-header bg-primary text-white"><strong>Social Icons</strong></div>
        <div class="card-body">
            <table class="table table-bordered" id="socialTable">
                <thead>
                    <tr>
                        <th>Icon Class</th>
                        <th>URL</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $socialIndex = 0; @endphp
                    @foreach($footer->social_links ?? [] as $social)
                        <tr class="social-row">
                            <td>
                                <input type="text" name="social_icon[{{ $socialIndex }}][icon]" class="form-control" value="{{ $social['icon'] }}">
                            </td>
                            <td>
                                <input type="url" name="social_icon[{{ $socialIndex }}][url]" class="form-control" value="{{ $social['url'] }}">
                            </td>
                            <td>
                                @if($socialIndex == 0)
                                    <button type="button" class="btn btn-success add-row">+</button>
                                @else
                                    <button type="button" class="btn btn-danger remove-row">-</button>
                                @endif
                            </td>
                        </tr>
                        @php $socialIndex++; @endphp
                    @endforeach

                    @if(empty($footer->social_links))
                        <tr class="social-row">
                            <td><input type="text" name="social_icon[0][icon]" class="form-control" placeholder="fa-facebook"></td>
                            <td><input type="url" name="social_icon[0][url]" class="form-control" placeholder="https://facebook.com"></td>
                            <td><button type="button" class="btn btn-success add-row">+</button></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Submit -->
    <div class="text-end">
        <a href="{{ route('admin.footer-details.index') }}" class="btn btn-danger me-2">Cancel</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>

<!-- JS for dynamic social rows -->
<script>
    let socialIndex = {{ $socialIndex ?? 1 }};

    document.addEventListener('click', function(e) {
        if(e.target.classList.contains('add-row')){
            let row = `
                <tr class="social-row">
                    <td><input type="text" name="social_icon[${socialIndex}][icon]" class="form-control" placeholder="fa-facebook"></td>
                    <td><input type="url" name="social_icon[${socialIndex}][url]" class="form-control" placeholder="https://facebook.com"></td>
                    <td><button type="button" class="btn btn-danger remove-row">-</button></td>
                </tr>`;
            document.querySelector('#socialTable tbody').insertAdjacentHTML('beforeend', row);
            socialIndex++;
        }

        if(e.target.classList.contains('remove-row')){
            e.target.closest('tr').remove();
        }
    });
</script>



        </div>
    </div>

    @include('components.backend.footer')
    @include('components.backend.main-js')

  
</body>
</html>
