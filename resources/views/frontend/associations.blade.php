
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
                        <li class="active">Associations</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>


        <section class="section-wrap associations_wrap">
            <div class="container">

                @php $count = 1; @endphp

                @foreach($associations->chunk(2) as $row)

                    <div class="row">

                        @foreach($row as $association)

                            <div class="col-md-6">
                                <div class="associations-box">

                                    <div class="associations-num">
                                        {{ str_pad($count++, 2, '0', STR_PAD_LEFT) }}
                                    </div>

                                    <h4>{{ $association->asso_name }}</h4>

                                    <p class="associations_box_p">
                                        {{ $association->assoc_desc }}
                                    </p>

                                    @if($association->assoc_contact)
                                        <p>
                                            <a href="tel:{{ $association->assoc_contact }}">
                                                <i class="fa fa-phone"></i> {{ $association->assoc_contact }}
                                            </a>
                                        </p>
                                    @endif

                                    @if($association->assoc_url)
                                        <p>
                                            <a href="{{ $association->assoc_url }}" target="_blank">
                                                <i class="fa fa-link"></i> {{ $association->assoc_url }}
                                            </a>
                                        </p>
                                    @endif

                                </div>
                            </div>

                        @endforeach

                    </div>

                @endforeach

            </div>

        </section>

        @include('components.frontend.footer')
     
        @include('components.frontend.main-js')


    </body>
</html>