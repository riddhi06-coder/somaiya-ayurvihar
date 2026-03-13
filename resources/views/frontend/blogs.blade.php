
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
                        <li class="active">Blogs</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
        </section>

        
        <section class="section-wrap blog_wrap">
            <div class="container">
                <div class="row">
                <div class="col-md-4">
                    <div class="single-blog-post">
                    <div class="post-image">
                        <a href="blog-details.html">
                        <figure>
                            <img src="{{ asset('frontend/assets/img/blog/blog1.jpg') }}" alt="blog one">
                        </figure>
                        </a>
                    </div>
                    <div class="post-content">
                        <ul class="post-meta">
                        <li>
                            <a href="#">
                            <i class="fa fa-user"></i>
                            <span>By: Admin</span>
                            </a>
                        </li>
                        <li>
                            <i class="fa fa-calendar"></i>
                            <span>March 14, 2025</span>
                        </li>
                        </ul>
                        <h2><a href="#">simply dummy text of the printing and typesetting industry</a></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <div class="blog-list-button">
                        <div class="button-box">
                            <a class="twenty" href="blog-details.html"><span>Read More</span></a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-blog-post">
                    <div class="post-image">
                        <a href="blog-details.html">
                        <figure>
                            <img src="{{ asset('frontend/assets/img/blog/blog2.jpg') }}" alt="blog two">
                        </figure>
                        </a>
                    </div>
                    <div class="post-content">
                        <ul class="post-meta">
                        <li>
                            <a href="#">
                            <i class="fa fa-user"></i>
                            <span>By: Admin</span>
                            </a>
                        </li>
                        <li>
                            <i class="fa fa-calendar"></i>
                            <span>March 14, 2025</span>
                        </li>
                        </ul>
                        <h2><a href="#">simply dummy text of the printing and typesetting industry</a></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <div class="blog-list-button">
                        <div class="button-box">
                            <a class="twenty" href="blog-details.html"><span>Read More</span></a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-blog-post">
                    <div class="post-image">
                        <a href="blog-details.html">
                        <figure>
                            <img src="{{ asset('frontend/assets/img/blog/blog3.jpg') }}" alt="blog tree">
                        </figure>
                        </a>
                    </div>
                    <div class="post-content">
                        <ul class="post-meta">
                        <li>
                            <a href="#">
                            <i class="fa fa-user"></i>
                            <span>By: Admin</span>
                            </a>
                        </li>
                        <li>
                            <i class="fa fa-calendar"></i>
                            <span>March 14, 2025</span>
                        </li>
                        </ul>
                        <h2><a href="#">simply dummy text of the printing and typesetting industry</a></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <div class="blog-list-button">
                        <div class="button-box">
                            <a class="twenty" href="blog-details.html"><span>Read More</span></a>
                        </div>
                        </div>
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