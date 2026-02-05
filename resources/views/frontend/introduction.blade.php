
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
                        <li><a href="index.html"><span class="glyphicon glyphicon-home"></span></a></li>
                        <li><a href="#">About Us</a></li>
                        <li class="active">Introduction</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>


        @php
            $intro      = $sections[0] ?? null;
            $founder    = $sections[1] ?? null;
            $healthcare = $sections[2] ?? null;
            $leader     = $sections[3] ?? null;
            $commitment = $sections[4] ?? null;

            $introImgs  = json_decode($intro->image ?? '[]', true);
            $fImgs      = json_decode($founder->image ?? '[]', true);
            $hImgs      = json_decode($healthcare->image ?? '[]', true);
            $lImgs      = json_decode($leader->image ?? '[]', true);
        @endphp


        <!-- INTRO -->

        <section class="section-wrap introduction_wrap">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 no-padding">
                        <div class="about-us-img">

                            @if(isset($introImgs[0]))
                                <img src="{{ asset('uploads/about/'.$introImgs[1]) }}" class="pq-image9">
                            @endif

                            @if(isset($introImgs[1]))
                                <img src="{{ asset('uploads/about/'.$introImgs[0]) }}" class="pq-image10">
                            @endif

                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <div class="introduction-content">
                            {!! $intro->desc ?? '' !!}
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <!-- FOUNDER -->

        <section class="section-wrap founder_wrap">
            <div class="container">

                <div class="row">

                    <div class="col-md-5">
                        <div class="founder-img">
                            <div class="cs_about_thumbnail">
                                <div class="cs_about_thumbnail_1 cs_hide_before_after">

                                    @if(isset($fImgs[0]))
                                        <img src="{{ asset('uploads/about/'.$fImgs[0]) }}">
                                    @endif

                                    <div class="cs_commentbox cs_accent_bg">
                                        {!! $founder->note ?? '' !!}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="founder-content">

                            <h5>{{ $founder->heading ?? '' }}</h5>

                            {!! $founder->desc ?? '' !!}

                        </div>
                    </div>

                </div>

                <hr>

                <!-- HEALTHCARE -->

                <div class="row">

                    <div class="col-md-7">
                        <div class="founder-content">

                            <h5>{{ $healthcare->heading ?? '' }}</h5>

                            {!! $healthcare->desc ?? '' !!}

                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="creative-thumb">

                            @if(isset($hImgs[0]))
                                <img src="{{ asset('uploads/about/'.$hImgs[0]) }}">
                            @endif

                        </div>
                    </div>

                </div>

            </div>
        </section>


        <!-- LEADERSHIP -->

        <section class="section-wrap founder_wrap_one">
            <div class="container">

                <div class="row">

                    <div class="col-md-5">
                        <div class="founder-img">
                            <div class="cs_about_thumbnail">
                                <div class="cs_about_thumbnail_1 cs_hide_before_after">

                                    @if(isset($lImgs[0]))
                                        <img src="{{ asset('uploads/about/'.$lImgs[0]) }}">
                                    @endif

                                    <div class="cs_commentbox cs_accent_bg">
                                        {!! $leader->note ?? '' !!}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="founder-content">

                            <h5>{{ $leader->heading ?? '' }}</h5>

                            {!! $leader->desc ?? '' !!}

                        </div>
                    </div>

                </div>

                <hr>

                <!-- COMMITMENT -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="founder-content">

                            <h5>{{ $commitment->heading ?? '' }}</h5>

                            {!! $commitment->desc ?? '' !!}

                        </div>
                    </div>
                </div>

            </div>
        </section>


        @include('components.frontend.footer')
     
        @include('components.frontend.main-js')

    </body>
</html>