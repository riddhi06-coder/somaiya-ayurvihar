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
                        <li class="active">Biomedical Waste</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>


        <section class="section-wrap biomedical_waste_wrap">
            <div class="container">
                <div class="row">
                <div c;ass="col-md-12">
                    <div class="panel-group" id="faqAccordion">
                    <div class="panel panel-default">
                        <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq1">
                        <h4 class="panel-title">
                            BMW Annual Return Form IV Year 2024
                            <i class="fa fa-chevron-down"></i>
                        </h4>
                        </div>
                        <div id="faq1" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="row">
                            <div class="col-md-4">
                                <div class="pdf-card">
                                <div class="pdf-icon">
                                    <i class="fa fa-file-pdf-o"></i>
                                </div>
                                <div class="pdf-content">
                                    <h4>Annual Return Form IV Year 2024</h4>
                                    <a href="{{ asset('frontend/assets/pdf/biomedical-waste/BMW-annual-return-form-IV-year-2024.pdf') }}" target="_blank" class="btn btn-danger btn-sm">
                                    <i class="fa fa-download"></i> Download
                                    </a>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-8"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq2">
                        <h4 class="panel-title">
                            BMW Annual Return Form IV Year 2023
                            <i class="fa fa-chevron-down"></i>
                        </h4>
                        </div>
                        <div id="faq2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                            <div class="col-md-4">
                                <div class="pdf-card">
                                <div class="pdf-icon">
                                    <i class="fa fa-file-pdf-o"></i>
                                </div>
                                <div class="pdf-content">
                                    <h4>Annual Return Form IV Year 2023</h4>
                                    <a href="{{ asset('frontend/assets/pdf/biomedical-waste/BMW-annual-return-form-IV-year-2023.pdf') }}" target="_blank" class="btn btn-danger btn-sm">
                                    <i class="fa fa-download"></i> Download
                                    </a>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-8"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq3">
                        <h4 class="panel-title">
                            BMW Annual Return Form IV Year 2022
                            <i class="fa fa-chevron-down"></i>
                        </h4>
                        </div>
                        <div id="faq3" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                            <div class="col-md-4">
                                <div class="pdf-card">
                                <div class="pdf-icon">
                                    <i class="fa fa-file-pdf-o"></i>
                                </div>
                                <div class="pdf-content">
                                    <h4>Annual Return Form IV Year 2022</h4>
                                    <a href="{{ asset('frontend/assets/pdf/biomedical-waste/BMW-annual-return-form-IV-year-2022.pdf') }}" target="_blank" class="btn btn-danger btn-sm">
                                    <i class="fa fa-download"></i> Download
                                    </a>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-8"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#faq4">
                        <h4 class="panel-title">
                            BMW Annual Return Form IV Year 2021
                            <i class="fa fa-chevron-down"></i>
                        </h4>
                        </div>
                        <div id="faq4" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                            <div class="col-md-4">
                                <div class="pdf-card">
                                <div class="pdf-icon">
                                    <i class="fa fa-file-pdf-o"></i>
                                </div>
                                <div class="pdf-content">
                                    <h4>Annual Return Form IV Year 2021</h4>
                                    <a href="{{ asset('frontend/assets/pdf/biomedical-waste/BMW-annual-return-form-IV-year-2021.pdf') }}" target="_blank" class="btn btn-danger btn-sm">
                                    <i class="fa fa-download"></i> Download
                                    </a>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-8"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>


        @include('components.frontend.footer')
        
        @include('components.frontend.main-js')


  </body>
</html>