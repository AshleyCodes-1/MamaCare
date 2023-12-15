@extends('website.layout.layout')

@section('content')
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-md-6" style="display: flex;justify-content: center;">
                    <img style="max-height: 400px;" src="{{ url('storage/app') }}/{{ $data->image }}" alt="">
                </div>
                <div class="col-md-6">
                    <h4>Name : {{ $data->name }}</h4>
                    <p class="ingredients">Specialization : {{ $data->specialization }}</p>
                    <p class="ingredients">City : {{ $data->city->name }}</p>
                    <p class="ingredients">Fees : ₹{{ $data->price }}</p>

                    <form action="{{ route('book-ap') }}" method="POST">
                        @csrf
                        <div class="form-group col-3">
                            <label for="">Select Slot: </label>
                            <select style="cursor: pointer;" name="appointment_id" class="form-control" required>
                                <option value="">Select</option>
                                @foreach ($data->appointments as $ap)
                                    <option value="{{ $ap->id }}">{{ $ap->from }}-{{ $ap->to }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">Book Now</button>
                    </form>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->
@endsection
