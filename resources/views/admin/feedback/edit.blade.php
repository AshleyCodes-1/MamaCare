  @extends('admin.layouts.layout')

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
                              <li class="breadcrumb-item active">Edit Feedback</li>
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
                          <div class="card card-primary p-3">
                              <div class="card-header">
                                  <h3 class="card-title">Edit Feedback</h3>
                              </div>
                              <!-- /.card-header -->
                              <!-- form start -->
                              <form method="POST" action="{{ route('feedback.save') }}" enctype="multipart/form-data">
                                  @csrf

                                  <div class="form-group mt-3">
                                      <label for="exampleInputEmail1"> Title</label>
                                      <input type="text" name="title" class="form-control"
                                          value="{{ $testimonial->title ?? null }}" id="exampleInputEmail1"
                                          placeholder="Enter title">
                                  </div>

                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Review</label>
                                      <textarea name="review" class="form-control" id="" placeholder="Enter testimonial Description">{{ $testimonial->review ?? null }}</textarea>
                                  </div>

                                  <div class="form-group">
                                      <label for="exampleInputEmail1"> Rating</label>
                                      <select name="rating" class="form-control">
                                          <option @if (isset($testimonial->rating) && $testimonial->rating == 1) selected @endif value="1">1
                                          </option>
                                          <option @if (isset($testimonial->rating) && $testimonial->rating == 2) selected @endif value="2">2
                                          </option>
                                          <option @if (isset($testimonial->rating) && $testimonial->rating == 3) selected @endif value="3">3
                                          </option>
                                          <option @if (isset($testimonial->rating) && $testimonial->rating == 4) selected @endif value="4">4
                                          </option>
                                          <option @if (isset($testimonial->rating) && $testimonial->rating == 5) selected @endif value="5">5
                                          </option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <div class="form-group">
                                          <label for="exampleInputFile">Image</label>
                                          <div class="input-group">
                                              <input type="file" name="image" class="form-control" id="">
                                          </div>
                                      </div>
                                      @if (isset($testimonial->image))
                                          <img style="height: 100px; width: 150px;"
                                              src="{{ url('storage/app/' . $testimonial->image) }}" alt="">
                                      @endif

                                  </div>

                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer text-center">
                              <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                          </form>
                      </div>
                      <!-- /.card -->
                  </div>
              </div>
      </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
      </div>
  @endsection
