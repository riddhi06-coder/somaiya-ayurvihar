
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
                              <li><a href="{{ url('/') }}"><span class="glyphicon glyphicon-home"></span></a></li>
                              <li><a href="#">Somaiya Doctors</a></li>
                              <li class="active">{{ $doctor->doctor_name }}</li>
                          </ol>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      <section class="section-wrap doctor_profile_wrap">
          <div class="container">
              <div class="row">

                  {{-- Doctor Image & Social Links --}}
                  <div class="col-md-4">
                      <div class="doctor_img"> 
                          <img src="{{ asset('uploads/doctors/' . $doctor->doctor_image) }}" class="img-responsive" alt="{{ $doctor->doctor_name }}">
                          <h6>{{ $doctor->doctor_name }}</h6>

                          <ul class="share-icons">
                            @php
                                $platforms = $doctor->social_media_links ?? [];
                                $iconMap = [
                                    1 => 'facebook',
                                    2 => 'twitter',
                                    3 => 'instagram',
                                    4 => 'linkedin',
                                    5 => 'youtube',
                                    6 => 'pinterest',
                                    7 => 'whatsapp',
                                ];
                            @endphp

                            @foreach($platforms as $social)
                                @php
                                    $platformId = (int) $social['platform'];
                                    $link = $social['link'] ?? '#';
                                    $icon = $iconMap[$platformId] ?? null;
                                @endphp

                                @if($icon)
                                    <li>
                                        <a href="{{ $link }}" class="share-{{ $icon }}" target="_blank" title="Share on {{ ucfirst($icon) }}">
                                            <i class="fa fa-{{ $icon }}"></i>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>

                      </div>
                  </div>

                  {{-- Doctor Information --}}
                  <div class="col-md-8">
                      <div class="doctor_information">
                          <div class="doctor_info">
                              <div class="doctor_name">
                                  <h3>{{ $doctor->doctor_name }}</h3>
                              </div>
                              <div class="doctor_details">
                                  <ul>
                                      <li><strong>Speciality:</strong> {{ $doctor->subcategory?->subcategory_name ?? 'N/A' }}</li>
                                      <li><strong>Designation:</strong> {{ $doctor->designation }}</li>
                                      <li><strong>Qualification:</strong> {{ $doctor->qualification }}</li>
                                      <li><strong>OPD Timing:</strong>
                                          @if($doctor->doctor_time_slot)
                                              @foreach($doctor->doctor_time_slot as $slot)
                                                  <span>{{ $slot['from'] }} - {{ $slot['to'] }}</span><br>
                                              @endforeach
                                          @else
                                              N/A
                                          @endif
                                      </li>
                                  </ul>

                                  <div class="button-box doctor-btn">
                                      <a class="twenty" type="button" data-toggle="modal" data-target="#bookappointment-services">
                                          <span><i class="fa fa-calendar" aria-hidden="true"></i> Book Appointment</span>
                                      </a>
                                  </div>

                                  <hr>

                                  <h5>Profile Description:</h5>
                                  <p>{!! $doctor->profile_desc !!}</p>
                              </div>
                          </div>
                      </div>
                  </div>

              </div>
          </div>
      </section>

        
        
        @include('components.frontend.footer')
     
        @include('components.frontend.main-js')



  </body>
</html>