@extends('super-admin.layouts.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Week</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Week</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-end p-2">
                            <a class="btn btn-success" href="{{ route('admin.week.add') }}"> <i class="fa fa-plus"></i>
                                Add</a>
                        </div>
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body">

                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Week</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 0;
                                        @endphp
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $count += 1 }}</td>
                                                <td>{{ $item->week }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>
                                                    <img style="height: 80px; width: 120px;"
                                                        src="{{ url('storage/app/' . $item->image) }}" alt="">
                                                </td>
                                                <td>{!! substr($item->description, 0, 100) !!}</td>
                                                <td>
                                                    <div class="row">
                                                        <div>
                                                            <a class="btn btn-success"
                                                                href="{{ route('admin.week.edit', $item->id) }}"> <i
                                                                    class="fa fa-edit"></i> Edit</a>
                                                        </div>
                                                        &nbsp;
                                                        &nbsp;
                                                        <div>
                                                            <a class="btn btn-danger" data-toggle="modal"
                                                                data-target="#exampleModal_{{ $item->id }}"
                                                                href="javaScript:void(0)"><i class="fa fa-trash"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            {{-- modal for delete confirmation --}}

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal_{{ $item->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog " role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title" id="exampleModalLabel">Are you Sure Want
                                                                to Delete?</h3>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <a href="{{ route('admin.week.delete', $item->id) }}"
                                                                class="btn btn-primary">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
