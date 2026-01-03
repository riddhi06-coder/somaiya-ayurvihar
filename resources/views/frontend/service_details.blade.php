
<!DOCTYPE html>
<html lang="en">
    <head>
        @include('components.frontend.head')

    </head>
  <body>


  


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


        <!-- Tabs -->

        <!--  <div id="sticky-anchor"></div> -->
        <div class="apollo-tabs-wrapper">
        <div class="apollo-tabs" id="apolloTabs">
            <button class="tab-arrow left" type="button">&#10094;</button>
            <ul class="nav nav-tabs tab-scroll">
            <!-- <li class="active"><a href="javascript:void(0)" data-target="overview">Overview</a></li>
                <li><a href="javascript:void(0)" data-target="our-services">Services</a></li>
                <li><a href="javascript:void(0)" data-target="facilities">Facilities & Treatment</a></li>
                <li><a href="javascript:void(0)" data-target="doctors">Expert Doctors Team</a></li>
                <li><a href="javascript:void(0)" data-target="technology">Technology</a></li>
                <li><a href="javascript:void(0)" data-target="health-packages">Health Check Packages</a></li>
                <li><a href="javascript:void(0)" data-target="insurance">Insurance Information</a></li>
                <li><a href="javascript:void(0)" data-target="international">International Patients</a></li>
                <li><a href="javascript:void(0)" data-target="testimonials">Patient Testimonials</a></li>
                <li><a href="javascript:void(0)" data-target="success-stories">Success Stories</a></li>
                <li><a href="javascript:void(0)" data-target="faq">General FAQ</a></li> -->
            <!-- new tabs -->
            <li class="active"><a href="javascript:void(0)" data-target="overview">Cardiology</a></li>
            <li><a href="javascript:void(0)" data-target="doctors">Expert Doctors Team</a></li>
            <li><a href="javascript:void(0)" data-target="our-services">Services & Facilities</a></li>
            <li><a href="javascript:void(0)" data-target="health-packages">Cardio Health Packages</a></li>
            <li><a href="javascript:void(0)" data-target="make-special">What Makes Us Special</a></li>
            <li><a href="javascript:void(0)" data-target="testimonials">Feedback and Review</a></li>
            <li><a href="javascript:void(0)" data-target="announcements">Announcements</a></li>
            <li><a href="javascript:void(0)" data-target="blogs">Blogs</a></li>
            <li><a href="javascript:void(0)" data-target="faq">FAQ</a></li>
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
                    <li class="active">Cardiology</li>
                </ol>
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
                <img src="img/medical-services/cardiology/cardiology-overview.jpg" class="img-responsive">
                </div>
            </div>
            <div class="col-md-6">
                <div class="services-content">
                <div class="section-heading wow fadeInLeft" data-wow-delay="00ms"
                    data-wow-duration="1500ms">
                    <h2>Cardiology</h2>
                </div>
                <p>At the K.J. Somaiya Super Speciality Centre, we strive to address the significant burden of
                    cardiovascular diseases through our innovative and cost-effective patient care approach. Our
                    doctors, nurses, technicians, and paramedics unite to deliver unparalleled excellence in patient
                    care, education, and research. As a patient-focused centre, our mission is to serve patients and
                    facilitate their recovery through a comprehensive approach
                </p>
                <p>Our Interventional Cardiology team is available 24/7 to assist patients with cardiac emergencies
                    such as acute myocardial infarction (MI), which may require primary (PAMI) and complex
                    coronary angioplasties (stenting).
                </p>
                <p>We also specialise in structural heart disease interventional procedures, including percutaneous
                    valvular interventions like aortic valve replacement (TAVI), transcatheter mitral valve
                    replacement (TMVR), ASD, VSD, PDA defect device closure interventions, and more.
                </p>
                </div>
            </div>
            </div>
            <div class="row overview-para">
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
            </div>
        </div>
        </div>



        <div id="doctors" class="tab_section">
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <div class="section-heading wow fadeInLeft" data-wow-delay="00ms"
                data-wow-duration="1500ms">
                <h2>Expert Doctors Team</h2>
                </div>
            </div>
            </div>
            <div class="row">
            <!-- Doctor 1 -->
            <div class="col-md-12">
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
    </div>



    <div id="our-services" class="tab_section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="opd-timing-content">
              <div class="section-heading wow fadeInLeft" data-wow-delay="00ms"
                data-wow-duration="1500ms">
                <h2>Services & Facilities</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="ourservices_img">
              <img src="">
            </div>
            <div class="ourservices_content">
              <p>Our highly qualified team of cardiologists, along with the latest technology, ensures the best possible care for a wide spectrum of heart diseases as listed below</p>
              <ul class="listing">
                <li><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>Coronary Angiography / Cardiac Cath</li>
                <li><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>Coronary Angioplasty, including complex angioplasties like chronic total occlusion (CTO), calcium-modifying techniques like ROTA ABLATION, ORBITAL ATHERECTOMY</li>
                <li><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>Percutaneous Valvular Interventions, including</li>
                <li><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>Balloon Mitral Valvulotomy (BMV)</li>
                <li><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>Balloon Aortic Valvulotomy(BAV)</li>
                <li><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>Balloon Pulmonary valvotomy (BPV)</li>
                <li><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>Percutaneous aortic valve replacement (TAVI)</li>
                <li><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>Percutaneous mitral valve replacement (TMVR)</li>
                <li><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>Percutaneous aortic aneurysm repair by stent grafts (TEVAR)</li>
                <li><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>Device closure of congenital cardiac defects. (ASD, VSD, PDA, RSOV device closures)</li>
                <li><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>Renal angioplasty & carotid angioplasty</li>
                <li><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>Peripheral angioplasty</li>
                <li><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>IVC filter & Pulmonary Embolectomy</li>
                <li><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>Septal ablation for HOCM</li>
              </ul>
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



    <div id="make-special" class="tab_section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="opd-timing-content">
              <div class="section-heading wow fadeInLeft" data-wow-delay="00ms"
                data-wow-duration="1500ms">
                <h2>What Makes Us Special</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="insurance-content">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
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
                    01. Are all the consultants available 24 hours?
                    <i class="fa fa-chevron-down"></i>
                  </h4>
                </div>
                <div id="faq1" class="panel-collapse collapse in">
                  <div class="panel-body">
                    Most of our consultants are full-time employees of the hospital; hence, outpatient services are available on all working days. We have senior consultants of repute visiting us with prior appointments. We have doctors in the positions of medical and surgical registrars, junior and senior registrars, and junior and senior residents, thus offering 24 hours coverage in areas such as Casualty, Wards, Intensive Care Units and Post Op recovery areas. Any complaints in the odd hours are first attended to by the resident doctors and, depending upon the case, the respective consultants are called in to attend to the patients.
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq2">
                  <h4 class="panel-title">
                    02. How many attendant passes are issued?
                    <i class="fa fa-chevron-down"></i>
                  </h4>
                </div>
                <div id="faq2" class="panel-collapse collapse">
                  <div class="panel-body">
                    To minimize crowding and noise in the patient care area, only one attendant pass is issued per patient. The pass has to be surrendered at the admission counter at the time of the discharge.
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq3">
                  <h4 class="panel-title">
                    03. What is the procedure for discharge?
                    <i class="fa fa-chevron-down"></i>
                  </h4>
                </div>
                <div id="faq3" class="panel-collapse collapse">
                  <div class="panel-body">
                    Your consultant will make an entry for discharge on your case sheet. After this, the resident doctors prepare the discharge card. Then the file is sent to the IP reception for clearance, after which the final bill is prepared, taking into account all the deposits. When the final bill is ready, payment has to be made at the admission counter. This procedure may take 2-3 hours.
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq4">
                  <h4 class="panel-title">
                    04. Is outside food allowed into the hospital?
                    <i class="fa fa-chevron-down"></i>
                  </h4>
                </div>
                <div id="faq4" class="panel-collapse collapse">
                  <div class="panel-body">
                    We provide food for the patient from the hospital kitchen. Attendants need to make their own arrangements or eat in the cafeteria.
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq5">
                  <h4 class="panel-title">
                    05. Are children allowed to visit the hospital?
                    <i class="fa fa-chevron-down"></i>
                  </h4>
                </div>
                <div id="faq5" class="panel-collapse collapse">
                  <div class="panel-body">
                    Children below 12 years are not allowed to visit the patient.
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