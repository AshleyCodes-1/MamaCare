@extends('website.layout.layout')

@section('content')
    <!-- ======= About Section ======= -->
    @if (count($data) > 0)
        <!-- ======= data Section ======= -->
        <section id="blogs" class="blogs section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Products</h2>
                    <p>
                        Share your <span>Experiences!</span>
                    </p>

                </div>

                <div class="row gy-4">
                    @foreach ($data as $item)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                            <a href="{{ route('blog-details', $item->id) }}">
                                <div class="blog-member">
                                    <div class="member-img">
                                        <img src="{{ url('storage/app') }}/{{ $item->image }}" class="img-fluid"
                                            alt="">
                                        <div class="social">
                                            <a href=""><i class="bi bi-twitter"></i></a>
                                            <a href=""><i class="bi bi-facebook"></i></a>
                                            <a href=""><i class="bi bi-instagram"></i></a>
                                            <a href=""><i class="bi bi-linkedin"></i></a>
                                        </div>
                                    </div>
                                    <div class="member-info">
                                        <h4>{{ $item->title }}</h4>
                                        <span>{{ $item->description }}</span>
                                        <div class="row">
                                            <div class="col-6">
                                                <h4 class="mt-1">₹{{ $item->price }}</h4>
                                            </div>
                                            <div class="col-6">
                                                <a href="{{ route('add-cart', $item->id) }}" class="btn btn-success">Add to
                                                    Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div><!-- End Blogs Member -->
                    @endforeach
                </div>
            </div>
        </section><!-- End Blogs Section -->
    @endif
@endsection
