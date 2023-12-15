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
                              <li class="breadcrumb-item active">add appointment</li>
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
                                  <h3 class="card-title">Add New appointment</h3>
                              </div>
                              <!-- /.card-header -->
                              <!-- form start -->
                              <form method="POST" action="{{ route('admin.appointment.save') }}"
                                  enctype="multipart/form-data">
                                  @csrf
                                  <div class="card-body">
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">Doctor</label>
                                          <select required name="doctor_id" class="form-control">
                                              <option value="">Select</option>
                                              @foreach ($doctors as $item)
                                                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                                              @endforeach
                                          </select>
                                      </div>

                                      <div class="form-group">
                                          <label for="exampleInputEmail1"> From</label>
                                          <input type="time" name="from" class="form-control" id="exampleInputEmail1"
                                              required>
                                      </div>

                                      <div class="form-group">
                                          <label for="exampleInputEmail1"> To</label>
                                          <input type="time" name="to" class="form-control" id="exampleInputEmail1"
                                              required>
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
