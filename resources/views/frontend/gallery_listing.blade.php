
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
                        <li class="active">Gallery</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>

        
        <div class="media-filter-wrap">
            <div class="container">
                <form class="media-filter-form">
                <div class="row">
                    <!-- Search -->
                    <div class="col-md-6">
                    <div class="filter-group search-group">
                        <label>Search</label>
                        <input type="text" id="searchInput" class="form-control" placeholder="Search media coverage...">
                        <i class="fa fa-search search-icon"></i>
                    </div>
                    </div>
                    <!-- Year -->
                    <div class="col-md-6">
                    <div class="filter-group" >
                        <label>Year</label>
                        <select class="form-control" id="yearFilter">
                        <option>All Years</option>
                        <option>2026</option>
                        <option>2025</option>
                        <option>2024</option>
                        </select>
                    </div>
                    </div>
                </div>
                <!-- Buttons -->
                <div class="text-right filter-btn-wrap">
                    <div class="button-box">
                    <button class="twenty" type="reset"><span>Reset</span></button>
                    </div>
                    <div class="button-box">
                    <button class="twenty" type="submit"><span>Apply</span></button>
                    </div>
                </div>
                </form>
            </div>
        </div>


        <section class="section-wrap gallery_wrap">
            <div class="container">
                <div class="row gallery-wrap" id="galleryContainer">

                    @forelse($galleries as $gallery)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="gallery-thumb">
                                
                                <!-- Image -->
                                <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->event_name }}">

                                <div class="gallery-caption">
                                    
                                    <!-- Title -->
                                    <h5>
                                        <a href="{{ route('frontend.gallery_details', $gallery->slug) }}">{{ $gallery->event_name }}</a>
                                    </h5>

                                    <!-- Date -->
                                    <p>
                                        @if($gallery->date)
                                            {{ \Carbon\Carbon::parse($gallery->date)->format('jS F Y') }}
                                        @else
                                            --
                                        @endif
                                    </p>

                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p>No Gallery Found</p>
                        </div>
                    @endforelse

                </div>
            </div>
        </section>


        @include('components.frontend.footer')
        
        @include('components.frontend.main-js')
        

  </body>
</html>