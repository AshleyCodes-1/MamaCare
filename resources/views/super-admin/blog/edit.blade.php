  @extends('supepr-admin.layouts.layout')

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
                              <li class="breadcrumb-item active">Edit blog</li>
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
                                  <h3 class="card-title">Edit blog</h3>
                              </div>
                              <!-- /.card-header -->
                              <!-- form start -->
                              <form method="POST" action="{{ route('admin.blog.update') }}" enctype="multipart/form-data">
                                  @csrf
                                  <input type="hidden" name="id" value="{{ $blog->id }}">
                                  <div class="card-body">
                                      <div class="form-group">
                                          <label for="exampleInputEmail1"> Title</label>
                                          <input type="text" name="title" class="form-control"
                                              value="{{ $blog->title }}" id="exampleInputEmail1" placeholder="Enter  Name">
                                      </div>

                                      <div class="form-group">
                                          <label for="exampleInputEmail1"> Description</label>
                                          <textarea name="description" class="form-control" id="exampleInputEmail1" placeholder="Enter Description">{{ $blog->description }}</textarea>

                                      </div>

                                      <div class="form-group">
                                          <label for="exampleInputEmail1"> Designation</label>
                                          <input type="text" name="designation" class="form-control" id=""
                                              placeholder="Enter Description" value="{{ $blog->designation }}">

                                      </div>

                                      <div class="form-group">
                                          <label for="exampleInputFile"> Icon</label>
                                          <div class="form-group">
                                              <label for="exampleInputFile"> Icon</label>
                                              <div class="input-group">

                                                  <input type="file" name="image" class="form-control" id="">
                                              </div>
                                          </div>
                                          <img style="height: 100px; width: 150px;"
                                              src="{{ url('storage/app/' . $blog->image) }}" alt="">

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
