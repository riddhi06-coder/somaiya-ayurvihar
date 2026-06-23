<!-- Page Body Start-->
 <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper" data-layout="stroke-svg">
          <div class="logo-wrapper"><a href="{{ route('admin.dashboard') }}"><img class="img-fluid" src="{{ asset('') }}" alt="" style="max-width: 35% !important;"></a>
		  	<a href="{{ route('admin.dashboard') }}">
				<img class="img-fluid" src="{{ asset('admin/assets/images/logo/somaiya-ayurvihar-logo.png') }}" alt="" style="max-width: 85% !important;">
			</a>  
		  <div class="back-btn"><i class="fa fa-angle-left"> </i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
          </div>
          <div class="logo-icon-wrapper"><a href="{{ route('admin.dashboard') }}"><img class="img-fluid" src="{{ asset('admin/assets/images/logo/') }}" alt="" ></a></div>
          <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
              <ul class="sidebar-links" id="simple-bar">
                <li class="back-btn"><a href="{{ route('admin.dashboard') }}"><img class="img-fluid" src="{{ asset('admin/assets/images/logo/favicon_bhoj.png') }}" alt=""></a>
                  <div class="mobile-back text-end"> <span>Back </span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                </li>
             
                <li class="sidebar-list {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                  <i class="fa fa-thumb-tack"> </i>
                  <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.dashboard') }}">
                    <svg class="stroke-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-home') }}"></use>
                    </svg>
                    <span class="lan-3">Dashboard</span>
                  </a>
                </li>

                <!-- Home slider banner Details -->
                <li class="sidebar-list {{ request()->routeIs('admin.banner-details.index', 'admin.awards-details.index','admin.compassion-details.index','admin.testimonial-details.index','admin.footer-details.index') ? 'active' : '' }}">
                  <i class="fa fa-thumb-tack"></i>
                  <a class="sidebar-link sidebar-title" href="#">
                    <svg class="stroke-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-icons') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-icons') }}"></use>
                    </svg>
                    <span>Home</span>
                  </a>
                  <ul class="sidebar-submenu">
                    <li><a href="{{ route('admin.banner-details.index') }}">Banner Details</a></li>
                    <li><a href="{{ route('admin.awards-details.index') }}">Awards Details</a></li>
                    <li><a href="{{ route('admin.compassion-details.index') }}">Compassion Details</a></li>
                     <li><a href="{{ route('admin.manage-virtual-tour.index') }}">Virtual Tour</a></li>
                    <li><a href="{{ route('admin.footer-details.index') }}">Footer Details</a></li>

                  </ul>
                </li>


                <li class="sidebar-list {{ request()->routeIs('admin.medicalservicecategory.index', 'admin.medicalservicesubcategory.index', 'admin.medicalserviceallcategories.index','admin.manage-doctors.index') ? 'active' : '' }}">
                  <i class="fa fa-thumb-tack"> </i>
                  <a class="sidebar-link sidebar-title" href="#">
                    <svg class="stroke-icon"> 
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-button') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-button') }}"></use>
                    </svg>
                    <span>Masters</span>
                  </a>
                  <ul class="sidebar-submenu">
                   <!-- <li><a href="{{ route('admin.category.index') }}">Discover KJSH</a></li>
                   <li><a href="{{ route('admin.kjshsubcategory.index') }}">KJSH Sub Category</a></li> -->
                   <li><a href="{{ route('admin.medicalservicecategory.index') }}">Category</a></li>
                   <li><a href="{{ route('admin.medicalservicesubcategory.index') }}">Sub Category</a></li>
                   <li><a href="{{ route('admin.medicalserviceallcategories.index') }}">Facilities</a></li>
                   <li><a href="{{ route('admin.manage-doctors.index') }}">Doctors</a></li>

                  </ul>
                </li>
                
                
                
                
                <li class="sidebar-list {{ request()->routeIs('admin.manage-appointment-enquiries.index', 'admin.health-pkg-enquiries.index', 'admin.career-enquiries.index') ? 'active' : '' }}">
                  <i class="fa fa-thumb-tack"> </i>
                  <a class="sidebar-link sidebar-title" href="#">
                    <svg class="stroke-icon"> 
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-starter-kit') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-starter-kit') }}"></use>
                    </svg>
                    <span>Form Enquiries</span>
                  </a>
                  <ul class="sidebar-submenu">
                   <li><a href="{{ route('admin.manage-appointment-enquiries.index') }}">Doctor Appointment Enquiries</a></li>
                   <li><a href="{{ route('admin.health-pkg-enquiries.index') }}">Health Packages Enquiries</a></li>
                   <li><a href="{{ route('admin.career-enquiries.index') }}">Career Enquiries</a></li>
                   <li><a href="{{ route('admin.contact-enquiries.index') }}">Contact Enquiries</a></li>
                   <li><a href="{{ route('admin.ayurveda-enquiries.index') }}">Ayurveda Enquiries</a></li>
                   
                  </ul>
                </li>




                <li class="sidebar-list {{ request()->routeIs(
                            'admin.manage-about-intro.index',
                            'admin.manage-vision-mission.index',
                            'admin.manage-chairman-message.index',
                            'admin.manage-associations.index',
                            'admin.manage-prayer.index',
                            'admin.footer-details.index',
                            'admin.manage-management-team.index',
                            'admin.manage-csr-sustainability.index',
                            'admin.manage-accreditations.index',
                            'admin.manage-community-outreach.index'
                        ) ? 'active' : '' }}">
                    
                  <i class="fa fa-thumb-tack"></i>
                  <a class="sidebar-link sidebar-title" href="#">
                    <svg class="stroke-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-layout') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-layout') }}"></use>
                    </svg>
                    <span>About Us</span>
                  </a>
                  <ul class="sidebar-submenu">

                      <li><a href="{{ route('admin.manage-about-intro.index') }}">Introduction</a></li>
                      <li><a href="{{ route('admin.manage-vision-mission.index') }}">Vision & Mision</a></li>
                      <li><a href="{{ route('admin.manage-chairman-message.index') }}">Chairman’s Message</a></li>
                      <li><a href="{{ route('admin.manage-associations.index') }}">Associations</a></li>
                      <li><a href="{{ route('admin.manage-prayer.index') }}">Somaiya Prayer</a></li>
                      <li><a href="{{ route('admin.manage-management-team.index') }}">Management Team</a></li>
                      <li><a href="{{ route('admin.manage-csr-sustainability.index') }}">CSR & Sustainability</a></li>
                      <li><a href="{{ route('admin.manage-accreditations.index') }}">Accreditations</a></li>
                      <li><a href="{{ route('admin.manage-community-outreach.index') }}">Community Outreach</a></li>
                  </ul>

                </li>



                <li class="sidebar-list {{ request()->routeIs('admin.manage-service-details.index', 'admin.manage-diagnostic-critical.index', 'admin.awards-details.index','admin.compassion-details.index','admin.testimonial-details.index','admin.footer-details.index') ? 'active' : '' }}">
                  <i class="fa fa-thumb-tack"></i>
                  <a class="sidebar-link sidebar-title" href="#">
                    <svg class="stroke-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-bonus-kit') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-bonus-kit') }}"></use>
                    </svg>
                    <span>Service Details</span>
                  </a>
                  <ul class="sidebar-submenu">
                      <li><a href="{{ route('admin.manage-service-details.index') }}">Specialities</a></li>
                      <li><a href="{{ route('admin.manage-diagnostic-critical.index') }}">Diagnostic & Critical</a></li>
                   
                  </ul>

                </li>
                
                
                
                         <li class="sidebar-list {{ request()->routeIs(
                         'admin.manage-inpatient-service.index',
                         'admin.manage-visitor-guide.index',
                            'admin.manage-rights-responsibility.index',
                            'admin.manage-prayer.index',
                            'admin.manage-billing-process.index',
                            'admin.manage-convenience-facilities.index',
                            'admin.manage-government-schemes.index',
                        ) ? 'active' : '' }}">
                    
                  <i class="fa fa-thumb-tack"></i>
                  <a class="sidebar-link sidebar-title" href="#">
                    <svg class="stroke-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-layout') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-layout') }}"></use>
                    </svg>
                    <span>Patient Services</span>
                  </a>
                  <ul class="sidebar-submenu">

                      <li><a href="{{ route('admin.manage-inpatient-service.index') }}">InPatient Services</a></li>
                      <li><a href="{{ route('admin.manage-visitor-guide.index') }}">Visitor Guide</a></li>
                      <li><a href="{{ route('admin.manage-rights-responsibility.index') }}">Rights & Responsibilities</a></li>
                      <li><a href="{{ route('admin.manage-convenience-facilities.index') }}">Convenience & Facilities</a></li>
                      <li><a href="{{ route('admin.manage-government-schemes.index') }}">Government Schemes</a></li>
                      <li><a href="{{ route('admin.manage-billing-process.index') }}">Billing Proccess</a></li>
                  </ul>

                </li>
                

  
                <li class="sidebar-list {{ request()->routeIs('admin.manage-insurance.index', 'admin.manage-company-panel.index') ? 'active' : '' }}">
                  <i class="fa fa-thumb-tack"></i>
                  <a class="sidebar-link sidebar-title" href="#">
                    <svg class="stroke-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-landing-page') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-landing-page') }}"></use>
                    </svg>
                    <span>Insurance & TPA</span>
                  </a>
                  <ul class="sidebar-submenu">
                      <li><a href="{{ route('admin.manage-insurance.index') }}">Page Details</a></li>
                      <li><a href="{{ route('admin.manage-company-panel.index') }}">Company Panel</a></li>
                  </ul>

                </li>
                
                
                
                                
                <li class="sidebar-list {{ request()->routeIs('admin.manage-specialities.index') ? 'active' : '' }}">
                  <i class="fa fa-thumb-tack"></i>
                  <a class="sidebar-link" href="{{ route('admin.manage-specialities.index') }}">
                    <svg class="stroke-icon"> 
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-builders') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-builders') }}"></use>
                    </svg>
                    <span>Specialties</span>
                  </a>
                </li>
                


                <li class="sidebar-list {{ request()->routeIs('admin.manage-biomedical-waste.index') ? 'active' : '' }}">
                  <i class="fa fa-thumb-tack"></i>
                  <a class="sidebar-link" href="{{ route('admin.manage-biomedical-waste.index') }}">
                    <svg class="stroke-icon"> 
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-sample-page') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-sample-page') }}"></use>
                    </svg>
                    <span>Biomedical Waste</span>
                  </a>
                </li>
 
                
                <li class="sidebar-list {{ request()->routeIs('admin.manage-quality-awards.index', 'admin.manage-accolades-awards.index', 'admin.manage-images-awards.index') ? 'active' : '' }}">
                  <i class="fa fa-thumb-tack"></i>
                  <a class="sidebar-link sidebar-title" href="#">
                    <svg class="stroke-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-internationalization') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-internationalization') }}"></use>
                    </svg>
                    <span>Awards & Accolades</span>
                  </a>
                  <ul class="sidebar-submenu">

                    <li><a href="{{ route('admin.manage-quality-awards.index') }}">QUALITY Healthcare</a></li>
                    <li><a href="{{ route('admin.manage-accolades-awards.index') }}">Awards</a></li>
                    <li><a href="{{ route('admin.manage-images-awards.index') }}">Images</a></li>
                  </ul>

                </li>



                <li class="sidebar-list {{ request()->routeIs('admin.manage-media-coverages.index') ? 'active' : '' }}">
                  <i class="fa fa-thumb-tack"></i>
                  <a class="sidebar-link" href="{{ route('admin.manage-media-coverages.index') }}">
                    <svg class="stroke-icon"> 
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-ecommerce') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-ecommerce') }}"></use>
                    </svg>
                    <span>Media Coverages</span>
                  </a>
                </li>


                <li class="sidebar-list {{ request()->routeIs('admin.manage-health-packages.index', 'admin.manage-ayurveda.index', 'admin.manage-alternative-therapy.index','admin.manage-packages-details.index') ? 'active' : '' }}">
                  <i class="fa fa-thumb-tack"></i>
                  <a class="sidebar-link sidebar-title" href="#">
                    <svg class="stroke-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-chat') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-chat') }}"></use>
                    </svg>
                    <span>Wellness Centre </span>
                  </a>
                  <ul class="sidebar-submenu">

                    <li><a class="submenu-title" href="#">Health Packages<span class="sub-arrow"><i class="fa fa-angle-right"></i></span></a>
                      <ul class="nav-sub-childmenu submenu-content">
                        <li><a href="{{ route('admin.manage-health-packages.index') }}">Packages</a></li>
                        <li><a href="{{ route('admin.manage-packages-details.index') }}">Details</a></li>
                       
                      </ul>
                    </li>
                      <li><a href="{{ route('admin.manage-ayurveda.index') }}">Ayurveda</a></li>
                      <li><a href="{{ route('admin.manage-alternative-therapy.index') }}">Alternative Therapies</a></li>
                  </ul>

                </li>




                <li class="sidebar-list {{ request()->routeIs('admin.manage-gallery.index', 'admin.manage-details-gallery.index') ? 'active' : '' }}">
                  <i class="fa fa-thumb-tack"> </i>
                  <a class="sidebar-link sidebar-title" href="#">
                    <svg class="stroke-icon"> 
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-button') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-button') }}"></use>
                    </svg>
                    <span>Gallery</span>
                  </a>
                  <ul class="sidebar-submenu">
                   <li><a href="{{ route('admin.manage-gallery.index') }}">List</a></li>
                   <li><a href="{{ route('admin.manage-details-gallery.index') }}">Details</a></li>


                  </ul>
                </li>
                
                
                <li class="sidebar-list {{ request()->routeIs('admin.manage-announcements.index', 'admin.manage-announce-details.index') ? 'active' : '' }}">
                  <i class="fa fa-thumb-tack"></i>
                  <a class="sidebar-link sidebar-title" href="#">
                    <svg class="stroke-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-search') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-search') }}"></use>
                    </svg>
                    <span>Announcements </span>
                  </a>
                  <ul class="sidebar-submenu">
                      <li><a href="{{ route('admin.manage-announcements.index') }}">Listing</a></li>
                      <li><a href="{{ route('admin.manage-announce-details.index') }}">Details</a></li>

                  </ul>

                </li>
                
                
                
                <li class="sidebar-list {{ request()->routeIs('admin.manage-testimonials.index') ? 'active' : '' }}">
                  <i class="fa fa-thumb-tack"></i>
                  <a class="sidebar-link" href="{{ route('admin.manage-testimonials.index') }}">
                    <svg class="stroke-icon"> 
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-faq') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-faq') }}"></use>
                    </svg>
                    <span>Testimonials</span>
                  </a>
                </li>
                
                
                
                
                <li class="sidebar-list {{ request()->routeIs('admin.manage-blogs.index', 'admin.manage-b-details.index') ? 'active' : '' }}">
                  <i class="fa fa-thumb-tack"></i>
                  <a class="sidebar-link sidebar-title" href="#">
                    <svg class="stroke-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-ui-kits') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-ui-kits') }}"></use>
                    </svg>
                    <span>Blogs </span>
                  </a>
                  <ul class="sidebar-submenu">
                      <li><a href="{{ route('admin.manage-blogs.index') }}">Listing</a></li>
                      <li><a href="{{ route('admin.manage-b-details.index') }}">Details</a></li>

                  </ul>

                </li>
                
                
                <li class="sidebar-list {{ request()->routeIs('admin.manage-career-page.index', 'admin.manage-details.index','admin.manage-career.index') ? 'active' : '' }}">
                  <i class="fa fa-thumb-tack"></i>
                  <a class="sidebar-link sidebar-title" href="#">
                    <svg class="stroke-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-table') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-table') }}"></use>
                    </svg>
                    <span>Career </span>
                  </a>
                  <ul class="sidebar-submenu">
                      <li><a href="{{ route('admin.manage-career-page.index') }}">Page details</a></li>
                      <li><a href="{{ route('admin.manage-career.index') }}">Listing</a></li>
                      <li><a href="{{ route('admin.manage-details.index') }}">Details</a></li>

                  </ul>

                </li>



                <li class="sidebar-list {{ request()->routeIs('admin.manage-contact-us.index') ? 'active' : '' }}">
                  <i class="fa fa-thumb-tack"></i>
                  <a class="sidebar-link" href="{{ route('admin.manage-contact-us.index') }}">
                    <svg class="stroke-icon"> 
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-contact') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-contact') }}"></use>
                    </svg>
                    <span>Contact Us</span>
                  </a>
                </li>



                 <li class="sidebar-list {{ request()->routeIs('admin.manage-disclaimer.index', 'admin.manage-terms-condition.index', 'admin.manage-alternative-therapy.index','admin.manage-packages-details.index') ? 'active' : '' }}">
                  <i class="fa fa-thumb-tack"></i>
                  <a class="sidebar-link sidebar-title" href="#">
                    <svg class="stroke-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-social') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-social') }}"></use>
                    </svg>
                    <span>Policies </span>
                  </a>
                  <ul class="sidebar-submenu">
                      <li><a href="{{ route('admin.manage-ayurveda.index') }}">Privacy</a></li>
                      <li><a href="{{ route('admin.manage-disclaimer.index') }}">Disclaimers</a></li>
                      <li><a href="{{ route('admin.manage-terms-condition.index') }}">Terms and Conditions</a></li>
                  </ul>

                </li>


                
              </ul>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </div>
          </nav>
        </div>


        