
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


        <section class="banner_section" style="background-image: url('{{ asset('uploads/doctors/' . $doctor->banner_image) }}'); background-size: cover; background-position: center;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="banner-content">
                            <h1>{{ $doctor->doctor_name }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <section class="breadcrumb_section">
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb custom-breadcrumb">
                        <li><a href="{{ route('frontend.index') }}"><span class="glyphicon glyphicon-home"></span></a></li>
                        <li><a href="#">Somaiya Doctors</a></li>
                        <li class="active">{{ $doctor->doctor_name }}</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>



        <section class="section-wrap doctor_profile_wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="doctor_img">
                            <img src="{{ asset('uploads/doctors/' . $doctor->doctor_image) }}" 
                                alt="{{ $doctor->doctor_name }}" 
                                class="img-responsive rounded">
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="doctor_information">
                            <div class="doctor_info">
                                <div class="doctor_name">
                                    <h3>{{ $doctor->doctor_name }}</h3>
                                    <p class="doctor-depart"><strong>Department:</strong>  {{ $doctor->subcategory->subcategory_name ?? 'No Subcategory' }}</p>
                                    <p class="doctor-edu">{{ $doctor->qualification }}</p>
                                </div>

                                <div class="doctor-share-box">
                                    <span class="share-label">Share</span>
                                    <ul class="share-icons">
                                        <li>
                                        <a href="#" class="share-facebook" title="Share on Facebook">
                                        <i class="fa fa-facebook"></i>
                                        </a>
                                        </li>
                                        <li>
                                        <a href="#" class="share-twitter" title="Share on Twitter">
                                        <i class="fa fa-twitter"></i>
                                        </a>
                                        </li>
                                        <li>
                                        <a href="#" class="share-linkedin" title="Share on LinkedIn">
                                        <i class="fa fa-linkedin"></i>
                                        </a>
                                        </li>
                                        <li>
                                        <a href="#" class="share-whatsapp" title="Share on WhatsApp">
                                        <i class="fa fa-whatsapp"></i>
                                        </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>



                            <ul class="doctor_time_list">
                                <li><i class="fa fa-graduation-cap" aria-hidden="true"></i> {{ $doctor->doctor_exp }}</li>
                                @php
                                    $days = $doctor->doctor_availability; // ["Monday", "Tuesday", ...]
                                    $dayCount = count($days);

                                    if ($dayCount > 4) {
                                        // Show start and end day
                                        $startDay = substr($days[0], 0, 3);
                                        $endDay = substr($days[$dayCount - 1], 0, 3);
                                        $daysShort = "$startDay - $endDay";
                                    } else {
                                        // List all days short form
                                        $daysShort = collect($days)->map(fn($day) => substr($day,0,3))->join(', ');
                                    }
                                @endphp

                                @foreach($doctor->doctor_time_slot as $slot)
                                    <li>
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        {{ $slot['from'] }} - {{ $slot['to'] }}  •  {{ $daysShort }}
                                    </li>
                                @endforeach

                                @php
                                    $languages = $doctor->languages_known; // Already decoded as array
                                    $languagesText = implode(' • ', $languages);
                                @endphp

                                <li>
                                    <i class="fa fa-language" aria-hidden="true"></i> {{ $languagesText }}
                                </li>

                            </ul>

                            <div class="button-box doctor-btn">
                                <a class="twenty" type="button" data-toggle="modal" data-target="#health-checkup"><span><i class="fa fa-phone" aria-hidden="true"></i>
                                Call</span></a>
                                <a class="twenty" type="button" data-toggle="modal" data-target="#health-checkup"><span><i class="fa fa-calendar" aria-hidden="true"></i>
                                Book Appointment</span></a>
                            </div>

                        </div>
                    </div>

                </div>


                <div class="row doctor_tab">
                    <div class="col-md-12">
                        <!-- Tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a data-toggle="tab" href="#overview-tab">{{ $doctor->overview_heading ?? 'Overview' }}</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#experience">{{ $doctor->exp_heading ?? 'Experience' }}</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#treatments">{{ $doctor->treatment_heading ?? 'Treatments' }}</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#faqs">{{ $doctor->faq_heading ?? "FAQ's" }}</a>
                            </li>
                        </ul>

                        <!-- Tab Content -->
                        <div class="tab-content">

                            <!-- Overview Tab -->
                            <div id="overview-tab" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>{{ $doctor->overview_heading }}</h4>
                                        {!! $doctor->overview_desc !!}
                                    </div>
                                </div>
                            </div>

                            <!-- Experience Tab -->
                            <div id="experience" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>{{ $doctor->exp_heading }}</h4>
                                        {!! $doctor->exp_desc !!}
                                    </div>
                                </div>
                            </div>

                            <!-- Treatments Tab -->
                            <div id="treatments" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>{{ $doctor->treatment_heading }}</h4>
                                        <ul class="listing">
                                            @foreach($doctor->treatments as $treatment)
                                                <li>
                                                    <i class="fa fa-arrow-circle-right"></i> {{ $treatment['name'] }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ Tab -->
                            <div id="faqs" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>{{ $doctor->faq_heading }}</h4>
                                        <div class="panel-group" id="faqAccordion">
                                            @foreach($doctor->faq as $index => $faq)
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq{{ $index+1 }}">
                                                        <h5 class="panel-title">
                                                            {{ sprintf('%02d', $index+1) }}. {{ $faq['question'] }}
                                                            <i class="fa fa-chevron-down"></i>
                                                        </h5>
                                                    </div>
                                                    <div id="faq{{ $index+1 }}" class="panel-collapse collapse {{ $index==0 ? 'in' : '' }}">
                                                        <div class="panel-body">
                                                            {!! $faq['answer'] !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
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