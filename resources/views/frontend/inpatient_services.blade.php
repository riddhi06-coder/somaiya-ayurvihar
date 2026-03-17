
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
                        <li class="active">Inpatient Services</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>


        <section class="section-wrap inpatient_services_wrap">
            <div class="container">
                <div class="row">
                <div class="col-md-4">
                    <div class="content-img">
                    <img src="{{ asset('frontend/assets/img/patient-services/inpatient-services/inpatient-services.jpg') }}" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="content">
                    <p>K.J. Somaiya Hospital & Research Centre offers reliable, compassionate, and well-coordinated inpatient care for patients requiring medical or surgical treatment. Our inpatient services are designed to support patients through every stage of hospitalisation, combining clinical expertise with comfort, safety, and affordability.</p>
                    <p>The hospital comprises a <b>550-bed General Hospital</b> and a <b>56-bed Super-Specialty Hospital</b>, supported by modern infrastructure and thoughtfully designed patient rooms. From general wards to fully equipped intensive care units, we ensure that every patient receives appropriate care in a setting that matches their medical needs and financial considerations.</p>
                    </div>
                </div>
                </div>
                <div class="row admission-process-row">
                <div class="col-md-12">
                    <div class="content">
                    <h5>Admission Process:</h5>
                    <p>The admission process at K.J. Somaiya Hospital & Research Centre is streamlined to ensure timely care and minimal stress for patients and families.</p>
                    <ul class="lists">
                        <li>
                        <span>The treating doctor assesses the patient during an OPD visit or in the Emergency (Casualty) department and recommends hospital admission when clinically necessary.</span>
                        </li>
                        <li>
                        <span>Admissions may be emergency or immediate for critically ill patients, or elective for planned procedures and non-emergency treatments.</span>
                        </li>
                        <li>
                        <span>Wherever feasible, patients and their relatives are counselled in advance regarding:</span>
                        </li>
                    </ul>
                    <ul class="sub_list">
                        <li>The proposed treatment plan</li>
                        <li>Required documents</li>
                        <li>Expected duration of hospital stay</li>
                        <li>Approximate cost of treatment</li>
                        <li>Available payment or insurance options</li>
                    </ul>
                    <p><i>Please note: Treatment estimates may vary depending on the condition's complexity and unforeseen clinical developments.</i></p>
                    <ul class="lists">
                        <li>
                        <span> The doctor issues an admission note, which must be submitted to the Registration or Admission Department.</span>
                        </li>
                        <li>
                        <span> On the scheduled date, the patient or attendant reports to the Admission Counter to complete formalities, pay the applicable deposit, and generate the indoor admission file.</span>
                        </li>
                        <li>
                        <span> Critically ill patients receive immediate medical attention, while relatives complete admission procedures simultaneously.</span>
                        </li>
                        <li>
                        <span> One attendant is mandatory throughout the hospital stay. An attendant pass is issued and must be presented when required.</span>
                        </li>
                    </ul>
                    </div>
                </div>
                </div>
                <div class="row inpatient-row">
                <div class="col-md-6">
                    <div class="content">
                    <h5>Documents Required for Admission</h5>
                    <p>To ensure a smooth admission process, patients or attendants are advised to carry the following documents:</p>
                    <ul class="lists">
                        <li>
                        <span> Valid photo identity proof (Aadhaar Card, Voter ID, Passport, or Driving Licence)</span>
                        </li>
                        <li>
                        <span> Insurance policy document or insurance card for cashless admissions</span>
                        </li>
                        <li>
                        <span> Doctor’s admission note</span>
                        </li>
                        <li>
                        <span> Previous and current medical records, including prescriptions and investigation reports</span>
                        </li>
                        <li>
                        <span> Additional documentation may be required for patients admitted under <b>RGJAY, BPL, or Weaker Section schemes.</b></span>
                        </li>
                    </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content-img">
                    <img src="{{ asset('frontend/assets/img/patient-services/inpatient-services/document-required.webp') }}" class="img-responsive">
                    </div>
                </div>
                </div>
                <div class="row inpatient-row">
                <div class="col-md-6">
                    <div class="content-img discharge-img">
                    <img src="{{ asset('frontend/assets/img/patient-services/inpatient-services/discharge-process.webp') }}" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content">
                    <h5>Discharge Process</h5>
                    <p>The discharge process is planned to ensure continuity of care and clarity for patients and families.</p>
                    <ul class="lists">
                        <li>
                        <span> The treating doctor prepares the discharge note once the patient is medically fit for discharge.</span>
                        </li>
                        <li>
                        <span> The patient or attendant reports to the Registration Desk with the discharge note to settle all dues and return visitor and attendant passes.</span>
                        </li>
                        <li>
                        <span> After financial and administrative clearance, ward staff assist in completing the discharge formalities.</span>
                        </li>
                        <li>
                        <span> The patient receives:</span>
                        </li>
                    </ul>
                    <ul class="sub_list">
                        <li>A detailed discharge summary</li>
                        <li>Relevant investigation reports</li>
                    </ul>
                    <p>The standard discharge process typically takes <b>2 to 4 hours.</b></p>
                    <p>Discharges under the <b>Cashless Insurance, RGJAY, BPL, and Weaker Section schemes</b> may involve additional procedures, which hospital staff explain to avoid confusion or delays.</p>
                    </div>
                </div>
                </div>
            </div>
        </section>


        <section class="section-wrap inpatient_services_two">
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <div class="content">
                <h5>Rooms & Tariff Plan Details</h5>
                <h6>Teaching Hospital</h6>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-3">
                <div class="hospital-iconbox">
                <div class="iconbox-icon">
                    <span>01</span>
                </div>
                <h4>General Ward</h4>
                <ul class="lists">
                    <li>
                    <span> Spacious, well-ventilated wards</span>
                    </li>
                    <li>
                    <span> Prompt and attentive nursing care</span>
                    </li>
                    <li>
                    <span> Economical medical and surgical services</span>
                    </li>
                    <li>
                    <span> Separate dressing rooms in surgical wards</span>
                    </li>
                </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="hospital-iconbox">
                <div class="iconbox-icon">
                    <span>02</span>
                </div>
                <h4>Sunidhi General Ward</h4>
                <ul class="lists">
                    <li>
                    <span> Donated by the Sunidhi Trust</span>
                    </li>
                    <li>
                    <span> Well-ventilated and spacious layout</span>
                    </li>
                    <li>
                    <span> Dedicated nursing support</span>
                    </li>
                    <li>
                    <span> Located close to the ICU for quick access</span>
                    </li>
                </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="hospital-iconbox">
                <div class="iconbox-icon">
                    <span>03</span>
                </div>
                <h4>Sunidhi Semi-Special Ward</h4>
                <ul class="lists">
                    <li>
                    <span> Individual patient spaces with privacy curtains</span>
                    </li>
                    <li>
                    <span> Well-ventilated environment</span>
                    </li>
                    <li>
                    <span> Dedicated nursing staff</span>
                    </li>
                    <li>
                    <span> Proximity to ICU</span>
                    </li>
                    <li>
                    <span> Couch-cum-bed for patient attendant</span>
                    </li>
                </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="hospital-iconbox">
                <div class="iconbox-icon">
                    <span>04</span>
                </div>
                <h4>Sunidhi Special Ward</h4>
                <ul class="lists">
                    <li>
                    <span> Air-conditioned private rooms</span>
                    </li>
                    <li>
                    <span> Dedicated nursing care</span>
                    </li>
                    <li>
                    <span> Close access to the ICU</span>
                    </li>
                    <li>
                    <span> Couch-cum-bed for patient attendant</span>
                    </li>
                </ul>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-6">
                <div class="content">
                <h5>Intensive Care Unit (ICU)</h5>
                <ul class="lists">
                    <li>
                    <span> 8-bed, fully air-conditioned ICU</span>
                    </li>
                    <li>
                    <span> 24×7 availability of attending physician or intensivist</span>
                    </li>
                    <li>
                    <span> Dedicated critical care nursing staff</span>
                    </li>
                    <li>
                    <span> Individual bedside monitors with central monitoring</span>
                    </li>
                    <li>
                    <span> Equipped with 3 ventilators</span>
                    </li>
                </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="content">
                <h5>Tariff Notes</h5>
                <ul class="lists">
                    <li>
                    <span> Tariffs include room charges and patient meals (breakfast, lunch, and dinner)</span>
                    </li>
                    <li>
                    <span> Costs of investigations, procedures, medicines, and smart card charges are excluded</span>
                    </li>
                    <li>
                    <span> Surgical admissions require an additional surgical deposit based on the room category</span>
                    </li>
                    <li>
                    <span> Hospital management reserves the right to revise tariffs without prior notice</span>
                    </li>
                </ul>
                </div>
            </div>
            </div>
        </div>
        </section>


        <section class="section-wrap inpatient_services_three">
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <div class="content">
                <h5>Super-Specialty Hospital</h5>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-3">
                <div class="hospital-iconbox">
                <div class="iconbox-icon">
                    <span>01</span>
                </div>
                <h4>Twin Room</h4>
                <ul class="lists">
                    <li>
                    <span> Twin-sharing accommodation</span>
                    </li>
                    <li>
                    <span> Individual television units</span>
                    </li>
                    <li>
                    <span> Attached bathroom</span>
                    </li>
                    <li>
                    <span> Privacy curtains</span>
                    </li>
                    <li>
                    <span> Couch for attendant</span>
                    </li>
                    <li>
                    <span> Scenic external view</span>
                    </li>
                </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="hospital-iconbox">
                <div class="iconbox-icon">
                    <span>02</span>
                </div>
                <h4>Single / HDU</h4>
                <ul class="lists">
                    <li>
                    <span> Single-bed accommodation</span>
                    </li>
                    <li>
                    <span> Television and attached bathroom</span>
                    </li>
                    <li>
                    <span> Couch for attendant</span>
                    </li>
                    <li>
                    <span> Scenic external view</span>
                    </li>
                </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="hospital-iconbox">
                <div class="iconbox-icon">
                    <span>03</span>
                </div>
                <h4>Single Deluxe</h4>
                <ul class="lists">
                    <li>
                    <span> Premium single-bed room</span>
                    </li>
                    <li>
                    <span> Television and attached bathroom</span>
                    </li>
                    <li>
                    <span> Couch for attendant</span>
                    </li>
                    <li>
                    <span> Scenic external view</span>
                    </li>
                </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="hospital-iconbox">
                <div class="iconbox-icon">
                    <span>04</span>
                </div>
                <h4>ICU</h4>
                <ul class="lists">
                    <li>
                    <span> Single-bed ICU rooms</span>
                    </li>
                    <li>
                    <span> Individual lockers</span>
                    </li>
                    <li>
                    <span> Relative waiting area with seating</span>
                    </li>
                </ul>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
                <div class="content">
                <h5>Day Care Facility</h5>
                <ul class="lists">
                    <li>
                    <span> Ward beds with curtain partitions</span>
                    </li>
                    <li>
                    <span> Seating arrangement for the patient’s relatives</span>
                    </li>
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
                        01. What is inpatient care, and when is hospital admission required?
                        <i class="fa fa-chevron-down"></i>
                    </h4>
                    </div>
                    <div id="faq1" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <p>Inpatient care at K.J. Somaiya Hospital & Research Centre involves medical treatment that requires a patient to stay in the hospital for close monitoring, specialised care, or surgical intervention.</p>
                        <ul class="lists">
                        <li>
                        
                            <span>Admission is recommended when a patient needs continuous medical supervision</span>
                        </li>
                        <li>
                        
                            <span>It may be planned in advance or done on an emergency basis</span>
                        </li>
                        <li>
                        
                            <span>The treating doctor at K.J. Somaiya Hospital & Research Centre determines the need for admission after a detailed clinical evaluation</span>
                        </li>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq2">
                    <h4 class="panel-title">
                        02. How long does the hospital discharge process usually take?
                        <i class="fa fa-chevron-down"></i>
                    </h4>
                    </div>
                    <div id="faq2" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>At K.J. Somaiya Hospital & Research Centre, the discharge process is structured to ensure patient safety, clarity, and continuity of care.</p>
                        <ul class="lists">
                        <li>
                        
                            <span>Routine discharges generally take 2 to 4 hours</span>
                        </li>
                        <li>
                        
                            <span>This includes medical clearance, billing settlement, and documentation</span>
                        </li>
                        <li>
                        
                            <span>Discharges under insurance or government health schemes at K.J. Somaiya Hospital & Research Centre may require additional processing time</span>
                        </li>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq3">
                    <h4 class="panel-title">
                        03. What documents are needed for hospital admission?
                        <i class="fa fa-chevron-down"></i>
                    </h4>
                    </div>
                    <div id="faq3" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>To ensure a smooth admission experience at K.J. Somaiya Hospital & Research Centre, patients and attendants should carry the required documents in advance.</p>
                        <ul class="lists">
                        <li>
                        
                            <span>Valid government-issued photo ID</span>
                        </li>
                        <li>
                        
                            <span>Doctor’s admission note issued by K.J. Somaiya Hospital & Research Centre or a referring consultant</span>
                        </li>
                        <li>
                        
                            <span>Previous medical records, prescriptions, and investigation reports</span>
                        </li>
                        <li>
                        
                            <span>Insurance or scheme-related documents for cashless or subsidised admissions</span>
                        </li>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq4">
                    <h4 class="panel-title">
                        04. Are different room categories available for admitted patients?
                        <i class="fa fa-chevron-down"></i>
                    </h4>
                    </div>
                    <div id="faq4" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Yes, K.J. Somaiya Hospital & Research Centre offers a range of room options to suit different medical needs and patient preferences</p>
                        <ul class="lists">
                        <li>
                        
                            <span>General wards, semi-special wards, special rooms, and deluxe rooms are available</span>
                        </li>
                        <li>
                        
                            <span>ICU and HDU facilities are provided for patients requiring critical care</span>
                        </li>
                        <li>
                        
                            <span>Room selection at K.J. Somaiya Hospital & Research Centre may depend on clinical condition, availability, and tariff category</span>
                        </li>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq5">
                    <h4 class="panel-title">
                        05. Can a family member stay with the patient during hospitalisation?
                        <i class="fa fa-chevron-down"></i>
                    </h4>
                    </div>
                    <div id="faq5" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Patient comfort and emotional support are prioritised at K.J. Somaiya Hospital & Research Centre.</p>
                        <ul class="lists">
                        <li>
                        
                            <span>One attendant is mandatory for every admitted patient</span>
                        </li>
                        <li>
                        
                            <span>An attendant pass is issued at the time of admission at K.J. Somaiya Hospital & Research Centre</span>
                        </li>
                        <li>
                        
                            <span>Many room categories include seating or couch-cum-bed facilities for the attendant</span>
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