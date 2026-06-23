<!DOCTYPE html>
<html lang="en">
    <head>
        @include('components.frontend.head')
    </head>
    <body>

        <!-- header start -->
        <div class="full_header" id="header-sticky">
            @include('components.frontend.header')
        </div>
        <!-- header end -->



        <section class="breadcrumb_section">
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb custom-breadcrumb">
                        <li><a href="{{ route('frontend.index') }}"><span class="glyphicon glyphicon-home"></span></a></li>
                        <li class="active">Find A Doctor</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>


        <section class="section-wrap find_doctor_wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        
                        
                        <!--mobile filter-->
                        <div class="filter_fixed">
                         <button class="btn btn-primary filter_btn_phone visible-xs visible-sm" id="openFilter">
                        <i class="fa fa-filter"></i>
                        </button>
                        </div>
                        <div class="mobile-filter" id="mobileFilter">
                          <div class="filter-header">
                            <span>Filter</span>
                            <button id="closeFilter">&times;</button>
                          </div>
                          <div class="filter-body">
                            <div class="speciality_list">
                                @foreach($subcategories as $subcat)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" data-category="{{ $subcat->id }}">
                                            {{ $subcat->subcategory_name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                          </div>
                        </div>
                        <!--end mobile filter-->
                        
                        
                        
                        <div class="sidebar_filter sidebar-sticky">
                            <div class="filter-title">Filter</div>
                                <div class="form-group">
                                    <label class="sidebar_filter_label">Speciality</label>
                                    <div class="speciality_list">
                                        @foreach($subcategories as $subcat)
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" data-category="{{ $subcat->id }}">
                                                    {{ $subcat->subcategory_name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            
                            </div>
                        
                        </div>

                
                    <div class="col-md-9" id="content">
                        <div class="row">
                            <div id="content">
                                @foreach($doctors as $doctor)
                                    <div class="doctor-card"  data-category="{{ $doctor->subcategory_id }}" data-gender="{{ $doctor->gender }}">
                                    <div class="row">
                                        <div class="col-sm-3 text-center">
                                            <div class="doctor-img">
                                               <img src="{{ asset('uploads/doctors/' . ($doctor->doctor_image ?: 'default-doctor.png')) }}"
                                                 alt="{{ $doctor->doctor_name }}"
                                                 class="img-responsive">
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="doctor_thumb_details">
                                                <h3 class="doctor-name">
                                                    <a href="{{ route('frontend.doctor_details', ['doctoreslug' => $doctor->slug]) }}">
                                                        {{ $doctor->doctor_name }}
                                                    </a>
                                                </h3>
                                                <p class="speciality"><strong>Speciality:</strong> 
                                                     {{ $doctor->subcategory ? $doctor->subcategory->subcategory_name : 'N/A' }}
                                                </p>
                                                <p class="experience"><strong>Designation:</strong> 
                                                    {{ $doctor->designation }}
                                                </p>
                                                <p class="degree"><strong>Qualification:</strong> 
                                                    {{ $doctor->qualification }}
                                                </p>
                                                <p class="degree"><strong>OPD Timing:</strong><br>
                                                    @php
                                                        $slots = is_array($doctor->doctor_time_slot)
                                                            ? $doctor->doctor_time_slot
                                                            : json_decode($doctor->doctor_time_slot, true);
                                                
                                                        if (!empty($slots)) {
                                                            foreach ($slots as $slot) {
                                                                $days = !empty($slot['days']) ? implode(', ', $slot['days']) . ': ' : '';
                                                                echo $days . ($slot['from'] ?? '') . ' - ' . ($slot['to'] ?? '') . '<br>';
                                                            }
                                                        } else {
                                                            echo 'On Appointment';
                                                        }
                                                    @endphp
                                                </p>
                                                <div class="button-box">
                                                    <a class="twenty" href="{{ route('frontend.doctor_details', ['doctoreslug' => $doctor->slug]) }}">
                                                        <span>View Profile</span>
                                                    </a>
                                                    <!--<a class="twenty" type="button" data-toggle="modal" data-target="#bookappointment-services">-->
                                                    <!--    <span>Book Appointment</span>-->
                                                    <!--</a>-->
                                                    
                                                    <a class="twenty book-btn" 
                                                       type="button" 
                                                       data-toggle="modal" 
                                                       data-target="#bookappointment-services"
                                                       data-doctor-id="{{ $doctor->id }}"
                                                       data-doctor-name="{{ $doctor->doctor_name }}"
                                                       data-speciality-id="{{ $doctor->subcategory_id }}">
                                                        <span>Book Appointment</span>
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                <p id="no-doctor" style="display:none; text-align:center">No doctor available</p>

                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>


        @include('components.frontend.footer')
        
        @include('components.frontend.main-js')
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!---  Filter functioanlity --->
        <script>
            $(document).ready(function() {

                function filterDoctors() {
                    let selectedSpecialities = [];

                    // Get selected specialities
                    $('.speciality_list input[type="checkbox"]:checked').each(function(){
                        selectedSpecialities.push($(this).data('category').toString());
                    });

                    console.log('Selected Specialities:', selectedSpecialities);

                    let anyVisible = false;

                    $('.doctor-card').each(function(){
                        let doctorCategory = $(this).data('category').toString();
                        console.log('Checking doctor:', $(this).find('.doctor-name').text(), 'Category:', doctorCategory);

                        // Show if no filter selected OR doctor matches selected subcategory
                        if(selectedSpecialities.length === 0 || selectedSpecialities.includes(doctorCategory)) {
                            $(this).show();
                            anyVisible = true;
                            console.log('Showing doctor:', $(this).find('.doctor-name').text());
                        } else {
                            $(this).hide();
                            console.log('Hiding doctor:', $(this).find('.doctor-name').text());
                        }
                    });

                    // Show "No doctor available" if nothing visible
                    if(!anyVisible){
                        $('#no-doctor').show();
                        console.log('No doctor available');
                    } else {
                        $('#no-doctor').hide();
                    }
                }

                // Trigger filtering when any checkbox changes
                $('.speciality_list input[type="checkbox"]').change(filterDoctors);

                // Run filter on page load in case any checkbox is pre-checked
                filterDoctors();
            });
        </script>
        
        <!--- Mobile Filter--->
        
        <script>
            document.getElementById("openFilter").onclick = function () {
                document.getElementById("mobileFilter").classList.add("active");
            };
            
            document.getElementById("closeFilter").onclick = function () {
                document.getElementById("mobileFilter").classList.remove("active");
            };
            
            // Close mobile filter when any checkbox is selected
            document.querySelectorAll("#mobileFilter input[type='checkbox']").forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        document.getElementById("mobileFilter").classList.remove("active");
                    }
                });
            });
        </script>
            
  </body>
</html>
