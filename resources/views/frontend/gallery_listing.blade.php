
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
                <form class="media-filter-form" method="GET" action="{{ route('frontend.gallery_listing') }}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="filter-group search-group">
                                <label>Search</label>
                                <input type="text" name="search" id="searchInput" placeholder="Search media coverage..." class="form-control">
                            </div>
                        </div>
                
                        <div class="col-md-6">
                            <div class="filter-group">
                                <label>Year</label>
                                <select class="form-control" name="year" id="yearFilter">
                                    <option value="">All Years</option>
                                    @foreach($years as $year)
                                        <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                                            {{ $year }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                
                    <div class="text-right filter-btn-wrap">
                        <button class="twenty" type="button" id="resetFilter">
                            <span>Reset</span>
                        </button>
                
                        <button class="twenty" type="submit">
                            <span>Apply</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>


        <section class="section-wrap gallery_wrap">
            <div class="container">
                <div class="row gallery-wrap" id="galleryContainer">

                    @forelse($galleries as $gallery)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <a href="{{ route('frontend.gallery_details', $gallery->slug) }}">
                            <div class="gallery-thumb">
                                
                                <!-- Image -->
                                <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->event_name }}">

                                <div class="gallery-caption">
                                    
                                    <!-- Title -->
                                    <h5>
                                        <!--<a href="{{ route('frontend.gallery_details', $gallery->slug) }}">-->{{ $gallery->event_name }}<!--</a>-->
                                    </h5>

                                    <!-- Date -->
                                    <p>
                                        @if($gallery->date)
                                            @php
                                                $date = \Carbon\Carbon::parse($gallery->date);
                                            @endphp
                                    
                                            {{ $date->format('j') }}<sup>{{ $date->format('S') }}</sup> {{ strtoupper($date->format('F Y')) }}
                                        @else
                                            --
                                        @endif
                                    </p>
                                </div>
                            </div>
                            </a>
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
        
        <script>
            document.getElementById('resetFilter').addEventListener('click', function () {
                window.location.href = "{{ route('frontend.gallery_listing') }}";
            });
        </script>
        

  </body>
</html>