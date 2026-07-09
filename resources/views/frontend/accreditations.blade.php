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
                <div class="row row-center">

                    @forelse($accreditations as $accreditation)
                        <div class="col-md-3 text-center mb-4">
                            <img src="{{ asset('uploads/accreditations/'.$accreditation->image) }}"
                                 class="img-responsive accreditations-page-img"
                                 style="cursor:pointer;"
                                 data-toggle="modal"
                                 data-target="#accreditations"
                                 data-img="{{ asset('uploads/accreditations/'.$accreditation->image) }}"
                                 data-desc="{{ $accreditation->description }}"
                                 alt="Accreditation">
                        </div>
                    @empty
                        <div class="col-md-12 text-center">
                            <p>No accreditations available at the moment.</p>
                        </div>
                    @endforelse

                </div>
            </div>
        </section>

        @include('components.frontend.footer')

        @include('components.frontend.main-js')

        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

        <script>
            // populate modal with the clicked accreditation's image + description
            $(document).on('click', '.accreditations-page-img', function () {
                var img  = $(this).data('img');
                var desc = $(this).data('desc');

                $('#acc-modal-img').attr('src', img);
                $('#acc-modal-editor').html(desc);
            });

            Fancybox.bind("[data-fancybox='gallery']", {
                Thumbs: false,
                Toolbar: true,
                closeButton: "top",
            });
        </script>

        <!-- Accreditations Modal -->
        <div id="accreditations" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="accreditations-img">
                                    <img id="acc-modal-img" src="" class="img-responsive" loading="lazy" alt="Accreditation">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="section-heading">
                                    <h2 id="acc-modal-title"></h2>
                                </div>
                                <div class="lists" id="acc-modal-editor"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>