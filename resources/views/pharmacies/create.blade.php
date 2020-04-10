@extends('admin.index')
@section('title','Pharmacy')
@section('section_title','Pharmacy')
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
                <h3 class="card-title">Create Pharmacy</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('pharmacies.store')}}" enctype="multipart/form-data">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputarea">Pharmacy Name</label>
                    <input type="text" name="pharmacy_name" class="form-control" id="exampleInputarea" placeholder="Enter pharmacy_Name">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputaddress">Email</label>
                    <input type="text" name="email" class="form-control" id="exampleInputemail" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputaddress">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputpassword" placeholder="Enter password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputaddress">Address ID</label>
                    <input type="text" name="address_id" class="form-control" id="exampleInputaddress" placeholder="Enter Address_ID">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputaddress">National ID</label>
                    <input type="text" name="national_id" class="form-control" id="exampleInputnational" placeholder="Enter National_ID">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputaddress">Priority</label>
                    <input type="text" name="priority" class="form-control" id="exampleInputpriority" placeholder="Enter Priority">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputaddress">Image</label>
                    <input type="file" name="img" accept = "image/jpeg" class="form-control" id="exampleInputimg" placeholder="Enter image">
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
  