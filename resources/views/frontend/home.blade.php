
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
        <section class="outter hero-video">
          <div class="video-container">
            @if($videoSlider && $videoSlider->banner_media)
              <video src="{{ asset('home/bannerimagevideo/' . $videoSlider->banner_media) }}" autoplay muted loop playsinline></video>
            @endif

            <div class="callout">
              <div class="search-banner-front-box-wrap aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                <div class="container">
                  <div class="row">
                    <!-- Box 1 -->
                    <div class="col-md-4 col-sm-4 col-xs-6">
                      <div class="front-box text-center hvr-icon-grow">
                        <div class="single-text-front">
                          <a href="#" type="button" data-toggle="modal" data-target="#bookappointment" style="">                        <h4>
                              Book Appointment 
                              <svg viewBox="0 0 511.99 512" xmlns="http://www.w3.org/2000/svg">
                                <g id="Layer_2" data-name="Layer 2">
                                  <g id="Layer_1_copy_7" data-name="Layer 1 copy 7">
                                    <g id="_3" data-name="3">
                                      <path d="m256 25a231.07 231.07 0 0 1 89.9 443.86 231.07 231.07 0 0 1 -179.82-425.72 229.49 229.49 0 0 1 89.92-18.14m0-25c-141.4 0-256 114.63-256 256s114.6 256 256 256 256-114.61 256-256-114.61-256-256-256z"/>
                                      <path d="m130.99 229.33h150.33l-60.77-62.22h73.63l86.81 88.9-86.81 88.88h-73.63l60.77-62.23h-150.33z"/>
                                    </g>
                                  </g>
                                </g>
                              </svg>
                            </h4>
                          </a>
                        </div>
                      </div>
                    </div>

                    <!-- Box 2 -->
                    <div class="col-md-4 col-sm-4 col-xs-6">
                      <div class="front-box text-center hvr-icon-grow">
                        <div class="single-text-front">
                          <a href="#">
                            <h4>
                              Find A Doctor 
                              <svg viewBox="0 0 511.99 512" xmlns="http://www.w3.org/2000/svg">
                                <g id="Layer_2" data-name="Layer 2">
                                  <g id="Layer_1_copy_7" data-name="Layer 1 copy 7">
                                    <g id="_3" data-name="3">
                                      <path d="m256 25a231.07 231.07 0 0 1 89.9 443.86 231.07 231.07 0 0 1 -179.82-425.72 229.49 229.49 0 0 1 89.92-18.14m0-25c-141.4 0-256 114.63-256 256s114.6 256 256 256 256-114.61 256-256-114.61-256-256-256z"/>
                                      <path d="m130.99 229.33h150.33l-60.77-62.22h73.63l86.81 88.9-86.81 88.88h-73.63l60.77-62.23h-150.33z"/>
                                    </g>
                                  </g>
                                </g>
                              </svg>
                            </h4>
                          </a>
                        </div>
                      </div>
                    </div>

                    <!-- Box 3 -->
                    <div class="col-md-4 col-sm-4 col-xs-6">
                      <div class="front-box text-center hvr-icon-grow">
                        <div class="single-text-front">
                          <a href="#">
                            <h4>
                              Book Health Check 
                              <svg viewBox="0 0 511.99 512" xmlns="http://www.w3.org/2000/svg">
                                <g id="Layer_2" data-name="Layer 2">
                                  <g id="Layer_1_copy_7" data-name="Layer 1 copy 7">
                                    <g id="_3" data-name="3">
                                      <path d="m256 25a231.07 231.07 0 0 1 89.9 443.86 231.07 231.07 0 0 1 -179.82-425.72 229.49 229.49 0 0 1 89.92-18.14m0-25c-141.4 0-256 114.63-256 256s114.6 256 256 256 256-114.61 256-256-114.61-256-256-256z"/>
                                      <path d="m130.99 229.33h150.33l-60.77-62.22h73.63l86.81 88.9-86.81 88.88h-73.63l60.77-62.23h-150.33z"/>
                                    </g>
                                  </g>
                                </g>
                              </svg>
                            </h4>
                          </a>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <section class="specialities-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="section-heading wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <h2>Specialities</h2>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="owl-carousel owl-theme" id="specialities">
                        @foreach($specialities as $index => $item)
                            <div class="item">
                                <div class="row no-gutter">
                                    
                                    <!-- LEFT CARD -->
                                    <div class="col-md-5 col-sm-12">
                                        <div class="medixal-card">
                                            
                                            <!-- Number -->
                                            <div class="medixal-icon">
                                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                            </div>

                                            <!-- Title -->
                                            <h2>{{ $item->subcategory_name }}</h2>

                                            <!-- Description -->
                                            <p>{{ $item->desc ?? 'No description available.' }}</p>

                                            <!-- Links -->
                                            <a href="#" class="medixal-link">
                                                Find a Doctor <span>↗</span>
                                            </a>
                                            <a href="{{ url('speciality/'.$item->slug) }}" class="medixal-link">
                                                Know More <span>↗</span>
                                            </a>

                                        </div>
                                    </div>

                                    <!-- RIGHT IMAGE -->
                                    <div class="col-md-7 col-sm-12">
                                        <div class="medixal-img">
                                            <img src="{{ $item->home_image 
                                                ? asset('uploads/specialities/'.$item->home_image) 
                                                : asset('frontend/assets/img/specialities/default.jpg') }}" 
                                                class="img-responsive" alt="{{ $item->subcategory_name }}">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>


        <section class="award-wrap">
          <div class="container">

              @if($announcements->count())
                {{-- Title & Heading from first record --}}
                <div class="row">
                  <div class="col-md-12">
                    <div class="section-heading wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
                      <h2>{{ $announcements[0]->title }}</h2>
                      <p>{{ $announcements[0]->heading }}</p> {{-- or heading if you want --}}
                    </div>
                  </div>
                </div>
              @endif

                <div class="row">
                  @foreach($announcements as $announcement)
                      @php
                          $texts = $announcement->text ? explode('|', $announcement->text) : [];
                          $images = $announcement->images ? explode('|', $announcement->images) : [];
                          $descriptions = $announcement->description ? explode('|', $announcement->description) : [];
                      @endphp

                      @foreach($texts as $i => $text)
                          <div class="col-md-4">
                              <div class="case-card">
                                  <div class="case-img">
                                      <img src="{{ isset($images[$i]) ? asset('home/announcements/' . $images[$i]) : asset('home/announcements/default.jpg') }}" 
                                          class="img-responsive" alt="Announcement Image">
                                  </div>
                                  <span class="case-cat">{{ $text }}</span>
                                  <h3>{{ $descriptions[$i] ?? '' }}</h3>
                                  <a href="#" class="case-link">Learn More <span>↗</span></a>
                              </div>
                          </div>
                      @endforeach
                  @endforeach
              </div>


          </div>
        </section>

        <section class="hospital-awards">
          <div class="container">

              <div class="row align-item">
                  {{-- Accreditations --}}
                  <div class="col-md-5 no-padding">
                      <div class="accreditations_div">

                          @if($awardDetails?->accreditation_heading)
                              <div class="section-heading wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
                                  <h2>{{ $awardDetails->accreditation_heading }}</h2>
                              </div>
                          @endif

                          @if(!empty($awardDetails->accreditation_images))
                              <ul class="accreditations_logo">
                                  @foreach($awardDetails->accreditation_images as $img)
                                      <li>
                                          <img src="{{ asset('home/awards/' . $img) }}" alt="Accreditation">
                                      </li>
                                  @endforeach
                              </ul>
                          @endif

                      </div>
                  </div>

                  {{-- Awards --}}
                  <div class="col-md-7 border-left">

                      @if($awardDetails?->award_heading)
                          <div class="section-heading award_title wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
                              <h2>{{ $awardDetails->award_heading }}</h2>
                          </div>
                      @endif

                      @if(!empty($awardDetails->award_images))
                          <div class="owl-carousel owl-theme" id="awards">
                              @foreach($awardDetails->award_images as $img)
                                  <div class="item">
                                      <img src="{{ asset('home/awards/' . $img) }}"
                                          class="gallery-img"
                                          onclick="openImage(this.src)"
                                          alt="Award">
                                  </div>
                              @endforeach
                          </div>
                      @endif

                  </div>
              </div>

          </div>
        </section>


        <hr style="border-top: 1px solid #c1c1c187;margin-top:0px;">

        <section class="counter-wrap">
            <div class="container">

                {{-- Heading + Description --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="section-heading wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <h2>{{ $compassion?->heading }}</h2>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="section-heading wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <p>{{ $compassion?->description }}</p>
                        </div>
                    </div>
                </div>

                {{-- Counters --}}
                @if(!empty($compassion?->items))
                <div class="row" id="counter">
                    @foreach($compassion->items as $item)
                        <div class="col-md-4">
                            <div class="counter-box hvr-float">

                                {{-- Icon --}}
                                @if(!empty($item['icon']))
                                    <div class="counter-icon">
                                        <img src="{{ asset('home/compassion/' . $item['icon']) }}" alt="{{ $item['title'] }}">
                                    </div>
                                @endif

                                {{-- Value --}}
                                <div class="counter-value" data-count="{{ preg_replace('/[^0-9]/', '', $item['value']) }}">
                                    {{ $item['value'] }}
                                </div>

                                {{-- Title --}}
                                <h3>{{ $item['title'] }}</h3>

                            </div>
                        </div>
                    @endforeach
                </div>
                @endif

            </div>
        </section>

        <section class="patient-testi">
          <div class="container">

              {{-- Heading --}}
              <div class="row">
                  <div class="col-md-12">
                      <div class="section-heading wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
                          <h2>{{ $testimonial?->heading }}</h2>
                          <p>{{ $testimonial?->title }}</p>
                      </div>
                  </div>
              </div>

              {{-- Testimonials Slider --}}
              @if(!empty($testimonial?->items))
              <div class="row">
                  <div class="owl-carousel owl-theme" id="testimonial">

                      @foreach($testimonial->items as $item)
                          <div class="item">
                              <div class="video_testi">

                                  <div class="video-box"
                                      data-toggle="modal"
                                      data-target="#videoModal"
                                      data-video="{{ asset('home/testimonials/' . $item['video']) }}">

                                      <img src="{{ asset('home/testimonials/' . $item['image']) }}"
                                          class="img-responsive"
                                          alt="{{ $item['title'] }}">

                                      <div class="play-btn">
                                          <i class="fa fa-play"></i>
                                      </div>
                                  </div>

                                  <div class="video-title">
                                      {{ $item['title'] }}
                                  </div>

                              </div>
                          </div>
                      @endforeach

                  </div>
              </div>
              @endif

          </div>
        </section>

    
      @include('components.frontend.footer')

           
      @include('components.frontend.main-js')


      

  </body>
</html>