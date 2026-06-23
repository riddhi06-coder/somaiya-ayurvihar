
<!DOCTYPE html>
<html lang="en">
    <head>
        @include('components.frontend.head')
    </head>

    <style>

        .description-content ul.listing li i {
            color: #f58220;
            position: absolute;
            left: 0;
            top: 3px;
            font-size: 18px;
        }

        .description-content ul.listing li {
            position: relative;
            padding-left: 25px; /* space for the icon */
        }
    </style>
    
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
                            <li><a href="#">Wellness Center</a></li>
                            <li><a href="#">Health Packages</a></li>
                            <li class="active">Wellwomen Procare</li>
                        </ol>
                        </div>
                    </div>
                    </div>
                </div>
            </section>

            <section class="section-wrap view_package_wrap">
                <div class="container">
                    <div class="row view_package_row">
                        <div class="col-md-8">
                            <div class="view_package_header">
                                <!-- Package Name -->
                                <h2>{{ $package->package_name }}</h2>
                                <ul>
                                    @if(!empty($package->age_range))
                                        <li><strong>Age Range:</strong> {{ $package->age_range }}</li>
                                    @endif

                                    @if(!empty($genders))
                                        <li><strong>Gender:</strong> {{ implode(', ', $genders) }}</li>
                                    @endif

                                    <!-- Location from health_packages_details -->
                                    @if(!empty($details->location))
                                        <li><i class="fa fa-map-marker"></i> {{ $details->location }}</li>
                                    @endif

                                    @if(!empty($details->location_url))
                                        <li>
                                            <i class="fa fa-location-arrow" aria-hidden="true"></i>
                                            <a href="{{ $details->location_url }}" target="_blank">Get Hospital Directions</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="view_package_btn">
                                <div class="button-box">
                                    <a href="#"
                                       class="twenty"
                                       data-toggle="modal"
                                       data-target="#health-checkup"
                                       data-package="{{ $package->package_name }}">
                                        <span>Book Package</span>
                                    </a>
                     
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row view_package_details">
                        <div class="col-md-12">
                            <div class="view_package_feature">
                                @if(!empty($details->description))
                                    <div class="description-content">
                                        {!! $details->description !!}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>



        @include('components.frontend.footer')
     
        @include('components.frontend.main-js')


        <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.querySelectorAll('.description-content ul').forEach(function(ul){
                    // Add the "listing" class
                    ul.classList.add('listing');
            
                    // Add icon to each li if not present
                    ul.querySelectorAll('li').forEach(function(li){
                        if(!li.querySelector('i.fa-arrow-circle-right')){
                            const icon = document.createElement('i');
                            icon.classList.add('fa', 'fa-arrow-circle-right');
                            icon.setAttribute('aria-hidden','true');
                            li.prepend(icon);
                        }
                    });
                });
            });
        </script>

  </body>
</html>