
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
                        <li>Wellness Center</li>
                        <li class="active">Ayurveda</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>

        <section class="section-wrap ayurveda-wrap"
                style="background: url('{{ asset('/uploads/ayurveda/'.$ayurveda->image) }}') no-repeat center center;
                    background-size: cover;">

            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="content wow fadeInLeft"
                            data-wow-delay="00ms"
                            data-wow-duration="1500ms">

                            <h5>{{ $ayurveda->heading ?? 'Ayurveda' }}</h5>

                            {!! $ayurveda->description ?? '' !!}

                            <div class="button-box">
                                <a class="twenty"
                                type="button"
                                data-toggle="modal"
                                data-target="#wellness_form">
                                    <span>Enquiry</span>
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-5"></div>
                </div>
            </div>
        </section>


        <div id="wellness_form" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content -->
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Please fill out all required fields meaning</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!--  <h6 class="form-title">please fill out all required fields meaning</h6> -->
                        <form id="contactForm" method="POST" action="{{ route('ayurveda.submit') }}">
                            @csrf
                        
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name*">
                                    <span class="text-danger error" id="name_error"></span>
                                </div>
                            </div>
                        
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email Address*">
                                    <span class="text-danger error" id="email_error"></span>
                                </div>
                            </div>
                        
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="mobile_no" id="mobile_no" class="form-control" placeholder="Mobile Number*">
                                    <span class="text-danger error" id="mobile_error"></span>
                                </div>
                            </div>
                        
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="message" id="message" class="form-control" placeholder="Message"></textarea>
                                </div>
                            </div>
                        
                            <div class="col-md-12">
                                <div class="button-box">
                                    <button type="submit" class="twenty" id="submitBtn">
                                        <span>Submit</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>


        @include('components.frontend.footer')
     
        @include('components.frontend.main-js')
        
        
        <script>
            document.getElementById('contactForm').addEventListener('submit', function(e) {

    let isValid = true;

    const submitBtn = document.getElementById('submitBtn');
    const btnText = submitBtn.querySelector('span');

    document.querySelectorAll('.error').forEach(el => {
        el.innerHTML = '';
    });

    let name = document.getElementById('name').value.trim();
    let email = document.getElementById('email').value.trim();
    let mobile = document.getElementById('mobile_no').value.trim();

    // Name
    if(name === '') {
        document.getElementById('name_error').innerHTML = 'Name is required';
        isValid = false;
    }
    else if(!/^[A-Za-z\s]+$/.test(name)) {
        document.getElementById('name_error').innerHTML = 'Only alphabets are allowed';
        isValid = false;
    }

    // Email
    if(email === '') {
        document.getElementById('email_error').innerHTML = 'Email is required';
        isValid = false;
    }
    else if(!/^\S+@\S+\.\S+$/.test(email)) {
        document.getElementById('email_error').innerHTML = 'Enter a valid email address';
        isValid = false;
    }

    // Mobile
    if(mobile === '') {
        document.getElementById('mobile_error').innerHTML = 'Mobile number is required';
        isValid = false;
    }
    else if(!/^\d{10,12}$/.test(mobile)) {
        document.getElementById('mobile_error').innerHTML = 'Mobile number must be 10 to 12 digits';
        isValid = false;
    }

    if(!isValid) {
        e.preventDefault();
        return false;
    }

    // Disable button after validation passes
    submitBtn.disabled = true;
    submitBtn.style.pointerEvents = 'none';
    btnText.innerHTML = 'Submitting...';
});
        </script>


    </body>
</html>