@extends('admin.index')
@section('title','Doctor')
@section('section_title','Doctor')
@section('content')
<div class="container">
    <a href="{{url('doctors/create')}}" class="edit btn btn-primary btn-sm">Add Doctor</a>
    <br>
    <br>
 
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Doctor_Name</th>
                <th>Image</th>
                <th>Email</th>
                <!-- <th>Password</th> -->
                <th>National Id</th>
                <th>Pharmacy_Id</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
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
            ajax: "{{ route('doctors.index') }}",
            columns: [
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'doctor_name',
                    name: 'doctor_name'
                },

                  {
                    data: 'img',
                    name: 'img',
                    render: function(url){
                        return '<img src="{{url("uploads/images/")}}'+'/'+''+url+'" height="50" width="50">';
                    }
                },
                {
                    data: 'email',
                    name: 'email'
                },
                // {
                //     data: 'password',
                //     name: 'password'
                // },
                {
                    data: 'national_id',
                    name: 'national_id'
                },
                {
                    data: 'pharmacy_id',
                    name: 'pharmacy_id'
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
            deleteForm.action = '/doctors/' + myBookId; // assign action 

        });
    });

</script>
@endsection
