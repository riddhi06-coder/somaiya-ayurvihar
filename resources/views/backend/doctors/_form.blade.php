{{-- resources/views/backend/doctors/_form.blade.php --}}
<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT') @method('PUT') @endif

    <div class="row g-4">

        <!-- ROW 1: SALUTATION + FIRST NAME + MIDDLE NAME + LAST NAME -->
        <div class="col-md-3 mb-3">
            <label class="form-label">Salutation <span class="text-danger">*</span></label>
            <select name="salutation" class="form-control @error('salutation') is-invalid @enderror" required>
                @foreach(['Dr.', 'Mr.', 'Mrs.', 'Ms.', 'Prof.'] as $sal)
                    <option value="{{ $sal }}" {{ old('salutation', $doctor?->salutation) == $sal ? 'selected' : '' }}>{{ $sal }}</option>
                @endforeach
            </select>
            @error('salutation') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-3 mb-3">
            <label class="form-label">First Name <span class="text-danger">*</span></label>
            <input name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                   value="{{ old('first_name', $doctor?->first_name) }}" required>
            @error('first_name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-3 mb-3">
            <label class="form-label">Middle Name</label>
            <input name="middle_name" class="form-control"
                   value="{{ old('middle_name', $doctor?->middle_name) }}">
        </div>

        <div class="col-md-3 mb-3">
            <label class="form-label">Last Name <span class="text-danger">*</span></label>
            <input name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                   value="{{ old('last_name', $doctor?->last_name) }}" required>
            @error('last_name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>


        <!-- ROW 2: GENDER + REG NO + COUNCIL -->
        <div class="col-md-4 mb-3">
            <label class="form-label">Gender <span class="text-danger">*</span></label>
            <select name="gender" class="form-control @error('gender') is-invalid @enderror" required>
                <option value="">Select</option>
                @foreach(['Male','Female','Other'] as $g)
                    <option value="{{ $g }}" {{ old('gender', $doctor?->gender) == $g ? 'selected' : '' }}>{{ $g }}</option>
                @endforeach
            </select>
            @error('gender') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Registration Number <span class="text-danger">*</span></label>
            <input name="registration_number" class="form-control @error('registration_number') is-invalid @enderror"
                   value="{{ old('registration_number', $doctor?->registration_number) }}" required>
            @error('registration_number') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Registration Council <span class="text-danger">*</span></label>
            <input name="registration_council" class="form-control @error('registration_council') is-invalid @enderror"
                   value="{{ old('registration_council', $doctor?->registration_council) }}" required>
            @error('registration_council') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>


        <!-- ROW 3: DEGREES (Full Width) -->
        <div class="col-12 mt-3">
            <label class="form-label">Select Degrees <span class="text-danger">*</span></label>

            @php
                $selectedDegrees = old('degree_id', json_decode($doctor?->degrees ?? '[]', true) ?? []);
                $selectedCount = is_array($selectedDegrees) ? count($selectedDegrees) : 0;
            @endphp

            <div class="dropdown w-100" data-bs-auto-close="outside">
                <button class="btn btn-outline-secondary dropdown-toggle w-100 text-start" type="button" id="degreeDropdown" data-bs-toggle="dropdown">
                    <span id="degreeDropdownLabel">
                        {{ $selectedCount > 0 ? $selectedCount . ' degree(s) selected' : 'Choose Degrees' }}
                    </span>
                </button>
                <div class="dropdown-menu p-3 w-100" style="max-height:350px;overflow-y:auto;">
                    <div class="mb-2">
                        <input type="text" id="degreeSearch" class="form-control form-control-sm" placeholder="Search degree...">
                    </div>
                    <div id="degreeList">
                        @foreach($degrees as $degree)
                            @php $checked = in_array($degree->id, $selectedDegrees); @endphp
                            <label class="d-block py-2 px-3 hover-bg-light border-bottom">
                                <input type="checkbox" name="degree_id[]" value="{{ $degree->id }}"
                                       class="me-2 degree-checkbox" {{ $checked ? 'checked' : '' }}>
                                {{ $degree->degree_name }}
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
            @error('degree_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>


        <!-- ROW 4: LANGUAGES + SPECIALITY (Side by Side) -->
        <div class="col-md-6 mb-3">
            <label class="form-label">Languages Spoken <span class="text-danger">*</span></label>
            <input name="languages" class="form-control @error('languages') is-invalid @enderror"
                   value="{{ old('languages', $doctor?->languages) }}" placeholder="English, Hindi, Tamil" required>
            @error('languages') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Speciality <span class="text-danger">*</span></label>
            <select name="medical_service_sub_category_id" class="form-control @error('medical_service_sub_category_id') is-invalid @enderror" required>
                <option value="">Select Speciality</option>
                @foreach($subcategories as $id => $name)
                    <option value="{{ $id }}" {{ old('medical_service_sub_category_id', $doctor?->medical_service_sub_category_id) == $id ? 'selected' : '' }}>
                        {{ $name }}
                    </option>
                @endforeach
            </select>
            @error('medical_service_sub_category_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>


        <!-- ROW 5: EXPERIENCE + FEE (Side by Side) -->
        <div class="col-md-6 mb-3">
            <label class="form-label">Experience (Years) <span class="text-danger">*</span></label>
            <input name="experience_years" type="number" class="form-control @error('experience_years') is-invalid @enderror"
                   value="{{ old('experience_years', $doctor?->experience_years) }}" required>
            @error('experience_years') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Consultation Fee (₹) <span class="text-danger">*</span></label>
            <input name="consultation_fee" type="number" class="form-control @error('consultation_fee') is-invalid @enderror"
                   value="{{ old('consultation_fee', $doctor?->consultation_fee) }}" required>
            @error('consultation_fee') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>


        <!-- ROW 6: AVAILABLE DAYS (Full Width) -->
        <div class="col-12 mb-4">
            <label class="form-label">Available Days <span class="text-danger">*</span></label>
            <div class="d-flex flex-wrap gap-3">
                @foreach(['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'] as $day)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input"
                               name="available_days[]" value="{{ $day }}"
                               {{ in_array($day, old('available_days', $doctor?->available_days ?? [])) ? 'checked' : '' }}
                               id="day_{{ $loop->index }}">
                        <label class="form-check-label" for="day_{{ $loop->index }}">{{ $day }}</label>
                    </div>
                @endforeach
            </div>
            @error('available_days') <div class="text-danger small mt-2">{{ $message }}</div> @enderror
        </div>


        <!-- ROW 7: TIME SLOTS (Full Width – Dynamic) -->
        <div class="col-12 mb-4">
            <label class="form-label">Consultation Time Slots <span class="text-danger">*</span></label>

            @php
                $rawSlots = old('slots', $doctor?->consultation_timings ?? []);
                $slots = !empty($rawSlots) ? (is_array($rawSlots) ? $rawSlots : []) : [['start' => '', 'end' => '']];
            @endphp

            <div id="timeSlotsContainer" class="border rounded p-3 bg-light">
                @foreach($slots as $index => $slot)
                    <div class="row g-3 align-items-center mb-3 time-slot">
                        <div class="col-md-5">
                            <label class="small text-muted">Start Time</label>
                            <input type="time" name="slots[{{ $index }}][start]" 
                                   class="form-control @error("slots.$index.start") is-invalid @enderror"
                                   value="{{ $slot['start'] ?? '' }}" required>
                            @error("slots.$index.start") <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-5">
                            <label class="small text-muted">End Time</label>
                            <input type="time" name="slots[{{ $index }}][end]" 
                                   class="form-control @error("slots.$index.end") is-invalid @enderror"
                                   value="{{ $slot['end'] ?? '' }}" required>
                            @error("slots.$index.end") <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-2 text-end">
                            @if($loop->first)
                                <button type="button" class="btn btn-success btn-sm" id="addSlotBtn">+</button>
                            @else
                                <button type="button" class="btn btn-danger btn-sm removeSlot">×</button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            @error('slots') <div class="text-danger small mt-2">{{ $message }}</div> @enderror
        </div>


        <!-- ROW 8: PHONE + EMAIL -->
        <div class="col-md-6 mb-3">
            <label class="form-label">Phone <span class="text-danger">*</span></label>
            <input name="phone" class="form-control @error('phone') is-invalid @enderror"
                   value="{{ old('phone', $doctor?->phone) }}" required>
            @error('phone') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Email <span class="text-danger">*</span></label>
            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email', $doctor?->email) }}" required>
            @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>


        <!-- ROW 9: ADDRESS + CITY + PINCODE -->
        <div class="col-12 mb-3">
            <label class="form-label">Address Line 1 <span class="text-danger">*</span></label>
            <input name="address_line_1" class="form-control @error('address_line_1') is-invalid @enderror"
                   value="{{ old('address_line_1', $doctor?->address_line_1) }}" required>
            @error('address_line_1') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">City <span class="text-danger">*</span></label>
            <input name="city" class="form-control @error('city') is-invalid @enderror"
                   value="{{ old('city', $doctor?->city) }}" required>
            @error('city') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Pincode <span class="text-danger">*</span></label>
            <input name="pincode" class="form-control @error('pincode') is-invalid @enderror"
                   value="{{ old('pincode', $doctor?->pincode) }}" required>
            @error('pincode') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>


        <!-- ROW 10: PROFILE IMAGE + VIDEO (Side by Side) -->
        <div class="col-md-6 mb-4">
            <label class="form-label">Profile Image @if(!$doctor) <span class="text-danger">*</span> @endif</label>
            <input type="file" name="profile_image" class="form-control" accept="image/*" {{ !$doctor ? 'required' : '' }}>
            @error('profile_image') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            @if($doctor?->profile_image)
                <img src="{{ $doctor->profile_image_url }}" class="img-thumbnail mt-3 d-block" width="120" alt="Profile">
            @endif
        </div>

        <div class="col-md-6 mb-4">
            <label class="form-label">Short Introduction Video (Optional)</label>
            <input type="file" name="short_video" class="form-control" accept="video/*">
            @if($doctor?->short_video)
                <video width="100%" class="mt-3 rounded shadow-sm" controls>
                    <source src="{{ $doctor->short_video_url }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @endif
        </div>


        <!-- SUBMIT BUTTONS -->
        <div class="col-12 text-end">
            <a href="{{ route('admin.doctors.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
            <button type="submit" class="btn btn-primary px-5 ms-3">{{ $buttonText }}</button>
        </div>

    </div>
</form>

<!-- SAME JAVASCRIPT AS BEFORE (No Change Needed) -->
<script>
    // ... (keep your existing JS for degrees search + time slots) ...
    let slotIndex = {{ count($slots) }};

    document.getElementById('addSlotBtn')?.addEventListener('click', function () {
        const html = `
            <div class="row g-3 align-items-center mb-3 time-slot">
                <div class="col-md-5">
                    <label class="small text-muted">Start Time</label>
                    <input type="time" name="slots[${slotIndex}][start]" class="form-control" required>
                </div>
                <div class="col-md-5">
                    <label class="small text-muted">End Time</label>
                    <input type="time" name="slots[${slotIndex}][end]" class="form-control" required>
                </div>
                <div class="col-md-2 text-end">
                    <button type="button" class="btn btn-danger btn-sm removeSlot">×</button>
                </div>
            </div>`;
        document.getElementById('timeSlotsContainer').insertAdjacentHTML('beforeend', html);
        slotIndex++;
    });

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('removeSlot') || e.target.closest('.removeSlot')) {
            e.target.closest('.time-slot').remove();
        }
    });
</script>