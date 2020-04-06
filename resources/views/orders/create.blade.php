@extends('admin.index')
@section('title','Order')
@section('section_title','Order')
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
                <h3 class="card-title">Create Order</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('orders.store')}}" enctype="multipart/form-data">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputarea">Delivery_Address</label>
                    <input type="text" name="delivery_address" class="form-control" id="exampleInputarea" placeholder="Enter Delivery_Address">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputarea">Is_Insured</label>
                    <input type="text" name="is_insured" class="form-control" id="exampleInputarea" placeholder="Enter Is_Insured">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputaddress">Status</label>
                    <input type="text" name="status" class="form-control" id="exampleInputaddress" placeholder="Enter Status">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputaddress">Creator_Type</label>
                    <input type="text" name="creator_type" class="form-control" id="exampleInputaddress" placeholder="Enter Creator_Type">
                  </div>
                  <!-- <div class="form-group">
                    <label for="exampleInputaddress">pharmacy_id</label>
                    <input type="text" name="pharmacy_id" class="form-control" id="exampleInputaddress" placeholder="Enter Pharmacy_Id">
                  </div> -->

                  <div class="form-group">
                    Pharmacy Name
                    <select class="custom-select" name="pharmacy_id" >
                      @foreach($pharmacies as $pharmacy)
                        <option value="{{$pharmacy->national_id}}">{{$pharmacy->pharmacy_name}}</option>
                      @endforeach
                    </select>

                   </div>

                  <!-- <div class="form-group">
                    <label for="exampleInputaddress">Doctor_id</label>
                    <input type="text" name="doctor_id" class="form-control" id="exampleInputaddress" placeholder="Enter Doctor_Id">
                  </div> -->
                  <div class="form-group">
                    Doctor Name
                    <select class="custom-select" name="doctor_id" >
                      @foreach($doctors as $doctor)
                        <option value="{{$doctor->national_id}}">{{$doctor->doctor_name}}</option>
                      @endforeach
                    </select>

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