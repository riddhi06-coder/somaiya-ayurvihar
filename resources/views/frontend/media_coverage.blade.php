
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
                        <li class="active">Media Coverage</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>



        <div class="media-filter-wrap">
            <div class="container">
                <div id="mediaFilterForm" class="media-filter-form">
                    <div class="row">

                        <!-- Search -->
                        <div class="col-md-4 col-sm-12">
                        <div class="filter-group search-group">
                            <label>Search</label>
                            <input type="text"
                                name="search"
                                value="{{ request('search') }}"
                                class="form-control"
                                placeholder="Search media coverage...">
                            <i class="fa fa-search search-icon"></i>
                        </div>
                        </div>

                        <!-- Year -->
                        <div class="col-md-2 col-sm-6">
                        <div class="filter-group">
                            <label>Year</label>
                            <select name="year" class="form-control">
                            <option value="">All Years</option>
                            @foreach($years as $year)
                                <option value="{{ $year }}"
                                {{ request('year') == $year ? 'selected' : '' }}>
                                {{ $year }}
                                </option>
                            @endforeach
                            </select>
                        </div>
                        </div>

                        <!-- Month -->
                        <div class="col-md-2 col-sm-6">
                        <div class="filter-group">
                            <label>Month</label>
                            <select name="month" class="form-control">
                            <option value="">All Months</option>
                            @foreach($months as $month)
                                <option value="{{ $month }}"
                                {{ request('month') == $month ? 'selected' : '' }}>
                                {{ date("F", mktime(0, 0, 0, $month, 1)) }}
                                </option>
                            @endforeach
                            </select>
                        </div>
                        </div>

                        <!-- Source -->
                        <div class="col-md-2 col-sm-6">
                        <div class="filter-group">
                            <label>Source</label>
                            <select name="source" class="form-control">
                            <option value="">All Sources</option>
                            @foreach($sources as $source)
                                <option value="{{ $source }}"
                                {{ request('source') == $source ? 'selected' : '' }}>
                                {{ $source }}
                                </option>
                            @endforeach
                            </select>
                        </div>
                        </div>

                        <!-- Type -->
                        <div class="col-md-2 col-sm-6">
                        <div class="filter-group">
                            <label>Type</label>
                            <select name="type" class="form-control">
                            <option value="">All Types</option>
                            @foreach($types as $type)
                                <option value="{{ $type }}"
                                {{ request('type') == $type ? 'selected' : '' }}>
                                {{ $type }}
                                </option>
                            @endforeach
                            </select>
                        </div>
                        </div>

                    </div>

                    <!-- Buttons -->
                    <div class="text-right filter-btn-wrap">
                        <div class="button-box">
                        <a href="{{ route('frontend.media_coverage') }}" class="twenty">
                            <span>Reset</span>
                        </a>
                        </div>
                        <div class="button-box">
                        <button class="twenty" type="button" id="filterSubmit">
                            <span>Apply</span>
                        </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <section class="section-wrap media_coverage_wrap">
            <div class="container">
                <div class="row">

                    @foreach($media_coverage as $media)

                        <div class="col-md-4 mb-4">
                            <div class="media-thumb">

                                <!-- Media Preview -->
                                <div class="media-image">

                                    @php
                                        $mediaLink = '#';

                                        if ($media->url) {
                                            $mediaLink = $media->url;
                                        } elseif ($media->media_image) {
                                            $mediaLink = asset('uploads/media/'.$media->media_image);
                                        } elseif ($media->media_video) {
                                            $mediaLink = asset('uploads/media/'.$media->media_video);
                                        }
                                    @endphp

                                    <a href="{{ $mediaLink }}" target="_blank">

                                        {{-- If Image --}}
                                        @if($media->media_image)
                                            <img src="{{ asset('uploads/media/'.$media->media_image) }}"
                                                alt="Media Coverage">

                                        {{-- If Video --}}
                                        @elseif($media->media_video)
                                            <video width="100%" controls>
                                                <source src="{{ asset('uploads/media/'.$media->media_video) }}">
                                            </video>

                                        {{-- If Only URL & Thumbnail --}}
                                        @elseif($media->thumbnail_image)
                                            <img src="{{ asset('uploads/media/'.$media->thumbnail_image) }}"
                                                alt="Media Coverage">
                                        @endif

                                    </a>
                                </div>

                                <!-- Content -->
                                <div class="media-content">

                                    <span class="media-date">
                                        {{ \Carbon\Carbon::parse($media->media_publication_date)->format('jS F Y') }}
                                        | {{ $media->media_heading }}
                                    </span>

                                    <h4 class="media-title">
                                        <a href="{{ $mediaLink }}" target="_blank">
                                            {{ $media->description }}
                                        </a>
                                    </h4>

                                    <ul class="media-meta">
                                        <li><strong>Publication:</strong> {{ $media->media_publication }}</li>
                                        <li><strong>Type:</strong> {{ $media->media_type }}</li>
                                    </ul>

                                    <a href="{{ $mediaLink }}" target="_blank" class="media-link">
                                        View More →
                                    </a>

                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
        </section>

        @include('components.frontend.footer')
     
        @include('components.frontend.main-js')



        <script>
            document.addEventListener('DOMContentLoaded', function () {

                document.getElementById('filterSubmit').addEventListener('click', function () {

                    let search  = document.querySelector('[name="search"]').value;
                    let year    = document.querySelector('[name="year"]').value;
                    let month   = document.querySelector('[name="month"]').value;
                    let source  = document.querySelector('[name="source"]').value;
                    let type    = document.querySelector('[name="type"]').value;

                    let params = new URLSearchParams();

                    if (search) params.append('search', search);
                    if (year)   params.append('year', year);
                    if (month)  params.append('month', month);
                    if (source) params.append('source', source);
                    if (type)   params.append('type', type);

                    let baseUrl = "{{ route('frontend.media_coverage') }}";

                    window.location.href = baseUrl + '?' + params.toString();
                });

            });
        </script>

    </body>
</html>