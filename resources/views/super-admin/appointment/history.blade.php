@extends('super-admin.layouts.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>History</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">History</li>
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
                            <a class="btn btn-success" href="{{ route('admin.appointment.add') }}"> <i
                                    class="fa fa-plus"></i>
                                Add</a>
                        </div> --}}
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body">

                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>User</th>
                                            <th>Doctor</th>
                                            <th>Shift</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 0;
                                        @endphp
                                        @foreach ($data as $item)
                                            @if ($item->status == 'Pending')
                                                <tr>
                                                    <td>{{ $count += 1 }}</td>
                                                    <td>{{ $item->user->name }}</td>
                                                    <td>{{ $item->ap->doctor->name }}</td>
                                                    <td>{{ $item->ap->from }} - {{ $item->ap->to }}</td>
                                                    <td>{{ $item->status }}</td>
                                                    <td>
                                                        <a class="btn btn-danger" data-toggle="modal"
                                                            data-target="#exampleModal_{{ $item->id }}"
                                                            href="javaScript:void(0)">Complete</a>
                                                    </td>
                                                </tr>

                                                {{-- modal for delete confirmation --}}

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal_{{ $item->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog " role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 class="modal-title" id="exampleModalLabel">Are you Sure
                                                                    Want
                                                                    to Complete?</h3>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <a href="{{ route('admin.appointment.complete', $item->id) }}"
                                                                    class="btn btn-primary">Complete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body">

                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>User</th>
                                            <th>Doctor</th>
                                            <th>Shift</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 0;
                                        @endphp
                                        @foreach ($data as $item)
                                            @if ($item->status != 'Pending')
                                                <tr>
                                                    <td>{{ $count += 1 }}</td>
                                                    <td>{{ $item->user->name }}</td>
                                                    <td>{{ $item->ap->doctor->name }}</td>
                                                    <td>{{ $item->ap->from }} - {{ $item->ap->to }}</td>
                                                    <td>{{ $item->status }}</td>
                                                </tr>
                                            @endif
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
