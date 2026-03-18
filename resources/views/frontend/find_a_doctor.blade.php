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
                        <div class="sidebar_filter sidebar-sticky">
                        <div class="filter-title">Filter</div>
                        <div class="form-group">
                            <label class="sidebar_filter_label">Speciality</label>
                            <div class="speciality_list">
                            <div class="checkbox"><label><input type="checkbox"> Anaesthesia</label></div>
                            <div class="checkbox"><label><input type="checkbox"> Cardiology</label></div>
                            <div class="checkbox"><label><input type="checkbox"> Cardio Vascular Thoracic Surgery (CVTS)</label></div>
                            <div class="checkbox"><label><input type="checkbox"> Dental</label></div>
                            <div class="checkbox"><label><input type="checkbox"> Dermatology</label></div>
                            <div class="checkbox"><label><input type="checkbox"> Ear Nose and Throat (ENT)</label></div>
                            <div class="checkbox"><label><input type="checkbox"> Gastroenterology</label></div>
                            <div class="checkbox"><label><input type="checkbox"> General & Laparoscopic Surgery</label></div>
                            <div class="checkbox"><label><input type="checkbox"> General Medicine</label></div>
                            <div class="checkbox"><label><input type="checkbox"> Haematology</label></div>
                            <div class="checkbox"><label><input type="checkbox"> Interventional Radiology</label></div>
                            <div class="checkbox"><label><input type="checkbox"> Medical Oncology</label></div>
                            <div class="checkbox"><label><input type="checkbox"> Nephrology</label></div>
                            <div class="checkbox"><label><input type="checkbox"> Nutrition & Dietetics</label></div>
                            <div class="checkbox"><label><input type="checkbox"> Neurology</label></div>
                            <div class="checkbox"><label><input type="checkbox"> Neurosurgery</label></div>
                            <div class="checkbox"><label><input type="checkbox"> Obstetrics & Gynaecology</label></div>
                            <div class="checkbox"><label><input type="checkbox"> Ophthalmology</label></div>
                            <div class="checkbox"><label><input type="checkbox"> Orthopaedics</label></div>
                            <div class="checkbox"><label><input type="checkbox"> Paediatrics</label></div>
                            <div class="checkbox"><label><input type="checkbox"> Paediatric Surgery</label></div>
                            <div class="checkbox"><label><input type="checkbox"> Plastic Surgery</label></div>
                            <div class="checkbox"><label><input type="checkbox"> Psychiatry</label></div>
                            <div class="checkbox"><label><input type="checkbox"> Radiology</label></div>
                            <div class="checkbox"><label><input type="checkbox"> Respiratory Medicine</label></div>
                            <div class="checkbox"><label><input type="checkbox"> Surgical Oncology</label></div>
                            <div class="checkbox"><label><input type="checkbox"> Urology</label></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="sidebar_filter_label">Gender</label>
                            <div class="checkbox">
                            <label><input type="checkbox"> Male</label>
                            </div>
                            <div class="checkbox">
                            <label><input type="checkbox"> Female</label>
                            </div>
                        </div>
                        </div>
                    </div>


                    <div class="col-md-9" id="content">
                        <div class="row">
                            <div id="content">
                                @foreach($doctors as $doctor)
                                <div class="doctor-card">
                                    <div class="row">
                                        <div class="col-sm-3 text-center">
                                            <div class="doctor-img">
                                                <img src="{{ asset('uploads/doctors/' . $doctor->doctor_image) }}" 
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
                                                    {{ $doctor->category_id ? $doctor->category->name : 'N/A' }}
                                                </p>
                                                <p class="experience"><strong>Designation:</strong> 
                                                    {{ $doctor->designation }}
                                                </p>
                                                <p class="degree"><strong>Qualification:</strong> 
                                                    {{ $doctor->qualification }}
                                                </p>
                                                <p class="degree"><strong>OPD Timing:</strong> 
                                                    @php
                                                        $slots = json_decode($doctor->doctor_time_slot, true);
                                                        if($slots){
                                                            foreach($slots as $slot){
                                                                echo $slot['from'].' - '.$slot['to'].'<br>';
                                                            }
                                                        } else {
                                                            echo 'N/A';
                                                        }
                                                    @endphp
                                                </p>
                                                <div class="button-box">
                                                    <a class="twenty" href="{{ route('frontend.doctor_details', ['doctoreslug' => $doctor->slug]) }}">
                                                        <span>View Profile</span>
                                                    </a>
                                                    <a class="twenty" type="button" data-toggle="modal" data-target="#bookappointment-services">
                                                        <span>Book Appointment</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>


         @include('components.frontend.footer')
        
        @include('components.frontend.main-js')

  </body>
</html>
