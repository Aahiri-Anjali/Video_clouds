@extends('admin_layout.admin_main')

@section('content')
<button type="button" class="btn btn-primary" id="btn" data-toggle="modal" data-target="#myModal">
    Add Category
</button>

<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Insere Data</h4>
                    <button type="button" class="close" data-dismiss="modal" onclick="this.form.reset();">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-holder">
                            <div div class="form-content">


                                <div class="form-group">
                                    <label for="name">Category Name:</label>
                                    <input type="text" class="form-control" placeholder="Enter Name" id="name" name="name">
                                </div>
                                <span class="text-danger error_danger" id="nameerror"></span>

                                <!-- Modal footer -->
                                <div class="form-button">
                                    <button type="button" class="btn btn-primary" id="submitbtn">Submit</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="close" onclick="this.form.reset();">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    {{-- edit model --}}
    <div class="modal" id="myeditModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data</h4>
                        <button type="button" class="close" data-dismiss="modal" onclick="this.form.reset();">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-body">
                            <div class="form-holder">
                                <div class="form-content">

                                    <input type="hidden" id="editid">
                                    <div class="form-group">
                                        <label for="name">Category Name:</label>
                                        <input type="text" class="form-control" placeholder="Enter Name" id="editname" name="editname">
                                    </div>
                                    <span class="text-danger error_danger" id="name_error"></span>

                                    <!-- Modal footer -->
                                    <div class="form-button">
                                        <button type="button" class="btn btn-primary" id="updatebtn">Update</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="editclose" onclick="this.form.reset();">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        categoryData();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#myeditModal, #myModal").on("hide.bs.modal", function() {
            $("#myeditModal form")[0].reset();
            $("#myModal form")[0].reset();
            $('span').html('');
        });

        $('.close,#close,#editclose').click(function() {
            $('span').text('');
        });

        $('#submitbtn').click(function(e) {
            e.preventDefault();
            var name = $('#name').val();
            $.ajax({
                url: "{{route('admin.categoryCreate')}}",
                data: {
                    name: name
                },
                dataType: "json",
                type: "post",
                success: function(response) {
                    if (response.status == false) {
                        $.each(response.errors, function(key, value) {
                            var error = "#" + key + "error";
                            $(error).text(value);
                        });
                    } else {
                        $('#myModal').modal('hide');
                        swal({
                            icon: "success",
                            text: response.data,
                            title: "inserted",
                        });
                        $('#name').val('');
                        $('.error_danger').text('');
                        categoryData();
                    }
                },
            });

        });

        function categoryData() {
            $.ajax({
                url: "{{route('admin.categoryData')}}",
                dataType: "json",
                type: "get",
                success: function(response) {
                    var i = 0
                    if (response.status == true) {
                        $('tbody').html('');
                        $.each(response.data, function(key, value) {
                            i++;

                            var status = "Active";
                            var status_class = "badge-success";
                            if (value.status == 0) {
                                status = "Deactive";
                                status_class = 'badge-danger';
                            }

                            $('tbody').append('<tr>\
                           <th>' + i + '</th>\
                            <td>' + value.name + '</td>\
                            <td><button id="status" class="badge ' + status_class + '" value="' + value.id + '">' + status + '</button></td>\
                            <td colspan="2"><button type="button" value="' + value.id + '" class="btn btn-primary editbtn">Edit</button></td>\
                            <td colspan="2"><button type="button" value="' + value.id + '" class="btn btn-danger deletebtn">Delete</button></td>\
                            </tr>');
                        });
                    }
                }
            });
        }

        $(document).on('click', '.editbtn', function(e) {
            e.preventDefault();
            $('#myeditModal').modal('show');
            var id = $(this).val();
            var url = "{{route('admin.categoryEdit',['id'=>':id'])}}";
            url = url.replace(':id', id);
            $.ajax({
                type: "get",
                url: url,
                dataType: "json",
                success: function(response) {
                    console.log('success');
                    if (response.status == true) {
                        $('#editid').val(id);
                        $('#editname').val(response.data.name);
                    }
                },

            });
        });

        $('#updatebtn').click(function(e) {
            e.preventDefault();
            var id = $('#editid').val();
            var url = "{{route('admin.categoryUpdate',['id'=>':id'])}}";
            url = url.replace(':id', id);
            var name = $('#editname').val();
            $.ajax({
                url: url,
                dataType: "json",
                type: "post",
                data: {
                    name: name
                },
                success: function(response) {
                    if (response.status == false) {
                        $.each(response.errors, function(key, value) {
                            var error = "#" + key + "_error";
                            $(error).text(value);
                        });
                    } else {
                        console.log("in true");
                        $('#myeditModal').modal('hide');
                        swal({
                            icon: "success",
                            text: response.data,
                            title: "Updated",
                        });
                        categoryData();
                    }
                }
            });
        });


        $(document).on('click', '.deletebtn', function(e) {
            e.preventDefault();
            var id = $(this).val();
            var url = "{{route('admin.categoryDelete',['id'=>':id'])}}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                dataType: "json",
                type: "get",
                success: function(response) {
                    if (response.status == true) {
                        $('#myeditModal').modal('hide');
                        swal({
                            icon: "success",
                            text: response.data,
                            title: "Deleted",
                        });
                        categoryData();
                    }
                }
            });

        });

        $(document).on('click', '#status', function(e) {
            e.preventDefault();
            var id = $(this).val();
            $.ajax({
                url: "/Admin/category-status",
                dataType: "json",
                type: "post",
                data: {
                    id: id,
                },
                success: function(response) {
                    if (response.status == 200) {
                        categoryData();
                    }
                }
            });
        });

    });
</script>
@endpush