
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
                        <li><a href="#">About Us</a></li>
                        <li class="active">Awards & Accolades</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>

        <section class="awards-wrap">
            <div class="container">
        
                <div class="row">
                    <div class="col-md-12">
                        <div class="content text-center wow fadeInUp"
                             data-wow-delay="00ms"
                             data-wow-duration="1500ms">
                            <h5>
                                {{ $awards->first()->heading ?? 'Commitment to QUALITY Healthcare services' }}
                            </h5>
        
                        </div>
                    </div>
                </div>
        
                <div class="achievement-section">
                    <div class="row">
        
                        @forelse($awards as $item)
        
                            <div class="col-md-3 col-sm-6">
                                <div class="achievement-card">
        
                                    <div class="achievement-icon">
                                        <img src="{{ asset('uploads/awards/'.$item->banner_image) }}"
                                             alt="award">
                                    </div>
        
                                    <h3>
                                        {{ $item->certification_name }}
                                    </h3>
                                        {!! $item->desc !!}
                                    
        
                                </div>
                            </div>
        
                        @empty
        
                            <div class="col-md-12 text-center">
                                <p>No awards found.</p>
                            </div>
        
                        @endforelse
        
                    </div>
                </div>
        
            </div>
        </section>

        <section class="awards-wrap awards-wrap-two">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <div class="content text-center wow fadeInUp" data-wow-delay="00ms"
                    data-wow-duration="1500ms">
                    <h5>{{ $main_award->heading ?? 'Awards & Accolades' }}</h5>
                    <p>{{ $main_award->short_desc ?? 'Awards and honors received reflecting our impact on the healthcare landscape1' }}</p>
                    </div>
                </div>
                </div>
                
                <div class="achievement-section">
                    <div class="row">
                
                        @forelse($awards_accolades as $award)
                            <div class="col-md-4">
                                <div class="achievement-card">
                
                                    <!-- Icon / Image -->
                                    <div class="achievement-icon">
                                        @if(!empty($award->banner_image))
                                            <img src="{{ asset('uploads/accolades_awards/'.$award->banner_image) }}">
                                        @else
                                            <img src="{{ asset('frontend/assets/img/icon/medal.svg') }}">
                                        @endif
                                    </div>
                
                                    <!-- Description -->
                             
                                        {!! $award->desc ?? '' !!}
           
                                    <!-- Date -->
                                    <h6>
                                        <i class="fa fa-calendar-o"></i>
                                        {{ \Carbon\Carbon::parse($award->date)->format("M ‘y") }}
                                    </h6>
                
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12 text-center">
                                <p>No awards found.</p>
                            </div>
                        @endforelse
                
                    </div>
                </div>
                
                
                <div class="gallery-awards-section">
                    <div class="row">

                        @forelse($awards_images as $image)
                            <div class="col-md-4">
                                <div class="single-single-gallery">
                    
                                    <div class="single-gallery">
                                        <a href="{{ asset('uploads/accolades_awards/'.$image->banner_image) }}" 
                                           data-fancybox="gallery" 
                                           class="gallery-hover">
                    
                                            <img src="{{ asset('uploads/accolades_awards/'.$image->banner_image) }}" 
                                                 class="img-responsive">
                    
                                            <div class="overlay">
                                                <span class="plus-icon">+</span>
                                            </div>
                                        </a>
                                    </div>
                    
                                    <!-- Description -->
                               
                                        {!! $image->desc ?? '' !!}
                                    
                    
                                    <!-- Date -->
                                    <h6>
                                        <i class="fa fa-calendar-o"></i>
                                        {{ \Carbon\Carbon::parse($image->date)->format("M ‘y") }}
                                    </h6>
                    
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12 text-center">
                                <p>No images found.</p>
                            </div>
                        @endforelse
                    
                    </div>
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