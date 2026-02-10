
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
                        <li class="active">Accreditations</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>


        <section class="accreditations-deatils-wrap">
            <div class="container">
                <div class="row justify-content-center">

                    @foreach($accreditations as $accreditation)

                        <div class="col-md-4 mb-4">
                            <div class="single-gallery">

                                <a href="{{ asset('uploads/accreditations/'.$accreditation->image) }}"
                                data-fancybox="gallery"
                                class="gallery-hover accreditations_img">

                                    <img src="{{ asset('uploads/accreditations/'.$accreditation->image) }}"
                                        class="img-responsive">

                                    <div class="overlay">
                                        <span class="plus-icon">+</span>
                                    </div>

                                </a>

                            </div>
                        </div>

                    @endforeach

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