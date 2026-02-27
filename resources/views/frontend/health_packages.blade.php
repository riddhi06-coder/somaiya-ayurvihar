
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
                    <form method="GET" action="#">
                        <div class="sidebar_filter sidebar-sticky">

                            <div class="filter-title">Filter Panel :</div>

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
                                            <a href="#" class="btn pricing-btn">
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

        <!-- Modal -->
        <div id="health-checkup" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content -->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Book Health Check</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                <h6 class="form-title">please fill out all required fields meaning</h6>
                <form class="book-appoint-form">
                <div class="col-md-6">
                    <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <input type="text" class="form-control" placeholder="Package" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Date of Birth:</label>
                    <input type="date" class="form-control" placeholder="" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Date of Appointment :</label>
                    <input type="date" class="form-control" placeholder="" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email ID" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <input type="text" class="form-control" placeholder="Mobile Number" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="button-box">
                    <a class="twenty" href="#"><span>Submit</span></a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>


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


    </body>
</html>