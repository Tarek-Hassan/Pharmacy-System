@extends('admin.index')
@section('title','Medicine')
@section('section_title','Medicine')
@section('content')
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
              <!-- jquery validation -->
              <div class="card card-primary">
              @include('admin.error')
              <div class="card-header">
                <h3 class="card-title">Create Medicine</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('medicines.store')}}" enctype="multipart/form-data">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputarea">Medicine Name</label>
                    <input type="text" name="medicine_name" class="form-control" id="exampleInputarea" placeholder="Enter MedicineName">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputarea">Type</label>
                    <input type="text" name="type" class="form-control" id="exampleInputarea" placeholder="Enter Type">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputaddress">Price</label>
                    <input type="text" name="price" class="form-control" id="exampleInputaddress" placeholder="Enter Price">
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