@extends('layout.app')


    @section('body')

        <!-- ======= Hero Section ======= -->
        <section id="hero">
            <div class="hero-container">
            <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

                <div class="carousel-inner" role="listbox">

                <!-- Slide 1 -->
                <div class="carousel-item active" style="background-image: url({{asset('assets/img/slide/law2a.jpg')}})">
                    <div class="carousel-container">
                    <div class="carousel-content">
                        <h2 class="animate__animated animate__fadeInDown"><span>Uche Ojembe & Associates</span> Legal Consult</h2>
                        <h3 class="animate__animated animate__fadeInUp">Keeping you informed. Protecting your rights. Providing solutions.</h3>
                        <a href="{{route('page.about')}}" class="btn-get-started animate__animated animate__fadeInUp">About Us</a>
                    </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item" style="background-image: url({{asset('assets/img/slide/slide-2.jpg')}})">
                    <div class="carousel-container">
                    <div class="carousel-content">
                        <h2 class="animate__animated fanimate__adeInDown">Lets fight your case <span>together</span></h2>
                        <h3 class="animate__animated animate__fadeInUp">Exceptional Diverse People Delivering Innovative and Strategic Solutions.</h3>
                        <a href="{{route('page.contact')}}" class="btn-get-started animate__animated animate__fadeInUp">Contact</a>
                    </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item" style="background-image: url({{asset('assets/img/slide/slide-1.jpg')}})">
                    <div class="carousel-container">
                    <div class="carousel-content">
                        <h2 class="animate__animated animate__fadeInDown">Tell us your case story. We can <span>help you</span></h2>
                        <h3 class="animate__animated animate__fadeInUp">We are commited to providing ecellent service and results.</h3>
                        <a href="{{route('page.contact')}}" class="btn-get-started animate__animated animate__fadeInUp">Contact Us</a>
                    </div>
                    </div>
                </div>

                </div>

                <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>

            </div>
            </div>
        </section><!-- End Hero -->

        <main id="main">

            <!-- ======= Featured Section ======= -->
            <section id="featured" class="featured">
            <div class="container">

                <div class="row">
                <div class="col-lg-4">
                    <div class="icon-box">
                    <i class="bi bi-clock"></i>
                    <h3><a href="">Emergency Cases</a></h3>
                    <p>In need of a lawyer as soon as possible? Look no more. We are available for you! <br> Contact our office now! <br> <strong> +234 2344 5674 434 </strong>  </p>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="icon-box">
                    <i class="bi bi-question-circle"></i>
                    <h3><a href="">Need Help?</a></h3>
                    <p>If you need help with a legal matter, the highly-skilled and experienced team at Roberts Law can help. <br> <br> <a href="{{route('page.contact')}}" class="btn btn-secondary btn-sm">Contact Us Now</a> </p>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="icon-box">
                    <i class="bi bi-calendar"></i>
                    <h3><a href="">Office Hours</a></h3>
                    <p>
                        Monday - Thursday: 10:00AM - 06:00PM
                        <hr>
                        <p>Friday: 10:00AM - 06:00PM</p>
                        <hr>
                        <p>Saturday: 10:00AM - 12:00PM</p>
                    </p>
                    </div>
                </div>
                </div>

            </div>
            </section><!-- End Featured Section -->

            <!-- ======= About Section ======= -->
            <section id="about" class="about">
            <div class="container">

                <div class="row">
                <div class="col-lg-6">
                    <img src="assets/img/gravel.jpg" class="img-fluid img rounded" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                    {{-- <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3> --}}
                    <p class="">
                        Uche Ojembe & Associates Legal Consult is a firm dedicated to helping our clients and our community navigate some of the most challenging times in their lives. <br><br>The firm offers knowledgeable attorneys and staff who are not just thinking about winning your case or solving your matter, but also taking steps to make sure that your long-term goals are considered and achieved. <br><br>Whether it is navigating a difficult divorce or complex custody case, negotiating a new business agreement, or arguing for the benefits your deserve, you will be treated with respect, courtesy, empathy as we advocate for your rights and best interests.
                    </p>
                    <h3>Our Core Ethics includes</h3>
                    <ul>
                    <li><i class="bi bi-check-circle"></i> Competence and Delivery.</li>
                    <li><i class="bi bi-check-circle"></i> Focus and Reliability.</li>
                    <li><i class="bi bi-check-circle"></i> Client satisfaction.</li>
                    </ul>
                    <p>
                    
                    </p>
                </div>
                </div>

            </div>
            </section><!-- End About Section -->

            <!-- ======= Services Section ======= -->
            <section id="services" class="services">
            <div class="container">

                <div class="section-title">
                    <h2>Our Practise Area</h2>
                    {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
                </div>

                <div class="row">

                    @foreach ($services as $service)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="icon-box">
                            <div class="icon"><i class="fas fa-gavel"></i></i></div>
                            <h4><a href="#">{{ $service->name }}</a></h4>
                            <p>{{ $service->details }}</p>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
                <div class="section-title mt-5">
                    {{-- <a href="{{route('page.about')}}">See More</a> --}}
                    {{-- <p><a href="{{route('page.contact')}}" class="btn-get-started animate__animated animate__fadeInUp">Contact Us</a></p> --}}
                    <a href="{{route('page.about')}}" class="btn btn-secondary btn-sm">View All</a>
                  </div>
            </div>
            </section><!-- End Services Section -->

            <!-- ======= Clients Section ======= -->
            <section id="clients" class="clients">
            <div class="container">

                <div class="section-title">
                <h2>Clients</h2>
                </div>

                <div class="clients-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
                </div>
                <div class="swiper-pagination"></div>
                </div>

            </div>
            </section><!-- End Clients Section -->

        </main><!-- End #main -->

    @endsection