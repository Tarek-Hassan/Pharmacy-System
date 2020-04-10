@extends('admin.index')
@section('title','Address')
@section('section_title','Address')
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
                <h3 class="card-title">Edit Address</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('address.update',$address->id)}}" enctype="multipart/form-data">
                  @csrf
            
                  @method('put')
                  <div class="card-body">
                  <div class="form-group">
                                <label for="opens">Chcoose Area</label>
                                <select id="opens" class="form-control" name="area_id">
                                    @foreach ($areas as $area)
                                    <option value="{{$area->id}}" {{ $address->area_id==$area->id ? 'selected' : '' }}>{{$area->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                          <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
                            <div class="form-group">
                                <label for="exampleInputaddress">Street Name</label>
                                <input type="text" name="street_name" value="{{$address->street_name}}" class="form-control" id="exampleInputaddress"
                                    placeholder="Enter Street_Name">
                            </div>
                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-4 form-group '>
                                    <label class="control-label" for="exampleInputaddress">Building Number</label>
                                    <input type="text" name="building_number" value="{{$address->building_number}}"  required autocomplete='off' class="form-control "
                                        id="exampleInputaddress" placeholder="Enter Building_Number">
                                </div>
                                <div class='col-xs-12 col-md-4 form-group '>
                                    <label class='control-label'>Floor Number</label> <input class='form-control '
                                        required name="floor_number" value="{{$address->floor_number}}" placeholder='Floor Number' type='text'>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group '>
                                    <label class='control-label'>Flat Number</label> <input class='form-control '
                                        required name="flat_number" value="{{$address->flat_number}}" placeholder='flat_number' type='text'>
                                </div>
                            </div>
                            <div class="form-group">
                <label for="opens">Chcoose Is Ur Main_Address</label>
                <select id="opens" class="form-control" name="is_main" >
                  <option value="1" {{ $address->is_main==1 ? 'selected' : '' }} >Main_Address</option>
                  <option value="0" {{ $address->is_main==0 ? 'selected' : '' }} >NOt My Main_Address</option>

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