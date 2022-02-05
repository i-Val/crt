@extends('layout.app')

    @section('body')

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
          <div class="container">
    
            <ol>
              <li><a href="{{route('page.home')}}">Home</a></li>
              <li><a href="{{route('page.blogs')}}">Blog</a></li>
            </ol>
            <h2>{{ $blog->title }}</h2>
    
          </div>
        </section><!-- End Breadcrumbs -->
    
        <!-- ======= Blog Single Section ======= -->
        <section id="blog" class="blog">
          <div class="container" data-aos="fade-up">
    
            <div class="row">
    
              <div class="col-lg-8 entries">
                
                <article class="entry entry-single">
    
                  <div class="entry-img">
                    <img src="{{asset($blog->photo)}}" alt="Blog Image" class="img-fluid" style="width: 100%">
                  </div>
    
                  <h2 class="entry-title">
                    <a href="blog-single.html"> {{ $blog->title }} </a>
                  </h2>
    
                  <div class="entry-meta">
                    <ul>
                      <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">Admin</a></li>
                      <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="2020-01-01">{{ date('D, M Y', strtotime($blog->created_at)) }}</time></a></li>
                      {{-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#">Comments</a></li> --}}
                    </ul>
                  </div>
    
                  <div class="entry-content">
                    <p>
                        {{ $blog->contents }}
                    </p>
                  </div>
    
                  {{-- <div class="entry-footer">
                    <i class="bi bi-folder"></i>
                    <ul class="cats">
                      <li><a href="#">Business</a></li>
                    </ul>
    
                    <i class="bi bi-tags"></i>
                    <ul class="tags">
                      <li><a href="#">Creative</a></li>
                      <li><a href="#">Tips</a></li>
                      <li><a href="#">Marketing</a></li>
                    </ul>
                  </div> --}}
    
                </article><!-- End blog entry -->
    
                {{-- <div class="blog-author d-flex align-items-center">
                  <img src="assets/img/blog/blog-author.jpg" class="rounded-circle float-left" alt="">
                  <div>
                    <h4>Jane Smith</h4>
                    <div class="social-links">
                      <a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>
                      <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                      <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                    </div>
                    <p>
                      Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium. Quas repellat voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde voluptas.
                    </p>
                  </div>
                </div> --}}
                <!-- End blog author bio -->
    
              </div><!-- End blog entries list -->
    
              <div class="col-lg-4">
    
                {{--  including the blog side-bar  --}}
                @include('Pages.includes.blog.side-bar')
    
              </div><!-- End blog sidebar -->
    
            </div>
    
          </div>
        </section><!-- End Blog Single Section -->
    
      </main><!-- End #main -->

    @endsection
