@php
    $footer = \App\Models\FooterDetail::wherenull('deleted_by')->first();
    $contact = \App\Models\Contact::wherenull('deleted_by')->first();
    $social_links = $footer && $footer->social_links ? json_decode($footer->social_links, true) : [];

    $healthpkg = \App\Models\ManageHealthPackages::wherenull('deleted_by')->get();
    $subcategory = \App\Models\MedicalServiceSubCategory::wherenull('deleted_by')->get();
    $doctor = \App\Models\Doctor::wherenull('deleted_by')->get();
@endphp

<style>
.error-msg {
    color: red;
    font-size: 12px;
    margin-top: 5px;
}
</style>

    <footer>
      <div class="container">
        <div class="row main-footer" id="exclude">
          <div class="col-md-6">
            <div class="footer-about">

                {{-- Logo --}}
                @if(!empty($footer?->logo))
                    <img src="{{ asset('home/footer/' . $footer->logo) }}" width="250" height="46" class="img-responsive" alt="Somaiya Footer Logo">
                @endif

                <hr>

                {{-- Contact Details --}}
                <div class="footer-contact">
                  <ul>

                      {{-- Address --}}
                        @if(!empty($footer?->address))
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <a href="{{ $contact->location_url }}" target="_blank">
                                    {{ $footer->address }}
                                </a>
                            </li>
                        @endif


                        @if(!empty($footer?->map_iframe))
                            <li>
                                {!! $footer->map_iframe !!}
                            </li>
                        @endif


                        <li class="footer_call">
                          <i class="fa fa-phone"></i>

                            @if(!empty($footer?->enquiry_number))
                              <b>24x7 Enquiry:</b>
                              <a href="tel:{{ $footer->enquiry_number }}">{{ $footer->enquiry_number }}</a><br>
                            @endif

                            @if(!empty($footer?->emergency_contact))
                              <b>Emergency Contact:</b>
                              <a href="tel:{{ $footer->emergency_contact }}">{{ $footer->emergency_contact }}</a><br>
                            @endif

                            @if(!empty($footer?->opd_appointment))
                                <b>Book OPD Appointment:</b>

                                @php
                                    $numbers = explode('/', $footer->opd_appointment);
                                @endphp

                                @foreach($numbers as $index => $num)
                                    <a href="tel:{{ trim($num) }}">{{ trim($num) }}</a>
                                    @if(!$loop->last) / @endif
                                @endforeach
                                <br>
                            @endif

                            @if(!empty($footer?->wellness_appointment))
                              <b>Wellness Appointment:</b>
                              <a href="tel:{{ $footer->wellness_appointment }}">{{ $footer->wellness_appointment }}</a>
                            @endif
                      </li>

                        {{-- Phone / Contact HTML --}}
                        @if(!empty($footer?->contact_html))
                            <li class="footer_call">
                                {!! $footer->contact_html !!}
                            </li>
                        @endif

                  </ul>
                </div>

                @if(!empty($social_links))
                    <ul class="footer-social-links">
                        @foreach($social_links as $link)
                            @php
                                $icon = '';
                                $ariaLabel = '';

                                switch ((int)$link['platform']) {
                                    case 1:
                                        $icon = 'fa-facebook';
                                        $ariaLabel = 'Facebook';
                                        break;
                                    case 2:
                                        $icon = 'fa-twitter';
                                        $ariaLabel = 'Twitter';
                                        break;
                                    case 3:
                                        $icon = 'fa-instagram';
                                        $ariaLabel = 'Instagram';
                                        break;
                                    case 4:
                                        $icon = 'fa-linkedin';
                                        $ariaLabel = 'LinkedIn';
                                        break;
                                    case 5:
                                        $icon = 'fa-youtube';
                                        $ariaLabel = 'YouTube';
                                        break;
                                    case 6:
                                        $icon = 'fa-pinterest';
                                        $ariaLabel = 'Pinterest';
                                        break;
                                }
                            @endphp

                            @if($icon && !empty($link['link']))
                                <li>
                                    <a href="{{ $link['link'] }}"
                                       target="_blank"
                                       rel="noopener"
                                       aria-label="{{ $ariaLabel }}">
                                        <i class="fa {{ $icon }}"></i>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                @endif

            </div>

              </div>
                <div class="col-md-4">
                  <div class="footer-links">
                    <h2>Quick Links</h2>
                    <ul>
                      <li><a href="{{ route('frontend.specialties') }}">Specialties</a></li>
                      <li><a href="{{ route('frontend.billing_process') }}">Billing Process</a></li>
                      <li><a href="{{ route('frontend.insurance_and_tpa') }}">Insurance & TPA</a></li>
                      <li><a href="{{ route('frontend.biomedical_waste') }}">Biomedical Waste</a></li>

                      <li><a href="{{ route('frontend.management_team') }}">Management Team</a></li>
                      <li><a href="{{ route('frontend.accreditations') }}">Accreditations</a></li>
                      <li><a href="{{ route('frontend.awards_accolades') }}">Awards &amp; Accolades</a></li>
                      <li><a href="{{ route('frontend.contact_us') }}">Contact Us</a></li>
                      <li><a href="{{ route('frontend.blogs') }}">Blogs</a></li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="footer-links">
                    <h2>Wellness Centre</h2>
                    <ul>
                      <li><a href="{{ route('frontend.health_packages') }}">Health Packages</a></li>
                      <li><a href="{{ route('frontend.ayurveda') }}">Ayurveda</a></li>
                      <li>
                        <a href="{{ route('frontend.alternative_therapies') }}">
                          Alternative Therapies
                        </a>
                      </li>
                    </ul>
                    <h2>News &amp; Events</h2>
                    <ul>
                      <li><a href="{{ route('frontend.announcements') }}">Announcements</a></li>
                      <li><a href="{{ route('frontend.gallery_listing') }}">Gallery</a></li>
                      <li><a href="{{ route('frontend.media_coverage') }}">Media Coverage</a></li>
                      <li><a href="{{ route('frontend.careers') }}">Careers</a></li>
                    </ul>
                  </div>
                </div>

              </div>

              <hr>

              <div class="row">
                <div class="col-md-6">
                  <div class="copyright-text">
                    <p>Copyright © {{ date('Y') }} K J Somaiya Hospital. All Rights Reserved. | Crafted by <a href="https://www.matrixbricks.com/" target="_blank">Matrix Bricks</a></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <ul class="privacy_links">
                    <li><a href="{{ route('frontend.privacy') }}">Privacy</a></li>
                    <li><a href="{{ route('frontend.disclaimer') }}">Disclaimers</a></li>
                    <li><a href="{{ route('frontend.terms_conditions') }}">Terms and Conditions</a></li>
                  </ul>
                </div>
              </div>

              <div id="videoModal" class="modal video-testi-modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <!-- <h4 class="modal-title">Full Image</h4> -->
          </div>
                    <div class="modal-body">
                      <iframe src="" allowfullscreen></iframe>
                    </div>
                  </div>
                </div>
              </div>

              <a href="{{ route('frontend.search') }}" class="menu_contact_icon float float-search" aria-label="Search"><i class="fa fa-search"></i></a>

              <input type="checkbox" id="menuToggle" class="menu-toggle">

              <label for="menuToggle" class="open-menu-btn float"><i class="fa fa-phone"></i></label>
              <div class="side-menu">
                <label for="menuToggle" class="closebtn">&times;</label>
                <ul class="sidemenu_numbers">
                  <li>24x7 Enquiry: <br><a href="tel:02261124800">022-6112 4800</a></li>
                  <li>Emergency Contact: <br><a href="tel:02250954723">022-50954723</a></li>
                  <li>Book OPD Appointment: <br><a href="tel:02250954700">022-50954700</a> / <a href="tel:9324960673">9324960673</a></li>
                  <li>Wellness Appointment: <br><a href="tel:918090155888">+91-8090155888</a></li>
                  <li>Book An Ambulance: <br><a href="tel:7506655888">+91-7506655888</a></li>
                </ul>
              </div>

              <a id="button"></a>

              <!-- Image Modal -->
              <div id="imageModal" class="modal fade">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body text-center">
                      <img id="fullImage">
                    </div>
                  </div>
                </div>
              </div>

            <!-- Health Checkup Modal -->
            <div id="health-checkup" class="modal fade" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Book Health Check</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <h6 class="form-title">please fill out all required fields meaning</h6>

                            <form class="book-appoint-form" method="POST" action="{{ route('health.checkup.submit') }}">
                                @csrf
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Name*" >
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <select class="form-control" name="pkg_name">
                                        <option value="">-- Select Package * --</option>
                                        @foreach($healthpkg as $pkg)
                                            <option value="{{ $pkg->package_name }}">{{ $pkg->package_name }}</option>
                                        @endforeach
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Date of Birth: *</label>
                                    <input type="date" class="form-control" name="birth" placeholder="" >
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Date of Appointment * :</label>
                                    <input type="date" class="form-control" name="appint_date" min="{{ date('Y-m-d') }}" placeholder="" >
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email ID*" >
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <input type="text" class="form-control" name="mobile_no" placeholder="Mobile Number*" >
                                  </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="button-box" style="display:flex; justify-content:center;">
                                        <button type="submit" class="twenty"><span>Submit</span></button>
                                    </div>
                                </div>
                            </form>

                      </div>
                    </div>
                  </div>
                </div>
            </div>

            <!-- Book Appointment Modal -->
            <div id="bookappointment-services" class="modal fade" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Book Appointment</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <h6 class="form-title">please fill out all required fields meaning</h6>

                            <form class="book-appoint-form1" method="POST" action="{{ route('doctor.appointment.submit') }}">
                                @csrf
                                <div class="col-md-8">
                                  <div class="form-group">
                                    <input type="text" class="form-control" name="patient_name" placeholder="Enter Patient Name*" >
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <select class="form-control" name="gender">
                                      <option>--Select Gender*--</option>
                                      <option>Male</option>
                                      <option>Female</option>
                                      <option>Other</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <input type="text" class="form-control" name="mobile" placeholder="Mobile Number*" >
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <input type="text" class="form-control" name="email" placeholder="Email Address*" >
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pincode*" >
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <select class="form-control" name="country" id="country">
                                      <option>--Select Country*--</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <select class="form-control" name="state" id="state">
                                      <option>--Select State*--</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <select class="form-control" name="city" id="city">
                                      <option>--Select City*--</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                    <select class="form-control" name="speciality" id="speciality">
                                        <option value="">--Select Speciality*--</option>
                                        @foreach($subcategory as $sub)
                                            <option value="{{ $sub->id }}">{{ $sub->subcategory_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4" style="margin-top:20px;">
                                    <div class="form-group">
                                        <label>Doctor</label>
                                        <select class="form-control" name="doctor_name" id="doctor" disabled>
                                            <option value="">--Select Doctor*--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4" style="margin-top:20px;">
                                  <div class="form-group">
                                    <label>Appointment Date: *</label>
                                    <input type="date" class="form-control" name="appointement_date" min="{{ date('Y-m-d') }}" placeholder="Appointment Date" >
                                  </div>
                                </div>
                                <div class="col-md-4" style="margin-top:20px;">
                                     <div class="form-group">
                                        <label>Available Slots*:</label>
                                        <select class="form-control" name="slot" id="slot" disabled>
                                            <option value="">--Select Slot*--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="button-box">
                                    <button type="submit" class="twenty"><span>Submit</span></button>
                                  </div>
                                </div>
                        </form>

                      </div>
                    </div>

                  </div>
                </div>
            </div>
            <!-- Modal -->

         </div>
    </footer>

    @include('components.backend.main-js')

    <!-- ============================================================
         ALL APPOINTMENT / SLOT LOGIC — single vanilla JS block,
         no jQuery dependency (fixes "$ is not defined")
    ============================================================ -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {

        /* -------- shared URLs -------- */
        const doctorUrl = "{{ route('get.doctors') }}";
        const slotUrl   = "{{ route('get.doctor.slots') }}";

        /* -------- element refs (may be null on pages without the modals) -------- */
        const pincodeEl   = document.getElementById('pincode');
        const specialityEl = document.getElementById('speciality');
        const doctorEl    = document.getElementById('doctor');
        const slotEl      = document.getElementById('slot');
        const dateEl      = document.querySelector('[name="appointement_date"]');

        /* ===========================================================
           1) Pincode -> Country / State / City auto-fill
        =========================================================== */
        if (pincodeEl) {
            pincodeEl.addEventListener('keyup', function () {
                let pincode = this.value;
                if (pincode.length === 6) {
                    fetch(`{{ route('get.location') }}?pincode=${pincode}`)
                        .then(r => r.json())
                        .then(data => {
                            if (data.status) {
                                document.getElementById('country').innerHTML = `<option value="${data.country}" selected>${data.country}</option>`;
                                document.getElementById('state').innerHTML   = `<option value="${data.state}" selected>${data.state}</option>`;
                                document.getElementById('city').innerHTML    = `<option value="${data.city}" selected>${data.city}</option>`;
                            } else {
                                alert('Pincode not found');
                            }
                        })
                        .catch(err => console.error('Pincode lookup failed:', err));
                }
            });
        }

        /* ===========================================================
           2) Slot loader  (needs BOTH doctor + date)
        =========================================================== */
        function loadDoctorSlots() {
            console.log('--- loadDoctorSlots called ---');
        
            // Check elements exist
            if (!slotEl)   { console.warn('slotEl (#slot) NOT found in DOM'); }
            if (!doctorEl) { console.warn('doctorEl (#doctor) NOT found in DOM'); }
            if (!dateEl)   { console.warn('dateEl ([name="appointement_date"]) NOT found in DOM'); }
            if (!slotEl || !doctorEl || !dateEl) {
                console.warn('Aborting: one or more elements missing.');
                return;
            }
        
            const doctorId = doctorEl.value;
            const date     = dateEl.value;
            console.log('doctorId =', JSON.stringify(doctorId), '| date =', JSON.stringify(date));
        
            slotEl.innerHTML = '<option value="">--Select Slot*--</option>';
            slotEl.disabled = true;
        
            if (!doctorId) {
                console.warn('No doctor selected yet — slots will load once a doctor is chosen.');
                return;
            }
            if (!date) {
                // auto-set today's date so slots can load right away
                const today = new Date().toISOString().split('T')[0];
                dateEl.value = today;
                console.log('No date chosen — defaulting to today:', today);
            }
            const finalDate = dateEl.value;
            
            const reqUrl = `${slotUrl}?doctor_id=${doctorId}&date=${finalDate}`;
            console.log('Both present. Fetching slots:', reqUrl);
        
            fetch(reqUrl)
                .then(res => {
                    console.log('HTTP status:', res.status);
                    if (!res.ok) {
                        console.error('Slot request failed with HTTP', res.status);
                        throw new Error('HTTP ' + res.status);
                    }
                    return res.json();
                })
                .then(data => {
                    console.log('Slots returned:', data, '| count:', Array.isArray(data) ? data.length : 'not an array');
                    if (Array.isArray(data) && data.length > 0) {
                        data.forEach(s => {
                            slotEl.innerHTML += `<option value="${s}">${s}</option>`;
                        });
                        slotEl.disabled = false;
                        console.log('Slot dropdown ENABLED with', data.length, 'options.');
                    } else {
                        slotEl.innerHTML = '<option value="">No slots available on this day</option>';
                        console.warn('Empty/zero slots — dropdown left disabled. Likely the chosen weekday is not in this doctor\'s doctor_time_slot.');
                    }
                })
                .catch(err => {
                    console.error('Slot fetch error:', err);
                    slotEl.innerHTML = '<option value="">Could not load slots</option>';
                });
        }

        // Make it reachable from the .book-btn handler below
        window.loadDoctorSlots = loadDoctorSlots;

        if (doctorEl) doctorEl.addEventListener('change', loadDoctorSlots);
        if (dateEl)   dateEl.addEventListener('change', loadDoctorSlots);

        /* ===========================================================
           3) Speciality -> Doctor list
        =========================================================== */
        if (specialityEl) {
            specialityEl.addEventListener('change', function () {
                const specialityId = this.value;

                doctorEl.innerHTML = '<option value="">--Select Doctor--</option>';
                doctorEl.disabled = true;

                // reset slots whenever speciality changes
                if (slotEl) {
                    slotEl.innerHTML = '<option value="">--Select Slot*--</option>';
                    slotEl.disabled = true;
                }

                if (specialityId) {
                    fetch(`${doctorUrl}?speciality_id=${specialityId}`)
                        .then(res => res.json())
                        .then(data => {
                            if (data.length > 0) {
                                data.forEach(doc => {
                                    doctorEl.innerHTML += `<option value="${doc.id}">${doc.doctor_name}</option>`;
                                });
                                doctorEl.disabled = false;
                            } else {
                                doctorEl.innerHTML = '<option value="">No doctors found</option>';
                            }
                        })
                        .catch(err => console.error('Doctor fetch error:', err));
                }
            });
        }

        /* ===========================================================
           4) Health Checkup form validation (.book-appoint-form)
        =========================================================== */
        const healthForm = document.querySelector('.book-appoint-form');
        if (healthForm) {
            healthForm.addEventListener('submit', function (e) {
                e.preventDefault();
                let isValid = true;
                this.querySelectorAll('.error-msg').forEach(el => el.remove());

                function showError(input, message) {
                    let err = document.createElement('div');
                    err.className = 'error-msg';
                    err.innerText = message;
                    input.parentNode.appendChild(err);
                    isValid = false;
                }

                const form = this;
                const submitBtn = form.querySelector('button[type="submit"]');
                const name   = form.querySelector('[name="name"]');
                const pkg    = form.querySelector('[name="pkg_name"]');
                const birth  = form.querySelector('[name="birth"]');
                const appDate = form.querySelector('[name="appint_date"]');
                const email  = form.querySelector('[name="email"]');
                const mobile = form.querySelector('[name="mobile_no"]');
                const today  = new Date().toISOString().split('T')[0];

                if (name.value.trim() === '') showError(name, 'Name is required');
                else if (!/^[A-Za-z\s]+$/.test(name.value)) showError(name, 'Only letters allowed');

                if (pkg.value === '') showError(pkg, 'Please select a package');

                if (birth.value === '') showError(birth, 'Date of birth is required');
                else if (birth.value > today) showError(birth, 'Date of birth cannot be in the future');

                if (appDate.value === '') showError(appDate, 'Appointment date is required');
                else if (appDate.value < today) showError(appDate, 'Date cannot be in the past');

                if (email.value.trim() === '') showError(email, 'Email is required');
                else if (!/^\S+@\S+\.\S+$/.test(email.value)) showError(email, 'Enter valid email');

                if (mobile.value.trim() === '') showError(mobile, 'Mobile number is required');
                else if (!/^\d{10,12}$/.test(mobile.value)) showError(mobile, 'Enter valid 10-12 digit number');

                if (isValid) {
                    submitBtn.disabled = true;
                    submitBtn.innerText = 'Submitting...';
                    form.submit();
                }
            });
        }

        /* ===========================================================
           5) Book Appointment form validation (.book-appoint-form1)
        =========================================================== */
        const apptForm = document.querySelector('.book-appoint-form1');
        if (apptForm) {
            apptForm.addEventListener('submit', function (e) {
                e.preventDefault();
                const form = this;
                const submitBtn = form.querySelector('button[type="submit"]');
                let isValid = true;
                form.querySelectorAll('.error-msg').forEach(el => el.remove());

                function showError(input, message) {
                    let err = document.createElement('div');
                    err.className = 'error-msg';
                    err.innerText = message;
                    input.parentNode.appendChild(err);
                    isValid = false;
                }

                const patient = form.querySelector('[name="patient_name"]');
                const gender  = form.querySelector('[name="gender"]');
                const mobile  = form.querySelector('[name="mobile"]');
                const email   = form.querySelector('[name="email"]');
                const pincode = form.querySelector('[name="pincode"]');
                const country = form.querySelector('[name="country"]');
                const state   = form.querySelector('[name="state"]');
                const city    = form.querySelector('[name="city"]');
                const speciality = form.querySelector('[name="speciality"]');
                const doctor  = form.querySelector('[name="doctor_name"]');
                const appDate = form.querySelector('[name="appointement_date"]');
                const slot    = form.querySelector('[name="slot"]');
                const today   = new Date().toISOString().split('T')[0];

                if (!patient.value.trim()) showError(patient, 'Patient name is required');
                if (!gender.value || gender.value.includes('--Select')) showError(gender, 'Please select gender');

                if (!mobile.value.trim()) showError(mobile, 'Mobile number is required');
                else if (!/^\d{10,12}$/.test(mobile.value.trim())) showError(mobile, 'Enter valid 10-12 digit number');

                if (!email.value.trim()) showError(email, 'Email is required');
                else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim())) showError(email, 'Enter valid email');

                if (!pincode.value.trim()) showError(pincode, 'Pincode is required');
                else if (!/^\d{6}$/.test(pincode.value.trim())) showError(pincode, 'Enter valid 6-digit pincode');

                if (!country.value || country.value.includes('Select')) showError(country, 'Please select country');
                if (!state.value || state.value.includes('Select')) showError(state, 'Please select state');
                if (!city.value || city.value.includes('Select')) showError(city, 'Please select city');
                if (!speciality.value) showError(speciality, 'Please select speciality');
                if (!doctor.value) showError(doctor, 'Please select doctor');
                if (!slot.value) showError(slot, 'Please select a time slot');

                if (!appDate.value) showError(appDate, 'Appointment date is required');
                else if (appDate.value < today) showError(appDate, 'Date cannot be in the past');

                if (isValid) {
                    submitBtn.disabled = true;
                    submitBtn.innerText = 'Submitting...';
                    form.submit();
                }
            });
        }

        /* ===========================================================
           6) Health checkup: auto-fill package on modal open
              (vanilla replacement for the old jQuery $().on('show.bs.modal'))
        =========================================================== */
        document.querySelectorAll('[data-target="#health-checkup"], [data-bs-target="#health-checkup"]').forEach(function (trigger) {
            trigger.addEventListener('click', function () {
                const packageName = this.getAttribute('data-package');
                const select = document.querySelector('#health-checkup [name="pkg_name"]');
                if (select) select.value = packageName || '';
            });
        });

        /* ===========================================================
           7) Doctor "Book" buttons: preselect speciality + doctor,
              then load that doctor's slots (if a date is already set)
        =========================================================== */
        document.querySelectorAll('.book-btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
                const doctorId    = this.getAttribute('data-doctor-id');
                const specialityId = this.getAttribute('data-speciality-id');

                if (!doctorEl) return;

                doctorEl.innerHTML = '<option value="">--Select Doctor--</option>';
                doctorEl.disabled = true;

                if (specialityId) {
                    if (specialityEl) specialityEl.value = specialityId;

                    fetch(`${doctorUrl}?speciality_id=${specialityId}`)
                        .then(res => res.json())
                        .then(data => {
                            data.forEach(doc => {
                                const selected = (doc.id == doctorId) ? 'selected' : '';
                                doctorEl.innerHTML += `<option value="${doc.id}" ${selected}>${doc.doctor_name}</option>`;
                            });
                            doctorEl.disabled = false;
                            // load slots for the preselected doctor (only fires if date already chosen)
                            loadDoctorSlots();
                        })
                        .catch(err => console.error('Doctor preselect fetch error:', err));
                }
            });
        });

        /* ===========================================================
           8) Reset modal on close  (vanilla; clears doctor AND slots)
        =========================================================== */
        const apptModal = document.getElementById('bookappointment-services');
        if (apptModal) {
            apptModal.addEventListener('hidden.bs.modal', function () {
                if (specialityEl) specialityEl.value = '';
                if (doctorEl) {
                    doctorEl.innerHTML = '<option value="">--Select Doctor--</option>';
                    doctorEl.disabled = true;
                }
                if (slotEl) {
                    slotEl.innerHTML = '<option value="">--Select Slot*--</option>';
                    slotEl.disabled = true;
                }
            });
        }

    });
    </script>