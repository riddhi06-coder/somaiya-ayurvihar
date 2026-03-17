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
                        <li class="active">Visitor Guide</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>


        <section class="section-wrap visitor_guide_wrap">
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <div class="content">
                    <h5>Visitor Information</h5>
                    <p>A calm, respectful, and supportive environment plays a vital role in a patient's recovery and overall well-being. To help us maintain a safe and healing atmosphere, we request that all visitors kindly follow the hospital's visitor policies. Your cooperation ensures comfort not only for patients but also for caregivers, fellow visitors, and our healthcare team.</p>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <div class="content">
                    <h5>Visiting Hours</h5>
                    <p>To balance patient rest and family interaction, visiting hours are defined as follows:</p>
                    </div>
                </div>
                </div>
                <div class="row visitor-hours-row">
                <div class="col-md-4">
                    <div class="visitor-hours">
                    <div class="num">01</div>
                    <h6>General Hospital</h6>
                    <p>Monday to Friday & Sunday: 5:00 p.m. to 7:00 p.m. <br>
                        Saturday: 4:00 p.m. to 7:00 p.m</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="visitor-hours">
                    <div class="num">02</div>
                    <h6>Super-Speciality Hospital</h6>
                    <p>Morning: 10:00 a.m. to 11:00 a.m.<br>
                        Evening: 4:00 p.m. to 6:00 p.m.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="visitor-hours">
                    <div class="num">03</div>
                    <h6>Intensive Care Units (ICU)</h6>
                    <p>Morning: 10:30 a.m. to 11:30 a.m.<br>
                        Evening: 5:00 p.m. to 6:00 p.m.</p>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <div class="content">
                    <p>Please note: Visiting hours may be revised at the discretion of hospital authorities if required in the best interest of patient care.</p>
                    </div>
                </div>
                </div>
            </div>
        </section>


        <section class="section-wrap visitor_guide_wrap_two">
            <div class="container-fluid">
                <div class="row">
                <div class="col-md-6 no-padding">
                    <div class="content">
                    <h5>Visitor & Attendant Pass Policy</h5>
                    <p>To ensure patient safety and regulated access to inpatient areas, the following pass guidelines are followed:</p>
                    <ul class="lists">
                        <li> <span> One attendant pass is issued per patient at the time of admission.</span></li>
                        <li> <span> One visitor pass may be issued in addition to the attendant pass. (A refundable deposit is applicable for all passes.)</span></li>
                        <li> <span> The designated attendant must remain with the patient throughout the hospital stay.</span></li>
                        <li> <span> Visitors are allowed only during approved visiting hours.</span></li>
                        <li> <span> A maximum of two individuals, including the attendant and visitor, are permitted with the patient at any given time.</span></li>
                        <li> <span> Security personnel may verify visitor and attendant passes while entering inpatient zones.</span></li>
                        <li> <span> All issued passes must be returned at the time of patient discharge.</span></li>
                        <li> <span> Entry into ICUs is strictly regulated and allowed only with prior approval from ICU staff to protect critically ill patients.</span></li>
                    </ul>
                    </div>
                </div>
                <div class="col-md-6 no-padding">
                    <div class="content-img">
                    <img src="{{ asset('frontend/assets/img/patient-services/visitor-guide-img.jpg') }}" class="img-responsive">
                    </div>
                </div>
                </div>
            </div>
        </section>


        <section class="section-wrap visitor_guide_wrap_three">
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <div class="content">
                    <h5>Guidelines for Visitors</h5>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="content thing-do-content">
                    <h6>Things to Do</h6>
                    <ul class="lists">
                        <li><span> Keep mobile phones switched off or on silent mode during visits.</span></li>
                        <li><span> Confirm the patient’s comfort and consent before planning a visit.</span></li>
                        <li><span> Wash and sanitize hands before touching the patient or their personal belongings.</span></li>
                        <li><span> Step out of the room when doctors or nursing staff arrive for patient care.</span></li>
                        <li><span> Maintain a polite, respectful, and cooperative attitude with hospital staff and other patients.</span></li>
                        <li><span> Keep your personal belongings safe at all times.</span></li>
                        <li><span> Contact the designated hospital authority for any assistance or concerns.</span></li>
                    </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content thing-do-content">
                    <h6>Things to Avoid</h6>
                    <ul class="lists">
                        <li><span> Spending extended periods in the patient’s room.</span></li>
                        <li><span> Bringing outside food, fruits, or beverages into the hospital premises. (Nutritious vegetarian meals are provided as per medical guidance.)</span></li>
                        <li><span> Visiting if you are unwell or showing symptoms of an infectious illness.</span></li>
                        <li><span> Offering gifts, tips, or gratuities to hospital staff.</span></li>
                        <li><span> Photography or videography anywhere within the hospital premises.</span></li>
                        <li><span> Smoking, consuming alcohol, carrying non-vegetarian food, or prohibited substances.</span></li>
                        <li><span> Bringing flowers, bouquets, or gifts for patients.</span></li>
                        <li><span> Engaging in activities that may disturb others, such as loud conversations, playing music, littering, or unsafe behaviour.</span></li>
                        <li><span> Bringing children as visitors.</span></li>
                    </ul>
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
                            01. What are the visiting hours at the hospital?
                            <i class="fa fa-chevron-down"></i>
                        </h4>
                        </div>
                        <div id="faq1" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <p>The hospital follows structured visiting hours for general wards, super-speciality units, and ICUs to help patients rest comfortably while allowing families to stay connected, ensuring care is delivered smoothly and without disruption.</p>
                            <ul class="lists">
                            <li><span> Separate time slots are available for morning and evening visits.</span></li>
                            <li><span> ICU visits are restricted and closely monitored.</span></li>
                            <li><span> Visiting hours may be modified based on the patient's condition or hospital protocols.</span></li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq2">
                        <h4 class="panel-title">
                            02. How many visitors are allowed per patient?
                            <i class="fa fa-chevron-down"></i>
                        </h4>
                        </div>
                        <div id="faq2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>To maintain safety and comfort, the hospital limits the number of people who can accompany a patient.</p>
                            <ul class="lists">
                            <li><span> One attendant pass is issued at admission.</span></li>
                            <li><span> One additional visitor pass may be provided.</span></li>
                            <li><span> Only two individuals are allowed with the patient at a time.</span></li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq3">
                        <h4 class="panel-title">
                            03. Are visitors allowed in the ICU?
                            <i class="fa fa-chevron-down"></i>
                        </h4>
                        </div>
                        <div id="faq3" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>ICU visits are strictly regulated to protect critically ill patients and maintain a controlled environment.</p>
                            <ul class="lists">
                            <li><span> Entry is permitted only during designated visiting hours.</span></li>
                            <li><span> Prior approval from ICU staff is mandatory.</span></li>
                            <li><span> Access may be restricted based on the patient's medical condition.</span></li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq4">
                        <h4 class="panel-title">
                            04. Is a visitor or attendant pass mandatory?
                            <i class="fa fa-chevron-down"></i>
                        </h4>
                        </div>
                        <div id="faq4" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>Yes, all visitors and attendants must carry a valid hospital-issued pass.</p>
                            <ul class="lists">
                            <li><span> Passes are issued against a refundable deposit.</span></li>
                            <li><span> Security staff may verify passes at inpatient entry points.</span></li>
                            <li><span> All passes must be returned at the time of discharge.</span></li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq5">
                        <h4 class="panel-title">
                            05. Are food items or gifts allowed for patients?
                            <i class="fa fa-chevron-down"></i>
                        </h4>
                        </div>
                        <div id="faq5" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>To ensure patient safety and hygiene, certain items are restricted within hospital premises.</p>
                            <ul class="lists">
                            <li><span> Outside food, fruits, and beverages are not permitted.</span></li>
                            <li><span> Flowers, bouquets, and gifts are not allowed.</span></li>
                            <li><span> The hospital provides nutritionally balanced vegetarian meals as advised by doctors.</span></li>
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