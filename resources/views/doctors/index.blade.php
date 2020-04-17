@extends('admin.index')
@section('title','Doctor')
@section('section_title','Doctor')
@section('content')
<div class="container my-3">
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
                <th>National Id</th>
                <th>Pharmacy_Name</th>
                <th>Banned</th>
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
                    data: 'name',
                    name: 'name'
                },

                  {
                    data: 'docImage',
                    name: 'docImage',
                    render:function(data){ return "<img width='50px' height='50px' src='/storage/"+ data + "' />";}
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'national_id',
                    name: 'national_id'
                },
                {
                    data: 'pharmacy_id',
                    name: 'pharmacy_id'
                },
                {
                    data: 'ban',
                    name: 'ban',
                                        orderable: false,
                    searchable: false
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
            deleteForm.action = '/doctors/' + id; // assign action 
        });
        $(document).on("click", ".ban", function () {
            var id = $(this).data('id');
            $.ajax({
                
  url: "doctors/"+id+"/ban",
  context: document.body
}).done(function() {
    location.reload(true);
});
            

        });
    });

</script>
@endsection
