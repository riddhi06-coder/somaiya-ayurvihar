
<!DOCTYPE html>
<html lang="en">
    <head>
        @include('components.frontend.head')

        <style>
        
            .reset-btn-modern {
                display: block;
                width: 100%;
                padding: 10px 14px;
                border: 2px solid #ff7a00;
                border-radius: 6px;
                text-align: center;
                color: #ff7a00;
                font-weight: 600;
                transition: all 0.3s ease;
            }

            .reset-btn-modern:hover {
                background-color: #ff7a00;
                color: #fff;
            }
            
        </style>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css">
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
                        <li><a href="#">Wellness Center</a></li>
                        <li class="active">Health Packages</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>


        <section class="section-wrap health_package_wrap">
            <div class="container">
                <div class="row">

                <div class="col-md-3">
                    <!--mobile filter-->
                         <div class="filter_fixed">
                         <button class="btn btn-primary filter_btn_phone visible-xs visible-sm" id="openFilter">
                        <i class="fa fa-filter"></i>
                        </button>
                        </div>
                        
                        <form method="GET" action="#">
                            <div class="mobile-filter" id="mobileFilter">
                          <div class="filter-header">
                            <span>Filter</span>
                            <button id="closeFilter">&times;</button>
                          </div>
                        <div class="filter-body">
                            <div class="filter-group">
                                <label class="sidebar_filter_label">Types</label>
                                <select class="form-control"
                                        name="type"
                                        onchange="this.form.submit()">
                            
                                    <option value="">--Select Type--</option>
                            
                                    @foreach($types as $type)
                                        <option value="{{ $type }}"
                                            {{ request('type') == $type ? 'selected' : '' }}>
                                            {{ $type }}
                                        </option>
                                    @endforeach
                            
                                </select>
                            </div>
                        </div>   
                            
                          <div class="filter-body">
                             <div class="filter-group">
                                <label class="sidebar_filter_label">Category</label>
                                <select class="form-control"
                                        name="category_id"
                                        onchange="this.form.submit()">
                                    <option value="">--Select Category--</option>

                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->subcategory_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                           <div class="form-group">
                                <label class="sidebar_filter_label">Gender</label>

                                @foreach($genders as $gender)
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"
                                            name="gender[]"
                                            value="{{ $gender }}"
                                            onchange="this.form.submit()"
                                            {{ in_array($gender, request('gender', [])) ? 'checked' : '' }}>
                                        {{ $gender }}
                                    </label>
                                </div>
                                @endforeach

                            </div>

                            <div class="form-group">
                                <label class="sidebar_filter_label">Age Group</label>

                                @foreach($ageRanges as $age)
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"
                                            name="age_range[]"
                                            value="{{ $age }}"
                                            onchange="this.form.submit()"
                                            {{ in_array($age, request('age_range', [])) ? 'checked' : '' }}>
                                        {{ $age }}
                                    </label>
                                </div>
                                @endforeach



                            </div>
                            
                             <div class="form-group mt-3">
                                <a href="{{ route('frontend.health_packages') }}"
                                class="reset-btn-modern">
                                    Reset Filter
                                </a>
                            </div>
                          </div>
                        </div>
                        </form>
                        <!--end mobile filter-->
                        
                        <form method="GET" action="#">
                        <div class="sidebar_filter sidebar-sticky">

                            <div class="filter-title">Filter Panel :</div>
                            
                            
                            <div class="filter-group">
                                <label class="sidebar_filter_label">Types</label>
                                <select class="form-control"
                                        name="type"
                                        onchange="this.form.submit()">
                            
                                    <option value="">--Select Type--</option>
                            
                                    @foreach($types as $type)
                                        <option value="{{ $type }}"
                                            {{ request('type') == $type ? 'selected' : '' }}>
                                            {{ $type }}
                                        </option>
                                    @endforeach
                            
                                </select>
                            </div>



                            <!-- Category -->
                            <div class="filter-group">
                                <label class="sidebar_filter_label">Category</label>
                                <select class="form-control"
                                        name="category_id"
                                        onchange="this.form.submit()">
                                    <option value="">--Select Category--</option>

                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->subcategory_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Gender -->
                            <div class="form-group">
                                <label class="sidebar_filter_label">Gender</label>

                                @foreach($genders as $gender)
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"
                                            name="gender[]"
                                            value="{{ $gender }}"
                                            onchange="this.form.submit()"
                                            {{ in_array($gender, request('gender', [])) ? 'checked' : '' }}>
                                        {{ $gender }}
                                    </label>
                                </div>
                                @endforeach

                            </div>

                            <!-- Age Group -->
                            <div class="form-group">
                                <label class="sidebar_filter_label">Age Group</label>

                                @foreach($ageRanges as $age)
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"
                                            name="age_range[]"
                                            value="{{ $age }}"
                                            onchange="this.form.submit()"
                                            {{ in_array($age, request('age_range', [])) ? 'checked' : '' }}>
                                        {{ $age }}
                                    </label>
                                </div>
                                @endforeach

                            </div>

                            <div class="form-group mt-3">
                                <a href="{{ route('frontend.health_packages') }}"
                                class="reset-btn-modern">
                                    Reset Filter
                                </a>
                            </div>

                        </div>
                    </form>
                </div>

                <div class="col-md-9" id="content">
                    <div class="row">
                    <div id="content">
                        <div class="row pricing-col">
                            @php
                                $bgClasses = ['', 'blue-card', 'green-card', 'orange-card'];
                                $titleClasses = ['red-title', 'blue-title', 'green-title', 'orange-title'];
                            @endphp

                            @forelse($health_packages as $index => $package)

                            @php
                                $bgClass = $bgClasses[$index % 4];
                                $titleClass = $titleClasses[$index % 4];
                            @endphp

                            <div class="col-md-6 item-box">
                                <div class="pricing-col">
                                    <div class="pricing-card-wrapper">

                                        <!-- Background Accent Card -->
                                        <div class="pricing-bg-card {{ $bgClass }}">
                                            
                                            <a href="{{ route('frontend.health_packages_details', $package->slug) }}" class="btn pricing-btn">
                                                View Package <span>→</span>
                                            </a>

                                            <a type="button"
                                            data-toggle="modal"
                                            data-target="#health-checkup"
                                            class="btn pricing-btn book_packages"
                                            data-package="{{ $package->package_name }}">
                                                Book Package <span>→</span>
                                            </a>
                                        </div>

                                        <!-- Main Card -->
                                        <div class="pricing-card">
                                            @php $existingImages = json_decode($package->images, true) ?? []; @endphp
                                            <div class="owl-carousel owl-theme" id="room-gallery">
                                                @if (!empty($existingImages) && is_array($existingImages))
                                                    @foreach ($existingImages as $img)
                                                        <div class="item">
                                                            <div class="single-single-gallery">
                                                                <div class="single-gallery">
                                                                    <a href="{{ asset($img) }}" 
                                                                      data-fancybox="gallery" 
                                                                      class="gallery-hover">
                                                                      <img src="{{ asset($img) }}" class="img-responsive">
                                                                      <div class="overlay">
                                                                        <span class="plus-icon">+</span>
                                                                      </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            
                                            <h4 class="plan-title {{ $titleClass }}">
                                                {{ $package->package_name }}
                                            </h4>

                                            @if($package->actual_price || $package->discounted_price)
                                            <div class="price">

                                                @if($package->actual_price)
                                                    <span class="old-price">
                                                        Rs.{{ number_format($package->actual_price) }}/-
                                                    </span>
                                                @endif

                                                @if($package->discounted_price)
                                                    <sup>Rs.</sup>{{ number_format($package->discounted_price) }}
                                                @endif

                                            </div>
                                            @endif

                                            @php
                                                $genders = json_decode($package->gender, true) ?? [];
                                            @endphp

                                            @if(!empty($package->age_range) || !empty($genders))
                                            <ul class="pricing-features">

                                                @if(!empty($package->age_range))
                                                    <li>Age Range: {{ $package->age_range }}</li>
                                                @endif

                                                @if(!empty($genders))
                                                    <li>
                                                        Gender: {{ implode(', ', $genders) }}
                                                    </li>
                                                @endif

                                            </ul>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>

                            @empty
                            <div class="col-md-12 text-center">
                                <h4>No Packages Available</h4>
                            </div>
                            @endforelse
                        </div>
                    </div>

                    <center>
                        <ul class="pagination" id="pagination"></ul>
                    </center>
                    
                    </div>
                </div>
                </div>
            </div>
        </section>


        @include('components.frontend.footer')
     
        @include('components.frontend.main-js')

 <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

        @if($health_packages instanceof \Illuminate\Pagination\LengthAwarePaginator 
            && $health_packages->lastPage() > 1)

                <script>
                    document.addEventListener("DOMContentLoaded", function() {

                        let paginationHtml = `{!! 
                            $health_packages->appends(request()->query())
                            ->links('pagination::bootstrap-4')
                            ->toHtml() 
                        !!}`;

                        let extracted = $(paginationHtml).find("ul").html();

                        if(extracted.trim() !== ""){
                            document.getElementById("pagination").innerHTML = extracted;
                        } else {
                            document.getElementById("pagination").innerHTML = "";
                        }

                    });
                </script>

                @else

                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        document.getElementById("pagination").innerHTML = "";
                    });
                </script>

        @endif

        <script>
              document.getElementById("openFilter").onclick = function () {
                document.getElementById("mobileFilter").classList.add("active");
              };
              
              document.getElementById("closeFilter").onclick = function () {
                document.getElementById("mobileFilter").classList.remove("active");
              };
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