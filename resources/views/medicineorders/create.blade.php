@extends('admin.index')
@section('title','MedicineOrder')
@section('section_title','MedicineOrder')
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
                <h3 class="card-title">Create MedicineOrder</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('medicineorders.store')}}" enctype="multipart/form-data">
                  @csrf
                <div class="card-body">

                  <div class="form-group">
                    Medicine Name
                    <select class="custom-select" name="_id" >
                      @foreach($medicines as $medicine)
                        <option value="{{$medicine->id}}">{{$medicine->medicine_name}}</option>
                      @endforeach
                    </select>
                   </div>


                  <div class="form-group">
                    Order Name
                    <select class="custom-select" name="order_id" >
                      @foreach($orders as $order)
                        <option value="{{$order->id}}">{{$order->id}}</option>
                      @endforeach
                    </select>
                   </div>

     

                  <div class="form-group">
                    User Name
                    <select class="custom-select" name="user_id" >
                      @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                      @endforeach
                    </select>
                   </div>

                  <div class="form-group">
                    Pharmacy Name
                    <select class="custom-select" name="pharmacy_id" >
                      @foreach($pharmacies as $pharmacy)
                        <option value="{{$pharmacy->id}}">{{$pharmacy->pharmacy_name}}</option>
                      @endforeach
                    </select>
                   </div>

                  <div class="form-group">
                    <label for="exampleInputaddress">Quantity</label>
                    <input type="text" name="quantity" class="form-control" id="exampleInputaddress" placeholder="Enter Quantity">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputaddress">Total_Price</label>
                    <input type="text" name="total_price" class="form-control" id="exampleInputaddress" placeholder="Enter Total_Price">
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