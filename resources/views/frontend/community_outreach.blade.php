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

        @if ($details)

        {{-- ============ Intro + UHTC + Core services + Public health ============ --}}
        <section class="section-wrap community_outreach_wrap lists">
            <div class="container">

                {{-- Intro --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="content">
                            {!! $details->intro_desc !!}
                        </div>
                    </div>
                </div>

                {{-- UHTC (description + image) --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="community_outreach_content">
                            <div class="wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
                                {!! $details->uhtc_desc !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="csr-img">
                            <img src="{{ asset('uploads/community_outreach/' . $details->uhtc_image) }}"
                                 class="img-responsive" alt="Urban Health Training Centre">
                        </div>
                    </div>
                </div>

               <div class="row">
                    <div class="col-md-6">
                        <div class="urban_list">
                            {!! $details->core_services_desc !!}
                        </div>
                    </div>
                
                    <div class="col-md-6">
                        <div class="urban_list">
                            {!! $details->public_health_desc !!}
                        </div>
                    </div>
                </div>
                {{-- Short description below --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="content">
                            {!! $details->public_health_short_desc !!}
                        </div>
                    </div>
                </div>

            </div>
        </section>


        {{-- ============ SAHAS + Impact & Key areas ============ --}}
        <section class="section-wrap community_outreach_two lists">
            <div class="container">

                <div class="row">
                    <div class="col-md-6">
                        <div class="csr-img">
                            <img src="{{ asset('uploads/community_outreach/' . $details->sahas_image) }}"
                                 class="img-responsive" alt="SAHAS">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="community_outreach_content">
                            <div class="wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
                                {!! $details->sahas_desc !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="urban_list">
                            {!! $details->impact_desc !!}
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="urban_list">
                            {!! $details->keyarea_desc !!}
                        </div>
                    </div>
                </div>

            </div>
        </section>


        {{-- ============ RHTC, Lodhivali ============ --}}
        <section class="section-wrap community_outreach_three lists">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="csr-img">
                            <img src="{{ asset('uploads/community_outreach/' . $details->rhtc_image) }}"
                                 class="img-responsive" alt="Rural Health Training Centre">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="content">
                            {!! $details->rhtc_desc !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>


        {{-- ============ Preventive & School-Based Outreach Programmes ============ --}}
        <section class="section-wrap community_outreach_four lists">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="content text-center wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
                            {!! $details->preventive_desc !!}
                        </div>
                    </div>
                </div>

                {{-- Programmes carousel (dynamic from JSON) --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme" id="outreach-services">
                            @foreach ($programmes as $programme)
                                <div class="item">
                                    <div class="thumb-card">
                                        <div class="thumb-img">
                                            <img src="{{ asset('uploads/community_outreach/' . ($programme['image'] ?? '')) }}"
                                                 alt="{{ $programme['title'] ?? '' }}">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>{{ $programme['title'] ?? '' }}</h4>
                                            {!! $programme['description'] ?? '' !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- A Commitment Beyond the Hospital --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="content text-center">
                            {!! $details->commitment_desc !!}
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