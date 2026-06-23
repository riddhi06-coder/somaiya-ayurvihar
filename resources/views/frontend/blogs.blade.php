
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
        
                    @forelse($blogs as $blog)
                        <div class="col-md-4">
                            <div class="single-blog-post">
        
                                <!-- Image -->
                                <div class="post-image">
                                    <a href="{{ route('frontend.blog.detail', $blog->slug) }}">
                                        <figure>
                                            <img src="{{ asset('uploads/blogs/' . $blog->blog_image) }}"
                                                 alt="{{ $blog->title }}">
                                        </figure>
                                    </a>
                                </div>
        
                                <!-- Content -->
                                <div class="post-content">
                                    <ul class="post-meta">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user"></i>
                                                <span>By: {{ $blog->author ?? 'Admin' }}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="fa fa-calendar"></i>
                                            <span>{{ \Carbon\Carbon::parse($blog->date)->format('F d, Y') }}</span>
                                        </li>
                                    </ul>
        
                                    <!-- Title -->
                                    <h2>
                                        <a href="{{ route('frontend.blog.detail', $blog->slug) }}">
                                            {{ $blog->title }}
                                        </a>
                                    </h2>
        
                                    <!-- Short Description -->
                                    <p>
                                        {{ \Illuminate\Support\Str::limit(strip_tags($blog->blog_details), 120) }}
                                    </p>
        
                                    <!-- Button -->
                                    <div class="blog-list-button">
                                        <div class="button-box">
                                            <a class="twenty"
                                               href="{{ route('frontend.blog.detail', $blog->slug) }}">
                                                <span>Read More</span>
                                            </a>
                                        </div>
                                    </div>
        
                                </div>
        
                            </div>
                        </div>
                    @empty
                        <div class="col-md-12 text-center">
                            <p>No Blogs Found</p>
                        </div>
                    @endforelse
        
                </div>
            </div>
        </section>


        @include('components.frontend.footer')
        
        @include('components.frontend.main-js')

  </body>
</html>