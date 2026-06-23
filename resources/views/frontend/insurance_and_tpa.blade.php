
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
                        <li>Patient Services</li>
                        <li class="active">Insurance & TPA</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>


        <section class="section-wrap insurance_tpa_wrap">
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <div class="content wow fadeInLeft" data-wow-delay="00ms"
                    data-wow-duration="1500ms">
                    <h5>{{ $insurance->insurance_heading ?? '' }}</h5>
                    <p>{!! $insurance->room_rent_desc ?? '' !!}</p>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-7">
                    <div class="insurance_content">
                    <h5>{{ $insurance->essential_heading ?? '' }}</h5>
                    <ul class="lists">
                         <span>{!! $insurance->essential_desc !!}</span>
                    </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="content-img">
                   
                    <img src="{{ asset('uploads/insurance/'.$insurance->essential_image) }}" alt="">
                    </div>
                </div>
                </div>
            </div>
        </section>
        
        
        <section class="empanelled_wrap">
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <div class="insurance_content">
                    <h5>Insurance Company On Panel</h5>
                    </div>
                </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                    <!-- Tabs -->
                    <ul class="nav nav-tabs">
                        @php $i = 0; @endphp
                    
                        @foreach($panelData as $type => $companies)
                            <li class="{{ $i == 0 ? 'active' : '' }}">
                                <a href="#tab{{ $i }}" data-toggle="tab">
                                    {{ $type }}
                                </a>
                            </li>
                            @php $i++; @endphp
                        @endforeach
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content" style="margin-top:20px;">
    
                        @php $i = 0; @endphp
                    
                        @foreach($panelData as $type => $companies)
                            
                            <div class="tab-pane fade {{ $i == 0 ? 'in active' : '' }}" id="tab{{ $i }}">
                                
                                <div class="row justify_row">
                    
                                    @foreach($companies as $comp)
                                        <div class="insurance-col">
                                            <div class="glass-card">
                    
                                                <img src="{{ asset('uploads/company/'.$comp['company_logo']) }}" 
                                                     alt="{{ $comp['company_name'] }}">
                    
                                                <h4>{{ $comp['company_name'] }}</h4>
                    
                                            </div>
                                        </div>
                                    @endforeach
                    
                                </div>
                    
                            </div>
                    
                            @php $i++; @endphp
                    
                        @endforeach
                    
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>


        <section class="section-wrap hospital-journey">
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">{{ $insurance->cashless_heading ?? '' }}</h2>
                    <p class="text-center">{!! $insurance->cash_desc ?? '' !!}</p>
                    <div class="journey-slider owl-carousel">
                        @foreach($cashlessDetails as $key => $step)
                            <div class="journey-step">
                                <div class="icon">Step {{ $key + 1 }}</div>
                                <p>{!! $step['time'] ?? '' !!}</p>
                            </div>
                        @endforeach
                    </div>

                    <p class="text-center"> {!! $insurance->short_cash_desc ?? '' !!}</p>
                </div>
                </div>
            </div>
        </section>


        


        <section class="section-wrap insurance_tpa_two">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="insurance_content lists">
                            {!! Str::before($insurance->tpa_desc, '<h5><strong>In Case of Cashless Claim Denial') !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="insurance_content">
                            <h5><strong>In Case of Cashless Claim Denial</strong></h5>
                            {!! Str::after($insurance->tpa_desc, '<h5><strong>In Case of Cashless Claim Denial') !!}
                        </div>
                    </div>
                </div>
                
                <div class="row">
                <div class="col-md-6">
                    <div class="insurance_content">
                        {!! str_replace('<ul>', '<ul class="lists">', $insurance->reimburse_desc ?? '') !!}
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="content-img">
                        <img src="{{ asset('uploads/insurance/'.$insurance->reimburse_image) }}" 
                             class="img-responsive" 
                             alt="Reimbursement">
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="insurance_content">
                    
                    <p>{!! $insurance->disclaimer_desc !!}</p>
                    </div>
                </div>
                </div>
            </div>
        </section>


        <section class="section-wrap faq_page">
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <div class="content wow fadeInLeft" data-wow-delay="00ms"
                    data-wow-duration="1500ms">
                    <h5>{{ $insurance->faq_heading ?? 'Frequently Asked Questions' }}</h5>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-7">
                    <div class="panel-group" id="faqAccordion">

                        @foreach($faqData as $key => $faq)
                            <div class="panel panel-default">
                        
                                <div class="panel-heading" 
                                     data-toggle="collapse" 
                                     data-parent="#faqAccordion" 
                                     href="#faq{{ $key }}">
                        
                                    <h4 class="panel-title">
                                        {{ str_pad($key+1, 2, '0', STR_PAD_LEFT) }}. 
                                        {{ $faq['question'] ?? '' }}
                                        <i class="fa fa-chevron-down"></i>
                                    </h4>
                                </div>
                        
                                <div id="faq{{ $key }}" 
                                     class="panel-collapse collapse {{ $key == 0 ? 'in' : '' }}">
                        
                                    <div class="panel-body">
                                        <p>{!! $faq['answer'] ?? '' !!}</p>
                                    </div>
                        
                                </div>
                        
                            </div>
                        @endforeach
                        
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="faq-img">
                        <img src="{{ asset('uploads/insurance/'.$insurance->faq_image) }}" class="img-responsive">
                    </div>
                </div>
                </div>
            </div>
        </section>


        @include('components.frontend.footer')
        
        @include('components.frontend.main-js')


  </body>
</html>