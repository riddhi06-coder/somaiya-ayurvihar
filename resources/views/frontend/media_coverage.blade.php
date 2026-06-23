
<!DOCTYPE html>
<html lang="en">
    <head>
        @include('components.frontend.head')
        
        <style>
            .media_coverage_wrap .row { display: flex; flex-wrap: wrap; }
            .media_coverage_wrap .col-md-4 { display: flex; }
            
            .media-card {
                display: flex;
                flex-direction: column;
                width: 100%;
                background: #fff;
                border: 1px solid #ececec;
                padding: 0px !important;
                border-radius: 10px;
                overflow: hidden;
                transition: box-shadow .25s ease, transform .25s ease;
            }
            .media-card:hover {
                box-shadow: 0 10px 28px rgba(0,0,0,.10);
                transform: translateY(-3px);
            }
            
            /* uniform image area — every card's image is the same height */
            .media-card__media {
                display: block;
                position: relative;
                height: 230px;
                background: #f5f6f8;
                overflow: hidden;
            }
            .media-card__media img,
            .media-card__media video {
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: top center;
                display: block;
                transition: transform .4s ease;
            }
            .media-card:hover .media-card__media img { transform: scale(1.04); }
            
            /* fallback tile when there's no image at all */
            .media-card__placeholder {
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100%;
                padding: 16px;
                text-align: center;
                font-weight: 600;
                color: #8a8f98;
                background: linear-gradient(135deg, #f3f4f6, #e9ebef);
            }
            
            /* body grows so footers align; View More pinned to bottom */
            .media-card__body {
                display: flex;
                flex-direction: column;
                flex: 1 1 auto;
                padding: 16px 18px 18px;
            }
            .media-card__date {
                font-size: 16px !important;
                color: #fff !important;
                font-family: 'firasans-medium';
                background: var(--color-two);
                padding: 8px 20px;
                margin-bottom: 15px;
                border-radius: 30px;
                display: block;
            }
            .media-card__date .sep { color: #fff !important; margin: 0 4px; }
            
            .media-card__title {
                font-size: 17px;
                line-height: 1.4;
                margin: 0 0 12px;
                display: -webkit-box;
                -webkit-line-clamp: 3;          /* keeps long titles tidy */
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
            .media-card__title a { 
                font-size: 18px !important;
                line-height: 1.4;
                margin: 10px 0 15px;
                font-weight: 500 !important;
                color: #333 !important;
                text-decoration: none; }
            .media-card__title a:hover { color: #2b8a8f; }
            
            .media-card__meta {
                list-style: none;
                padding: 0;
                margin: 0 0 14px;
                font-size: 14px;
                color: #4b5563;
            }
            .media-card__meta li { margin-bottom: 4px;font-size: 16px !important; }
            .media-card__meta strong { color: #1f2a37; }
            
            .media-card__link {
                display: inline-block;
                font-size: 16px;
                color: #f58220 !important;
                text-decoration: none;
                font-weight:500 !important;
                font-family: 'firasans-medium';
                text-decoration: none;
            }
            .media-card__link span { transition: transform .2s ease; color: #f58220 !important;display: inline-block; }
            .media-card__link:hover span { transform: translateX(4px); }
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

                    @forelse($media_coverage as $media)

                        @forelse($media_coverage as $media)

    @php
        $mediaLink = '#';
        if ($media->url) {
            $mediaLink = $media->url;
        } elseif ($media->media_image) {
            $mediaLink = asset('uploads/media/'.$media->media_image);
        } elseif ($media->media_video) {
            $mediaLink = asset('uploads/media/'.$media->media_video);
        }

        $imgSrc = $media->media_image
            ? asset('uploads/media/'.$media->media_image)
            : ($media->thumbnail_image ? asset('uploads/media/'.$media->thumbnail_image) : null);
    @endphp

    <div class="col-md-4 col-sm-6 mb-4">
        <div class="media-card">

            <!-- Image / video -->
            <a href="{{ $mediaLink }}" target="_blank" class="media-card__media">
                @if($media->media_video)
                    <video controls>
                        <source src="{{ asset('uploads/media/'.$media->media_video) }}">
                    </video>
                @elseif($imgSrc)
                    <img src="{{ $imgSrc }}" alt="{{ $media->media_publication ?? 'Media Coverage' }}" loading="lazy">
                @else
                    <span class="media-card__placeholder">{{ $media->media_publication ?? 'Media Coverage' }}</span>
                @endif
            </a>

            <!-- Body -->
            <div class="media-card__body">

                @if($media->media_publication_date || $media->media_heading)
                    <span class="media-card__date">
                        @if($media->media_publication_date)
                            {{ \Carbon\Carbon::parse($media->media_publication_date)->format('jS F Y') }}
                        @endif
                        @if($media->media_publication_date && $media->media_heading) <span class="sep">|</span> @endif
                        {{ $media->media_heading }}
                    </span>
                @endif

                @if($media->description)
                    <h4 class="media-card__title">
                        <a href="{{ $mediaLink }}" target="_blank">{{ $media->description }}</a>
                    </h4>
                @elseif($media->media_publication)
                    <h4 class="media-card__title">
                        <a href="{{ $mediaLink }}" target="_blank">{{ $media->media_publication }}</a>
                    </h4>
                @endif

                @if($media->media_publication || $media->media_type)
                    <ul class="media-card__meta">
                        @if($media->media_publication)
                            <li><strong>Publication:</strong> {{ $media->media_publication }}</li>
                        @endif
                        @if($media->media_type)
                            <li><strong>Type:</strong> {{ $media->media_type }}</li>
                        @endif
                    </ul>
                @endif

                <a href="{{ $mediaLink }}" target="_blank" class="media-card__link">View More <span>→</span></a>
            </div>
        </div>
    </div>

@empty
    <div class="col-12 text-center py-5">
        <h4>No Results Found</h4>
        <p>There are no media coverage records matching your search criteria.</p>
    </div>
@endforelse

                    @empty

                        <div class="col-12 text-center py-5">
                            <h4>No Results Found</h4>
                            <p>There are no media coverage records matching your search criteria.</p>
                        </div>
                
                    @endforelse


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