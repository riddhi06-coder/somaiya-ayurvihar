
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
                        <li class="active">Insurance & TPA</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>


        <section class="section-wrap insurance_tpa_wrap">
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <div class="content wow fadeInLeft" data-wow-delay="00ms"
                    data-wow-duration="1500ms">
                    <h5>Insurance & TPA Services</h5>
                    <p>K.J. Somaiya Superspeciality Centre facilitates <b>cashless hospitalisation</b> through tie-ups with multiple <b>Insurance Companies and Third-Party Administrators (TPAs)</b>, helping reduce financial stress for patients during planned or emergency admissions.</p>
                    <p>To ensure a smooth experience, patients are encouraged to verify whether their Insurance Company or TPA is empanelled with the hospital and to follow the prescribed pre-authorisation and cashless admission procedures before admission.</p>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-7">
                    <div class="insurance_content">
                    <h5>Essential Points to Keep in Mind</h5>
                    <ul class="lists">
                        <li>
                        <span> Holding a TPA or insurance identity card does not automatically ensure cashless treatment.</span>
                        </li>
                        <li>
                        <span> Cashless hospitalisation is subject to approval by the concerned Insurance Company or TPA.</span>
                        </li>
                        <li>
                        <span> Completion of the mandatory pre-authorisation process is required before availing of cashless services.</span>
                        </li>
                    </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="content-img">
                    <img src="img/patient-services/insurance-tpa.jpg" class="img-responsive">
                    </div>
                </div>
                </div>
            </div>
        </section>


        <section class="section-wrap hospital-journey">
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">Cashless Hospitalisation Process</h2>
                    <p class="text-center">Pre-authorisation forms for TPAs empanelled with the hospital are available at the <b>TPA Department.</b></p>
                    <div class="journey-slider owl-carousel">
                    <div class="journey-step">
                        <div class="icon">Step 1</div>
                        <p>The patient reports to the hospital for admission.</p>
                    </div>
                    <div class="journey-step">
                        <div class="icon">Step 2</div>
                        <p>The treating consultant completes the Pre-Authorisation Form and submits it to the respective Insurance Company or TPA along with the estimated treatment cost.</p>
                    </div>
                    <div class="journey-step">
                        <div class="icon">Step 3</div>
                        <p>Any queries raised by the Insurance Company or TPA are addressed by the hospital team.</p>
                    </div>
                    <div class="journey-step">
                        <div class="icon">Step 4</div>
                        <p>A <b>provisional approval</b> is issued based on the patient’s policy terms and coverage.</p>
                    </div>
                    <div class="journey-step">
                        <div class="icon">Step 5</div>
                        <p>The patient undergoes treatment as per the approved authorisation.</p>
                    </div>
                    <div class="journey-step">
                        <div class="icon">Step 6</div>
                        <p>Before discharge, the <b>final bill, treatment records, and discharge summary</b> are submitted to the Insurance Company or TPA for final approval.</p>
                    </div>
                    <div class="journey-step">
                        <div class="icon">Step 7</div>
                        <p>Any additional clarifications sought by the Insurance Company or TPA are resolved by the hospital. Final approval is granted once all queries are addressed.</p>
                    </div>
                    <div class="journey-step">
                        <div class="icon">Step 8</div>
                        <p>Upon receiving final approval, the patient is cleared for discharge.</p>
                    </div>
                    </div>
                    <p class="text-center">Please note: The discharge approval process typically takes <b>4 to 6 hours,</b> depending on the Insurance Company or TPA.</p>
                </div>
                </div>
            </div>
        </section>


        <section class="empanelled_wrap">
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <div class="insurance_content">
                    <h5>Insurance Company On Panel</h5>
                    </div>
                </div>
                </div>
                
                <div class="row">
                <div class="col-md-12">
                    <!-- Tabs -->
                    <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#insurance-company" data-toggle="tab">Insurance Company</a>
                    </li>
                    <li>
                        <a href="#tpa" data-toggle="tab">TPA</a>
                    </li>
                    <li>
                        <a href="#corporate" data-toggle="tab">Corporates Tie Up</a>
                    </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content" style="margin-top:20px;">
                    <div class="tab-pane fade in active" id="insurance-company">
                        <div class="row">
                        <div class="col-md-3">
                            <div class="glass-card">
                            <img src="{{ asset('frontend/assets/img/patient-services/empanelled-insurance/bajaj_allianz.png') }}" alt="Bajaj Allianz">
                            <h4>Bajaj Allianz</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="glass-card">
                            <img src="{{ asset('frontend/assets/img/patient-services/empanelled-insurance/cholomandalam.png') }}" alt="Bajaj Allianz">
                            <h4>Cholamandalam</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="glass-card">
                            <img src="{{ asset('frontend/assets/img/patient-services/empanelled-insurance/future_generali.png') }}" alt="Bajaj Allianz">
                            <h4>Future Generali</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="glass-card">
                            <img src="{{ asset('frontend/assets/img/patient-services/empanelled-insurance/star.png') }}" alt="Bajaj Allianz">
                            <h4>Star Health</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="glass-card">
                            <img src="{{ asset('frontend/assets/img/patient-services/empanelled-insurance/gipsa.png') }}" alt="Bajaj Allianz">
                            <h4>GIPSA</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="glass-card">
                            <img src="{{ asset('frontend/assets/img/patient-services/empanelled-insurance/reliance_general.png') }}" alt="Bajaj Allianz">
                            <h4>Reliance Insurance</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="glass-card">
                            <img src="{{ asset('frontend/assets/img/patient-services/empanelled-insurance/care-health.webp') }}" alt="Bajaj Allianz">
                            <h4>Care Health</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="glass-card">
                            <img src="{{ asset('frontend/assets/img/patient-services/empanelled-insurance/hdfc-ergo.jpg') }}" alt="Bajaj Allianz">
                            <h4>HDFC ERGO</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="glass-card">
                            <img src="{{ asset('frontend/assets/img/patient-services/empanelled-insurance/sbi-insurance.png') }}" alt="Bajaj Allianz">
                            <h4>SBI Insurance</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="glass-card">
                            <img src="{{ asset('frontend/assets/img/patient-services/empanelled-insurance/navi-general-insurance.png') }}" alt="Bajaj Allianz">
                            <h4>Navi General Insurance</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="glass-card">
                            <img src="{{ asset('frontend/assets/img/patient-services/empanelled-insurance/digit.png') }}" alt="Bajaj Allianz">
                            <h4>Go Digit Insurance</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="glass-card">
                            <img src="{{ asset('frontend/assets/img/patient-services/empanelled-insurance/IFCO-tokyo-insurance.svg') }}" alt="Bajaj Allianz">
                            <h4>IFCO - Tokyo Insurance</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="glass-card">
                            <img src="{{ asset('frontend/assets/img/patient-services/empanelled-insurance/aditya-birla.webp') }}" alt="Bajaj Allianz">
                            <h4>Aditya Birla Insurance</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="glass-card">
                            <img src="{{ asset('frontend/assets/img/patient-services/empanelled-insurance/tata-aig-gen.png') }}" alt="Bajaj Allianz">
                            <h4>TATA AIG GEN Insurance</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="glass-card">
                            <img src="{{ asset('frontend/assets/img/patient-services/empanelled-insurance/galaxy-insurance.webp') }}" alt="Bajaj Allianz">
                            <h4>Galaxy Insurance</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="glass-card">
                            <img src="{{ asset('frontend/assets/img/patient-services/empanelled-insurance/Manipal-CIGNA.png') }}" alt="Bajaj Allianz">
                            <h4>Manipal CIGNA</h4>
                            </div>
                        </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="tpa">
                        <div class="row">
                        <div class="col-md-3">
                            <div class="glass-card">
                            <img src="{{ asset('frontend/assets/img/patient-services/empanelled-insurance/MEDIASSIST-TPA.webp') }}" alt="Bajaj Allianz">
                            <h4>MEDIASSIST TPA</h4>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="corporate">
                        <div class="row">
                        <div class="col-md-3">
                            <div class="glass-card">
                            <img src="{{ asset('frontend/assets/img/patient-services/empanelled-insurance/BHARAT-PETROLEUM.png') }}" alt="Bajaj Allianz">
                            <h4>BHARAT PETROLEUM</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="glass-card">
                            <img src="{{ asset('frontend/assets/img/patient-services/empanelled-insurance/MUMBAI-PORT-AUTHORITY.png') }}" alt="Bajaj Allianz">
                            <h4>MUMBAI PORT AUTHORITY</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="glass-card">
                            <img src="{{ asset('frontend/assets/img/patient-services/empanelled-insurance/CGHS.jpg') }}" alt="Bajaj Allianz">
                            <h4>CGHS</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="glass-card">
                            <img src="{{ asset('frontend/assets/img/patient-services/empanelled-insurance/RCF.jpg') }}" alt="Bajaj Allianz">
                            <h4>RCF</h4>
                            </div>
                        </div>

                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>


        <section class="section-wrap insurance_tpa_two">
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <div class="insurance_content">
                    <h5>How to Identify Your TPA</h5>
                    <p>You can identify your Third-Party Administrator using the following sources:</p>
                    <ul class="lists">
                        <li>
                        <span> The TPA name is mentioned on your TPA identity card.</span>
                        </li>
                        <li>
                        <span> Your insurance policy document usually displays TPA details, commonly on the reverse side or lower section.</span>
                        </li>
                        <li>
                        <span> Your insurance agent can also help confirm accurate TPA information.</span>
                        </li>
                    </ul>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="insurance_content">
                    <h5>In Case of Cashless Claim Denial</h5>
                    <p>If the Insurance Company or TPA declines a cashless request, the patient will be treated as a <b>self-paying (cash) patient</b> and will be required to settle hospital bills as per the hospital’s billing policy.</p>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="insurance_content">
                    <h5>Reimbursement Process</h5>
                    <p>Patients who do not opt for cashless hospitalisation or whose cashless claims are denied may apply for reimbursement directly with their Insurance Company or TPA</p>
                    <p>Documents generally required for reimbursement include:</p>
                    <ul class="lists">
                        <li>
                        <span> Discharge summary</span>
                        </li>
                        <li>
                        <span> Original hospital bills and payment receipts</span>
                        </li>
                        <li>
                        <span> Original investigation and diagnostic reports</span>
                        </li>
                        <li>
                        <span> Duly completed insurance claim form</span>
                        </li>
                    </ul>
                    <p>If indoor case papers are required, patients may submit a request at the TPA Department during working hours.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content-img">
                    <img src="{{ asset('frontend/assets/img/patient-services/reimbursement-process.jpg') }}" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="insurance_content">
                    <h5>Disclaimer</h5>
                    <p>K.J. Somaiya Superspeciality Centre reserves the right to accept or decline cashless hospitalisation requests for any TPA cardholder. While the hospital’s TPA Department provides assistance and guidance throughout the process, the final responsibility for obtaining authorisation rests with the patient or their authorised representative.</p>
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
                            01. What is cashless hospitalization, and how does it work?
                            <i class="fa fa-chevron-down"></i>
                        </h4>
                        </div>
                        <div id="faq1" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <p>Cashless hospitalization allows insured patients to receive medical treatment without paying hospital expenses upfront, subject to approval from the Insurance Company or TPA. At <b>K.J. Somaiya Superspeciality Centre,</b> the hospital coordinates with the insurer to submit medical details and estimated costs.</p>
                            <ul class="lists">
                            <li><span> Treatment expenses approved under the policy are settled directly with the insurer</span>
                            </li>
                            <li><span> Coverage depends on policy terms, limits, and exclusions</span>
                            </li>
                            <li><span> The patient must bear any non-payable or excluded charges</span>
                            </li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq2">
                        <h4 class="panel-title">
                            02. Does having a TPA card guarantee cashless treatment?
                            <i class="fa fa-chevron-down"></i>
                        </h4>
                        </div>
                        <div id="faq2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>No, merely holding a TPA or insurance identity card does not automatically guarantee cashless hospitalization at <b>K.J. Somaiya Superspeciality Centre.</b></p>
                            <ul class="lists">
                            <li><span> Cashless approval depends on insurer authorization</span>
                            </li>
                            <li><span> Policy coverage, exclusions, and medical necessity are evaluated</span>
                            </li>
                            <li><span> Completion of the pre-authorization process is mandatory</span>
                            </li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq3">
                        <h4 class="panel-title">
                            03. How long does the cashless discharge approval process take?
                            <i class="fa fa-chevron-down"></i>
                        </h4>
                        </div>
                        <div id="faq3" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>At <b>K.J. Somaiya Superspeciality Centre,</b> the discharge approval process typically takes <b>approximately 4 to 6 hours,</b> depending on the Insurance Company or TPA.</p>
                            <ul class="lists">
                            <li><span> The insurer reviews final bills and medical documents</span>
                            </li>
                            <li><span> Additional queries, if any, may extend the approval timeline</span>
                            </li>
                            <li><span> Patients are discharged after final confirmation is received</span>
                            </li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq4">
                        <h4 class="panel-title">
                            04. What happens if my cashless claim is rejected?
                            <i class="fa fa-chevron-down"></i>
                        </h4>
                        </div>
                        <div id="faq4" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>If a cashless request is declined, patients at <b>K.J. Somaiya Superspeciality Centre</b> are required to settle hospital charges as per the billing policy.</p>
                            <ul class="lists">
                            <li><span> Treatment continues without interruption</span>
                            </li>
                            <li><span> Patients can later apply for reimbursement directly with the insurer</span>
                            </li>
                            <li><span> All original medical records and bills should be retained for claims</span>
                            </li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq5">
                        <h4 class="panel-title">
                            05. Does K.J. Somaiya Superspeciality Centre assist patients with insurance and TPA procedures?
                            <i class="fa fa-chevron-down"></i>
                        </h4>
                        </div>
                        <div id="faq5" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>Yes, <b>K.J. Somaiya Superspeciality Centre</b> has a dedicated TPA Department to guide patients through insurance-related formalities.</p>
                            <ul class="lists">
                            <li><span> Support is provided for documentation and coordination</span>
                            </li>
                            <li><span> Patients are informed about procedures and timelines</span>
                            </li>
                            <li><span> Final authorization approval remains the responsibility of the patient or their representative</span>
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