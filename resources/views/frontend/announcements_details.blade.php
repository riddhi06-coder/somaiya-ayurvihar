
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
                    <li><a href="{{ route('frontend.announcements') }}">Announcements</a></li>
                    <li class="active">Announcements Details</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
        </section>
    
    
        <section class="section-wrap announcements_details_wrap">
          <div class="container">
            <div class="row">
              <div class="col-md-8">
                <div class="announcements-content content">

                    <img src="{{ asset('uploads/announcement-details/'.$announcement->image) }}" 
                         class="img-responsive" alt="">
                
                    <h5>{{ $announcement->announcement->title }}</h5>
                
                    <p>{!! $announcement->description !!}</p>
                
                </div>
              </div>
                <div class="col-md-4">
                  <aside class="latest-announcements">
                
                    <h4 class="sidebar-title">
                      Latest Announcements
                    </h4>
                
                    <ul class="announcement-list">

                        @foreach($latest as $item)
                            <li>
                                <span class="date">
                                    <i class="fa fa-calendar"></i> 
                                    {{ \Carbon\Carbon::parse($item->announcement->date)->format('d M Y') }}
                                </span>
                    
                                <a href="{{ route('frontend.announcements_details', $item->announcement->slug) }}">
                                    {{ $item->announcement->title }}
                                </a>
                            </li>
                        @endforeach
                    
                    </ul>
                
                  </aside>
                </div>
    
            </div>
          </div>
        </section>
        
        
        
        @include('components.frontend.footer')
     
        @include('components.frontend.main-js')


    </body>
</html>