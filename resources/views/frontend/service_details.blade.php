
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
  



        <section class="speciality_banner">
          <div class="container">
            <div class="row speciality_banner_img">
              <div class="col-md-12">
                <div class="speciality_banner_content wow fadeInUp" data-wow-delay="00ms"
                    data-wow-duration="1500ms">

                  <h1>Cardiology Care You Can Trust at Every Stage</h1>
                  <h2>From early diagnosis to advanced heart procedures, guided by experienced specialists</h2>
                  <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb custom-breadcrumb">
                    <li><a href="index.html"><span class="glyphicon glyphicon-home"></span></a></li>
                    <li><a href="#">Medical Services</a></li>
                    <li class="active">Cardiology</li>
                  </ol>
                </div>
                </div>
              </div>
            </div>
          </div>
        </section>
   


    <section class="speciality-tabs">
      <div class="container">
        <div class="row">
          <div class="apollo-tabs-placeholder"></div>
          <div class="apollo-tabs-wrapper">
            <div class="apollo-tabs dignostic_tabs" id="apolloTabs">
              <button class="tab-arrow left" type="button">&#10094;</button>
              <ul class="nav nav-tabs tab-scroll">
                <!-- new tabs -->
                <li class="active"><a href="javascript:void(0)" data-target="overview">Cardiology</a></li>
                <li><a href="javascript:void(0)" data-target="doctors">Expert Doctors Team</a></li>
                <li><a href="javascript:void(0)" data-target="our-services">Services / Procedures We Offer</a></li>
                <li><a href="javascript:void(0)" data-target="health-packages">Cardio Health Packages</a></li>
                <li><a href="javascript:void(0)" data-target="make-special">Why Choose Us</a></li>
                <li><a href="javascript:void(0)" data-target="testimonials">Feedback and Review</a></li>
                <li><a href="javascript:void(0)" data-target="announcements">Announcements</a></li>
                <li><a href="javascript:void(0)" data-target="blogs">Blogs</a></li>
                <li><a href="javascript:void(0)" data-target="faq">FAQ</a></li>
              </ul>
              <button class="tab-arrow right" type="button">&#10095;</button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div id="overview" class="tab_section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="services-overview">
              <!--  <div class="overlap-wrapper">
                <div class="overlap-img img-left">
                  <img src="img/medical-services/cardiology/cardiology-overview-one.webp">
                </div>
                
                <div class="overlap-img img-right">
                  <img src="img/medical-services/cardiology/cardiology-overview-two.webp">
                </div>
                
                </div> -->
              <div class="cs_about_thumbnail">
                <div class="cs_about_thumbnail_1">
                  <img src="img/medical-services/cardiology/cardiology-overview-one.webp" class="img-responsive" alt="Image">
                  <a href="https://www.youtube.com/embed/rRid6GCJtgc" class="cs_player_btn cs_style_1 cs_video_open" style="">
                  <span class="cs_play_btn_text cs_fs_18 cs_semibold cs_accent_color">Cardiology</span>
                  </a>
                </div>
                <div class="cs_about_thumbnail_2">
                  <img src="img/medical-services/cardiology/cardiology-overview-two.webp" class="img-responsive" alt="About Image">
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="services-content">
              <h5 class="wow fadeInRight" data-wow-delay="00ms"
                data-wow-duration="1500ms">Comprehensive heart care delivered with precision, safety, and compassion</h5>
              <p>The Cardiology department at K.J. Somaiya Super Speciality Centre provides complete care for heart-related conditions, ranging from early diagnosis to advanced interventional treatments. Our services are designed for patients facing cardiac emergencies, chronic heart conditions, and those requiring specialised heart procedures or preventive care.</p>
              <p><b>Our cardiology department provides evaluation and treatment for:</b></p>
              <ul class="lists">
                <li>
                  <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                    <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                    <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                  </svg>
                  <span>Coronary artery disease and heart attacks</span>
                </li>
                <li>
                  <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                    <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                    <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                  </svg>
                  <span>Valvular and structural heart disease</span>
                </li>
                <li>
                  <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                    <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                    <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                  </svg>
                  <span>Heart rhythm disorders</span>
                </li>
                <li>
                  <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                    <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                    <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                  </svg>
                  <span>Congenital heart defects</span>
                </li>
                <li>
                  <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                    <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                    <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                  </svg>
                  <span>Heart failure management and rehabilitation</span>
                </li>
                <li>
                  <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                    <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                    <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                  </svg>
                  <span>Preventive cardiac care</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!--  <div class="row overview-para">
          <div class="col-md-12">
            <p>Our dedicated electrophysiology team boasts extensive experience in electrophysiology studies,
              radio-frequency ablations, pacemaker and device implantation (like AICD), and cardiac
              resynchronisation therapy (CRT).
            </p>
            <p>Our dedicated team of cardiologists is equipped to diagnose cardiac ailments and guide patients
              through necessary treatments. Our non-invasive cardiology department employs state-of-the-art
              equipment for 2D echocardiography, stress echocardiography, transoesophageal
              echocardiography (TEE), paediatric echocardiography, and treadmill test (TMT).
            </p>
            <p>Additionally, we have developed a preventive cardiology program to detect heart ailments early
              and implement necessary preventive measures. Furthermore, we have a community outreach
              program to diagnose diseases well in advance at the community level, thereby preventing harm.
            </p>
          </div>
          </div> -->
      </div>
    </div>
    <div id="doctors" class="tab_section">
      <div class="container">
        <!-- <div class="row">
          <div class="col-md-12">
            <div class="section-heading wow fadeInLeft" data-wow-delay="00ms"
              data-wow-duration="1500ms">
              <h2>Expert Doctors Team</h2>
            </div>
          </div>
          </div> -->
        <div class="row">
          <!-- Doctor 1 -->
          <div class="col-md-4">
            <div class="doctor_sec_title">
              <div class="section-heading wow fadeInLeft" data-wow-delay="00ms"
                data-wow-duration="1500ms">
                <h2>Expert Doctors Team</h2>
                <p>Meet our compassionate medical experts dedicated to your health, well-being, and long-term care.</p>
                <div class="button-box">
                  <a class="twenty" href="#"><span>View All</span></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="owl-carousel owl-theme" id="doctor">
              <div class="item">
                <div class="cs_team cs_style_1 cs_type_1 exp-doc-team-style-1">
                  <div class="cs_team_thumbnail cs_center">
                    <img src="img/medical-services/cardiology/doctors/dr-sadanand-shetty.png" alt="Doctors">
                    <!-- <div class="cs_social_btns cs_style_1">
                      <a href="#" class="cs_center cs_share"><i class="fa fa-plus"></i></a>
                      <a href="#" class="cs_center"><i class="fa fa-phone"></i></a>
                      <a href="#" class="cs_center"><i class="fa fa-calendar"></i></a>
                      </div> -->
                  </div>
                  <div class="cs_team_bio exp-doc-team-bio-custom-sec">
                    <h3 class="cs_team_title"><a href="#">Dr. Sadanand R. Shetty</a></h3>
                    <p class="cs_team_subtitle">MBBS, MD, DM</p>
                    <p class="speciality-title"><span>Speciality:</span> Cardiology</p>
                    <div class="expert-doctor-team-button-sec">
                      <a href="doctor-profile.html" class="btn edtbs-outline">View Profile</a>
                      <a href="#" type="button" data-toggle="modal" data-target="#bookappointment-services" class="btn edtbs-filled">Appointment</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="cs_team cs_style_1 cs_type_1 exp-doc-team-style-1">
                  <div class="cs_team_thumbnail cs_center">
                    <img src="img/medical-services/cardiology/doctors/dr-nitin-bote.png" alt="Doctors">
                    <!-- <div class="cs_social_btns cs_style_1">
                      <a href="#" class="cs_center cs_share"><i class="fa fa-plus"></i></a>
                      <a href="#" class="cs_center"><i class="fa fa-phone"></i></a>
                      <a href="#" class="cs_center"><i class="fa fa-calendar"></i></a>
                      </div> -->
                  </div>
                  <div class="cs_team_bio exp-doc-team-bio-custom-sec">
                    <h3 class="cs_team_title"><a href="#">Dr. Nitin Nanasaheb Bote</a></h3>
                    <p class="cs_team_subtitle">MBBS, MD, DM</p>
                    <p class="speciality-title"><span>Speciality:</span> Cardiology</p>
                    <div class="expert-doctor-team-button-sec">
                      <a href="doctor-profile.html" class="btn edtbs-outline">View Profile</a>
                      <a href="#" type="button" data-toggle="modal" data-target="#bookappointment-services" class="btn edtbs-filled">Appointment</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="cs_team cs_style_1 cs_type_1 exp-doc-team-style-1">
                  <div class="cs_team_thumbnail cs_center">
                    <img src="img/medical-services/cardiology/doctors/dr-nihar-mehta.jpg" alt="Doctors">
                    <!-- <div class="cs_social_btns cs_style_1">
                      <a href="#" class="cs_center cs_share"><i class="fa fa-plus"></i></a>
                      <a href="#" class="cs_center"><i class="fa fa-phone"></i></a>
                      <a href="#" class="cs_center"><i class="fa fa-calendar"></i></a>
                      </div> -->
                  </div>
                  <div class="cs_team_bio exp-doc-team-bio-custom-sec">
                    <h3 class="cs_team_title"><a href="#">Dr. Nihar Pradip Mehta</a></h3>
                    <p class="cs_team_subtitle">MBBS, MD, DNB, DNB</p>
                    <p class="speciality-title"><span>Speciality:</span> Cardiology</p>
                    <div class="expert-doctor-team-button-sec">
                      <a href="doctor-profile.html" class="btn edtbs-outline">View Profile</a>
                      <a href="#" type="button" data-toggle="modal" data-target="#bookappointment-services" class="btn edtbs-filled">Appointment</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="cs_team cs_style_1 cs_type_1 exp-doc-team-style-1">
                  <div class="cs_team_thumbnail cs_center">
                    <img src="img/medical-services/cardiology/doctors/dr-ajay-pandey.png" alt="Doctors">
                    <!-- <div class="cs_social_btns cs_style_1">
                      <a href="#" class="cs_center cs_share"><i class="fa fa-plus"></i></a>
                      <a href="#" class="cs_center"><i class="fa fa-phone"></i></a>
                      <a href="#" class="cs_center"><i class="fa fa-calendar"></i></a>
                      </div> -->
                  </div>
                  <div class="cs_team_bio exp-doc-team-bio-custom-sec">
                    <h3 class="cs_team_title"><a href="#">Dr. Ajay Pandey</a></h3>
                    <p class="cs_team_subtitle">MBBS, MD, DM</p>
                    <p class="speciality-title"><span>Speciality:</span> Cardiology</p>
                    <div class="expert-doctor-team-button-sec">
                      <a href="doctor-profile.html" class="btn edtbs-outline">View Profile</a>
                      <a href="#" type="button" data-toggle="modal" data-target="#bookappointment-services" class="btn edtbs-filled">Appointment</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="cs_team cs_style_1 cs_type_1 exp-doc-team-style-1">
                  <div class="cs_team_thumbnail cs_center">
                    <img src="img/medical-services/cardiology/doctors/dr-nikesh-jain.jpg" alt="Doctors">
                    <!-- <div class="cs_social_btns cs_style_1">
                      <a href="#" class="cs_center cs_share"><i class="fa fa-plus"></i></a>
                      <a href="#" class="cs_center"><i class="fa fa-phone"></i></a>
                      <a href="#" class="cs_center"><i class="fa fa-calendar"></i></a>
                      </div> -->
                  </div>
                  <div class="cs_team_bio exp-doc-team-bio-custom-sec">
                    <h3 class="cs_team_title"><a href="#">Dr. Nikesh Dinesh Jain</a></h3>
                    <p class="cs_team_subtitle">MBBS, DNB, DNB</p>
                    <p class="speciality-title"><span>Speciality:</span> Cardiology</p>
                    <div class="expert-doctor-team-button-sec">
                      <a href="doctor-profile.html" class="btn edtbs-outline">View Profile</a>
                      <a href="#" type="button" data-toggle="modal" data-target="#bookappointment-services" class="btn edtbs-filled">Appointment</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="our-services" class="tab_section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="ourservices_content">
              <div class="section-heading wow fadeInLeft" data-wow-delay="00ms"
                data-wow-duration="1500ms">
                <h2>Services / Procedures We Offer</h2>
              </div>
              <p>Our cardiology services are delivered by specialised teams using advanced technology to ensure accurate diagnosis, timely intervention, and safe outcomes.</p>
              <div class="row">
                <div class="owl-carousel owl-theme" id="ourservices-items">
                  <div class="item iconbox">
                    <div class="iconbox-icon">
                      <span>01</span>
                    </div>
                    <h4>Interventional Cardiology</h4>
                    <ul class="lists">
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Coronary angiography and cardiac catheterisation</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Coronary angioplasty, including complex coronary angioplasty</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Calcium-modifying techniques such as rota ablation and orbital atherectomy</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Primary angioplasty for acute myocardial infarction</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Coronary imaging using IVUS, OCT</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Coronary physiology using FFR</span>
                      </li>
                    </ul>
                  </div>
                  <div class="item iconbox">
                    <div class="iconbox-icon">
                      <span>02</span>
                    </div>
                    <h4>Structural Heart & Valve Interventions</h4>
                    <ul class="lists">
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Balloon Mitral Valvulotomy (BMV)</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Balloon Aortic Valvulotomy (BAV)</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Balloon Pulmonary Valvotomy (BPV)</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Transcatheter Aortic Valve Implantation (TAVI)</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Transcatheter Mitral Valve Replacement (TMVR)</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Device closure of congenital heart defects (ASD, VSD, PDA, RSOV)</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Septal ablation for hypertrophic obstructive cardiomyopathy (HOCM)</span>
                      </li>
                    </ul>
                  </div>
                  <div class="item iconbox">
                    <div class="iconbox-icon">
                      <span>03</span>
                    </div>
                    <h4>Electrophysiology & Cardiac Devices</h4>
                    <ul class="lists">
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Electrophysiology studies</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Electrophysiology studies</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Pacemaker, AICD, and cardiac resynchronisation therapy (CRT) device implantation</span>
                      </li>
                    </ul>
                  </div>
                  <div class="item iconbox">
                    <div class="iconbox-icon">
                      <span>04</span>
                    </div>
                    <h4>Non-Invasive Cardiology</h4>
                    <ul class="lists">
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>2D echocardiography</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Stress echocardiography</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Transoesophageal echocardiography (TEE)</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Paediatric echocardiography</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Treadmill test (TMT)</span>
                      </li>
                    </ul>
                  </div>
                  <div class="item iconbox">
                    <div class="iconbox-icon">
                      <span>05</span>
                    </div>
                    <h4>Other Cardiac & Vascular Procedures</h4>
                    <ul class="lists">
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Renal and carotid angioplasty</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Peripheral angioplasty</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>IVC filter placement and pulmonary embolectomy</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="ourservices_img">
              <img src="img/medical-services/cardiology/services-facilities.jpg" class="img-responsive">
              <!-- <div class="owl-carousel owl-theme" id="ourservices-img">
                <div class="item">
                  <img src="img/medical-services/cardiology/services-facilities.jpg" class="img-responsive">
                </div>
                <div class="item">
                  <img src="img/medical-services/cardiology/services-facilities-two.jpg" class="img-responsive">
                </div>
                <div class="item">
                  <img src="img/medical-services/cardiology/services-facilities-three.jpg" class="img-responsive">
                </div>
              </div>
            </div> -->
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
        <div class="row pricing-col">
          <div class="col-md-4">
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
          <div class="col-md-4">
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
          <div class="col-md-4">
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
          <!-- <div class="col-md-4">
            <div class="pricing_boxes">
              <h3>Cardiac Plus</h3>
              <div class="prices">
                <h2>Rs. 3100</h2>
              </div>
              <div class="pricing_details">
                <ul class="lists">
                  <li>
                    <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                      <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                      <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                    </svg>
                    Age Range: 17+
                  </li>
                  <li>
                    <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                      <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                      <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                    </svg>
                    Gender: Male, Female
                  </li>
                </ul>
              </div>
              <div class="pricing_btn">
                <div class="button-box">
                  <a class="twenty" href="view-package.html" style=""><span>View Package</span></a>
                </div>
                <div class="button-box">
                  <a class="twenty" type="button" data-toggle="modal" data-target="#health-checkup"><span>Book Package</span></a>
                </div>
              </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="pricing_boxes">
              <h3>Cardiac Supreme</h3>
              <div class="prices">
                <h2>Rs. 6900</h2>
              </div>
              <div class="pricing_details">
                <ul class="lists">
                  <li>
                    <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                      <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                      <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                    </svg>
                    Age Range: 17+
                  </li>
                  <li>
                    <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                      <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                      <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                    </svg>
                    Gender: Male, Female
                  </li>
                </ul>
              </div>
              <div class="pricing_btn">
                <div class="button-box">
                  <a class="twenty" href="view-package.html" style=""><span>View Package</span></a>
                </div>
                <div class="button-box">
                  <a class="twenty" type="button" data-toggle="modal" data-target="#health-checkup"><span>Book Package</span></a>
                </div>
              </div>
            </div>
            </div> -->
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="button-box">
              <a class="twenty" href="view-package.html"><span>View All</span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="make-special" class="tab_section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 no-padding">
            <div class="makespacial-content">
              <div class="section-heading wow fadeInLeft" data-wow-delay="00ms"
                data-wow-duration="1500ms">
                <h2>Why Choose Us</h2>
              </div>
              <p>Our cardiology department combines clinical expertise with a patient-focused approach to deliver safe, ethical, and evidence-based heart care.</p>
              <p><b>Why patients trust our cardiac services:</b></p>
              <ul class="lists">
                <li>
                  <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                    <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                    <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                  </svg>
                  <span>Experienced cardiologists and interventional teams available 24/7</span>
                </li>
                <li>
                  <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                    <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                    <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                  </svg>
                  <span>Advanced catheterisation labs and diagnostic facilities</span>
                </li>
                <li>
                  <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                    <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                    <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                  </svg>
                  <span>Integrated care from emergency intervention to recovery and prevention</span>
                </li>
                <li>
                  <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                    <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                    <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                  </svg>
                  <span>Dedicated teams for interventional, electrophysiology, and non-invasive cardiology</span>
                </li>
                <li>
                  <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                    <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                    <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                  </svg>
                  <span>Strong emphasis on preventive cardiology and early detection</span>
                </li>
                <li>
                  <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                    <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                    <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                  </svg>
                  <span>Commitment to transparent, patient-first clinical decisions</span>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 no-padding">
            <div class="makespacial-img">
              <img src="img/medical-services/cardiology/international-patient.jpg" class="img-responsive">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <div id="international" class="tab_section">
      <div class="container">
        <div class="row">
          <div class="about-wrapper">
            <div class="about-card">
              <h2>International Patients</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." </p>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  </p>
            </div>
            <div class="about-image">
              <img src="img/medical-services/cardiology/international-patient.jpg" alt="Doctor">
            </div>
          </div>
        </div>
      </div>
      </div> -->
    <!-- <div id="opd-timing" class="tab_section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="opd-timing-content">
              <div class="section-heading text-center wow fadeInLeft" data-wow-delay="00ms"
                data-wow-duration="1500ms">
                <h2>OPD Timings</h2>
              </div>
              <div class="table-responsive">
                <table class="table">
                  <tr class="table-head">
                    <td>Day</td>
                    <td>Time</td>
                    <td>Doctors</td>
                  </tr>
                  <tr class="opd-table-row">
                    <td>Monday</td>
                    <td>8:00 AM - 10:00 PM</td>
                    <td>Dr. Smith</td>
                  </tr>
                  <tr class="opd-table-row">
                    <td>Tuesday</td>
                    <td>8:00 AM - 10:00 PM</td>
                    <td>Dr. Smith</td>
                  </tr>
                  <tr class="opd-table-row">
                    <td>Wednesday</td>
                    <td>8:00 AM - 10:00 PM</td>
                    <td>Dr. Smith</td>
                  </tr>
                  <tr class="opd-table-row">
                    <td>Thursday</td>
                    <td>8:00 AM - 10:00 PM</td>
                    <td>Dr. Smith</td>
                  </tr>
                  <tr class="opd-table-row">
                    <td>Friday</td>
                    <td>8:00 AM - 10:00 PM</td>
                    <td>Dr. Smith</td>
                  </tr>
                  <tr class="opd-table-row">
                    <td>Saturday</td>
                    <td>8:00 AM - 10:00 PM</td>
                    <td>Dr. Smith</td>
                  </tr>
                  <tr class="opd-table-row">
                    <td>Sunday</td>
                    <td>8:00 AM - 10:00 PM</td>
                    <td>Dr. Smith</td>
                  </tr>
                </table>
              </div>
              <div class="button-box">
                <a class="twenty" href="#"><span>See  Completed General Hospital OPD Schedule</span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div> -->
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
              <div class="case_title">
                <span class="case-cat">2022</span>
                <h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h3>
                <a href="#" class="case-link">Learn More <span>↗</span></a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="case-card">
              <div class="case-img">
                <img src="img/awards/award2.jpg" class="img-responsive">
              </div>
              <div class="case_title">
                <span class="case-cat">2022</span>
                <h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h3>
                <a href="#" class="case-link">Learn More <span>↗</span></a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="case-card">
              <div class="case-img">
                <img src="img/awards/award3.jpg" class="img-responsive">
              </div>
              <div class="case_title">
                <span class="case-cat">2022</span>
                <h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h3>
                <a href="#" class="case-link">Learn More <span>↗</span></a>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="row">
          <div class="col-md-12">
            <div class="sec_btn mobile_btn">
              <div class="btn">
                <a href="#" class="button cta">
                  View More 
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="arrow" x="0px" y="0px" width="15px" height="15px" viewBox="0 0 11.121 19.414" enable-background="new 0 0 11.121 19.414" xml:space="preserve">
                    <polygon fill="#fff" points="1.414,19.414 0,18 8.293,9.707 0,1.414 1.414,0 11.121,9.707 "/>
                  </svg>
                </a>
              </div>
            </div>
          </div>
          </div> -->
      </div>
    </div>
    <!-- <div id="success-stories" class="tab_section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading wow fadeInLeft" data-wow-delay="00ms"
              data-wow-duration="1500ms">
              <h2>Success Stories</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="owl-carousel owl-theme" id="testimonial">
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
                  <img src="img/testimonials/testimonials2.jpg" class="img-responsive" alt="Patient 1">
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
            <div class="item">
              <div class="video_testi">
                <div class="video-box" data-toggle="modal" data-target="#videoModal" data-video="https://www.youtube.com/embed/zpOULjyy-n8?autoplay=1">
                  <img src="img/testimonials/testimonials2.jpg" class="img-responsive" alt="Patient 1">
                  <div class="play-btn"><i class="fa fa-play"></i></div>
                </div>
                <div class="video-title">Anita’s Recovery Journey</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div> -->
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
            <div class="section-heading wow fadeInLeft" data-wow-delay="00ms"
              data-wow-duration="1500ms">
              <h2>FAQ</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-7">
            <div class="panel-group" id="faqAccordion">
              <div class="panel panel-default">
                <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq1">
                  <h4 class="panel-title">
                    01. When should I consult a cardiologist specialist?
                    <i class="fa fa-chevron-down"></i>
                  </h4>
                </div>
                <div id="faq1" class="panel-collapse collapse in">
                  <div class="panel-body">
                    You should consult a cardiologist specialist if you experience symptoms that may indicate a heart condition or if you have known cardiac risk factors.
                    <ul class="lists">
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Persistent chest pain or breathlessness</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Palpitations or irregular heartbeat</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>History of heart disease, diabetes, or high blood pressure</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Preventive heart health evaluation</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq2">
                  <h4 class="panel-title">
                    02. What services are available at a cardiology hospital?
                    <i class="fa fa-chevron-down"></i>
                  </h4>
                </div>
                <div id="faq2" class="panel-collapse collapse">
                  <div class="panel-body">
                    A cardiology hospital offers comprehensive diagnostic and treatment services for heart-related conditions using medical and interventional approaches.
                    <ul class="lists">
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Emergency care for heart attacks</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Advanced cardiac imaging and testing</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Interventional procedures such as angioplasty</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Ongoing management of heart disease</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq3">
                  <h4 class="panel-title">
                    03. How do I choose the right heart specialist?
                    <i class="fa fa-chevron-down"></i>
                  </h4>
                </div>
                <div id="faq3" class="panel-collapse collapse">
                  <div class="panel-body">
                    Choosing the right heart specialist depends on clinical expertise, available technology, and the hospital’s approach to patient care.
                    <ul class="lists">
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Experience in treating complex heart conditions</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Access to advanced diagnostic and interventional facilities</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Multidisciplinary cardiac care support</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Clear communication and patient guidance</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq4">
                  <h4 class="panel-title">
                    04. What conditions are treated by a heart doctor?
                    <i class="fa fa-chevron-down"></i>
                  </h4>
                </div>
                <div id="faq4" class="panel-collapse collapse">
                  <div class="panel-body">
                    A heart doctor treats diseases affecting the heart and blood vessels, ranging from common conditions to complex cardiac disorders.
                    <ul class="lists">
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Coronary artery disease</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Heart valve problems</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Heart rhythm abnormalities</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Cardiomyopathies and heart failure</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq5">
                  <h4 class="panel-title">
                    05. When should I consult a chest pain doctor?
                    <i class="fa fa-chevron-down"></i>
                  </h4>
                </div>
                <div id="faq5" class="panel-collapse collapse">
                  <div class="panel-body">
                    Chest pain should always be evaluated promptly, as it can be a symptom of a serious heart condition.
                    <ul class="lists">
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Sudden or severe chest discomfort which gets worse with exertion</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Pain spreading to the arm, jaw, or back</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Chest pain with sweating or breathlessness light headedness</span>
                      </li>
                      <li>
                        <svg class="cs_accent_color" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.0097 25.9988C8.06573 25.9993 3.50673 23.1663 1.32323 18.7073C-0.886265 14.1938 -0.217265 8.56483 2.98873 4.70033C6.19124 0.839828 11.3977 -0.844672 16.2517 0.408828C16.7862 0.546828 17.1077 1.09233 16.9702 1.62733C16.8322 2.16233 16.2862 2.48333 15.7517 2.34583C11.6457 1.28533 7.23874 2.71033 4.52823 5.97783C1.81624 9.24733 1.25023 14.0098 3.11974 17.8288C4.98223 21.6328 9.09073 24.1108 13.3077 23.9958C17.5242 23.8808 21.3507 21.3163 23.0562 17.4628C24.0577 15.1998 24.2697 12.6373 23.6522 10.2468C23.5142 9.71233 23.8357 9.16683 24.3707 9.02833C24.9042 8.88983 25.4507 9.21183 25.5892 9.74683C26.3182 12.5713 26.0687 15.5993 24.8857 18.2723C22.8697 22.8273 18.3462 25.8588 13.3627 25.9948C13.2447 25.9973 13.1267 25.9988 13.0097 25.9988Z" fill="#f58220"></path>
                          <path d="M12.9999 16.1171C12.7439 16.1171 12.4879 16.0196 12.2929 15.8241C11.9024 15.4336 11.9024 14.8006 12.2929 14.4101L24.2929 2.41006C24.6829 2.01956 25.3169 2.01956 25.7069 2.41006C26.0974 2.80056 26.0974 3.43356 25.7069 3.82406L13.7069 15.8241C13.5119 16.0191 13.2559 16.1171 12.9999 16.1171Z" fill="#f58220"></path>
                          <path d="M13.0002 16.1174C12.7442 16.1174 12.4882 16.0199 12.2932 15.8244L8.05069 11.5819C7.66019 11.1914 7.66019 10.5584 8.05069 10.1679C8.44069 9.77737 9.07469 9.77737 9.46469 10.1679L13.7072 14.4104C14.0977 14.8009 14.0977 15.4339 13.7072 15.8244C13.5122 16.0194 13.2562 16.1174 13.0002 16.1174Z" fill="#f58220"></path>
                        </svg>
                        <span>Recurrent or unexplained chest pain</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
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
                    <h5>If you or a loved one is experiencing heart-related symptoms or requires specialised cardiac evaluation, our experts are here to help.</h5>
                    <h2>Book an appointment today for timely diagnosis and personalised heart care.</h2>
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