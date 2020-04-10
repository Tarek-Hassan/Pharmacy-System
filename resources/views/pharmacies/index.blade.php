@extends('admin.index')
@section('title','Pharmacy')
@section('section_title','Pharmacy')
@section('content')

<div class="container">
    <a href="{{route('pharmacies.create')}}" class="edit btn btn-primary btn-sm">Add Pharmacy</a>
    <br>
    <br>
 
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                  <th>ID</th>
                  <th>national_id</th>
                  <th>Pharmacy_Name</th>
                  <th>Image</th>
                  <th>Email</th>
                  <th>priority</th>
                  <th>Address ID</th>
                          <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<!-- attia -->
<!-- alret form to confirm delete  -->
<div class="modal model-danger fade" id="delete" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content confirmModal">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>

            <form method="post" action="" id="formdelete">
                <div class="modal-body">

                    @csrf
                    @method('delete')
                    <div>
                        <div class="box-body">
                            <p class="text-center">Are u sure want to delete?</p>


                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">No, cancel</button>
                    <button type="submit" class="btn btn-success">Yes,
                        Delete</button>
                </div>
            </form>
            <!--  -->


        </div>
    </div>
</div>
<!--///////////////////end form  -->
</body>
@endsection
@section('script')
<script type="text/javascript">
    $(function () {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('pharmacies.index') }}",
            columns: [
              {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'national_id',
                    name: 'national_id'
                },
                {
                    data: 'pharmacy_name',
                    name: 'pharmacy_name'
                },
                {
                    data: 'img',
                    name: 'img', render:function(url){ return '<img src="{{url("image/")}}'+'/'+''+url+'" width = "50" height="50" />'; }
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'priority',
                    name: 'priority'
                },
           
                {
                    data: 'address_id',
                    name: 'address_id'
                },
                 {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
        $(document).on("click", ".del", function () {
            var myBookId = $(this).data('id');
            console.log(myBookId);
            var deleteForm = document.getElementById("formdelete") // get form 
            deleteForm.action = '/pharmacies/' + myBookId; // assign action 

        });
    });

</script>

<!-- <script type="text/javascript">
    $(function () {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('pharmacies.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                // {
                //     data: 'name',
                //     name: 'name'
                // },
                // {
                //     data: 'address',
                //     name: 'address'
                // },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
        $(document).on("click", ".del", function () {
            var myBookId = $(this).data('id');
            console.log(myBookId);
            var deleteForm = document.getElementById("formdelete") // get form 
            deleteForm.action = '/pharmacies/' + myBookId; // assign action 

        });
    });

</script> -->
@endsection 