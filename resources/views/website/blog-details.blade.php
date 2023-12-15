@extends('website.layout.layout')

@section('content')
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>{{ $blog->title }}</h2>
                <p>{{ $blog->name }}({{ $blog->designation }})</p>
            </div>

            <div class="row gy-4">
                <div class="col-lg-7 position-relative about-img"
                    style="background-image: url({{ url('storage/app') }}/{{ $blog->image }}) ; background-size: cover;"
                    data-aos="fade-up" data-aos-delay="150">
                </div>
                <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
                    <div class="content ps-0 ps-lg-5">
                        {!! $blog->description !!}
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->
@endsection
