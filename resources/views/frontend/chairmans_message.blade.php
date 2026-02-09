
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
                        <li><a href="#">About Us</a></li>
                        <li class="active">Chairman’s Message</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>


        <section class="section-wrap chairman_wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="creative-thumb">
                        <img src="{{ asset('uploads/chairman/' . $chairmans_message->image) }}" alt="Thumbnail">
                        <!-- Title (Always Visible) -->
                        <div class="thumb-title">
                            <h2>{{ $chairmans_message->chairman_name}}</h2>
                            <p>{{ $chairmans_message->chairman_designation}}</p>
                        </div>
                        <!-- Hover Overlay -->
                        <div class="thumb-overlay">
                        </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="chairman_content">
                            {!! $chairmans_message->chairman_description !!}
                        </div>
                    </div>
                </div>
                
                <div class="row chairman-two">
                    <div class="col-md-7">
                        <div class="chairman_content">
                            {!! $chairmans_message->about_description !!}
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="creative-thumb">
                        <img src="{{ asset('uploads/chairman/' . $chairmans_message->desc_image) }}" alt="Thumbnail">
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="section-wrap chairman_content_quote">
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <div class="chairman_content">
                        {!! $chairmans_message->motto !!}
                    </div>
                </div>
                </div>
            </div>
        </section>


        <section class="section-wrap chairman_two_wrap">
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <div class="chairman_content">
                        {!! $chairmans_message->message !!}
                    </div>
                </div>
                </div>
            </div>
        </section>


        @include('components.frontend.footer')
     
        @include('components.frontend.main-js')


    </body>
</html>