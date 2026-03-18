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
                        <li><a href="#">About Us</a></li>
                        <li class="active">Community Outreach</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>


        <section class="section-wrap community_outreach_wrap">
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <div class="content">
                    <p>At K. J. Somaiya Hospital & Research Centre, we believe that excellence in healthcare is meaningful only when medical knowledge and services reach every section of society. Through structured community outreach programmes, the hospital works to improve health awareness, access to care, and quality of life across both urban and rural populations.</p>
                    <p>These initiatives are closely integrated with medical education and public health objectives, enabling preventive care, early detection, and sustained community engagement.</p>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="community_outreach_content">
                    <div class="section-heading wow fadeInLeft" data-wow-delay="00ms"
                        data-wow-duration="1500ms">
                        <h2>Urban Health Training Centre (UHTC)</h2>
                    </div>
                    <p>The <b>Urban Health Training Centre (UHTC)</b> is located within the Pratiksha Nagar slum area of Mumbai’s F-North Ward, approximately 2 km from the medical college. It serves a population of <b>over 43,000 individuals across nearly 10,000 households.</b></p>
                    <p>The centre is a collaborative initiative of the Department of Community Medicine, K. J. Somaiya Medical College, and <b>Ramakrishna Sarada Samiti</b>, with a focus on accessible and affordable primary healthcare.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="csr-img">
                    <img src="{{ asset('frontend/assets/img/about/community/urban-health-training-center.jpg') }}" class="img-responsive">
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="urban_list">
                    <h5>Core services include:</h5>
                    <ul class="lists">
                        <li><span> General OPD services (9:30 a.m. to 3:30 p.m.)</span></li>
                        <li><span> Specialist clinics</span></li>
                    </ul>
                    <ul class="sub_list">
                        <li><span>Gynaecology, Paediatrics, Ophthalmology – weekly</span></li>
                        <li><span>Dermatology – monthly</span></li>
                    </ul>
                    <ul class="lists">
                        <li><span> Laboratory services at subsidised rates</span></li>
                        <li><span> Preventive and promotive care through:</span></li>
                    </ul>
                    <ul class="sub_list">
                        <li><span>Under-Five Clinic</span></li>
                        <li><span>Well Woman Clinic</span></li>
                        <li><span>Immunisation OPD (twice monthly)</span></li>
                    </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="urban_list">
                    <h5>Public health & follow-up initiatives::</h5>
                    <ul class="lists">
                        <li><span> Screening and counselling for hypertension and diabetes</span></li>
                        <li><span> Weekly Non-Communicable Disease (NCD) clinic with subsidised medicines</span></li>
                        <li><span> Women’s health education on cervical and breast cancer, including Clinical Breast Examination and Pap smear awareness</span></li>
                        <li><span> Home visits and telephonic follow-ups for antenatal, child health, women’s health, and NCD beneficiaries</span></li>
                        <li><span> Immunisation reminders via phone calls</span></li>
                    </ul>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <div class="content">
                    <p>The UHTC also conducts a comprehensive school health programme covering approximately 3,200 students and delivers structured health education sessions for adolescents on nutrition, tobacco abuse, and HIV/AIDS. Vocational training programmes such as tailoring, computer skills, beautician courses, and spoken English are facilitated through Ramakrishna Sarada Samiti.</p>
                    </div>
                </div>
                </div>
            </div>
        </section>


        <section class="section-wrap community_outreach_two">
            <div class="container">
                <div class="row">
                <div class="col-md-6">
                    <div class="csr-img">
                    <img src="{{ asset('frontend/assets/img/about/community/SAHAS.jpg') }}" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="community_outreach_content">
                    <div class="section-heading wow fadeInLeft" data-wow-delay="00ms"
                        data-wow-duration="1500ms">
                        <h2>Somaiya Action for HIV/AIDS Support (SAHAS)</h2>
                    </div>
                    <p><b>The Somaiya Action for HIV/AIDS Support (SAHAS)</b> programme was established in <b>October 2003</b> under the K. J. Somaiya Medical Trust to address the medical, social, and emotional needs of People Living with HIV/AIDS (PLHIV).</p>
                    <p>At a time when stigma and exclusion were widespread, the hospital was among the few private institutions providing care to economically disadvantaged PLHIV without discrimination. What began as a local initiative has evolved into a comprehensive support programme</p>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-4">
                    <div class="urban_list">
                    <h5>Impact and scope::</h5>
                    <ul class="lists">
                        <li><span> Impact and scope:</span></li>
                    </ul>
                    <ul class="sub_list">
                        <li><span>929 males</span></li>
                        <li><span>1,203 females</span></li>
                        <li><span>538 children</span></li>
                    </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="urban_list">
                    <h5>Key areas of support include:</h5>
                    <ul class="lists">
                        <li><span> Psycho-social counselling and home-based care</span></li>
                        <li><span> Treatment facilitation through the hospital</span></li>
                        <li><span> Supplementary nutrition and educational support for HIV-affected children</span></li>
                        <li><span> Monthly nutritional supplementation for 316 children</span></li>
                        <li><span> Skill training and livelihood support for women, particularly widows</span></li>
                        <li><span> Assistance in accessing government welfare schemes</span></li>
                        <li><span> Support for prevention of mother-to-child transmission</span></li>
                        <li><span> HIV prevention and life-skills education for adolescents</span></li>
                        <li><span> Collaboration with NGOs for legal aid, advanced care, income generation, and social rehabilitation</span></li>
                    </ul>
                    </div>
                </div>
                </div>
            
            </div>
        </section>



        <section class="section-wrap community_outreach_three">
            <div class="container">
                <div class="row">
                <div class="col-md-5">
                    <div class="csr-img">
                    <img src="{{ asset('frontend/assets/img/about/community/rural_health_img.jpg') }}" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="content">
                    <h5>Rural Health Training Centre (RHTC), Lodhivali</h5>
                    <p>The Rural Health Training Centre (RHTC) operates at Dhirubhai Ambani Hospital, Lodhivali, located approximately 50 km from the medical college in Khalapur Taluka, Raigad District.</p>
                    <p>This centre supports rural healthcare delivery while serving as a training platform for medical education.</p>
                    <h6>Key activities include:</h6>
                    <ul class="lists">
                        <li><span> One-month residential rural posting for medical interns</span></li>
                        <li><span> Community health education in collaboration with:</span></li>
                    </ul>
                    <ul class="sub_list">
                        <li><span>Primary Health Care staff</span></li>
                        <li><span>Anganwadi workers</span></li>
                        <li><span>Local non-governmental organisations</span></li>
                    </ul>
                    <ul class="lists">
                        <li><span> Residential facilities for students and staff within the hospital township</span></li>
                    </ul>
                    </div>
                </div>
                </div>
            </div>
        </section>



        <section class="section-wrap community_outreach_four">
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <div class="content text-center wow fadeInLeft" data-wow-delay="00ms"
                    data-wow-duration="1500ms">
                    <h5>Preventive & School-Based Outreach Programmes</h5>
                    <p>In addition to its training centres, the hospital runs multiple targeted outreach programmes focusing on prevention, early detection, and health education.</p>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme" id="outreach-services">
                    <div class="item">
                        <div class="thumb-card">
                        <div class="thumb-img">
                            <img src="{{ asset('frontend/assets/img/about/community/breast-cancer.jpg') }}" alt="">
                        </div>
                        <div class="thumb-content">
                            <h4>Breast Cancer Screening Programme</h4>
                            <ul class="lists">
                            <li><span> Awareness on breast cancer</span></li>
                            <li><span> Promotion of Clinical Breast Examination and mammography</span></li>
                            <li><span> Training women in monthly self-breast examination</span></li>
                            <li><span> Follow-up for diagnosis and treatment where indicated</span></li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="thumb-card">
                        <div class="thumb-img">
                            <img src="{{ asset('frontend/assets/img/about/community/non-communicable.jpg') }}" alt="">
                        </div>
                        <div class="thumb-content">
                            <h4>Non-Communicable Disease (NCD) Screening</h4>
                            <ul class="lists">
                            <li><span> Lifestyle and risk-factor awareness</span></li>
                            <li><span> Screening for hypertension and diabetes (25 years and above)</span></li>
                            <li><span> Referral and treatment initiation through UHTC or local providers</span></li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="thumb-card">
                        <div class="thumb-img">
                            <img src="{{ asset('frontend/assets/img/about/community/infant-and-young-children.jpg') }}" alt="">
                        </div>
                        <div class="thumb-content">
                            <h4>Infant, Child & Adolescent Health Programmes</h4>
                            <ul class="lists">
                            <li><span> Infant and young child nutrition education</span></li>
                            <li><span> Reinforcement of appropriate feeding practices</span></li>
                            <li><span> Adolescent reproductive and sexual health education (15–19 years</span></li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="thumb-card">
                        <div class="thumb-img">
                            <img src="{{ asset('frontend/assets/img/about/community/reproductive-and-sexual-health.jpg') }}" alt="">
                        </div>
                        <div class="thumb-content">
                            <h4>School Health Education & Check-Up Programmes</h4>
                            <ul class="lists">
                            <li><span> Health education by grade:</span></li>
                            </ul>
                            <ul class="sub_list">
                            <li><span>Class VII: Nutrition and anaemia prevention</span></li>
                            <li><span>Class VIII: Tobacco abuse prevention</span></li>
                            <li><span>Class IX: Adolescence, population issues, and HIV/AIDS</span></li>
                            </ul>
                            <ul class="lists">
                            <li><span> Regular health check-ups for:</span></li>
                            </ul>
                            <ul class="sub_list">
                            <li><span>Nursery, Jr. KG, Sr. KG</span></li>
                            <li><span>2nd, 4th, 6th, and 10th standards</span></li>
                            </ul>
                            <ul class="lists">
                            <li><span> Conducted at Karmaveer Bhaurao Patil School, Pratiksha Nagar</span></li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="thumb-card">
                        <div class="thumb-img">
                            <img src="{{ asset('frontend/assets/img/about/community/school-health-education-program-of-somaiya.jpg') }}" alt="">
                        </div>
                        <div class="thumb-content">
                            <h4>Community Capacity-Building Initiatives</h4>
                            <ul class="lists">
                            <li><span> Child-to-Child and community training on hygiene, nutrition, immunisation, menstrual health, and tobacco prevention</span></li>
                            <li><span> Arogya Sevak Training Programme for girls completing 10th standard, preparing them for roles as community health workers, nursing aides, and domiciliary care providers</span></li>
                            </ul>
                        </div>
                        </div>
                    </div>
                
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <div class="content text-center">
                    <h5>A Commitment Beyond the Hospital</h5>
                    <p>Through these integrated outreach efforts, K. J. Somaiya Hospital & Research Centre remains committed to advancing public health, strengthening community resilience, and ensuring that healthcare reaches those who need it most across generations and geographies.</p>
                    </div>
                </div>
                </div>
            </div>
        </section>



         @include('components.frontend.footer')
        
        @include('components.frontend.main-js')

  </body>
</html>