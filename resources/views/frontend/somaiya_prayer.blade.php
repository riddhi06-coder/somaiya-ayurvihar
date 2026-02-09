
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
                        <li class="active">Somaiya Prayer</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>

        <section class="section-wrap prayer_wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="prayer-box-bg">
                            @if($somaiya_prayer->first()?->image)
                                <img src="{{ asset('uploads/prayer/' . $somaiya_prayer->image) }}" 
                                    alt="Praying Image">
                            @else
                                <!-- Fallback if no image -->
                                <img src="{{ asset('img/about/praying.png') }}" alt="Praying Image">
                            @endif
                            <h1 class="prayer-title">{{ $somaiya_prayer->heading }}</h1>

                            <div class="prayer-text">
                                <p>{!! $somaiya_prayer->description !!}</p>
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