@extends('layout.app')

    @section('body')
        
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
          <div class="container">
    
            <ol>
              <li><a href="{{route('page.home')}}">Home</a></li>
              <li>Contact</li>
            </ol>
            <h2>Pro Bono</h2>
    
          </div>
        </section><!-- End Breadcrumbs -->
{{-- 
        <section id="clients" class="clients">
          <div class="container">
    
            <div class="section-title">
              <h2>Pro Bono</h2>
            </div>    
            <p>Our Pro Bono department</p>
          </div>
        </section> --}}
    
        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
          <div class="container">
            @if ( session()->has('mail_status') && session()->get('mail_status') == true )
              <div class="alert alert-primary" role="alert">
                  {{session()->get('mail_status_msg')}}
              </div>
            @endif
            <div class="row">
              <div class="col-lg-6">
                <div class="info-box mb-4">
                  <i class="bx bx-map"></i>
                  <h3>Our Address</h3>
                  <p>Wuse 2, Abuja, Nigeria</p>
                </div>
              </div>
    
              <div class="col-lg-3 col-md-6">
                <div class="info-box  mb-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Us</h3>
                  <p>contact@example.com</p>
                </div>
              </div>
    
              <div class="col-lg-3 col-md-6">
                <div class="info-box  mb-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Us</h3>
                  <p>+234 8080808080</p>
                </div>
              </div>
    
            </div>
    
            <div class="row">
    
              <div class="col-lg-6 ">
                <iframe class="mb-4 mb-lg-0" src="https://maps.google.com/maps?q=city%20gate%20abuja&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
              </div>

              {{-- <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=city%20gate%20abuja&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org"></a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><a href="https://www.embedgooglemap.net">embed google maps in gmail</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></div> --}}
    
              <div class="col-lg-6">

                {{-- <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque dolores, labore iusto non eum quidem beatae maxime minima perspiciatis, eligendi laborum quis magnam unde? Aspernatur quas a nostrum quaerat sequi?</p> --}}
                <form action="{{route('contact.email')}}" method="post" role="form" class="">
                  @csrf
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                      @error('name')
                        <div class="text-danger">
                          {{$message}}
                        </div>
                      @enderror
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                      @error('email')
                        <div class="text-danger">
                          {{$message}}
                        </div>
                      @enderror
                    </div>
                  </div>
                  {{--  <div class="form-group mt-3">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                      @error('subject')
                        <div class="text-danger">
                          {{$message}}
                        </div>
                      @enderror
                  </div>  --}}
                  <div class="form-group mt-3">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                      @error('message')
                        <div class="text-danger">
                          {{$message}}
                        </div>
                      @enderror
                  </div>
                  <div class="text-center"><input type="submit" class="btn btn-danger btn-block form-control mt-2" value="Send"></div>
                </form>
              </div>
    
            </div>
    
          </div>
        </section><!-- End Contact Section -->
        @php
        /* 
        ---------------------------------------
        UNSETTING THE MAIL_STATUS SESSION
        ---------------------------------------
        */
        session()->forget(['mail_status','mail_status_msg']);
      
        @endphp
      </main><!-- End #main -->

    @endsection