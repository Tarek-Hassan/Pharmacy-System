@extends('admin.index')
@section('title','Order')
@section('section_title','Order')
@section('content')
<div class="container my-3">
    <a href="{{url('orders/create')}}" class="edit btn btn-primary btn-sm">Add Order</a>
    <br>
    <br>
 
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Delivery_Address</th>
                <th>Is_Insured</th>
                <th>Status</th>
                <th>Creator_Type</th>
                <th>Pharmacy_Id</th>
                <th>Doctor_Id</th>
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
            ajax: "{{ route('orders.index') }}",
            columns: [
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'delivery_address',
                    name: 'delivery_address'
                },

                  {
                    data: 'is_insured',
                    name: 'is_insured'
                },
                
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'creator_type',
                    name: 'creator_type'
                },
                {
                    data: 'pharmacy_id',
                    name: 'pharmacy_id'
                },
                {
                    data: 'doctor_id',
                    name: 'doctor_id'
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
            deleteForm.action = '/orders/' + id; // assign action 

        });
    });

</script>
@endsection
