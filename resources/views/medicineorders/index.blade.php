@extends('admin.index')
@section('title','MedicineOrder')
@section('section_title','MedicineOrder')
@section('content')
<div class="container my-3">
    <a href="{{url('medicineorders/create')}}" class="edit btn btn-primary btn-sm">Add MedicineOrder</a>
    <br>
    <br>
 
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Medicine_Id</th>
                <th>Order_Id</th>
                <th>User_Id</th>
                <th>Pharmacy_Id</th>
                <th>Quantity</th>
                <th>Total_Price</th>
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
            ajax: "{{ route('medicineorders.index') }}",
            columns: [
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'medicine_id',
                    name: 'medicine_id'
                },

                  {
                    data: 'order_id',
                    name: 'order_id'
                },
                
                {
                    data: 'user_id',
                    name: 'user_id'
                },
                {
                    data: 'pharmacy_id',
                    name: 'pharmacy_id'
                },
                {
                    data: 'quantity',
                    name: 'quantity'
                },
                {
                    data: 'total_price',
                    name: 'total_price'
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
            deleteForm.action = '/medicineorder/' + myBookId; // assign action 

        });
    });

</script>
@endsection
