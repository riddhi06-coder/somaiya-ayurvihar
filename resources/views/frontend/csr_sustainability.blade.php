<!DOCTYPE html>
<html lang="en">
    <head>
        @include('components.frontend.head')

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css">

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
                        <li class="active">CSR & Sustainability</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>



        <section class="section-wrap csr_wrap">
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <div class="content">
                    <p>K. J. Somaiya Hospital & Research Centre is deeply committed to advancing community health and social wellbeing as an integral part of its healthcare mission. As part of the Somaiya Ayurvihar campus in Sion, Mumbai, the hospital extends its responsibility beyond clinical care—working actively to make healthcare accessible, preventive, and empowering for underserved populations.</p>
                    <p>Guided by a philosophy of <b>service to humanity</b>, the hospital’s community outreach initiatives focus on early intervention, continuity of care, health education, and long-term support for vulnerable groups.</p>
                    </div>
                </div>
                </div>
                <div class="row csr_info_row">
                <div class="col-md-5">
                    <div class="community_outreach_img">
                    <img src="{{ asset('frontend/assets/img/about/community/urban-health-training-center.jpg') }}" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="content">
                    <h5>Urban Health Training Centre (UHTC)</h5>
                    <p>One of the hospital’s flagship community initiatives is the Urban Health Training Centre (UHTC), located near Pratiksha Nagar. The centre serves as a critical link between the hospital and the surrounding urban population.</p>
                    <p>The UHTC currently caters to:</p>
                    <ul class="lists">
                        <li><span><b>Over 43,000 individuals</b></span></li>
                        <li><span> Approximately <b>10,000 households</b></span></li>
                    </ul>
                    <h6>Services provided include:</h6>
                    <ul class="lists">
                        <li><span>General outpatient care and preventive health services</span></li>
                        <li><span> Specialist consultations in gynaecology, paediatrics, and ophthalmology</span></li>
                        <li><span> Subsidised diagnostic investigations</span></li>
                        <li><span> Immunisation programmes and maternal–child health services</span></li>
                        <li><span> Health education focused on chronic disease prevention </span></li>
                    </ul>
                    <p>Continuity of care is ensured through home visits, follow-ups, and telephonic reminders, strengthening long-term health outcomes within the community.</p>
                    </div>
                </div>
                </div>
                <div class="row csr_info_row">
                <div class="col-md-7">
                    <div class="content">
                    <h5>SAHAS – HIV/AIDS Support Programme</h5>
                    <p>The Somaiya Action for HIV AIDS Support (SAHAS) programme was initiated in 2003 to provide comprehensive support to individuals and families affected by HIV.</p>
                    <p>To date, SAHAS has:</p>
                    <ul class="lists">
                        <li><span>Registered 2,680 patients, including children</span></li>
                    </ul>
                    <h6>Key areas of support include:</h6>
                    <ul class="lists">
                        <li><span>Psycho-social counselling</span></li>
                        <li><span>Supplementary nutrition</span></li>
                        <li><span>Skill development and vocational training for women</span></li>
                        <li><span>Educational support for children</span></li>
                        <li><span>Assistance in accessing government welfare schemes</span></li>
                    </ul>
                    <p>The programme adopts a holistic approach, addressing not only medical needs but also social, emotional, and economic challenges faced by patients.</p>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="community_outreach_img">
                    <img src="{{ asset('frontend/assets/img/about/community/SAHAS.jpg') }}" class="img-responsive">
                    </div>
                </div>
                </div>
                <div class="row csr_info_row">
                <div class="col-md-5">
                    <div class="community_outreach_img">
                    <img src="{{ asset('frontend/assets/img/about/our-founder.jpg') }}" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="content">
                    <h5>Community Health Camps & Preventive Care</h5>
                    <p>In addition to its structured outreach centres, the hospital regularly organises multi-disciplinary health camps across Mumbai and neighbouring regions. These camps are designed to reach communities with limited access to routine healthcare services.</p>
                    <h6>Services typically offered include:</h6>
                    <ul class="lists">
                        <li><span>Screening for hypertension, diabetes, and other common conditions</span></li>
                        <li><span>Dental and basic health check-ups</span></li>
                        <li><span>Consultations with physicians and specialists, including psychiatrists and gynaecologists</span></li>
                        <li><span>Health awareness and preventive education</span></li>
                    </ul>
                    <p>These camps play a key role in early detection and timely referral for further treatment.</p>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <div class="content">
                    <h5>Blood Donation & Community Support</h5>
                    <p>The hospital’s Blood Centre actively contributes to community health through regular blood donation drives. By encouraging voluntary participation, these drives help maintain a stable and reliable blood supply for both emergency and planned medical care.</p>
                    <h5>A Sustained Commitment to Inclusive Care</h5>
                    <p>Through its ongoing initiatives in primary healthcare, chronic disease prevention, health education, and social support, K. J. Somaiya Hospital & Research Centre remains firmly committed to its social responsibility. These efforts reflect a long-term vision—one that seeks to improve health outcomes, promote equity, and build healthier communities through sustained engagement and compassionate care.</p>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                <div class="owl-carousel owl-theme" id="csr-gallery">
                    <div class="item">
                    <div class="single-single-gallery">
                    <div class="single-gallery">
                    <a href="{{ asset('frontend/assets/img/about/csr-gallery/csr1.jpeg') }}" data-fancybox="gallery" class="gallery-hover">
                        <img src="{{ asset('frontend/assets/img/about/csr-gallery/csr1.jpeg') }}" class="img-responsive">
                        <div class="overlay">
                        <span class="plus-icon">+</span>
                        </div>
                    </a>
                    </div>
                </div>
                    </div>
                    <div class="item">
                    <div class="single-single-gallery">
                    <div class="single-gallery">
                    <a href="{{ asset('frontend/assets/img/about/csr-gallery/csr2.jpeg') }}" data-fancybox="gallery" class="gallery-hover">
                        <img src="{{ asset('frontend/assets/img/about/csr-gallery/csr2.jpeg') }}" class="img-responsive">
                        <div class="overlay">
                        <span class="plus-icon">+</span>
                        </div>
                    </a>
                    </div>
                </div>
                    </div>
                    <div class="item">
                    <div class="single-single-gallery">
                    <div class="single-gallery">
                    <a href="{{ asset('frontend/assets/img/about/csr-gallery/csr3.jpeg') }}" data-fancybox="gallery" class="gallery-hover">
                        <img src="{{ asset('frontend/assets/img/about/csr-gallery/csr3.jpeg') }}" class="img-responsive">
                        <div class="overlay">
                        <span class="plus-icon">+</span>
                        </div>
                    </a>
                    </div>
                </div>
                    </div>
                    <div class="item">
                    <div class="single-single-gallery">
                    <div class="single-gallery">
                    <a href="{{ asset('frontend/assets/img/about/csr-gallery/csr4.jpeg') }}" data-fancybox="gallery" class="gallery-hover">
                        <img src="{{ asset('frontend/assets/img/about/csr-gallery/csr4.jpeg') }}" class="img-responsive">
                        <div class="overlay">
                        <span class="plus-icon">+</span>
                        </div>
                    </a>
                    </div>
                </div>
                    </div>
                    <div class="item">
                    <div class="single-single-gallery">
                    <div class="single-gallery">
                    <a href="{{ asset('frontend/assets/img/about/csr-gallery/csr5.jpeg') }}" data-fancybox="gallery" class="gallery-hover">
                        <img src="{{ asset('frontend/assets/img/about/csr-gallery/csr5.jpeg') }}" class="img-responsive">
                        <div class="overlay">
                        <span class="plus-icon">+</span>
                        </div>
                    </a>
                    </div>
                </div>
                    </div>
                    <div class="item">
                    <div class="single-single-gallery">
                    <div class="single-gallery">
                    <a href="{{ asset('frontend/assets/img/about/csr-gallery/csr6.jpeg') }}" data-fancybox="gallery" class="gallery-hover">
                        <img src="{{ asset('frontend/assets/img/about/csr-gallery/csr6.jpeg') }}" class="img-responsive">
                        <div class="overlay">
                        <span class="plus-icon">+</span>
                        </div>
                    </a>
                    </div>
                </div>
                    </div>
                    <div class="item">
                    <div class="single-single-gallery">
                    <div class="single-gallery">
                    <a href="{{ asset('frontend/assets/img/about/csr-gallery/csr7.jpeg') }}" data-fancybox="gallery" class="gallery-hover">
                        <img src="{{ asset('frontend/assets/img/about/csr-gallery/csr7.jpeg') }}" class="img-responsive">
                        <div class="overlay">
                        <span class="plus-icon">+</span>
                        </div>
                    </a>
                    </div>
                </div>
                    </div>
                    <div class="item">
                    <div class="single-single-gallery">
                    <div class="single-gallery">
                    <a href="{{ asset('frontend/assets/img/about/csr-gallery/csr8.jpeg') }}" data-fancybox="gallery" class="gallery-hover">
                        <img src="{{ asset('frontend/assets/img/about/csr-gallery/csr8.jpeg') }}" class="img-responsive">
                        <div class="overlay">
                        <span class="plus-icon">+</span>
                        </div>
                    </a>
                    </div>
                </div>
                    </div>
                    <div class="item">
                    <div class="single-single-gallery">
                    <div class="single-gallery">
                    <a href="{{ asset('frontend/assets/img/about/csr-gallery/csr9.jpeg') }}" data-fancybox="gallery" class="gallery-hover">
                        <img src="{{ asset('frontend/assets/img/about/csr-gallery/csr9.jpeg') }}" class="img-responsive">
                        <div class="overlay">
                        <span class="plus-icon">+</span>
                        </div>
                    </a>
                    </div>
                </div>
                    </div>
                    <div class="item">
                    <div class="single-single-gallery">
                    <div class="single-gallery">
                    <a href="{{ asset('frontend/assets/img/about/csr-gallery/csr10.jpeg') }}" data-fancybox="gallery" class="gallery-hover">
                        <img src="{{ asset('frontend/assets/img/about/csr-gallery/csr10.jpeg') }}" class="img-responsive">
                        <div class="overlay">
                        <span class="plus-icon">+</span>
                        </div>
                    </a>
                    </div>
                </div>
                    </div>
                    <div class="item">
                    <div class="single-single-gallery">
                    <div class="single-gallery">
                    <a href="{{ asset('frontend/assets/img/about/csr-gallery/csr11.jpeg') }}" data-fancybox="gallery" class="gallery-hover">
                        <img src="{{ asset('frontend/assets/img/about/csr-gallery/csr11.jpeg') }}" class="img-responsive">
                        <div class="overlay">
                        <span class="plus-icon">+</span>
                        </div>
                    </a>
                    </div>
                </div>
                    </div>
                </div>
                </div>
                </div>
            </div>
        </section>




        @include('components.frontend.footer')
        
        @include('components.frontend.main-js')


        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

        <script>
        // gallery start
        $(window).on('load', function () {
            $('#masonry-gallery').masonry({
            itemSelector: '.grid-item',
            percentPosition: true,
            columnWidth: '.grid-item'
            });
        });
        
        Fancybox.bind("[data-fancybox='gallery']", {
            // Optional settings
            Thumbs: false,
            Toolbar: true,
            closeButton: "top",
        });
        Fancybox.bind("[data-fancybox='gallery1']", {
            // Optional settings
            Thumbs: false,
            Toolbar: true,
            closeButton: "top",
        });
        // gallery end
        </script>


  </body>
</html>