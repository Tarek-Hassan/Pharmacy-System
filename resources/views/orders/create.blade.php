@extends('admin.index')
@section('title','Order')
@section('section_title','Order')
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
                    Medicine Name
                    <select class="custom-select" name="medicine_id" >
                      @foreach($medicines as $medicine)
                        <option value="{{$medicine->id}}">{{$medicine->medicine_name}}</option>
                      @endforeach
                    </select>
                   </div>
                    <!-- <div class="col-md-6">
                <div class="form-group">
                  <label>Multiple</label>
                  @foreach($medicines as $medicine)
                  <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                    <option>{{$medicine->medicine_name}}</option>
                  </select>
                </div>
                  @endforeach -->
                  <div class="form-group">
                    <label for="exampleInputarea">Is_Insured</label>
                    <input type="text" name="is_insured" class="form-control" id="exampleInputarea" placeholder="Enter Is_Insured">
                  </div>
                  <!-- <div class="form-group">
                    <label for="exampleInputaddress">Status</label>
                    <input type="text" name="status" class="form-control" id="exampleInputaddress" placeholder="Enter Status">
                  </div> -->

                  <!-- <div class="form-group">
                  <label>Status</label>
                  <select class="select2" name="status" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                    <option>New​</option>
                    <option>Processing</option>
                    <option>WaitingForUserConfirmation</option>
                    <option>Canceled</option>
                    <option>Confirmed</option>
                    <option>Delivered</option>
                  </select>
                </div> -->
                <label for="">Status</label>
                <select id="" name="status">
                  <option value="New​">New​</option>
                  <option value="Processing">Processing</option>
                  <option value="WaitingForUserConfirmation">WaitingForUserConfirmation</option>
                  <option value="Canceled">Canceled</option>
                  <option value="Confirmed">Confirmed</option>
                  <option value="Delivered">Delivered</option>
                </select>

                <label for="">Creator_Type</label>
                <select id="" name="creator_type">
                  <option value="Doctor">Doctor</option>
                  <option value="User">User</option>
                </select>

                  <!-- <div class="form-group">
                    <label for="exampleInputaddress">Creator_Type</label>
                    <input type="text" name="creator_type" class="form-control" id="exampleInputaddress" placeholder="Enter Creator_Type">
                  </div> -->
                  <div class="form-group">
                    <label for="exampleInputaddress">quantity</label>
                    <input type="text" name="quantity" class="form-control" id="exampleInputaddress" placeholder="Enter quantity">
                  </div>
                  <!-- <div class="form-group">
                    <label for="exampleInputaddress">total_price</label>
                    <input type="text" name="total_price" class="form-control" id="exampleInputaddress" placeholder="Enter total_price">
                  </div> -->
                  <!-- <div class="form-group">
                    <label for="exampleInputaddress">pharmacy_id</label>
                    <input type="text" name="pharmacy_id" class="form-control" id="exampleInputaddress" placeholder="Enter Pharmacy_Id">
                  </div> -->
                  <input type="hidden" name="user_id" value="1"/>
                  <div class="form-group">
                    User Name
                    <select class="custom-select" name="user_id" > 
                      @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                      @endforeach                     </select>
                   </div>

                  <div class="form-group">
                    Pharmacy Name
                    <select class="custom-select" name="pharmacy_id" >
                      @foreach($pharmacies as $pharmacy)
                        <option value="{{$pharmacy->id}}">{{$pharmacy->pharmacy_name}}</option>
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
                        <option value="{{$doctor->id}}">{{$doctor->name}}</option>
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