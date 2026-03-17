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
                        <li class="active">Rights & Responsibilities</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>


        <section class="section-wrap rights_responsibilities_wrap">
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <div class="content wow fadeInLeft" data-wow-delay="00ms"
                    data-wow-duration="1500ms">
                    <h5>Patient Responsibilities and Rights</h5>
                    <p>At <b>K.J. Somaiya Hospital & Research Centre,</b> we believe that high-quality healthcare is built on mutual trust, transparency, and respect between patients, their families, and healthcare providers. Understanding your responsibilities and rights helps ensure safe, ethical, and effective medical care for everyone.</p>
                    </div>
                </div>
                </div>
                <div class="row">
                <!-- <div class="col-md-2">

                </div> -->
                <div class="col-md-12">
                    <div class="rights_responsibilities_content wow fadeInRight" data-wow-delay="00ms"
                    data-wow-duration="1500ms">
                    <div class="section-heading">
                    <h2>Patient Responsibilities</h2>
                    <p>Patients and their attendants are encouraged to actively participate in the care process by fulfilling the following responsibilities:</p>
                    </div>
                    <ul class="lists">
                    <li>
                       <span> <b>Providing accurate personal information</b><br> Patients are expected to share complete and truthful personal details such as their full name, address, contact number, income details (where applicable), and relevant identification documents.</span>
                    </li>
                    <li>
                       <span> <b>Sharing complete medical history</b><br> It is important to disclose accurate and comprehensive medical information, including previous illnesses, hospital admissions, surgeries, ongoing treatments, allergies, and medications being taken.</span>
                    </li>
                    <li>
                       <span> <b>Following appointment schedules</b><br> Patients should adhere to scheduled appointments and inform the hospital in advance in case of cancellations or rescheduling to ensure continuity of care.</span>
                    </li>
                    <li>
                       <span> <b>Understanding emergency care priorities</b><br> Patients are requested to understand that doctors may need to prioritise critically ill patients, which may occasionally result in waiting times.</span>
                    </li>
                    <li>
                       <span> <b>Maintaining respectful conduct</b><br> A harmonious, courteous, and respectful relationship with hospital staff, fellow patients, and visitors is expected at all times.</span>
                    </li>
                    <li>
                       <span> <b>Complying with prescribed treatment plans</b><br> Patients should follow the treatment plan advised by the treating doctor and immediately inform them if they face any difficulty or inability to continue the prescribed treatment or therapies.</span>
                    </li>
                    <li>
                       <span> <b>Avoiding self-medication</b><br> Patients should not consume any medicines other than those prescribed by their treating doctor and should refrain from sharing prescribed medicines with others.</span>
                    </li>
                    <li>
                       <span> <b>Timely settlement of financial obligations</b><br> Patients are responsible for clearing hospital dues promptly and coordinating with hospital staff for insurance-related processes and documentation.</span>
                    </li>
                    <li>
                       <span> <b>Following hospital policies</b><br> Patients and visitors must strictly adhere to the hospital’s policies, including no smoking, no alcohol consumption, and restrictions on non-vegetarian food within hospital premises.</span>
                    </li>
                    <li>
                       <span> <b>Respecting privacy and confidentiality measures</b><br> Patients should cooperate with hospital protocols designed to protect personal privacy and maintain the confidentiality of medical records.</span>
                    </li>
                    <li>
                       <span> <b>Ensuring safety within hospital premises</b><br> Patients and visitors must avoid activities that may disturb or endanger others, such as littering, playing loud music, speaking loudly, or carrying prohibited items within the hospital.</span>
                    </li>
                    </ul>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <div class="rights_responsibilities_content wow fadeInLeft" data-wow-delay="00ms"
                    data-wow-duration="1500ms">
                    <div class="section-heading">
                    <h2>Patient Rights</h2>
                    <p>Every patient receiving care at <b>K.J. Somaiya Hospital & Research Centre</b> is entitled to the following rights:</p>
                    </div>
                    <ul class="lists">
                    <li>
                       <span> <b>Right to quality medical care</b><br> Patients have the right to receive medical counselling and treatment that meets established professional and ethical healthcare standards.</span>
                    </li>
                    <li>
                       <span> <b>Right to clear information and education</b><br> Patients have the right to be informed about their diagnosis, treatment options, expected outcomes, and estimated costs in a language they can easily understand.</span>
                    </li>
                    <li>
                       <span> <b>Right to informed consent</b><br> Patients may grant or withhold consent for any diagnostic test, procedure, or treatment, either in part or in full, after receiving adequate information.</span>
                    </li>
                    <li>
                       <span> <b>Right to seek a second opinion</b><br> Patients have the right to consult another qualified healthcare professional for an additional opinion regarding their medical condition.</span>
                    </li>
                    <li>
                       <span> <b>Right to know their care team</b><br> Patients have the right to information about the doctors, nurses, and healthcare professionals involved in their care.</span>
                    </li>
                    <li>
                       <span> <b>Right to access medical records</b><br> Patients may access their clinical records in accordance with hospital policies and applicable regulations.</span>
                    </li>
                    <li>
                       <span> <b>Right to confidentiality</b><br> All medical records and personal health information are kept confidential, except in situations required by law or clinical necessity.</span>
                    </li>
                    <li>
                       <span> <b>Right to privacy and dignity</b><br> Patients are entitled to privacy, dignity, and respect, with due consideration given to their cultural, religious, and personal beliefs.</span>
                    </li>
                    <li>
                       <span> <b>Right to a safe hospital environment</b><br> Patients and their visitors have the right to a secure and protected environment within the hospital. However, the hospital is not responsible for personal belongings.</span>
                    </li>
                    <li>
                       <span> <b>Right to voice concerns and feedback</b><br> Patients may provide suggestions, feedback, or lodge grievances through the hospital’s designated grievance redressal mechanisms.</span>
                    </li>
                    </ul>
                    </div>
                </div>
                <!-- <div class="col-md-2">

                </div> -->
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
                        01. What are my responsibilities as a patient at K.J. Somaiya Hospital & Research Centre?
                        <i class="fa fa-chevron-down"></i>
                    </h4>
                    </div>
                    <div id="faq1" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <p>As a patient at K.J. Somaiya Hospital & Research Centre, you are expected to actively participate in your healthcare journey by cooperating with medical and administrative protocols. This helps ensure safe, effective, and ethical care for all.</p>
                        <ul class="lists">
                        <li><span>Provide accurate personal and medical information</span>
                        </li>
                        <li><span>Follow treatment plans and appointment schedules</span>
                        </li>
                        <li><span>Respect hospital staff, patients, and policies</span>
                        </li>
                        <li><span>Clear financial dues and assist with insurance processes</span>
                        </li>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq2">
                    <h4 class="panel-title">
                        02. How does K.J. Somaiya Hospital & Research Centre protect patient confidentiality?
                        <i class="fa fa-chevron-down"></i>
                    </h4>
                    </div>
                    <div id="faq2" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Patient privacy and confidentiality are a top priority at K.J. Somaiya Hospital & Research Centre. The hospital follows strict protocols to safeguard personal and medical information.</p>
                        <ul class="lists">
                        <li><span> Secure storage of medical records</span>
                        </li>
                        <li><span> Restricted access to authorised healthcare professionals</span>
                        </li>
                        <li><span> Disclosure only when required by law or medical necessity</span>
                        </li>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq3">
                    <h4 class="panel-title">
                        03. Can I access my medical records at K.J. Somaiya Hospital & Research Centre?
                        <i class="fa fa-chevron-down"></i>
                    </h4>
                    </div>
                    <div id="faq3" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Yes, patients have the right to access their clinical records at K.J. Somaiya Hospital & Research Centre in accordance with hospital policies and regulatory guidelines.</p>
                        <ul class="lists">
                        <li><span> Requests can be made through designated hospital channels</span>
                        </li>
                        <li><span> Records are shared while maintaining privacy and confidentiality</span>
                        </li>
                        <li><span> Certain legal or procedural requirements may apply</span>
                        </li>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq4">
                    <h4 class="panel-title">
                        04. Do patients have the right to seek a second opinion at K.J. Somaiya Hospital & Research Centre?
                        <i class="fa fa-chevron-down"></i>
                    </h4>
                    </div>
                    <div id="faq4" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Absolutely. K.J. Somaiya Hospital & Research Centre respects a patient’s right to seek a second medical opinion to make informed healthcare decisions.</p>
                        <ul class="lists">
                        <li><span> Patients may consult another qualified specialist</span>
                        </li>
                        <li><span> Medical records can be shared as per policy</span>
                        </li>
                        <li><span> The hospital supports informed and transparent decision-making</span>
                        </li>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq5">
                    <h4 class="panel-title">
                        05. How can I raise a grievance or share feedback with K.J. Somaiya Hospital & Research Centre?
                        <i class="fa fa-chevron-down"></i>
                    </h4>
                    </div>
                    <div id="faq5" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>K.J. Somaiya Hospital & Research Centre encourages patients and families to share feedback or raise concerns to improve care quality and patient experience.</p>
                        <ul class="lists">
                        <li><span> Use the hospital’s grievance redressal system</span>
                        </li>
                        <li><span> Speak with the patient relations or medical social work team</span>
                        </li>
                        <li><span> Submit written feedback through designated channels</span>
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