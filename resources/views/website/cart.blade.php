@extends('website.layout.layout')

@section('content')
    <!-- ======= About Section ======= -->
    @if (count($data) > 0)
        <!-- ======= data Section ======= -->
        <section id="blogs" class="blogs section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Cart</h2>
                    <p>
                        Share your <span>Experiences!</span>
                    </p>

                </div>

                <div class="row gy-4">
                    <table class="table table-responsive">
                        <thead>
                            <th>
                                Image
                            </th>
                            <th>
                                Product Name
                            </th>
                            <th>
                                Price
                            </th>
                            <th>
                                Qty
                            </th>
                            <th>
                                Action
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>
                                        <img height="100px" src="{{ url('storage/app/' . $item->product->image) }}"
                                            alt="">
                                    </td>
                                    <td>{{ $item->product->title }}</td>
                                    <td>₹{{ $item->product->price }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>
                                        <a href="{{ route('remove-cart', $item->id) }}" class="btn btn-danger">Remove</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div style="display: flex; justify-content:end">
                    <a class="btn btn-success" href="{{ route('checkout') }}">Check Out</a>
                </div>
            </div>
        </section><!-- End Blogs Section -->
    @endif
@endsection
