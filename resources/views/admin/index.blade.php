@extends('admin.layout')

@section('style')
    <!-- JQuery DataTable Css -->
    <link href="{{asset('tema/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">

@endsection


@section('content')

    <section class="content">
        <div class="container-fluid">

            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                MANAGE USERS
                            </h2>

                        </div>
                        <div class="body">
                            <div style="padding: 0 30px ">

                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th style="width: 3%">No</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Role</th>

                                        <th style="width: 23%">Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th style="width: 3%">No</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th style="width: 23%">Action</th>

                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php $i = 1 ?>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$user->first_name}}</td>
                                            <td>{{$user->last_name}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->username}}</td>
                                            <td>{{$user->role}}</td>
                                            <td>
                                                {{--<a href="#editEmployeeModal" class="btn btn-success" style="margin-right: 10px">Edit</a>--}}
                                                <a href="#editUserModal" class="btn btn-success" data-toggle="modal"
                                                   data-first_name = "{{$user->first_name}}" data-last_name = "{{$user->last_name}}" data-email="{{$user->email}}"
                                                   data-phone = "{{$user->phone}}" data-username="{{$user->username}}" data-role="{{$user->role}}"
                                                   data-id = "{{$user->id}}" >Edit</a>
                                                <button class="btn btn-danger contentDelete" type="button" data-toggle="modal"
                                                        data-target="#deleteUserModal" data-id="{{$user->id}}">Delete</button>
                                            </td>
                                        </tr>
                                        <?php $i += 1?>
                                    @endforeach



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Edit Modal HTML -->
    <div id="editUserModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content" style="padding: 15px">
                <form action="{{url('admin/user/edit')}}" method="post">
                    {{--{{csrf_field() }}--}}
                    <input name="_token" type="hidden" value="{{csrf_token()}}">

                    <div class="modal-header">
                        <h4 class="modal-title">Edit User</h4>

                    </div>
                    <div class="modal-body">

                        <label for="first_name">First Name</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="first_name" name="first_name" class="form-control" required>
                            </div>
                        </div>
                        <label for="last_name">Last Name</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="last_name" name="last_name" class="form-control" required>
                            </div>
                        </div>

                        <label for="phone">Phone</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="phone" name="phone" class="form-control" required>
                            </div>
                        </div>

                        <label for="email">Email Address</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                        </div>

                        <label for="username">Username</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="username" name="username" class="form-control" required>
                            </div>
                        </div>

                        <label for="role">Role</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select id="role" name="role" class="form-control">
                                    <option value="user"> user </option>
                                    <option value="admin">admin</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" id ="cu_id" name="id" value="">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-link waves-effect">SAVE CHANGES</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Modal HTML -->
    <div id="deleteUserModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content modal-col-deep-orange">
                <form action="{{url('admin/user/delete')}}" method="post">
                    {{--{{csrf_field() }}--}}
                    <input name="_token" type="hidden" value="{{csrf_token()}}">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Record</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this Record?</p>
                        <p><small>This action cannot be undone.</small></p>
                        <input type="hidden" name="id" id="u_id" value="">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-link waves-effect" value="Delete">
                        <input type="button" class="btn-link waves-effect" data-dismiss="modal" value="Cancel">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


@section('script')

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{asset('tema/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('tema/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('tema/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('tema/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{asset('tema/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{asset('tema/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{asset('tema/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{asset('tema/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{asset('tema/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

    <script>
        $("form.save_user").submit(function (event) {
            pass = $("input#a_password").val();
            re_pass = $("input#re_password").val();
            if (pass.length<6){
                alert('Password must be at least 6 characters.');
                event.preventDefault();
            }
            if (pass != re_pass){
                alert('Confirm password is not correct');
                event.preventDefault();
            }
            return;
        })
    </script>

    <script>
        $('#editUserModal').on('show.bs.modal',function(event) {

            console.log('modal opened');
            button = $(event.relatedTarget);

            first_name = button.data('first_name');
            last_name = button.data('last_name');
            phone = button.data('phone');
            email = button.data('email');
            username = button.data('username');
            role = button.data('role');
            u_id = button.data('id');

            const modal = $(this);
            modal.find('.modal-body #first_name').val(first_name);
            modal.find('.modal-body #last_name').val(last_name);
            modal.find('.modal-body #phone').val(phone);
            modal.find('.modal-body #email').val(email);
            modal.find('.modal-body #username').val(username);
            modal.find('.modal-body #role').val(role);
            modal.find('.modal-body #cu_id').val(u_id);
        });

        $('#deleteUserModal').on('show.bs.modal',function(event) {
            console.log('modal opened');
            button = $(event.relatedTarget);

            u_id = button.data('id');

            const modal = $(this);
            modal.find('.modal-body #u_id').val(u_id);
        });

        $(document).ready(function () {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "positionClass": "toast-top-right",
                "onclick": null,
                "showDuration": "1000",
                "hideDuration": "1000",
                "timeOut": "7000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

                @if(Session::get('update')){
                toastr['success']("Updated successfully.", "Success!");
            }
                @endif

                @if(Session::get('delete')){
                toastr['success']("Deleted successfully.", "Success!");
            }
            @endif

        });

    </script>

@endsection