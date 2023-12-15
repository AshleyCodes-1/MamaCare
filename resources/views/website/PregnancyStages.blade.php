@extends('website.layout.layout')

@section('content')
    <!-- ======= Week Slider ======= -->

    <section class="head1">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <p>Weekly <span>Pregnancy </span> Stages</p>
                <h2>Jump to your week of Pregnancy</h2>
            </div>
    </section>

    <div class="wrapper" data-aos="fade-up">
        <div class="week"><i id="left" class="fa-solid fa-angle-left"></i></div>
        <ul class="tabs-box">
            @foreach ($weeks as $week)
                <a href="{{ route('PregnancyStages', ['week_id' => $week->id]) }}">
                    <li class="tab">Week {{ $week->week }}</li>
                </a>
            @endforeach
        </ul>
        <div class="week"><i id="right" class="fa-solid fa-angle-right"></i></div>
    </div>

    <!-- ========= Week Slider End ============= -->
    @if (isset($data))
        <section class="sample-page">
            <div class="container" data-aos="fade-up">
                <h1>
                    {!! $data->title !!}
                </h1>
                <div>
                    <img src="{{ url('storage/app/' . $data->image) }}" alt="">
                </div>
                <p>
                    {!! $data->description !!}
                </p>

            </div>
        </section>
    @endif
@endsection
