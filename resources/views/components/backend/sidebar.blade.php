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
                <li class="sidebar-list {{ request()->routeIs('admin.banner-details.index', 'admin.announcements-details.index', 'admin.awards-details.index','admin.compassion-details.index','admin.testimonial-details.index','admin.footer-details.index') ? 'active' : '' }}">
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
                    <li><a href="{{ route('admin.announcements-details.index') }}">Announcements Details</a></li>
                    <li><a href="{{ route('admin.awards-details.index') }}">Awards Details</a></li>
                    <li><a href="{{ route('admin.compassion-details.index') }}">Compassion Details</a></li>
                    <li><a href="{{ route('admin.testimonial-details.index') }}">Testimonial Details</a></li>
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


                <li class="sidebar-list {{ request()->routeIs('admin.manage-service-details.index') ? 'active' : '' }}">
                  <i class="fa fa-thumb-tack"></i>
                  <a class="sidebar-link" href="{{ route('admin.manage-service-details.index') }}">
                    <svg class="stroke-icon"> 
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-bonus-kit') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-bonus-kit') }}"></use>
                    </svg>
                    <span>Service Details</span>
                  </a>
                </li>
              
                
              </ul>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </div>
          </nav>
        </div>


        