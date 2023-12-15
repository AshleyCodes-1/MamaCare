@extends('website.layout.layout')

@section('content')
    <!-- ======= Expert Section ======= -->
    <section id="menu" class="menu">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Our partnered doctors</h2>
                <p>Check Our <span>Experts!</span></p>
            </div>

            <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

                <li class="nav-item">
                    <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-all">
                        <h4>All Doctors</h4>
                    </a>
                </li><!-- End tab nav item -->
                @foreach ($doctorsSp as $ds)
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-{{ $ds->specialization }}">
                            <h4>{{ $ds->specialization }}</h4>
                        </a><!-- End tab nav item -->
                    </li>
                @endforeach

            </ul>

            <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

                <div class="tab-pane fade active show" id="menu-all">

                    <div class="tab-header text-center">
                        <h3>All Doctors</h3>
                    </div>

                    <div class="row gy-5">
                        @foreach ($doctors as $doctor)
                            <div class="col-lg-4 menu-item">
                                <a href="{{ url('storage/app/' . $doctor->image) }}" class="glightbox"><img
                                        src="{{ url('storage/app/' . $doctor->image) }}" class="menu-img img-fluid"
                                        alt=""></a>
                                <h4>{{ $doctor->name }}</h4>
                                <p class="ingredients">{{ $doctor->city->name }} ({{ '₹' . $doctor->price }})</p>
                                <a class="btn btn-success" href="{{ route('doctor-details', $doctor->id) }}">Book Now</a>

                            </div><!-- Expert Item -->
                        @endforeach
                    </div>
                </div><!-- End All doctors Content -->

                @foreach ($doctorsSp as $ds)
                    <div class="tab-pane fade" id="menu-{{ $ds->specialization }}">

                        <div class="tab-header text-center">
                            <h3>All {{ $ds->specialization }}</h3>
                        </div>

                        <div class="row gy-5">
                            @foreach ($doctors as $doctor)
                                @if ($ds->specialization == $doctor->specialization)
                                    <div class="col-lg-4 menu-item">
                                        <a href="{{ url('storage/app/' . $doctor->image) }}" class="glightbox"><img
                                                src="{{ url('storage/app/' . $doctor->image) }}" class="menu-img img-fluid"
                                                alt=""></a>
                                        <h4>{{ $doctor->name }}</h4>
                                        <p class="ingredients">{{ $doctor->city->name }} ({{ '₹' . $doctor->price }})</p>
                                        <a class="btn btn-success" href="{{ route('doctor-details', $doctor->id) }}">Book
                                            Now</a>
                                    </div><!-- Expert Item -->
                                @endif
                            @endforeach
                        </div>
                    </div><!-- End All doctors Content -->
                @endforeach

            </div>

        </div>
    </section><!-- End Expert Section -->


    @if (count($blogs) > 0)
        <!-- ======= Blogs Section ======= -->
        <section id="blogs" class="blogs section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Blogs</h2>
                    <p>
                        Share your <span>Experiences!</span>
                    <div class="text-center"><a href="#blog"><button type="submit">Share</button></a></div>
                    </p>

                </div>

                <div class="row gy-4">
                    @foreach ($blogs as $blog)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                            <a href="{{ route('blog-details', $blog->id) }}">
                                <div class="blog-member">
                                    <div class="member-img">
                                        <img src="{{ url('storage/app') }}/{{ $blog->image }}" class="img-fluid"
                                            alt="">
                                        {{-- <div class="social">
                                        <a href=""><i class="bi bi-twitter"></i></a>
                                        <a href=""><i class="bi bi-facebook"></i></a>
                                        <a href=""><i class="bi bi-instagram"></i></a>
                                        <a href=""><i class="bi bi-linkedin"></i></a>
                                    </div> --}}
                                    </div>
                                    <div class="member-info">
                                        <h4>{{ $blog->name }}</h4>
                                        <span>{{ $blog->designation }}</span>
                                        <p>{{ $blog->title }}</p>
                                    </div>
                                </div>
                            </a>
                        </div><!-- End Blogs Member -->
                    @endforeach
                </div>

            </div>
        </section><!-- End Blogs Section -->
    @endif



    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
        <div class="container" data-aos="fade-up">

            <div class="row gy-4">

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="why-box">
                        <h3>Why Choose Mama Care?</h3>
                        <p>
                            "Choose Mama Care for expert pregnancy advice, interactive tools, and a supportive community. We
                            offer comprehensive resources to guide you through every step of your journey, from prenatal
                            care to parenting infants. Our platform empowers you with knowledge and connections for a
                            confident and informed motherhood experience."
                        </p>
                        <div class="text-center">
                            <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
                        </div>
                    </div>
                </div><!-- End Why Box -->

                <div class="col-lg-8 d-flex align-items-center">
                    <div class="row gy-4">

                        <div class="col-xl-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                <i class="bi bi-clipboard-data"></i>
                                <h4>Personalized Support and Community Engagement</h4>
                                <p>Users get to connect and engage with a supportive community of other expectant mothers
                                    and parents using our Blogs page.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                <i class="bi bi-gem"></i>
                                <h4>Comprehensive Pregnancy and Parenting Resources</h4>
                                <p>Includes comprehensive articles, videos, and guides on topics such as prenatal care,
                                    nutrition during pregnancy, childbirth preparation, etc.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                <i class="bi bi-inboxes"></i>
                                <h4>Interactive Tools and Trackers</h4>
                                <p>Features such as pregnancy and baby growth trackers, personalized due date calculators,
                                    vaccination schedules, and etc.</p>
                            </div>
                        </div><!-- End Icon Box -->

                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="stats-counter">
        <div class="container" data-aos="zoom-out">
            <div class="whysection">
                <h3>Why choose Mama Care?</h3>
            </div>
            <div class="row gy-4">

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="590" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Clients</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="8" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Doctors</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="1450" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Hours Of Content</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="121" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Hospitals</p>
                    </div>
                </div><!-- End Stats Item -->

            </div>

        </div>
    </section><!-- End Stats Counter Section -->

    @if (count($feedbacks) > 0)
        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Testimonials</h2>
                    <p>What Are They <span>Saying About Us</span></p>
                </div>

                <div class="slides-1 swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">
                        @foreach ($feedbacks as $feedback)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="row gy-4 justify-content-center">
                                        <div class="col-lg-6">
                                            <div class="testimonial-content">
                                                <p>
                                                    <i class="bi bi-quote quote-icon-left"></i>
                                                    {{ $feedback->review }}
                                                    <i class="bi bi-quote quote-icon-right"></i>
                                                </p>
                                                <h3>{{ $feedback->name }}</h3>
                                                <h4>{{ $feedback->title }}</h4>
                                                <div class="stars">
                                                    @for ($i = 1; $i <= $feedback->rating; $i++)
                                                        <i class="bi bi-star-fill"></i>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 text-center">
                                            <img src="{{ url('storage/app') }}/{{ $feedback->image }}"
                                                class="img-fluid testimonial-img" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End testimonial item -->
                        @endforeach

                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section><!-- End Testimonials Section -->
    @endif


    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>gallery</h2>
                <p>Check <span>Our Gallery</span></p>
            </div>

            <div class="gallery-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                            href="{{ url('public/website') }}/assets/img/gallery/gallery1.jpg"><img
                                src="{{ url('public/website') }}/assets/img/gallery/gallery1.jpg" class="img-fluid"
                                alt=""></a></div>
                    <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                            href="{{ url('public/website') }}/assets/img/gallery/gallery2.jpg"><img
                                src="{{ url('public/website') }}/assets/img/gallery/gallery2.jpg" class="img-fluid"
                                alt=""></a></div>
                    <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                            href="{{ url('public/website') }}/assets/img/gallery/gallery3.jpg"><img
                                src="{{ url('public/website') }}/assets/img/gallery/gallery3.jpg" class="img-fluid"
                                alt=""></a></div>
                    <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                            href="{{ url('public/website') }}/assets/img/gallery/gallery4.jpg"><img
                                src="{{ url('public/website') }}/assets/img/gallery/gallery4.jpg" class="img-fluid"
                                alt=""></a></div>
                    <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                            href="{{ url('public/website') }}/assets/img/gallery/gallery5.jpg"><img
                                src="{{ url('public/website') }}/assets/img/gallery/gallery5.jpg" class="img-fluid"
                                alt=""></a></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Gallery Section -->



    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Contact</h2>
                <p>Need Help? <span>Contact Us</span></p>
            </div>

            <div class="mb-3">

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d13771.229452410122!2d76.3456467871582!3d30.3564242!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sthapar%20university!5e0!3m2!1sen!2sin!4v1681654764280!5m2!1sen!2sin"
                    width=100% height=350px style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div><!-- End Google Maps -->


        </div>
    </section><!-- End Contact Section -->
@endsection
