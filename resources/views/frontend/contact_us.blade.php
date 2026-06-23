
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
                        <li class="active">Contact Us</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>


        <section class="section-wrap contact-wrap">
            <div class="container-fluid">

                <div class="content text-center wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <h5>{{ $contact_us->emergency_heading ?? 'Emergency Numbers1' }}</h5>
                </div>

                @php
                    $emergency = json_decode($contact_us->emergency_details, true);

                    $icons = [
                        'fa fa-hospital-o',
                        'fa fa-ambulance',
                        'fa fa-tint',
                        'fa fa-ambulance',
                        'fa fa-plus-square'
                    ];
                @endphp

                <div class="row emergency-list">

                    @if(!empty($emergency))
                        @foreach($emergency as $key => $item)

                        <div class="col-md-3">
                            <div class="emergency-item">

                                <span class="icon-circle">
                                    <i class="{{ $icons[$key] ?? 'fa fa-phone' }}"></i>
                                </span>

                                <h4>{{ $item['center_name'] ?? '' }}</h4>

                                <a href="tel:+91 {{ preg_replace('/[^0-9]/', '', $item['contact'] ?? '') }}">
                                    +91 {{ $item['contact'] ?? '' }}
                                </a>

                            </div>
                        </div>

                        @endforeach
                    @endif

                </div>
            </div>
        </section>


        <section class="section-wrap contact-wrap-two">
            <div class="container">
                <div class="row">

                    <!-- Contact Details -->
                    <div class="col-md-6">
                        <div class="contact-card">

                            <h2 class="contact-title">
                                {{ $contact_us->hospital_name ?? '' }}<br>
                                <!--<span>Hospital & Research Centre</span>-->
                            </h2>

                            <ul class="contact-list">

                                <!-- Call Us -->
                                <li>
                                    <i class="fa fa-phone"></i>
                                    <div>
                                        <strong>Call Us</strong>
                                        <p>
                                            @php
                                                $phones = explode(',', $contact_us->call_us ?? '');
                                            @endphp

                                            @foreach($phones as $phone)
                                                <a href="tel:{{ preg_replace('/[^0-9]/','',$phone) }}">
                                                    {{ trim($phone) }}
                                                </a>
                                                @if(!$loop->last), @endif
                                            @endforeach
                                        </p>
                                    </div>
                                </li>

                                <!-- Location -->
                                <li>
                                    <i class="fa fa-map-marker"></i>
                                    <div>
                                        <strong>Location</strong>
                                        <p>
                                            <a href="{{ $contact_us->location_url ?? '#' }}" target="_blank">
                                                {{ $contact_us->location ?? '' }}
                                            </a>
                                        </p>
                                    </div>
                                </li>

                                <!-- Email -->
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    <div>
                                        <strong>Email</strong>
                                        <p>
                                            <a href="mailto:{{ $contact_us->email }}">
                                                {{ $contact_us->email }}
                                            </a>
                                        </p>
                                    </div>
                                </li>

                            </ul>

                            <!-- Social Media -->
                            <div class="contact-social">

                                @php
                                    $social = json_decode($contact_us->social_media_links, true);

                                    $icons = [
                                        '1' => 'fa fa-facebook',
                                        '2' => 'fa fa-twitter',
                                        '3' => 'fa fa-instagram',
                                        '4' => 'fa fa-linkedin',
                                        '5' => 'fa fa-youtube-play',
                                        '6' => 'fa fa-pinterest',
                                        '7' => 'fa fa-whatsapp'
                                    ];
                                @endphp

                                @if(!empty($social))
                                    @foreach($social as $item)
                                        <a href="{{ $item['link'] }}" target="_blank">
                                            <i class="{{ $icons[$item['platform']] ?? 'fa fa-share' }}"></i>
                                        </a>
                                    @endforeach
                                @endif

                            </div>

                        </div>
                    </div>

                    <!-- Google Map -->
                    <div class="col-md-6">
                        <div>
                            @if(!empty($contact_us->iframe_url))
                                <iframe
                                    src="{{ $contact_us->iframe_url }}"
                                    width="100%"
                                    height="470"
                                    style="border:0;"
                                    allowfullscreen=""
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="section-wrap contact-wrap-three">
            <div class="container">

                <div class="content text-center wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <h5>{{ $contact_us->associates_name ?? 'Our Associates' }}</h5>
                </div>

                <div class="row">

                    @if(!empty($contact_us->associates_details))
                        @foreach(json_decode($contact_us->associates_details, true) as $associate)

                            <div class="col-md-4">
                                <div class="associate-card">

                                    <div class="associate-img">
                                        <img src="{{ asset('uploads/contact/'.$associate['image']) }}" 
                                            class="img-responsive" 
                                            alt="{{ $associate['institute_name'] }}">
                                    </div>

                                    <div class="associate-content">

                                        <h3>{{ $associate['institute_name'] ?? '' }}</h3>

                                        <p class="associate-phone">
                                            <i class="fa fa-phone"></i>
                                            <a href="tel:+91 {{ preg_replace('/\s+/', '', $associate['contact_no']) }}">
                                                +91 {{ $associate['contact_no'] ?? '' }}
                                            </a>
                                        </p>

                                        <a href="{{ $associate['url'] ?? '#' }}" 
                                        target="_blank" 
                                        class="associate-link">
                                            Visit Website <i class="fa fa-arrow-right"></i>
                                        </a>

                                    </div>

                                </div>
                            </div>

                        @endforeach
                    @endif

                </div>

            </div>
        </section>


        <section class="section-wrap contact-wrap-four">
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <div class="content text-center wow fadeInLeft" data-wow-delay="00ms"
            data-wow-duration="1500ms">
            <h5>Get In Touch</h5>
            <p>Please fill up the form given below and we will get back to you.</p>
            </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div>
                    <form id="contactForm" class="contact-page-form" method="POST" action="{{ route('contact.submit') }}">
                        @csrf
                    
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name*">
                                <span class="text-danger error" id="first_name_error"></span>
                            </div>
                        </div>
                    
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name*">
                                <span class="text-danger error" id="last_name_error"></span>
                            </div>
                        </div>
                    
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email Address*">
                                <span class="text-danger error" id="email_error"></span>
                            </div>
                        </div>
                    
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="mobile_no" id="mobile_no" class="form-control" placeholder="Mobile*">
                                <span class="text-danger error" id="mobile_error"></span>
                            </div>
                        </div>
                    
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="message_text" id="message_text" class="form-control" placeholder="Message"></textarea>
                            </div>
                        </div>
                    
                        <div class="col-md-12">
                            <div class="button-box">
                                <center>
                                    <button type="submit" class="twenty" id="submitBtn">
                                        <span>Submit</span>
                                    </button>
                                </center>
                            </div>
                        </div>
                    
                    </form>
                </div>
            </div>
            </div>
        </div>
        </section>


        @include('components.frontend.footer')
     
        @include('components.frontend.main-js')
        
        
        <script>
            document.getElementById('contactForm').addEventListener('submit', function(e){

    let isValid = true;

    document.querySelectorAll('.error').forEach(el => {
        el.innerHTML = '';
    });

    let firstName = document.getElementById('first_name').value.trim();
    let lastName  = document.getElementById('last_name').value.trim();
    let email     = document.getElementById('email').value.trim();
    let mobile    = document.getElementById('mobile_no').value.trim();

    if(firstName === ''){
        document.getElementById('first_name_error').innerHTML = 'First name is required';
        isValid = false;
    }
    else if(!/^[A-Za-z\s]+$/.test(firstName)){
        document.getElementById('first_name_error').innerHTML = 'Only alphabets allowed';
        isValid = false;
    }

    if(lastName === ''){
        document.getElementById('last_name_error').innerHTML = 'Last name is required';
        isValid = false;
    }
    else if(!/^[A-Za-z\s]+$/.test(lastName)){
        document.getElementById('last_name_error').innerHTML = 'Only alphabets allowed';
        isValid = false;
    }

    if(email === ''){
        document.getElementById('email_error').innerHTML = 'Email is required';
        isValid = false;
    }
    else if(!/^\S+@\S+\.\S+$/.test(email)){
        document.getElementById('email_error').innerHTML = 'Enter valid email';
        isValid = false;
    }

    if(mobile === ''){
        document.getElementById('mobile_error').innerHTML = 'Mobile number is required';
        isValid = false;
    }
    else if(!/^\d{10,12}$/.test(mobile)){
        document.getElementById('mobile_error').innerHTML = 'Mobile number must be 10-12 digits';
        isValid = false;
    }

    if(!isValid){
        e.preventDefault();
        return false;
    }

    let submitBtn = document.getElementById('submitBtn');

    submitBtn.disabled = true;
    submitBtn.querySelector('span').innerHTML = 'Submitting...';
});
        </script>


    </body>
</html>