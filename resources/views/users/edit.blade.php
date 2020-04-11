@extends('admin.index')
@section('title','editUser')

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
                <h3 class="card-title">Edit User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('users.update',$users->id)}}" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputarea">User_Name</label>
                    <input type="text" name="name" value="{{$users->name}}" class="form-control" id="exampleInputarea" placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputaddress">profile_Image</label>
                    <input type="file" accept="image/jpeg" name="profile_pic" value="{{$users->profile_pic}}" class="form-control" id="exampleInputaddress" placeholder="Enter Image">
                  </div>
                  @if(Auth::user()->is_admin==1)
                  <div class="form-group">
                    <label for="exampleInputaddress">Email</label>
                    <input type="text" name="email" value="{{$users->email}}" class="form-control" id="exampleInputaddress" placeholder="Enter Email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputaddress">Password</label>
                    <input type="password" name="password" value="{{$users->password}}" class="form-control" id="exampleInputaddress" placeholder="Enter Password">
                  </div>
                  @endif
                  <div class="form-group">
                    <label for="exampleInputaddress">Gender</label><br/>
                    <input type="radio" name="gender" value="male"   {{ ($users->gender == "male") ? 'checked' :'' }}   >Male<br/>
                    <input type="radio" name="gender" value="female"  {{($users->gender == "female") ? 'checked' :'' }}  >Female<br/>
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputaddress">BirthDate</label>
                    <input type="date" name="birth_date"  value="{{$users->birth_date}}" class="form-control" id="exampleInputaddress" placeholder="National_id">
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputaddress">National_id</label>
                    <input type="text" name="national_id" value="{{$users->national_id}}" class="form-control" id="exampleInputaddress" placeholder="National_id">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputaddress">MObile</label>
                    <input type="text" name="mobile" value="{{$users->mobile}}" class="form-control" id="exampleInputaddress" placeholder="National_id">
                  </div> 
                </div>
                 
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
