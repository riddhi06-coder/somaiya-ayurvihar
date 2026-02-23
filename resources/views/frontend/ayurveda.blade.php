
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
                        <li>Wellness Center</li>
                        <li class="active">Ayurveda</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>

        <section class="section-wrap ayurveda-wrap"
                style="background: url('{{ asset('/uploads/ayurveda/'.$ayurveda->image) }}') no-repeat center center;
                    background-size: cover;">

            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="content wow fadeInLeft"
                            data-wow-delay="00ms"
                            data-wow-duration="1500ms">

                            <h5>{{ $ayurveda->heading ?? 'Ayurveda' }}</h5>

                            {!! $ayurveda->description ?? '' !!}

                            <div class="button-box">
                                <a class="twenty"
                                type="button"
                                data-toggle="modal"
                                data-target="#wellness_form">
                                    <span>Enquiry</span>
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-5"></div>
                </div>
            </div>
        </section>


        <div id="wellness_form" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content -->
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Please fill out all required fields meaning</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                    <!--  <h6 class="form-title">please fill out all required fields meaning</h6> -->
                    <form class="book-appoint-form">
                    <div class="col-md-12">
                        <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email Address" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        <input type="text" class="form-control" placeholder="Mobile Number" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        <textarea type="text" class="form-control" placeholder="Message" required></textarea>
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


        @include('components.frontend.footer')
     
        @include('components.frontend.main-js')


    </body>
</html>