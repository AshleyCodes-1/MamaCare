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
                              <li class="breadcrumb-item active">Edit product</li>
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
                                  <h3 class="card-title">Edit product</h3>
                              </div>
                              <!-- /.card-header -->
                              <!-- form start -->
                              <form method="POST" action="{{ route('admin.product.update') }}"
                                  enctype="multipart/form-data">
                                  @csrf
                                  <input type="hidden" name="id" value="{{ $data->id }}">
                                  <div class="card-body">
                                      <div class="form-group">
                                          <label for="exampleInputEmail1"> Title</label>
                                          <input type="text" name="title" class="form-control"
                                              value="{{ $data->title }}" id="exampleInputEmail1" placeholder="Enter  Name">
                                      </div>

                                      <div class="form-group">
                                          <label for="exampleInputEmail1"> Description</label>
                                          <textarea name="desc" class="form-control" id="exampleInputEmail1" placeholder="Enter Description">{{ $data->description }}</textarea>

                                      </div>

                                      <div class="form-group">
                                          <label for="exampleInputEmail1"> price</label>
                                          <input type="number" name="price" class="form-control"
                                              placeholder="Enter price" value="{{ $data->price }}">
                                      </div>

                                      <div class="form-group">
                                          <label for="exampleInputEmail1"> Stock</label>
                                          <input type="number" name="stock" value="{{ $data->stock }}"
                                              class="form-control" id="" placeholder="Enter price" required>
                                      </div>


                                      <div class="form-group">
                                          <label for="exampleInputFile"> Icon</label>
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
