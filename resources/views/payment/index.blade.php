@extends('admin.index')
@section('title','Payment')
@section('section_title','Payment')
@section('content')
<div class="container">
   
    
 
    <table class="table table-bordered data-table my-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>card_number</th>
                <th>Amount /$</th>
                <th>card_cvc</th>
                <th>exp_date</th>
                <th>userName</th>
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
            ajax: "{{ route('stripe.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'card_number',
                    name: 'card_number'
                },
                {
                    data: 'amount',
                    name: 'amount'
                },
                {
                    data: 'card_cvc',
                    name: 'card_cvc'
                },
                {
                    data: 'exp_date',
                    name: 'exp_date'
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
            var myBookId = $(this).data('id');
            console.log(myBookId);
            var deleteForm = document.getElementById("formdelete") // get form 
            deleteForm.action = '/payment/' + myBookId; // assign action 

        });
    });

</script>
@endsection
