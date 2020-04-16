@extends('admin.index')
@section('title','CreateUser')
@section('section_title','CreateUser')
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
                <h3 class="card-title">Create Doctor</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('users.store')}}" enctype="multipart/form-data">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputarea">User_Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputarea" placeholder="Enter Doctor_Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputarea">profile_Image</label>
                    <input type="file" name="profile" class="form-control" id="exampleInputarea" placeholder="Enter Image" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputaddress">Email</label>
                    <input type="text" name="email" class="form-control" id="exampleInputaddress" placeholder="Enter Email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputaddress">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputaddress" placeholder="Enter Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputaddress">National_id</label>
                    <input type="text" name="national_id" class="form-control" id="exampleInputaddress" placeholder="National_id">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputaddress">Gender</label><br/>
                    <input type="radio" name="gender" value="male" >Male<br/>
                    <input type="radio" name="gender" value="female">Female<br/>
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputaddress">BirthDate</label>
                    <input type="date" name="birth_date" class="form-control" id="exampleInputaddress" placeholder="National_id">
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputaddress">MObile</label>
                    <input type="text" name="mobile" class="form-control" id="exampleInputaddress" placeholder="mobile">
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