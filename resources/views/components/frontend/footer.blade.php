<footer>
      <div class="container">
        <div class="row main-footer">
          <div class="col-md-6">
           <div class="footer-about">

    {{-- Logo --}}
    @if(!empty($footer?->logo))
        <img src="{{ asset('home/footer/' . $footer->logo) }}" class="img-responsive">
    @endif

    <hr>

    {{-- Contact Details --}}
    <div class="footer-contact">
        <ul>

            {{-- Address --}}
            @if(!empty($footer?->address))
                <li>
                    <i class="fa fa-map-marker"></i>
                    {{ $footer->address }}
                </li>
            @endif

           <li><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3771.371677824286!2d72.8721188!3d19.0473893!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c8c9d2d56e49%3A0xbc42afe04f7f411!2sSomaiya%20Ayurvihar!5e0!3m2!1sen!2sin!4v1764323950948!5m2!1sen!2sin" width="100%" height="130" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></li>
<li class="footer_call">
    <i class="fa fa-phone"></i>

    @if(!empty($footer?->enquiry_number))
        <b>24x7 Enquiry:</b>
        <a href="tel:{{ $footer->enquiry_number }}">{{ $footer->enquiry_number }}</a><br>
    @endif

    @if(!empty($footer?->emergency_contact))
        <b>Emergency Contact:</b>
        <a href="tel:{{ $footer->emergency_contact }}">{{ $footer->emergency_contact }}</a><br>
    @endif

    @if(!empty($footer?->opd_appointment))
        <b>Book OPD Appointment:</b>
        <a href="tel:{{ $footer->opd_appointment }}">{{ $footer->opd_appointment }}</a><br>
    @endif

    @if(!empty($footer?->wellness_appointment))
        <b>Wellness Appointment:</b>
        <a href="tel:{{ $footer->wellness_appointment }}">{{ $footer->wellness_appointment }}</a>
    @endif
</li>

            {{-- Phone / Contact HTML --}}
            @if(!empty($footer?->contact_html))
                <li class="footer_call">
                    {!! $footer->contact_html !!}
                </li>
            @endif

        </ul>
    </div>

            {{-- Social Icons --}}
            @if(!empty($footer?->social_links))
                <ul class="footer-social-links">
                    @foreach($footer->social_links as $social)
                        <li>
                            <a href="{{ $social['url'] }}" target="_blank">
                                <i class="fa {{ $social['icon'] }}"></i>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif

        </div>

          </div>
          <div class="col-md-4">
            <div class="footer-links">
              <h5>Quick Links</h5>
              <ul>
                <li><a href="#">Specialties</a></li>
                <li><a href="#">Billing Process</a></li>
                <li><a href="#">TPA</a></li>
                <li><a href="#">Donation</a></li>
                <li><a href="#">Biomedical Waste</a></li>
                <!-- <li><a href="#">Vision &amp; Mission</a></li>
                  <li><a href="#">Chairman’s Message</a></li>
                  <li><a href="#">Our Journey</a></li> -->
                <!-- <li><a href="#">Somaiya Prayer</a></li> -->
                <li><a href="#">Associations</a></li>
                <li><a href="#">Management Team</a></li>
                <!--  <li><a href="#">CSR &amp; Sustainability and Community OutReach</a></li> -->
                <li><a href="#">Accreditations</a></li>
                <li><a href="#">Awards &amp; Accolades</a></li>
                <li><a href="#">Contact Us</a></li>
                <!-- <li><a href="#">Privacy Policy</a></li>
                  <li><a href="#">Disclaimer</a></li>
                  <li><a href="#">Terms of use</a></li> -->
              </ul>
            </div>
          </div>
          <div class="col-md-2">
            <div class="footer-links">
              <h5>Wellness Centre</h5>
              <ul>
                <li><a href="#">Health Packages</a></li>
                <li><a href="#">Ayurveda</a></li>
                <!-- <li><a href="#">Acupressure and Acupuncture</a></li>
                  <li><a href="#">Yoga</a></li>
                  <li><a href="#">Physiotherapy</a></li> -->
                <li>
                  <a href="#">
                    <!-- Other --> Alternative Therapies
                  </a>
                </li>
              </ul>
              <h5><a href="#">Virtual Tour</a></h5>
              <h5>News &amp; Events</h5>
              <ul>
                <!-- <li><a href="#">News &amp; Events</a></li> -->
                <li><a href="#">Announcements</a></li>
                <li><a href="#">Gallery</a></li>
                <li><a href="#">Career</a></li>
              </ul>
            </div>
          </div>
          <!-- <div class="col-md-4"> -->
          <!-- <div class="footer-contact">
            <h5>Contact Us</h5>
            <ul>
              <li><i class="fa fa-map-marker"></i> Somaiya Ayurvihar Complex, Eastern Express Highway, Sion(E), Mumbai - 400 022</li>
              <li><i class="fa fa-phone"></i> <a href="">+91 22 6112 4800</a></li>
              <li><i class="fa fa-phone"></i> <a href="">+91 22 5095 4700</a></li>
            </ul>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3771.371678895254!2d72.87211882332116!3d19.047389252873817!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c8c9d2d56e49%3A0xbc42afe04f7f411!2sSomaiya%20Ayurvihar!5e0!3m2!1sen!2sin!4v1761636818663!5m2!1sen!2sin" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div> -->
          <!-- </div> -->
        </div>
        <hr>
        <div class="row">
          <div class="col-md-6">
            <div class="copyright-text">
              <p>Copyright © 2025 K J Somaiya Hospital. All Rights Reserved. | Crafted by <a href="https://www.matrixbricks.com/" target="_blank">Matrix Bricks</a></p>
            </div>
          </div>
          <div class="col-md-6">
            <ul class="privacy_links">
              <li><a href="#">Privacy</a></li>
              <li><a href="#">Disclaimers</a></li>
              <li><a href="#">Terms and Conditions</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>