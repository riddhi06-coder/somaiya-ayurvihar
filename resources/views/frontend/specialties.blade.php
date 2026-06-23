
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
                        <li class="active">Specialties</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>


        <section class="section-wrap specialties_wrap">
            <div class="container">
                <div class="row">
        
                    @foreach($specialities as $item)
                        <div class="col-md-3 col-sm-6">
                            <div class="iconbox-v3">
        
                                <!-- Icon / Image -->
                                <div class="iconbox-icon">
                                    @if($item->specialities_image)
                                        @php
                                            $ext = pathinfo($item->specialities_image, PATHINFO_EXTENSION);
                                        @endphp
        
                                        @if($ext == 'svg')
                                            {{-- Show SVG --}}
                                            {!! file_get_contents(public_path('uploads/specialities/' . $item->specialities_image)) !!}
                                        @else
                                            {{-- Show Image --}}
                                            <img src="{{ asset('uploads/specialities/' . $item->specialities_image) }}"
                                                 alt="icon"
                                                 style="height:60px;">
                                        @endif
                                    @endif
                                </div>
        
                                <!-- Content -->
                                <div class="speciality-content">
                                    <h4>
                                        <a href="#">
                                            {{ $item->subcategory->subcategory_name ?? 'N/A' }}
                                        </a>
                                    </h4>
        
                                    <p>{!! $item->desc !!}</p>
                                </div>
        
                                <a href="{{ route('frontend.service_details', $item->subcategory->slug ?? '#') }}" class="medixal-link">
                                    Know More <span>↗</span>
                                </a>
        
                            </div>
                        </div>
                    @endforeach
        
                </div>
            </div>
        </section>



        @include('components.frontend.footer')
        
        @include('components.frontend.main-js')


  </body>
</html>