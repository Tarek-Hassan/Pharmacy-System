@extends('admin.index')
@section('title','Pharmacies')
@section('section_title','Pharmacies')
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
                <h3 class="card-title">Edit Pharmacy</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('pharmacies.update',$pharmacy->id)}}" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputarea">Pharmacy Name</label>
                    <input type="text" name="pharmacy_name" value="{{$pharmacy->pharmacy_name}}" class="form-control" id="exampleInputpharmacy_name" placeholder="Enter Pharmacy_Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputaddress">Email</label>
                    <input type="text" name="email" value="{{$pharmacy->email}}" class="form-control" id="exampleInputemail" placeholder="Enter Email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputaddress">Password</label>
                    <input type="password" name="password" value="{{$pharmacy->password}}" class="form-control" id="exampleInputpassword" placeholder="Enter Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputaddress">National ID</label>
                    <input type="text" name="national_id" value="{{$pharmacy->national_id}}" class="form-control" id="exampleInputnational_id" placeholder="Enter National_id">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputaddress">Priority</label>
                    <input type="text" name="priority" value="{{$pharmacy->priority}}" class="form-control" id="exampleInputpriority" placeholder="Enter Priority">
                  </div>
                  <!--  -->
                  <div class="form-group">
                    <label for="exampleInputaddress">_Image</label>
                    <img   width='50px'  style="float:right;" height='50px'  src="/storage/{{$pharmacy->img}}" >
                    <input type="hidden" value="{{$pharmacy->img}}" name="oldimg">
                    <input type="file"  name="profile" class="form-control" id="exampleInputaddress" placeholder="Enter Image">
                  </div>
                  <!--  -->
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">update</button>
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