@extends('admin.index')
@section('title','Doctor')
@section('section_title','Doctor')
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
                <h3 class="card-title">Edit Doctor</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('doctors.update',$doctors->id)}}" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputarea">Doctor_Name</label>
                    <input type="text" name="doctor_name" value="{{$doctors->doctor_name}}" class="form-control" id="exampleInputarea" placeholder="Enter Doctor_Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputaddress">Image</label>
                    <input type="file" name="img" value="{{$doctors->img}}" class="form-control" id="exampleInputaddress" placeholder="Enter Image">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputaddress">Email</label>
                    <input type="text" name="email" value="{{$doctors->email}}" class="form-control" id="exampleInputaddress" placeholder="Enter Email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputaddress">Password</label>
                    <input type="text" name="Password" value="{{$doctors->Password}}" class="form-control" id="exampleInputaddress" placeholder="Enter Password">
                  </div>
                  
                  <div class="form-group">
                    Pharmacy Name
                    <select class="custom-select" name="pharmacy_id" >
                      @foreach($pharmacies as $pharmacy)
                        <option value="{{$pharmacy->id}}">{{$pharmacy->pharmacy_name}}</option>
                      @endforeach
                    </select>
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