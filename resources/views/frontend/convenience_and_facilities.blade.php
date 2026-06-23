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
                        <li class="active">Convenience & Facilities</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>

@if ($details)

{{-- ============ Convenience & Facilities ============ --}}
<section class="section-wrap convenience_facilities_wrap">
    <div class="container">

        {{-- Intro --}}
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    {!! $details->cafeteria_intro_desc !!}
                </div>
            </div>
        </div>

        {{-- ============ Cafeteria ============ --}}
        <div class="row">
            <div class="col-sm-12">
                <div class="content">
                    <h5>{{ $details->cafeteria_heading }}</h5>
                    {!! $details->cafeteria_desc !!}
                </div>
            </div>

            @foreach ($cafeteriaDetails as $item)
                <div class="col-sm-4">
                    <div class="icon-box">
                        <div class="icon-circle">
                            <img src="{{ asset('uploads/convenience_facilities/' . ($item['icon'] ?? '')) }}" alt="{{ $item['title'] ?? '' }}">
                        </div>
                        <h4>{{ $item['title'] ?? '' }}</h4>
                        <p>{!! nl2br($item['details'] ?? '') !!}</p>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- ============ ATM Facility ============ --}}
        <div class="row">
            <div class="col-sm-12">
                <div class="content">
                    <h5>{{ $details->atm_heading }}</h5>
                    {!! $details->atm_desc !!}
                </div>
            </div>

            @foreach ($atmDetails as $item)
                <div class="col-sm-4">
                    <div class="icon-box">
                        <div class="icon-circle">
                            <img src="{{ asset('uploads/convenience_facilities/' . ($item['icon'] ?? '')) }}" alt="{{ $item['title'] ?? '' }}">
                        </div>
                        <h4>{{ $item['title'] ?? '' }}</h4>
                        <p>{!! nl2br($item['details'] ?? '') !!}</p>
                    </div>
                </div>
            @endforeach

            @if ($details->short_atm_desc)
                <div class="col-sm-12">
                    <div class="content">
                        <p>{{ $details->short_atm_desc }}</p>
                    </div>
                </div>
            @endif
        </div>

        {{-- ============ Pharmacy ============ --}}
        <div class="row">
            <div class="col-sm-12">
                <div class="content">
                    <h5>{{ $details->pharmacy_heading }}</h5>
                    {!! $details->pharmacy_desc !!}
                </div>
            </div>

            @foreach ($pharmacyDetails as $item)
                <div class="col-sm-4">
                    <div class="icon-box">
                        <div class="icon-circle">
                            <img src="{{ asset('uploads/convenience_facilities/' . ($item['icon'] ?? '')) }}" alt="{{ $item['title'] ?? '' }}">
                        </div>
                        <h4>{{ $item['title'] ?? '' }}</h4>
                        <p>{!! nl2br($item['details'] ?? '') !!}</p>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- ============ Internet / Wi-Fi ============ --}}
        <div class="row">
            <div class="col-sm-12">
                <div class="content">
                    <h5>{{ $details->internet_heading }}</h5>
                    {!! $details->internet_desc !!}
                </div>
            </div>
        </div>

    </div>
</section>


{{-- ============ FAQ ============ --}}
<section class="section-wrap faq_page">
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
                    <img src="{{ asset('uploads/convenience_facilities/' . $details->faq_image) }}"
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