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
                    <div class="col-md-12">
        
                        <div class="panel-group" id="faqAccordion">
        
                            @foreach($biomedical_wastes as $key => $item)
        
                                @php
                                    $collapseId = 'faq' . $key;
                                    $isFirst = $key == 0 ? 'in' : '';
                                @endphp
        
                                <div class="panel panel-default">
        
                                    <div class="panel-heading"
                                         data-toggle="collapse"
                                         data-parent="#faqAccordion"
                                         href="#{{ $collapseId }}"
                                         style="cursor: pointer;">
        
                                        <h4 class="panel-title">
                                            {{ $item->title }}
                                            <i class="fa fa-chevron-down"></i>
                                        </h4>
                                    </div>
        
                                    <div id="{{ $collapseId }}" class="panel-collapse collapse {{ $isFirst }}">
                                        <div class="panel-body">
                                            <div class="row">
        
                                                <div class="col-md-4">
                                                    <div class="pdf-card">
                                                        <div class="pdf-icon">
                                                            <i class="fa fa-file-pdf-o"></i>
                                                        </div>
        
                                                        <div class="pdf-content">
                                                            <h4>{{ $item->doc_name }}</h4>
        
                                                            <a href="{{ asset('uploads/biomedical/'.$item->document) }}"
                                                               target="_blank"
                                                               class="btn btn-danger btn-sm">
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
        
                            @endforeach
        
                        </div>
        
                    </div>
                </div>
            </div>
        </section>


        @include('components.frontend.footer')
        
        @include('components.frontend.main-js')


  </body>
</html>