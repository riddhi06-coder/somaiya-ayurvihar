
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



    <!----- Banner Details ----->
    <section class="speciality_banner">
        <div class="container">
            <div class="row speciality_banner_img">
                <div class="col-md-12">

                    <div class="speciality_banner_content wow fadeInUp">

                        <h1>{{ $service->banner_heading }}</h1>

                        <h2>{{ $service->banner_title }}</h2>

                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb custom-breadcrumb">

                                <li>
                                    <a href="{{ url('/') }}">
                                        <span class="glyphicon glyphicon-home"></span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        Medical Services
                                    </a>
                                </li>


                                <li>
                                    <a href="#">
                                        {{ $service->subcategory->subcategory_name ?? '' }}
                                    </a>
                                </li>

                                <li class="active">
                                    {{ $service->service->service_name ?? '' }}
                                </li>

                            </ol>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>


    <!----- Page Headers ----->
    <section class="speciality-tabs">
        <div class="container">
            <div class="row">
            <div class="apollo-tabs-placeholder"></div>
            <div class="apollo-tabs-wrapper">
                <div class="apollo-tabs dignostic_tabs" id="apolloTabs">
                <button class="tab-arrow left" type="button">&#10094;</button>
                    <ul class="nav nav-tabs tab-scroll">

                    @php
                    $targets = [
                        'overview',
                        'our-services',
                        'technology-safety-and-reporting-standards-section',
                        'faq'
                    ];
                    @endphp

                    @foreach($service->page_headers as $key => $header)

                    <li class="{{ $key == 0 ? 'active' : '' }}">
                        <a href="javascript:void(0)" data-target="{{ $targets[$key] }}">
                            {{ $header['title'] }}
                        </a>
                    </li>

                    @endforeach

                    </ul>

                <button class="tab-arrow right" type="button">&#10095;</button>
                </div>
            </div>
            </div>
        </div>
    </section>

    <div id="overview" class="tab_section ck-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="services-overview">
                        <div class="cs_about_thumbnail">
                            <div class="cs_about_thumbnail_1">
                                <img src="{{ asset('uploads/service-details/' . $service->section_image[1]) }}" class="img-responsive" alt="Image">
                                <a href="https://www.youtube.com/embed/rRid6GCJtgc" class="cs_player_btn cs_style_1 cs_video_open">
                                    <span class="cs_play_btn_text cs_fs_18 cs_semibold cs_accent_color">{{ $service->subcategory->subcategory_name ?? '' }}</span>
                                </a>
                            </div>
                            <div class="cs_about_thumbnail_2">
                                <img src="{{ asset('uploads/service-details/' . $service->section_image[0]) }}" class="img-responsive" alt="About Image">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="services-content">
                        {!! $service->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="our-services" class="tab_section grey-bg">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <div class="ourservices_content">

                        <div class="section-heading">
                            <h2>{{ $service->service_heading }}</h2>
                        </div>

                        <div class="lists">
                            {!! $service->service_desc !!}
                        </div>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="ourservices_img">

                        <div class="owl-carousel owl-theme" id="ourservices-img">

                            @foreach($service->service_image as $img)
                                <div class="item">
                                    <img src="{{ asset('uploads/service-details/'.$img) }}"
                                        class="img-responsive">
                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    
    <div id="technology-safety-reporting-standards" class="tab_section">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <div class="tsars-img-sec">
                        <img src="{{ asset('uploads/service-details/'.$service->special_image) }}"
                            class="img-responsive">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="tsars-title-sec">

                        <div class="section-heading">
                            <h2>{{ $service->special_heading }}</h2>
                        </div>

                        <div class="lists">
                            {!! $service->special_desc !!}
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-------------faq ------------->
    <div id="faq" class="tab_section ck-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <h2>{{ $service->faq_heading }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="panel-group" id="faqAccordion">
                        @foreach($service->faq as $index => $faq)
                            <div class="panel panel-default">
                                <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq{{ $index + 1 }}">
                                    <h4 class="panel-title">
                                        {{ sprintf('%02d', $index + 1) }}. {!! $faq['question'] !!}
                                        <i class="fa fa-chevron-down"></i>
                                    </h4>
                                </div>
                                <div id="faq{{ $index + 1 }}" class="panel-collapse collapse @if($index === 0) in @endif">
                                    <div class="panel-body">
                                        {!! $faq['answer'] !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="faq-img">
                    <img src="https://careon.themehealer.com/assets/images/resources/faq-one-img-1.jpg" class="img-responsive">
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <section class="hospital-cta">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="cta-content animate-text">
                        <span class="cta-icon">
                            <i class="fa fa-heartbeat"></i>
                        </span>
                        <h5>{{ $service->book_desc ?? 'Default description here' }}</h5>
                        <h2>{{ $service->book_heading ?? 'Default heading here' }}</h2>
                    </div>
                </div>

                <div class="col-md-3 text-right">
                    <div class="cta-action animate-btn">
                        <a type="button" data-toggle="modal" data-target="#bookappointment-services" class="btn-cta-primary">
                            <i class="fa fa-calendar"></i> Book Appointment
                        </a>
                        <a href="#" class="btn-cta-outline">
                            <i class="fa fa-phone"></i> Call Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('components.frontend.footer')
     
    @include('components.frontend.main-js')


    <script>
        $(document).ready(function () {
        
            var tabs = $('.apollo-tabs');
            var tabList = $('.tab-scroll');
            var headerHeight = $('#header-sticky').outerHeight() || 90;
            var tabOffset = $('.apollo-tabs-wrapper').offset().top;
            var isSticky = false;
        
            function checkTabOverflow() {
            if (tabList[0].scrollWidth > tabList[0].clientWidth + 5) {
                tabs.addClass('enable-scroll');
            } else {
                tabs.removeClass('enable-scroll');
                tabList.scrollLeft(0);
            }
            }
        
            function prepareStickyPosition() {
            var container = $('.speciality-tabs .container');
            var containerWidth = container.outerWidth();
            var containerLeft = container.offset().left;
        
            tabs.css({
                width: containerWidth + 'px',
                left: containerLeft + 'px',
                transform: 'none'
            });
            }
        
            function enableSticky() {
            if (isSticky) return;
        
            prepareStickyPosition();
        
            $('.apollo-tabs-placeholder')
                .height(tabs.outerHeight())
                .show();
        
            tabs.addClass('is-sticky');
            isSticky = true;
            }
        
            function disableSticky() {
            if (!isSticky) return;
        
            tabs.removeClass('is-sticky').removeAttr('style');
            $('.apollo-tabs-placeholder').hide();
            isSticky = false;
            }
        
            // INIT
            checkTabOverflow();
        
            $(window).on('resize', function () {
            checkTabOverflow();
            if (isSticky) prepareStickyPosition();
            });
        
            // SCROLL
            $(window).on('scroll', function () {
            if ($(window).scrollTop() >= tabOffset - headerHeight) {
                enableSticky();
            } else {
                disableSticky();
            }
            });
        
            // TAB CLICK
            $('.apollo-tabs a').on('click', function () {
            var target = $('#' + $(this).data('target'));
            if (!target.length) return;
        
            $('html, body').animate({
                scrollTop: target.offset().top - headerHeight - tabs.outerHeight()
            }, 600);
        
            $('.apollo-tabs li').removeClass('active');
            $(this).parent().addClass('active');
            });
        
            // AUTO ACTIVE TAB
            $(window).on('scroll', function () {
            var scrollPos = $(window).scrollTop();
        
            $('section[id]').each(function () {
                var top = $(this).offset().top - headerHeight - tabs.outerHeight() - 20;
                var bottom = top + $(this).outerHeight();
                var id = $(this).attr('id');
        
                if (scrollPos >= top && scrollPos < bottom) {
                $('.apollo-tabs li').removeClass('active');
                var activeTab = $('.apollo-tabs a[data-target="' + id + '"]')
                    .parent().addClass('active');
        
                if (tabs.hasClass('enable-scroll')) {
                    tabList.stop().animate({
                    scrollLeft: activeTab.position().left + tabList.scrollLeft() - 50
                    }, 200);
                }
                }
            });
            });
        
            // ARROWS
            $('.tab-arrow.left').click(function () {
            tabList.animate({ scrollLeft: '-=200' }, 300);
            });
        
            $('.tab-arrow.right').click(function () {
            tabList.animate({ scrollLeft: '+=200' }, 300);
            });
        
        }); 
    </script>

    

  </body>
</html>