
<!DOCTYPE html>
<html lang="en">
    <head>
        @include('components.frontend.head')
        
        <style>
            /* default / first card — red */
            .health-card .package-top {
                background: linear-gradient(135deg, #e94b4b, #f36f6f) !important;
                color: #fff;
                padding: 20px;
            }
            
            /* blue */
            .health-card.blue-card .package-top {
                background: linear-gradient(135deg, #1d7fa8, #34a7d4) !important;
            }
            
            /* green */
            .health-card.green-card .package-top {
                background: linear-gradient(135deg, #15a535, #40d768) !important;
            }
            
            /* orange */
            /* orange */
            .health-card.orange-card .package-top {
                background: linear-gradient(135deg, #e8862e, #f5a94d) !important;
            }
            
            /* keep the whole card white — only .package-top shows color */
            .health-card,
            .health-card.blue-card,
            .health-card.green-card,
            .health-card.orange-card {
                background: #fff !important;
            }
        </style>
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
                                <a class="twenty"
                                type="button"
                                data-toggle="modal"
                                data-target="#ayurveda_packages">
                                    <span>View Our Health Packages</span>
                                </a>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-md-5"></div>
                </div>
            </div>
        </section>

        <div id="ayurveda_packages" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
            <!-- Modal content -->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ayurveda Health Packages</h4>
              </div>
              <div class="modal-body">
                <div class="row">
        
                  @php
                      $bgClasses = ['', 'blue-card', 'green-card', 'orange-card'];
                  @endphp
        
                  @forelse($ayurvedaPackages as $index => $package)
                    <div class="col-md-4 col-sm-6">
                      <div class="health-card {{ $bgClasses[$index % 4] }}">
                        <div class="package-top">
                          <div class="price">
                            ₹{{ number_format($package->discounted_price ?? 0) }}
                          </div>
                          <h3>{{ $package->package_name }}</h3>
                        </div>
                        <ul class="package-list">
                          <li><i class="glyphicon glyphicon-ok"></i> Age Range: {{ $package->age_range ?? 'All' }}</li>
                          <li>
                            <i class="glyphicon glyphicon-ok"></i> Gender:
                            @php
                                $genders = json_decode($package->gender, true);
                            @endphp
                            {{ is_array($genders) ? implode(', ', $genders) : ($package->gender ?? 'All') }}
                          </li>
                        </ul>
                        <div class="package-buttons">
                          <a href="{{ route('frontend.health_packages_details', $package->slug) }}" class="btn btn-view">
                            View Package
                          </a>
                          <a  data-toggle="modal" data-target="#health-checkup" data-package="{{ $package->package_name }}" class="btn btn-book">
                            Book Package
                          </a>
                        </div>
                      </div>
                    </div>
                  @empty
                    <div class="col-md-12 text-center">
                      <p>No Ayurveda packages available at the moment.</p>
                    </div>
                  @endforelse
        
                </div>
              </div>
            </div>
          </div>
        </div>
        
        
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
        
        
        <!--- Auto fetching Package Name on the Form--->
        <script>
            document.addEventListener("DOMContentLoaded", function () {

                const modal = document.getElementById('health-checkup');
                const packageSelect = modal.querySelector('[name="pkg_name"]');
            
                document.querySelectorAll('.book_packages').forEach(button => {
                    button.addEventListener('click', function () {
            
                        let packageName = this.getAttribute('data-package');
            
                        if (packageName && packageSelect) {
                            packageSelect.value = packageName;
                        }
                    });
                });
            
            });
        </script>
        


    </body>
</html>