
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
        
        
        <section class="section-wrap thank_wrap">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="thankyou-wrapper">
                  <div class="thankyou-box">
                    <div class="thankyou-icon">
                      <i class="fa fa-check"></i>
                    </div>
                    <h1>Thank You!</h1>
                    <p>
                      Your message has been successfully submitted.  
                      Our team will get back to you shortly.
                    </p>
                    <a href="{{ route('frontend.index') }}" class="btn btn-custom btn-home">
                    <i class="fa fa-home"></i> Go to Home
                    </a>
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