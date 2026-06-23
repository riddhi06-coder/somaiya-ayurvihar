
<!DOCTYPE html>
<html lang="en">
    <head>
        @include('components.frontend.head')

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
                        <li><a href="{{ route('frontend.gallery_listing') }}">Gallery</a></li>
                        <li class="active">{{ $gallery->event_name }}</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>


        <section class="section-wrap gallery_inner_wrap">
            <div class="container">

                <!-- Heading -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading wow fadeInLeft" data-wow-delay="00ms"
                            data-wow-duration="1500ms">

                            @if(!empty($gallery->date))
                                <h2>
                                    <i class="fa fa-calendar" aria-hidden="true"></i> 
                                    @php
                                        $date = \Carbon\Carbon::parse($gallery->date);
                                    @endphp
                            
                                    {{ $date->format('d') }}<sup>{{ $date->format('S') }}</sup> {{ $date->format('F Y') }}
                                </h2>
                            @endif

                            @if(!empty($details->description))
                                <p>
                                    {!! $details->description !!}
                                </p>
                            @endif

                        </div>
                    </div>
                </div>

                <hr>

                <!-- Images -->
                <div class="row gallery-wrap">

                    @if(!empty($images))
                        @foreach($images as $img)
                            <div class="col-md-3">
                                <div class="single-single-gallery">
                                    <div class="single-gallery">

                                        <a href="{{ asset('uploads/gallery_details/'.$img) }}"
                                        data-fancybox="gallery"
                                        class="gallery-hover">

                                            <img src="{{ asset('uploads/gallery_details/'.$img) }}"
                                                class="img-responsive">

                                            <div class="overlay">
                                                <span class="plus-icon">+</span>
                                            </div>

                                        </a>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-md-12 text-center">
                            <p>No images available</p>
                        </div>
                    @endif

                </div>
            </div>
        </section>

        @include('components.frontend.footer')
        
        @include('components.frontend.main-js')


        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>


        <script>
        // gallery start
        $(window).on('load', function () {
            $('#masonry-gallery').masonry({
            itemSelector: '.grid-item',
            percentPosition: true,
            columnWidth: '.grid-item'
            });
        });
        
        Fancybox.bind("[data-fancybox='gallery']", {
            // Optional settings
            Thumbs: false,
            Toolbar: true,
            closeButton: "top",
        });
        Fancybox.bind("[data-fancybox='gallery1']", {
            // Optional settings
            Thumbs: false,
            Toolbar: true,
            closeButton: "top",
        });
        // gallery end
        </script>
        

  </body>
</html>