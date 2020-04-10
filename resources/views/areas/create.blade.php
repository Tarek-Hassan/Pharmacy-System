@extends('admin.index')
@section('title','Area')
@section('section_title','Area')
@section('content')
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12 my-3">
              <!-- jquery validation -->
              <div class="card card-primary">
              @include('admin.error')
              <div class="card-header">
                <h3 class="card-title">Create Area</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('areas.store')}}" enctype="multipart/form-data">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputarea">Area Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputarea" placeholder="Enter Area_Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputaddress">Address Name</label>
                    <input type="text" name="address" class="form-control" id="exampleInputaddress" placeholder="Enter Address_Name">
                  </div>
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Create</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection