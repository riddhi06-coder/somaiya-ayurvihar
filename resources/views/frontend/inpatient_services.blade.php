
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
                        <li>Patient Services</li>
                        <li class="active">Inpatient Services</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>


        @if ($details)

            <section class="section-wrap inpatient_services_wrap lists ">
                <div class="container">
            
                    {{-- ============ Intro (Image + Description) ============ --}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="content-img">
                                <img src="{{ asset('uploads/inpatient_service/' . $details->intro_image) }}" class="img-responsive" alt="Inpatient Services">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="content">
                                {!! $details->intro_desc !!}
                            </div>
                        </div>
                    </div>
            
                    {{-- ============ Admission Process ============ --}}
                    <div class="row admission-process-row ">
                        <div class="col-md-12">
                            <div class="content">
                                <h5>{{ $details->admission_heading }}</h5>
                                {!! $details->admission_desc !!}
                            </div>
                        </div>
                    </div>
            
                    {{-- ============ Documents Required for Admission ============ --}}
                    <div class="row inpatient-row ">
                        <div class="col-md-6">
                            <div class="content ">
                                <h5>{{ $details->documents_heading }}</h5>
                                {!! $details->documents_desc !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="content-img">
                                <img src="{{ asset('uploads/inpatient_service/' . $details->documents_image) }}" class="img-responsive" alt="{{ $details->documents_heading }}">
                            </div>
                        </div>
                    </div>
            
                    {{-- ============ Discharge Process ============ --}}
                    <div class="row inpatient-row">
                        <div class="col-md-6">
                            <div class="content-img discharge-img">
                                <img src="{{ asset('uploads/inpatient_service/' . $details->discharge_image) }}" class="img-responsive" alt="{{ $details->discharge_heading }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="content lists">
                                <h5>{{ $details->discharge_heading }}</h5>
                                {!! $details->discharge_desc !!}
                            </div>
                        </div>
                    </div>
            
                </div>
            </section>
            
            
                        
            {{-- ============ Super-Specialty Hospital + Day Care Facility ============ --}}
            <section class="section-wrap inpatient_services_three lists">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="content">
                                <h5>{{ $details->super_specialty_heading }}</h5>
                            </div>
                        </div>
                    </div>
            
                    <div class="row">
                       @foreach ($superSpecialtyData as $item)
                            <div class="col-md-3">
                                <div class="hospital-iconbox lists">
                                    <div class="owl-carousel owl-theme" id="room-gallery">
                                        @if (!empty($item['images']) && is_array($item['images']))
                                            @foreach ($item['images'] as $img)
                                              <div class="item">
                                                <div class="single-single-gallery">
                                                  <div class="single-gallery">
                                                    <a href="{{ asset($img) }}" 
                                                      data-fancybox="gallery" 
                                                      class="gallery-hover">
                                                      <img src="{{ asset($img) }}" class="img-responsive">
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
                                    <div class="iconbox-icon">
                                        <span>{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                    </div>
                                    <h4>{{ $item['title'] ?? '' }}</h4>
                                    {!! $item['description'] ?? '' !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
            
                    <div class="row">
                        <div class="col-md-12">
                            <div class="content">
                                <h5>{{ $details->day_care_heading }}</h5>
                                {!! $details->day_care_desc !!}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            
    
    
            {{-- ============ Rooms & Tariff Plan Details + ICU + Tariff Notes ============ --}}
            <section class="section-wrap inpatient_services_two lists">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="content">
                                <h5>{{ $details->room_tariff_heading }}</h5>
                                <h6>{{ $details->room_tariff_title }}</h6>
                            </div>
                        </div>
                    </div>
            
                    <div class="row">
                        @foreach ($roomTariffData as $item)
                            <div class="col-md-3">
                                <div class="hospital-iconbox lists">
                                    <div class="iconbox-icon">
                                        <span>{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                    </div>
                                    <h4>{{ $item['title'] ?? '' }}</h4>
                                    {!! $item['description'] ?? '' !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
            
                    <div class="row">
                        <div class="col-md-6">
                            <div class="content">
                                <h5>{{ $details->icu_heading }}</h5>
                                {!! $details->icu_desc !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="content">
                                <h5>{{ $details->tariff_notes_heading }}</h5>
                                {!! $details->tariff_notes_desc !!}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            

            {{-- ============ FAQ ============ --}}
            <section class="section-wrap faq_page lists">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="content wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
                                <h5>{{ $details->faq_heading }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="panel-group" id="faqAccordion">
                                @foreach ($faqData as $index => $item)
                                    <div class="panel panel-default">
                                        <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq{{ $index + 1 }}">
                                            <h4 class="panel-title">
                                                {{ $item['question'] ?? '' }}
                                                <i class="fa fa-chevron-down"></i>
                                            </h4>
                                        </div>
                                        <div id="faq{{ $index + 1 }}" class="panel-collapse collapse {{ $loop->first ? 'in' : '' }}">
                                            <div class="panel-body">
                                                {!! $item['answer'] ?? '' !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="faq-img">
                                <img src="{{ asset('uploads/inpatient_service/' . $details->faq_image) }}" class="img-responsive" alt="{{ $details->faq_heading }}">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        
        @endif

        @include('components.frontend.footer')
        
        @include('components.frontend.main-js')
        
        
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
  </body>
</html>