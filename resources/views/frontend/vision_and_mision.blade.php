
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
                                <li class="active">{{ $vision_and_mision->banner_heading }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="section-wrap vision_mission_wrap">
            <div class="container">
                <div class="row">
                    {{-- Banner Image --}}
                    <div class="col-md-5">
                        <div class="vison-mision-img">
                            <img src="{{ asset('uploads/vision_mission/' . ($vision_and_mision->image ?? 'img/about/our-founder.jpg')) }}" class="img-responsive" alt="Vision & Mission Banner">
                        </div>
                    </div>

                    {{-- Vision & Mission Details --}}
                    <div class="col-md-7">
                        @php
                            $visionMissionDetails = json_decode($vision_and_mision->vision_mission_details, true);
                        @endphp

                        @if($visionMissionDetails)
                            @foreach($visionMissionDetails as $key => $detail)
                            <div class="vison-mision-box">
                                <div class="vison-mision-num">{{ str_pad($key + 1, 2, '0', STR_PAD_LEFT) }}</div>
                                <h2>{{ $detail['heading'] }}</h2>
                                <p>{{ $detail['description'] }}</p>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>


        <section class="section-wrap our_value_wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content text-center wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <h5>{{ $vision_and_mision->section_heading }}</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="owl-carousel owl-theme" id="our-value">
                        @php
                            $values = json_decode($vision_and_mision->values, true);
                        @endphp

                        @if($values)
                            @foreach($values as $value)
                            <div class="item">
                                <div class="our_value_box">
                                    <div class="our_value_icon">
                                        <img src="{{ asset('uploads/vision_mission/' . $value['icon']) }}" alt="{{ $value['heading'] }}">
                                    </div>
                                    <div>
                                        <h5>{{ $value['heading'] }}</h5>
                                        <p>{{ $value['description'] }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>


        @include('components.frontend.footer')
        
        @include('components.frontend.main-js')


  </body>
</html>