
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
                    <li>News & Events</li>
                    <li class="active">Announcements</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
        </section>
    
    
    
        <div class="media-filter-wrap">
          <div class="container">
            <form method="GET" action="{{ route('frontend.announcements') }}" class="media-filter-form">
              <div class="row">
 
                <!-- Year -->
                <div class="col-md-6">
                  <div class="filter-group">
                    <label>Year</label>
                    <select name="year" class="form-control">
                        <option value="">Select Year</option>
                        @foreach($years as $year)
                            <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <!-- Month -->
                <div class="col-md-6">
                  <div class="filter-group">
                    <label>Month</label>
                    <select name="month" class="form-control">
                        <option value="">Select Month</option>
                    
                        @foreach($months as $m)
                            <option value="{{ $m }}" {{ request('month') == $m ? 'selected' : '' }}>
                                {{ date('F', mktime(0,0,0,$m,1)) }}
                            </option>
                        @endforeach
                    </select>
                  </div>
                </div>
               
              </div>
              <!-- Buttons -->
              <div class="text-right filter-btn-wrap">
                <div class="button-box">
                  <button type="button" onclick="window.location='{{ route('frontend.announcements') }}'" class="twenty" type="reset"><span>Reset</span></button>
                </div>
                <div class="button-box">
                  <button class="twenty" type="submit"><span>Apply</span></button>
                </div>
              </div>
            </form>
          </div>
        </div>
    
    
        <section class="section-wrap announcements_wrap">
          <div class="container">
            <div class="row">
                @forelse($announcements as $item)
                    <div class="col-md-4">
                        <span class="announcement-date">
                                <i class="fa fa-calendar"></i>
                                {{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}
                            </span>
                        <div class="announcement-card">
            
                            <!--<span class="announcement-date">
                                <i class="fa fa-calendar"></i>
                                {{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}
                            </span>-->
            
                            <div class="announcement-img">
                                <a href="{{ route('frontend.announcements_details', $item->slug) }}">
                                    <img src="{{ asset('uploads/announcements/'.$item->image) }}" alt="{{ $item->title }}">
                                </a>
                            </div>
            
                            <div class="announcement-content">
                                <h4>
                                    <a href="{{ route('frontend.announcements_details', $item->slug) }}">
                                        {{ $item->title }}
                                    </a>
                                </h4>
            
                                <a href="{{ route('frontend.announcements_details', $item->slug) }}" class="case-link">
                                    Learn More <span>↗</span>
                                </a>
            
                               @php
                                    $platformIcons = [
                                        '1' => 'fa-facebook',
                                        '2' => 'fa-twitter',
                                        '3' => 'fa-instagram',
                                        '4' => 'fa-linkedin',
                                        '5' => 'fa-youtube',
                                        '6' => 'fa-pinterest',
                                        '7' => 'fa-whatsapp',
                                    ];
                                @endphp
                                
                                @if($item->social_media)
                                    @php $socials = json_decode($item->social_media, true); @endphp
                                
                                    <div class="announcement-meta">
                                        @foreach($socials as $social)
                                            @php
                                                $icon = $platformIcons[$social['platform']] ?? 'fa-globe';
                                            @endphp
                                
                                            <a href="{{ $social['link'] }}" target="_blank">
                                                <i class="fa {{ $icon }}"></i>
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
            
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>No announcements found.</p>
                    </div>
                @endforelse
            </div>
          </div>
        </section>
    


        @include('components.frontend.footer')
     
        @include('components.frontend.main-js')


    </body>
</html>