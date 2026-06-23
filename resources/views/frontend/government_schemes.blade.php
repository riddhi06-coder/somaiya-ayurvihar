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



       @if ($details)

{{-- ============ Government Schemes (MJPJAY) ============ --}}
<section class="section-wrap government_schemes_wrap lists">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="government_content">
                   {!! $details->cghs_beneficiaries !!}
                   
                   {!! $details->assistance_cghs !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="government_content">

                    {{-- Intro (CKEditor content, includes its own heading) --}}
                    {!! $details->intro_desc !!}

                    {{-- Eligibility Criteria description --}}
                    {!! $details->eligibility_desc !!}

                    {{-- Eligibility cards (first letter highlighted in <span>) --}}
                    <div class="row">
                        @foreach ($eligibilityTitles as $title)
                            <div class="col-md-3">
                                <div class="eligibility-criteria">
                                    <h2><span>{{ mb_substr($title, 0, 1) }}</span>{{ mb_substr($title, 1) }}</h2>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- MJPJAY at K J Somaiya (Research Centre block) --}}
                    {!! $details->research_desc !!}

                </div>
            </div>
        </div>

        {{-- ============ Medical Social Worker / Aarogyamitra ============ --}}
        <div class="row medical-worker-row">
            <div class="col-md-6">
                <div class="government_content">
                    {!! $details->social_worker_desc !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="content-img">
                    <img src="{{ asset('uploads/government_schemes/' . $details->social_worker_image) }}"
                         class="img-responsive" alt="Medical Social Worker">
                </div>
            </div>
        </div>
        <div class="clear"></div>

        {{-- ============ MJPJAY Process: Step-by-Step Guide ============ --}}
        <div class="row">
            <div class="col-md-12">
                <div class="government_content">
                    <h5>{{ $details->short_heading }}</h5>
                </div>
            </div>

            <div class="process-timeline">
                @foreach ($mjpjaySteps as $step)
                    <div class="process-step">
                        <div class="step-circle">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</div>
                        <div class="step-box">
                            <h4>{{ $step['title'] ?? '' }}</h4>
                            {!! $step['description'] ?? '' !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <hr>

        {{-- ============ Contact Information ============ --}}
        <div class="row">
            <div class="col-md-12">
                <div class="government_content">
                    <h5>{{ $details->contact_heading }}</h5>
                    <h6>{{ $details->contact_title }}</h6>
                    <div class="contact_information">
                        {!! $details->contact_desc !!}
                    </div>
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
                    <img src="{{ asset('uploads/government_schemes/' . $details->faq_image) }}"
                         class="img-responsive" alt="{{ $details->faq_heading }}">
                </div>
            </div>
        </div>
    </div>
</section>

@endif


        @include('components.frontend.footer')
        
        @include('components.frontend.main-js')

  </body>
</html>