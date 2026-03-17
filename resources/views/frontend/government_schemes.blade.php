
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
                        <li class="active">Government Schemes</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>



        <section class="section-wrap government_schemes_wrap">
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <div class="government_content">
                <h5>Mahatma Jyotiba Phule Jeevandayi Aarogya Yojana (MJPJAY)</h5>
                <p>The <b>Mahatma Jyotiba Phule Jeevandayi Aarogya Yojana (MJPJAY)</b> is a flagship health assurance initiative by the <b>Government of Maharashtra,</b> designed to ensure access to quality healthcare through <b>cashless hospitalisation</b> for eligible families.</p>
                <p>Under this scheme, beneficiaries can avail treatment for <b>971 government-approved medical procedures,</b> including surgeries, advanced therapies, and specialist consultations. The financial coverage extends up to <b>₹1,50,000 per family per year,</b> with enhanced coverage of up to <b>₹2,50,000 for renal transplant procedures,</b> ensuring critical care without financial burden.</p>
                <h5>Eligibility Criteria</h5>
                <p>MJPJAY benefits are available to patients who hold <b>any one</b> of the following valid government-issued ration cards:</p>
                <div class="row">
                    <div class="col-md-3">
                    <div class="eligibility-criteria">
                        <h2><span>A</span>ntyodaya Card</h2>
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="eligibility-criteria">
                        <h2><span>A</span>nnapurna Card</h2>
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="eligibility-criteria">
                        <h2><span>Y</span>ellow Ration Card</h2>
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="eligibility-criteria">
                        <h2><span>O</span>range Ration Card</h2>
                    </div>
                    </div>
                </div>
                <h5>MJPJAY at K.J. Somaiya Hospital & Research Centre</h5>
                <p><b>K.J. Somaiya Hospital & Research Centre, Mumbai,</b> is an <b>empanelled hospital under the MJPJAY scheme,</b> authorised to provide cashless treatment for multiple approved procedures and therapies. Our dedicated team ensures that eligible patients receive timely medical care with complete support throughout the approval and treatment process.</p>
                </div>
            </div>
            </div>
            <div class="row medical-worker-row">
            <div class="col-md-6">
                <div class="government_content">
                <h5>Medical Social Worker / Aarogyamitra Support</h5>
                <p>To ensure a smooth and stress-free experience, trained <b>Aarogyamitras (Medical Social Workers)</b> are available within the hospital premises. They act as a single point of contact for patients and their families, offering end-to-end assistance under the MJPJAY scheme.</p>
                <h6>Role of the Aarogyamitra</h6>
                <ul class="lists">
                    <li>
                    <span> Educating patients and relatives about MJPJAY benefits and coverage</span>
                    </li>
                    <li>
                    <span> Verifying eligibility documents and ration cards</span>
                    </li>
                    <li>
                    <span> Assisting with patient registration and required documentation</span>
                    </li>
                    <li>
                    <span> Facilitating e-preauthorization and claim submission</span>
                    </li>
                    <li>
                    <span> Coordinating between patients, treating doctors, and the insurance authorities </span>
                    </li>
                </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="content-img">
                <img src="{{ asset('frontend/assets/img/patient-services/government-schemes.jpg') }}" class="img-responsive">
                </div>
            </div>
            </div>
            <div class="clear"></div>
            <div class="row">
            <div class="col-md-12">
                <div class="government_content">
                <h5>MJPJAY Process: Step-by-Step Guide</h5>
            </div>
            </div>
            <div class="process-timeline">
                <div class="process-step">
                <div class="step-circle">01</div>
                <div class="step-box">
                    <h4>Hospital Visit</h4>
                    <p>Beneficiary families approach the hospital. The Aarogyamitra stationed at the hospital assists the beneficiary.</p>
                </div>
                </div>
                <div class="process-step">
                <div class="step-circle">02</div>
                <div class="step-box">
                    <h4>Document Verification & Registration</h4>
                    <p>The Aarogyamitra verifies the referral slip and a valid ration card (Yellow, Orange, Antyodaya, or Annapurna). Patient registration is completed, followed by specialist consultation, preliminary investigations, and admission formalities.</p>
                </div>
                </div>
                <div class="process-step">
                <div class="step-circle">03</div>
                <div class="step-box">
                    <h4>E-Preauthorization Submission</h4>
                    <p>Based on the medical diagnosis, the hospital submits an e-preauthorization request to the insurer through the official MJPJAY portal.</p>
                </div>
                </div>
                <div class="process-step">
                <div class="step-circle">04</div>
                <div class="step-box">
                    <h4>Approval Process</h4>
                    <p>The request is reviewed by the insurer and the MJPJAY Society:</p>
                    <ul class="lists">
                    <li>
                        <span> Approval within 24 working hours for routine cases</span>
                    </li>
                    <li>
                        <span> Approval within 24 working hours for routine cases</span>
                    </li>
                    </ul>
                    <p>Preauthorization approval remains valid for 7 days.</p>
                </div>
                </div>
                <div class="process-step">
                <div class="step-circle">05</div>
                <div class="step-box">
                    <h4>Cashless Treatment</h4>
                    <p>Once approved, the patient receives cashless treatment, surgery, or therapy as per the sanctioned package. All treatment and postoperative details are updated on the MJPJAY portal.</p>
                </div>
                </div>
                <div class="process-step">
                <div class="step-circle">06</div>
                <div class="step-box">
                    <h4>Document Submission</h4>
                    <p>After completion of treatment, the hospital submits the required documents, including:</p>
                    <ul class="lists">
                    <li>
                        <span> Original medical bills</span>
                    </li>
                    <li>
                        <span> Investigation and diagnostic reports</span>
                    </li>
                    <li>
                        <span> Case papers</span>
                    </li>
                    <li>
                        <span> Discharge summary signed by the treating doctor</span>
                    </li>
                    <li>
                        <span> Patient satisfaction letter</span>
                    </li>
                    <li>
                        <span> Transport cost acknowledgements (if applicable)</span>
                    </li>
                    </ul>
                </div>
                </div>
                <div class="process-step">
                <div class="step-circle">07</div>
                <div class="step-box">
                    <h4>Claim Settlement</h4>
                    <p>The insurer verifies the documents and settles the claim as per approved package rates through the MJPJAY portal.</p>
                </div>
                </div>
                <div class="process-step">
                <div class="step-circle">08</div>
                <div class="step-box">
                    <h4>Post-Discharge Benefits</h4>
                    <p>As per scheme guidelines, patients are entitled to free follow-up consultation, investigations, and medicines for up to 10 days after discharge.</p>
                </div>
                </div>
            </div>
            </div>
            <hr>
            <div class="row">
            <div class="col-md-12">
                <div class="government_content">
                <h5>Contact Information</h5>
                <h6>MJPJAY / Aarogyamitra Helpdesk</h6>
                <ul class="contact_information">
                    <li><i class="fa fa-map-marker"></i> TPA / MJPJAY Helpdesk, K.J. Somaiya Hospital & Research Centre, Mumbai</li>
                    <li><i class="fa fa-phone"></i> </li>
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
                            01. What is MJPJAY, and who can avail of it?
                            <i class="fa fa-chevron-down"></i>
                        </h4>
                        </div>
                        <div id="faq1" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <p>The Mahatma Jyotiba Phule Jeevandayi Aarogya Yojana (MJPJAY) is a Government of Maharashtra health assurance scheme that offers cashless hospitalisation for eligible families. The scheme is aimed at ensuring access to quality medical care without financial hardship.</p>
                            <p>Eligible beneficiaries include:</p>
                            <ul class="lists">
                            <li>
                                <span> Families residing in Maharashtra with approved ration cards</span>
                            </li>
                            <li>
                                <span> Patients holding Antyodaya, Annapurna, Yellow, or Orange ration cards</span>
                            </li>
                            <li>
                                <span> Individuals requiring treatment for procedures covered under the MJPJAY package list</span>
                            </li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq2">
                        <h4 class="panel-title">
                            02. What treatments and procedures are covered under MJPJAY?
                            <i class="fa fa-chevron-down"></i>
                        </h4>
                        </div>
                        <div id="faq2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>MJPJAY covers a wide range of medical services across multiple specialties, allowing patients to receive comprehensive treatment at empanelled hospitals.</p>
                            <p>The scheme includes coverage for:</p>
                            <ul class="lists">
                            <li>
                                <span> 971 government-approved medical and surgical procedures</span>
                            </li>
                            <li>
                                <span> Major and minor surgeries across specialties</span>
                            </li>
                            <li>
                                <span> Medical therapies and specialist consultations</span>
                            </li>
                            <li>
                                <span> Pre-approved investigations and diagnostics as per package guidelines</span>
                            </li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq3">
                        <h4 class="panel-title">
                            03. What documents are required to avail MJPJAY benefits?
                            <i class="fa fa-chevron-down"></i>
                        </h4>
                        </div>
                        <div id="faq3" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>To initiate treatment under MJPJAY, patients must submit specific documents for eligibility verification and registration at the hospital.</p>
                            <p>The required documents typically include:</p>
                            <ul class="lists">
                            <li>
                                <span> Valid ration card (Yellow, Orange, Antyodaya, or Annapurna)</span>
                            </li>
                            <li>
                                <span> Referral slip, where applicable</span>
                            </li>
                            <li>
                                <span> Government-issued identity proof</span>
                            </li>
                            <li>
                                <span> Any additional medical documents requested during registration</span>
                            </li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq4">
                        <h4 class="panel-title">
                            04. Is treatment under MJPJAY completely cashless?
                            <i class="fa fa-chevron-down"></i>
                        </h4>
                        </div>
                        <div id="faq4" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>Yes, MJPJAY provides cashless treatment for eligible procedures once preauthorization is approved by the insurer and the MJPJAY Society.</p>
                            <p>Cashless benefits include:</p>
                            <ul class="lists">
                            <li>
                                <span> Hospitalisation and treatment as per approved package rates</span>
                            </li>
                            <li>
                                <span> Surgeries, therapies, and inpatient medical care</span>
                            </li>
                            <li>
                                <span> Follow-up consultation, investigations, and medicines for up to 10 days after discharge, as per scheme guidelines</span>
                            </li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq5">
                        <h4 class="panel-title">
                            05. Does K.J. Somaiya Hospital provide support for MJPJAY patients?
                            <i class="fa fa-chevron-down"></i>
                        </h4>
                        </div>
                        <div id="faq5" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>Yes, K.J. Somaiya Hospital & Research Centre offers dedicated assistance to patients availing treatment under the MJPJAY scheme to ensure a smooth and transparent process.</p>
                            <p>Support services include:</p>
                            <ul class="lists">
                            <li>
                                <span> On-site Aarogyamitras for patient guidance</span>
                            </li>
                            <li>
                                <span> Eligibility verification and document assistance</span>
                            </li>
                            <li>
                                <span> Preauthorization and claim coordination</span>
                            </li>
                            <li>
                                <span> Continuous support from admission to post-discharge follow-up</span>
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