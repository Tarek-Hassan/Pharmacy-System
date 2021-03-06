@extends('admin.index')
@section('title','CreateDoctor')
@section('section_title','CreateDoctor')
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
                        <h3 class="card-title">Create Doctor</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{route('doctors.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputarea">Doctor_Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputarea"
                                    placeholder="Enter Doctor_Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputarea">Image</label>
                                <input type="file" name="profile" class="form-control" id="exampleInputarea" placeholder="Enter Image" >
                            </div>

                            <div class="form-group">
                                <label for="exampleInputaddress">Email</label>
                                <input type="text" name="email" class="form-control" id="exampleInputaddress"
                                    placeholder="Enter Email">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputaddress">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputaddress"
                                    placeholder="Enter Password">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputaddress">National_id</label>
                                <input type="text" name="national_id" class="form-control" id="exampleInputaddress"
                                    placeholder="National_id">
                            </div>
                            <div class="form-group">
                                Pharmacy Name
                                <select class="custom-select" name="pharmacy_id">
                                    @foreach($pharmacies as $pharmacy)
                                    <option value="{{$pharmacy->id}}">{{$pharmacy->pharmacy_name}}</option>
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
