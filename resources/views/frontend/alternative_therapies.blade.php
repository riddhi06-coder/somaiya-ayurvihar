
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
                        <li class="active">Alternative Therapies</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>

        @if($alternative_therapies->count())

        <section class="section-wrap alternative-therapies-wrap">
            <div class="container">

                @foreach($alternative_therapies as $key => $therapy)


                    @php
                        $formattedDescription = $therapy->description;

                        // Replace figure wrapper
                        $formattedDescription = preg_replace(
                            '/<figure[^>]*class="[^"]*table[^"]*"[^>]*>/i',
                            '<div class="table-responsive">',
                            $formattedDescription
                        );

                        $formattedDescription = str_replace('</figure>', '</div>', $formattedDescription);

                        // Add Bootstrap table class
                        $formattedDescription = preg_replace(
                            '/<table(?![^>]*class=)/i',
                            '<table class="table"',
                            $formattedDescription
                        );

                        // Add class="head" to first header row
                        $formattedDescription = preg_replace(
                            '/<thead>\s*<tr>/i',
                            '<thead><tr class="head">',
                            $formattedDescription
                        );


                        $formattedDescription = preg_replace(
                            '/(<thead>\s*<tr class="head">.*?<\/tr>)(.*?)(<\/thead>)/is',
                            '$1</thead><tbody>$2</tbody>',
                            $formattedDescription
                        );
                    @endphp


                    {{-- FIRST RECORD FULL WIDTH --}}
                    @if($key == 0)

                        <div class="row">
                            <div class="col-md-12">
                                <div class="content">
                                    <h5>{{ $therapy->heading }}</h5>
                                    {!! $formattedDescription !!}
                                </div>
                            </div>
                        </div>

                    @else

                        {{-- EVEN RECORDS (Content Left, Image Right) --}}
                        @if($key % 2 != 0)

                            <div class="row">
                                <div class="col-md-7">
                                    <div class="content">
                                        <h5>{{ $therapy->heading }}</h5>
                                    

                                        {!! $formattedDescription !!}
                                    </div>
                                </div>

                                @if(!empty($therapy->image))
                                <div class="col-md-5">
                                    <div class="content-img wow fadeInRight"
                                        data-wow-delay="00ms"
                                        data-wow-duration="1500ms">
                                        <img src="{{ asset('uploads/alternative-therapy/'.$therapy->image) }}"
                                            class="img-responsive"
                                            alt="{{ $therapy->heading }}">
                                    </div>
                                </div>
                                @endif
                            </div>

                        {{-- ODD RECORDS (Image Left, Content Right) --}}
                        @else

                            <div class="row">
                                @if(!empty($therapy->image))
                                <div class="col-md-5">
                                    <div class="content-img wow fadeInLeft"
                                        data-wow-delay="00ms"
                                        data-wow-duration="1500ms">
                                        <img src="{{ asset('uploads/alternative-therapy/'.$therapy->image) }}"
                                            class="img-responsive"
                                            alt="{{ $therapy->heading }}">
                                    </div>
                                </div>
                                @endif

                                <div class="col-md-7">
                                    <div class="content">
                                        <h5><!--<i class="fa fa-phone"></i>--> {{ $therapy->heading }}</h5>
                                        {!! $formattedDescription !!}
                                    </div>
                                </div>
                            </div>

                        @endif

                    @endif

                @endforeach

            </div>
        </section>

        @endif

        @include('components.frontend.footer')
     
        @include('components.frontend.main-js')


    </body>
</html>