
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
  

        <section class="banner_section" 
                style="background-image: url('{{ asset('uploads/service-details/' . ($service->banner_image ?? 'default-banner.jpg')) }}');">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="banner-content">
                  <h1>{{ $subcategory->subcategory_name ?? 'No Subcategory' }}</h1>
                  <h6>{{ $service->banner_heading ?? 'Welcome to our services' }}</h6>
                </div>
              </div>
            </div>
          </div>
        </section>


        <div class="apollo-tabs-wrapper">
            <div class="apollo-tabs" id="apolloTabs">
                <button class="tab-arrow left" type="button">&#10094;</button>

                <!-- Tab Buttons -->
                <ul class="nav nav-tabs tab-scroll">
                    @php
                        // Map titles to custom data-target values
                        $targets = [
                            'Cardiology'            => 'overview',
                            'Expert Doctors Team'   => 'doctors',
                            'Services & Facilities' => 'our-services',
                            'Cardio Health Packages'=> 'health-packages',
                            'What Makes Us Special' => 'make-special',
                            'Feedback and Review'   => 'testimonials',
                            'Announcements'         => 'announcements',
                            'Blogs'                 => 'blogs',
                            'FAQ'                   => 'faq',
                        ];
                    @endphp

                    @forelse($service->page_headers as $index => $header)
                        @php
                            $title = $header['title'] ?? 'Tab';
                            $type  = $targets[$title] ?? Str::slug($title); // fallback to slug if not mapped
                        @endphp
                        <li class="{{ $index == 0 ? 'active' : '' }}">
                            <a href="javascript:void(0)" data-target="{{ $type }}">
                                {{ $title }}
                            </a>
                        </li>
                    @empty
                        <li class="active">
                            <a href="javascript:void(0)" data-target="overview">Overview</a>
                        </li>
                    @endforelse
                </ul>

                <button class="tab-arrow right" type="button">&#10095;</button>
            </div>
        </div>


        <section class="breadcrumb_section">
          <div class="container">
              <div class="row">
              <div class="col-md-12">
                  <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb custom-breadcrumb">
                      <li><a href="index.html"><span class="glyphicon glyphicon-home"></span></a></li>
                      <li><a href="#">Medical Services</a></li>
                      <li class="active">{{ $subcategory->subcategory_name ?? 'No Subcategory' }}</li>
                  </ol>
                  </div>
              </div>
              </div>
          </div>
        </section>

        @php
            $fullDescription = $service->description ?? '';

            // Split by paragraph tags
            preg_match_all('/<p\b[^>]*>.*?<\/p>/si', $fullDescription, $matches);

            $paragraphs = $matches[0] ?? [];

            $total = count($paragraphs);
            $half = ceil($total / 2);

            $firstHalf = implode('', array_slice($paragraphs, 0, $half));
            $secondHalf = implode('', array_slice($paragraphs, $half));
        @endphp


        <div id="overview" class="tab_section">
           <div class="container">
              <div class="row">
                  <div class="col-md-6">
                      <div class="services-overview">
                          <img
                              src="{{ $service->section_image
                                  ? asset('uploads/service-details/'.$service->section_image)
                                  : asset('img/medical-services/default-overview.jpg') }}"
                              class="img-responsive"
                              alt="{{ $subcategory->subcategory_name ?? 'Service Image' }}"
                          >
                      </div>
                  </div>

                  <div class="col-md-6">
                      <div class="services-content">
                          <div class="section-heading wow fadeInLeft"
                              data-wow-delay="00ms"
                              data-wow-duration="1500ms">
                              <h2>{{ $subcategory->subcategory_name ?? 'No Subcategory' }}</h2>
                          </div>

                          {{-- FIRST HALF --}}
                          {!! $firstHalf !!}
                      </div>
                  </div>
              </div>

              <div class="row overview-para">
                  <div class="col-md-12">

                      {{-- SECOND HALF --}}
                      {!! $secondHalf !!}

                  </div>
              </div>
          </div>
        </div>


        <div id="doctors" class="tab_section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <h2>Expert Doctors Team</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme" id="doctor">
                            @foreach($doctors as $doctor)
                                <div class="item">
                                    <div class="cs_team cs_style_1 cs_type_1 exp-doc-team-style-1">
                                        <div class="cs_team_thumbnail cs_center">
                                            <img src="{{ asset('uploads/doctors/'.$doctor->doctor_image) }}" alt="{{ $doctor->name }}">
                                        </div>
                                        <div class="cs_team_bio exp-doc-team-bio-custom-sec">
                                            <h3 class="cs_team_title">
                                                <a href="{{ route('frontend.doctor_details', $doctor->slug) }}">
                                                    {{ $doctor->doctor_name }}
                                                </a>
                                            </h3>
                                            <p class="cs_team_subtitle">{{ $doctor->qualifications }}</p>
                                            <p class="speciality-title"><span>Speciality:</span> {{ $doctor->subcategory->subcategory_name ?? '' }}</p>
                                            <div class="expert-doctor-team-button-sec">
                                                <a href="{{ route('frontend.doctor_details', $doctor->slug) }}" class="btn edtbs-outline">View Profile</a>
                                                <a href="#" type="button" data-toggle="modal" data-target="#bookappointment-services" class="btn edtbs-filled">Appointment</a>
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

    </div>



    <div id="our-services" class="tab_section" style="background-image: url('{{ $service->service_image
                            ? asset('uploads/service-details/' . $service->service_image)
                            : asset('frontend/assets/default-service.jpg') }}');
                        background-size: cover;
                        background-position: center;
                        background-repeat: no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="opd-timing-content">
                        <div class="section-heading wow fadeInLeft"
                            data-wow-delay="00ms"
                            data-wow-duration="1500ms">
                            <h2>{{ $service->service_heading ?? 'Services & Facilities' }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="ourservices_content">
                        <p>{!! $service->service_desc ?? '' !!}</p>

                        @if(!empty($service->features))
                            <ul class="listing">
                                @foreach($service->features as $feature)
                                    @if(!empty($feature['name']))
                                        <li>
                                            <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                            {{ $feature['name'] }}
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>




    <div id="health-packages" class="tab_section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="opd-timing-content">
              <div class="section-heading wow fadeInLeft" data-wow-delay="00ms"
                data-wow-duration="1500ms">
                <h2>Health Check Packages - Cardiology</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Cardiac Packages -->
          <!-- <div class="col-md-12">
            <div class="package-box">
              <div class="row">
                <div class="col-xs-7">
                  <div class="package-title cardiac">Cardiac Screening</div>
                </div>
                <div class="col-xs-5 price">
                  <span class="old-price">Rs.2700/-</span> Rs.1000/-
                </div>
              </div>
              <ul class="package-list">
                <li>CBC Haemogram</li>
                <li>Urine Routine & Microscopy</li>
                <li>Blood Sugar Fasting</li>
                <li>Lipid Profile <b>Consultation</b></li>
                <li>Physician</li>
              </ul>
              <div class="button-box">
                <a class="twenty" type="button" data-toggle="modal" data-target="#health-checkup"><span>Book Health Check</span></a>
              </div>
            </div>
          </div> -->
          <!-- Diabetes Packages -->
          <div class="col-md-12">
            <div class="package-card">
              <div class="package-header bg-red">
                <div class="package-title">
                  <h4>Cardiac Screening</h4>
                </div>
                <div class="package-price">
                  <span class="old-price">Rs.2700/-</span>
                  <span class="price">Rs. 1000</span>
                </div>
              </div>
              <div class="package-body">
                <ul>
                  <li>CBC Haemogram</li>
                  <li>Urine Routine and Microscopy</li>
                  <li>Blood Sugar Fasting</li>
                  <li>Lipid Profile <b>Consultation</b></li>
                  <li>Physician</li>
                </ul>
              </div>
              <div class="package-footer">
                <div class="button-box">
                  <a class="twenty" type="button" data-toggle="modal" data-target="#health-checkup"><span>Book Health Check</span></a>
                </div>
              </div>
            </div>
          </div>
          <!-- Package 7 -->
          <div class="col-md-12">
            <div class="package-card">
              <div class="package-header bg-red">
                <div class="package-title">
                  <h4>Cardiac Plus</h4>
                </div>
                <div class="package-price">
                  <span class="old-price">Rs.7700/-</span>
                  <span class="price">Rs. 3100</span>
                </div>
              </div>
              <div class="package-body">
                <ul>
                  <li>CBC Haemogram</li>
                  <li>Urine Routine and Microscopy</li>
                  <li>Blood Sugar Fasting</li>
                  <li>Blood Sugar PP</li>
                  <li>Lipid Profile</li>
                  <li>ECG</li>
                  <li>2D Echo or Stress Test <b>Consultation</b></li>
                  <li>Physician</li>
                  <li>*Breakfast Included</li>
                </ul>
              </div>
              <div class="package-footer">
                <div class="button-box">
                  <a class="twenty" type="button" data-toggle="modal" data-target="#health-checkup"><span>Book Health Check</span></a>
                </div>
              </div>
            </div>
          </div>
          <!-- Package 8 -->
          <div class="col-md-12">
            <div class="package-card">
              <div class="package-header bg-red">
                <div class="package-title">
                  <h4>Cardiac Supreme</h4>
                </div>
                <div class="package-price">
                  <span class="old-price">Rs.15250/-</span>
                  <span class="price">Rs. 6900</span>
                </div>
              </div>
              <div class="package-body">
                <ul>
                  <li>CBC Haemogram</li>
                  <li>Urine Routine and Microscopy</li>
                  <li>Blood Sugar Fasting</li>
                  <li>Blood Sugar PP</li>
                  <li>HbA1c</li>
                  <li>Lipid Profile</li>
                  <li>Kidney Profile</li>
                  <li>Liver Profile Test</li>
                  <li>CRP</li>
                  <li>Homocysteine</li>
                  <li>ECG</li>
                  <li>2D Echo or Stress Test</li>
                  <li>Chest X-ray</li>
                  <li>PFT Complete <b>Consultation</b></li>
                  <li>Dietician</li>
                  <li>Cardiologist</li>
                  <li>Physician</li>
                  <li>*Breakfast Included</li>
                </ul>
              </div>
              <div class="package-footer">
                <div class="button-box">
                  <a class="twenty" type="button" data-toggle="modal" data-target="#health-checkup"><span>Book Health Check</span></a>
                </div>
              </div>
            </div>
          </div>
          <!-- Package 9 -->
          <div class="col-md-12">
            <div class="package-card">
              <div class="package-header bg-red">
                <div class="package-title">
                  <h4>CT Coronary Angiography</h4>
                </div>
                <div class="package-price">
                  <span class="old-price">Rs.20000/-</span>
                  <span class="price">Rs. 12000</span>
                </div>
              </div>
              <div class="package-body">
                <p>Exclusions:</p>
                <ul>
                  <li>Pre-angio tests or consultations</li>
                  <li>Contrast dye charges</li>
                  <li>Medications (oral or intravenous) administered during the procedure</li>
                </ul>
              </div>
              <div class="package-footer">
                <div class="button-box">
                  <a class="twenty" type="button" data-toggle="modal" data-target="#health-checkup"><span>Book Health Check</span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div id="make-special" class="tab_section"
        style="background-image: url('{{ $service->special_image
            ? asset('uploads/service-details/' . $service->special_image)
            : asset('frontend/assets/default-special.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="opd-timing-content">
                        <div class="section-heading wow fadeInLeft"
                            data-wow-delay="00ms"
                            data-wow-duration="1500ms">
                            <h2>{{ $service->special_heading ?? 'What Makes Us Special1' }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="insurance-content">
                        {!! $service->special_desc ?? '' !!}
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div id="testimonials" class="tab_section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="opd-timing-content">
              <div class="section-heading text-center wow fadeInLeft" data-wow-delay="00ms"
                data-wow-duration="1500ms">
                <h2>Feedback and Review</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="owl-carousel owl-theme" id="patient-testimonial">
            <div class="item">
              <div class="testimonial-card">
                <i class="fa fa-quote-left quote-icon"></i>
                <img src="img/icon/testi.png" class="testimonial-img" alt="Patient 1">
                <div class="testimonial-text">
                  “The doctors and staff were very kind and professional. My treatment was smooth and quick. I highly recommend this hospital!”
                </div>
                <div class="stars">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-half-alt"></i>
                </div>
                <div class="testimonial-name">Rohit Sharma</div>
                <div class="testimonial-role">Patient</div>
              </div>
            </div>
            <div class="item">
              <div class="video_testi">
                <div class="video-box" data-toggle="modal" data-target="#videoModal" data-video="https://www.youtube.com/embed/zpOULjyy-n8?autoplay=1">
                  <img src="img/testimonials/testimonials1.jpg" class="img-responsive" alt="Patient 1">
                  <div class="play-btn"><i class="fa fa-play"></i></div>
                </div>
                <div class="video-title">Anita’s Recovery Journey</div>
              </div>
            </div>
            <div class="item">
              <div class="testimonial-card">
                <i class="fa fa-quote-left quote-icon"></i>
                <img src="img/icon/testi.png" class="testimonial-img" alt="Patient 1">
                <div class="testimonial-text">
                  “The doctors and staff were very kind and professional. My treatment was smooth and quick. I highly recommend this hospital!”
                </div>
                <div class="stars">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-half-alt"></i>
                </div>
                <div class="testimonial-name">Rohit Sharma</div>
                <div class="testimonial-role">Patient</div>
              </div>
            </div>
            <div class="item">
              <div class="video_testi">
                <div class="video-box" data-toggle="modal" data-target="#videoModal" data-video="https://www.youtube.com/embed/zpOULjyy-n8?autoplay=1">
                  <img src="img/testimonials/testimonials1.jpg" class="img-responsive" alt="Patient 1">
                  <div class="play-btn"><i class="fa fa-play"></i></div>
                </div>
                <div class="video-title">Anita’s Recovery Journey</div>
              </div>
            </div>
            <div class="item">
              <div class="testimonial-card">
                <i class="fa fa-quote-left quote-icon"></i>
                <img src="img/icon/testi.png" class="testimonial-img" alt="Patient 1">
                <div class="testimonial-text">
                  “The doctors and staff were very kind and professional. My treatment was smooth and quick. I highly recommend this hospital!”
                </div>
                <div class="stars">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-half-alt"></i>
                </div>
                <div class="testimonial-name">Rohit Sharma</div>
                <div class="testimonial-role">Patient</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div id="announcements" class="tab_section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading wow fadeInLeft" data-wow-delay="00ms"
              data-wow-duration="1500ms">
              <h2>Announcements </h2>
            </div>
          </div>
        </div>
        <div class"row">
          <div class="col-md-4">
            <div class="case-card">
              <div class="case-img">
                <img src="img/awards/award1.jpg" class="img-responsive">
              </div>
              <span class="case-cat">2022</span>
              <h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h3>
              <a href="#" class="case-link">Learn More <span>↗</span></a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="case-card">
              <div class="case-img">
                <img src="img/awards/award2.jpg" class="img-responsive">
              </div>
              <span class="case-cat">2022</span>
              <h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h3>
              <a href="#" class="case-link">Learn More <span>↗</span></a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="case-card">
              <div class="case-img">
                <img src="img/awards/award3.jpg" class="img-responsive">
              </div>
              <span class="case-cat">2022</span>
              <h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h3>
              <a href="#" class="case-link">Learn More <span>↗</span></a>
            </div>
          </div>
        </div>
       
      </div>
    </div>

    <div id="blogs" class="tab_section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading wow fadeInLeft" data-wow-delay="00ms"
              data-wow-duration="1500ms">
              <h2>Blogs</h2>
            </div>
          </div>
        </div>
        <div class="owl-carousel owl-theme" id="services-blog">
          <div class="item">
            <div class="single-blog-post">
              <div class="post-image">
                <a href="blog-details.html">
                  <figure>
                    <img src="img/blog/blog1.jpg" alt="blog one">
                  </figure>
                </a>
              </div>
              <div class="post-content">
                <ul class="post-meta">
                  <li>
                    <a href="#">
                    <i class="fa fa-user"></i>
                    <span>By: Admin</span>
                    </a>
                  </li>
                  <li>
                    <i class="fa fa-calendar"></i>
                    <span>March 14, 2025</span>
                  </li>
                </ul>
                <h2><a href="#">simply dummy text of the printing and typesetting industry</a></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <div class="blog-list-button">
                  <div class="button-box">
                    <a class="twenty" href="blog-details.html"><span>Read More</span></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="single-blog-post">
              <div class="post-image">
                <a href="blog-details.html">
                  <figure>
                    <img src="img/blog/blog2.jpg" alt="blog two">
                  </figure>
                </a>
              </div>
              <div class="post-content">
                <ul class="post-meta">
                  <li>
                    <a href="#">
                    <i class="fa fa-user"></i>
                    <span>By: Admin</span>
                    </a>
                  </li>
                  <li>
                    <i class="fa fa-calendar"></i>
                    <span>March 14, 2025</span>
                  </li>
                </ul>
                <h2><a href="#">simply dummy text of the printing and typesetting industry</a></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <div class="blog-list-button">
                  <div class="button-box">
                    <a class="twenty" href="blog-details.html"><span>Read More</span></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="single-blog-post">
              <div class="post-image">
                <a href="blog-details.html">
                  <figure>
                    <img src="img/blog/blog3.jpg" alt="blog three">
                  </figure>
                </a>
              </div>
              <div class="post-content">
                <ul class="post-meta">
                  <li>
                    <a href="#">
                    <i class="fa fa-user"></i>
                    <span>By: Admin</span>
                    </a>
                  </li>
                  <li>
                    <i class="fa fa-calendar"></i>
                    <span>March 14, 2025</span>
                  </li>
                </ul>
                <h2><a href="#">simply dummy text of the printing and typesetting industry</a></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <div class="blog-list-button">
                  <div class="button-box">
                    <a class="twenty" href="blog-details.html"><span>Read More</span></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="single-blog-post">
              <div class="post-image">
                <a href="blog-details.html">
                  <figure>
                    <img src="img/blog/blog1.jpg" alt="blog one">
                  </figure>
                </a>
              </div>
              <div class="post-content">
                <ul class="post-meta">
                  <li>
                    <a href="#">
                    <i class="fa fa-user"></i>
                    <span>By: Admin</span>
                    </a>
                  </li>
                  <li>
                    <i class="fa fa-calendar"></i>
                    <span>March 14, 2025</span>
                  </li>
                </ul>
                <h2><a href="#">simply dummy text of the printing and typesetting industry</a></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <div class="blog-list-button">
                  <div class="button-box">
                    <a class="twenty" href="blog-details.html"><span>Read More</span></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div id="faq" class="tab_section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
              <h2>FAQ</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-7">
            <div class="panel-group" id="faqAccordion">
              @foreach($service->faq as $index => $faq)
                <div class="panel panel-default">
                  <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq{{ $index + 1 }}">
                    <h4 class="panel-title">
                      {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}. {{ $faq['question'] }}
                      <i class="fa fa-chevron-down"></i>
                    </h4>
                  </div>
                  <div id="faq{{ $index + 1 }}" class="panel-collapse collapse @if($index == 0) in @endif">
                    <div class="panel-body">
                      {!! $faq['answer'] !!}
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
          <div class="col-md-5">
              <div class="faq-img">
                  <img src="{{ asset('uploads/service-details/' . $service->faq_image) }}" class="img-responsive" alt="FAQ Image">
              </div>
          </div>

        </div>
      </div>
    </div>



     <!-- Modal -->
    <div id="health-checkup" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content -->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Book Health Check</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <h6 class="form-title">please fill out all required fields meaning</h6>
              <form class="book-appoint-form">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Name" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Package" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Date of Birth:</label>
                  <input type="date" class="form-control" placeholder="" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Date of Appointment :</label>
                  <input type="date" class="form-control" placeholder="" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="Email ID" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Mobile Number" required>
                </div>
              </div>
              
              <div class="col-md-12">
                <div class="button-box">
                  <a class="twenty" href="#"><span>Submit</span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
   

      
    @include('components.frontend.footer')
     
    @include('components.frontend.main-js')


    <script>
      $(document).ready(function(){
      
        var tabs = $('.apollo-tabs');
        var tabList = $('.tab-scroll');
        var headerHeight = $('#header-sticky').outerHeight() || 90;
        var tabOffset = tabs.offset().top;
      
        // Sticky tabs
        $(window).on('scroll', function(){
          if($(window).scrollTop() >= tabOffset - headerHeight){
            tabs.addClass('is-sticky');
          } else {
            tabs.removeClass('is-sticky');
          }
        });
      
        // Click scroll (no hash)
        $('.apollo-tabs a').on('click', function(){
          var target = $('#' + $(this).data('target'));
      
          $('html, body').animate({
            scrollTop: target.offset().top - headerHeight - tabs.outerHeight()
          }, 600);
      
          $('.apollo-tabs li').removeClass('active');
          $(this).parent().addClass('active');
        });
      
        // Auto active on scroll
        $(window).on('scroll', function(){
          var scrollPos = $(window).scrollTop();
      
          $('section[id]').each(function(){
            var top = $(this).offset().top - headerHeight - tabs.outerHeight() - 20;
            var bottom = top + $(this).outerHeight();
            var id = $(this).attr('id');
      
            if(scrollPos >= top && scrollPos < bottom){
              $('.apollo-tabs li').removeClass('active');
              var activeTab = $('.apollo-tabs a[data-target="'+id+'"]').parent().addClass('active');
      
              // auto scroll tab into view
              tabList.animate({
                scrollLeft: activeTab.position().left + tabList.scrollLeft() - 50
              }, 200);
            }
          });
        });
      
        // Arrow buttons
        $('.tab-arrow.left').click(function(){
          tabList.animate({ scrollLeft: '-=200' }, 300);
        });
        $('.tab-arrow.right').click(function(){
          tabList.animate({ scrollLeft: '+=200' }, 300);
        });
      
      });
    </script>

    

  </body>
</html>