
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
                        <li><a href="index.html"><span class="glyphicon glyphicon-home"></span></a></li>
                        <li><a href="#">About Us</a></li>
                        <li class="active">Awards & Accolades</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>

        <section class="awards-wrap">
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <div class="content text-center wow fadeInUp" data-wow-delay="00ms"
                    data-wow-duration="1500ms">
                    <h5>Commitment to QUALITY Healthcare services</h5>
                    </div>
                </div>
                </div>
                <div class="achievement-section">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                    <div class="achievement-card">
                        <div class="achievement-icon">
                        <img src="{{ asset('frontend/assets/img/icon/medal.svg') }}">
                        </div>
                        <h3>NABH Entry-Level</h3>
                        <p>
                        <!--Awarded NABH Entry-Level Certification for the entire KJSH in--> Awarded Certification, 2024.
                        <strong> 2024</strong>.
                        </p>
                    </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                    <div class="achievement-card">
                        <div class="achievement-icon">
                        <img src="{{ asset('frontend/assets/img/icon/medal.svg') }}">
                        </div>
                        <h3>NABL Certification</h3>
                        <p>
                        <!--Achieved NABL accreditation for the Hematology Laboratory in--> Achieved for the Haematology Laboratory in
                        <strong> 2024</strong><!--, ensuring accuracy and reliability.-->
                        </p>
                    </div>
                    </div>
                
                    <div class="col-md-3 col-sm-6">
                    <div class="achievement-card">
                        <div class="achievement-icon">
                        <img src="{{ asset('frontend/assets/img/icon/medal.svg') }}">
                        </div>
                        <h3>Quality Improvement</h3>
                        <p>
                        Continuous service improvement through structured staff training and protocol enhancements.
                        </p>
                    </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                    <div class="achievement-card">
                        <div class="achievement-icon">
                        <img src="{{ asset('frontend/assets/img/icon/medal.svg') }}">
                        </div>
                        <h3>Clinical Excellence</h3>
                        <p>
                        Implementation of NABH-driven standards to enhance patient safety and clinical outcomes.
                        </p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>

        <section class="awards-wrap awards-wrap-two">
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <div class="content text-center wow fadeInUp" data-wow-delay="00ms"
                    data-wow-duration="1500ms">
                    <h5>Awards & Accolades</h5>
                    <p>Awards and honors received reflecting our impact on the healthcare landscape</p>
                    </div>
                </div>
                </div>
                <div class="achievement-section">
                <div class="row">
                    <div class="col-md-4">
                    <div class="achievement-card">
                        <div class="achievement-icon">
                        <img src="{{ asset('frontend/assets/img/icon/medal.svg') }}">
                        </div>
                        <p>
                        Dr Manisha Bobade, CEO, KJSHRC, on an advisory role on the CGHS board,
                        influencing healthcare at a broader level
                        </p>
                        <h6><i class="fa fa-calendar-o" aria-hidden="true"></i> June ‘24</h6>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="achievement-card">
                        <div class="achievement-icon">
                        <img src="{{ asset('frontend/assets/img/icon/medal.svg') }}">
                        </div>
                        <p>
                        CSR Healthcare Changemakers Award for KJSHRC
                        </p>
                        <h6><i class="fa fa-calendar-o" aria-hidden="true"></i> Sept ‘24</h6>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="achievement-card">
                        <div class="achievement-icon">
                        <img src="{{ asset('frontend/assets/img/icon/medal.svg') }}">
                        </div>
                        <p>
                        Lifetime Achievement Award for Outstanding contributions to Healthcare
                        Improvement by Heal Foundation to CEO, Dr Manisha Bobade
                        </p>
                        <h6><i class="fa fa-calendar-o" aria-hidden="true"></i> Sept ‘24</h6>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="achievement-card">
                        <div class="achievement-icon">
                        <img src="{{ asset('frontend/assets/img/icon/medal.svg') }}">
                        </div>
                        <p>
                        Ranked 9th Best hospital in Mid Day Top 10 Best Multispecialty hospitals
                        in South Mumbai
                        </p>
                        <h6><i class="fa fa-calendar-o" aria-hidden="true"></i> Oct ‘24</h6>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="achievement-card">
                        <div class="achievement-icon">
                        <img src="{{ asset('frontend/assets/img/icon/medal.svg') }}">
                        </div>
                        <p>
                        Ranked 12th Best Multispecialty Hospital (Private) in The Week Magazine
                        in Mumbai
                        </p>
                        <h6><i class="fa fa-calendar-o" aria-hidden="true"></i> Dec ‘24</h6>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="achievement-card">
                        <div class="achievement-icon">
                        <img src="{{ asset('frontend/assets/img/icon/medal.svg') }}">
                        </div>
                        <p>
                        Ranked 14th Best Multispecialty Hospital in The Week Magazine in Mumbai
                        </p>
                        <h6><i class="fa fa-calendar-o" aria-hidden="true"></i> Dec ‘24</h6>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="achievement-card">
                        <div class="achievement-icon">
                        <img src="{{ asset('frontend/assets/img/icon/medal.svg') }}">
                        </div>
                        <p>
                        Institutional Excellence in CSR Initiatives (Healthcare) by BW Healthcare
                        Excellence Awards 2025
                        </p>
                        <h6><i class="fa fa-calendar-o" aria-hidden="true"></i> Feb ‘25</h6>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="achievement-card">
                        <div class="achievement-icon">
                        <img src="{{ asset('frontend/assets/img/icon/medal.svg') }}">
                        </div>
                        <p>
                        Institutional Excellence in Healthcare Research & Development by BW
                        Healthcare Excellence Awards 2025
                        </p>
                        <h6><i class="fa fa-calendar-o" aria-hidden="true"></i> Feb ‘25</h6>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="achievement-card">
                        <div class="achievement-icon">
                        <img src="{{ asset('frontend/assets/img/icon/medal.svg') }}">
                        </div>
                        <p>
                        Best Hospital as a Workplace by MT India Healthcare Excellence Awards
                        2025
                        </p>
                        <h6><i class="fa fa-calendar-o" aria-hidden="true"></i> March ‘25</h6>
                    </div>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                    <div class="achievement-card">
                        <div class="achievement-icon">
                        <img src="{{ asset('frontend/assets/img/icon/medal.svg') }}">
                        </div>
                        <p>
                        Maharashtra Gaurav Puraskar for Outstanding contributions in healthcare
                        awarded to CEO, Dr Manisha Bobade
                        </p>
                        <h6><i class="fa fa-calendar-o" aria-hidden="true"></i> Aug ‘25</h6>
                    </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                </div>
                <div class="gallery-awards-section">
                <div class="row">
                    <div class="col-md-4">
                    <div class="single-single-gallery">
                        <div class="single-gallery">
                        <a href="{{ asset('frontend/assets/img/awards/accolades/1.webp') }}" data-fancybox="gallery" class="gallery-hover">
                            <img src="{{ asset('frontend/assets/img/awards/accolades/1.webp') }}" class="img-responsive">
                            <div class="overlay">
                            <span class="plus-icon">+</span>
                            </div>
                        </a>
                        </div>
                        <h5>Certificate of Excellence in Healthcare by HealthTech Innovation Conclave to CEO, Dr Manisha Bobade</h5>
                        <h6><i class="fa fa-calendar-o" aria-hidden="true"></i> Nov ‘23</h6>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="single-single-gallery">
                        <div class="single-gallery">
                        <a href="{{ asset('frontend/assets/img/awards/accolades/2.webp') }}" data-fancybox="gallery" class="gallery-hover">
                            <img src="{{ asset('frontend/assets/img/awards/accolades/2.webp') }}" class="img-responsive">
                            <div class="overlay">
                            <span class="plus-icon">+</span>
                            </div>
                        </a>
                        </div>
                        <h5>Appreciation for valuable contribution towards organ donation programme by Zonal transplant coordination centre, Mumbai </h5>
                        <h6><i class="fa fa-calendar-o" aria-hidden="true"></i> March ‘24</h6>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="single-single-gallery">
                        <div class="single-gallery">
                        <a href="{{ asset('frontend/assets/img/awards/accolades/3.webp') }}" data-fancybox="gallery" class="gallery-hover">
                            <img src="{{ asset('frontend/assets/img/awards/accolades/3.webp') }}" class="img-responsive">
                            <div class="overlay">
                            <span class="plus-icon">+</span>
                            </div>
                        </a>
                        </div>
                        <h5>Ranked in the Mid Day Top 10 Best Multispecialty hospitals in South Mumbai</h5>
                        <h6><i class="fa fa-calendar-o" aria-hidden="true"></i> Oct ‘24</h6>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="single-single-gallery">
                        <div class="single-gallery">
                        <a href="{{ asset('frontend/assets/img/awards/accolades/4.webp') }}" data-fancybox="gallery" class="gallery-hover">
                            <img src="{{ asset('frontend/assets/img/awards/accolades/4.webp') }}" class="img-responsive">
                            <div class="overlay">
                            <span class="plus-icon">+</span>
                            </div>
                        </a>
                        </div>
                        <h5>Lifetime Achievement Award for Outstanding contributions to Healthcare Improvement by Heal foundation to CEO, Dr Manisha Bobade</h5>
                        <h6><i class="fa fa-calendar-o" aria-hidden="true"></i> Sept ‘24</h6>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="single-single-gallery">
                        <div class="single-gallery">
                        <a href="{{ asset('frontend/assets/img/awards/accolades/5.webp') }}" data-fancybox="gallery" class="gallery-hover">
                            <img src="{{ asset('frontend/assets/img/awards/accolades/5.webp') }}" class="img-responsive">
                            <div class="overlay">
                            <span class="plus-icon">+</span>
                            </div>
                        </a>
                        </div>
                        <h5>CSR Healthcare Changemakers Award for KJSH</h5>
                        <h6><i class="fa fa-calendar-o" aria-hidden="true"></i> Sept ‘24</h6>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="single-single-gallery">
                        <div class="single-gallery">
                        <a href="{{ asset('frontend/assets/img/awards/accolades/6.webp') }}" data-fancybox="gallery" class="gallery-hover">
                            <img src="{{ asset('frontend/assets/img/awards/accolades/6.webp') }}" class="img-responsive">
                            <div class="overlay">
                            <span class="plus-icon">+</span>
                            </div>
                        </a>
                        </div>
                        <h5>Best Hospital as a Workplace by MT India Healthcare Excellence Awards 2025</h5>
                        <h6><i class="fa fa-calendar-o" aria-hidden="true"></i> March ‘25</h6>
                    </div>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                    <div class="single-single-gallery">
                        <div class="single-gallery">
                        <a href="{{ asset('frontend/assets/img/awards/accolades/7.webp') }}" data-fancybox="gallery" class="gallery-hover">
                            <img src="{{ asset('frontend/assets/img/awards/accolades/7.webp') }}" class="img-responsive">
                            <div class="overlay">
                            <span class="plus-icon">+</span>
                            </div>
                        </a>
                        </div>
                        <h5>“Maharashtra Gaurav Puraskar” awarded to CEO, Dr Manisha Bobade</h5>
                        <h6><i class="fa fa-calendar-o" aria-hidden="true"></i> Aug ‘25</h6>
                    </div>
                    </div>
                    <div class="col-md-4"></div>
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