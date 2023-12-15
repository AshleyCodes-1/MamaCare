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
                              <li class="breadcrumb-item active">add doctor</li>
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
                                  <h3 class="card-title">Add New doctor</h3>
                              </div>
                              <!-- /.card-header -->
                              <!-- form start -->
                              <form method="POST" action="{{ route('admin.doctor.save') }}" enctype="multipart/form-data">
                                  @csrf
                                  <div class="card-body">

                                      <div class="form-group">
                                          <label for="exampleInputEmail1">City</label>
                                          <select required name="city_id" class="form-control">
                                              <option value="">Select</option>
                                              @foreach ($city as $item)
                                                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                                              @endforeach
                                          </select>
                                      </div>

                                      <div class="form-group">
                                          <label for="exampleInputEmail1"> Name</label>
                                          <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                              placeholder="Enter Title" required>
                                      </div>

                                      <div class="form-group">
                                          <label for="exampleInputEmail1"> specialization</label>
                                          <textarea name="specialization" class="form-control" id="exampleInputEmail1" placeholder="Enter Description" required></textarea>
                                      </div>

                                      <div class="form-group">
                                          <label for="exampleInputEmail1"> price</label>
                                          <input type="number" name="price" class="form-control" id=""
                                              placeholder="Enter price" required>
                                      </div>

                                      <div class="form-group">
                                          <label for="exampleInputFile"> Image</label>
                                          <div class="input-group">

                                              <input type="file" name="image" class="form-control" id=""
                                                  required>
                                          </div>
                                      </div>

                                  </div>
                                  <!-- /.card-body -->

                                  <div class="card-footer">
                                      <button type="submit" class="btn btn-primary">Submit</button>
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
