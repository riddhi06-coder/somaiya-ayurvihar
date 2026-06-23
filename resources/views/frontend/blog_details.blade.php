
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
                        <li class="">Blogs</li>
                        <li class="active">Understanding Cashless Health Insurance</li>
                      </ol>
                    </div>
                  </div>
                </div>
              </div>
        </section>
    
    
        <section class="section-wrap blog_details_wrap">
            <div class="container">
                <div class="row">
        
                    <!-- BLOG CONTENT -->
                    <div class="col-md-8">
                        <div class="blog-content">
        
                            <!-- Image -->
                            <img src="{{ asset('uploads/blogs/' . $blog->blog_image) }}" alt="{{ $blog->title }}">
        
                            <!-- Title -->
                            <h1 class="blog-title">{{ $blog->title }}</h1>
        
                            <!-- Meta -->
                            <div class="blog-meta">
                                <span><i class="fa fa-user"></i> {{ $blog->author ?? 'Admin' }}</span> &nbsp; | &nbsp;
                                <span><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($blog->date)->format('d M Y') }}</span>
                            </div>
        
                            <!-- Content (IMPORTANT: render HTML) -->
                            <div>
                               {!! $blogDetails->description !!}
                            </div>
        
                            <!-- Tags -->
                            @if(!empty($blogDetails->tags))
                                <div class="blog-tags mt-3">
                                    <strong>Tags:</strong>
        
                                    @foreach(json_decode($blogDetails->tags, true) as $tag)
                                        <a href="#">{{ $tag }}</a>
                                    @endforeach
                                </div>
                            @endif
        
                        </div>
                    </div>
        
                    <!-- SIDEBAR -->
                    <div class="col-md-4">
                        <div class="sidebar">
        
                            <!-- Search -->
                            <h4>Search</h4>
                            <input type="text" class="form-control" placeholder="Search blog...">
        
                            <hr>
        
                            <!-- Recent Posts -->
                            <h4>Recent Posts</h4>
        
                            @foreach($recentBlogs as $item)
                                <div class="recent-post">
                                    <a href="{{ route('frontend.blog.detail', $item->slug) }}">
                                        {{ $item->title }}
                                    </a>
                                    <span>{{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}</span>
                                </div>
                            @endforeach
        
                        </div>
                    </div>
        
                </div>
            </div>
        </section>
    
        
        
        @include('components.frontend.footer')
        
        @include('components.frontend.main-js')

  </body>
</html>