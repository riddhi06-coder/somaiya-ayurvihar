
<!DOCTYPE html>
<html lang="en">
    <head>
        @include('components.frontend.head')
        
        <style>
            .billing_policy_wrap .icon-circle img{
                width: 50px;
                filter: brightness(0) invert(1);
                display: inline-flex;
                align-items: center;
                justify-content: center;
                flex-wrap: wrap;
                height: 50px;
            }
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
                        <li>Patient Services</li>
                        <li class="active">Billing Policy</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>


        <section class="section-wrap billing_policy_wrap">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="content">
                            <h5>{{ $billing->visitor_heading ?? 'Visitors Policy' }}</h5>
                        </div>
                    </div>
                
                    @if(!empty($billing->visitor_details))
                        @foreach($billing->visitor_details as $key => $visitor)
                            <div class="col-sm-6">
                                <div class="icon-box">
                                    <div class="icon-circle">

                                        @if(!empty($visitor['image']))
                                            <img 
                                                src="{{ asset('uploads/visitors/'.$visitor['image']) }}" 
                                                alt="" 
                                                style="width:40px;height:40px;object-fit:contain;"
                                            >
                                        @else
                                            {{-- fallback SVG --}}
                                            @if($key == 0)
                                                <!-- ICU SVG -->
                                                <svg ...>...</svg>
                                            @else
                                                <!-- Ward SVG -->
                                                <svg ...>...</svg>
                                            @endif
                                        @endif
                                    
                                    </div>
                
                                    <h4>{{ $visitor['heading'] ?? '' }}</h4>
                                    <p>{!! str_replace('.', '.<br>', $visitor['time'] ?? '') !!}</p>
                
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
        
                <!-- Room Types Section -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="content">
                            <h5>{{ $billing->room_heading ?? 'Room Types' }}</h5>
                        </div>
                    </div>
                
                    @if(!empty($billing->room_types))
                        @foreach($billing->room_types as $room)
                            <div class="col-sm-3">
                                <div class="icon-box">
                                    <div class="icon-circle">
                                        <img src="{{ asset('uploads/rooms/'.$room['image']) }}" class="img-responsive" alt="">
                                    </div>
                                    <h4>{{ $room['heading'] ?? '' }}</h4>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
        
                <!-- Room Rent Charging Policy -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="content">
                            <h5>{{ $billing->room_rent_heading ?? 'Room Rent Charging Policy' }}</h5>
                            <p>{!! $billing->room_rent_desc ?? 'Room rent is charged on a <b>per-day basis</b>, and the <b>billing day is calculated at 12:00 midnight.</b>' !!}</p>
                        </div>
                    </div>
                </div>
        
                <!-- General Information – TPA / Cashless Insurance -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="content">
                            <h5>{{ $billing->general_info_heading ?? 'General Information – TPA / Cashless Insurance' }}</h5>
                            <p>{!! $billing->general_info_desc ?? '' !!}</p>
                            <h6>Document Submission Timelines</h6>
                        </div>
                    </div>
                </div>
        
                <!-- Document Timelines -->
                <div class="row submission-timelines">
                    @if(!empty($billing->document_timelines))
                        @foreach($billing->document_timelines as $doc)
                            <div class="col-sm-6">
                                <div class="icon-box">
                                    <div class="icon-circle">
                                        <img src="{{ asset('uploads/document_timelines/'.$doc['image']) }}" class="img-responsive" alt="">
                                    </div>
                                    <h4>{{ $doc['heading'] ?? '' }}</h4>
                                    <p>{{ $doc['time'] ?? '' }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
        
                <!-- Documents to be Submitted -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="content">
                            <h5>{{ $billing->doc_submitted_heading ?? 'Documents to be Submitted (Within 24 Hours)' }}</h5>
                            {!! $billing->doc_submitted_desc ?? '' !!}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="content-img documents-submitted-img">
                            @if($billing->doc_image)
                                <img src="{{ asset('uploads/documents/'. $billing->doc_image) }}" class="img-responsive" alt="Documents">
                            @else
                                <img src="{{ asset('frontend/assets/img/patient-services/document-submitted.jpg') }}" class="img-responsive">
                            @endif
                        </div>
                    </div>
                </div>
        
                <!-- Security Deposit + Important Declarations -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="content billing_content">
                            <h5>Security Deposit (Mandatory at Admission)</h5>
                            {!! $billing->sd_desc ?? '' !!}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="content billing_content">
                            <h5>Important Patient Declarations</h5>
                            <p>Before admission, the patient/relative must confirm:</p>
                            {!! $billing->declaration_desc ?? '' !!}
                        </div>
                    </div>
                </div>
        
            </div>
        </section>


        @include('components.frontend.footer')
        
        @include('components.frontend.main-js')


  </body>
</html>