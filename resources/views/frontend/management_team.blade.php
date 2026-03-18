
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
                            <li class="active">Management Team</li>
                        </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="inner-team-deatils-wrap">
            <div class="container">
                <div class="row">

                    @foreach($management_team as $key => $team)

                        <div class="col-md-3 col-sm-6">
                            <div class="team-card"
                                data-toggle="modal"
                                data-target="#teamModal{{ $key }}">

                                <img src="{{ asset('uploads/management_team/'.$team->image) }}" alt="">

                                <h4>{{ $team->name }}</h4>

                                <span>{{ $team->designation }}</span>

                                <a>
                                    Know More <i class="fa fa-plus"></i>
                                </a>

                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
        </section>

        
        <!-- Team Member 1 Modal -->
        @foreach($management_team as $key => $team)
            <div class="team_popup modal fade" id="teamModal{{ $key }}">
                <div class="modal-dialog modal-md">
                    <div class="modal-content team-modal">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                &times;
                            </button>

                            <h4 class="modal-title">
                                {{ $team->name }}
                            </h4>

                            <small>
                                {{ $team->designation }}
                            </small>
                        </div>

                        <div class="modal-body lists">
                            {!! $team->description !!}
                        </div>

                    </div>
                </div>
            </div>
        @endforeach


        @include('components.frontend.footer')
        
        @include('components.frontend.main-js')


  </body>
</html>