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
                <h3 class="card-title">Edit Order</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('orders.update',$orders->id)}}" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputarea">delivery_address</label>
                    <input type="text" name="delivery_address" value="{{$orders->delivery_address}}" class="form-control" id="exampleInputarea" placeholder="Enter MedicineName">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputaddress">Is_Insured</label>
                    <input type="text" name="is_insured" value="{{$orders->is_insured}}" class="form-control" id="exampleInputaddress" placeholder="Enter Type">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputaddress">Status</label>
                    <input type="text" name="status" value="{{$orders->status}}" class="form-control" id="exampleInputaddress" placeholder="Enter Price">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputaddress">Creator_Type</label>
                    <input type="text" name="creator_type" value="{{$orders->creator_type}}" class="form-control" id="exampleInputaddress" placeholder="Enter Price">
                  </div>
                  <!-- <div class="form-group">
                    <label for="exampleInputaddress">Pharmacy_Id</label>
                    <input type="text" name="pharmacy_id" value="{{$orders->pharmacy_id}}" class="form-control" id="exampleInputaddress" placeholder="Enter Price">
                  </div> -->
                  <div class="form-group">
                    Pharmacy Name
                    <select class="custom-select" name="pharmacy_id" >
                      @foreach($pharmacies as $pharmacy)
                        <option value="{{$pharmacy->id}}" {{$pharmacy->id==$orders->pharmacy_id?'selected':''}}>{{$pharmacy->pharmacy_name}}</option>
                      @endforeach
                    </select>

                   </div>
                  <!-- <div class="form-group">
                    <label for="exampleInputaddress">Doctor_id</label>
                    <input type="text" name="doctor_id" value="{{$orders->doctor_id}}" class="form-control" id="exampleInputaddress" placeholder="Enter Price">
                  </div> -->
                  <div class="form-group">
                    Doctor Name
                    <select class="custom-select" name="doctor_id" >
                      @foreach($doctors as $doctor)
                        <option value="{{$doctor->id}}" {{$doctor->id==$orders->doctor_id?'selected':''}} >{{$doctor->doctor_name}}</option>
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