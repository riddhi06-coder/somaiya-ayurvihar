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
                        {!! $csr->desc !!}
                    </div>
                </div>
                </div>
                
                
                <div class="row csr_info_row">
                    <div class="col-md-5">
                        <div class="community_outreach_img">
                          <img 
                                src="{{ !empty($csr->uhtc_image) 
                                        ? asset('uploads/csr/'.$csr->uhtc_image) 
                                        : asset('frontend/assets/img/about/community/urban-health-training-center.jpg') }}" 
                                class="img-responsive">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="content lists">
                        <h5>{{ $csr->uhtc_heading }}</h5>
                        
                        {!! $csr->uhtc_desc !!}
                        </div>
                    </div>
                </div>
                
                
                <div class="row csr_info_row">
    
                    <div class="col-md-7">
                        <div class="content lists">
                
                            <h5>{{ $csr->support_heading ?? '' }}</h5>
                
                            {!! $csr->support_desc ?? '' !!}
                
                        </div>
                    </div>
                
                    <div class="col-md-5">
                        <div class="community_outreach_img">
                            <img 
                                src="{{ !empty($csr->support_image) 
                                        ? asset('uploads/csr/'.$csr->support_image) 
                                        : asset('frontend/assets/img/about/community/SAHAS.jpg') }}" 
                                class="img-responsive">
                        </div>
                    </div>
                
                </div>
                
                
                <div class="row csr_info_row">
    
                    <div class="col-md-5">
                        <div class="community_outreach_img">
                            <img 
                                src="{{ !empty($csr->community_image) 
                                        ? asset('uploads/csr/'.$csr->community_image) 
                                        : asset('frontend/assets/img/about/our-founder.jpg') }}" 
                                class="img-responsive">
                        </div>
                    </div>
                
                    <div class="col-md-7">
                        <div class="content lists">
                
                            <h5>{{ $csr->community_heading ?? '' }}</h5>
                
                            {!! $csr->community_desc ?? '' !!}
                
                        </div>
                    </div>
                
                </div>
                
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="content">
                        {!! $csr->donation_desc !!}
                        
                        {!! $csr->inclusive_desc !!}
                        </div>
                    </div>
                </div>
                
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme" id="csr-gallery">
                
                            @if(!empty($gallery))
                                @foreach($gallery as $img)
                                    <div class="item">
                                        <div class="single-single-gallery">
                                            <div class="single-gallery">
                                                <a href="{{ asset('uploads/csr/'.$img) }}" 
                                                   data-fancybox="gallery" 
                                                   class="gallery-hover">
                
                                                    <img src="{{ asset('uploads/csr/'.$img) }}" class="img-responsive">
                
                                                    <div class="overlay">
                                                        <span class="plus-icon">+</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                
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