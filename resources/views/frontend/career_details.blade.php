
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
                    <li class="active">View Job Description</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
        </section>
    
    
        <section class="section-wrap job-detail-section">
            <div class="container">
                <div class="row">
        
                    <div class="col-md-12">
                        <div class="job-card">
        
                            <!-- Header -->
                            <div class="job-header">
                                <h2 class="job-title">{{ $job->job_heading }}</h2>
        
                                <a type="button"
                                   data-toggle="modal"
                                   data-target="#job-apply"
                                   class="btn btn-primary btn-block"
                                   data-id="{{ $job->id }}">
                                    <i class="fa fa-paper-plane"></i> Apply Now
                                </a>
                            </div>
        
                            <!-- Meta Info -->
                            <ul class="job-meta">
                                <li>
                                    <i class="fa fa-hospital-o"></i>
                                    Department: {{ $details->department ?? 'N/A' }}
                                </li>
        
                                <li>
                                    <i class="fa fa-map-marker"></i>
                                    Location: {{ $job->job_location ?? 'N/A' }}
                                </li>
        
                                <li>
                                    <i class="fa fa-briefcase"></i>
                                    Experience: {{ $details->experience ?? 'N/A' }}
                                </li>
        
                                <li>
                                    <i class="fa fa-clock-o"></i>
                                    {{ $details->job_type ?? 'N/A' }}
                                </li>
                            </ul>
        
                            <!-- Job Description -->
                            <div class="job-section lists">
                                <h4>Job Description</h4>
                                {{ $details->job_details ?? '<p>No description available</p>' }}
                            </div>
        
                            <!-- Job Details -->
                            <div class="job-section lists">
                                {!! $details->desc ?? '<p>No description available</p>' !!}
                            </div>
                        </div>
                    </div>
        
                </div>
            </div>
        </section>
        
        @include('components.frontend.footer')
     
        @include('components.frontend.main-js')
        
        
                
        <!-- Modal -->
    <div id="job-apply" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content -->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center">Apply Now</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <h6 class="form-title">please fill out all required fields meaning</h6>
              <form class="book-appoint-form">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Full Name" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="Email Address" required>
                </div>
              </div>
             <!--  <div class="col-md-6">
                <div class="form-group">
                  <label></label>
                  <input type="text" class="form-control" placeholder="Phone Number" required>
                </div>
              </div> -->
              <div class="col-md-12">
                <div class="form-group">
                  <label>Upload Resume :</label>
                  <input type="file" class="form-control" placeholder="" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <textarea type="text" class="form-control" placeholder="Message" required></textarea>
                </div>
              </div>
              <div class="col-md-12">
                <center>
                <div class="button-box">
                  <a class="twenty" href="#"><span>Submit</span></a>
                </div>
              </center>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->


    </body>
</html>