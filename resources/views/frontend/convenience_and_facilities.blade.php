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
                        <li>Patient Services</li>
                        <li class="active">Convenience & Facilities</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>


        <section class="section-wrap convenience_facilities_wrap">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="content">
                  <p>At <b>K.J. Somaiya Hospital & Research Centre,</b> we understand that a patient’s healing experience is supported not just by medical care, but also by everyday comforts. Our hospital provides essential facilities designed to make the stay of patients, caregivers, and visitors as smooth and stress-free as possible while on campus in <b>Mumbai.</b></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="content">
                  <h5>Cafeteria</h5>
                  <p>The hospital cafeteria offers hygienically prepared <b>vegetarian meals,</b> ensuring nutritious, wholesome options for patients, attendants, and visitors.</p>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="icon-box">
                  <div class="icon-circle">
                    <img src="{{ asset('frontend/assets/img/icon/timing.svg') }}">
                  </div>
                  <h4>Timings</h4>
                  <p>7:00 a.m. to 7:00 p.m</p>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="icon-box">
                  <div class="icon-circle">
                    <img src="{{ asset('frontend/assets/img/icon/food-parcel.svg') }}">
                  </div>
                  <h4>Food Parcel Service</h4>
                  <p>7:00 p.m. to 1:00 a.m. (available through the parcel dispensing window)</p>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="icon-box">
                  <div class="icon-circle">
                    <img src="{{ asset('frontend/assets/img/icon/location.svg') }}">
                  </div>
                  <h4>Location</h4>
                  <p>Ground Floor, College Building</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="content">
                  <h5>ATM Facility</h5>
                  <p>For added convenience, an <b>ATM facility operated by Bank of Baroda</b> is available within the hospital premises, allowing patients and visitors to access cash without leaving the campus.</p>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="icon-box">
                  <div class="icon-circle">
                    <img src="{{ asset('frontend/assets/img/icon/location.svg') }}">
                  </div>
                  <h4>Location</h4>
                  <p>Ground Floor, Extension Building</p>
                </div>
              </div>
              <div class="col-sm-8"></div>
              <div class="col-sm-12">
                <div class="content">
                  <p>Please note: While the hospital facilitates the presence of the ATM, any transaction or service-related concerns are managed directly by the respective bank.</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="content">
                  <h5>Pharmacy – 24x7</h5>
                  <p>An <b>FDA-approved in-house pharmacy</b> functions round the clock to ensure uninterrupted access to prescribed medicines and healthcare essentials, even during emergencies or late hours.</p>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="icon-box">
                  <div class="icon-circle">
                    <img src="{{ asset('frontend/assets/img/icon/timing.svg') }}">
                  </div>
                  <h4>Timings</h4>
                  <p>Open 24 hours, all days</p>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="icon-box">
                  <div class="icon-circle">
                    <img src="{{ asset('frontend/assets/img/icon/location.svg') }}">
                  </div>
                  <h4>Location</h4>
                  <p>Ground Floor, Hospital Building</p>
                </div>
              </div>
              
              <div class="col-sm-4"></div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="content">
                  <h5>Internet / Wi-Fi</h5>
                  <p>At present, <b>internet and Wi-Fi services are not available</b> for patients, attendants, or visitors within the General Hospital premises.</p>
                </div>
              </div>
            </div>
          </div>
        </section>


        <section class="section-wrap faq_page">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <div class="content wow fadeInLeft" data-wow-delay="00ms"
                    data-wow-duration="1500ms">
                    <h5>Frequently Asked Questions</h5>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-7">
                  <div class="panel-group" id="faqAccordion">
                    <div class="panel panel-default">
                      <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq1">
                        <h4 class="panel-title">
                          01. What facilities are usually available for patients and attendants in hospitals in Mumbai?
                          <i class="fa fa-chevron-down"></i>
                        </h4>
                      </div>
                      <div id="faq1" class="panel-collapse collapse in">
                        <div class="panel-body">
                          <p>Most multi-specialty hospitals in Mumbai provide essential facilities to support patients and their caregivers during treatment and recovery. These facilities are designed to reduce inconvenience, especially during long hospital stays.</p>
                          <ul class="lists">
                            <li><span> In-house cafeterias or food services</span>
                            </li>
                            <li><span> 24×7 pharmacy access for medicines</span>
                            </li>
                            <li><span> ATM facilities within or near the hospital premises</span>
                            </li>
                            <li><span> Waiting areas for attendants and visitors</span>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq2">
                        <h4 class="panel-title">
                          02. Do hospitals in Mumbai offer 24×7 pharmacy services for emergency needs?
                          <i class="fa fa-chevron-down"></i>
                        </h4>
                      </div>
                      <div id="faq2" class="panel-collapse collapse">
                        <div class="panel-body">
                          <p>Yes, many hospitals in Mumbai operate round-the-clock pharmacies to ensure uninterrupted access to medicines, particularly during emergencies or late-night admissions. This helps patients avoid the need to search for medical stores outside the hospital campus</p>
                          <ul class="lists">
                            <li><span> Continuous availability of prescribed medicines</span>
                            </li>
                            <li><span> Useful for emergency admissions and critical care</span>
                            </li>
                            <li><span> Saves time during urgent situations</span>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq3">
                        <h4 class="panel-title">
                          03. Are ATM facilities commonly available inside hospital campuses in Mumbai?
                          <i class="fa fa-chevron-down"></i>
                        </h4>
                      </div>
                      <div id="faq3" class="panel-collapse collapse">
                        <div class="panel-body">
                          <p>Several hospitals in Mumbai offer on-site ATMs to help patients and visitors manage cash without leaving the premises. These ATMs are typically operated by national or private sector banks.</p>
                          <ul class="lists">
                            <li><span> Convenient access to cash during hospital visits</span>
                            </li>
                            <li><span> Reduces dependency on nearby commercial areas</span>
                            </li>
                            <li><span> The respective bank handles bank-related issues</span>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq4">
                        <h4 class="panel-title">
                          04. What are the cafeteria timings at K.J. Somaiya Hospital, Mumbai?
                          <i class="fa fa-chevron-down"></i>
                        </h4>
                      </div>
                      <div id="faq4" class="panel-collapse collapse">
                        <div class="panel-body">
                          <p>The cafeteria operates throughout the day to accommodate the needs of hospital visitors. Regular dining services are available from morning to evening, with extended parcel services at night.</p>
                          <ul class="lists">
                            <li><span> Dine-in service from 7:00 a.m. to 7:00 p.m.</span>
                            </li>
                            <li><span> Parcel-only service from 7:00 p.m. to 1:00 a.m.</span>
                            </li>
                            <li><span> Located on the Ground Floor of the College Building</span>
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
        </section>


        @include('components.frontend.footer')
        
        @include('components.frontend.main-js')

  </body>
</html>