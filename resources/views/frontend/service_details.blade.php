
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
  
      
      <!----- Banner Details ----->
      <section class="speciality_banner">
          <div class="container">
              <div class="row speciality_banner_img">
                  <div class="col-md-12">

                      <div class="speciality_banner_content wow fadeInUp">

                          <h1>{{ $service->banner_heading }}</h1>

                          <h2>{{ $service->banner_title }}</h2>

                          <div class="breadcrumb-wrapper">
                              <ol class="breadcrumb custom-breadcrumb">

                                  <li>
                                      <a href="{{ url('/') }}">
                                          <span class="glyphicon glyphicon-home"></span>
                                      </a>
                                  </li>

                                  <li>
                                      <a href="#">
                                          Medical Services
                                      </a>
                                  </li>


                                  <li>
                                      <a href="#">
                                          {{ $service->category->category_name ?? 'Medical Services' }}
                                      </a>
                                  </li>

                                  <li class="active">
                                      {{ $subcategory->subcategory_name }}
                                  </li>

                              </ol>
                          </div>

                      </div>

                  </div>
              </div>
          </div>
      </section>


      <!----- Page Headers ----->
      <section class="speciality-tabs">
        <div class="container">
          <div class="row">
            <div class="apollo-tabs-placeholder"></div>
            <div class="apollo-tabs-wrapper">
              <div class="apollo-tabs dignostic_tabs" id="apolloTabs">
                <button class="tab-arrow left" type="button">&#10094;</button>
                  <ul class="nav nav-tabs tab-scroll">

                    @php
                    $targets = [
                        'overview',
                        'doctors',
                        'our-services',
                        'health-packages',
                        'make-special',
                        'testimonials',
                        'announcements',
                        'blogs',
                        'faq'
                    ];
                    @endphp

                    @foreach($service->page_headers as $key => $header)

                    <li class="{{ $key == 0 ? 'active' : '' }}">
                        <a href="javascript:void(0)" data-target="{{ $targets[$key] }}">
                            {{ $header['title'] }}
                        </a>
                    </li>

                    @endforeach

                  </ul>

                <button class="tab-arrow right" type="button">&#10095;</button>
              </div>
            </div>
          </div>
        </div>
      </section>


      <!------------- Main Desciption------------->
      <div id="overview" class="tab_section ck-content lists">
          <div class="container">
              <div class="row">
                  <div class="col-md-6">
                      <div class="services-overview">
                          <div class="cs_about_thumbnail">
                              <div class="cs_about_thumbnail_1">
                                  <img src="{{ asset('uploads/service-details/' . $service->section_image[1]) }}" class="img-responsive" alt="Image">
                                  <a href="https://www.youtube.com/embed/rRid6GCJtgc" class="cs_player_btn cs_style_1 cs_video_open">
                                      <span class="cs_play_btn_text cs_fs_18 cs_semibold cs_accent_color">{{ $subcategory->subcategory_name }}</span>
                                  </a>
                              </div>
                              <div class="cs_about_thumbnail_2">
                                  <img src="{{ asset('uploads/service-details/' . $service->section_image[0]) }}" class="img-responsive" alt="About Image">
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="col-md-6">
                      <div class="services-content">
                          {!! $service->description !!}
                      </div>
                  </div>
              </div>
          </div>
      </div>


      <!------------- Doctor Details ------------->
      <div id="doctors" class="tab_section">
        <div class="container">
        
          <div class="row">

            <!-- Doctor 1 -->
            <div class="col-md-4">
              <div class="doctor_sec_title">
                  <div class="section-heading wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
                      <h2>{{ $service->doctor_heading }}</h2>
                      <p>{{ $service->doctor_desc }}</p>
                      <div class="button-box">
                          <a class="twenty" href="#"><span>View All</span></a>
                      </div>
                  </div>
              </div>

            </div>

            <div class="col-md-8">
                <div class="owl-carousel owl-theme" id="doctor">
                    @foreach($doctors as $doctor)
                    <div class="item">
                        <div class="cs_team cs_style_1 cs_type_1 exp-doc-team-style-1">

                            <!-- Doctor Image -->
                            <div class="cs_team_thumbnail cs_center">
                                <img src="{{ asset('uploads/doctors/' . $doctor->doctor_image) }}" 
                                    alt="{{ $doctor->doctor_name }}">
                                {{-- 
                                <div class="cs_social_btns cs_style_1">
                                    <a href="#" class="cs_center cs_share"><i class="fa fa-plus"></i></a>
                                    <a href="#" class="cs_center"><i class="fa fa-phone"></i></a>
                                    <a href="#" class="cs_center"><i class="fa fa-calendar"></i></a>
                                </div> 
                                --}}
                            </div>

                            <!-- Doctor Info -->
                            <div class="cs_team_bio exp-doc-team-bio-custom-sec">
                                <h3 class="cs_team_title">
                                    <a href="{{ route('frontend.doctor_details', $doctor->slug) }}">
                                        {{ $doctor->doctor_name }}
                                    </a>
                                </h3>

                                <p class="cs_team_subtitle">{{ $doctor->qualification }}</p>

                                <p class="speciality-title">
                                    <span>Speciality:</span> {{ $subcategory->subcategory_name }}
                                </p>

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

      
      <!------------- Services / Procedures We Offer ------------->
      <div id="our-services" class="tab_section ck-content white-text">
          <div class="container">
              <div class="row">
                  <div class="col-md-6">
                      <div class="ourservices_content">
                          <div class="section-heading wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
                              <h2>{{ $service->service_heading }}</h2>
                          </div>
                          <p>{{ $service->service_desc }}</p>
                          <div class="row">
                            <div class="owl-carousel owl-theme white-text" id="ourservices-items">
                                @foreach($service->features as $index => $featureGroup)
                                    <div class="item iconbox">
                                        <div class="iconbox-icon">
                                            <span>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                        </div>
                                        <h4>{{ $featureGroup['title'] ?? '' }}</h4>

                                        {{-- Check if description is an array --}}
                                        @if(!empty($featureGroup['description']) && is_array($featureGroup['description']))
                                            <ul class="lists">
                                                @foreach($featureGroup['description'] as $desc)
                                                    <li>
                                                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                                                            <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                                                            <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                                                        </svg>
                                                        <span>{{ $desc }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            {{-- Otherwise, render the description directly as HTML --}}
                                            <div class="lists">
                                                {!! $featureGroup['description'] ?? '' !!}
                                            </div>
                                        @endif

                                    </div>
                                @endforeach
                            </div>

                          </div>
                      </div>
                  </div>

                  <div class="col-md-6">
                    <div class="ourservices_img">
                      <img src="{{ asset('uploads/service-details/' . $service->service_image) }}" class="img-fluid" alt="Service Image">
                  </div>
              </div>
          </div>
      </div>


      <!------------- Health Check Packages ------------->
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
          <div class="row pricing-col">
            <div class="owl-carousel owl-theme" id="health-package-slider">
            <div class="item">
              <div class="pricing-col">
                <div class="pricing-card-wrapper">
                  <!-- Background Accent Card -->
                  <div class="pricing-bg-card">
                    <a href="view-package.html" class="btn pricing-btn">View Package <span>→</span></a>
                    <a type="button" data-toggle="modal" data-target="#health-checkup" class="btn pricing-btn book_packages">Book Package <span>→</span></a>
                  </div>
                  <!-- Main Card -->
                  <div class="pricing-card">
                    <!--  <div class="pricing-icon">
                      <span class="glyphicon glyphicon-stats"></span>
                      </div> -->
                    <h4 class="plan-title red-title">Cardiac Screening</h4>
                    <div class="price">
                      <span class="old-price">Rs.2700/-</span>
                      <sup>Rs.</sup>1000
                    </div>
                    <ul class="pricing-features">
                      <li>Age Range: 17+</li>
                      <li>Gender: Male, Female</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="pricing-col">
                <div class="pricing-card-wrapper">
                  <!-- Background Accent Card -->
                  <div class="pricing-bg-card blue-card">
                    <a href="view-package.html" class="btn pricing-btn">View Package <span>→</span></a>
                    <a type="button" data-toggle="modal" data-target="#health-checkup" class="btn pricing-btn book_packages">Book Package <span>→</span></a>
                  </div>
                  <!-- Main Card -->
                  <div class="pricing-card">
                    <!--  <div class="pricing-icon">
                      <span class="glyphicon glyphicon-stats"></span>
                      </div> -->
                    <h4 class="plan-title blue-title">Cardiac Plus</h4>
                    <div class="price">
                      <span class="old-price">Rs.5000/-</span>
                      <sup>Rs.</sup>3100
                    </div>
                    <ul class="pricing-features">
                      <li>Age Range: 17+</li>
                      <li>Gender: Male, Female</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>


            <div class="item">
              <div class="pricing-col">
                <div class="pricing-card-wrapper">
                  <!-- Background Accent Card -->
                  <div class="pricing-bg-card green-card">
                    <a href="view-package.html" class="btn pricing-btn">View Package <span>→</span></a>
                    <a type="button" data-toggle="modal" data-target="#health-checkup" class="btn pricing-btn book_packages">Book Package <span>→</span></a>
                  </div>
                  <!-- Main Card -->
                  <div class="pricing-card">
                    <!--  <div class="pricing-icon">
                      <span class="glyphicon glyphicon-stats"></span>
                      </div> -->
                    <h4 class="plan-title green-title">Cardiac Supreme</h4>
                    <div class="price">
                      <span class="old-price">Rs.12000/-</span>
                      <sup>Rs.</sup>6900
                    </div>
                    <ul class="pricing-features">
                      <li>Age Range: 17+</li>
                      <li>Gender: Male, Female</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="pricing-col">
                <div class="pricing-card-wrapper">
                  <!-- Background Accent Card -->
                  <div class="pricing-bg-card green-card">
                    <a href="view-package.html" class="btn pricing-btn">View Package <span>→</span></a>
                    <a type="button" data-toggle="modal" data-target="#health-checkup" class="btn pricing-btn book_packages">Book Package <span>→</span></a>
                  </div>
                  <!-- Main Card -->
                  <div class="pricing-card">
                    <!--  <div class="pricing-icon">
                      <span class="glyphicon glyphicon-stats"></span>
                      </div> -->
                    <h4 class="plan-title green-title">Cardiac Supreme</h4>
                    <div class="price">
                      <span class="old-price">Rs.12000/-</span>
                      <sup>Rs.</sup>6900
                    </div>
                    <ul class="pricing-features">
                      <li>Age Range: 17+</li>
                      <li>Gender: Male, Female</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
           
          </div>
        </div>
      </div>


      <!------------- Why Choose Us ------------->
      <div id="make-special" class="tab_section">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-6 no-padding">
                      <div class="makespacial-content">
                          {{-- Section Heading --}}
                          @if(!empty($service->special_heading))
                              <div class="section-heading wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
                                  <h2>{{ $service->special_heading }}</h2>
                              </div>
                          @endif

                          {{-- Description --}}
                          @if(!empty($service->special_desc))
                              <div class="special-desc">
                                  {!! $service->special_desc !!}
                              </div>
                          @endif
                      </div>
                  </div>

                  {{-- Image --}}
                  @if(!empty($service->special_image))
                      <div class="col-md-6 no-padding">
                          <div class="makespacial-img">
                              <img src="{{ asset('uploads/service-details/'.$service->special_image) }}" class="img-responsive" alt="{{ $service->special_heading }}">
                          </div>
                      </div>
                  @endif
              </div>
          </div>
      </div>

  
      <!-------------testimonials ------------->
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
          <div class="row services_testi">
            <div class="col-md-12 text-center">
              <ul class="nav nav-tabs center-tabs">
                <li class="active"><a data-toggle="tab" href="#testimonials_tab">Testimonials</a></li>
                <li><a data-toggle="tab" href="#video_testimonial_tab">Video Testimonials</a></li>
              </ul>
              <div class="tab-content">
                <div id="testimonials_tab" class="tab-pane fade in active">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="owl-carousel owl-theme" id="patient-testimonial">
                        <div class="item">
                          <div class="testimonial-card">
                            <i class="fa fa-quote-left quote-icon"></i>
                            <!-- <img src="img/icon/testi.png" class="testimonial-img" alt="Patient 1"> -->
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
                          <div class="testimonial-card">
                            <i class="fa fa-quote-left quote-icon"></i>
                            <!--  <img src="img/icon/testi.png" class="testimonial-img" alt="Patient 1"> -->
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
                          <div class="testimonial-card">
                            <i class="fa fa-quote-left quote-icon"></i>
                            <!-- <img src="img/icon/testi.png" class="testimonial-img" alt="Patient 1"> -->
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
                <div id="video_testimonial_tab" class="tab-pane fade">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="owl-carousel owl-theme" id="video-testimonial">
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
                          <div class="video_testi">
                            <div class="video-box" data-toggle="modal" data-target="#videoModal" data-video="https://www.youtube.com/embed/zpOULjyy-n8?autoplay=1">
                              <img src="img/testimonials/testimonials1.jpg" class="img-responsive" alt="Patient 1">
                              <div class="play-btn"><i class="fa fa-play"></i></div>
                            </div>
                            <div class="video-title">Anita’s Recovery Journey</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      
      <!-------------announcements ------------->
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
            <div class="owl-carousel owl-theme" id="announcements-slider">
            <div class="item">
              <div class="case-card">
                <div class="case-img">
                  <img src="{{ asset('frontend/assets/img/awards/award1.jpg')}}" class="img-responsive">
                </div>
                <div class="case_title">
                  <span class="case-cat">2022</span>
                  <h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h3>
                  <a href="#" class="case-link">Learn More <span>↗</span></a>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="case-card">
                <div class="case-img">
                  <img src="{{ asset('frontend/assets/img/awards/award2.jpg')}}" class="img-responsive">
                </div>
                <div class="case_title">
                  <span class="case-cat">2022</span>
                  <h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h3>
                  <a href="#" class="case-link">Learn More <span>↗</span></a>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="case-card">
                <div class="case-img">
                  <img src="{{ asset('frontend/assets/img/awards/award3.jpg')}}" class="img-responsive">
                </div>
                <div class="case_title">
                  <span class="case-cat">2022</span>
                  <h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h3>
                  <a href="#" class="case-link">Learn More <span>↗</span></a>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="case-card">
                <div class="case-img">
                  <img src="{{ asset('frontend/assets/img/awards/award2.jpg')}}" class="img-responsive">
                </div>
                <div class="case_title">
                  <span class="case-cat">2022</span>
                  <h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h3>
                  <a href="#" class="case-link">Learn More <span>↗</span></a>
                </div>
              </div>
            </div>
          </div>
          </div>

        </div>
      </div>

      <!-------------Blogs ------------->
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
                      <img src="{{ asset('frontend/assets/img/blog/blog1.jpg')}}" alt="blog one">
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
                      <img src="{{ asset('frontend/assets/img/blog/blog2.jpg')}}" alt="blog two">
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
                      <img src="{{ asset('frontend/assets/img/blog/blog3.jpg')}}" alt="blog three">
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
                      <img src="{{ asset('frontend/assets/img/blog/blog1.jpg')}}" alt="blog one">
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


      <!-------------faq ------------->
      <div id="faq" class="tab_section">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <div class="section-heading wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
                          <h2>{{ $service->faq_heading }}</h2>
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
                                          {{ sprintf('%02d', $index + 1) }}. {!! $faq['question'] !!}
                                          <i class="fa fa-chevron-down"></i>
                                      </h4>
                                  </div>
                                  <div id="faq{{ $index + 1 }}" class="panel-collapse collapse @if($index === 0) in @endif">
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
                        <img src="https://careon.themehealer.com/assets/images/resources/faq-one-img-1.jpg" class="img-responsive">
                      </div>
                    </div>
              </div>
             
          </div>
      </div>


      <section class="hospital-cta">
          <div class="container">
              <div class="row">
                  <div class="col-md-9">
                      <div class="cta-content animate-text">
                          <span class="cta-icon">
                              <i class="fa fa-heartbeat"></i>
                          </span>
                          <h5>{{ $service->book_desc ?? 'Default description here' }}</h5>
                          <h2>{{ $service->book_heading ?? 'Default heading here' }}</h2>
                      </div>
                  </div>

                  <div class="col-md-3 text-right">
                      <div class="cta-action animate-btn">
                          <a type="button" data-toggle="modal" data-target="#bookappointment-services" class="btn-cta-primary">
                              <i class="fa fa-calendar"></i> Book Appointment
                          </a>
                          <a href="#" class="btn-cta-outline">
                              <i class="fa fa-phone"></i> Call Now
                          </a>
                      </div>
                  </div>
              </div>
          </div>
      </section>


      
    @include('components.frontend.footer')
     
    @include('components.frontend.main-js')


    <script>
      $(document).ready(function () {
      
        var tabs = $('.apollo-tabs');
        var tabList = $('.tab-scroll');
        var headerHeight = $('#header-sticky').outerHeight() || 90;
        var tabOffset = $('.apollo-tabs-wrapper').offset().top;
        var isSticky = false;
      
        function checkTabOverflow() {
          if (tabList[0].scrollWidth > tabList[0].clientWidth + 5) {
            tabs.addClass('enable-scroll');
          } else {
            tabs.removeClass('enable-scroll');
            tabList.scrollLeft(0);
          }
        }
      
        function prepareStickyPosition() {
          var container = $('.speciality-tabs .container');
          var containerWidth = container.outerWidth();
          var containerLeft = container.offset().left;
      
          tabs.css({
            width: containerWidth + 'px',
            left: containerLeft + 'px',
            transform: 'none'
          });
        }
      
        function enableSticky() {
          if (isSticky) return;
      
          prepareStickyPosition();
      
          $('.apollo-tabs-placeholder')
            .height(tabs.outerHeight())
            .show();
      
          tabs.addClass('is-sticky');
          isSticky = true;
        }
      
        function disableSticky() {
          if (!isSticky) return;
      
          tabs.removeClass('is-sticky').removeAttr('style');
          $('.apollo-tabs-placeholder').hide();
          isSticky = false;
        }
      
        // INIT
        checkTabOverflow();
      
        $(window).on('resize', function () {
          checkTabOverflow();
          if (isSticky) prepareStickyPosition();
        });
      
        // SCROLL
        $(window).on('scroll', function () {
          if ($(window).scrollTop() >= tabOffset - headerHeight) {
            enableSticky();
          } else {
            disableSticky();
          }
        });
      
        // TAB CLICK
        $('.apollo-tabs a').on('click', function () {
          var target = $('#' + $(this).data('target'));
          if (!target.length) return;
      
          $('html, body').animate({
            scrollTop: target.offset().top - headerHeight - tabs.outerHeight()
          }, 600);
      
          $('.apollo-tabs li').removeClass('active');
          $(this).parent().addClass('active');
        });
      
        // AUTO ACTIVE TAB
        $(window).on('scroll', function () {
          var scrollPos = $(window).scrollTop();
      
          $('section[id]').each(function () {
            var top = $(this).offset().top - headerHeight - tabs.outerHeight() - 20;
            var bottom = top + $(this).outerHeight();
            var id = $(this).attr('id');
      
            if (scrollPos >= top && scrollPos < bottom) {
              $('.apollo-tabs li').removeClass('active');
              var activeTab = $('.apollo-tabs a[data-target="' + id + '"]')
                .parent().addClass('active');
      
              if (tabs.hasClass('enable-scroll')) {
                tabList.stop().animate({
                  scrollLeft: activeTab.position().left + tabList.scrollLeft() - 50
                }, 200);
              }
            }
          });
        });
      
        // ARROWS
        $('.tab-arrow.left').click(function () {
          tabList.animate({ scrollLeft: '-=200' }, 300);
        });
      
        $('.tab-arrow.right').click(function () {
          tabList.animate({ scrollLeft: '+=200' }, 300);
        });
      
      }); 
    </script>

    

  </body>
</html>