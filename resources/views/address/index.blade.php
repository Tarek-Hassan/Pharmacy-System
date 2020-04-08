@extends('admin.index')
@section('title','Address')
@section('section_title','Address')
@section('content')

<div class="container my-3">
    <a href="{{url('address/create')}}" class="edit btn btn-primary btn-sm">Add Address</a>
    <br>
    <br>
 
    <table class="table table-bordered data-table">
        <thead>
            <tr>
            
                <th>ID</th>
                <th>Street Name</th>
                <th>Building Number</th>
                <th>Floor Number</th>
                <th>Flat Number</th>
                <th>Is main</th>
                <th>UserName</th>
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
            ajax: "{{ route('address.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'street_name',
                    name: 'street_name'
                },
                {
                    data: 'building_number',
                    name: 'building_number'
                },
                {
                    data: 'floor_number',
                    name: 'floor_number'
                },
                {
                    data: 'flat_number',
                    name: 'flat_number'
                },
                {
                    data: 'main',
                    name: 'main'
                },
                {
                    data: 'username',
                    name: 'username'
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
            var id = $(this).data('id');
            var deleteForm = document.getElementById("formdelete") // get form 
            deleteForm.action = '/address/' + id; // assign action 
        });
    });

</script>
@endsection
