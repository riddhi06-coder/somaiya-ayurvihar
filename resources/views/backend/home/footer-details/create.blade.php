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

                    <form action="{{ route('admin.footer-details.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- General Info -->
                        <div class="card mb-3">
                            <div class="card-header bg-primary text-white">
                                <strong>Footer Details</strong>
                            </div>

                            <div class="card-body row g-3">

                                <div class="col-md-6">
                                    <label class="form-label">Footer Logo</label>
                                    <input type="file"
                                        name="logo"
                                        class="form-control"
                                        accept="image/*">

                                    <small class="text-secondary d-block">
                                        <b>Note: The file size should be less than 2MB.</b>
                                    </small>
                                    <small class="text-secondary d-block">
                                        <b>Note: Only files in .jpg, .jpeg, .png, .webp, .svg format can be uploaded.</b>
                                    </small>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Address</label>
                                    <textarea name="address"
                                            class="form-control"
                                            rows="3"
                                            placeholder="Enter Address">{{ old('address') }}</textarea>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Google Map Iframe</label>
                                    <textarea name="map_iframe"
                                            class="form-control"
                                            rows="3"
                                            placeholder="<iframe ...></iframe>">{{ old('map_iframe') }}</textarea>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">24x7 Enquiry Number</label>
                                    <input type="text"
                                        name="enquiry_number"
                                        class="form-control"
                                        value="{{ old('enquiry_number') }}"
                                        placeholder="Enter 24x7 Enquiry Number">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Emergency Contact</label>
                                    <input type="text"
                                        name="emergency_contact"
                                        class="form-control"
                                        value="{{ old('emergency_contact') }}"
                                        placeholder="Enter Emergency Contact">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Book OPD Appointment</label>
                                    <input type="text"
                                        name="opd_appointment"
                                        class="form-control"
                                        value="{{ old('opd_appointment') }}"
                                        placeholder="Enter Book OPD Appointment">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Wellness Appointment</label>
                                    <input type="text"
                                        name="wellness_appointment"
                                        class="form-control"
                                        value="{{ old('wellness_appointment') }}"
                                        placeholder="Enter Wellness Appointment">
                                </div>

                            </div>
                        </div>

                        <!-- Social Media Links -->
                        <div class="card mb-3 mt-3">
                            <div class="card-header bg-primary text-white">
                                <strong>Social Media Details</strong>
                            </div>

                            <div class="card-body">

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <label class="form-label mb-0">
                                        <strong>Social Media Links</strong>
                                    </label>
                                    <button type="button"
                                            id="add-social-media-row"
                                            class="btn btn-success">
                                        Add Link
                                    </button>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered p-3"
                                        id="dynamicTable"
                                        style="border:2px solid #dee2e6;">
                                        <thead>
                                            <tr>
                                                <th>Social Media Platform <span class="txt-danger">*</span></th>
                                                <th>Link <span class="txt-danger">*</span></th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody id="social-media-table-body">
                                            <tr>
                                                <td>
                                                    <select name="social_media[0][platform]"
                                                            class="form-control"
                                                            required>
                                                        <option value="">Select Platform</option>
                                                        <option value="1">Facebook</option>
                                                        <option value="2">Twitter</option>
                                                        <option value="3">Instagram</option>
                                                        <option value="4">LinkedIn</option>
                                                        <option value="5">YouTube</option>
                                                        <option value="6">Pinterest</option>
                                                    </select>
                                                </td>

                                                <td>
                                                    <input type="url"
                                                        name="social_media[0][link]"
                                                        class="form-control"
                                                        placeholder="Enter Social Media URL"
                                                        required>
                                                </td>

                                                <td>
                                                    <button type="button"
                                                            class="btn btn-danger remove-social-media-row">
                                                        Remove
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="text-end">
                            <a href="{{ route('admin.footer-details.index') }}"
                            class="btn btn-danger me-2">
                                Cancel
                            </a>
                            <button type="submit"
                                    class="btn btn-primary">
                                Submit
                            </button>
                        </div>

                    </form>

        </div>
    </div>

    @include('components.backend.footer')
    @include('components.backend.main-js')


    <!-- JavaScript to dynamically add/remove rows -->
    <script>
        document.getElementById('add-social-media-row').addEventListener('click', function () {
            var tableBody = document.getElementById('social-media-table-body');
            var rowCount = tableBody.rows.length;
            var row = tableBody.insertRow();

            // Platform Dropdown
            var cell1 = row.insertCell(0);
            var platformSelect = document.createElement('select');
            platformSelect.name = `social_media[${rowCount}][platform]`;
            platformSelect.classList.add('form-control');
            platformSelect.required = true;

            // Add options to the dropdown with numerical values
            var platforms = [
                { id: 1, name: 'Facebook' },
                { id: 2, name: 'Twitter' },
                { id: 3, name: 'Instagram' },
                { id: 4, name: 'Linkedin' },
                { id: 5, name: 'Youtube' },
                { id: 6, name: 'Pintrest' }
            ];
            platformSelect.innerHTML = '<option value="">Select Platform</option>';
            platforms.forEach(function (platform) {
                var option = document.createElement('option');
                option.value = platform.id; // Numerical value
                option.textContent = platform.name.charAt(0).toUpperCase() + platform.name.slice(1); // Capitalized name
                platformSelect.appendChild(option);
            });

            cell1.appendChild(platformSelect);

            // URL Input
            var cell2 = row.insertCell(1);
            var urlInput = document.createElement('input');
            urlInput.type = 'url';
            urlInput.name = `social_media[${rowCount}][link]`;
            urlInput.classList.add('form-control');
            urlInput.placeholder = 'Enter Social Media URL';
            urlInput.required = true;
            cell2.appendChild(urlInput);

            // Remove Button
            var cell3 = row.insertCell(2);
            var removeBtn = document.createElement('button');
            removeBtn.type = 'button';
            removeBtn.classList.add('btn', 'btn-danger', 'remove-social-media-row');
            removeBtn.textContent = 'Remove';
            removeBtn.addEventListener('click', function () {
                tableBody.deleteRow(row.rowIndex);
            });
            cell3.appendChild(removeBtn);
        });


        // Event delegation to remove rows
        document.getElementById('social-media-table-body').addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('remove-social-media-row')) {
                var row = e.target.closest('tr');
                row.remove();
            }
        });
    </script>

</body>
</html>
