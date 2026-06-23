
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
                    <li><a href="{{ route('frontend.index') }}"> <span class="glyphicon glyphicon-home"></span></a></li>
                    <li class="active">Careers</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
        </section>
    
    
        <section class="section-wrap career_wrap">
          <div class="container">
            <div class="row">
              <div class="col-md-5"></div>
              <div class="col-md-7">
                <div class="content">
                    <h5>{{ $career->heading ?? 'Why Join Us' }}</h5>
                  <p>{!! $career->desc ?? '' !!}</p>
                </div>
              </div>
            </div>
          </div>
        </section>
        
    
        <section class="section-wrap career_wrap_three">
            <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="content text-center wow fadeInLeft" data-wow-delay="00ms"
              data-wow-duration="1500ms">
                  <h5>{{ $career->benefits_heading ?? 'Benefits of Working with Us1' }}</h5>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <!-- Tabs -->
                <ul class="nav nav-tabs">
                    @foreach($benefits as $key => $item)
                        <li class="{{ $key == 0 ? 'active' : '' }}">
                            <a href="#tab{{ $key }}" data-toggle="tab">
                                {{ $item['question'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <!-- Tab Content -->
                <div class="tab-content" style="margin-top:20px;">
                    @foreach($benefits as $key => $item)
                        <div class="tab-pane fade {{ $key == 0 ? 'in active' : '' }}" id="tab{{ $key }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="content-img">
                                        <img src="{{ asset('uploads/service-details/' . $item['image']) }}" class="img-responsive">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="content">
                                        <h5>{{ $item['question'] }}</h5>
                                        <p>{!! $item['answer'] !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
        </section>
    
    
        <section class="section-wrap career_wrap_two">
          <div class="container">
            
            <div class="row">
              <div class="col-md-12">
                <div class="content">
                 <h5>{{ $career->job_heading ?? 'Current Openings' }}</h5>
                
                @if(empty($career->job_heading))
                    <p>No Job Openings</p>
                @endif
                </div>
              </div>
            </div>
            
            
            @forelse($job_list as $job)
                <div class="row">
                    <div class="col-md-9">
                        <div class="job-list">
                            
                            <!-- Job Title -->
                            <h3>{{ $job->job_heading }}</h3>
            
                            <!-- Description (short) -->
                            <p>
                                {!! $job->desc !!}
                            </p>
            
                            <!-- Location -->
                            <p><b>Location:</b> {{ $job->job_location ?? 'N/A' }}</p>
            
                        </div>
                    </div>
            
                    <div class="col-md-3">
                        <div class="job-btn">
                            
                            <!-- View Details -->
                            <div class="button-box">
                                <a class="twenty" href="{{ route('career.details', $job->slug) }}">
                                    <span>View Job Description</span>
                                </a>
                            </div>
            
                            <!-- Apply -->
                            <div class="button-box">
                                <a class="twenty" type="button" data-toggle="modal" data-target="#job-apply"
                                   data-id="{{ $job->id }}" data-title="{{ $job->job_heading }}">
                                    <span>Apply Now</span>
                                </a>
                            </div>
            
                        </div>
                    </div>
                </div>
                <hr>
            @empty
                <div class="text-center">
                    <p>No Job Openings Available</p>
                </div>
            @endforelse
        

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
                    <form class="book-appoint-form" id="bookAppointForm"
                          action="{{ route('application.submit') }}"
                          method="POST" enctype="multipart/form-data" novalidate>
                            @csrf
                            <input type="hidden" name="job_id"    id="jobId"    value="{{ old('job_id') }}">
                            <input type="hidden" name="job_title" id="jobTitle" value="{{ old('job_title') }}">
                     
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" id="fullName" class="form-control"
                                       placeholder="Full Name*" value="{{ old('name') }}">
                                <span class="error-msg" id="nameError" style="color:red; font-size:13px;">
                                    {{ $errors->first('name') }}
                                </span>
                            </div>
                        </div>
                     
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control"
                                       placeholder="Email Address*" value="{{ old('email') }}">
                                <span class="error-msg" id="emailError" style="color:red; font-size:13px;">
                                    {{ $errors->first('email') }}
                                </span>
                            </div>
                        </div>
                     
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Upload Resume* : (Only .pdf,.doc,.docx allowed. Max size upto 5 MB.)</label>
                                <input type="file" name="resume" id="resume" class="form-control"
                                       accept=".pdf,.doc,.docx">
                                <span class="error-msg" id="resumeError" style="color:red; font-size:13px;">
                                    {{ $errors->first('resume') }}
                                </span>
                            </div>
                        </div>
                     
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="message" id="message" class="form-control"
                                          placeholder="Message">{{ old('message') }}</textarea>
                                <span class="error-msg" id="messageError" style="color:red; font-size:13px;"></span>
                            </div>
                        </div>
                     
                        <div class="col-md-12">
                            <center>
                                <div class="button-box">
                                    <a class="twenty" href="#" id="submitBtn"><span>Submit</span></a>
                                </div>
                            </center>
                        </div>
                    </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->


    <!---- Js vaidations for careers form--->
    <script>
        (function () {
            var form = document.getElementById('bookAppointForm');
            var submitBtn = document.getElementById('submitBtn');
            var submitLabel = submitBtn.querySelector('span'); // the "Submit" text
            var MAX_SIZE = 5 * 1024 * 1024; // 5 MB
            var ALLOWED_EXT = ['pdf', 'doc', 'docx'];
            var isSubmitting = false;
        
            function setError(id, msg) { document.getElementById(id).textContent = msg; }
            function clearErrors() {
                ['nameError','emailError','resumeError','messageError'].forEach(function(id){ setError(id,''); });
            }
        
            function validate() {
                clearErrors();
                var ok = true;
                var name = document.getElementById('fullName').value.trim();
                var email = document.getElementById('email').value.trim();
                var resume = document.getElementById('resume');
        
                if (name === '') { setError('nameError','Full name is required.'); ok = false; }
                else if (/\d/.test(name)) { setError('nameError','Name cannot contain numbers.'); ok = false; }
                else if (!/^[A-Za-z\s.'-]+$/.test(name)) { setError('nameError','Name has invalid characters.'); ok = false; }
        
                if (email === '') { setError('emailError','Email address is required.'); ok = false; }
                else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) { setError('emailError','Enter a valid email address.'); ok = false; }
        
                if (!resume.files || resume.files.length === 0) {
                    setError('resumeError','Resume is required.'); ok = false;
                } else {
                    var f = resume.files[0];
                    var ext = f.name.split('.').pop().toLowerCase();
                    if (ALLOWED_EXT.indexOf(ext) === -1) { setError('resumeError','Only PDF or Word files are allowed.'); ok = false; }
                    else if (f.size > MAX_SIZE) { setError('resumeError','File size must be 5 MB or less.'); ok = false; }
                }
                return ok;
            }
        
            function lockButton() {
                isSubmitting = true;
                submitLabel.textContent = 'Submitting...';
                submitBtn.style.pointerEvents = 'none'; // can't be clicked again
                submitBtn.style.opacity = '0.6';        // visual "disabled" cue
            }
        
            // Capture which job was clicked and put its title into the hidden fields
            document.querySelectorAll('[data-target="#job-apply"]').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    document.getElementById('jobId').value    = btn.getAttribute('data-id') || '';
                    document.getElementById('jobTitle').value = btn.getAttribute('data-title') || '';
                });
            });
        
            // Submit control is an <a>, so trigger the real submit from JS
            submitBtn.addEventListener('click', function (e) {
                e.preventDefault();
                if (isSubmitting) return;       // ignore extra clicks while processing
                if (validate()) {
                    lockButton();
                    form.submit();
                }
            });
        })();
    </script>
    
    
    
    
    </body>
</html>