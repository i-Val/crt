@extends('layout.app')

    @section('body')
        
        
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{route('page.home')}}">Home</a></li>
          <li>Blog</li>
        </ol>
        <h2>Blog</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">


            @if ($blogs->count() > 0)
              
              @foreach ($blogs as $blog)
                
              <article class="entry">

                <div class="entry-img">
                  <img src="{{asset($blog->photo)}}" alt="blog image" class="img img-fluid" style="width: 100%">
                </div>
  
                <h2 class="entry-title">
                  <a href="#">{{ $blog->title }}</a>
                </h2>
  
                <div class="entry-meta">
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">Admin</a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="2020-01-01">{{ date('D, M Y', strtotime($blog->created_at))  }}</time></a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#">Comments</a></li>
                  </ul>
                </div>
  
                <div class="entry-content">
                  <p>
                    {{ $blog->contents }}
                  </p>
                  <div class="read-more">
                    <a href="{{route('blog.show', ['id' => $blog->id])}}">Read More</a>
                  </div>
                </div>
  
              </article><!-- End blog entry -->

              @endforeach

              @else

              <h3>No Blog Post Yet!</h3>
            @endif

            <div class="blog-pagination">
              <ul class="justify-content-center">
                <li><a href="#"></a></li>
              </ul>
            </div>
            {{ $blogs->links() }}
          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            {{--  including the blog side-bar  --}}
            @include('Pages.includes.blog.side-bar')

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->


    @endsection