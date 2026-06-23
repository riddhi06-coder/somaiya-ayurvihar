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
                        <li class="active">Visitor Guide</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>


        @if ($details)

{{-- ============ Visitor Information + Visiting Hours ============ --}}
<section class="section-wrap visitor_guide_wrap lists">
    <div class="container">

        {{-- Visitor Information --}}
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h5>{{ $details->visitor_guide_heading }}</h5>
                    {!! $details->visitor_intro_desc !!}
                </div>
            </div>
        </div>

        {{-- Visiting Hours heading + intro --}}
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h5>{{ $details->visiting_hour_heading }}</h5>
                    {!! $details->visiting_hour_desc !!}
                </div>
            </div>
        </div>

        {{-- Visiting Hours cards (dynamic from JSON) --}}
        <div class="row visitor-hours-row">
            @foreach ($visitingHours as $hour)
                <div class="col-md-4">
                    <div class="visitor-hours">
                        <div class="num">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</div>
                        <h6>{{ $hour['title'] ?? '' }}</h6>
                        <p>{!! nl2br($hour['details'] ?? '') !!}</p>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Note below visiting hours --}}
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <p>{!! $details->visiting_desc !!}</p>
                </div>
            </div>
        </div>

    </div>
</section>


{{-- ============ Visitor & Attendant Pass Policy ============ --}}
<section class="section-wrap visitor_guide_wrap_two lists">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 no-padding">
                <div class="content">
                    <h5>{{ $details->visitor_pass_heading }}</h5>
                    {!! $details->visitor_pass_desc !!}
                </div>
            </div>
            <div class="col-md-6 no-padding">
                <div class="content-img">
                    <img src="{{ asset('uploads/visitor_guide/' . $details->visitor_pass_image) }}"
                         class="img-responsive" alt="{{ $details->visitor_pass_heading }}">
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ============ Guidelines for Visitors (Things to Do / Avoid) ============ --}}
<section class="section-wrap visitor_guide_wrap_three lists">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h5>{{ $details->guideline_heading }}</h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="content thing-do-content">
                    {!! $details->guideline_desc !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="content thing-do-content">
                    {!! $details->guideline_description !!}
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
                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}. {{ $item['question'] ?? '' }}
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
                    <img src="{{ asset('uploads/visitor_guide/' . $details->faq_image) }}"
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