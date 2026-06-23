
<!DOCTYPE html>
<html lang="en">
  <head>
     @include('components.frontend.head')
     
    <style>
        .testimonial-text,
        .testimonial-text * {
            color: #ffffff !important;
        }
        
        
        /* Modal testimonial text only */
        #testimonial-popup #popup-text,
        #testimonial-popup #popup-text * {
            color: #7c7c7c !important;
        }
        
    </style>

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
            <video 
              autoplay 
              muted 
              loop 
              playsinline 
              preload="none"
              poster="{{ asset('home/bannerimagevideo/video-poster-img.webp') }}" fetchpriority=high>
              <source src="{{ asset('home/bannerimagevideo/' . $videoSlider->banner_media) }}" type="video/mp4">
            </video>
              <!--<video src="{{ asset('home/bannerimagevideo/' . $videoSlider->banner_media) }}" autoplay muted loop playsinline></video>-->
            @endif

            <div class="callout">
              <div class="search-banner-front-box-wrap aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                <div class="container">
                  <div class="row">
                    <!-- Box 1 -->
                    <div class="col-md-4 col-sm-4 col-xs-6">
                      <div class="front-box text-center hvr-icon-grow">
                        <div class="single-text-front">
                          <a href="" type="button" data-toggle="modal" data-target="#bookappointment-services" style="">                        <h4>
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
                          <a href="{{ route('frontend.find_a_doctor') }}">
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
                          <a href="{{ route('frontend.health_packages') }}">
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
                                            <p>{{ $item->desc ?? '' }}</p>

                                            <!-- Links -->
                                            <a href="{{ route('frontend.find_a_doctor') }}" class="medixal-link">
                                                Find a Doctor <span>↗</span>
                                            </a>
                                            <a href="{{ url('/'.$item->slug) }}" class="medixal-link">
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
                                                class="img-responsive" loading="lazy" width="680" height="416" alt="{{ $item->subcategory_name }}">
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
        
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading wow fadeInLeft">
                            <h2>Announcements</h2>
                        </div>
                    </div>
                </div>
        
                <div class="row"> {{-- FIXED missing = --}}
                    
                    @forelse($announcements as $item)
                        <div class="col-md-4">
                            <div class="case-card">
        
                                <div class="case-img">
                                    <img src="{{ asset('uploads/announcements/'.$item->image) }}" class="img-responsive" loading="lazy">
                                </div>
        
                                <span class="case-cat">
                                    {{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}
                                </span>
        
                                <h3>{{ $item->title }}</h3>
        
                                <a href="{{ route('frontend.announcements_details', $item->slug) }}" class="case-link">
                                    Learn More <span>↗</span>
                                </a>
        
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p>No announcements available.</p>
                        </div>
                    @endforelse
        
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
                                    @foreach($awardDetails->accreditation_images as $acc)
                                        @if(!empty($acc['image']))
                                            <li>
                                                <img src="{{ asset('home/awards/' . $acc['image']) }}"
                                                     width="140" height="98"
                                                     class="img-responsive accreditation-logo"
                                                     loading="lazy"
                                                     alt="{{ $acc['desc'] ?? 'Accreditation' }}"
                                                     data-toggle="modal"
                                                     data-target="#accreditations"
                                                     data-img="{{ asset('home/awards/' . $acc['image']) }}"
                                                     data-title="{{ $acc['desc'] ?? '' }}"
                                                     data-editor="{{ $acc['editor'] ?? '' }}">
                                            </li>
                                        @endif
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
                                          loading="lazy"
                                          onclick="openImage(this.src)"
                                          alt="Award" width="204" height="200">
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
                @if(!empty($compassion->items))
                  <div class="row" id="counter">
                      @foreach($compassion->items as $item)
                          @php
                              // Extract numeric value
                              preg_match('/\d+/', $item['value'], $matches);
                              $numericValue = $matches[0] ?? 0;

                              // Remove numeric part and trim trailing '+'
                              $suffix = rtrim(preg_replace('/\d+/', '', $item['value']), '+');
                          @endphp


                          <div class="col-md-4">
                              <div class="counter-box hvr-float">

                                  {{-- Icon --}}
                                  @if(!empty($item['icon']))
                                      <div class="counter-icon">
                                          <img src="{{ asset('home/compassion/' . $item['icon']) }}" width="45" height="45" loading="lazy" alt="{{ $item['title'] }}">
                                      </div>
                                  @endif

                                  {{-- Counter Value --}}
                                  <div class="counter-value" data-count="{{ $numericValue }}">
                                      <span class="count-number">0</span>{{ $suffix }}
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


        <!-------------Patient Testimonials ------------->
        <div id="testimonials" class="tab_section">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="opd-timing-content">
                  <div class="section-heading text-center wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <h2>Patient Testimonials</h2>
                  </div>
                </div>
              </div>
            </div>
            <div class="row services_testi">
              <div class="col-md-12 text-center">
                <ul class="nav nav-tabs center-tabs">
                  <li class="active"><a data-toggle="tab" href="#testimonials_tab">Testimonials</a></li>
                  <li><a data-toggle="tab" href="#video_testimonial_tab">Video Testimonials</a></li>
                </ul>
                <div class="tab-content">
        
                  <!-- TEXT TESTIMONIALS -->
                  <div id="testimonials_tab" class="tab-pane fade in active">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="owl-carousel owl-theme" id="patient-testimonial">
                          @forelse($textTestimonials as $t)
                            <div class="item">
                              <div class="testimonial-card">
                                <i class="fa fa-quote-left quote-icon"></i>
                                
                                <div class="testimonial-text" style="color:#ffffff !important;">
                                    {!! \Illuminate\Support\Str::limit(strip_tags($t->testimonial), 60) !!}
                                </div>
                                <!--<a class="testi-readmore" href="#"-->
                                <!--   data-toggle="modal"-->
                                <!--   data-target="#testimonial-popup"-->
                                <!--   data-text="{{ $t->testimonial }}"-->
                                <!--   data-rating="{{ (int) $t->rating }}"-->
                                <!--   data-name="{{ $t->person_name }}"-->
                                <!--   data-role="{{ $t->person_role }}">Read More...</a>-->
                                <div class="stars">
                                  @php $rating = (int) $t->rating; @endphp
                                  @for($i = 1; $i <= 5; $i++)
                                    <i class="fa fa-star{{ $i <= $rating ? '' : '-o' }}"></i>
                                  @endfor
                                </div>
                                <div class="testimonial-name">{{ $t->person_name }}</div>
                                <div class="testimonial-role">{{ $t->person_role }}</div>
                                
                                 <a class="testi-readmore" href="#"
                                   data-toggle="modal"
                                   data-target="#testimonial-popup"
                                   data-text="{{ $t->testimonial }}"
                                   data-rating="{{ (int) $t->rating }}"
                                   data-name="{{ $t->person_name }}"
                                   data-role="{{ $t->person_role }}">Read More...</a>
                              </div>
                            </div>
                          @empty
                            <div class="item">
                              <div class="testimonial-card">
                                <div class="testimonial-text">No testimonials available yet.</div>
                              </div>
                            </div>
                          @endforelse
                        </div>
                      </div>
                    </div>
                  </div>
        
                  <!-- VIDEO TESTIMONIALS -->
                  <div id="video_testimonial_tab" class="tab-pane fade">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="owl-carousel owl-theme" id="video-testimonial">
                          @forelse($videoTestimonials as $v)
                            <div class="item">
                              <div class="video_testi">
                                <div class="video-box" data-toggle="modal" data-target="#videoModal"
                                     data-video="{{ asset('uploads/testimonials/' . $v->video) }}">
                                  <img src="{{ $v->thumbnail ? asset('uploads/testimonials/thumbnails/' . $v->thumbnail) : asset('frontend/assets/img/testimonials/testimonials1.jpg') }}"
                                       class="img-responsive" loading="lazy" alt="{{ $v->title }}">
                                  <div class="play-btn"><i class="fa fa-play"></i></div>
                                </div>
                                <div class="video-title">{{ $v->title }}</div>
                              </div>
                            </div>
                          @empty
                            <div class="item">
                              <div class="video_testi">
                                <div class="video-title">No video testimonials available yet.</div>
                              </div>
                            </div>
                          @endforelse
                        </div>
                      </div>
                    </div>
                  </div>
        
                </div>
              </div>
            </div>
          </div>
        </div>

        <section class="virtual_tour_sec">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <div class="virtual_text">
                  <h3>{{ $virtualTour->title }}</h3>
                 {!! $virtualTour->testimonial !!}
                </div>
              </div>
              <div class="col-md-6">
                @if($virtualTour)
                  <div class="video-thumb">
                    <img src="{{ $virtualTour->thumbnail ? asset('uploads/virtual-tour/thumbnails/' . $virtualTour->thumbnail) : asset('frontend/assets/img/bg/virtual-tour.jpg') }}"
                         loading="lazy" class="img-responsive" alt="{{ $virtualTour->title }}">
                    <a type="button" data-toggle="modal" data-target="#VideoModal"
                       href="#" class="play-btn"
                       data-video="{{ asset('uploads/virtual-tour/' . $virtualTour->video) }}"
                       aria-label="{{ $virtualTour->title }}">
                      <i class="glyphicon glyphicon-play"></i>
                    </a>
                  </div>
                @else
                  {{-- fallback to static if no tour added yet --}}
                  <div class="video-thumb">
                    <img src="{{ asset('frontend/assets/img/bg/virtual-tour.jpg') }}" loading="lazy" class="img-responsive" alt="Virtual Tour">
                  </div>
                @endif
              </div>
            </div>
          </div>
        </section>
        
        
        
        
        
        

    
      @include('components.frontend.footer')

           
      @include('components.frontend.main-js')
      
    <script>
    
      // 1. This line is plain JS and CANNOT fail — if you don't see it, the script tag itself isn't loading.
      console.log('=== Testimonial script tag is executing ===');
    
      // 2. Check jQuery availability explicitly
      if (typeof jQuery === 'undefined') {
        console.error('❌ jQuery is NOT loaded at this point. The script is running before jQuery.');
      } else {
        console.log('✅ jQuery loaded, version:', jQuery.fn.jquery);
    
        jQuery(function ($) {            // runs after DOM ready
          console.log('✅ DOM ready, attaching handlers');
    
          // Delegated click handler (works with Owl Carousel clones too)
          $(document).on('click', '.testi-readmore', function (e) {
            e.preventDefault();
            console.log('1. Read More clicked');
    
            var link   = $(this);
            var text   = link.data('text');
            var rating = parseInt(link.data('rating')) || 0;
            var name   = link.data('name');
            var role   = link.data('role');
    
            console.log('2. Data:', { text: text, rating: rating, name: name, role: role });
    
            var modal = $('#testimonial-popup');
            console.log('3. Modal found?', modal.length, '| popup-text found?', modal.find('#popup-text').length);
    
            modal.find('#popup-text').html('“' + (text || '') + '”').css('color', '#7c7c7c');
    
            var stars = '';
            for (var i = 1; i <= 5; i++) {
              stars += '<i class="fa fa-star' + (i <= rating ? '' : '-o') + '"></i> ';
            }
            modal.find('#popup-rating').html(stars);
            modal.find('#popup-name').text(name || '');
            modal.find('#popup-role').text(role || '');
    
            modal.modal('show');
            console.log('4. Modal.show() called');
          });
        });
      }
      
    </script>
    
    
    <script>
      $(document).on('click', '.accreditation-logo', function () {
        var el = $(this);
        var img    = el.data('img');
        var title  = el.data('title');
        var editor = el.data('editor');   // HTML string
    
        var modal = $('#accreditations');
        modal.find('#acc-modal-img').attr('src', img);
        modal.find('#acc-modal-title').text(title || '');
        modal.find('#acc-modal-editor').html(editor || '');
      });
    </script>


      <!-- ✅ Bootstrap 3 Modal -->
    <div id="VideoModal" class="modal fade">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <!-- <h4 class="modal-title">Full Image</h4> -->
          </div>
          <div class="modal-body text-center">
            <video 
              controls 
              muted 
              loop 
              playsinline 
              preload="none"
              poster="{{ asset('home/bannerimagevideo/video-poster-img.webp') }}">
              <source src="{{ asset('frontend/assets/img/video/main-video.mp4') }}" type="video/mp4" height="500" width="100%">
            </video>
          </div>
        </div>
      </div>
    </div>
    
    
    
    <!-- Accreditations Modal -->
    <!-- Accreditations Modal -->
    <div id="accreditations" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <div class="accreditations-img">
              <img id="acc-modal-img" src="" class="img-responsive" loading="lazy" alt="Accreditation">
            </div>
          </div>
          <div class="col-md-8">
            <div class="section-heading">
              <h2 id="acc-modal-title"></h2>
            </div>
            <div class="lists" id="acc-modal-editor"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    
    
    <!-- testimonial Modal -->
    <!-- testimonial Modal -->
    <div id="testimonial-popup" class="modal fade">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="testimonial-popup">
                  <p class="testimonial-text" id="popup-text"></p>
                  <div class="testimonial-rating" id="popup-rating"></div>
                  <div class="author-container">
                    <div class="author-img">
                      <svg width="20" height="20" fill="#888" viewBox="0 0 16 16"><path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg>
                    </div>
                    <span class="author-name"><span id="popup-name"></span> <br> <span class="author-role" id="popup-role"></span></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>