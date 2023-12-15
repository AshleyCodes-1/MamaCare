  @extends('super-admin.layouts.layout')

  @section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
              <div class="container-fluid">
                  <div class="row mb-2">
                      <div class="col-sm-6">
                      </div>
                      <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                              <li class="breadcrumb-item active">Edit week</li>
                          </ol>
                      </div>
                  </div>
              </div><!-- /.container-fluid -->
          </section>


          <!-- Main content -->
          <section class="content">
              <div class="container-fluid">
                  <div class="row d-flex justify-content-center">
                      <div class="col-md-8">
                          <!-- general form elements -->
                          <div class="card card-primary">
                              <div class="card-header">
                                  <h3 class="card-title">Edit week</h3>
                              </div>
                              <!-- /.card-header -->
                              <!-- form start -->
                              <form method="POST" action="{{ route('admin.week.update') }}" enctype="multipart/form-data">
                                  @csrf
                                  <input type="hidden" name="id" value="{{ $data->id }}">
                                  <div class="card-body">

                                      <div class="form-group">
                                          <label for="exampleInputEmail1"> Week</label>
                                          <input type="number" name="week" class="form-control"
                                              value="{{ $data->week }}" id="exampleInputEmail1" placeholder="Enter  Week">
                                      </div>

                                      <div class="form-group">
                                          <label for="exampleInputEmail1"> Title</label>
                                          <input type="text" name="title" class="form-control"
                                              value="{{ $data->title }}" id="exampleInputEmail1" placeholder="Enter  Name">
                                      </div>

                                      <div class="form-group">
                                          <label for="exampleInputEmail1"> description</label>
                                          <textarea name="description" class="form-control" id="exampleInputEmail1" placeholder="Enter description">{{ $data->description }}</textarea>
                                      </div>

                                      <div class="form-group">
                                          <label for="exampleInputFile">Image</label>
                                          <div class="form-group">
                                              <div class="input-group">

                                                  <input type="file" name="image" class="form-control" id="">
                                              </div>
                                          </div>
                                          <img style="height: 100px; width: 150px;"
                                              src="{{ url('storage/app/' . $data->image) }}" alt="">

                                      </div>

                                  </div>
                                  <!-- /.card-body -->

                                  <div class="card-footer">
                                      <button type="submit" class="btn btn-primary">Update</button>
                                  </div>
                              </form>
                          </div>
                          <!-- /.card -->
                      </div>
                  </div>
                  <!-- /.row -->
              </div><!-- /.container-fluid -->
          </section>
          <!-- /.content -->
      </div>
  @endsection
