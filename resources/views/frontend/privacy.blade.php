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
                <li><a href="index.html"><span class="glyphicon glyphicon-home"></span></a></li>
                <li class="active">Privacy</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section-wrap privacy_wrap">
      <div class="container">
        <div class="row">
          <div class="content">

            @if ($policy)

              {{-- 1. Privacy Policy content --}}
              {!! $policy->privacy_policy !!}

              {{-- 2. FAQ accordion from questions --}}
              @if (!empty($policy->questions))
                <div class="panel-group" id="faqAccordion">
                  @foreach ($policy->questions as $index => $qa)
                    @php $faqId = 'faq' . ($index + 1); @endphp
                    <div class="panel panel-default">
                      <div class="panel-heading" data-toggle="collapse" data-parent="#faqAccordion" href="#{{ $faqId }}">
                        <h4 class="panel-title">
                          <!--{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}. -->
                          {{ $qa['question'] }}
                          <i class="fa fa-chevron-down"></i>
                        </h4>
                      </div>
                      <div id="{{ $faqId }}" class="panel-collapse collapse">
                        <div class="panel-body">
                          {!! $qa['answer'] !!}
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              @endif

              {{-- 3. Contact details --}}
              {!! $policy->contact_details !!}

            @else
              <p>Privacy policy is not available at the moment.</p>
            @endif

          </div>
        </div>
      </div>
    </section>

    @include('components.frontend.footer')

    @include('components.frontend.main-js')

  </body>
</html>