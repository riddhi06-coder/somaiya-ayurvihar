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
                        
                        {!! $details->introduction !!}
                    </div>
                </div>
                </div>
                <div class="row">
                <!-- <div class="col-md-2">

                </div> -->
                <div class="col-md-12">
                    <div class="rights_responsibilities_content wow fadeInRight" data-wow-delay="00ms"
                    data-wow-duration="1500ms">
                    <div class="section-heading lists">
                         {!! $details->patient_desc !!}
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <div class="rights_responsibilities_content wow fadeInLeft" data-wow-delay="00ms"
                    data-wow-duration="1500ms">
                        <div class="section-heading lists">
                            {!! $details->patient_rights_desc !!}
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
                <h5>{{ $details->faq_heading }}</h5>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="panel-group" id="faqAccordion">
            
                        @if(!empty($details->faq))
                            @foreach($details->faq as $index => $faq)
            
                            <div class="panel panel-default">
                                <div class="panel-heading"
                                     data-toggle="collapse"
                                     data-parent="#faqAccordion"
                                     href="#faq{{ $index }}">
            
                                    <h4 class="panel-title">
                                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}.
                                        {{ $faq['question'] ?? '' }}
                                        <i class="fa fa-chevron-down"></i>
                                    </h4>
                                </div>
            
                                <div id="faq{{ $index }}"
                                     class="panel-collapse collapse {{ $index == 0 ? 'in' : '' }}">
            
                                    <div class="panel-body">
                                        {!! $faq['answer'] ?? '' !!}
                                    </div>
                                </div>
                            </div>
            
                            @endforeach
                        @endif
            
                    </div>
                </div>
            
                <div class="col-md-5">
                    <div class="faq-img">
                        <img src="{{ asset('uploads/faq/'.$details->faq_image) }}"
                             class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
        </section>

        

        @include('components.frontend.footer')
        
        @include('components.frontend.main-js')

  </body>
</html>