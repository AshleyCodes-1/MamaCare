@extends('super-admin.layouts.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Feedback</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Feedback</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        {{-- <div class="d-flex justify-content-end p-2">
                            <a class="btn btn-success" href="{{ route('blog.add') }}"> <i class="fa fa-plus"></i>
                                Add</a>
                        </div> --}}
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body">

                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Review</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 0;
                                        @endphp
                                        @foreach ($testimonial as $item)
                                            <tr>
                                                <td>{{ $count += 1 }}</td>
                                                <td>{{ $item->user->name }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>
                                                    <img style="height: 80px; width: 120px;"
                                                        src="{{ url('storage/app/' . $item->image) }}" alt="">
                                                </td>
                                                <td>{{ $item->review }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
